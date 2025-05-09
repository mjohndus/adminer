<?php

namespace AdminNeo;

/**
 * @var ?Min_DB $connection
 * @var ?Min_Driver $driver
 */

$TABLE = $_GET["indexes"];
$index_types = ["PRIMARY", "UNIQUE", "INDEX"];
$table_status = table_status($TABLE, true);
if (preg_match('~MyISAM|M?aria' . (min_version(5.6, '10.0.5') ? '|InnoDB' : '') . '~i', $table_status["Engine"])) {
	$index_types[] = "FULLTEXT";
}
if (preg_match('~MyISAM|M?aria' . (min_version(5.7, '10.2.2') ? '|InnoDB' : '') . '~i', $table_status["Engine"])) {
	$index_types[] = "SPATIAL";
}
$indexes = indexes($TABLE);
$primary = [];
if ($jush == "mongo") { // doesn't support primary key
	$primary = $indexes["_id_"];
	unset($index_types[0]);
	unset($indexes["_id_"]);
}
$row = $_POST;
if ($row) {
	save_settings(array("index_options" => $row["options"]));
}
if ($_POST && !$error && !$_POST["add"] && !$_POST["drop_col"]) {
	$alter = [];
	foreach ($row["indexes"] as $index) {
		$name = $index["name"];
		if (in_array($index["type"], $index_types)) {
			$columns = [];
			$lengths = [];
			$descs = [];
			$set = [];
			ksort($index["columns"]);
			foreach ($index["columns"] as $key => $column) {
				if ($column != "") {
					$length = $index["lengths"][$key] ?? null;
					$desc = $index["descs"][$key] ?? null;
					$set[] = idf_escape($column) . ($length ? "(" . (+$length) . ")" : "") . ($desc ? " DESC" : "");
					$columns[] = $column;
					$lengths[] = ($length ?: null);
					$descs[] = $desc;
				}
			}

			$existing = $indexes[$name];
			if ($existing) {
				ksort($existing["columns"]);
				ksort($existing["lengths"]);
				ksort($existing["descs"]);
				if ($index["type"] == $existing["type"]
					&& array_values($existing["columns"]) === $columns
					&& (!$existing["lengths"] || array_values($existing["lengths"]) === $lengths)
					&& array_values($existing["descs"]) === $descs
				) {
					// skip existing index
					unset($indexes[$name]);
					continue;
				}
			}
			if ($columns) {
				$alter[] = [$index["type"], $name, $set];
			}
		}
	}

	// drop removed indexes
	foreach ($indexes as $name => $existing) {
		$alter[] = [$existing["type"], $name, "DROP"];
	}
	if (!$alter) {
		redirect(ME . "table=" . urlencode($TABLE));
	}
	queries_redirect(ME . "table=" . urlencode($TABLE), lang('Indexes have been altered.'), alter_indexes($TABLE, $alter));
}

page_header(lang('Alter indexes'), $error, ["table" => $TABLE, lang('Alter indexes')], h($TABLE));

$fields = array_keys(fields($TABLE));
if ($_POST["add"]) {
	foreach ($row["indexes"] as $key => $index) {
		if ($index["columns"][count($index["columns"])] != "") {
			$row["indexes"][$key]["columns"][] = "";
		}
	}
	$index = end($row["indexes"]);
	if ($index["type"] || array_filter($index["columns"], 'strlen')) {
		$row["indexes"][] = ["columns" => [1 => ""]];
	}
}
if (!$row) {
	foreach ($indexes as $key => $index) {
		$indexes[$key]["name"] = $key;
		$indexes[$key]["columns"][] = "";
	}
	$indexes[] = ["columns" => [1 => ""]];
	$row["indexes"] = $indexes;
}
$lengths = ($jush == "sql" || $jush == "mssql");
$show_options = ($_POST ? $_POST["options"] : get_setting("index_options"));
?>

<form action="" method="post">
<div class="scrollable">
<table class="nowrap">
<thead><tr>
<th id="label-type"><?php echo lang('Index Type'); ?>
<th><input type="submit" class="button invisible"><?php
echo lang('Column') . ($lengths ? "<span class='idxopts" . ($show_options ? "" : " hidden") . "'> (" . lang('length') . ")</span>" : "");
if ($lengths || support("descidx")) {
	echo checkbox("options", 1, $show_options, lang('Options'), "indexOptionsShow(this.checked)", "jsonly") . "\n";
}
?>
<th id="label-name"><?php echo lang('Name'); ?>
<th><?php
	echo "<button name='add[0]' value='1' title='", h(lang('Add next')), "' class='button light hidden'>", icon_solo("add"), "</button>";
?></th>
</thead>
<?php
if ($primary) {
	echo "<tr><td>PRIMARY<td>";
	foreach ($primary["columns"] as $key => $column) {
		echo select_input(" disabled", $fields, $column);
		echo "<label><input type='checkbox' disabled>" . lang('descending') . "</label> ";
	}
	echo "<td><td>\n";
}
$j = 1;
foreach ($row["indexes"] as $index) {
	if (!$_POST["drop_col"] || $j != key($_POST["drop_col"])) {
		echo "<tr><td>",
			html_select("indexes[$j][type]", [-1 => ""] + $index_types, $index["type"], ($j == count($row["indexes"]) ? "indexesAddRow.call(this);" : 1), "label-type"),
			"</td>";

		echo "<td>";
		ksort($index["columns"]);
		$i = 1;
		foreach ($index["columns"] as $key => $column) {
			echo "<span>" . select_input(
				" name='indexes[$j][columns][$i]' title='" . lang('Column') . "'",
				($fields ? array_combine($fields, $fields) : $fields),
				$column,
				"partial(" . ($i == count($index["columns"]) ? "indexesAddColumn" : "indexesChangeColumn") . ", '" . js_escape($jush == "sql" ? "" : $_GET["indexes"] . "_") . "')"
			);
			echo "<span class='idxopts" . ($show_options ? "" : " hidden") . "'>";
			echo ($lengths ? "<input type='number' name='indexes[$j][lengths][$i]' class='input size' value='" . (h($index["lengths"][$key] ?? "")) . "' title='" . lang('Length') . "'>" : "");
			echo (support("descidx") ? checkbox("indexes[$j][descs][$i]", 1, $index["descs"][$key] ?? false, lang('descending')) : "");
			echo "</span> </span>";
			$i++;
		}
		echo "</td>";

		echo "<td><input name='indexes[$j][name]' value='", h($index["name"]), "' class='input' autocapitalize='off' aria-labelledby='label-name'></td>\n",
			"<td>",
			"<button name='drop_col[$j]' value='1' title='", h(lang('Remove')), "' class='button light'>", icon_solo("remove"), "</button>",
			script("qsl('button').onclick = onRemoveIndexRowClick;"),
			"</td>\n";
	}
	$j++;
}
?>
</table>
</div>
<p>
<input type="submit" class="button default" value="<?php echo lang('Save'); ?>">
<input type="hidden" name="token" value="<?php echo $token; ?>">
</form>
