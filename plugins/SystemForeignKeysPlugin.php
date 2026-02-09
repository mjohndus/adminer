<?php

namespace AdminNeo;

/**
 * Links tables by foreign keys in system 'information_schema' and 'mysql' databases.
 *
 * Last changed in release: !compile: version
 *
 * @link https://www.adminneo.org/plugins/#usage
 *
 * @author Jakub Vrana, https://www.vrana.cz/
 * @author Peter Knut
 *
 * @license https://www.apache.org/licenses/LICENSE-2.0 Apache License, Version 2.0
 * @license https://www.gnu.org/licenses/gpl-2.0.html GNU General Public License, version 2 (one or other)
 */
class SystemForeignKeysPlugin extends Plugin
{
	public function getForeignKeys(string $table): ?array
	{
		if (DRIVER == "mysql" && DB == "mysql") {
			switch ($table) {
				case "db":
				case "tables_priv":
				case "columns_priv":
					return [["table" => "user", "source" => ["Host", "User"], "target" => ["Host", "User"]]];
				case "help_category":
					return [["table" => "help_category", "source" => ["parent_category_id"], "target" => ["help_category_id"]]];
				case "help_relation":
					return [
						["table" => "help_topic", "source" => ["help_topic_id"], "target" => ["help_topic_id"]],
						["table" => "help_keyword", "source" => ["help_keyword_id"], "target" => ["help_keyword_id"]],
					];
				case "help_topic":
					return [[
						"table" => "help_category",
						"source" => ["help_category_id"],
						"target" => ["help_category_id"]
					]];
				case "procs_priv":
					return [
						["table" => "user", "source" => ["Host", "User"], "target" => ["Host", "User"]],
						["table" => "proc", "source" => ["Db", "Routine_name"], "target" => ["db", "name"]]
					];
				case "time_zone_name":
				case "time_zone_transition_type":
					return [["table" => "time_zone", "source" => ["Time_zone_id"], "target" => ["Time_zone_id"]]];
				case "time_zone_transition":
					return [
						["table" => "time_zone", "source" => ["Time_zone_id"], "target" => ["Time_zone_id"]],
						["table" => "time_zone_transition_type", "source" => ["Time_zone_id", "Transition_type_id"], "target" => ["Time_zone_id", "Transition_type_id"]]
					];
			}
		} elseif (DB == "information_schema") {
			$schemas = $this->schemas("TABLE");
			$tables = $this->tables("TABLE");
			$columns = [
				"table" => "COLUMNS",
				"source" => ["TABLE_CATALOG", "TABLE_SCHEMA", "TABLE_NAME", "COLUMN_NAME"],
				"target" => ["TABLE_CATALOG", "TABLE_SCHEMA", "TABLE_NAME", "COLUMN_NAME"],
			];
			$characterSets = $this->characterSets("CHARACTER_SET_NAME");
			$collations = $this->collations("COLLATION_NAME");
			$routineCharsets = [
				$this->characterSets("CHARACTER_SET_CLIENT"),
				$this->collations("COLLATION_CONNECTION"),
				$this->collations("DATABASE_COLLATION")
			];

			switch ($table) {
				case "CHARACTER_SETS":
					return [$this->collations("DEFAULT_COLLATE_NAME")];
				case "CHECK_CONSTRAINTS":
					return [$this->schemas("CONSTRAINT")];
				case "COLLATIONS":
					return [$characterSets];
				case "COLLATION_CHARACTER_SET_APPLICABILITY":
					return [$collations, $characterSets];
				case "COLUMNS":
					return [$schemas, $tables, $characterSets, $collations];
				case "COLUMN_PRIVILEGES":
				case "COLUMNS_EXTENSIONS":
					return [$schemas, $tables, $columns];
				case "TABLES":
					return [
						$schemas,
						$this->collations("TABLE_COLLATION"),
						["table" => "ENGINES", "source" => ["ENGINE"], "target" => ["ENGINE"]]
					];
				case "SCHEMATA":
					return [
						$this->characterSets("DEFAULT_CHARACTER_SET_NAME"),
						$this->collations("DEFAULT_COLLATION_NAME")
					];
				case "EVENTS":
					return array_merge([$this->schemas("EVENT")], $routineCharsets);
				case "FILES":
				case "PARAMETERS":
					return [
						$this->schemas("SPECIFIC"),
						["table" => "ROUTINES", "source" => ["SPECIFIC_CATALOG", "SPECIFIC_SCHEMA", "SPECIFIC_NAME"], "target" => ["ROUTINE_CATALOG", "ROUTINE_SCHEMA", "SPECIFIC_NAME"]]
					];
				case "PARTITIONS":
				case "TABLE_PRIVILEGES":
				case "TABLES_EXTENSIONS":
					return [$schemas, $tables];
				case "KEY_COLUMN_USAGE":
					return [
						$this->schemas("CONSTRAINT"),
						$schemas,
						$tables,
						$columns,
						$this->schemas("TABLE", "REFERENCED_TABLE"),
						$this->tables("TABLE", "REFERENCED_TABLE"),
						["source" => ["TABLE_CATALOG", "REFERENCED_TABLE_SCHEMA", "REFERENCED_TABLE_NAME", "REFERENCED_COLUMN_NAME"]] + $columns,
					];
				case "REFERENTIAL_CONSTRAINTS":
					return [
						$this->schemas("CONSTRAINT"),
						$this->schemas("UNIQUE_CONSTRAINT"),
						$this->tables("CONSTRAINT", "CONSTRAINT", "TABLE_NAME"),
						$this->tables("CONSTRAINT", "CONSTRAINT", "REFERENCED_TABLE_NAME"),
					];
				case "ROUTINES":
					return array_merge([$this->schemas("ROUTINE")], $routineCharsets);
				case "SCHEMA_PRIVILEGES":
					return [$schemas];
				case "SCHEMATA_EXTENSIONS":
					return [["table" => "SCHEMATA", "source" => ["CATALOG_NAME", "SCHEMA_NAME"], "target" => ["CATALOG_NAME", "SCHEMA_NAME"]]];
				case "STATISTICS":
					return [$schemas, $tables, $columns, $this->schemas("TABLE", "INDEX")];
				case "TABLE_CONSTRAINTS":
					return [
						$this->schemas("CONSTRAINT"),
						$this->schemas("CONSTRAINT", "TABLE"),
						$this->tables("CONSTRAINT", "TABLE"),
					];
				case "TABLE_CONSTRAINTS_EXTENSIONS":
					return [$this->schemas("CONSTRAINT"), $this->tables("CONSTRAINT", "CONSTRAINT", "TABLE_NAME")];
				case "TRIGGERS":
					return array_merge(
						[
							$this->schemas("TRIGGER"),
							$this->schemas("EVENT_OBJECT"),
							$this->tables("EVENT_OBJECT", "EVENT_OBJECT", "EVENT_OBJECT_TABLE"),
						],
						$routineCharsets
					);
				case "VIEWS":
					return [
						$schemas,
						$this->characterSets("CHARACTER_SET_CLIENT"),
						$this->collations("COLLATION_CONNECTION")
					];
				case "VIEW_TABLE_USAGE":
					return [
						$schemas,
						$this->schemas("VIEW"),
						$tables,
						["table" => "VIEWS", "source" => ["VIEW_CATALOG", "VIEW_SCHEMA", "VIEW_NAME"], "target" => ["TABLE_CATALOG", "TABLE_SCHEMA", "TABLE_NAME"]]
					];
			}
		}

		return null;
	}

	private function schemas(string $catalog, ?string $schema = null): array
	{
		return [
			"table" => "SCHEMATA",
			"source" => [$catalog . "_CATALOG", ($schema ?: $catalog) . "_SCHEMA"],
			"target" => ["CATALOG_NAME", "SCHEMA_NAME"]
		];
	}

	private function tables(string $catalog, ?string $schema = null, ?string $table_name = null): array
	{
		$schema = $schema ?: $catalog;

		return [
			"table" => "TABLES",
			"source" => [$catalog . "_CATALOG", $schema . "_SCHEMA", ($table_name ?: $schema . "_NAME")],
			"target" => ["TABLE_CATALOG", "TABLE_SCHEMA", "TABLE_NAME"]
		];
	}

	private function characterSets(string $source): array
	{
		return [
			"table" => "CHARACTER_SETS",
			"source" => [$source],
			"target" => ["CHARACTER_SET_NAME"]
		];
	}

	private function collations(string $source): array
	{
		return [
			"table" => "COLLATIONS",
			"source" => [$source],
			"target" => ["COLLATION_NAME"]
		];
	}
}
