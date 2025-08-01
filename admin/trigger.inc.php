<?php

namespace AdminNeo;

$TABLE = $_GET["trigger"];
$name = $_GET["name"];
$trigger_options = trigger_options();
$row = (array) trigger($name, $TABLE) + ["Trigger" => $TABLE . "_bi"];

if ($_POST) {
	if (in_array($_POST["Timing"], $trigger_options["Timing"]) && in_array($_POST["Event"], $trigger_options["Event"]) && in_array($_POST["Type"], $trigger_options["Type"])) {
		// don't use drop_create() because there may not be more triggers for the same action
		$on = " ON " . table($TABLE);
		$drop = "DROP TRIGGER " . idf_escape($name) . (DIALECT == "pgsql" ? $on : "");
		$location = ME . "table=" . urlencode($TABLE);
		if ($_POST["drop"]) {
			query_redirect($drop, $location, lang('Trigger has been dropped.'));
		} else {
			if ($name != "") {
				queries($drop);
			}
			queries_redirect(
				$location,
				($name != "" ? lang('Trigger has been altered.') : lang('Trigger has been created.')),
				queries(create_trigger($on, $_POST))
			);
			if ($name != "") {
				queries(create_trigger($on, $row + ["Type" => reset($trigger_options["Type"])]));
			}
		}
	}
	$row = $_POST;
}

if ($name != "") {
	page_header(lang('Alter trigger') . ": " . h($name), ["table" => $TABLE, h($name)]);
} else {
	page_header(lang('Create trigger'), ["table" => $TABLE, lang('Create trigger')]);
}
?>

<form action="" method="post" id="form">
<table class="box">
<tr><th><?php echo lang('Time'); ?><td><?php echo html_select("Timing", $trigger_options["Timing"], $row["Timing"], "triggerChange(/^" . preg_quote($TABLE, "/") . "_[ba][iud]$/, '" . js_escape($TABLE) . "', this.form);"); ?>
<tr><th><?php echo lang('Event'); ?><td><?php echo html_select("Event", $trigger_options["Event"], $row["Event"], "this.form['Timing'].onchange();"); ?>
<?php echo (in_array("UPDATE OF", $trigger_options["Event"]) ? " <input name='Of' value='" . h($row["Of"]) . "' class='input hidden'>": ""); ?>
<tr><th><?php echo lang('Type'); ?><td><?php echo html_select("Type", $trigger_options["Type"], $row["Type"]); ?>
</table>
<p><?php echo lang('Name'); ?>: <input class="input" name="Trigger" value="<?php echo h($row["Trigger"]); ?>" data-maxlength="64" autocapitalize="off">
<?php echo script("gid('form')['Timing'].onchange();"); ?>
<p><?php textarea("Statement", $row["Statement"]); ?>
<p>
<input type="submit" class="button default" value="<?php echo lang('Save'); ?>">
<?php if ($name != "") { ?><input type="submit" class="button" name="drop" value="<?php echo lang('Drop'); ?>"><?php echo confirm(lang('Drop %s?', $name)); ?><?php } ?>
<input type="hidden" name="token" value="<?php echo get_token(); ?>">
</form>
