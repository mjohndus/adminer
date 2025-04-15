<?php

namespace AdminNeo;

/** @var ?Min_DB $connection */
$connection = null;

/** @var ?Min_Driver $driver */
$driver = null;

$has_token = $_SESSION["token"];
if (!$has_token) {
	$_SESSION["token"] = rand(1, 1e6); // defense against cross-site request forgery
}
$token = get_token(); ///< @var string CSRF protection

$permanent = [];
if ($_COOKIE["neo_permanent"]) {
	foreach (explode(" ", $_COOKIE["neo_permanent"]) as $val) {
		list($key) = explode(":", $val);
		$permanent[$key] = $val;
	}
}

function validate_server_input() {
	if (SERVER == "") {
		return;
	}

	$parts = parse_url(SERVER);
	if (!$parts) {
		auth_error(lang('Invalid server or credentials.'));
	}

	// Check proper URL parts.
	if (isset($parts['user']) || isset($parts['pass']) || isset($parts['query']) || isset($parts['fragment'])) {
		auth_error(lang('Invalid server or credentials.'));
	}

	// Allow only HTTP/S scheme.
	if (isset($parts['scheme']) && !preg_match('~^(https?)$~i', $parts['scheme'])) {
		auth_error(lang('Invalid server or credentials.'));
	}

	// Note that "localhost" and IP address without a scheme is parsed as a path.
	$hostPath = (isset($parts['host']) ? $parts['host'] : '') . (isset($parts['path']) ? $parts['path'] : '');

	// Validate host.
	if (!is_server_host_valid($hostPath)) {
		auth_error(lang('Invalid server or credentials.'));
	}

	// Check privileged ports.
	if (isset($parts['port']) && ($parts['port'] < 1024 || $parts['port'] > 65535)) {
		auth_error(lang('Connecting to privileged ports is not allowed.'));
	}
}

if (!function_exists('AdminNeo\is_server_host_valid')) {
	/**
	 * @param string $hostPath
	 * @return bool
	 */
	function is_server_host_valid($hostPath)
	{
		return strpos($hostPath, '/') === false;
	}
}

/**
 * @param string $server
 * @param string $username
 * @param string $password
 * @param string $defaultServer
 * @param int|null $defaultPort
 * @return string
 */
function build_http_url($server, $username, $password, $defaultServer, $defaultPort = null) {
	if (!preg_match('~^(https?://)?([^:]*)(:\d+)?$~', rtrim($server, '/'), $matches)) {
		auth_error(lang('Invalid server or credentials.'));
		return false;
	}

	return ($matches[1] ?: "http://") .
		($username !== "" || $password !== "" ? "$username:$password@" : "") .
		($matches[2] !== "" ? $matches[2] : $defaultServer) .
		(isset($matches[3]) ? $matches[3] : ($defaultPort ? ":$defaultPort" : ""));
}

function add_invalid_login() {
	global $admin;

	$base_name = get_temp_dir() . "/adminneo.invalid";
	// adminer.invalid may not be writable by us, try the files with random suffixes
	$file = null;
	foreach (glob("$base_name*") ?: [$base_name] as $filename) {
		$file = open_file_with_lock($filename);
		if ($file) {
			break;
		}
	}

	if (!$file) {
		$file = open_file_with_lock("$base_name-" . get_random_string());
		if (!$file) {
			return;
		}
	}

	$invalids = unserialize(stream_get_contents($file));
	$time = time();
	if ($invalids) {
		foreach ($invalids as $ip => $val) {
			if ($val[0] < $time) {
				unset($invalids[$ip]);
			}
		}
	}
	$invalid = &$invalids[$admin->getBruteForceKey()];
	if (!$invalid) {
		$invalid = [$time + 30*60, 0]; // active for 30 minutes
	}
	$invalid[1]++;
	write_and_unlock_file($file, serialize($invalids));
}

function check_invalid_login() {
	global $admin;

	$base_name = get_temp_dir() . "/adminneo.invalid";

	$invalids = [];
	foreach (glob("$base_name*") as $filename) {
		$file = open_file_with_lock($filename);
		if ($file) {
			$invalids = unserialize(stream_get_contents($file));
			unlock_file($file);
			break;
		}
	}

	$invalid = ($invalids ? $invalids[$admin->getBruteForceKey()] : []);

	$next_attempt = ($invalid && $invalid[1] > 29 ? $invalid[0] - time() : 0); // allow 30 invalid attempts
	if ($next_attempt > 0) { //! do the same with permanent login
		auth_error(lang('Too many unsuccessful logins, try again in %d minute(s).', ceil($next_attempt / 60)));
	}
}

/**
 * @throws \Random\RandomException
 */
function connect_to_db(): Min_DB
{
	global $admin;

	if ($admin->getConfig()->hasServers() && !$admin->getConfig()->getServer(SERVER)) {
		auth_error(lang('Invalid server or credentials.'));
	}

	$connection = connect();
	if (!($connection instanceof Min_DB)) {
		connection_error($connection);
	}

	return $connection;
}

/**
 * @throws \Random\RandomException
 */
function authenticate(): void
{
	global $admin;

	// Note: $admin->authenticate() method can use global $connection
	// That's why authentication has to be called after successful connection to the database.

	$result = $admin->authenticate($_GET["username"], get_password());
	if ($result !== true) {
		connection_error($result);
	}
}

/**
 * @throws \Random\RandomException
 */
function connection_error($result): void
{
	if (is_string($result)) {
		$error = $result;
	} else {
		$error = lang('Invalid server or credentials.');
	}

	if (preg_match('~^ +| +$~', get_password())) {
		$error .= "<br>" . lang('There is a space in the input password which might be the cause.');
	}

	auth_error($error);
}

$auth = $_POST["auth"] ?? null;
if ($auth) {
	// Defense against session fixation.
	session_regenerate_id();

	/** @var Admin $admin */
	$server = $auth["server"] ?? "";
	$server_obj = $admin->getConfig()->getServer($server);

	$driver = $server_obj ? $server_obj->getDriver() : ($auth["driver"] ?? "");
	$server = $server_obj ? $server : trim($server);
	$username = $auth["username"] ?? "";
	$password = $auth["password"] ?? "";
	$db = $server_obj ? $server_obj->getDatabase() : ($auth["db"] ?? "");

	set_password($driver, $server, $username, $password);
	$_SESSION["db"][$driver][$server][$username][$db] = true;

	if ($auth["permanent"]) {
		$key = base64_encode($driver) . "-" . base64_encode($server) . "-" . base64_encode($username) . "-" . base64_encode($db);
		$private = $admin->getPrivateKey(true);
		$encrypted_password = $private ? encrypt_string($password, $private) : false;
		$permanent[$key] = "$key:" . base64_encode($encrypted_password ?: "");
		cookie("neo_permanent", implode(" ", $permanent));
	}

	if (count($_POST) == 1 // 1 - auth
		|| DRIVER != $driver
		|| SERVER != $server
		|| $_GET["username"] !== $username // "0" == "00"
		|| DB != $db
	) {
		redirect(auth_url($driver, $server, $username, $db));
	}

} elseif ($_POST["logout"] && (!$has_token || verify_token())) {
	foreach (["pwds", "db", "dbs", "queries"] as $key) {
		set_session($key, null);
	}
	unset_permanent();
	redirect(SERVER_HOME_URL, lang('Logout successful.'));

} elseif ($permanent && !$_SESSION["pwds"]) {
	session_regenerate_id();
	$private = $admin->getPrivateKey();
	foreach ($permanent as $key => $val) {
		list(, $cipher) = explode(":", $val);
		list($driver, $server, $username, $db) = array_map('base64_decode', explode("-", $key));
		set_password($driver, $server, $username, $private ? decrypt_string(base64_decode($cipher), $private) : false);
		$_SESSION["db"][$driver][$server][$username][$db] = true;
	}
}

function unset_permanent() {
	global $permanent;
	foreach ($permanent as $key => $val) {
		list($driver, $server, $username, $db) = array_map('base64_decode', explode("-", $key));
		if ($driver == DRIVER && $server == SERVER && $username == $_GET["username"] && $db == DB) {
			unset($permanent[$key]);
		}
	}
	cookie("neo_permanent", implode(" ", $permanent));
}

/** Renders an error message and a login form
 * @param string plain text
 * @return null exits
 * @throws \Random\RandomException
 */
function auth_error($error) {
	global $admin, $has_token;
	$session_name = session_name();
	if (isset($_GET["username"])) {
		header("HTTP/1.1 403 Forbidden"); // 401 requires sending WWW-Authenticate header
		if (($_COOKIE[$session_name] || $_GET[$session_name]) && !$has_token) {
			$error = lang('Session expired, please login again.');
		} else {
			restart_session();
			add_invalid_login();
			$password = get_password();
			if ($password !== null) {
				if ($password === false) {
					$error = lang('Invalid permanent login, please login again.');
				}
				set_password(DRIVER, SERVER, $_GET["username"], null);
			}
			unset_permanent();
		}
	}
	if (!$_COOKIE[$session_name] && $_GET[$session_name] && ini_bool("session.use_only_cookies")) {
		$error = lang('Session support must be enabled.');
	}
	$params = session_get_cookie_params();
	cookie("neo_key", ($_COOKIE["neo_key"] ?: get_random_string()), $params["lifetime"]);

	page_header(lang('Login'), $error, null);
	echo "<form action='' method='post'>\n";
	echo "<div>";
	if (hidden_fields($_POST, ["auth"])) { // expired session
		echo "<p class='message'>" . lang('The action will be performed after successful login with the same credentials.') . "\n";
	}
	echo "</div>\n";
	$admin->printLoginForm();
	echo "</form>\n";
	page_footer("auth");
	exit;
}

if (isset($_GET["username"]) && !DRIVER) {
	page_header(lang('No driver'), lang('Database driver not found.'), false);
	page_footer("auth");
	exit;
}

if (isset($_GET["username"]) && !class_exists("AdminNeo\\Min_DB")) {
	unset($_SESSION["pwds"][DRIVER]);
	unset_permanent();
	page_header(lang('No extension'), lang('None of the supported PHP extensions (%s) are available.', implode(", ", $possible_drivers)), false);
	page_footer("auth");
	exit;
}

stop_session(true);

if (!isset($_GET["username"]) || get_password() === null) {
	auth_error("");
}

validate_server_input();
check_invalid_login();

$admin->getConfig()->applyServer(SERVER);

$connection = connect_to_db();
authenticate();
$driver = new Min_Driver($connection);

if ($_POST["logout"] && $has_token && !verify_token()) {
	page_header(lang('Logout'), lang('Invalid CSRF token. Send the form again.'));
	page_footer("db");
	exit;
}

if ($auth && $_POST["token"]) {
	$_POST["token"] = $token; // reset token after explicit login
}

$error = ''; ///< @var string
if ($_POST) {
	if (!verify_token()) {
		$ini = "max_input_vars";
		$max_vars = ini_get($ini);
		if (extension_loaded("suhosin")) {
			foreach (["suhosin.request.max_vars", "suhosin.post.max_vars"] as $key) {
				$val = ini_get($key);
				if ($val && (!$max_vars || $val < $max_vars)) {
					$ini = $key;
					$max_vars = $val;
				}
			}
		}
		$error = (!$_POST["token"] && $max_vars
			? lang('Maximum number of allowed fields exceeded. Please increase %s.', "'$ini'")
			: lang('Invalid CSRF token. Send the form again.') . ' ' . lang('If you did not send this request from AdminNeo then close this page.')
		);
	}

} elseif ($_SERVER["REQUEST_METHOD"] == "POST") {
	// posted form with no data means that post_max_size exceeded because AdminNeo always sends token at least
	$error = lang('Too big POST data. Reduce the data or increase the %s configuration directive.', "'post_max_size'");
	if (isset($_GET["sql"])) {
		$error .= ' ' . lang('You can upload a big SQL file via FTP and import it from server.');
	}
}
