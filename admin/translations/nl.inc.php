<?php

namespace AdminNeo;

return [
	// text direction - 'ltr' or 'rtl'
	'ltr' => 'ltr',
	// thousands separator - must contain single byte
	',' => '.',
	'0123456789' => '0123456789',
	// Editor - date format: $1 yyyy, $2 yy, $3 mm, $4 m, $5 dd, $6 d
	'$1-$3-$5' => '$5-$3-$1',
	// Editor - hint for date format - use language equivalents for day, month and year shortcuts
	'YYYY-MM-DD' => 'DD-MM-JJJJ',
	// Editor - hint for time format - use language equivalents for hour, minute and second shortcuts
	'HH:MM:SS' => 'HH:MM:SS',

	// Bootstrap.

	// Login.
	'System' => 'Databasesysteem',
	'Server' => 'Server',
	'Username' => 'Gebruikersnaam',
	'Password' => 'Wachtwoord',
	'Permanent login' => 'Blijf aangemeld',
	'Login' => 'Aanmelden',
	'Logout' => 'Afmelden',
	'Logged as: %s' => 'Aangemeld als: %s',
	'Logout successful.' => 'Successvol afgemeld.',
	'There is a space in the input password which might be the cause.' => 'Er staat een spatie in het wachtwoord, wat misschien de oorzaak is.',
	'AdminNeo does not support accessing a database without a password, <a href="https://www.adminneo.org/password"%s>more information</a>.' => 'AdminNeo ondersteunt geen toegang tot databases zonder wachtwoord, <a href="https://www.adminneo.org/password"%s>meer informatie</a>.',
	'Database does not support password.' => 'Database ondersteunt het wachtwoord niet.',
	'Too many unsuccessful logins, try again in %d minute(s).' => [
		'Teveel foutieve aanmeldpogingen, probeer opnieuw binnen %d minuut.',
		'Teveel foutieve aanmeldpogingen, probeer opnieuw binnen %d minuten.',
	],
	'Invalid CSRF token. Send the form again.' => 'Ongeldig CSRF token. Verstuur het formulier opnieuw.',
	'If you did not send this request from AdminNeo then close this page.' => 'Als u deze actie niet via AdminNeo hebt gedaan, gelieve deze pagina dan te sluiten.',
	'The action will be performed after successful login with the same credentials.' => 'Deze actie zal uitgevoerd worden na het succesvol aanmelden met dezelfde gebruikersgegevens.',

	// Connection.
	'No extension' => 'Geen extensie',
	// %s contains the list of the extensions, e.g. 'mysqli, PDO_MySQL'
	'None of the supported PHP extensions (%s) are available.' => 'Geen geldige PHP extensies beschikbaar (%s).',
	'Connecting to privileged ports is not allowed.' => 'Verbindingen naar geprivilegieerde poorten is niet toegestaan.',
	'Session support must be enabled.' => 'Sessies moeten geactiveerd zijn.',
	'Session expired, please login again.' => 'Uw sessie is verlopen. Gelieve opnieuw aan te melden.',
	'%s version: %s through PHP extension %s' => '%s versie: %s met PHP extensie %s',

	// Settings.
	'Language' => 'Taal',

	'Refresh' => 'Vernieuwen',

	// Privileges.
	'Privileges' => 'Rechten',
	'Create user' => 'Gebruiker aanmaken',
	'User has been dropped.' => 'Gebruiker verwijderd.',
	'User has been altered.' => 'Gebruiker aangepast.',
	'User has been created.' => 'Gebruiker aangemaakt.',
	'Hashed' => 'Gehashed',

	// Server.
	'Process list' => 'Proceslijst',
	'%d process(es) have been killed.' => [
		'%d proces gestopt.',
		'%d processen gestopt.',
	],
	'Kill' => 'Stoppen',
	'Variables' => 'Variabelen',
	'Status' => 'Status',

	// Structure.
	'Column' => 'Kolom',
	'Routine' => 'Routine',
	'Grant' => 'Toekennen',
	'Revoke' => 'Intrekken',

	// Queries.
	'SQL command' => 'SQL opdracht',
	'%d query(s) executed OK.' => [
		'%d query succesvol uitgevoerd.',
		'%d querys succesvol uitgevoerd.',
	],
	'Query executed OK, %d row(s) affected.' => [
		'Query uitgevoerd, %d rij aangepast.',
		'Query uitgevoerd, %d rijen aangepast.',
	],
	'No commands to execute.' => 'Geen opdrachten uit te voeren.',
	'Error in query' => 'Fout in query',
	'Unknown error.' => 'Onbekende fout.',
	'Warnings' => 'Waarschuwingen',
	'ATTACH queries are not supported.' => 'ATTACH queries worden niet ondersteund.',
	'Execute' => 'Uitvoeren',
	'Stop on error' => 'Stoppen bij fout',
	'Show only errors' => 'Enkel fouten tonen',
	'Time' => 'Time',
	// sprintf() format for time of the command
	'%.3f s' => '%.3f s',
	'History' => 'Geschiedenis',
	'Clear' => 'Wissen',
	'Edit all' => 'Alles bewerken',

	// Import.
	'Import' => 'Importeren',
	'File upload' => 'Bestand uploaden',
	'From server' => 'Van server',
	'Webserver file %s' => 'Webserver bestand %s',
	'Run file' => 'Bestand uitvoeren',
	'File does not exist.' => 'Bestand niet gevonden.',
	'File uploads are disabled.' => 'Bestanden uploaden is uitgeschakeld.',
	'Unable to upload a file.' => 'Onmogelijk bestand te uploaden.',
	'Maximum allowed file size is %sB.' => 'Maximum toegelaten bestandsgrootte is %sB.',
	'Too big POST data. Reduce the data or increase the %s configuration directive.' => 'POST-data is te groot. Verklein de hoeveelheid data of verhoog de %s configuratie.',
	'You can upload a big SQL file via FTP and import it from server.' => 'U kan een groot SQL-bestand uploaden via FTP en het importeren via de server.',
	'File must be in UTF-8 encoding.' => 'Het bestand moet met UTF-8 encodering zijn opgeslagen.',
	'You are offline.' => 'U bent offline.',
	'%d row(s) have been imported.' => [
		'%d rij werd geïmporteerd.',
		'%d rijen werden geïmporteerd.',
	],

	// Export.
	'Export' => 'Exporteren',
	'Output' => 'Uitvoer',
	'open' => 'openen',
	'save' => 'opslaan',
	'Format' => 'Formaat',
	'Data' => 'Data',

	// Databases.
	'Database' => 'Database',
	'DB' => 'DB',
	'Use' => 'Gebruik',
	'Invalid database.' => 'Ongeldige database.',
	'Alter database' => 'Database aanpassen',
	'Create database' => 'Database aanmaken',
	'Database schema' => 'Database schema',
	'Permanent link' => 'Permanente link',
	'Database has been dropped.' => 'Database verwijderd.',
	'Databases have been dropped.' => 'Databases verwijderd.',
	'Database has been created.' => 'Database aangemaakt.',
	'Database has been renamed.' => 'Database hernoemd.',
	'Database has been altered.' => 'Database aangepast.',
	// SQLite errors.
	'File exists.' => 'Bestand bestaat reeds.',
	'Please use one of the extensions %s.' => 'Gebruik 1 van volgende extensies: %s.',

	// Schemas (PostgreSQL, MS SQL).
	'Schema' => 'Schema',
	'Alter schema' => 'Schema wijzigen',
	'Create schema' => 'Schema maken',
	'Schema has been dropped.' => 'Schema verwijderd.',
	'Schema has been created.' => 'Schema aangemaakt.',
	'Schema has been altered.' => 'Schema gewijzigd.',
	'Invalid schema.' => 'Ongeldig schema.',

	// Table list.
	'Engine' => 'Engine',
	'engine' => 'engine',
	'Collation' => 'Collatie',
	'collation' => 'collation',
	'Data Length' => 'Data lengte',
	'Index Length' => 'Index lengte',
	'Data Free' => 'Data Vrij',
	'Rows' => 'Rijen',
	'%d in total' => '%d in totaal',
	'Analyze' => 'Analyseer',
	'Optimize' => 'Optimaliseer',
	'Vacuum' => 'Vacuum',
	'Check' => 'Controleer',
	'Repair' => 'Herstel',
	'Truncate' => 'Legen',
	'Tables have been truncated.' => 'Tabellen werden geleegd.',
	'Move to other database' => 'Verplaats naar andere database',
	'Move' => 'Verplaats',
	'Tables have been moved.' => 'Tabellen werden verplaatst.',
	'Copy' => 'Kopieren',
	'Tables have been copied.' => 'De tabellen zijn gekopieerd.',
	'overwrite' => 'overschrijven',

	// Tables.
	'Tables' => 'Tabellen',
	'Tables and views' => 'Tabellen en views',
	'Table' => 'Tabel',
	'No tables.' => 'Geen tabellen.',
	'Alter table' => 'Tabel aanpassen',
	'Create table' => 'Tabel aanmaken',
	'Table has been dropped.' => 'Tabel verwijderd.',
	'Tables have been dropped.' => 'Tabellen werden verwijderd.',
	'Tables have been optimized.' => 'Tabellen zijn geoptimaliseerd.',
	'Table has been altered.' => 'Tabel aangepast.',
	'Table has been created.' => 'Tabel aangemaakt.',
	'Table name' => 'Tabelnaam',
	'Name' => 'Naam',
	'Show structure' => 'Toon structuur',
	'Column name' => 'Kolomnaam',
	'Type' => 'Type',
	'Length' => 'Lengte',
	'Auto Increment' => 'Auto nummering',
	'Options' => 'Opties',
	'Comment' => 'Commentaar',
	'Default value' => 'Standaardwaarde',
	'Drop' => 'Verwijderen',
	'Drop %s?' => 'Verwijder %s?',
	'Are you sure?' => 'Weet u het zeker?',
	'Size' => 'Grootte',
	'Compute' => 'Bereken',
	'Move up' => 'Omhoog',
	'Move down' => 'Omlaag',
	'Remove' => 'Verwijderen',
	'Maximum number of allowed fields exceeded. Please increase %s.' => 'Maximum aantal velden bereikt. Verhoog %s.',

	// Views.
	'View' => 'View',
	'Materialized view' => 'Materialized view',
	'View has been dropped.' => 'View verwijderd.',
	'View has been altered.' => 'View aangepast.',
	'View has been created.' => 'View aangemaakt.',
	'Alter view' => 'View aanpassen',
	'Create view' => 'View aanmaken',

	// Partitions.
	'Partition by' => 'Partitioneren op',
	'Partitions' => 'Partities',
	'Partition name' => 'Partitie naam',
	'Values' => 'Waarden',

	// Indexes.
	'Indexes' => 'Indexen',
	'Indexes have been altered.' => 'Index aangepast.',
	'Alter indexes' => 'Indexen aanpassen',
	'Add next' => 'Volgende toevoegen',
	'Index Type' => 'Index type',
	'length' => 'lengte',

	// Foreign keys.
	'Foreign keys' => 'Foreign keys',
	'Foreign key' => 'Foreign key',
	'Foreign key has been dropped.' => 'Foreign key verwijderd.',
	'Foreign key has been altered.' => 'Foreign key aangepast.',
	'Foreign key has been created.' => 'Foreign key aangemaakt.',
	'Target table' => 'Doeltabel',
	'Change' => 'Veranderen',
	'Source' => 'Bron',
	'Target' => 'Doel',
	'Add column' => 'Kolom toevoegen',
	'Alter' => 'Aanpassen',
	'Add foreign key' => 'Foreign key aanmaken',
	'ON DELETE' => 'ON DELETE',
	'ON UPDATE' => 'ON UPDATE',
	'Source and target columns must have the same data type, there must be an index on the target columns and referenced data must exist.' => 'Bron- en doelkolommen moeten van hetzelfde data type zijn, er moet een index bestaan op de gekozen kolommen en er moet gerelateerde data bestaan.',

	// Routines.
	'Routines' => 'Procedures',
	'Routine has been called, %d row(s) affected.' => [
		'Procedure uitgevoerd, %d rij geraakt.',
		'Procedure uitgevoerd, %d rijen geraakt.',
	],
	'Call' => 'Uitvoeren',
	'Parameter name' => 'Parameternaam',
	'Create procedure' => 'Procedure aanmaken',
	'Create function' => 'Functie aanmaken',
	'Routine has been dropped.' => 'Procedure verwijderd.',
	'Routine has been altered.' => 'Procedure aangepast.',
	'Routine has been created.' => 'Procedure aangemaakt.',
	'Alter function' => 'Functie aanpassen',
	'Alter procedure' => 'Procedure aanpassen',
	'Return type' => 'Return type',

	// Events.
	'Events' => 'Events',
	'Event' => 'Event',
	'Event has been dropped.' => 'Event werd verwijderd.',
	'Event has been altered.' => 'Event werd aangepast.',
	'Event has been created.' => 'Event werd aangemaakt.',
	'Alter event' => 'Event aanpassen',
	'Create event' => 'Event aanmaken',
	'At given time' => 'Op aangegeven tijd',
	'Every' => 'Iedere',
	'Schedule' => 'Schedule',
	'Start' => 'Start',
	'End' => 'Stop',
	'On completion preserve' => 'Bewaren na voltooiing',

	// Sequences (PostgreSQL).
	'Sequences' => 'Sequences',
	'Create sequence' => 'Sequence maken',
	'Sequence has been dropped.' => 'Sequence verwijderd.',
	'Sequence has been created.' => 'Sequence aangemaakt.',
	'Sequence has been altered.' => 'Sequence gewijzigd.',
	'Alter sequence' => 'Sequence wijzigen',

	// User types (PostgreSQL)
	'User types' => 'Gebruikersgedefiniëerde types',
	'Create type' => 'Type maken',
	'Type has been dropped.' => 'Type verwijderd.',
	'Type has been created.' => 'Type aangemaakt.',
	'Alter type' => 'Type wijzigen',

	// Triggers.
	'Triggers' => 'Triggers',
	'Add trigger' => 'Trigger aanmaken',
	'Trigger has been dropped.' => 'Trigger verwijderd.',
	'Trigger has been altered.' => 'Trigger aangepast.',
	'Trigger has been created.' => 'Trigger aangemaakt.',
	'Alter trigger' => 'Trigger aanpassen',
	'Create trigger' => 'Trigger aanmaken',

	// Table check constraints.

	// Selection.
	'Select data' => 'Gegevens selecteren',
	'Select' => 'Kies',
	'Functions' => 'Functies',
	'Aggregation' => 'Totalen',
	'Search' => 'Zoeken',
	'anywhere' => 'overal',
	'Sort' => 'Sorteren',
	'descending' => 'Aflopend',
	'Limit' => 'Beperk',
	'Limit rows' => 'Rijen beperken',
	'Text length' => 'Tekst lengte',
	'Action' => 'Acties',
	'Full table scan' => 'Full table scan',
	'Unable to select the table' => 'Onmogelijk tabel te selecteren',
	'Search data in tables' => 'Zoeken in database',
	'as a regular expression' => 'als een regular expression',
	'No rows.' => 'Geen rijen.',
	'%d / ' => '%d / ',
	'%d row(s)' => [
		'%d rij',
		'%d rijen',
	],
	'Page' => 'Pagina',
	'last' => 'laatste',
	'Load more data' => 'Meer data inladen',
	'Loading' => 'Aan het laden',
	'Whole result' => 'Volledig resultaat',
	'%d byte(s)' => [
		'%d byte',
		'%d bytes',
	],

	// In-place editing in selection.
	'Modify' => 'Aanpassen',
	'Ctrl+click on a value to modify it.' => 'Ctrl+klik op een waarde om deze te bewerken.',
	'Use edit link to modify this value.' => 'Gebruik de link "bewerk" om deze waarde te wijzigen.',

	// Editing.
	'New item' => 'Nieuw item',
	'Edit' => 'Bewerk',
	'original' => 'origineel',
	// label for value '' in enum data type
	'empty' => 'leeg',
	'Insert' => 'Toevoegen',
	'Save' => 'Opslaan',
	'Save and continue edit' => 'Opslaan en verder bewerken',
	'Save and insert next' => 'Opslaan en volgende toevoegen',
	'Saving' => 'Opslaan',
	'Selected' => 'Geselecteerd',
	'Clone' => 'Dupliceer',
	'Delete' => 'Verwijderen',
	// %s can contain auto-increment value, e.g. ' 123'
	'Item%s has been inserted.' => 'Item%s toegevoegd.',
	'Item has been deleted.' => 'Item verwijderd.',
	'Item has been updated.' => 'Item aangepast.',
	'%d item(s) have been affected.' => [
		'%d item aangepast.',
		'%d items aangepast.',
	],
	'You have no privileges to update this table.' => 'U bent niet gemachtigd om deze tabel aan te passen.',

	// Data type descriptions.
	'Numbers' => 'Getallen',
	'Date and time' => 'Datum en tijd',
	'Strings' => 'Tekst',
	'Binary' => 'Binaire gegevens',
	'Lists' => 'Lijsten',
	'Network' => 'Netwerk',
	'Geometry' => 'Geometrie',
	'Relations' => 'Relaties',

	// Editor - data values.
	'now' => 'nu',
	'yes' => 'ja',
	'no' => 'neen',

	// Plugins.
];
