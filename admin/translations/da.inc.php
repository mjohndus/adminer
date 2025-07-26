<?php

namespace AdminNeo;

return [
	// text direction - 'ltr' or 'rtl'
	'ltr' => 'ltr',
	// thousands separator - must contain single byte
	',' => ' ',
	'0123456789' => '0123456789',
	// Editor - date format: $1 yyyy, $2 yy, $3 mm, $4 m, $5 dd, $6 d
	'$1-$3-$5' => '$6/$4 $1',
	// Editor - hint for date format - use language equivalents for day, month and year shortcuts
	'YYYY-MM-DD' => 'D/M ÅÅÅÅ',
	// Editor - hint for time format - use language equivalents for hour, minute and second shortcuts
	'HH:MM:SS' => 'HH:MM:SS',

	// Bootstrap.

	// Login.
	'System' => 'System',
	'Server' => 'Server',
	'Username' => 'Brugernavn',
	'Password' => 'Kodeord',
	'Permanent login' => 'Permanent login',
	'Login' => 'Log ind',
	'Logout' => 'Log ud',
	'Logged as: %s' => 'Logget ind som: %s',
	'Logout successful.' => 'Log af vellykket.',
	'Invalid CSRF token. Send the form again.' => 'Ugyldigt CSRF-token - Genindsend formen.',

	// Connection.
	'No extension' => 'Ingen udvidelse',
	// %s contains the list of the extensions, e.g. 'mysqli, PDO_MySQL'
	'None of the supported PHP extensions (%s) are available.' => 'Ingen af de understøttede PHP-udvidelser (%s) er tilgængelige.',
	'Session support must be enabled.' => 'Session support skal være slået til.',
	'Session expired, please login again.' => 'Sessionen er udløbet - Log venligst ind igen.',
	'%s version: %s through PHP extension %s' => '%s version: %s via PHP-udvidelse %s',

	// Settings.
	'Language' => 'Sprog',

	'Refresh' => 'Genindlæs',

	// Privileges.
	'Privileges' => 'Privilegier',
	'Create user' => 'Opret bruger',
	'User has been dropped.' => 'Brugeren slettet.',
	'User has been altered.' => 'Brugeren ændret.',
	'User has been created.' => 'Brugeren oprettet.',
	'Hashed' => 'Hashet',

	// Server.
	'Process list' => 'Procesliste',
	'%d process(es) have been killed.' => [
		'%d proces afsluttet.',
		'%d processer afsluttet.',
	],
	'Kill' => 'Afslut',
	'Variables' => 'Variabler',
	'Status' => 'Status',

	// Structure.
	'Column' => 'Kolonne',
	'Routine' => 'Rutine',
	'Grant' => 'Giv privilegier',
	'Revoke' => 'Træk tilbage',

	// Queries.
	'SQL command' => 'SQL-kommando',
	'%d query(s) executed OK.' => [
		'%d kald udført OK.',
		'%d kald udført OK.',
	],
	'Query executed OK, %d row(s) affected.' => [
		'Kald udført OK, %d række påvirket.',
		'Kald udført OK, %d rækker påvirket.',
	],
	'No commands to execute.' => 'Ingen kommandoer at udføre.',
	'Error in query' => 'Fejl i forespørgelse',
	'Execute' => 'Kør',
	'Stop on error' => 'Stop ved fejl',
	'Show only errors' => 'Vis kun fejl',
	'Time' => 'Tid',
	// sprintf() format for time of the command
	'%.3f s' => '%.3f s',
	'History' => 'Historik',
	'Clear' => 'Tøm',
	'Edit all' => 'Rediger alle',

	// Import.
	'Import' => 'Importer',
	'File upload' => 'Fil upload',
	'From server' => 'Fra server',
	'Webserver file %s' => 'Webserver-fil %s',
	'Run file' => 'Kør fil',
	'File does not exist.' => 'Filen eksisterer ikke.',
	'File uploads are disabled.' => 'Fil upload er slået fra.',
	'Unable to upload a file.' => 'Kunne ikke uploade fil.',
	'Maximum allowed file size is %sB.' => 'Maksimum tilladte filstørrelse er %sB.',
	'Too big POST data. Reduce the data or increase the %s configuration directive.' => 'Maks POST data er overskredet. Reducer mængden af data eller øg størrelsen i %s-konfigurationen.',
	'You can upload a big SQL file via FTP and import it from server.' => 'Du kan uploade en stor SQL-fil via FTP og importere den fra serveren.',
	'File must be in UTF-8 encoding.' => 'Filen skal være i UTF8-tegnkoding.',
	'%d row(s) have been imported.' => [
		'%d række er importeret.',
		'%d rækker er importeret.',
	],

	// Export.
	'Export' => 'Eksport',
	'Output' => 'Resultat',
	'open' => 'Åben',
	'save' => 'Gem',
	'Format' => 'Format',
	'Data' => 'Data',

	// Databases.
	'Database' => 'Database',
	'Use' => 'Brug',
	'Invalid database.' => 'Ugyldig database.',
	'Alter database' => 'Ændre database',
	'Create database' => 'Opret database',
	'Database schema' => 'Databaseskema',
	'Permanent link' => 'Permanent link',
	'Database has been dropped.' => 'Databasen er blevet slettet.',
	'Databases have been dropped.' => 'Databasene er blevet slettet.',
	'Database has been created.' => 'Databasen er oprettet.',
	'Database has been renamed.' => 'Databasen har fået nyt navn.',
	'Database has been altered.' => 'Databasen er ændret.',
	// SQLite errors.
	'File exists.' => 'Filen findes.',
	'Please use one of the extensions %s.' => 'Brug venligst en af filendelserne %s.',

	// Schemas (PostgreSQL, MS SQL).
	'Schema' => 'Skema',
	'Alter schema' => 'Ændre skema',
	'Create schema' => 'Opret skema',
	'Schema has been dropped.' => 'Skemaet er slettet.',
	'Schema has been created.' => 'Skemaet er oprettet.',
	'Schema has been altered.' => 'Skemaet er ændret.',
	'Invalid schema.' => 'Ugyldigt skema.',

	// Table list.
	'Engine' => 'Motor',
	'engine' => 'motor',
	'Collation' => 'Tekstsortering',
	'collation' => 'sortering',
	'Data Length' => 'Datalængde',
	'Index Length' => 'Indekslængde',
	'Data Free' => 'Fri data',
	'Rows' => 'Rader',
	'%d in total' => '%d total',
	'Analyze' => 'Analyser',
	'Optimize' => 'Optimaliser',
	'Vacuum' => 'Støvsug',
	'Check' => 'Tjek',
	'Repair' => 'Reparer',
	'Truncate' => 'Afkort',
	'Tables have been truncated.' => 'Tabellerne er blevet afkortet.',
	'Move to other database' => 'Flyt til anden database',
	'Move' => 'Flyt',
	'Tables have been moved.' => 'Tabellerne er blevet flyttet.',
	'Copy' => 'Kopier',
	'Tables have been copied.' => 'Tabellerne er blevet kopiert.',

	// Tables.
	'Tables' => 'Tabeller',
	'Tables and views' => 'Tabeller og views',
	'Table' => 'Tabel',
	'No tables.' => 'Ingen tabeller.',
	'Alter table' => 'Ændre tabel',
	'Create table' => 'Opret tabel',
	'Table has been dropped.' => 'Tabellen er slettet.',
	'Tables have been dropped.' => 'Tabellerne er slettet.',
	'Tables have been optimized.' => 'Tabellerne er blevet optimaliseret.',
	'Table has been altered.' => 'Tabellen er ændret.',
	'Table has been created.' => 'Tabellen er oprettet.',
	'Table name' => 'Tabelnavn',
	'Name' => 'Navn',
	'Show structure' => 'Vis struktur',
	'Column name' => 'Kolonnenavn',
	'Type' => 'Type',
	'Length' => 'Længde',
	'Auto Increment' => 'Auto Increment',
	'Options' => 'Valg',
	'Comment' => 'Kommentarer',
	'Drop' => 'Drop',
	'Are you sure?' => 'Er du sikker?',
	'Move up' => 'Flyt op',
	'Move down' => 'Flyt ned',
	'Remove' => 'Fjern',
	'Maximum number of allowed fields exceeded. Please increase %s.' => 'Maksimum antal feltnavne overskredet - øg venligst %s.',

	// Views.
	'View' => 'View',
	'View has been dropped.' => 'Viewet er slettet.',
	'View has been altered.' => 'Viewet er ændret.',
	'View has been created.' => 'Viewet er oprettet.',
	'Alter view' => 'Ændre view',
	'Create view' => 'Nyt view',

	// Partitions.
	'Partition by' => 'Partition ved',
	'Partitions' => 'Partitioner',
	'Partition name' => 'Partitionsnavn',
	'Values' => 'Værdier',

	// Indexes.
	'Indexes' => 'Indekser',
	'Indexes have been altered.' => 'Indekserne er ændret.',
	'Alter indexes' => 'Ændre indekser',
	'Add next' => 'Læg til næste',
	'Index Type' => 'Indekstype',
	'length' => 'længde',

	// Foreign keys.
	'Foreign keys' => 'Fremmednøgler',
	'Foreign key' => 'Fremmednøgle',
	'Foreign key has been dropped.' => 'Fremmednøglen er slettet.',
	'Foreign key has been altered.' => 'Fremmednøglen er ændret.',
	'Foreign key has been created.' => 'Fremmednøglen er oprettet.',
	'Target table' => 'Måltabel',
	'Change' => 'Ændre',
	'Source' => 'Kilde',
	'Target' => 'Mål',
	'Add column' => 'Tilføj kolonne',
	'Alter' => 'Ændre',
	'Add foreign key' => 'Tilføj fremmednøgle',
	'ON DELETE' => 'ON DELETE',
	'ON UPDATE' => 'ON UPDATE',
	'Source and target columns must have the same data type, there must be an index on the target columns and referenced data must exist.' => 'Kilde- og målkolonner skal have samme datatype, der skal være en indeks på mål-kolonnen, og data som refereres til skal eksistere.',

	// Routines.
	'Routines' => 'Rutiner',
	'Routine has been called, %d row(s) affected.' => [
		'Rutinen er udført, %d række påvirket.',
		'Rutinen er udført, %d rækker påvirket.',
	],
	'Call' => 'Kald',
	'Parameter name' => 'Parameternavn',
	'Create procedure' => 'Opret procedure',
	'Create function' => 'Opret funktion',
	'Routine has been dropped.' => 'Rutinen er slettet.',
	'Routine has been altered.' => 'Rutinen er ændret.',
	'Routine has been created.' => 'Rutinen er oprettet.',
	'Alter function' => 'Ændre funktion',
	'Alter procedure' => 'Ændre procedure',
	'Return type' => 'Returtype',

	// Events.
	'Events' => 'Hændelser',
	'Event' => 'Hændelse',
	'Event has been dropped.' => 'Hændelsen er slettet.',
	'Event has been altered.' => 'Hændelsen er ændret.',
	'Event has been created.' => 'Hændelsen er oprettet.',
	'Alter event' => 'Ændre hændelse',
	'Create event' => 'Opret hændelse',
	'At given time' => 'På givne tid',
	'Every' => 'Hver',
	'Schedule' => 'Tidsplan',
	'Start' => 'Start',
	'End' => 'Slut',
	'On completion preserve' => 'Ved fuldførelse bevar',

	// Sequences (PostgreSQL).
	'Sequences' => 'Sekvenser',
	'Create sequence' => 'Opret sekvens',
	'Sequence has been dropped.' => 'Sekvensen er slettet.',
	'Sequence has been created.' => 'Sekvensen er oprettet.',
	'Sequence has been altered.' => 'Sekvensen er ændret.',
	'Alter sequence' => 'Ændre sekvens',

	// User types (PostgreSQL)
	'User types' => 'Brugertyper',
	'Create type' => 'Opret type',
	'Type has been dropped.' => 'Typen er slettet.',
	'Type has been created.' => 'Typen er oprettet.',
	'Alter type' => 'Ændre type',

	// Triggers.
	'Triggers' => 'Triggere',
	'Add trigger' => 'Tilføj trigger',
	'Trigger has been dropped.' => 'Triggeren er slettet.',
	'Trigger has been altered.' => 'Triggeren er ændret.',
	'Trigger has been created.' => 'Triggeren er oprettet.',
	'Alter trigger' => 'Ændre trigger',
	'Create trigger' => 'Opret trigger',

	// Table check constraints.

	// Selection.
	'Select data' => 'Vælg data',
	'Select' => 'Vælg',
	'Functions' => 'Funktioner',
	'Aggregation' => 'Sammenfatning',
	'Search' => 'Søg',
	'anywhere' => 'hvorsomhelst',
	'Sort' => 'Sorter',
	'descending' => 'faldende',
	'Limit' => 'Limit',
	'Text length' => 'Tekstlængde',
	'Action' => 'Handling',
	'Full table scan' => 'Fuld tabel-scan',
	'Unable to select the table' => 'Kan ikke vælge tabellen',
	'Search data in tables' => 'Søg data i tabeller',
	'No rows.' => 'Ingen rækker.',
	'%d row(s)' => [
		'%d række',
		'%d rækker',
	],
	'Page' => 'Side',
	'last' => 'sidste',
	'Load more data' => 'Indlæs mere data',
	'Loading' => 'Indlæser',
	'Whole result' => 'Hele resultatet',
	'%d byte(s)' => [
		'%d byte',
		'%d bytes',
	],

	// In-place editing in selection.
	'Modify' => 'Ændre',
	'Ctrl+click on a value to modify it.' => 'Ctrl+klik på en værdi for at ændre den.',
	'Use edit link to modify this value.' => 'Brug rediger-link for at ændre dennne værdi.',

	// Editing.
	'New item' => 'Nyt emne',
	'Edit' => 'Rediger',
	'original' => 'original',
	// label for value '' in enum data type
	'empty' => 'tom',
	'Insert' => 'Indsæt',
	'Save' => 'Gem',
	'Save and continue edit' => 'Gem og fortsæt redigering',
	'Save and insert next' => 'Gem og indsæt næste',
	'Saving' => 'Gemmer',
	'Selected' => 'Valgt',
	'Clone' => 'Klon',
	'Delete' => 'Slet',
	// %s can contain auto-increment value, e.g. ' 123'
	'Item%s has been inserted.' => 'Emne%s er sat ind.',
	'Item has been deleted.' => 'Emnet er slettet.',
	'Item has been updated.' => 'Emnet er opdateret.',
	'%d item(s) have been affected.' => [
		'%d emne påvirket.',
		'%d emner påvirket.',
	],
	'You have no privileges to update this table.' => 'Du mangler rettigheder til at ændre denne tabellen.',

	// Data type descriptions.
	'Numbers' => 'Nummer',
	'Date and time' => 'Dato og tid',
	'Strings' => 'Strenge',
	'Binary' => 'Binær',
	'Lists' => 'Lister',
	'Network' => 'Netværk',
	'Geometry' => 'Geometri',
	'Relations' => 'Relationer',

	// Editor - data values.
	'now' => 'nu',
	'yes' => 'ja',
	'no' => 'nej',

	// Plugins.
];
