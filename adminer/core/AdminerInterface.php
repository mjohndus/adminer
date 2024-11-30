<?php

namespace Adminer;

interface AdminerInterface
{
	public function getConfig(): Config;

	public function setOperators(?array $operators, ?string $likeOperator, ?string $regexpOperator): void;

	public function removeOperator(string $operator): void;

	public function getOperators(): ?array;

	public function getLikeOperator(): ?string;

	public function getRegexpOperator(): ?string;

	public function name();

	public function credentials();

	public function connectSsl();

	public function permanentLogin($create = false);

	public function bruteForceKey();

	public function serverName($server);

	public function database();

	public function databases($flush = true);

	public function schemas();

	public function queryTimeout();

	public function headers();

	public function csp();

	public function head();

	public function css();

	public function loginForm();

	public function loginFormField($name, $heading, $value);

	public function login($login, $password);

	public function tableName($tableStatus);

	public function fieldName($field, $order = 0);

	public function selectLinks($tableStatus, $set = "");

	public function foreignKeys($table);

	public function backwardKeys($table, $tableName);

	public function backwardKeysPrint($backwardKeys, $row);

	public function selectQuery($query, $start, $failed = false);

	public function sqlCommandQuery($query);

	public function rowDescription($table);

	public function rowDescriptions($rows, $foreignKeys);

	public function selectLink($val, $field);

	public function selectVal($val, $link, $field, $original);

	public function editVal($val, $field);

	public function tableStructurePrint($fields);

	public function tablePartitionsPrint($partition_info);

	public function tableIndexesPrint($indexes);

	public function selectColumnsPrint(array $select, array $columns);

	public function selectSearchPrint(array $where, array $columns, array $indexes);

	public function selectOrderPrint(array $order, array $columns, array $indexes);

	public function selectLimitPrint($limit);

	public function selectLengthPrint($text_length);

	public function selectActionPrint($indexes);

	public function selectCommandPrint();

	public function selectImportPrint();

	public function selectEmailPrint($emailFields, $columns);

	public function selectColumnsProcess($columns, $indexes);

	public function selectSearchProcess($fields, $indexes);

	public function selectOrderProcess($fields, $indexes);

	public function selectLimitProcess();

	public function selectLengthProcess();

	public function selectEmailProcess($where, $foreignKeys);

	public function selectQueryBuild($select, $where, $group, $order, $limit, $page);

	public function messageQuery($query, $time, $failed = false);

	public function editRowPrint($table, $fields, $row, $update);

	public function editFunctions($field);

	public function editInput($table, $field, $attrs, $value, $function);

	public function editHint($table, $field, $value);

	public function processInput(?array $field, $value, $function = "");

	public function dumpOutput();

	public function dumpFormat();

	public function dumpDatabase($db);

	public function dumpTable($table, $style, $is_view = 0);

	public function dumpData($table, $style, $query);

	public function dumpFilename($identifier);

	public function dumpHeaders($identifier, $multi_table = false);

	public function importServerPath();

	public function homepage();

	public function navigation($missing);

	public function databasesPrint($missing);

	public function printTablesFilter();

	public function tablesPrint(array $tables);

	public function foreignColumn($foreignKeys, $column): ?array;
}
