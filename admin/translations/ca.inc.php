<?php

namespace AdminNeo;

return [
	// text direction - 'ltr' or 'rtl'
	'ltr' => 'ltr',
	// thousands separator - must contain single byte
	',' => ',',
	'0123456789' => '0123456789',
	// Editor - date format: $1 yyyy, $2 yy, $3 mm, $4 m, $5 dd, $6 d
	'$1-$3-$5' => '$5/$3/$1',
	// Editor - hint for date format - use language equivalents for day, month and year shortcuts
	'YYYY-MM-DD' => 'DD/MM/AAAA',
	// Editor - hint for time format - use language equivalents for hour, minute and second shortcuts
	'HH:MM:SS' => 'HH:MM:SS',

	// Bootstrap.

	// Login.
	'System' => 'Sistema',
	'Server' => 'Servidor',
	'Username' => 'Nom d\'usuari',
	'Password' => 'Contrasenya',
	'Permanent login' => 'Sessió permanent',
	'Login' => 'Inicia la sessió',
	'Logout' => 'Desconnecta',
	'Logged as: %s' => 'Connectat com a: %s',
	'Logout successful.' => 'Desconnexió correcta.',
	'Invalid CSRF token. Send the form again.' => 'Token CSRF invàlid. Torna a enviar el formulari.',

	// Connection.
	'No extension' => 'Cap extensió',
	// %s contains the list of the extensions, e.g. 'mysqli, PDO_MySQL'
	'None of the supported PHP extensions (%s) are available.' => 'No hi ha cap de les extensions PHP suportades (%s) disponible.',
	'Session support must be enabled.' => 'Cal que estigui permès l\'us de sessions.',
	'Session expired, please login again.' => 'La sessió ha expirat, torna a iniciar-ne una.',
	'%s version: %s through PHP extension %s' => 'Versió %s: %s amb l\'extensió de PHP %s',

	// Settings.
	'Language' => 'Idioma',

	'Refresh' => 'Refresca',

	// Privileges.
	'Privileges' => 'Privilegis',
	'Create user' => 'Crea un usuari',
	'User has been dropped.' => 'S\'ha suprimit l\'usuari.',
	'User has been altered.' => 'S\'ha modificat l\'usuari.',
	'User has been created.' => 'S\'ha creat l\'usuari.',
	'Hashed' => 'Hashed',

	// Server.
	'Process list' => 'Llista de processos',
	'%d process(es) have been killed.' => [
		'S\'ha aturat %d procés.',
		'S\'han aturat %d processos.',
	],
	'Kill' => 'Atura',
	'Variables' => 'Variables',
	'Status' => 'Estat',

	// Structure.
	'Column' => 'Columna',
	'Routine' => 'Rutina',
	'Grant' => 'Grant',
	'Revoke' => 'Revoke',

	// Queries.
	'SQL command' => 'Ordre SQL',
	'%d query(s) executed OK.' => [
		'%d consulta executada correctament.',
		'%d consultes executades correctament.',
	],
	'Query executed OK, %d row(s) affected.' => [
		'Consulta executada correctament, %d registre modificat.',
		'Consulta executada correctament, %d registres modificats.',
	],
	'No commands to execute.' => 'Cap comanda per executar.',
	'Error in query' => 'Error en la consulta',
	'Execute' => 'Executa',
	'Stop on error' => 'Atura en trobar un error',
	'Show only errors' => 'Mostra només els errors',
	'Time' => 'Temps',
	// sprintf() format for time of the command
	'%.3f s' => '%.3f s',
	'History' => 'Història',
	'Clear' => 'Suprimeix',
	'Edit all' => 'Edita-ho tot',

	// Import.
	'Import' => 'Importa',
	'File upload' => 'Adjunta un fitxer',
	'From server' => 'En el servidor',
	'Webserver file %s' => 'Fitxer %s del servidor web',
	'Run file' => 'Executa el fitxer',
	'File does not exist.' => 'El fitxer no existeix.',
	'File uploads are disabled.' => 'La pujada de fitxers està desactivada.',
	'Unable to upload a file.' => 'Impossible adjuntar el fitxer.',
	'Maximum allowed file size is %sB.' => 'La mida màxima permesa del fitxer és de %sB.',
	'Too big POST data. Reduce the data or increase the %s configuration directive.' => 'Les dades POST són massa grans. Redueix les dades o incrementa la directiva de configuració %s.',
	'%d row(s) have been imported.' => [
		'S\'ha importat %d registre.',
		'S\'han importat %d registres.',
	],

	// Export.
	'Export' => 'Exporta',
	'Output' => 'Sortida',
	'open' => 'obre',
	'save' => 'desa',
	'Format' => 'Format',
	'Data' => 'Dades',

	// Databases.
	'Database' => 'Base de dades',
	'Use' => 'Utilitza',
	'Invalid database.' => 'Base de dades invàlida.',
	'Alter database' => 'Modifica la base de dades',
	'Create database' => 'Crea una base de dades',
	'Database schema' => 'Esquema de la base de dades',
	'Permanent link' => 'Enllaç permanent',
	'Database has been dropped.' => 'S\'ha suprimit la base de dades.',
	'Databases have been dropped.' => 'S\'han suprimit les bases de dades.',
	'Database has been created.' => 'S\'ha creat la base de dades.',
	'Database has been renamed.' => 'S\'ha canviat el nom de la base de dades.',
	'Database has been altered.' => 'S\'ha modificat la base de dades.',
	// SQLite errors.
	'File exists.' => 'El fitxer ja existeix.',
	'Please use one of the extensions %s.' => 'Si us plau, utilitza una de les extensions %s.',

	// Schemas (PostgreSQL, MS SQL).
	'Schema' => 'Esquema',
	'Alter schema' => 'Modifica l\'esquema',
	'Create schema' => 'Crea un esquema',
	'Schema has been dropped.' => 'S\'ha suprimit l\'esquema.',
	'Schema has been created.' => 'S\'ha creat l\'esquema.',
	'Schema has been altered.' => 'S\'ha modificat l\'esquema.',
	'Invalid schema.' => 'Esquema invàlid.',

	// Table list.
	'Engine' => 'Motor',
	'engine' => 'motor',
	'Collation' => 'Compaginació',
	'collation' => 'compaginació',
	'Data Length' => 'Longitud de les dades',
	'Index Length' => 'Longitud de l\'índex',
	'Data Free' => 'Espai lliure',
	'Rows' => 'Files',
	'%d in total' => '%d en total',
	'Analyze' => 'Analitza',
	'Optimize' => 'Optimitza',
	'Check' => 'Verifica',
	'Repair' => 'Repara',
	'Truncate' => 'Escapça',
	'Tables have been truncated.' => 'S\'han escapçat les taules.',
	'Move to other database' => 'Desplaça a una altra base de dades',
	'Move' => 'Desplaça',
	'Tables have been moved.' => 'S\'han desplaçat les taules.',
	'Copy' => 'Còpia',
	'Tables have been copied.' => 'S\'han copiat les taules.',

	// Tables.
	'Tables' => 'Taules',
	'Tables and views' => 'Taules i vistes',
	'Table' => 'Taula',
	'No tables.' => 'No hi ha cap taula.',
	'Alter table' => 'Modifica la taula',
	'Create table' => 'Crea una taula',
	'Table has been dropped.' => 'S\'ha suprimit la taula.',
	'Tables have been dropped.' => 'S\'han suprimit les taules.',
	'Table has been altered.' => 'S\'ha modificat la taula.',
	'Table has been created.' => 'S\'ha creat la taula.',
	'Table name' => 'Nom de la taula',
	'Name' => 'Nom',
	'Show structure' => 'Mostra l\'estructura',
	'Column name' => 'Nom de la columna',
	'Type' => 'Tipus',
	'Length' => 'Llargada',
	'Auto Increment' => 'Increment automàtic',
	'Options' => 'Opcions',
	'Comment' => 'Comentari',
	'Drop' => 'Suprimeix',
	'Are you sure?' => 'Estàs segur?',
	'Move up' => 'Mou a dalt',
	'Move down' => 'Mou a baix',
	'Remove' => 'Suprimeix',
	'Maximum number of allowed fields exceeded. Please increase %s.' => 'S\'ha assolit el nombre màxim de camps. Incrementa %s.',

	// Views.
	'View' => 'Vista',
	'View has been dropped.' => 'S\'ha suprimit la vista.',
	'View has been altered.' => 'S\'ha modificat la vista.',
	'View has been created.' => 'S\'ha creat la vista.',
	'Alter view' => 'Modifica la vista',
	'Create view' => 'Crea una vista',

	// Partitions.
	'Partition by' => 'Fes particions segons',
	'Partitions' => 'Particions',
	'Partition name' => 'Nom de la partició',
	'Values' => 'Valors',

	// Indexes.
	'Indexes' => 'Índexs',
	'Indexes have been altered.' => 'S\'han modificat els índex.',
	'Alter indexes' => 'Modifica els índex',
	'Add next' => 'Afegeix el següent',
	'Index Type' => 'Tipus d\'índex',
	'length' => 'longitud',

	// Foreign keys.
	'Foreign keys' => 'Claus foranes',
	'Foreign key' => 'Clau forana',
	'Foreign key has been dropped.' => 'S\'ha suprimit la clau forana.',
	'Foreign key has been altered.' => 'S\'ha modificat la clau forana.',
	'Foreign key has been created.' => 'S\'ha creat la clau forana.',
	'Target table' => 'Taula de destinació',
	'Change' => 'Canvi',
	'Source' => 'Font',
	'Target' => 'Destí',
	'Add column' => 'Afegeix una columna',
	'Alter' => 'Modifica',
	'Add foreign key' => 'Afegeix una clau forana',
	'ON DELETE' => 'ON DELETE',
	'ON UPDATE' => 'ON UPDATE',
	'Source and target columns must have the same data type, there must be an index on the target columns and referenced data must exist.' => 'Les columnes d\'origen i de destinació han de ser del mateix tipus, la columna de destinació ha d\'estar indexada i les dades referenciades han d\'existir.',

	// Routines.
	'Routines' => 'Rutines',
	'Routine has been called, %d row(s) affected.' => [
		'S\'ha cridat la rutina, %d registre modificat.',
		'S\'ha cridat la rutina, %d registres modificats.',
	],
	'Call' => 'Crida',
	'Parameter name' => 'Nom del paràmetre',
	'Create procedure' => 'Crea un procediment',
	'Create function' => 'Crea una funció',
	'Routine has been dropped.' => 'S\'ha suprimit la rutina.',
	'Routine has been altered.' => 'S\'ha modificat la rutina.',
	'Routine has been created.' => 'S\'ha creat la rutina.',
	'Alter function' => 'Modifica la funció',
	'Alter procedure' => 'Modifica el procediment',
	'Return type' => 'Tipus retornat',

	// Events.
	'Events' => 'Events',
	'Event' => 'Event',
	'Event has been dropped.' => 'S\'ha suprimit l\'event.',
	'Event has been altered.' => 'S\'ha modificat l\'event.',
	'Event has been created.' => 'S\'ha creat l\'event.',
	'Alter event' => 'Modifica l\'event',
	'Create event' => 'Crea un event',
	'At given time' => 'A un moment donat',
	'Every' => 'Cada',
	'Schedule' => 'Horari',
	'Start' => 'Comença',
	'End' => 'Acaba',
	'On completion preserve' => 'Conservar en completar',

	// Sequences (PostgreSQL).
	'Sequences' => 'Seqüències',
	'Create sequence' => 'Crea una seqüència',
	'Sequence has been dropped.' => 'S\'ha suprimit la seqüència.',
	'Sequence has been created.' => 'S\'ha creat la seqüència.',
	'Sequence has been altered.' => 'S\'ha modificat la seqüència.',
	'Alter sequence' => 'Modifica la seqüència',

	// User types (PostgreSQL)
	'User types' => 'Tipus de l\'usuari',
	'Create type' => 'Crea un tipus',
	'Type has been dropped.' => 'S\'ha suprimit el tipus.',
	'Type has been created.' => 'S\'ha creat el tipus.',
	'Alter type' => 'Modifica el tipus',

	// Triggers.
	'Triggers' => 'Activadors',
	'Add trigger' => 'Afegeix un activador',
	'Trigger has been dropped.' => 'S\'ha suprimit l\'activador.',
	'Trigger has been altered.' => 'S\'ha modificat l\'activador.',
	'Trigger has been created.' => 'S\'ha creat l\'activador.',
	'Alter trigger' => 'Modifica l\'activador',
	'Create trigger' => 'Crea un activador',

	// Table check constraints.

	// Selection.
	'Select data' => 'Selecciona dades',
	'Select' => 'Selecciona',
	'Functions' => 'Funcions',
	'Aggregation' => 'Agregació',
	'Search' => 'Cerca',
	'anywhere' => 'a qualsevol lloc',
	'Sort' => 'Ordena',
	'descending' => 'descendent',
	'Limit' => 'Límit',
	'Text length' => 'Longitud del text',
	'Action' => 'Acció',
	'Unable to select the table' => 'Impossible seleccionar la taula',
	'Search data in tables' => 'Cerca dades en les taules',
	'No rows.' => 'No hi ha cap registre.',
	'%d row(s)' => [
		'%d registre',
		'%d registres',
	],
	'Page' => 'Plana',
	'last' => 'darrera',
	'Whole result' => 'Tots els resultats',
	'%d byte(s)' => [
		'%d byte',
		'%d bytes',
	],

	// In-place editing in selection.
	'Ctrl+click on a value to modify it.' => 'Fes un Ctrl+clic a un valor per modificar-lo.',
	'Use edit link to modify this value.' => 'Utilitza l\'enllaç d\'edició per modificar aquest valor.',

	// Editing.
	'New item' => 'Nou element',
	'Edit' => 'Edita',
	'original' => 'original',
	// label for value '' in enum data type
	'empty' => 'buit',
	'Insert' => 'Insereix',
	'Save' => 'Desa',
	'Save and continue edit' => 'Desa i segueix editant',
	'Save and insert next' => 'Desa i insereix el següent',
	'Clone' => 'Clona',
	'Delete' => 'Suprimeix',
	// %s can contain auto-increment value, e.g. ' 123'
	'Item%s has been inserted.' => 'S\'ha insertat l\'element%s.',
	'Item has been deleted.' => 'S\'ha suprimit l\'element.',
	'Item has been updated.' => 'S\'ha actualitzat l\'element.',
	'%d item(s) have been affected.' => [
		'S\'ha modificat %d element.',
		'S\'han modificat %d elements.',
	],

	// Data type descriptions.
	'Numbers' => 'Nombres',
	'Date and time' => 'Data i hora',
	'Strings' => 'Cadenes',
	'Binary' => 'Binari',
	'Lists' => 'Llistes',
	'Network' => 'Xarxa',
	'Geometry' => 'Geometria',
	'Relations' => 'Relacions',

	// Editor - data values.
	'now' => 'ara',

	// Plugins.
];
