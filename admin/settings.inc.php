<?php
namespace AdminNeo;

$settings = Admin::get()->getSettings();

$settingsRows = array_merge(
    Admin::get()->getSettingsRows(1),
    Admin::get()->getSettingsRows(2),
    Admin::get()->getSettingsRows(3)
);

if ($_POST) {
	$params = [];
	foreach ($settingsRows as $key => $row) {
		if ($key != "lang" && isset($_POST[$key])) {
            $useDefault = $_POST[$key] === "" || (is_array($_POST[$key]) && in_array("", $_POST[$key]));
			$params[$key] = (!$useDefault ? $_POST[$key] : null);
		}
	}

	$settings->updateParameters($params);
	redirect(remove_from_uri());
}

$title = lang('Settings');
page_header($title, [$title]);

// Form begin.
echo "<form id='settings' action='' method='post'>\n";
echo "<table class='box'>\n";

foreach ($settingsRows as $row) {
	echo $row;
}

// Form end.
echo "</table>\n";

echo "<p>";
echo "<input type='submit' value='" . lang('Save'), "' class='button default hidden'>";
echo input_token();
echo "</p>\n";

echo "</form>\n";
echo script("initSettingsForm();");

page_footer();
exit;
