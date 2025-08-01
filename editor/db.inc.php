<?php

namespace AdminNeo;

page_header(lang('Server'), false);

Admin::get()->printDatabaseMenu();

echo "<form action='' method='post'>\n";
echo "<p>" . lang('Search data in tables') . ": <input type='search' class='input' name='query' value='" . h($_POST["query"]) . "'> <input type='submit' class='button' value='" . lang('Search') . "'>\n";
if ($_POST["query"] != "") {
	search_tables();
}

echo "<div class='scrollable'>\n";
echo "<table class='nowrap checkable'>\n";
echo script("mixin(qsl('table'), {onclick: tableClick, ondblclick: partialArg(tableClick, true)});");

echo '<thead><tr class="wrap">';
echo '<td class="actions"><input id="check-all" type="checkbox" class="input jsonly">' . script("gid('check-all').onclick = partial(formCheck, /^tables\[/);", "");
echo '<th>' . lang('Table');
echo '<td>' . lang('Rows');
echo "</thead>\n";

foreach (table_status() as $table => $status) {
	$name = Admin::get()->getTableName($status);
	if ($name != "") {
		echo '<tr><td class="actions">' . checkbox("tables[]", $table, in_array($table, (array) $_POST["tables"], true));
		echo "<th><a href='" . h(ME) . 'select=' . urlencode($table) . "'>$name</a>";
		$val = format_number($status["Rows"]);
		echo "<td align='right'><a href='" . h(ME . "edit=") . urlencode($table) . "'>" . ($status["Engine"] == "InnoDB" && $val ? "~ $val" : $val) . "</a>";
	}
}

echo "</table>\n";
echo "</div>\n";
echo "</form>\n";

echo script("tableCheck();");
