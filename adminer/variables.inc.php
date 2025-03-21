<?php
$status = isset($_GET["status"]);
page_header($status ? lang('Status') : lang('Variables'));

$variables = ($status ? show_status() : show_variables());
if (!$variables) {
	echo "<p class='message'>" . lang('No rows.') . "\n";
} else {
	echo "<table>\n";
	foreach ($variables as $key => $val) {
		echo "<tr>";
		echo "<th><code class='jush-" . $jush . ($status ? "status" : "set") . "'>" . h($key) . "</code>";
		echo "<td>" . nl2br(h($val));
	}
	echo "</table>\n";
}
