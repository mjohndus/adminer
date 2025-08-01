<?php

namespace AdminNeo;

$TABLE = $_GET["view"];
$row = $_POST;
$orig_type = "VIEW";
if (DIALECT == "pgsql" && $TABLE != "") {
	$status = table_status($TABLE);
	$orig_type = strtoupper($status["Engine"]);
}

if ($_POST) {
	$name = trim($row["name"]);
	$as = " AS\n$row[select]";
	$location = ME . "table=" . urlencode($name);
	$message = lang('View has been altered.');

	$type = ($_POST["materialized"] ? "MATERIALIZED VIEW" : "VIEW");

	if (!$_POST["drop"] && $TABLE == $name && DIALECT != "sqlite" && $type == "VIEW" && $orig_type == "VIEW") {
		query_redirect((DIALECT == "mssql" ? "ALTER" : "CREATE OR REPLACE") . " VIEW " . table($name) . $as, $location, $message);
	} else {
		$temp_name = $name . "_adminneo_" . uniqid();
		drop_create(
			"DROP $orig_type " . table($TABLE),
			"CREATE $type " . table($name) . $as,
			"DROP $type " . table($name),
			"CREATE $type " . table($temp_name) . $as,
			"DROP $type " . table($temp_name),
			($_POST["drop"] ? substr(ME, 0, -1) : $location),
			lang('View has been dropped.'),
			$message,
			lang('View has been created.'),
			$TABLE,
			$name
		);
	}
}

if (!$_POST && $TABLE != "") {
	$row = view($TABLE);
	$row["name"] = $TABLE;
	$row["materialized"] = ($orig_type != "VIEW");

	Admin::get()->addError(error());
}

if ($TABLE != "") {
	page_header(lang('Alter view') . ": " . h($TABLE), ["table" => $TABLE, lang('Alter view')]);
} else {
	page_header(lang('Create view'), [lang('Create view')]);
}
?>

<form action="" method="post">
<p><?php echo lang('Name'); ?>: <input class="input" name="name" value="<?php echo h($row["name"]); ?>" data-maxlength="64" autocapitalize="off">
<?php echo (support("materializedview") ? " " . checkbox("materialized", 1, $row["materialized"], lang('Materialized view')) : ""); ?>
<p><?php textarea("select", $row["select"]); ?>
<p>
<input type="submit" class="button default" value="<?php echo lang('Save'); ?>">
<?php if ($TABLE != "") { ?><input type="submit" class="button" name="drop" value="<?php echo lang('Drop'); ?>"><?php echo confirm(lang('Drop %s?', $TABLE)); ?><?php } ?>
<input type="hidden" name="token" value="<?php echo get_token(); ?>">
</form>
