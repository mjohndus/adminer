<?php

namespace AdminNeo;

return [
	// text direction - 'ltr' or 'rtl'
	'ltr' => 'xx',
	// thousands separator - must contain single byte
	',' => 'x',
	'0123456789' => 'xxxxxxxxxx',
	// Editor - date format: $1 yyyy, $2 yy, $3 mm, $4 m, $5 dd, $6 d
	'$1-$3-$5' => 'xx',
	// Editor - hint for date format - use language equivalents for day, month and year shortcuts
	'YYYY-MM-DD' => 'XX',
	// Editor - hint for time format - use language equivalents for hour, minute and second shortcuts
	'HH:MM:SS' => 'XX',

	// Bootstrap.
	'%s must return an array.' => '%s xx.',
	'%s and %s must return an object created by %s method.' => '%s xx %s xx %s.',

	// Login.
	'System' => 'Xx',
	'Server' => 'Xx',
	'Username' => 'Xx',
	'Password' => 'Xx',
	'Permanent login' => 'Xx',
	'Login' => 'Xx',
	'Logout' => 'Xx',
	'Logged as: %s' => 'Xx: %s',
	'Logout successful.' => 'Xx.',
	'Invalid server or credentials.' => 'Xx.',
	'There is a space in the input password which might be the cause.' => 'Xx.',
	'AdminNeo does not support accessing a database without a password, <a href="https://www.adminneo.org/password"%s>more information</a>.' => 'Xx, <a href="https://www.adminneo.org/password"%s>xx</a>.',
	'Database does not support password.' => 'Xx.',
	'Too many unsuccessful logins, try again in %d minute(s).' => ['Xx %d.', 'Xx %d.'],
	'Invalid permanent login, please login again.' => 'Xx.',
	'Invalid CSRF token. Send the form again.' => 'Xx.',
	'If you did not send this request from AdminNeo then close this page.' => 'Xx.',
	'The action will be performed after successful login with the same credentials.' => 'Xx.',

	// Connection.
	'No driver' => 'Xx',
	'Database driver not found.' => 'Xx.',
	'No extension' => 'Xx',
	// %s contains the list of the extensions, e.g. 'mysqli, PDO_MySQL'
	'None of the supported PHP extensions (%s) are available.' => 'Xx (%s).',
	'Connecting to privileged ports is not allowed.' => 'Xx.',
	'Session support must be enabled.' => 'Xx.',
	'Session expired, please login again.' => 'Xx.',
	'%s version: %s through PHP extension %s' => '%s xx: %s xx %s',

	// Settings.
	'Language' => 'Xx',

	'Home' => 'Xx',
	'Refresh' => 'Xx',
	'Info' => 'Xx',
	'More information.' => 'Xx.',

	// Privileges.
	'Privileges' => 'Xx',
	'Create user' => 'Xx',
	'User has been dropped.' => 'Xx.',
	'User has been altered.' => 'Xx.',
	'User has been created.' => 'Xx.',
	'Hashed' => 'Xx',

	// Server.
	'Process list' => 'Xx',
	'%d process(es) have been killed.' => ['%d xx.', '%d xx.'],
	'Kill' => 'Xx',
	'Variables' => 'Xx',
	'Status' => 'Xx',

	// Structure.
	'Column' => 'Xx',
	'Routine' => 'Xx',
	'Grant' => 'Xx',
	'Revoke' => 'Xx',

	// Queries.
	'SQL command' => 'Xx',
	'HTTP request' => 'Xx',
	'%d query(s) executed OK.' => ['%d xx.', '%d xx.'],
	'Query executed OK, %d row(s) affected.' => ['Xx, %d.', 'Xx, %d.'],
	'No commands to execute.' => 'Xx.',
	'Error in query' => 'Xx',
	'Unknown error.' => 'Xx.',
	'Warnings' => 'Xx',
	'ATTACH queries are not supported.' => 'Xx.',
	'Execute' => 'Xx',
	'Stop on error' => 'Xx',
	'Show only errors' => 'Xx',
	'Time' => 'Xx',
	// sprintf() format for time of the command
	'%.3f s' => '%.3f xx',
	'History' => 'Xx',
	'Clear' => 'Xx',
	'Edit all' => 'Xx',

	// Import.
	'Import' => 'Xx',
	'File upload' => 'Xx',
	'From server' => 'Xx',
	'Webserver file %s' => 'Xx %s',
	'Run file' => 'Xx',
	'File does not exist.' => 'Xx.',
	'File uploads are disabled.' => 'Xx.',
	'Unable to upload a file.' => 'Xx.',
	'Maximum allowed file size is %sB.' => 'Xx %sB.',
	'Too big POST data. Reduce the data or increase the %s configuration directive.' => 'Xx %s.',
	'You can upload a big SQL file via FTP and import it from server.' => 'Xx.',
	'File must be in UTF-8 encoding.' => 'Xx.',
	'You are offline.' => 'Xx.',
	'%d row(s) have been imported.' => ['%d xx.', '%d xx.'],

	// Export.
	'Export' => 'Xx',
	'Output' => 'Xx',
	'open' => 'xx',
	'save' => 'xx',
	'Format' => 'Xx',
	'Data' => 'Xx',

	// Databases.
	'Database' => 'Xx',
	'DB' => 'XX',
	'Use' => 'Xx',
	'Invalid database.' => 'Xx.',
	'Alter database' => 'Xx',
	'Create database' => 'Xx',
	'Database schema' => 'Xx',
	'Permanent link' => 'Xx',
	'Database has been dropped.' => 'Xx.',
	'Databases have been dropped.' => 'Xx.',
	'Database has been created.' => 'Xx.',
	'Database has been renamed.' => 'Xx.',
	'Database has been altered.' => 'Xx.',
	// SQLite errors.
	'File exists.' => 'Xx.',
	'Please use one of the extensions %s.' => 'Xx %s.',

	// Schemas (PostgreSQL, MS SQL).
	'Schema' => 'Xx',
	'Schemas' => 'Xx',
	'No schemas.' => 'Xx.',
	'Show schema' => 'Xx',
	'Alter schema' => 'Xx',
	'Create schema' => 'Xx',
	'Schema has been dropped.' => 'Xx.',
	'Schema has been created.' => 'Xx.',
	'Schema has been altered.' => 'Xx.',
	'Invalid schema.' => 'Xx.',

	// Table list.
	'Engine' => 'Xx',
	'engine' => 'xx',
	'Collation' => 'Xx',
	'collation' => 'xx',
	'Data Length' => 'Xx',
	'Index Length' => 'Xx',
	'Data Free' => 'Xx',
	'Rows' => 'Xx',
	'%d in total' => '%d xx',
	'Analyze' => 'Xx',
	'Optimize' => 'Xx',
	'Vacuum' => 'Xx',
	'Check' => 'Xx',
	'Repair' => 'Xx',
	'Truncate' => 'Xx',
	'Tables have been truncated.' => 'Xx.',
	'Move to other database' => 'Xx',
	'Move' => 'Xx',
	'Tables have been moved.' => 'Xx.',
	'Copy' => 'Xx',
	'Tables have been copied.' => 'Xx.',
	'overwrite' => 'xx',

	// Tables.
	'Tables' => 'Xx',
	'Tables and views' => 'Xx',
	'Table' => 'Xx',
	'No tables.' => 'Xx.',
	'Alter table' => 'Xx',
	'Create table' => 'Xx',
	'Table has been dropped.' => 'Xx.',
	'Tables have been dropped.' => 'Xx.',
	'Tables have been optimized.' => 'Xx.',
	'Table has been altered.' => 'Xx.',
	'Table has been created.' => 'Xx.',
	'Table name' => 'Xx',
	'Name' => 'Xx',
	'Show structure' => 'Xx',
	'Column name' => 'Xx',
	'Type' => 'Xx',
	'Length' => 'Xx',
	'Auto Increment' => 'Xx',
	'Options' => 'Xx',
	'Comment' => 'Xx',
	'Default value' => 'Xx',
	'Drop' => 'Xx',
	'Drop %s?' => 'Xx %s?',
	'Are you sure?' => 'Xx?',
	'Size' => 'Xx',
	'Compute' => 'Xx',
	'Move up' => 'Xx',
	'Move down' => 'Xx',
	'Remove' => 'Xx',
	'Maximum number of allowed fields exceeded. Please increase %s.' => 'Xx %s.',

	// Views.
	'View' => 'Xx',
	'Materialized view' => 'Xx',
	'View has been dropped.' => 'Xx.',
	'View has been altered.' => 'Xx.',
	'View has been created.' => 'Xx.',
	'Alter view' => 'Xx',
	'Create view' => 'Xx',

	// Partitions.
	'Partition by' => 'Xx',
	'Partition' => 'Xx',
	'Partitions' => 'Xx',
	'Partition name' => 'Xx',
	'Values' => 'Xx',

	// Indexes.
	'Indexes' => 'Xx',
	'Indexes have been altered.' => 'Xx.',
	'Alter indexes' => 'Xx',
	'Add next' => 'Xx',
	'Index Type' => 'Xx',
	'length' => 'xx',

	// Foreign keys.
	'Foreign keys' => 'Xx',
	'Foreign key' => 'Xx',
	'Foreign key has been dropped.' => 'Xx.',
	'Foreign key has been altered.' => 'Xx.',
	'Foreign key has been created.' => 'Xx.',
	'Target table' => 'Xx',
	'Change' => 'Xx',
	'Source' => 'Xx',
	'Target' => 'Xx',
	'Add column' => 'Xx',
	'Alter' => 'Xx',
	'Add foreign key' => 'Xx',
	'ON DELETE' => 'Xx',
	'ON UPDATE' => 'Xx',
	'Source and target columns must have the same data type, there must be an index on the target columns and referenced data must exist.' => 'Xx.',

	// Routines.
	'Routines' => 'Xx',
	'Routine has been called, %d row(s) affected.' => ['Xx, %d.', 'Xx, %d.'],
	'Call' => 'Xx',
	'Parameter name' => 'Xx',
	'Create procedure' => 'Xx',
	'Create function' => 'Xx',
	'Routine has been dropped.' => 'Xx.',
	'Routine has been altered.' => 'Xx.',
	'Routine has been created.' => 'Xx.',
	'Alter function' => 'Xx',
	'Alter procedure' => 'Xx',
	'Return type' => 'Xx',

	// Events.
	'Events' => 'Xx',
	'Event' => 'Xx',
	'Event has been dropped.' => 'Xx.',
	'Event has been altered.' => 'Xx.',
	'Event has been created.' => 'Xx.',
	'Alter event' => 'Xx',
	'Create event' => 'Xx',
	'At given time' => 'Xx',
	'Every' => 'Xx',
	'Schedule' => 'Xx',
	'Start' => 'Xx',
	'End' => 'Xx',
	'On completion preserve' => 'Xx',

	// Sequences (PostgreSQL).
	'Sequences' => 'Xx',
	'Create sequence' => 'Xx',
	'Sequence has been dropped.' => 'Xx.',
	'Sequence has been created.' => 'Xx.',
	'Sequence has been altered.' => 'Xx.',
	'Alter sequence' => 'Xx',

	// User types (PostgreSQL)
	'User types' => 'Xx',
	'Create type' => 'Xx',
	'Type has been dropped.' => 'Xx.',
	'Type has been created.' => 'Xx.',
	'Alter type' => 'Xx',

	// Triggers.
	'Triggers' => 'Xx',
	'Add trigger' => 'Xx',
	'Trigger has been dropped.' => 'Xx.',
	'Trigger has been altered.' => 'Xx.',
	'Trigger has been created.' => 'Xx.',
	'Alter trigger' => 'Xx',
	'Create trigger' => 'Xx',

	// Table check constraints.
	'Checks' => 'Xx',
	'Create check' => 'Xx',
	'Alter check' => 'Xx',
	'Check has been created.' => 'Xx.',
	'Check has been altered.' => 'Xx.',
	'Check has been dropped.' => 'Xx.',

	// Selection.
	'Select data' => 'Xx',
	'Select' => 'Xx',
	'Functions' => 'Xx',
	'Aggregation' => 'Xx',
	'Search' => 'Xx',
	'anywhere' => 'xx',
	'Sort' => 'Xx',
	'descending' => 'xx',
	'Limit' => 'Xx',
	'Limit rows' => 'Xx',
	'Text length' => 'Xx',
	'Action' => 'Xx',
	'Full table scan' => 'Xx',
	'Unable to select the table' => 'Xx',
	'Search data in tables' => 'Xx',
	'as a regular expression' => 'xx',
	'No rows.' => 'Xx.',
	'%d / ' => '%d / ',
	'%d row(s)' => ['%d xx', '%d xx'],
	'Page' => 'Xx',
	'last' => 'xx',
	'Load more data' => 'Xx',
	'Loading' => 'Xx',
	'Whole result' => 'Xx',
	'%d byte(s)' => ['%d xx', '%d xx'],

	// In-place editing in selection.
	'Modify' => 'Xx',
	'Ctrl+click on a value to modify it.' => 'Xx.',
	'Use edit link to modify this value.' => 'Xx.',

	// Editing.
	'New item' => 'Xx',
	'Edit' => 'Xx',
	'original' => 'xx',
	// label for value '' in enum data type
	'empty' => 'xx',
	'Insert' => 'Xx',
	'Save' => 'Xx',
	'Save and continue edit' => 'Xx',
	'Save and insert next' => 'Xx',
	'Saving' => 'Xx',
	'Selected' => 'Xx',
	'Clone' => 'Xx',
	'Delete' => 'Xx',
	// %s can contain auto-increment value, e.g. ' 123'
	'Item%s has been inserted.' => 'Xx%s.',
	'Item has been deleted.' => 'Xx.',
	'Item has been updated.' => 'Xx.',
	'%d item(s) have been affected.' => ['%d xx.', '%d xx.'],
	'You have no privileges to update this table.' => 'Xx.',

	// Data type descriptions.
	'Numbers' => 'Xx',
	'Date and time' => 'Xx',
	'Strings' => 'Xx',
	'Binary' => 'Xx',
	'Lists' => 'Xx',
	'Network' => 'Xx',
	'Geometry' => 'Xx',
	'Relations' => 'Xx',

	// Editor - data values.
	'now' => 'xx',
	'yes' => 'xx',
	'no' => 'xx',

	// Plugins.
	'One Time Password' => 'Xx',
	'Enter OTP code.' => 'Xx.',
	'Invalid OTP code.' => 'Xx.',
	'Access denied.' => 'Xx.',
];
