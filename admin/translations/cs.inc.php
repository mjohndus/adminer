<?php

namespace AdminNeo;

return [
	// text direction - 'ltr' or 'rtl'
	'ltr' => 'ltr',
	// thousands separator - must contain single byte
	',' => ' ',
	'0123456789' => '0123456789',
	// Editor - date format: $1 yyyy, $2 yy, $3 mm, $4 m, $5 dd, $6 d
	'$1-$3-$5' => '$6.$4.$1',
	// Editor - hint for date format - use language equivalents for day, month and year shortcuts
	'YYYY-MM-DD' => 'D.M.RRRR',
	// Editor - hint for time format - use language equivalents for hour, minute and second shortcuts
	'HH:MM:SS' => 'HH:MM:SS',

	// Bootstrap.
	'%s must return an array.' => '%s musí vracet pole.',
	'%s and %s must return an object created by %s method.' => '%s a %s musí vracet objekt vytvořený pomocí metody %s.',

	// Login.
	'System' => 'Systém',
	'Server' => 'Server',
	'Username' => 'Uživatel',
	'Password' => 'Heslo',
	'Permanent login' => 'Trvalé přihlášení',
	'Login' => 'Přihlásit se',
	'Logout' => 'Odhlásit',
	'Logged as: %s' => 'Přihlášen jako: %s',
	'Logout successful.' => 'Odhlášení proběhlo v pořádku.',
	'Invalid server or credentials.' => 'Neplatný server nebo přihlašovací údaje.',
	'There is a space in the input password which might be the cause.' => 'Problém může být, že je v zadaném hesle mezera.',
	'AdminNeo does not support accessing a database without a password, <a href="https://www.adminneo.org/password"%s>more information</a>.' => 'AdminNeo nepodporuje přístup k databázi bez hesla, <a href="https://www.adminneo.org/password"%s>více informací</a>.',
	'Database does not support password.' => 'Databáze nepodporuje heslo.',
	'Too many unsuccessful logins, try again in %d minute(s).' => [
		'Příliš mnoho pokusů o přihlášení, zkuste to znovu za %d minutu.',
		'Příliš mnoho pokusů o přihlášení, zkuste to znovu za %d minuty.',
		'Příliš mnoho pokusů o přihlášení, zkuste to znovu za %d minut.',
	],
	'Invalid permanent login, please login again.' => 'Neplatné trvalé přihlášení, přihlaste se prosím znovu.',
	'Invalid CSRF token. Send the form again.' => 'Neplatný token CSRF. Odešlete formulář znovu.',
	'If you did not send this request from AdminNeo then close this page.' => 'Pokud jste tento požadavek neposlali z AdminNeo, tak tuto stránku zavřete.',
	'The action will be performed after successful login with the same credentials.' => 'Akce bude provedena po úspěšném přihlášení se stejnými přihlašovacími údaji.',

	// Connection.
	'No driver' => 'Žádný ovladač',
	'Database driver not found.' => 'Databázový ovladač se nenašel.',
	'No extension' => 'Žádné rozšíření',
	// %s contains the list of the extensions, e.g. 'mysqli, PDO_MySQL'
	'None of the supported PHP extensions (%s) are available.' => 'Není dostupné žádné z podporovaných PHP rozšíření (%s).',
	'Connecting to privileged ports is not allowed.' => 'Připojování k privilegovaným portům není povoleno.',
	'Session support must be enabled.' => 'Session proměnné musí být povolené.',
	'Session expired, please login again.' => 'Session vypršela, přihlaste se prosím znovu.',
	'%s version: %s through PHP extension %s' => 'Verze %s: %s přes PHP rozšíření %s',

	// Settings.
	'Language' => 'Jazyk',

	'Home' => 'Domů',
	'Refresh' => 'Obnovit',
	'Info' => 'Info',
	'More information.' => 'Více informací.',

	// Privileges.
	'Privileges' => 'Oprávnění',
	'Create user' => 'Vytvořit uživatele',
	'User has been dropped.' => 'Uživatel byl odstraněn.',
	'User has been altered.' => 'Uživatel byl změněn.',
	'User has been created.' => 'Uživatel byl vytvořen.',
	'Hashed' => 'Zahašované',

	// Server.
	'Process list' => 'Seznam procesů',
	'%d process(es) have been killed.' => [
		'Byl ukončen %d proces.',
		'Byly ukončeny %d procesy.',
		'Bylo ukončeno %d procesů.',
	],
	'Kill' => 'Ukončit',
	'Variables' => 'Proměnné',
	'Status' => 'Stav',

	// Structure.
	'Column' => 'Sloupec',
	'Routine' => 'Procedura',
	'Grant' => 'Povolit',
	'Revoke' => 'Zakázat',

	// Queries.
	'SQL command' => 'SQL příkaz',
	'HTTP request' => 'HTTP dotaz',
	'%d query(s) executed OK.' => [
		'%d příkaz proběhl v pořádku.',
		'%d příkazy proběhly v pořádku.',
		'%d příkazů proběhlo v pořádku.',
	],
	'Query executed OK, %d row(s) affected.' => [
		'Příkaz proběhl v pořádku, byl změněn %d záznam.',
		'Příkaz proběhl v pořádku, byly změněny %d záznamy.',
		'Příkaz proběhl v pořádku, bylo změněno %d záznamů.',
	],
	'No commands to execute.' => 'Žádné příkazy k vykonání.',
	'Error in query' => 'Chyba v dotazu',
	'Unknown error.' => 'Neznámá chyba.',
	'Warnings' => 'Varování',
	'ATTACH queries are not supported.' => 'Dotazy ATTACH nejsou podporované.',
	'Execute' => 'Provést',
	'Stop on error' => 'Zastavit při chybě',
	'Show only errors' => 'Zobrazit pouze chyby',
	'Time' => 'Čas',
	// sprintf() format for time of the command
	'%.3f s' => '%.3f s',
	'History' => 'Historie',
	'Clear' => 'Vyčistit',
	'Edit all' => 'Upravit vše',

	// Import.
	'Import' => 'Import',
	'File upload' => 'Nahrání souboru',
	'From server' => 'Ze serveru',
	'Webserver file %s' => 'Soubor %s na webovém serveru',
	'Run file' => 'Spustit soubor',
	'File does not exist.' => 'Soubor neexistuje.',
	'File uploads are disabled.' => 'Nahrávání souborů není povoleno.',
	'Unable to upload a file.' => 'Nepodařilo se nahrát soubor.',
	'Maximum allowed file size is %sB.' => 'Maximální povolená velikost souboru je %sB.',
	'Too big POST data. Reduce the data or increase the %s configuration directive.' => 'Příliš velká POST data. Zmenšete data nebo zvyšte hodnotu konfigurační direktivy %s.',
	'You can upload a big SQL file via FTP and import it from server.' => 'Velký SQL soubor můžete nahrát pomocí FTP a importovat ho ze serveru.',
	'File must be in UTF-8 encoding.' => 'Soubor musí být v kódování UTF-8.',
	'You are offline.' => 'Jste offline.',
	'%d row(s) have been imported.' => [
		'Byl importován %d záznam.',
		'Byly importovány %d záznamy.',
		'Bylo importováno %d záznamů.',
	],

	// Export.
	'Export' => 'Export',
	'Output' => 'Výstup',
	'open' => 'otevřít',
	'save' => 'uložit',
	'Format' => 'Formát',
	'Data' => 'Data',

	// Databases.
	'Database' => 'Databáze',
	'DB' => 'DB',
	'Use' => 'Vybrat',
	'Invalid database.' => 'Nesprávná databáze.',
	'Alter database' => 'Pozměnit databázi',
	'Create database' => 'Vytvořit databázi',
	'Database schema' => 'Schéma databáze',
	'Permanent link' => 'Trvalý odkaz',
	'Database has been dropped.' => 'Databáze byla odstraněna.',
	'Databases have been dropped.' => 'Databáze byly odstraněny.',
	'Database has been created.' => 'Databáze byla vytvořena.',
	'Database has been renamed.' => 'Databáze byla přejmenována.',
	'Database has been altered.' => 'Databáze byla změněna.',
	// SQLite errors.
	'File exists.' => 'Soubor existuje.',
	'Please use one of the extensions %s.' => 'Prosím použijte jednu z koncovek %s.',

	// Schemas (PostgreSQL, MS SQL).
	'Schema' => 'Schéma',
	'Schemas' => 'Schémy',
	'No schemas.' => 'Žádné schémy.',
	'Show schema' => 'Zobrazit schéma',
	'Alter schema' => 'Pozměnit schéma',
	'Create schema' => 'Vytvořit schéma',
	'Schema has been dropped.' => 'Schéma bylo odstraněno.',
	'Schema has been created.' => 'Schéma bylo vytvořeno.',
	'Schema has been altered.' => 'Schéma bylo změněno.',
	'Invalid schema.' => 'Nesprávné schéma.',

	// Table list.
	'Engine' => 'Úložiště',
	'engine' => 'úložiště',
	'Collation' => 'Porovnávání',
	'collation' => 'porovnávání',
	'Data Length' => 'Velikost dat',
	'Index Length' => 'Velikost indexů',
	'Data Free' => 'Volné místo',
	'Rows' => 'Řádků',
	'%d in total' => '%d celkem',
	'Analyze' => 'Analyzovat',
	'Optimize' => 'Optimalizovat',
	'Vacuum' => 'Vyčistit',
	'Check' => 'Zkontrolovat',
	'Repair' => 'Opravit',
	'Truncate' => 'Vyprázdnit',
	'Tables have been truncated.' => 'Tabulky byly vyprázdněny.',
	'Move to other database' => 'Přesunout do jiné databáze',
	'Move' => 'Přesunout',
	'Tables have been moved.' => 'Tabulky byly přesunuty.',
	'Copy' => 'Zkopírovat',
	'Tables have been copied.' => 'Tabulky byly zkopírovány.',
	'overwrite' => 'přepsat',

	// Tables.
	'Tables' => 'Tabulky',
	'Tables and views' => 'Tabulky a pohledy',
	'Table' => 'Tabulka',
	'No tables.' => 'Žádné tabulky.',
	'Alter table' => 'Pozměnit tabulku',
	'Create table' => 'Vytvořit tabulku',
	'Table has been dropped.' => 'Tabulka byla odstraněna.',
	'Tables have been dropped.' => 'Tabulky byly odstraněny.',
	'Tables have been optimized.' => 'Tabulky byly optimalizovány.',
	'Table has been altered.' => 'Tabulka byla změněna.',
	'Table has been created.' => 'Tabulka byla vytvořena.',
	'Table name' => 'Název tabulky',
	'Name' => 'Název',
	'Show structure' => 'Zobrazit strukturu',
	'Column name' => 'Název sloupce',
	'Type' => 'Typ',
	'Length' => 'Délka',
	'Auto Increment' => 'Auto Increment',
	'Options' => 'Volby',
	'Comment' => 'Komentář',
	'Default value' => 'Výchozí hodnota',
	'Drop' => 'Odstranit',
	'Drop %s?' => 'Odstranit %s?',
	'Are you sure?' => 'Opravdu?',
	'Size' => 'Velikost',
	'Compute' => 'Spočítat',
	'Move up' => 'Přesunout nahoru',
	'Move down' => 'Přesunout dolů',
	'Remove' => 'Odebrat',
	'Maximum number of allowed fields exceeded. Please increase %s.' => 'Byl překročen maximální povolený počet polí. Zvyšte prosím %s.',

	// Views.
	'View' => 'Pohled',
	'Materialized view' => 'Materializovaný pohled',
	'View has been dropped.' => 'Pohled byl odstraněn.',
	'View has been altered.' => 'Pohled byl změněn.',
	'View has been created.' => 'Pohled byl vytvořen.',
	'Alter view' => 'Pozměnit pohled',
	'Create view' => 'Vytvořit pohled',

	// Partitions.
	'Partition by' => 'Rozdělit podle',
	'Partition' => 'Oddíl',
	'Partitions' => 'Oddíly',
	'Partition name' => 'Název oddílu',
	'Values' => 'Hodnoty',

	// Indexes.
	'Indexes' => 'Indexy',
	'Indexes have been altered.' => 'Indexy byly změněny.',
	'Alter indexes' => 'Pozměnit indexy',
	'Add next' => 'Přidat další',
	'Index Type' => 'Typ indexu',
	'length' => 'délka',

	// Foreign keys.
	'Foreign keys' => 'Cizí klíče',
	'Foreign key' => 'Cizí klíč',
	'Foreign key has been dropped.' => 'Cizí klíč byl odstraněn.',
	'Foreign key has been altered.' => 'Cizí klíč byl změněn.',
	'Foreign key has been created.' => 'Cizí klíč byl vytvořen.',
	'Target table' => 'Cílová tabulka',
	'Change' => 'Změnit',
	'Source' => 'Zdroj',
	'Target' => 'Cíl',
	'Add column' => 'Přidat sloupec',
	'Alter' => 'Změnit',
	'Add foreign key' => 'Přidat cizí klíč',
	'ON DELETE' => 'Při smazání',
	'ON UPDATE' => 'Při změně',
	'Source and target columns must have the same data type, there must be an index on the target columns and referenced data must exist.' => 'Zdrojové a cílové sloupce musí mít stejný datový typ, nad cílovými sloupci musí být definován index a odkazovaná data musí existovat.',

	// Routines.
	'Routines' => 'Procedury a funkce',
	'Routine has been called, %d row(s) affected.' => [
		'Procedura byla zavolána, byl změněn %d záznam.',
		'Procedura byla zavolána, byly změněny %d záznamy.',
		'Procedura byla zavolána, bylo změněno %d záznamů.',
	],
	'Call' => 'Zavolat',
	'Parameter name' => 'Název parametru',
	'Create procedure' => 'Vytvořit proceduru',
	'Create function' => 'Vytvořit funkci',
	'Routine has been dropped.' => 'Procedura byla odstraněna.',
	'Routine has been altered.' => 'Procedura byla změněna.',
	'Routine has been created.' => 'Procedura byla vytvořena.',
	'Alter function' => 'Změnit funkci',
	'Alter procedure' => 'Změnit proceduru',
	'Return type' => 'Návratový typ',

	// Events.
	'Events' => 'Události',
	'Event' => 'Událost',
	'Event has been dropped.' => 'Událost byla odstraněna.',
	'Event has been altered.' => 'Událost byla změněna.',
	'Event has been created.' => 'Událost byla vytvořena.',
	'Alter event' => 'Pozměnit událost',
	'Create event' => 'Vytvořit událost',
	'At given time' => 'V daný čas',
	'Every' => 'Každých',
	'Schedule' => 'Plán',
	'Start' => 'Začátek',
	'End' => 'Konec',
	'On completion preserve' => 'Po dokončení zachovat',

	// Sequences (PostgreSQL).
	'Sequences' => 'Sekvence',
	'Create sequence' => 'Vytvořit sekvenci',
	'Sequence has been dropped.' => 'Sekvence byla odstraněna.',
	'Sequence has been created.' => 'Sekvence byla vytvořena.',
	'Sequence has been altered.' => 'Sekvence byla změněna.',
	'Alter sequence' => 'Pozměnit sekvenci',

	// User types (PostgreSQL)
	'User types' => 'Uživatelské typy',
	'Create type' => 'Vytvořit typ',
	'Type has been dropped.' => 'Typ byl odstraněn.',
	'Type has been created.' => 'Typ byl vytvořen.',
	'Alter type' => 'Pozměnit typ',

	// Triggers.
	'Triggers' => 'Triggery',
	'Add trigger' => 'Přidat trigger',
	'Trigger has been dropped.' => 'Trigger byl odstraněn.',
	'Trigger has been altered.' => 'Trigger byl změněn.',
	'Trigger has been created.' => 'Trigger byl vytvořen.',
	'Alter trigger' => 'Změnit trigger',
	'Create trigger' => 'Vytvořit trigger',

	// Table check constraints.
	'Checks' => 'Kontroly',
	'Create check' => 'Vytvořit kontrolu',
	'Alter check' => 'Změnit kontrolu',
	'Check has been created.' => 'Kontrola byla vytvořena.',
	'Check has been altered.' => 'Kontrola byla změněna.',
	'Check has been dropped.' => 'Kontrola byla odstraněna.',

	// Selection.
	'Select data' => 'Vypsat data',
	'Select' => 'Vypsat',
	'Functions' => 'Funkce',
	'Aggregation' => 'Agregace',
	'Search' => 'Vyhledat',
	'anywhere' => 'kdekoliv',
	'Sort' => 'Seřadit',
	'descending' => 'sestupně',
	'Limit' => 'Limit',
	'Limit rows' => 'Limit řádek',
	'Text length' => 'Délka textů',
	'Action' => 'Akce',
	'Full table scan' => 'Průchod celé tabulky',
	'Unable to select the table' => 'Nepodařilo se vypsat tabulku',
	'Search data in tables' => 'Vyhledat data v tabulkách',
	'as a regular expression' => 'jako regulární výraz',
	'No rows.' => 'Žádné řádky.',
	'%d / ' => '%d / ',
	'%d row(s)' => [
		'%d řádek',
		'%d řádky',
		'%d řádků',
	],
	'Page' => 'Stránka',
	'last' => 'poslední',
	'Load more data' => 'Načíst další data',
	'Loading' => 'Načítá se',
	'Whole result' => 'Celý výsledek',
	'%d byte(s)' => [
		'%d bajt',
		'%d bajty',
		'%d bajtů',
	],

	// In-place editing in selection.
	'Modify' => 'Změnit',
	'Ctrl+click on a value to modify it.' => 'Ctrl+klikněte na políčko, které chcete změnit.',
	'Use edit link to modify this value.' => 'Ke změně této hodnoty použijte odkaz upravit.',

	// Editing.
	'New item' => 'Nová položka',
	'Edit' => 'Upravit',
	'original' => 'původní',
	// label for value '' in enum data type
	'empty' => 'prázdné',
	'Insert' => 'Vložit',
	'Save' => 'Uložit',
	'Save and continue edit' => 'Uložit a pokračovat v editaci',
	'Save and insert next' => 'Uložit a vložit další',
	'Saving' => 'Ukládá se',
	'Selected' => 'Označené',
	'Clone' => 'Klonovat',
	'Delete' => 'Smazat',
	// %s can contain auto-increment value, e.g. ' 123'
	'Item%s has been inserted.' => 'Položka%s byla vložena.',
	'Item has been deleted.' => 'Položka byla smazána.',
	'Item has been updated.' => 'Položka byla aktualizována.',
	'%d item(s) have been affected.' => [
		'Byl ovlivněn %d záznam.',
		'Byly ovlivněny %d záznamy.',
		'Bylo ovlivněno %d záznamů.',
	],
	'You have no privileges to update this table.' => 'Nemáte oprávnění editovat tuto tabulku.',

	// Data type descriptions.
	'Numbers' => 'Čísla',
	'Date and time' => 'Datum a čas',
	'Strings' => 'Řetězce',
	'Binary' => 'Binární',
	'Lists' => 'Seznamy',
	'Network' => 'Síť',
	'Geometry' => 'Geometrie',
	'Relations' => 'Vztahy',

	// Editor - data values.
	'now' => 'teď',
	'yes' => 'ano',
	'no' => 'ne',

	// Plugins.
	'One Time Password' => 'Jednorázové heslo',
	'Enter OTP code.' => 'Zadejte jednorázový kód.',
	'Invalid OTP code.' => 'Neplatný jednorázový kód.',
	'Access denied.' => 'Přístup zamítnut.',
];
