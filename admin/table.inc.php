<?php

namespace AdminNeo;

/**
 * @var Admin $admin
 * @var ?Min_DB $connection
 * @var ?Min_Driver $driver
 */

$TABLE = $_GET["table"];
$fields = fields($TABLE);
if (!$fields) {
	$error = error();
}
$table_status = table_status1($TABLE, true);
$name = $admin->getTableName($table_status);

$rights = [];
foreach ($fields as $key => $field) {
	$rights += $field["privileges"];
}

$title = $fields && is_view($table_status) ? $table_status['Engine'] == 'materialized view' ? lang('Materialized view') : lang('View') : lang('Table');
$table_name = $name != "" ? $name : h($TABLE);
page_header("$title: $table_name", $error, [$table_name]);

$set = null;
if (isset($rights["insert"]) || !support("table")) {
	$set = "";
}
$admin->printTableMenu($table_status, $set);

$info = [];
if (!preg_match("~sqlite|mssql|pgsql~", $jush) && isset($table_status["Engine"])) {
	$info[] = lang('Engine') . ": " . h($table_status["Engine"]);
}
if (isset($table_status["Collation"])) {
	$info[] = lang('Collation') . ": " . h($table_status["Collation"]);
}
if ($info) {
	echo "<p>", implode(", ", $info), "</p>";
}

if ($fields) {
	$admin->printTableStructure($fields);
}

$comment = $table_status["Comment"];
if ($comment != "") {
	echo "<p class='keep-lines'>", lang('Comment'), ": ", $admin->formatComment($comment), "</p>\n";
}

if (is_view($table_status)) {
	$editLink = '<p class="links"><a href="' . h(ME) . 'view=' . urlencode($TABLE) . '">' . icon("edit") . lang('Alter view') . "</a>\n";
} else {
	$editLink = '<p class="links"><a href="' . h(ME) . 'create=' . urlencode($TABLE) . '">' . icon("edit") . lang('Alter table') . "</a>\n";
}

if ($info || $fields || $comment != "") {
	echo $editLink;
}

if (support("partitioning") && preg_match("~partitioned~", $table_status["Create_options"])) {
	echo "<h2 id='partition-by'>" . lang('Partition by') . "</h2>\n";

	$partitions_info = get_partitions_info($TABLE);
	$admin->printTablePartitions($partitions_info);

	echo $editLink;
}

if (!is_view($table_status)) {
	if (support("indexes")) {
		echo "<h2 id='indexes'>" . lang('Indexes') . "</h2>\n";
		$indexes = indexes($TABLE);
		if ($indexes) {
			$admin->printTableIndexes($indexes);
		}
		echo '<p class="links"><a href="' . h(ME) . 'indexes=' . urlencode($TABLE) . '">' . icon("edit") . lang('Alter indexes') . "</a>\n";
	}

	if (fk_support($table_status)) {
		echo "<h2 id='foreign-keys'>" . lang('Foreign keys') . "</h2>\n";
		$foreign_keys = foreign_keys($TABLE);
		if ($foreign_keys) {
			echo "<table>\n";
			echo "<thead><tr><th>" . lang('Source') . "<td>" . lang('Target') . "<td>" . lang('ON DELETE') . "<td>" . lang('ON UPDATE') . "<td></thead>\n";
			foreach ($foreign_keys as $name => $foreign_key) {
				echo "<tr title='" . h($name) . "'>";
				echo "<th><i>" . implode("</i>, <i>", array_map('AdminNeo\h', $foreign_key["source"])) . "</i>";
				echo "<td><a href='" . h($foreign_key["db"] != "" ? preg_replace('~db=[^&]*~', "db=" . urlencode($foreign_key["db"]), ME) : ($foreign_key["ns"] != "" ? preg_replace('~ns=[^&]*~', "ns=" . urlencode($foreign_key["ns"]), ME) : ME)) . "table=" . urlencode($foreign_key["table"]) . "'>"
					. ($foreign_key["db"] != "" && $foreign_key["db"] != DB ? "<b>" . h($foreign_key["db"]) . "</b>." : "")
					. ($foreign_key["ns"] != "" && $foreign_key["ns"] != $_GET["ns"] ? "<b>" . h($foreign_key["ns"]) . "</b>." : "")
					. h($foreign_key["table"])
					. "</a>"
				;
				echo "(<i>" . implode("</i>, <i>", array_map('AdminNeo\h', $foreign_key["target"])) . "</i>)";
				echo "<td>" . h($foreign_key["on_delete"]);
				echo "<td>" . h($foreign_key["on_update"]);
				echo '<td><a href="' . h(ME . 'foreign=' . urlencode($TABLE) . '&name=' . urlencode($name)) . '">' . lang('Alter') . '</a>';
				echo "\n";
			}
			echo "</table>\n";
		}
		echo '<p class="links"><a href="' . h(ME) . 'foreign=' . urlencode($TABLE) . '">' . icon("add") . lang('Add foreign key') . "</a>\n";
	}

	if (support("check")) {
		echo "<h2 id='checks'>" . lang('Checks') . "</h2>\n";
		$check_constraints = $driver->checkConstraints($TABLE);
		if ($check_constraints) {
			echo "<table cellspacing='0'>\n";
			foreach ($check_constraints as $key => $val) {
				echo "<tr title='" . h($key) . "'>";
				echo "<td><code class='jush-$jush'>" . h($val);
				echo "<td><a href='" . h(ME . 'check=' . urlencode($TABLE) . '&name=' . urlencode($key)) . "'>" . lang('Alter') . "</a>";
				echo "\n";
			}
			echo "</table>\n";
		}
		echo '<p class="links"><a href="' . h(ME) . 'check=' . urlencode($TABLE) . '">' . icon("add") . lang('Create check') . "</a>\n";
	}
}

if (support(is_view($table_status) ? "view_trigger" : "trigger")) {
	echo "<h2 id='triggers'>" . lang('Triggers') . "</h2>\n";
	$triggers = triggers($TABLE);
	if ($triggers) {
		echo "<table>\n";
		foreach ($triggers as $key => $val) {
			echo "<tr><td>" . h($val[0]) . "<td>" . h($val[1]) . "<th>" . h($key) . "<td><a href='" . h(ME . 'trigger=' . urlencode($TABLE) . '&name=' . urlencode($key)) . "'>" . lang('Alter') . "</a>\n";
		}
		echo "</table>\n";
	}
	echo '<p class="links"><a href="' . h(ME) . 'trigger=' . urlencode($TABLE) . '">' . icon("add") . lang('Add trigger') . "</a>\n";
}
