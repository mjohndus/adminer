<?php

namespace AdminNeo;

return [
	// text direction - 'ltr' or 'rtl'
	'ltr' => 'ltr',
	// thousands separator - must contain single byte
	',' => ',',
	'0123456789' => '0123456789',
	// Editor - date format: $1 yyyy, $2 yy, $3 mm, $4 m, $5 dd, $6 d
	'$1-$3-$5' => '$5.$3.$1',
	// Editor - hint for date format - use language equivalents for day, month and year shortcuts
	'YYYY-MM-DD' => 'DD.MM.YYYY',
	// Editor - hint for time format - use language equivalents for hour, minute and second shortcuts
	'HH:MM:SS' => 'HH:MM:SS',

	// Bootstrap.

	// Login.
	'System' => 'Sistem',
	'Server' => 'Server',
	'Username' => 'Nume de utilizator',
	'Password' => 'Parola',
	'Permanent login' => 'Logare permanentă',
	'Login' => 'Intră',
	'Logout' => 'Ieșire',
	'Logged as: %s' => 'Ați intrat ca: %s',
	'Logout successful.' => 'Ați ieșit cu succes.',
	'Invalid CSRF token. Send the form again.' => 'CSRF token imposibil. Retrimite forma.',

	// Connection.
	'No extension' => 'Nu este extensie',
	// %s contains the list of the extensions, e.g. 'mysqli, PDO_MySQL'
	'None of the supported PHP extensions (%s) are available.' => 'Nu este aviabilă nici o extensie suportată (%s).',
	'Session support must be enabled.' => 'Sesiunile trebuie să fie pornite.',
	'Session expired, please login again.' => 'Timpul sesiunii a expirat, rog să vă conectați din nou.',
	'%s version: %s through PHP extension %s' => 'Versiunea %s: %s cu extensia PHP %s',

	// Settings.
	'Language' => 'Limba',

	'Refresh' => 'Împrospătează',

	// Privileges.
	'Privileges' => 'Privilegii',
	'Create user' => 'Crează utilizator',
	'User has been dropped.' => 'Utilizatorul a fost șters.',
	'User has been altered.' => 'Utilizatorul a fost modificat.',
	'User has been created.' => 'Utilizatorul a fost creat.',
	'Hashed' => 'Hashed',

	// Server.
	'Process list' => 'Lista proceselor',
	'%d process(es) have been killed.' => [
		'A fost terminat %d proces.',
		'Au fost terminate %d procese.',
	],
	'Kill' => 'Termină',
	'Variables' => 'Variabile',
	'Status' => 'Stare',

	// Structure.
	'Column' => 'Coloană',
	'Routine' => 'Procedură',
	'Grant' => 'Permite',
	'Revoke' => 'Interzice',

	// Queries.
	'SQL command' => 'SQL query',
	'%d query(s) executed OK.' => [
		'%d query executat.',
		'%d query-uri executate cu succes.',
	],
	'Query executed OK, %d row(s) affected.' => [
		'Query executat, %d înscriere modificată.',
		'Query executat, %d înscrieri modificate.',
	],
	'No commands to execute.' => 'Nu sunt comenzi de executat.',
	'Error in query' => 'Greșeală în query',
	'Execute' => 'Execută',
	'Stop on error' => 'Se oprește la greșeală',
	'Show only errors' => 'Arată doar greșeli',
	'Time' => 'Timp',
	// sprintf() format for time of the command
	'%.3f s' => '%.3f s',
	'History' => 'Istoria',
	'Clear' => 'Curăță',
	'Edit all' => 'Editează tot',

	// Import.
	'Import' => 'Importă',
	'File upload' => 'Încarcă fișierul',
	'From server' => 'De pe server',
	'Webserver file %s' => 'Fișierul %s pe server',
	'Run file' => 'Execută fișier',
	'File does not exist.' => 'Acest fișier nu există.',
	'File uploads are disabled.' => 'Încărcarea fișierelor este interzisă.',
	'Unable to upload a file.' => 'Nu am putut încărca fișierul pe server.',
	'Maximum allowed file size is %sB.' => 'Fișierul maxim admis - %sO.',
	'Too big POST data. Reduce the data or increase the %s configuration directive.' => 'Mesajul POST este prea mare. Trimiteți mai puține date sau măriți parametrul configurației directivei %s.',
	'%d row(s) have been imported.' => [
		'%d rînd importat.',
		'%d rînduri importate.',
	],

	// Export.
	'Export' => 'Export',
	'Output' => 'Date de ieșire',
	'open' => 'deschide',
	'save' => 'salvează',
	'Format' => 'Format',
	'Data' => 'Date',

	// Databases.
	'Database' => 'Baza de date',
	'Use' => 'Alege',
	'Invalid database.' => 'Bază de deate invalidă.',
	'Alter database' => 'Modifică baza de date',
	'Create database' => 'Crează baza de date',
	'Database schema' => 'Schema bazei de date',
	'Permanent link' => 'Adresă permanentă',
	'Database has been dropped.' => 'Baza de date a fost ștearsă.',
	'Databases have been dropped.' => 'Bazele de date au fost șterse.',
	'Database has been created.' => 'Baza de date a fost creată.',
	'Database has been renamed.' => 'Baza de date a fost redenumită.',
	'Database has been altered.' => 'Baza de date a fost modificată.',
	// SQLite errors.
	'File exists.' => 'Fișierul există deja.',
	'Please use one of the extensions %s.' => 'Folosiți una din următoarele extensii %s.',

	// Schemas (PostgreSQL, MS SQL).
	'Schema' => 'Schema',
	'Alter schema' => 'Modifică schema',
	'Create schema' => 'Crează o schemă',
	'Schema has been dropped.' => 'Schema a fost ștearsă.',
	'Schema has been created.' => 'Schema a fost creată.',
	'Schema has been altered.' => 'Schema a fost modificată.',
	'Invalid schema.' => 'Schemă incorectă.',

	// Table list.
	'Engine' => 'Tip',
	'engine' => 'tip',
	'Collation' => 'Colaționare',
	'collation' => 'colaționarea',
	'Data Length' => 'Cantitatea de date',
	'Index Length' => 'Cantitatea de indecși',
	'Data Free' => 'Spațiu liber',
	'Rows' => 'Înscrieri',
	'%d in total' => 'În total %d',
	'Analyze' => 'Analizează',
	'Optimize' => 'Optimizează',
	'Check' => 'Controlează',
	'Repair' => 'Repară',
	'Truncate' => 'Curăță',
	'Tables have been truncated.' => 'Tabelele au fost curățate.',
	'Move to other database' => 'Mută în altă bază de date',
	'Move' => 'Mută',
	'Tables have been moved.' => 'Tabelele au fost mutate.',
	'Copy' => 'Copiază',
	'Tables have been copied.' => 'Tabelele au fost copiate.',

	// Tables.
	'Tables' => 'Tabele',
	'Tables and views' => 'Tabele și reprezentări',
	'Table' => 'Tabel',
	'No tables.' => 'În baza de date nu sunt tabele.',
	'Alter table' => 'Modifică tabelul',
	'Create table' => 'Crează tabel',
	'Table has been dropped.' => 'Tabelul a fost șters.',
	'Tables have been dropped.' => 'Tabelele au fost șterse.',
	'Table has been altered.' => 'Tabelul a fost modificat.',
	'Table has been created.' => 'Tabelul a fost creat.',
	'Table name' => 'Denumirea tabelului',
	'Name' => 'Titlu',
	'Show structure' => 'Arată structura',
	'Column name' => 'Denumirea coloanei',
	'Type' => 'Tip',
	'Length' => 'Lungime',
	'Auto Increment' => 'Creșterea automată',
	'Options' => 'Acțiune',
	'Comment' => 'Comentariu',
	'Drop' => 'Șterge',
	'Are you sure?' => 'Sunteți sigur(ă)?',
	'Move up' => 'Mișcă în sus',
	'Move down' => 'Mișcă în jos',
	'Remove' => 'Șterge',
	'Maximum number of allowed fields exceeded. Please increase %s.' => 'Numărul maxim de înscrieri disponibile a fost atins. Majorați %s.',

	// Views.
	'View' => 'Reprezentare',
	'View has been dropped.' => 'Reprezentarea a fost ștearsă.',
	'View has been altered.' => 'Reprezentarea a fost modificată.',
	'View has been created.' => 'Reprezentarea a fost creată.',
	'Alter view' => 'Modifică reprezentarea',
	'Create view' => 'Crează reprezentare',

	// Partitions.
	'Partition by' => 'Împarte',
	'Partitions' => 'Secțiuni',
	'Partition name' => 'Denumirea secțiunii',
	'Values' => 'Parametru',

	// Indexes.
	'Indexes' => 'Indexuri',
	'Indexes have been altered.' => 'Indexurile au fost modificate.',
	'Alter indexes' => 'Modifică indexuri',
	'Add next' => 'Adaugă încă',
	'Index Type' => 'Tipul indexului',
	'length' => 'lungimea',

	// Foreign keys.
	'Foreign keys' => 'Chei externe',
	'Foreign key' => 'Cheie externă',
	'Foreign key has been dropped.' => 'Cheia externă a fost ștearsă.',
	'Foreign key has been altered.' => 'Cheia externă a fost modificată.',
	'Foreign key has been created.' => 'Cheia externă a fost creată.',
	'Target table' => 'Tabela scop',
	'Change' => 'Modifică',
	'Source' => 'Sursă',
	'Target' => 'Scop',
	'Add column' => 'Adaugă coloană',
	'Alter' => 'Modifică',
	'Add foreign key' => 'Adaugă cheie externă',
	'ON DELETE' => 'La ștergere',
	'ON UPDATE' => 'La modificare',
	'Source and target columns must have the same data type, there must be an index on the target columns and referenced data must exist.' => 'Coloanele ar trebui să aibă aceleaşi tipuri de date, trebuie să existe date de referinţă și un index pe coloanela-ţintă.',

	// Routines.
	'Routines' => 'Proceduri și funcții salvate',
	'Routine has been called, %d row(s) affected.' => [
		'A fost executată procedura, %d înscriere a fost modificată.',
		'A fost executată procedura, %d înscrieri au fost modificate.',
	],
	'Call' => 'Apelează',
	'Parameter name' => 'Numele parametrului',
	'Create procedure' => 'Crează procedură',
	'Create function' => 'Crează funcție',
	'Routine has been dropped.' => 'Procedura a fost ștearsă.',
	'Routine has been altered.' => 'Procedura a fost modificată.',
	'Routine has been created.' => 'Procedura a fost creată.',
	'Alter function' => 'Modifică funcția',
	'Alter procedure' => 'Modifică procedura',
	'Return type' => 'Tipul returnării',

	// Events.
	'Events' => 'Evenimente',
	'Event' => 'Eveniment',
	'Event has been dropped.' => 'Evenimentul a fost șters.',
	'Event has been altered.' => 'Evenimentul a fost modificat.',
	'Event has been created.' => 'Evenimentul a fost adăugat.',
	'Alter event' => 'Modifică eveniment',
	'Create event' => 'Creează evenimet',
	'At given time' => 'În timpul curent',
	'Every' => 'Fiecare',
	'Schedule' => 'Program',
	'Start' => 'Început',
	'End' => 'Sfârșit',
	'On completion preserve' => 'Salvează după finisare',

	// Sequences (PostgreSQL).
	'Sequences' => '«Secvențe»',
	'Create sequence' => 'Crează «secvență»',
	'Sequence has been dropped.' => '«secvența» a fost ștearsă.',
	'Sequence has been created.' => '«secvența» a fost creată.',
	'Sequence has been altered.' => '«secvența» a fost modificată.',
	'Alter sequence' => 'Modifică «secvență»',

	// User types (PostgreSQL)
	'User types' => 'Tipuri de utilizatori',
	'Create type' => 'Crează tip noi',
	'Type has been dropped.' => 'Tiipul a fost șters.',
	'Type has been created.' => 'Crează tip nou.',
	'Alter type' => 'Modifică tip',

	// Triggers.
	'Triggers' => 'Declanșatoare',
	'Add trigger' => 'Adaugă trigger (declanșator)',
	'Trigger has been dropped.' => 'Triggerul a fost șters.',
	'Trigger has been altered.' => 'Triggerul a fost modificat.',
	'Trigger has been created.' => 'Triggerul a fost creat.',
	'Alter trigger' => 'Modifică trigger',
	'Create trigger' => 'Crează trigger',

	// Table check constraints.

	// Selection.
	'Select data' => 'Selectează',
	'Select' => 'Selectează',
	'Functions' => 'Funcții',
	'Aggregation' => 'Agregare',
	'Search' => 'Căutare',
	'anywhere' => 'oriunde',
	'Sort' => 'Sortare',
	'descending' => 'descrescător',
	'Limit' => 'Limit',
	'Text length' => 'Lungimea textului',
	'Action' => 'Acțiune',
	'Unable to select the table' => 'Nu am putut selecta date din tabel',
	'Search data in tables' => 'Caută în tabele',
	'No rows.' => 'Nu sunt înscrieri.',
	'%d row(s)' => [
		'%d înscriere',
		'%d înscrieri',
	],
	'Page' => 'Pagina',
	'last' => 'ultima',
	'Whole result' => 'Tot rezultatul',
	'%d byte(s)' => [
		'%d octet',
		'%d octeți',
	],

	// In-place editing in selection.
	'Ctrl+click on a value to modify it.' => 'Ctrl+click pe o valoare pentru a o modifica.',
	'Use edit link to modify this value.' => 'Valoare poate fi modificată cu ajutorul butonului «modifică».',

	// Editing.
	'New item' => 'Înscriere nouă',
	'Edit' => 'Editează',
	'original' => 'original',
	// label for value '' in enum data type
	'empty' => 'gol',
	'Insert' => 'Inserează',
	'Save' => 'Salvează',
	'Save and continue edit' => 'Salvează și continuă editarea',
	'Save and insert next' => 'Salvează și mai inserează',
	'Clone' => 'Clonează',
	'Delete' => 'Șterge',
	// %s can contain auto-increment value, e.g. ' 123'
	'Item%s has been inserted.' => 'Înregistrarea%s a fost inserată.',
	'Item has been deleted.' => 'Înregistrare a fost ștearsă.',
	'Item has been updated.' => 'Înregistrare a fost înnoită.',
	'%d item(s) have been affected.' => [
		'A fost modificată %d înscriere.',
		'Au fost modificate %d înscrieri.',
	],

	// Data type descriptions.
	'Numbers' => 'Număr',
	'Date and time' => 'Data și timpul',
	'Strings' => 'Șiruri de caractere',
	'Binary' => 'Tip binar',
	'Lists' => 'Liste',
	'Network' => 'Rețea',
	'Geometry' => 'Geometrie',
	'Relations' => 'Relații',

	// Editor - data values.
	'now' => 'acum',

	// Plugins.
];
