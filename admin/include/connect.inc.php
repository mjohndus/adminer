<?php

namespace AdminNeo;

if (isset($_GET["status"])) {
	$_GET["variables"] = $_GET["status"];
}
if (isset($_GET["import"])) {
	$_GET["sql"] = $_GET["import"];
}

if (!(DB != "" ? Connection::get()->selectDatabase(DB) : isset($_GET["sql"]) || isset($_GET["dump"]) || isset($_GET["database"]) || isset($_GET["processlist"]) || isset($_GET["privileges"]) || isset($_GET["user"]) || isset($_GET["variables"]) || $_GET["script"] == "connect" || $_GET["script"] == "kill")) {
	if (DB != "" || $_GET["refresh"]) {
		restart_session();
		set_session("dbs", null);
	}
	if (DB != "") {
		Admin::get()->addError(lang('Invalid database.'));

		header("HTTP/1.1 404 Not Found");
		page_header(lang('Database') . ": " . h(DB), true);
	} else {
		if ($_POST["db"]) {
			queries_redirect(substr(ME, 0, -1), lang('Databases have been dropped.'), drop_databases($_POST["db"]));
		}

		$server_name = Admin::get()->getServerName(SERVER);
		$title = h(Drivers::get(DRIVER)) . ": " . ($server_name != "" ? h($server_name) : lang('Server'));

		page_header($title, false);

		$links = [
			'privileges' => [lang('Privileges'), "users"],
			'processlist' => [lang('Process list'), "list"],
			'variables' => [lang('Variables'), "variable"],
			'status' => [lang('Status'), "status"],
		];
		$links_html = "";
		foreach ($links as $key => $val) {
			if (support($key)) {
				$links_html .= "<a href='" . h(ME) . "$key='>" . icon($val[1]) . "$val[0]</a>";
			}
		}
		if ($links_html) {
			echo "<p class='links top-links'>$links_html</p>\n";
		}

		echo "<p>" . lang('%s version: %s through PHP extension %s', Drivers::get(DRIVER), "<b>" . h(Connection::get()->getVersion()) . "</b>", "<b>" . DRIVER_EXTENSION . "</b>") . "\n";
		echo "<p>" . lang('Logged as: %s', "<b>" . h(logged_user()) . "</b>") . "\n";
		$databases = Admin::get()->getDatabases();
		if ($databases) {
			$scheme = support("scheme");
			$all_collations = collations();
			echo "<form action='' method='post'>\n";
			echo "<div class='table-footer-parent'>\n";
			echo "<div class='scrollable'>\n";
			echo "<table class='checkable'>\n";
			echo script("mixin(qsl('table'), {onclick: tableClick, ondblclick: partialArg(tableClick, true)});");

			echo "<thead><tr>"
				. (support("database") ? "<td>" : "")
				. "<th>" . lang('Database') . (get_session("dbs") !== null ? " - <a href='" . h(ME) . "refresh=1'>" . lang('Refresh') . "</a>" : "")
				. "<td>" . lang('Collation')
				. "<td>" . lang('Tables')
				. "<td>" . lang('Size') . " - <a href='" . h(ME) . "dbsize=1'>" . lang('Compute') . "</a>" . script("qsl('a').onclick = partial(ajaxSetHtml, '" . js_escape(ME) . "script=connect');", "")
				. "</thead>\n"
			;

			$databases = ($_GET["dbsize"] ? count_tables($databases) : array_flip($databases));

			foreach ($databases as $db => $tables) {
				$root = h(ME) . "db=" . urlencode($db);
				$id = h("Db-" . $db);
				echo "<tr>" . (support("database") ? "<td class='actions'>" . checkbox("db[]", $db, in_array($db, (array) $_POST["db"]), "", "", "", $id) : "");
				echo "<th><a href='$root' id='$id'>" . h($db) . "</a>";
				$collation = h(db_collation($db, $all_collations));
				echo "<td>" . (support("database") ? "<a href='$root" . ($scheme ? "&amp;ns=" : "") . "&amp;database=' title='" . lang('Alter database') . "'>$collation</a>" : $collation);
				echo "<td align='right'><a href='$root&amp;schema=' id='tables-" . h($db) . "' title='" . lang('Database schema') . "'>" . ($_GET["dbsize"] ? $tables : "?") . "</a>";
				echo "<td align='right' id='size-" . h($db) . "'>" . ($_GET["dbsize"] ? db_size($db) : "?");
				echo "\n";
			}

			echo "</table>\n";
			echo "</div>\n"; // scrollable

			if (support("database")) {
				echo "<div class='table-footer'><div class='field-sets'>\n";
				echo "<fieldset><legend>", lang('Selected'), " <span id='selected'></span></legend><div class='fieldset-content'>\n";
				echo input_hidden("all");
				echo script("qsl('input').onclick = function () { selectCount('selected', formChecked(this, /^db/)); };"); // used by trCheck()
				echo "<input type='submit' class='button' name='drop' value='", lang('Drop'), "'>", confirm(), "\n";
				echo "</div></fieldset>\n";
				echo "</div></div>\n";

				echo script("initTableFooter()");
			}

			echo "</div>\n"; // table-footer-parent

			echo input_token();
			echo "</form>\n";
			echo script("tableCheck();");
		}
	}

	echo '<p class="links"><a href="' . h(ME) . 'database=">' . icon("database-add") . lang('Create database') . "</a>\n";

	page_footer("db");
	exit;
}

if (support("scheme")) {
	if (DB != "" && $_GET["ns"] !== "") {
		if (!isset($_GET["ns"])) {
			redirect(preg_replace('~ns=[^&]*&~', '', ME) . "ns=" . get_schema());
		}

		if (!set_schema($_GET["ns"])) {
			Admin::get()->addError(lang('Invalid schema.'));

			header("HTTP/1.1 404 Not Found");
			page_header(lang('Schema') . ": " . h($_GET["ns"]), true);
			page_footer("ns");
			exit;
		}
	}
}
