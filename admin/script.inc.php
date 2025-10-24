<?php

namespace AdminNeo;

header("Content-Type: text/javascript; charset=utf-8");

if ($_GET["script"] == "db") {
	$sums = ["Data_length" => 0, "Index_length" => 0, "Data_free" => 0];
	$data = [];

	foreach (table_status() as $name => $table_status) {
		$data["Comment-$name"] = h($table_status["Comment"]);

		if (!is_view($table_status)) {
			foreach (["Engine", "Collation"] as $key) {
				$data["$key-$name"] = h($table_status[$key]);
			}
			foreach ($sums + ["Auto_increment" => 0, "Rows" => 0] as $key => $val) {
				if ($table_status[$key] != "") {
					$val = format_number($table_status[$key]);
					if ($val >= 0) {
						$data["$key-$name"] = ($key == "Rows" && $val && $table_status["Engine"] == (DIALECT == "pgsql" ? "table" : "InnoDB")
							? "~ $val"
							: $val
						);
					}
					if (isset($sums[$key])) {
						// ignore innodb_file_per_table because it is not active for tables created before it was enabled
						$sums[$key] += ($table_status["Engine"] != "InnoDB" || $key != "Data_free" ? $table_status[$key] : 0);
					}
				} elseif (array_key_exists($key, $table_status)) {
					$data["$key-$name"] = "?";
				}
			}
		}
	}

	foreach ($sums as $key => $val) {
		$data["sum-$key"] = format_number($val);
	}

	echo json_encode($data, JSON_UNESCAPED_UNICODE);

} elseif ($_GET["script"] == "kill") {
	Connection::get()->query("KILL " . number($_POST["kill"]));

} else { // connect
	$data = [];
	foreach (count_tables(Admin::get()->getDatabases()) as $db => $val) {
		$data["tables-$db"] = $val;
		$data["size-$db"] = db_size($db);
	}

	echo json_encode($data, JSON_UNESCAPED_UNICODE);
}

exit; // don't print footer
