<?php

namespace AdminNeo;

abstract class Origin extends Plugin
{
	/** @var string[] */
	private $errors = [];

	/** @var static|Pluginer|null */
	private static $instance = null;

	/**
	 * @param array $config Configuration array.
	 * @param Plugin[] $plugins List of plugin instances.
	 *
	 * @return static|Pluginer
	 */
	public static function create(array $config = [], array $plugins = [])
	{
		if (self::$instance) {
			die("Admin instance already exists.\n");
		}

		$admin = new static();

		if (!$config && file_exists("adminneo-config.php")) {
			$config = include_once("adminneo-config.php");
			if (!is_array($config)) {
				$config = [];
				$linkParams = "href=https://github.com/adminneo-org/adminneo#configuration " . target_blank();

				$admin->addError(
					lang('%s must return an array.', "<b>adminneo-config.php</b>") .
					" <a $linkParams>" . lang('More information.') . "</a>"
				);
			}
		}

		$config = new Config($config);
		$settings = new Settings($config);

		if (!$plugins && file_exists("adminneo-plugins.php")) {
			$plugins = include_once("adminneo-plugins.php");
			if (!is_array($plugins)) {
				$plugins = [];
				$linkParams = "href=https://github.com/adminneo-org/adminneo#plugins " . target_blank();

				$admin->addError(
					lang('%s must return an array.', "<b>adminneo-plugins.php</b>") .
					" <a $linkParams>" . lang('More information.') . "</a>"
				);
			}
		}

		self::$instance = $plugins ? new Pluginer($admin, $plugins) : $admin;

		$admin->inject(self::$instance, $config, $settings, Locale::get());
		foreach ($plugins as $plugin) {
			$plugin->inject(self::$instance, $config, $settings, Locale::get());
		}

		return self::$instance;
	}

	/**
	 * @return static|Pluginer
	 */
	public static function get()
	{
		if (!self::$instance) {
			die("Admin instance not found. Create instance by Admin::create() method at first.\n");
		}

		return self::$instance;
	}

	protected function __construct()
	{
		//
	}

	/**
	 * TODO: Do not get config from Admin, but inject Config where needed.
	 */
	public function getConfig(): Config
	{
		return $this->config;
	}

	public function getSettings(): Settings
	{
		return $this->settings;
	}

	public abstract function getOperators(): array;

	public abstract function getLikeOperator(): ?string;

	public abstract function getRegexpOperator(): ?string;

	/**
	 * Initializes the Admin.
	 *
	 * This method is called right before the authentication process.
	 */
	public function init(): void
	{
		//
	}

	/**
	 * Appends error message to the list of messages.
	 *
	 * @param string $error HTML-formatted error message.
	 */
	public function addError(string $error): void
	{
		$this->errors[] = $error;
	}

	/**
	 * Returns the array of HTML-formatted error messages.
	 *
	 * @return string[]
	 */
	public function getErrors(): array
	{
		return $this->errors;
	}

	public abstract function getServiceTitle(): string;

	/**
	 * Returns connection parameters.
	 *
	 * @return string[] array($server, $username, $password)
	 */
	public function getCredentials(): array
	{
		$server = $this->config->getServer(SERVER);

		return [$server ? $server->getServer() : SERVER, $_GET["username"], get_password()];
	}

	/**
	 * Verifies given password if database itself does not require any password.
	 *
	 * @return true|string True for success, string for error message.
	 */
	public function verifyDefaultPassword(string $password)
	{
		$hash = $this->config->getDefaultPasswordHash();
		if ($hash === null || $hash === "") {
			return lang('Database does not support password.');
		} elseif (!password_verify($password, $hash)) {
			return lang('Invalid server or credentials.');
		}

		return true;
	}

	/**
	 * Authenticates the user.
	 *
	 * @return bool|string True for success, HTML-formatted error message or false for unknown error.
	 */
	public function authenticate(string $username, string $password)
	{
		if ($password == "") {
			$hash = $this->config->getDefaultPasswordHash();

			if ($hash === null) {
				return lang('AdminNeo does not support accessing a database without a password, <a href="https://www.adminneo.org/password"%s>more information</a>.', target_blank());
			} else {
				return $hash === "";
			}
		}

		return true;
	}

	/**
	 * Returns a private key used for permanent login.
	 *
	 * @return string|false Cryptic string which gets combined with password or false in case of an error.
	 * @throws \Random\RandomException
	 */
	public function getPrivateKey(bool $create = false)
	{
		return get_private_key($create);
	}

	/**
	 * Returns key used to group brute force attacks.
	 * Behind a reverse proxy, you want to return the last part of X-Forwarded-For.
	 */
	public function getBruteForceKey(): string
	{
		return $_SERVER["REMOTE_ADDR"];
	}

	/**
	 * Returns server name displayed in breadcrumbs. Can be empty string.
	 */
	public function getServerName(string $server): string
	{
		if ($server == "") {
			return "";
		}

		$serverObj = $this->config->getServer($server);

		return $serverObj ? $serverObj->getName() : $server;
	}

	public abstract function getDatabase(): ?string;

	/**
	 * Returns cached list of databases.
	 *
	 * @return string[]
	 */
	public function getDatabases($flush = true): array
	{
		return $this->filterListWithWildcards(
			get_databases($flush), $this->config->getHiddenDatabases(), false, Driver::get()->getSystemDatabases()
		);
	}

	/**
	 * Returns the list of schemas.
	 *
	 * @return string[]
	 */
	public function getSchemas(): array
	{
		return $this->filterListWithWildcards(
			schemas(), $this->config->getHiddenSchemas(), false, Driver::get()->getSystemSchemas()
		);
	}

	/**
	 * Returns the list of collations.
	 *
	 * @param string[] $keepValues List of collations that can not be removed by filtering.
	 *
	 * @return string[][]
	 */
	public function getCollations(array $keepValues = []): array
	{
		$visibleCollations = $this->config->getVisibleCollations();
		$filterList = $visibleCollations ? array_merge($visibleCollations, $keepValues) : [];

		return $this->filterListWithWildcards(collations(), $filterList, true);
	}

	/**
	 * @param string[] $values
	 * @param string[] $filterList
	 * @param string[] $systemObjects
	 */
	private function filterListWithWildcards(array $values, array $filterList, bool $keeping, array $systemObjects = []): array
	{
		if (!$values || !$filterList) {
			return $values;
		}

		$index = array_search("__system", $filterList);
		if ($index !== false) {
			unset($filterList[$index]);
			$filterList = array_merge($filterList, $systemObjects);
		}

		array_walk($filterList, function (&$value) {
			$value = str_replace('\\*', ".*", preg_quote($value, "~"));
		});
		$pattern = '~^(' . implode("|", $filterList) . ')$~';

		return $this->filterListWithPattern($values, $pattern, $keeping);
	}

	private function filterListWithPattern(array $values, string $pattern, bool $keeping): array
	{
		$result = [];

		foreach ($values as $key => $value) {
			if (is_array($value)) {
				if ($subValues = $this->filterListWithPattern($value, $pattern, $keeping)) {
					$result[$key] = $subValues;
				}
			} elseif (($keeping && preg_match($pattern, $value)) || (!$keeping && !preg_match($pattern, $value))) {
				$result[$key] = $value;
			}
		}

		return $result;
	}

	public abstract function getQueryTimeout(): int;

	/**
	 * Sends additional HTTP headers.
	 */
	public function sendHeaders(): void
	{
		//
	}

	/**
	 * Updates the list of directives for Content-Security-Policy HTTP header.
	 *
	 * @param string[] $csp [directive name => allowed sources].
	 */
	public function updateCspHeader(array &$csp): void
	{
		//
	}

	/**
	 * Prints HTML links to favicons.
	 */
	public function printFavicons(): void
	{
		$colorVariant = validate_color_variant($this->config->getColorVariant());

		// https://evilmartians.com/chronicles/how-to-favicon-in-2021-six-files-that-fit-most-needs
		// Converting PNG to ICO: https://redketchup.io/icon-converter
		echo "<link rel='icon' type='image/x-icon' href='", link_files("favicon-$colorVariant.ico", ["../admin/images/variants/favicon-$colorVariant.ico"]), "' sizes='32x32'>\n";
		echo "<link rel='icon' type='image/svg+xml' href='", link_files("favicon-$colorVariant.svg", ["../admin/images/variants/favicon-$colorVariant.svg"]), "'>\n";
		echo "<link rel='apple-touch-icon' href='", link_files("apple-touch-icon-$colorVariant.png", ["../admin/images/variants/apple-touch-icon-$colorVariant.png"]), "'>\n";
	}

	public abstract function printToHead(): void;

	/**
	 * Returns configured URLs of the CSS files together with autoloaded adminneo.css if exists.
	 *
	 * @return string[]
	 */
	public function getCssUrls(): array
	{
		$urls = $this->config->getCssUrls();

		foreach (["adminneo.css", "adminneo-light.css", "adminneo-dark.css"] as $filename) {
			if (file_exists($filename)) {
				$urls[] = "$filename?v=" . filemtime($filename);
			}
		}

		return $urls;
	}

	/**
	 * Returns whether light mode is forced.
	 */
	public function isLightModeForced(): bool
	{
		return $this->isColorSchemeForced(false);
	}

	/**
	 * Returns whether dark mode is forced.
	 */
	public function isDarkModeForced(): bool
	{
		return $this->isColorSchemeForced(true);
	}

	private function isColorSchemeForced(bool $dark): bool
	{
		$mode1 = $dark ? Settings::ColorSchemeDark : Settings::ColorSchemeLight;
		$mode2 = $dark ? Settings::ColorSchemeLight : Settings::ColorSchemeDark;

		$file1Exists = file_exists("adminneo-$mode1.css");
		$file2Exists = file_exists("adminneo-$mode2.css");

		// If the current theme supports only given color scheme, it will be forced.
		if ($file1Exists && !$file2Exists) {
			return true;
		}

		// Return the user setting but only if the theme supports both modes.
		return $this->settings->getColorScheme() == $mode1 && !($file1Exists xor $file2Exists);
	}

	/**
	 * Returns configured URLs of the JS files together with autoloaded adminneo.js if exists.
	 *
	 * @return string[]
	 */
	public function getJsUrls(): array
	{
		$urls = $this->config->getJsUrls();

		$filename = "adminneo.js";
		if (file_exists($filename)) {
			$urls[] = "$filename?v=" . filemtime($filename);
		}

		return $urls;
	}

	public abstract function printLoginForm(): void;

	/**
	 * Returns composed row for login form field.
	 */
	public function getLoginFormRow(string $fieldName, string $label, string $field): string
	{
		if ($label) {
			return "<tr><th>$label</th><td>$field</td></tr>\n";
		} else {
			return "$field\n";
		}
	}

	/**
	 * Prints username and logout button.
	 */
	public function printLogout(): void
	{
		echo "<div class='logout'>";
		echo "<form action='' method='post'>\n";
		echo h($_GET["username"]);
		echo "<input type='submit' class='button' name='logout' value='", lang('Logout'), "' id='logout'>";
		echo input_token();
		echo "</form>";
		echo "</div>\n";
	}

	/**
	 * Returns table name used in navigation and headings.
	 *
	 * @param array $tableStatus The result of SHOW TABLE STATUS.
	 *
	 * @return string HTML code, "" to ignore table
	 */
	public function getTableName(array $tableStatus): string
	{
		return h($tableStatus["Name"]);
	}

	public abstract function getFieldName(array $field, int $order = 0): string;

	/**
	 * Returns formatted comment.
	 *
	 * @return string HTML to be printed.
	 */
	public function formatComment(?string $comment): string
	{
		return h($comment);
	}

	public abstract function printTableMenu(array $tableStatus, ?string $set = ""): void;

	/**
	 * Returns foreign keys for table.
	 */
	public function getForeignKeys(string $table): array
	{
		return foreign_keys($table);
	}

	/**
	 * Returns backward keys for given table.
	 *
	 * @return array $return[$id]["table"] = $target_table; $return[$id]["constraints"][$key_name][$target_column] = $source_column; $return[$target_table]["name"] = $this->admin->getTableName($target_table);
	 */
	public function getBackwardKeys(string $table, string $tableName): array
	{
		if (!$this->settings->isRelationLinks()) {
			return [];
		}

		$rows = backward_keys($table);

		$keys = [];
		foreach ($rows as $row) {
			$id = $row["table_schema"] . "." . $row["table_name"];

			$keys[$id]["schema"] = $row["table_schema"];
			$keys[$id]["table"] = $row["table_name"];
			$keys[$id]["constraints"][$row["constraint_name"]][$row["column_name"]] = $row["referenced_column_name"];
		}

		foreach ($keys as $id => $key) {
			$name = $this->admin->getTableName(table_status($key["table"], true));
			if ($name != "") {
				$search = preg_quote($tableName);
				$separator = "(:|\\s*-)?\\s+";
				$keys[$id]["name"] = (preg_match("(^$search$separator(.+)|^(.+?)$separator$search\$)iu", $name, $match) ? $match[2] . $match[3] : $name);
			} else {
				unset($keys[$id]);
			}
		}

		return $keys;
	}

	/**
	 * Prints backward keys for given row.
	 *
	 * @param array $backwardKeys The result of getBackwardKeys().
	 */
	public function printBackwardKeys(array $backwardKeys, array $row): void
	{
		foreach ($backwardKeys as $key) {
			foreach ($key["constraints"] as $constraint) {
				$me = preg_replace('~&ns=[^&]+&~', "&ns=" . urldecode($key["schema"]) . "&" ,ME);

				$link = $me . 'select=' . urlencode($key["table"]);
				$i = 0;
				foreach ($constraint as $column => $val) {
					if (!isset($row[$val])) {
						continue 2;
					}

					$link .= where_link($i++, $column, $row[$val]);
				}

				// Strip table prefix that is the same as the current table name.
				$name = preg_replace('(^' . preg_quote($_GET["select"]) . (substr($_GET["select"], -1) == "s" ? "?" : "") . '_)', "_", $key["name"]);
				$title = implode(", ", array_keys($constraint));
				echo "<a href='" . h($link) . "' title='" . h($title) . "'>" . h($name) . "</a>";

				$link = $me . 'edit=' . urlencode($key["table"]);
				foreach ($constraint as $column => $val) {
					$link .= "&set" . urlencode("[" . bracket_escape($column) . "]") . "=" . urlencode($row[$val]);
				}

				echo "<a href='" . h($link) . "' title='" . lang('New item') . "'>", icon_solo("add"), "</a> ";
			}
		}
	}

	public abstract function formatSelectQuery(string $query, float $start, bool $failed = false): string;

	public abstract function formatMessageQuery(string $query, string $time, bool $failed = false): string;

	public abstract function formatSqlCommandQuery(string $query): string;

	/**
	 * Prints HTML code just before the Execute button in SQL command.
	 */
	public function printAfterSqlCommand(): void
	{
		//
	}

	public abstract function getTableDescriptionFieldName(string $table): string;

	public abstract function fillForeignDescriptions(array $rows, array $foreignKeys): array;

	/**
	 * Returns a link to use in select table.
	 *
	 * @param string|int|null $val Raw value of the field.
	 * @param ?array $field Single field returned from fields(). Null for aggregated field.
	 */
	public function getFieldValueLink($val, ?array $field): ?string
	{
		if (is_mail($val)) {
			return "mailto:$val";
		}
		if (is_web_url($val)) {
			return $val;
		}

		return null;
	}

	public abstract function formatSelectionValue(?string $val, ?string $link, ?array $field, ?string $original): string;

	public abstract function formatFieldValue($value, array $field): ?string;

	public abstract function printTableStructure(array $fields): void;

	public abstract function printTablePartitions(array $partitionInfo): void;

	public abstract function printTableIndexes(array $indexes): void;

	public abstract function printSelectionColumns(array $select, array $columns): void;

	public abstract function printSelectionSearch(array $where, array $columns, array $indexes): void;

	public abstract function printSelectionOrder(array $order, array $columns, array $indexes): void;

	public abstract function printSelectionLimit(?int $limit): void;

	public abstract function printSelectionLength(?string $textLength): void;

	public abstract function printSelectionAction(array $indexes): void;

	public function isDataEditAllowed(): bool
	{
		return !information_schema(DB);
	}

	public abstract function processSelectionColumns(array $columns, array $indexes): array;

	public abstract function processSelectionSearch(array $fields, array $indexes): array;

	public abstract function processSelectionOrder(array $fields, array $indexes): array;

	/**
	 * Processed limit box in select.
	 *
	 * @return ?int Expression to use in LIMIT, will be escaped.
	 */
	public function processSelectionLimit(): ?int
	{
		if (!isset($_GET["limit"])) {
			return $this->settings->getRecordsPerPage();
		}

		return $_GET["limit"] != "" ? (int)$_GET["limit"] : null;
	}

	public abstract function processSelectionLength(): string;

	public abstract function getFieldFunctions(array $field): array;

	public abstract function getFieldInput(?string $table, array $field, string $attrs, $value, ?string $function): string;

	/**
	 * Returns hint for edit field.
	 *
	 * @param ?string $table Table name. Is null in stored procedure calling.
	 * @param array $field Single field from fields().
	 * @param ?string $value Field value.
	 *
	 * @return string HTML code.
	 */
	public function getFieldInputHint(?string $table, array $field, ?string $value): string
	{
		return support("comment") ? $this->admin->formatComment($field["comment"]) : "";
	}

	public abstract function processFieldInput(?array $field, string $value, string $function = ""): string;

	/**
	 * Detect JSON field or value and optionally reformat the value.
	 *
	 * @param string $fieldType
	 * @param string|array $value
	 * @param ?bool $pretty True to pretty format, false to compact format, null to skip formatting.
	 *
	 * @return bool Whether field or value are detected as JSON.
	 */
	public function detectJson(string $fieldType, &$value, ?bool $pretty = null): bool
	{
		if (is_array($value)) {
			$flags = JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | ($this->config->isJsonValuesAutoFormat() ? JSON_PRETTY_PRINT : 0);
			$value = json_encode($value, $flags);

			return true;
		}

		$flags = JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | ($pretty ? JSON_PRETTY_PRINT : 0);

		if (str_contains($fieldType, "json")) {
			if ($pretty !== null && $this->config->isJsonValuesAutoFormat()) {
				$value = json_encode(json_decode($value), $flags);
			}

			return true;
		}

		if (!$this->config->isJsonValuesDetection()) {
			return false;
		}

		if (
			$value != "" &&
			preg_match('~varchar|text|character varying|String|keyword~', $fieldType) &&
			($value[0] == "{" || $value[0] == "[") &&
			($json = json_decode($value))
		) {
			if ($pretty !== null && $this->config->isJsonValuesAutoFormat()) {
				$value = json_encode($json, $flags);
			}

			return true;
		}

		return false;
	}

	public abstract function getDumpOutputs(): array;

	public abstract function getDumpFormats(): array;

	public abstract function sendDumpHeaders(string $identifier, bool $multiTable = false): string;

	/**
	 * Exports database structure.
	 */
	public function dumpDatabase(string $database): void
	{
		//
	}

	public abstract function dumpTable(string $table, string $style, int $viewType = 0): void;

	public abstract function dumpData(string $table, string $style, string $query): void;

	public abstract function getImportFilePath(): string;

	public abstract function printDatabaseMenu(): void;

	public function printNavigation(?string $missing): void
	{
		$last_version = $_COOKIE["neo_version"] ?? null;

		echo "<div class='header'>\n";
		echo $this->admin->getServiceTitle() . "\n";

		if ($missing != "auth") {
			echo "<span class='version'>";
			echo h(preg_replace('~\\.0(-|$)~', '$1', VERSION));
			echo "<a id='version' class='version-badge' href='https://www.adminneo.org/download' " . target_blank() . " title='" . h($last_version) . "'>";
			if ($this->config->isVersionVerificationEnabled() && $last_version && version_compare(VERSION, $last_version) < 0) {
				echo icon_solo("asterisk");
			}
			echo "</a>";
			echo "</span>\n";

			if ($this->config->isVersionVerificationEnabled() && !$last_version) {
				echo script("verifyVersion('" . js_escape(ME) . "', '" . get_token() . "');");
			}
		}

		echo "</div>\n";
	}

	public abstract function printDatabaseSwitcher(?string $missing): void;

	/**
	 * Prints input field for filtering table list.
	 */
	public function printTablesFilter(): void
	{
		echo "<div class='tables-filter jsonly'>"
			. "<input id='tables-filter' type='search' class='input' autocomplete='off' placeholder='" . lang('Table') . "'>"
			. script("initTablesFilter(" . json_encode($this->admin->getDatabase()) . ");")
			. "</div>\n";
	}

	public abstract function printTableList(array $tables): void;

	/**
	 * Returns rows for settings table organised in groups.
	 *
	 * @param int $groupId: 1 - overall UI settings, 2 - UI elements settings, 3 - other settings.
	 *
	 * @return string[]
	 */
	public function getSettingsRows(int $groupId): array
	{
		$settings = [];

		if ($groupId == 1) {
			// Language.
			$options = get_language_options();
			if ($options) {
				$settings["lang"] = "<tr><th>" . lang('Language') . "</th>" .
					"<td>" .
					html_select("lang", get_language_options(), Locale::get()->getLanguage()) .
					"</td></tr>\n";
			}

			// Color scheme.
			$options = [
				"" => lang('By system'),
				Settings::ColorSchemeLight => lang('Light'),
				Settings::ColorSchemeDark => lang('Dark')
			];

			$settings["colorScheme"] = "<tr><th>" . lang('Color scheme') . "</th>" .
				"<td>" .
				html_radios("colorScheme", $options, $this->settings->getParameter("colorScheme") ?? "") .
				"</td></tr>\n";
		} elseif ($groupId == 2) {
			// Relation links.
			$options = [
				"" => lang('Default'),
				true => lang('Display'),
				false => lang('Hide'),
			];
			$default = $options[$this->config->isRelationLinks()];
			$options[""] .= " ($default)";

			$settings["relationLinks"] = "<tr><th>" . lang('Relations') . "</th>" .
				"<td>" .
				html_radios("relationLinks", $options, $this->settings->getParameter("relationLinks") ?? "") .
				"<span class='input-hint'>" . lang('Links to tables referencing the current row.') . "</span>" .
				"</td></tr>\n";

			// Records per page.
			$default = $this->config->getRecordsPerPage();
			$options = [
				"" => lang('Default') . " ($default)",
				"20",
				"30",
				"50",
				"70",
				"100",
			];

			$settings["recordsPerPage"] = "<tr><th>" . lang('Records per page') . "</th>" .
				"<td>" .
				html_select("recordsPerPage", $options, $this->settings->getParameter("recordsPerPage") ?? "") .
				"<span class='input-hint'>" . lang('Default number of records displayed in data table.') . "</span>" .
				"</td></tr>\n";

			// Threshold for displaying enum values as <select>.
			$default = $this->config->getEnumAsSelectThreshold() ?? lang('Never');
			$options = [
				"" => lang('Default') . " ($default)",
				-1 => lang('Never'),
				0 => lang('Always'),
				3 => lang('More values than %d', 3),
				5 => lang('More values than %d', 5),
				10 => lang('More values than %d', 10),
				20 => lang('More values than %d', 20),
			];

			$settings["enumAsSelectThreshold"] = "<tr><th>" . lang('Enum as select') . "</th>" .
				"<td>" .
				html_select("enumAsSelectThreshold", $options, $this->settings->getParameter("enumAsSelectThreshold") ?? "", "", "", true) .
				"<span class='input-hint'>" . lang('Threshold for displaying a selection menu for enum fields.') . "</span>" .
				"</td></tr>\n";
			}

		return $settings;
	}

	public abstract function getForeignColumnInfo(array $foreignKeys, string $column): ?array;
}
