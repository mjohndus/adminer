Changelog
=========

AdminNeo 4.17
-------------

### Changes

- Speed up with disabled output buffering (by @vrana)
- Allow creating generated columns (by @vrana)
- MySQL: Display generated value in table structure (by @vrana)
- PostgreSQL, MS SQL, Oracle: Hide table actions for information_schema (by @vrana)
- PostgreSQL: Print errors in export (by @vrana)
- PostgreSQL: Do not alter indexes with expressions (by @vrana)
- PostgreSQL: Display and export ENUM types (by @vrana)
- SQLite: Add command Check tables (by @vrana)
- SQLite: Support CHECK constraint (by @vrana)
- SQLite: Support generated columns (by @vrana)
- MS SQL: Support export (by @vrana)
- MS SQL: Support computed columns (by @vrana)
- MS SQL: Display foreign keys ON UPDATE and ON DELETE (by @vrana)
- MS SQL: Add support for PDO_SQLSRV extension (by @vrana)
- MS SQL: Link help from sys tables (by @vrana)
- MS SQL: Fix highlighting columns as primary keys (by @vrana)
- MS SQL PDO: Support offset (by Takashi SHIRAI)
- CockroachDB: Add support via PostgreSQL driver (by @vrana)
- Hide SQL export if driver doesn't support it (by @vrana)
- New version of design rmSOFT (by @mesaros)

### Bugfixes

- Fix importing multiple SQL files not terminated by semicolon (issue #70)
- Fix JS error in login form if login-servers plugin is used
- Fix custom JUSH colors in alternative designs
- Fix background color of SQL textarea in dark designs
- Skip generated columns in multi-edit (by @vrana)
- PostgreSQL: Compute size of all databases (by @vrana)
- PostgreSQL: Do not alter indexes with expressions (by @vrana)
- PostgreSQL: Fix export of indexes with expressions (by @vrana)
- PostgreSQL: Display ? instead of -1 rows in table overview (by @vrana)
- PostgreSQL: Show accessible databases to non-owners (by @vrana)
- PostgreSQL: Skip editing generated columns (by @vrana)
- SQLite: Display all rows of variable values (by @vrana)
- MS SQL: Fix CSV import (by @vrana)
- MS SQL: Fix altering foreign key (by @vrana)

(Ported relevant changes and fixes from Adminer 5.0.0-5.0.2. Backward compatibility is still kept.)

AdminNeo 4.16.1
---------------

### Changes

- Update German translation (issue #66, by @wintstar)
- Update Slovak translation

### Bugfixes

- Fix including proper dependencies without dark mode support (issue #67)

AdminNeo 4.16
-------------

### Changes

- Use strong encryption for storing login information (by @gildas-ld)
- SQLite: Show all supported pragmas in Variables (by @vrana)
- PostgreSQL: Link user defined types (by @vrana)
- PostgreSQL: Export functions (by @vrana)
- MySQL, PostgreSQL, MS SQL: Support CHECK constraint (by @jkoop, @vrana)
- MySQL: Don't offer empty enum value in edit (by @vrana)
- MySQL 9+: Support vector type (by @vrana)
- Hide collations if empty (by @vrana)
- Hide column options in indexes definition by default (by @vrana)
- Set body width to auto (by @wutsch0)
- Layout corrections on narrow screens (by @vrana)

### Bugfixes

- MySQL: Fix connecting if SSL connection is configured only for MS SQL
- MySQL: Fix links to information_schema help (by @vrana)
- MS SQL: Fix editing rows with datetime column in primary key (issue #61)
- MS SQL: Allow altering table in non-default schema (by @vrana)
- MS SQL: Displaying and changing default values (by @vrana)
- MS SQL: Fix length of nvarchar columns (by @vrana)
- MS SQL: Update doc_links (by @vrana)
- Oracle: Fix foreign key doc link (by @vrana)
- PostgreSQL: Constraint enum values in editing (by @vrana)
- PostgreSQL 8+: Fix exporting table constraints (by @vrana)
- Fix Latvian plurals (by @vrana)
- Fix undefined variable in SQL export (by @vrana)
- Fix links to PostgreSQL docs (by @vrana)
- Fix printing SQL errors as comments in export (by @vrana)
- Editor: Select value of foreign key in edit (by @vrana)
- Keep whitespaces and lines in result table (regression from 4.10)

(Ported relevant changes and fixes from Adminer 4.17.0-4.17.1.)

AdminNeo 4.15 (2025-02-25)
----------------------------

### Changes

- Change project's name to AdminNeo / EditorNeo
- Do not strip "localhost" from page title
- Use autofocus attribute instead of JS function
- Fix links to MySQL docs (by @adrianbj)
- Auto-discover designs in AdminerDesigns plugin (by @tdaguin)
- Separate Collation column in table-structure plugin (by @Denitz)
- PostgreSQL: Preserve whitespace in EXPLAIN (by @vrana)
- PostgreSQL: Support altering auto_increment (by @vrana)
- Oracle: Include tables granted by other user (by Takashi SHIRAI)
- MongoDB: Execute commands against the selected DB (by @Baskkra)
- SimpleDB: Disable XML entity loader (by @vrana)
- Clickhouse: Support for array values (by @morozovsk)
- Correct German translation error (by @TimAnthonyAlexander)
- Disable checking of new AdminNeo version on PHP 7.0 and lower

### Bugfixes

- Fix AdminerEditForeign plugin interrupting other plugins for input fields
- Fix PrettyJsonColumn plugin circular dependency (by @marc-dll)
- Fix PrettyJsonColumn plugin destroying enum fields
- Fix missing cross.gif in compiled Editor (issue #53)
- Fix displaying comments in Alter table form (issue #50)
- MySQL: Fix saving bit(64) values (by @vrana)
- MySQL: Fix mysqli ssl without server certificate (by @zeleznypa)
- SQLite: Fix altering foreign keys (by @vrana)
- SQLite: Fix expressions in default values (by @vrana)
- MS SQL: Foreign keys in non-default schema (by @vrana)
- Handle compilation warnings (by @devinemke)
- Fix the UI of pappu687 for latest version (by @4msar)
- Other fixes of pappu687 design (issue #52, issue #55)

(Ported relevant changes and fixes from Adminer 4.16.0.)

AdminNeo 4.14 (2025-02-02)
----------------------------

### Changes

- Change project's name to AdminerNeo
- Add support for page scrolling while dragging sortable rows (issue #11)
- Update lucas-sandery theme (by @lucas-sandery)
- Switch JsShrink library to a custom fork (issue #17)
- Compile adminer into the "export" directory
- Small JS tuning for better CodeQL analysis

### Bugfixes

- MariaDB: Fix missing uca1400 collations
- PostgreSQL: Fix initial value of exported autoincrement
- PostgreSQL: Fix renaming a database
- Fix warnings in language detection
- Fix link to language files in README.md (issue #18)

Thanks for help with invalid links: @adrianbj.

AdminNeo 4.13 (2025-01-23)
----------------------------

### Changes

- Remove donation link from logout message
- Update German translation (by @wintstar, @odysseuscm)
- Declare compatibility with PHP 8.4
- Remove too broken designs

### Bugfixes

- SQLite: Fix exporting and recreating tables with UNIQUE column constraint
- Fix main visual glitches in designs

AdminNeo 4.12 (2024-11-21)
----------------------------

### New features

- MySQL: Print comments of stored procedures and functions
- MariaDB: Add support for UUID data type (by @vukbgit)
- MS SQL: Allow to set Encrypt and TrustServerCertificate with AdminerLoginSsl plugin (issue #5)
- MS SQL, MongoDB: Connect to localhost with default port if server is not specified
- Compiler: Allow to compile only selected drivers and languages

### Changes

- Change logo link to main page (login)
- Enhance checking of new version
- Update project URL and info
- Rename 'server' driver to 'mysql'
- Compiler: MySQL driver is no longer the required default
- Update Spanish translations (by @isaacpolaino)

### Bugfixes

- PostgreSQL: Fix layout of stored function parameters
- MongoDB: Fix parsing WHERE condition from SQL query
- Fix SQL query code direction if RTL language is used
- Fix disappearing dragged row
- Fix highlighting default submit button in indexes form
- Compiler: Fix translations in plugins
- Compiler: Fix compiled SQLite single-driver Adminer

AdminNeo 4.11 (2024-10-30)
----------------------------

### New features

- PostgreSQL, MS SQL: Show list of schemas in database, unify lists of sequences and user types

### Changes

- Support drag-n-drop moving on touch screens
- Update project information in comments
- Update CS and SK translations
- Show help popup after a short delay
- Small CSS tuning

### Bugfixes

- Fix drag-n-drop moving of function parameters
- MariaDB: Fix several links to documentation pages
- MySQL: Fix highlighting current table in menu on macOS
- MS SQL: Prefix Unicode strings with 'N' so they are treated correctly
- Fix printing error message while validating server URL

AdminNeo 4.10 (2024-10-22)
----------------------------

### New features

- Add drag-n-drop moving of rows in table selection filter
- Add drag-n-drop moving of rows in table editing
- Add removal buttons to table selection filter (by @Roy-Orbison)
- Enable regular expressions when searching data in all tables (by @Roy-Orbison)
- Integrate tables-filter plugin into the base code
- Plugin to auto-include adminer.js when present (by @Roy-Orbison)
- Print username next to the logout button
- Show partitioning info in table structure page
- Show second link for editing a table under the table view

### Changes

- Check new version against GitHub pages (by @adrianbj)
- Add 'Home' to breadcrumb navigation
- Full width design for database select box
- Add table head to the list of indexes
- Hide edited value if selected function will not use it
- Hide arrow buttons in number input fields
- Do not display empty action links in main menu
- Remove deprecated HTML table parameters
- Remove option to hide default values
- Elasticsearch: New condition operators as the combination of query type and match type
- Elasticsearch: Proper formatting of boolean values

### Bugfixes

- Fix missing SQL statement if warnings are printed (regression from 4.9)

AdminNeo 4.9.4 (2024-10-09)
-----------------------------

- Fix the width of inline edit field
- Unify displaying of 'New item' action based on privileges
- Better default value for object definition `(*.*)` while creating new database user
- Firefox: Fix opening a database to the new browser's tab with Ctrl+click
- Remove suppressing errors while reading local files
- More secure random strings on PHP 7+
- Editor: Fix array conversion to string (issue #3)
- Editor: Fix building links with array parameters
- Clean up the code for PHP < 5.6

AdminNeo 4.9.3 (2024-10-02)
-----------------------------

- MySQL, PostgreSQL: Fix queries splitting and string constants
- MySQL: Fix where clause for `JSON` column (by @SeaEagle)
- MySQL: Fix editing user's proxy privilege, refactoring
- MariaDB: Fix comparing `CURRENT_TIMESTAMP` definition while altering a table
- PostgreSQL: Fix editing record that contains a field with `GENERATED ALWAYS` default value
- Fix using undefined Min_DB::info property
- Do not include unchanged `PARTITION BY` definition into `ALTER TABLE` query
- Do not limit unlimited memory while executing queries (by @oksiquatzel)
- Fix number conversion warning while reading INI settings
- Hide invalid edit form if table record is not found
- CSS: Fix background color of `<pre>` used as edit field
- CSS: Bigger font size for code blocks

AdminNeo 4.9.2 (2024-09-18)
-----------------------------

- Fix textarea height for single-line inputs (used typically for SQLite text field)
- Fix undefined property in error message if driver does not support error number (e.g. PostgreSQL)
- PostgreSQL: Fix search fields configuration (regression from 4.9)
- PostgreSQL: Fix search condition for network address types, add macaddr8 type
- PostgreSQL: Fix exporting `CREATE TABLE` query with `GENERATED` default values
- PostgreSQL: Fix exporting `CREATE TABLE` query with sequence default value (by @khoazero123)
- PostgreSQL: Allow to set connection's sslmode with AdminerLoginSsl plugin
- MySQL: Do not show `empty` enum value in strict mode
- Editor: Fix searching in tables
- Add function to retrieve driver name that can be used in plugins (by @Roy-Orbison)

AdminNeo 4.9.1 (2024-09-09)
-----------------------------

- Compatibility with PHP 8.3 (by @Sneda8)
- Fix compiling jush external files
- Improved displaying of long table names in menu
- Replace deprecated `<acronym>` with `<abbr>`
- Add support for translations in plugins
- Add .editorconfig file
- MySQL: Add `unix_timestamp` to functions (by @bbaronSVK)
- PostgreSQL: Show only accessible databases (by @thomas-daniels)
- PostgreSQL: Make data length calculation more accurate (by @caltong)
- PostgreSQL: Fix documentation link for `SERIAL` type
- PostgreSQL: Fix undefined properties on PHP 8
- Elasticsearch: Fix field selection
- AdminerEditForeign: Refactor and fix the plugin
- AdminerLoginOtp: Autocomplete hints for OTP input field, code refactoring

AdminNeo 4.9 (2024-08-19)
---------------------------

- Validate server input in login form
- Validate connection to server in HTTP based drivers
- Move dependencies from submodules to Composer
- Update hydra and pepa-lintha-dark themes
- Elasticsearch 5: Make unusable driver usable again, move it to plugins
- Add new Elasticsearch 7 driver
- Set saving to file as a default export option
- Improve URL and email detection
- Fix AdminerVersionNoverify plugin blocking other plugins to modify HTML head (by @Roy-Orbison)
- Fix several bugs and security issues in AdminerFileUpload plugin
- Skip dump of generated columns (by @Denitz)
- Fix uninitialized string offset (by @adrianbj)
- Update composer.json
- Add script for exporting compiled adminer variants

AdminNeo 4.8.2 (2024-03-16)
-----------------------------

- Support multi-line table comments
- MySQL: Use `ST_SRID()` instead of `SRID()` for MySQL 8 (PR #418)
- PostgreSQL: Don't reset table comments (regression from 4.2.0)
- PostgreSQL PDO: Allow editing rows identified by boolean column (PR #380)
- Update several translations: lv, bn, fr, it, nl, ru, cs, sk
- Allow responsive styles on larger devices (by @lucas-sandery)

Adminer 4.8.1 (2021-05-14)
--------------------------

- Internet Explorer or PDO in ## Adminer 4.7.8-4.8.0: Fix XSS in doc_link (bug #797)
- Fix more PHP 8 warnings (bug #781)
- Avoid PHP warnings with PDO drivers (bug #786, regression from 4.7.8)
- MySQL: Allow moving views to other DB and renaming DB with views (bug #783)
- MariaDB: Do not treat sequences as views (PR #416)
- PostgreSQL: Support UPDATE OF triggers (bug #789)
- PostgreSQL: Support triggers with more events (OR)
- PostgreSQL: Fix parsing of foreign keys with non-ASCII column names
- PostgreSQL < 10 PDO: Avoid displaying GENERATED ALWAYS BY IDENTITY everywhere (bug #785, regression from 4.7.9)
- SQLite: Fix displayed types (bug #784, regression from 4.8.0)

Adminer 4.8.0 (2021-02-10)
--------------------------

- Support function default values in insert (bug #713)
- Allow SQL pseudo-function in insert
- Skip date columns for non-date values in search anywhere
- Add DB version to comment in export
- Support PHP 8 in create table (regression from 4.7.9)
- MySQL 8: Fix EXPLAIN in SQL command
- PostgreSQL: Create PRIMARY KEY for auto increment columns
- PostgreSQL: Avoid exporting empty sequence last value (bug #768)
- PostgreSQL: Do not show triggers from other schemas (PR #412)
- PostgreSQL: Fix multi-parameter functions in default values (bug #736)
- PostgreSQL: Fix displaying NULL bytea fields
- PostgreSQL PDO: Do not select NULL function for false values in edit
- Oracle: Alter indexes
- Oracle: Count tables
- Oracle: Import from CSV
- Oracle: Fix column size with string type
- MongoDB: Handle errors
- SimpleDB, Firebird, ClickHouse: Move to plugin

Adminer 4.7.9 (2021-02-07)
--------------------------

- Fix XSS in browsers which don't encode URL parameters (bug #775, regression from 4.7.0)
- Elasticsearch, ClickHouse: Do not print response if HTTP code is not 200
- Don't syntax highlight during IME composition (bug #747)
- Quote values with leading and trailing zeroes in CSV export (bug #777)
- Link URLs in SQL command (PR #411)
- Fix displayed foreign key columns from other DB (bug #766)
- Re-enable PHP warnings (regression from 4.7.8)
- MySQL: Do not export names in quotes with sql_mode='ANSI_QUOTES' (bug #749)
- MySQL: Avoid error in PHP 8 when connecting to socket (PR #409)
- MySQL: Don't quote default value of text fields (bug #779)
- PostgreSQL: Export all FKs after all CREATE TABLE (PR #351)
- PostgreSQL: Fix dollar-quoted syntax highlighting (bug #738)
- PostgreSQL: Do not show view definition from other schema (PR #392)
- PostgreSQL: Use bigserial for bigint auto increment (bug #765, regression from 3.0.0)
- PostgreSQL PDO: Support PgBouncer, unsupport PostgreSQL < 9.1 (bug #771)
- PostgreSQL 10: Support GENERATED ALWAYS BY IDENTITY (PR #386)
- PostgreSQL 10: Support partitioned tables (PR #396)
- PostgreSQL 11: Create PRIMARY KEY for auto increment columns
- SQLite: Set busy_timeout to 500
- MS SQL: Don't truncate comments to 30 chars (PR #376)
- Elasticsearch 6: Fix displaying type mapping (PR #402)
- MongoDB: Fix password-less check in the mongo extension (PR #405)
- Editor: Cast to string when searching (bug #325)
- Editor: Avoid trailing dot in export filename

Adminer 4.7.8 (2020-12-06)
--------------------------

- Support PHP 8
- Disallow connecting to privileged ports (bug #769)

Adminer 4.7.7 (2020-05-11)
--------------------------

- Fix open redirect if Adminer is accessible at //adminer.php%2F@

Adminer 4.7.6 (2020-01-31)
--------------------------

- Speed up alter table form (regression from 4.4.0)
- Fix clicking on non-input fields in alter table (regression from 4.6.2)
- Display time of procedure execution
- Disallow connecting to ports > 65535 (bug #730)
- MySQL: Always set foreign_key_checks in export
- PostgreSQL: Support exporting views
- Editor: Fix focusing foreign key search in select

Adminer 4.7.5 (2019-11-13)
--------------------------

- Add id="" to cells with failed inline edit (bug #708)
- PostgreSQL: Fix getting default value in PostgreSQL 12 (bug #719)
- PostgreSQL, Oracle: Set schema for EXPLAIN queries in SQL command (bug #706)
- ClickHouse: SQL command
- Swedish translation

Adminer 4.7.4 (2019-10-22)
--------------------------

- Fix XSS if Adminer is accessible at URL /data:

Adminer 4.7.3 (2019-08-27)
--------------------------

- Allow editing foreign keys pointing to tables in other database/schema (bug #694)
- Fix blocking of concurrent instances in PHP >7.2 (bug #703)
- MySQL: Speed up displaying tables in large databases (bug #700, regression from 4.7.2)
- MySQL: Allow editing rows identified by negative floats (bug #695)
- MySQL: Skip editing generated columns
- SQLite: Quote strings stored in integer columns in export (bug #696)
- SQLite: Handle error in altering table (bug #697)
- SQLite: Allow setting auto increment for empty tables
- SQLite: Preserve auto increment when recreating table
- MS SQL: Support foreign keys to other DB
- MongoDB: Allow setting authSource from environment variable

Adminer 4.7.2 (2019-07-18)
--------------------------

- Do not attempt logging in without password (bug #676)
- Stretch footer over the whole table width (bug #624)
- Allow overwriting tables when copying them
- Fix displaying SQL command after Save and continue edit
- Cache busting for adminer.css
- MySQL: Fix displaying multi-columns foreign keys (bug #675, regression from 4.7.0)
- MySQL: Fix creating users and changing password in MySQL 8 (bug #663)
- MySQL: Pass SRID to GeomFromText
- PostgreSQL: Fix setting column comments on new table
- PostgreSQL: Display definitions of materialized views (bug #682)
- PostgreSQL: Fix table status in PostgreSQL 12 (bug #683)
- MS SQL: Support comments
- Elasticsearch: Fix setting number of rows

Adminer 4.7.1 (2019-01-24)
--------------------------

- Display the tables scrollbar (bug #647)
- Remember visible columns in Create Table form (bug #493)
- Add autocomplete attributes to login form
- PHP <5.4 compatibility even with ClickHouse enabled (regression from 4.7.0)
- SQLite: Hide server field in login form
- Editor: Allow disabling boolean fields in PostgreSQL (bug #640)

Adminer 4.7.0 (2018-11-24)
--------------------------

- Simplify storing executed SQL queries to bookmarks
- Warn when using password with leading or trailing spaces
- Hide import from server if importServerPath() returns an empty string
- Fix inline editing of empty cells (regression from 4.6.3)
- Allow adding more than two indexes and forign key columns at a time (regression from 4.4.0)
- Avoid overwriting existing tables when copying tables (bug #642)
- Fix function change with set data type
- Increase username maxlength to 80 (bug #623)
- Make maxlength in all fields a soft limit
- Make tables horizontally scrollable
- MySQL: Support foreign keys created with ANSI quotes (bug #620)
- MySQL: Recognize ON UPDATE current_timestamp() (bug #632, bug #638)
- MySQL: Descending indexes in MySQL 8 (bug #643)
- PostgreSQL: Quote array values in export (bug #621)
- PostgreSQL: Export DESC indexes (bug #639)
- PostgreSQL: Support GENERATED BY DEFAULT AS IDENTITY in PostgreSQL 10
- MS SQL: Pass database when connecting
- ClickHouse: Connect, databases list, tables list, select, SQL command
- Georgian translation

Adminer 4.6.3 (2018-06-28)
--------------------------

- Disallow using password-less databases
- Copy triggers when copying table
- Stop session before connecting
- Simplify running slow queries
- Decrease timeout for running slow queries from 5 seconds to 2 seconds
- Fix displaying info about non-alphabetical objects (bug #599)
- Use secure cookies on HTTP if session.cookie_secure is set
- PDO: Support binary fields download
- MySQL: Disallow LOAD DATA LOCAL INFILE
- MySQL: Use CONVERT() only when searching for non-ASCII (bug #603)
- MySQL: Order database names in MySQL 8 (bug #613)
- PostgreSQL: Fix editing data in views (bug #605, regression from 4.6.0)
- PostgreSQL: Do not cast date/time/number/uuid searches to text (bug #608)
- PostgreSQL: Export false as 0 in PDO (bug #619)
- MS SQL: Support port with sqlsrv
- Editor: Do not check boolean checkboxes with false in PostgreSQL (bug #607)

Adminer 4.6.2 (2018-02-20)
--------------------------

- Semi-transparent border on table actions
- Shorten JSON values in select (bug #594)
- Speed up alter table form (regression from 4.4.0)
- Store current version without authentication and in Editor
- PostgreSQL: Fix exporting string default values
- PostgreSQL: Fix exporting sequences in PostgreSQL 10
- PostgreSQL: Add IF EXISTS to DROP SEQUENCE in export (bug #595)
- Editor: Fix displaying of true boolean values (regression from 4.5.0)

Adminer 4.6.1 (2018-02-09)
--------------------------

- Sticky position of table actions
- Speed up rendering of long tables (regression from 4.4.0)
- Display notification about performing action after relogin
- Add system tables help links
- MySQL: Support non-utf8 charset in search in column
- MySQL: Support geometry in MySQL 8 (bug #574)
- MariaDB: Links to documentation
- SQLite: Allow deleting PRIMARY KEY from tables with auto increment
- PostgreSQL: Support binary files in bytea fields
- PostgreSQL: Don't treat interval type as number (bug #474)
- PostgreSQL: Cast to string when searching using LIKE (bug #325)
- PostgreSQL: Fix condition for selecting no rows
- PostgreSQL: Support TRUNCATE+INSERT export
- Customization: Support connecting to MySQL via SSL
- Customization: Allow specifying server name displayed in breadcrumbs

Adminer 4.6.0 (2018-02-05)
--------------------------

- Fix counting selected rows after going back to select page
- PHP <5.3 compatibility even with Elasticsearch enabled
- Fully support functions in default values
- Stop redirecting links via adminer.org
- Support X-Forwarded-Prefix
- Display options for timestamp columns when creating a new table
- Disable autocompleting password on create user page
- Use primary key to edit rows even if not selected
- MySQL, PostgreSQL: Display warnings
- MySQL: Add floor and ceil select functions
- MySQL: Add FIND_IN_SET search operator
- MariaDB: Support JSON since MariaDB 10.2
- SQLite, PostgreSQL: Limit rows in data manipulation without unique key
- PostgreSQL: Support routines
- PostgreSQL: Allow editing views with uppercase letters (bug #467)
- PostgreSQL: Allow now() as default value (bug #525)
- SimpleDB: Document that allow_url_fopen is required
- Malay translation

Adminer 4.5.0 (2018-01-24)
--------------------------

- Display name of the object in confirmation when dropping it
- Display newlines in column comments (bug #573)
- Support current_timestamp() as default of time fields (bug #572)
- Hide window.opener from pages opened in a new window (bug #561)
- Display error when getting row to edit
- Store current Adminer version server-side to avoid excessive requests
- Adminer: Fix Search data in tables (regression from 4.4.0)
- CSP: Allow any styles, images, media and fonts, disallow base-uri
- MySQL: Support geometry in MySQL 8 (bug #574)
- MySQL: Support routines with comments in parameters (bug #460)
- MariaDB: Support fulltext and spatial indexes in InnoDB (bug #583)
- SQLite: Enable foreign key checks
- PostgreSQL: Respect NULL default value
- PostgreSQL: Display foreign tables (bug #576)
- PostgreSQL: Do not export triggers if not requested
- PostgreSQL: Export DROP SEQUENCE if dropping table
- PostgreSQL: Display boolean values as code (bug #562)
- MS SQL: Support freetds
- non-MySQL: Avoid CONVERT() (bug #509)
- Elasticsearch: Insert, update, delete
- MongoDB: Support mongodb PHP extension
- Editor: Fix displaying of false values in PostgreSQL (bug #568)

Adminer 4.4.0 (2018-01-17)
--------------------------

- Add Content Security Policy
- Disallow scripts without nonce
- Rate limit password-less login attempts from the same IP address
- Disallow connecting to privileged ports
- Add nosniff header
- PHP 7.1: Prevent warning when using empty limit
- PHP 7.2: Prevent warning when searching in select
- MySQL: Remove dedicated view for replication status (added in 4.3.0)
- PostgreSQL: Sort table names (regression from 4.3.1)
- Editor: Don't set time zone from PHP, fixes DST
- Editor: Display field comment's text inside [] only in edit form
- Editor: Fix double-click on database page
- Editor: Fix Search data in tables
- Customization: Always send security headers
- Hebrew translation

Adminer 4.3.1 (2017-04-14)
--------------------------

- Fix permanent login after logout (bug #539)
- Fix SQL command autofocus (regression from 4.0.0)
- PostgreSQL: Support JSON and JSONB data types
- PostgreSQL: Fix index size computation in PostgreSQL < 9.0 (regression from 4.3.0)
- PostgreSQL: Fix nullable fields in export

Adminer 4.3.0 (2017-03-15)
--------------------------

- Make maxlength in edit fields a soft limit
- Add accessibility labels
- Add Cache-Control: immutable to static files
- MySQL: Support MySQL 8
- MySQL: Support JSON data type
- MySQL: Add dedicated view for replication status
- MySQL: Support spatial indexes
- PostgreSQL: Export
- PostgreSQL: Don't treat partial indexes as unique
- MS SQL: Support pdo_dblib
- Elasticsearch: Support HTTPS by inputting https://server

Adminer 4.2.5 (2016-06-01)
--------------------------

- Fix remote execution in SQLite query
- SQLite: Require credentials to use
- PostgreSQL: Support KILL

Adminer 4.2.4 (2016-02-06)
--------------------------

- Fix remote execution in SQLite query
- MySQL: Support PHP 7
- Bosnian translation
- Finnish translation

Adminer 4.2.3 (2015-11-15)
--------------------------

- Fix XSS in indexes (non-MySQL only)
- Support PHP 7
- Greek translation
- Galician translation
- Bulgarian translation

Adminer 4.2.2 (2015-08-05)
--------------------------

- Fix XSS in alter table (found by HP Fortify)

Adminer 4.2.1 (2015-03-10)
--------------------------

- Send referrer header to the same domain
- MySQL: Fix usage of utf8mb4 if the client library doesn't support it
- MySQL: Use utf8mb4 in export only if required
- SQLite: Use EXPLAIN QUERY PLAN in SQL query

Adminer 4.2.0 (2015-02-07)
--------------------------

- Fix XSS in login form (bug #436)
- Allow limiting number of displayed rows in SQL command
- Fix reading routine column collations
- Unlock session in alter database
- Make master key unreadable to others (bug #410)
- Fix edit by long non-utf8 string
- Specify encoding for PHP 5.6 with invalid default_charset
- Fix saving NULL value, bug since ## Adminer 4.0.3
- Send 403 for auth error
- Report offline and other AJAX errors (bug #419)
- Don't alter table comment if not changed
- Add links to documentation on table status page
- Fix handling of 64 bit numbers in auto_increment
- Add referrer: never meta tag
- MySQL: Use utf8mb4 if available
- MySQL: Support foreign keys in NDB storage
- PostgreSQL: Materialized views
- SQLite: Support CURRENT_* default values (bug #417)
- Elasticsearch: Use where in select
- Firebird: Alpha version
- Danish translation

Adminer 4.1.0 (2014-04-18)
--------------------------

- Provide size of all databases in the overview
- Prevent against brute force login attempts from the same IP address
- Compute number of tables in the overview explicitly
- Display edit form after error in clone or multi-edit
- Trim trailing non-breaking spaces in SQL textarea
- Display time of the select command
- Print elapsed time in HTML instead of SQL command comment
- Improve gzip export ratio (bug #387)
- Use rel="noreferrer" for external links, skip adminer.org redirect in WebKit
- MySQL: Fix enum types in routines (bug #391)
- MySQL: Fix editing rows by binary values, bug since Adminer 3.7.1
- MySQL: Respect daylight saving time in dump, bug since Adminer 3.6.4
- MySQL 5.6.5+: Support ON UPDATE on datatime column
- SQLite: Support UPDATE OF triggers
- SQLite: Display auto-created unique indexes, bug since Adminer 3.5.0
- Editor: Fix login() method, bug since ## Adminer 4.0.0
- Translate numbers in ar, bn, fa
- Vietnamese translation

Adminer 4.0.3 (2014-02-01)
--------------------------

- MongoDB: insert, truncate, indexes
- SimpleDB, MongoDB: insert more fields at once
- SQLite: Fix creating table and altering primary key, bug since ## Adminer 4.0.0
- Don't store invalid credentials to session, bug since ## Adminer 4.0.0
- Norweigan translation

Adminer 4.0.2 (2014-01-11)
--------------------------

- Fix handling of long text in SQL textarea
- Support paste to SQL textarea in Opera

Adminer 4.0.1 (2014-01-11)
--------------------------

- Don't use type=number if a SQL function is used
- Disable highlighting in textareas with long texts
- Don't autofocus SQL textarea in Firefox
- Don't link NULL foreign key values
- Fix displaying images in Editor, bug since Adminer 3.6.0
- Fix uploading files, bug since ## Adminer 4.0.0
- MongoDB: Count tables, display ObjectIds, sort, limit, offset, count rows
- Elasticsearch: Fix compiled version, create and drop DB, drop table

Adminer 4.0.0 (2014-01-08)
--------------------------

- Driver for SimpleDB, MongoDB and Elasticsearch
- Highlight SQL in textareas
- Save and continue edit by AJAX
- Split SQL command and import
- Add a new column in alter table on key press
- Mark length as required for strings
- Add label to database selection, move logout button
- Add button for dropping an index
- Display number of selected rows
- Add links to documentation
- Disable underlining links
- Differentiate views in navigation
- Improve speed of CSV import
- Keep form values after refresh in Firefox
- Mark auto_increment fields in edit
- Don't append newlines to uploaded files, bug since Adminer 3.7.0
- Don't display SQL edit form on Ctrl+click on the select query, introduced in Adminer 3.6.4
- Use MD5 for editing long keys only in supported drivers, bug since Adminer 3.6.4
- Don't reset column when searching for an empty value with Enter, bug since Adminer 3.6.4
- Encrypt passwords stored in session by a key stored in cookie
- Don't execute external JavaScript when verifying version
- Include JUSH in the compiled version
- Protect CSRF token against BREACH
- Non-MySQL: View triggers
- SQLite: Allow editing primary key
- SQLite: Allow editing foreign keys
- PostgreSQL: Fix handling of nextval() default values
- PostgreSQL: Support creating array columns
- Customization: Provide schemas()
- Portugal Portuguese translation
- Thai translation

Adminer 3.7.1 (2013-06-29)
--------------------------

- Increase click target for checkboxes
- Use shadow for highlighting default button
- Don't use LIMIT 1 if inline updating unique row
- Don't check previous checkbox on added column in create table (bug #326)
- Order table list by name
- Verify UTF-8 encoding of CSV import
- Notify user about expired master password for permanent login
- Highlight table being altered in navigation
- Send 404 for invalid database and schema
- Fix title and links on invalid table pages
- Display error on invalid alter table and view pages
- MySQL: Speed up updating rows without numeric or UTF-8 primary key
- Non-MySQL: Descending indexes
- PostgreSQL: Fix detecting oid column in PDO
- PostgreSQL: Handle timestamp types (bug #324)
- Add Korean translation

Adminer 3.7.0 (2013-05-19)
--------------------------

- Allow more SQL files to be uploaded at the same time
- Print run time next to executed queries
- Don't drop original view and routine before creating the new one
- Highlight default submit button
- Add server placeholder to login form
- Disable SQL export when applying functions in select
- Allow using lang() in plugins (customization)
- Remove bzip2 compression support
- Constraint memory used in TAR export
- Allow exporting views dependent on each other (bug #214)
- Fix resetting search (bug #318)
- Don't use LIMIT 1 if updating unique row (bug #320)
- Restrict editing rows without unique identifier to search results
- Display navigation below main content on mobile browsers
- Get number of rows on export page asynchronously
- Respect 'whole result' even if some rows are checked (bug #339 since Adminer 3.7.0)
- MySQL: Optimize create table page and Editor navigation
- MySQL: Display bit type as binary number
- MySQL: Improve export of binary data types
- MySQL: Fix handling of POINT data type (bug #282)
- MySQL: Don't export binary and geometry columns twice in select
- MySQL: Fix EXPLAIN in MySQL < 5.1, bug since Adminer 3.6.4
- SQLite: Export views
- PostgreSQL: Fix swapped NULL and NOT NULL columns in PDO

Adminer 3.6.4 (2013-04-26)
--------------------------

- Display pagination on a fixed position
- Increase default select limit to 50
- Display SQL edit form on Ctrl+click on the select query
- Display SQL history from newest
- Recover original view, trigger, routine if creating fails
- Do not store plain text password to history in creating user
- Selectable ON UPDATE CURRENT_TIMESTAMP field in create table
- Open database to a new window after selecting it with Ctrl
- Clear column name after resetting search (bug #296)
- Explain partitions in SQL query (bug #294)
- Allow loading more data with inline edit (bug #299)
- Stay on the same page after deleting rows (bug #301)
- Respect checked tables in export filename (bug #133)
- Respect PHP configuration max_input_vars
- Fix unsetting permanent login after logout
- Disable autocapitalize in identifiers on mobile browsers
- MySQL: Compatibility with MySQL 5.6
- MySQL: Move ALTER export to plugin
- MySQL: Use numeric time zone in export
- MySQL: Link processlist documentation
- SQLite: Export indexes

Adminer 3.6.3 (2013-01-23)
--------------------------

- Display error code in SQL query
- Allow specifying external links
- Treat Meta key same as Ctrl
- Fix XSS in displaying non-UTF-8 strings
- Don't use type="number" for decimal numbers

Adminer 3.6.2 (2012-12-21)
--------------------------

- Edit values by Ctrl+click instead of double click
- Don't select row on double click
- Support NULL in routine calls
- Shorten printed values in varchar fields
- Display table default values on wide screens
- Display date in SQL history
- HTML5 input fields
- Display warning for missing UPDATE privilege
- Fix switching language on first load
- Support enabled mbstring.func_overload
- MySQL: Prolong comment length since MySQL 5.5
- PostgreSQL: Fix process list in version 9.2
- MS SQL: Support databases starting with number

Adminer 3.6.1 (2012-09-17)
--------------------------

- Fix compiled version on PHP with multibyte support

Adminer 3.6.0 (2012-09-16)
--------------------------

- Load more data in select
- Edit strings with \n in textarea
- Time out long running database list and select count
- Use VALUES() in INSERT+UPDATE export
- Style logout button as link
- Store selected database to permanent login
- Ctrl+click and Shift+click on button opens form to a blank window
- Switch language by POST
- Compress translations
- MySQL: Support geometry data types
- selectQueryBuild() method (customization)
- Serbian translation

Adminer 3.5.1 (2012-08-10)
--------------------------

- Support same name fields in CSV export
- Support Shift+click in export

Adminer 3.5.0 (2012-08-05)
--------------------------

- Links for column search in select
- Autohide column context menu in select
- Autodisplay long table names in tables list
- Display assigned auto_increment after clone
- SQLite: Full alter table
- SQLite: Better editing in tables without primary key
- SQLite: Display number of rows in database overview

Adminer 3.4.0 (2012-06-30)
--------------------------

- Link to descending order
- Shift+click on checkbox to select consecutive rows
- Print current time next to executed SQL queries
- Warn about selecting data without index
- Allow specifying database in login form
- Link to original table in EXPLAIN of SELECT * FROM table t
- Format numbers in translations
- MySQL: inform about disabled event_scheduler
- SQLite: support binary data
- PostgreSQL: approximate row count in table overview
- PostgreSQL: improve PDO support in SQL command
- Oracle: schema, processlist, table overview numbers
- Simplify work with NULL values (customization)
- Use namespace in login form (customization)
- Customizable export filename (customization)
- Replace JSMin by better JavaScript minifier
- Don't use AJAX links and forms
- Indonesian translation
- Ukrainian translation
- Bengali translation

Adminer 3.3.4 (2012-03-07)
--------------------------

- Foreign keys default actions (bug #188)
- SET DEFAULT foreign key action
- Fix minor parser bug in SQL command with webserver file
- Ctrl+click on button opens form to a blank window
- Trim table and column names (bug #195)
- Error message with no response from server in AJAX
- Esc to cancel AJAX request
- Move AJAX loading indicator to the right
- Don't quote bit type in export
- Don't check row while selecting text
- Fix invalid references line position on Database schema
- Disable selecting text on Database schema
- Ability to disable export (customization)
- Extensible list of databases (customization)
- MySQL: set autocommit after connect
- SQLite, PostgreSQL: vacuum
- SQLite, PostgreSQL: don't use LIKE for numbers (bug #202)
- PostgreSQL: fix alter foreign key
- PostgreSQL over PDO: connect if the eponymous database does not exist (bug #185)
- Boolean search (Editor)
- Persian translation

Adminer 3.3.3 (2011-08-12)
--------------------------

- Highlight checked rows
- Titles of links in database overview and navigation
- Fix trigger export (SQLite)
- Default trigger statement (SQLite, PostgreSQL)
- Remove search by expression (PostgreSQL, MS SQL)

Adminer 3.3.2 (2011-08-08)
--------------------------

- Display error with non-existent row in edit
- Fix minor parser bug in SQL command with webserver file
- Fix SQL command Stop on error
- Don't scroll with AJAX select order and alter move column
- Fast number of rows with big tables (PostgreSQL)
- Sort databases and schemas (PostgreSQL)

Adminer 3.3.1 (2011-07-27)
--------------------------

- Fix XSS introduced in Adminer 3.2.0
- Fix altering default values (PostgreSQL)
- Process list (PostgreSQL)

Adminer 3.3.0 (2011-07-19)
--------------------------

- Use Esc to disable in-place edit
- Shortcut for database privileges
- Editable index names
- Append new index with auto index selection (bug #138)
- Preserve original timestamp value in multiple update (bug #158)
- Bit type default value
- Display foreign key name in tooltip
- Display default column value in table overview
- Display column collation in tooltip
- Keyboard shortcuts: Alt+Shift+1 for homepage, Ctrl+Shift+Enter for Save and continue edit
- Show only errors with Webserver file SQL command
- Remember select export and import options
- Link tables and indexes from SQL command EXPLAIN (MySQL)
- Display error with all wrong SQL commands (MySQL)
- Display foreign keys from other schemas (PostgreSQL)
- Pagination support (Oracle)
- Autocomplete for big foreign keys (Editor)
- Display name of the referenced record in PostgreSQL (Editor)
- Prefer NULL to empty string (Editor, bug #162)
- Display searched columns (Editor)
- Customizable favicon (customization)
- Method name can return a link (customization)
- Easier sending of default headers (customization)
- Lithuanian and Romanian translation

Adminer 3.2.2 (2011-03-28)
--------------------------

- Fix AJAX history after reload

Adminer 3.2.1 (2011-03-23)
--------------------------

- Ability to save expression in edit
- Respect default database collation (bug #119)
- Don't export triggers without table (bug #123)
- Esc to focus next field in Tab textarea
- Send forms by Ctrl+Enter on `<select>`
- Enum editor and textarea Ctrl+Enter working in IE
- AJAX forms in Google Chrome
- Parse UTF-16 and UTF-8 BOM in all text uploads
- Display ; in history
- Use DELIMITER in history
- Show databases even with skip_show_database in MySQL 5
- Disable maxlength with functions in edit
- Better placement of AJAX icon
- Table header in CSV export (Editor)
- Time format hint (Editor)
- Respect order after search (Editor)
- Set MySQL time zone by PHP setting (Editor)
- Allow own code in `<head>` (customization)
- Polish translation

Adminer 3.2.0 (2011-02-24)
--------------------------

- Get long texts and slow information by AJAX
- Most links and forms by AJAX in browsers with support for history.pushState
- Copy tables
- Ability to search by expression in select
- Export SQL command result (bug #99)
- Focus first field with insert (bug #106)
- Permanent link in schema
- Display total time in show only errors mode in SQL command
- History: edit all
- MS SQL: auto primary and foreign key
- SQLite: display 0
- Create table default data type: int
- Focus upper/lower fields by Ctrl+Up/Ctrl+Down
- Hide credentials for SQLite
- Utilize oids in PostgreSQL
- Homepage customization
- Use IN for search in numeric fields (Editor)
- Use password input for _md5 and _sha1 fields (Editor)
- Work without session.use_cookies (bug #107)
- Fix saving schema to cookie in Opera
- Portuguese, Slovenian and Turkish translation

Adminer 3.1.0 (2010-11-16)
--------------------------

- TSV export and import
- Customizable export
- Option to show only errors in SQL command
- Link to bookmark SQL command
- Recognize $$ strings in SQL command (PostgreSQL)
- Highlight and edit SQL command in processlist
- Always display all drivers
- Timestamp at the end of export
- Link to refresh database cache (bug #96)
- Support for virtual foreign keys
- Disable XSS "protection" of IE8
- Immunity against zend.ze1_compatibility_mode (bug #86)
- Fix last page with empty result set
- Arabic translation and RTL support
- Dual licensing: Apache or GPL

Adminer 3.0.1 (2010-10-18)
--------------------------

- Send the form by Ctrl+Enter in all textareas
- Disable creating SQLite databases with extension other than db, sdb, sqlite
- Ability to use Adminer in a frame through customization
- Catalan translation
- MS SQL 2005 compatibility
- PostgreSQL: connect if the eponymous database does not exist

Adminer 3.0.0 (2010-10-15)
--------------------------

- Drivers for MS SQL, SQLite, PostgreSQL, Oracle
- Allow concurrent logins on the same server
- Allow permanent login without customization
- In-place editation in select
- Foreign key options in Table creation
- Treat binary type as hex
- Show number of tables in server overview
- Operator LIKE %%
- Remember export parameters in cookie
- Allow semicolon as CSV separator
- Schemas, sequences and types support (PostgreSQL)
- Autofocus username in login form
- Allow to insert Tab in SQL textareas and send the form by Ctrl+Enter
- Disable spellchecking in SQL textareas
- Display auto_increment value of inserted item
- Allow disabling auto_increment value export
- Prefill auto_increment column name
- Ability to jump to any page in select by JavaScript
- Display comment in table overview
- Link last page above data in select
- Link table names in SQL queries
- Hungarian, Japanese and Tamil translation
- Defer table information in database overview to JavaScript (performance)
- Big tables optimizations (performance)

Adminer 2.3.2 (2010-04-21)
--------------------------

- Fix COUNT(*) link
- Fix Save and continue edit

Adminer 2.3.1 (2010-04-06)
--------------------------

- Add Drop button to Alter pages (regression from 2.0.0)
- Link COUNT(*) result to listing
- Newlines in select query edit
- Return to referrer after edit
- Respect session.auto_start (bug #42)

Adminer 2.3.0 (2010-02-26)
--------------------------

- Support for permanent login (customization required)
- Search in all tables
- Show status variables
- Print sums in tables overview
- Add Delete button to Edit page (regression from 2.0.0)
- Print error summary in SQL command
- Simplify SQL syntax error message
- Show SQL query info if available
- Delete length when changing type in alter table
- Ability to check table prefix in export

Adminer 2.2.1 (2009-11-26)
--------------------------

- Highlight current links
- Improve concurrency
- Move number of tables to DB info (performance)
- Search by foreign keys (Editor)
- Link new item in backward keys (Editor)

Adminer 2.2.0 (2009-10-20)
--------------------------

- Database list - bulk drop, number of tables
- Enlarge field for enum and set definition
- Display table links above table structure
- Link URLs in select
- Display number of manipulated rows in JS confirm
- Set required memory in SQL command
- Fix removed default in ALTER
- Display whitespace in texts (bug #11)
- ClickJacking protection in modern browsers
- E-mail attachments (Editor)
- Optional year in date (Editor)
- Search operators (Editor)
- Align numbers to right in select (Editor)
- Move `<h1>` to $adminer->navigation (customization)
- Rename get_dbh to connection (customization)

Adminer 2.1.0 (2009-09-12)
--------------------------

- Edit default values directly in table creation
- Execute SQL file stored on server disk
- Display EXPLAIN in SQL query
- Compress export and import
- Display column comments in table overview
- Use ON DUPLICATE KEY UPDATE for CSV import
- Print ALTER export instead of executing it
- Click on row selects it
- Fix Editor date format
- Fix long SQL query crash (bug #3)
- Speed up simple alter table
- Traditional Chinese translation

Adminer 2.0.0 (2009-08-06)
--------------------------

- Editor: User friendly data editor
- Customization: Adminer class
- Create single column foreign key in table structure
- Table relations (Editor)
- Send e-mails (Editor)
- Display images in blob (Editor)
- Localize date (Editor)
- Treat tinyint(1) as bool (Editor)
- Divide types to groups in table creation
- Link e-mails in select
- Show type in field name title
- Preselect now() for timestamp columns
- Clear history
- Prefill insert by foreign key searches
- Print number of rows in SQL command
- Remove Delete button from Edit page - use mass operation for it
- Faster multiple update, clone and delete
- Faster table list in navigation
- Download version checker and syntax highlighting from HTTPS
- Use HTML Strict instead of XHTML
- Remove function minification in favor of performance and customization
- Fix grant ALL PRIVILEGES with GRANT OPTION
- Fix CSV import
- Fix work with default values

Adminer 1.11.1 (2009-07-03)
--------------------------

- Fix problem with enabled Filter extension

Adminer 1.11.0 (2009-07-02)
--------------------------

- Connection through socket by server :/path/to/socket
- Simplify export
- Display execution time in SQL query
- Relative date and time functions
- Version checker
- Save queries to history and display it on SQL page
- Display MySQL variables
- Ability to select all rows on current page of select
- Separate JavaScript functions
- Always use the default style before the external one
- Always try to use the syntax highlighter
- All privileges in user rights
- Fix FOUND_ROWS() in SQL command
- Export only selected columns in select
- Bulk database creation
- Include views in drop and move on database overview
- Hide fieldsets in select
- Automatically add new fields in table creation
- Use \n in SQL commands

phpMinAdmin 1.10.1 (2009-05-07)
-------------------------------

- Highlight odd and hover rows
- Partition editing comfort (bug #12)
- Allow full length in limited int

phpMinAdmin 1.10.0 (2009-04-28)
-------------------------------

- Partitioning (MySQL 5.1)
- CSV import
- Plus and minus functions
- Option to stop on error in SQL command
- Cross links to select and table (bug #2236232), link new item
- Suhosin compatibility
- Remove max_allowed_packet from export
- Read style from phpMinAdmin.css if exists
- Size reduction by minification of variables and functions
- Russian translation

phpMinAdmin 1.9.1 (2008-10-27)
------------------------------

- Update translations

phpMinAdmin 1.9.0 (2008-10-16)
------------------------------

- List of tables and views with maintenance commands
- Clone rows
- Bulk edit and clone
- Function results in edit
- NOT operators in select
- Search without column restriction
- Use type=password for unhashed password
- Only one button for each action in select
- Choose language through option-list
- XHTML syntax errors
- Don't set global variable in export
- SHOW DATABASES can be revoked
- Order by function result working also in older MySQL versions
- Tested on IIS

phpMinAdmin 1.8.0 (2008-09-12)
------------------------------

- Events (MySQL 5.1)
- Access without login - accept ?username=
- Print SQL query in select, messages and warnings
- Display number of found rows
- Don't wrap lines in select table
- Italian and Estonian translation
- Order by COUNT(*)

phpMinAdmin 1.7.0 (2008-08-26)
------------------------------

- Customizable export (select objects to export, SQL or CSV)
- Ability to alter existing tables and drop old tables in export
- Choose columns in select, aggregation
- Order rows by clicking on table heading
- Truncate only search results
- Automatically select name for trigger
- Chinese and French translation
- Preserve default values when altering table
- Maintain auto_increment when moving columns
- Smaller multilingual file
- Cache static files
- Faster checking of number of results

phpMinAdmin 1.6.1 (2008-05-22)
------------------------------

- Set session parameters only if not session.auto_start

phpMinAdmin 1.6.0 (2008-05-16)
------------------------------

- Order of columns in table
- Set max_allowed_packet in dump and use extended insert
- Spanish and German translations
- Use images for editing buttons
- Protection against big POST data
- Logout by POST
- Information about logged user
- Separate stylesheet
- Last-Modified header for files
- Several bug fixes

phpMinAdmin 1.5.0 (2008-01-09)
------------------------------

- Mass delete
- Vertical privileges
- Specify connection port by colon in server
- Ignore length in date and time types
- Boolean fulltext search for all columns in MyISAM
- Shrink compiled output
- Remove maxlength from server and username
- Uncheck NULL by change
- Mark shortened fields in select

phpMinAdmin 1.4.0 (2007-08-15)
------------------------------

- Privileges
- New design
- Dutch translation
- Use NULL for auto_increment (bug #1)
- Fix dropping procedure parameters

phpMinAdmin 1.3.2 (2007-08-06)
------------------------------

- Next field by JavaScript in foreign keys
- Set time zone in dump
- Refresh lang cookie
- Remember drop result in case of faulty create
- Move vertical lines in schema properly
- Fix maximum page in select

phpMinAdmin 1.3.1 (2007-07-31)
------------------------------

- Move references lines in schema
- Fix dump
- Fix update links

phpMinAdmin 1.3.0 (2007-07-27)
------------------------------

- Breadcrumb navigation
- Operator IN
- Timestamp default values
- Draggable tables in schema
- Number of rows in navigation
- Display MySQL version and used PHP extension
- More friendly user interface
- Slovak translation

phpMinAdmin 1.2.0 (2007-07-25)
------------------------------

- Manipulate triggers
- PDO Abstraction
- Auto_increment value
- JavaScript for adding rows

phpMinAdmin 1.1.0 (2007-07-19)
------------------------------

- Routines manipulation
- Views manipulation
- Foreign keys manipulation
- Database schema with references
- Processlist
- Index length
- Dump individual tables
- JavaScript for next rows in table edit
- Cache databases list

phpMinAdmin 1.0.0 (2007-07-11)
------------------------------

- First official release
