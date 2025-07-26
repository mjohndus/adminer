<?php

namespace AdminNeo;

$TABLE = $_GET["edit"];
$fields = fields($TABLE);
$where = (isset($_GET["select"]) ? ($_POST["check"] && count($_POST["check"]) == 1 ? where_check($_POST["check"][0], $fields) : "") : where($_GET, $fields));
$update = (isset($_GET["select"]) ? $_POST["edit"] : $where);
foreach ($fields as $name => $field) {
	if (!isset($field["privileges"][$update ? "update" : "insert"]) || Admin::get()->getFieldName($field) == "" || $field["generated"]) {
		unset($fields[$name]);
	}
}

if ($_POST && !isset($_GET["select"])) {
	$location = $_POST["referer"];
	if ($_POST["insert"]) { // continue edit or insert
		$location = ($update ? null : $_SERVER["REQUEST_URI"]);
	} elseif (!preg_match('~^.+&select=.+$~', $location)) {
		$location = ME . "select=" . urlencode($TABLE);
	}

	$indexes = indexes($TABLE);
	$unique_array = unique_array($_GET["where"], $indexes);
	$query_where = "\nWHERE $where";

	if (isset($_POST["delete"])) {
		queries_redirect(
			$location,
			lang('Item has been deleted.'),
			Driver::get()->delete($TABLE, $query_where, !$unique_array)
		);

	} else {
		$set = [];
		foreach ($fields as $name => $field) {
			$val = process_input($field);
			if ($val !== false && $val !== null) {
				$set[idf_escape($name)] = $val;
			}
		}

		if ($update) {
			if (!$set) {
				redirect($location);
			}
			queries_redirect(
				$location,
				lang('Item has been updated.'),
				Driver::get()->update($TABLE, $set, $query_where, !$unique_array)
			);
			if (is_ajax()) {
				page_headers();
				page_messages();
				exit;
			}
		} else {
			$result = Driver::get()->insert($TABLE, $set);
			$last_id = ($result ? last_id() : 0);
			queries_redirect($location, lang('Item%s has been inserted.', ($last_id ? " $last_id" : "")), $result); //! link
		}
	}
}

$row = null;
if ($_POST["save"]) {
	$row = (array) $_POST["fields"];
} elseif ($where) {
	$select = [];
	foreach ($fields as $name => $field) {
		if (isset($field["privileges"]["select"])) {
			$as = ($_POST["clone"] && $field["auto_increment"] ? "''" : convert_field($field));
			$select[] = ($as ? "$as AS " : "") . idf_escape($name);
		}
	}
	$row = [];
	if (!support("table")) {
		$select = ["*"];
	}
	if ($select) {
		$result = Driver::get()->select($TABLE, $select, [$where], $select, [], (isset($_GET["select"]) ? 2 : 1));
		if (!$result) {
			Admin::get()->addError(error());
		} else {
			$row = $result->fetchAssoc();
			if (!$row) { // MySQLi returns null
				$row = false;
			}
		}
		if (isset($_GET["select"]) && (!$row || $result->fetchAssoc())) { // $result->getNumRows() != 1 isn't available in all drivers
			$row = null;
		}
	}
}

if (!support("table") && !$fields) {
	if (!$where) { // insert
		$result = Driver::get()->select($TABLE, ["*"], [], ["*"]);
		$row = ($result ? $result->fetchAssoc() : false);
		if (!$row) {
			$row = [Driver::get()->primary => ""];
		}
	}
	if ($row) {
		foreach ($row as $key => $val) {
			if (!$where) {
				$row[$key] = null;
			}
			$fields[$key] = ["field" => $key, "null" => ($key != Driver::get()->primary), "auto_increment" => ($key == Driver::get()->primary)];
		}
	}
}

edit_form($TABLE, $fields, $row, $update);
