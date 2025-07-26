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
	'%s must return an array.' => '%s musi zwrócić tablicę.',
	'%s and %s must return an object created by %s method.' => '%s i %s muszą zwracać obiekt utworzony przez metodę %s.',

	// Login.
	'System' => 'Rodzaj bazy',
	'Server' => 'Serwer',
	'Username' => 'Użytkownik',
	'Password' => 'Hasło',
	'Permanent login' => 'Zapamiętaj sesję',
	'Login' => 'Zaloguj się',
	'Logout' => 'Wyloguj się',
	'Logged as: %s' => 'Zalogowany jako: %s',
	'Logout successful.' => 'Wylogowano pomyślnie.',
	'Invalid server or credentials.' => 'Nieprawidłowy serwer lub dane logowania.',
	'There is a space in the input password which might be the cause.' => 'W haśle wejściowym znajduje się spacja, która może być przyczyną.',
	'AdminNeo does not support accessing a database without a password, <a href="https://www.adminneo.org/password"%s>more information</a>.' => 'AdminNeo nie obsługuje dostępu do bazy danych bez hasła, <a href="https://www.adminneo.org/password"%s>więcej informacji</a>.',
	'Database does not support password.' => 'Baza danych nie obsługuje hasła.',
	'Too many unsuccessful logins, try again in %d minute(s).' => [
		'Za dużo nieudanych prób logowania, spróbuj ponownie za %d minutę.',
		'Za dużo nieudanych prób logowania, spróbuj ponownie za %d minuty.',
		'Za dużo nieudanych prób logowania, spróbuj ponownie za %d minut.',
	],
	'Invalid permanent login, please login again.' => 'Nieprawidłowe trwałe logowanie, proszę zaloguj się ponownie.',
	'Invalid CSRF token. Send the form again.' => 'Nieprawidłowy token CSRF. Spróbuj wysłać formularz ponownie.',
	'If you did not send this request from AdminNeo then close this page.' => 'Jeżeli nie wywołałeś tej strony z AdminNeo, zamknij to okno.',
	'The action will be performed after successful login with the same credentials.' => 'Czynność zostanie wykonana po pomyślnym zalogowaniu przy użyciu tych samych danych logowania.',

	// Connection.
	'No driver' => 'Brak sterownika',
	'Database driver not found.' => 'Nie znaleziono sterownika bazy danych.',
	'No extension' => 'Brak rozszerzenia',
	// %s contains the list of the extensions, e.g. 'mysqli, PDO_MySQL'
	'None of the supported PHP extensions (%s) are available.' => 'Żadne z rozszerzeń PHP umożliwiających połączenie się z bazą danych (%s) nie jest dostępne.',
	'Connecting to privileged ports is not allowed.' => 'Łączenie do portów uprzywilejowanych jest niedozwolone.',
	'Session support must be enabled.' => 'Wymagana jest obsługa sesji w PHP.',
	'Session expired, please login again.' => 'Sesja wygasła, zaloguj się ponownie.',
	'%s version: %s through PHP extension %s' => 'Wersja %s: %s za pomocą %s',

	// Settings.
	'Language' => 'Język',

	'Home' => 'Strona główna',
	'Refresh' => 'Odśwież',
	'Info' => 'Informacje',
	'More information.' => 'Więcej informacji.',

	// Privileges.
	'Privileges' => 'Uprawnienia użytkowników',
	'Create user' => 'Dodaj użytkownika',
	'User has been dropped.' => 'Użytkownik został usunięty.',
	'User has been altered.' => 'Użytkownik został zmieniony.',
	'User has been created.' => 'Użytkownik został dodany.',
	'Hashed' => 'Zahashowane',

	// Server.
	'Process list' => 'Lista procesów',
	'%d process(es) have been killed.' => [
		'Przerwano %d wątek.',
		'Przerwano %d wątki.',
		'Przerwano %d wątków.',
	],
	'Kill' => 'Przerwij wykonywanie',
	'Variables' => 'Zmienne',
	'Status' => 'Status',

	// Structure.
	'Column' => 'Kolumna',
	'Routine' => 'Procedura',
	'Grant' => 'Uprawnienia',
	'Revoke' => 'Usuń uprawnienia',

	// Queries.
	'SQL command' => 'Zapytanie SQL',
	'HTTP request' => 'Żądanie HTTP',
	'%d query(s) executed OK.' => [
		'Pomyślnie wykonano %d zapytanie.',
		'Pomyślnie wykonano %d zapytania.',
		'Pomyślnie wykonano %d zapytań.',
	],
	'Query executed OK, %d row(s) affected.' => [
		'Zapytanie wykonane pomyślnie, zmieniono %d rekord.',
		'Zapytanie wykonane pomyślnie, zmieniono %d rekordy.',
		'Zapytanie wykonane pomyślnie, zmieniono %d rekordów.',
	],
	'No commands to execute.' => 'Nic do wykonania.',
	'Error in query' => 'Błąd w zapytaniu',
	'Unknown error.' => 'Nieznany błąd.',
	'Warnings' => 'Ostrzeżenia',
	'ATTACH queries are not supported.' => 'Zapytania ATTACH są niewspierane.',
	'Execute' => 'Wykonaj',
	'Stop on error' => 'Zatrzymaj w przypadku błędu',
	'Show only errors' => 'Pokaż tylko błędy',
	'Time' => 'Czas',
	// sprintf() format for time of the command
	'%.3f s' => '%.3f s',
	'History' => 'Historia',
	'Clear' => 'Wyczyść',
	'Edit all' => 'Edytuj wszystkie',

	// Import.
	'Import' => 'Importuj',
	'File upload' => 'Wgranie pliku',
	'From server' => 'Z serwera',
	'Webserver file %s' => 'Plik %s na serwerze',
	'Run file' => 'Uruchom z pliku',
	'File does not exist.' => 'Plik nie istnieje.',
	'File uploads are disabled.' => 'Wgrywanie plików jest wyłączone.',
	'Unable to upload a file.' => 'Wgranie pliku było niemożliwe.',
	'Maximum allowed file size is %sB.' => 'Maksymalna wielkość pliku to %sB.',
	'Too big POST data. Reduce the data or increase the %s configuration directive.' => 'Przesłano zbyt dużo danych. Zmniejsz objętość danych lub zwiększ zmienną konfiguracyjną %s.',
	'You can upload a big SQL file via FTP and import it from server.' => 'Większe pliki SQL możesz wgrać na serwer poprzez FTP przed zaimportowaniem.',
	'File must be in UTF-8 encoding.' => 'Kodowanie pliku musi być ustawione na UTF-8.',
	'You are offline.' => 'Jesteś offline.',
	'%d row(s) have been imported.' => [
		'%d rekord został zaimportowany.',
		'%d rekordy zostały zaimportowane.',
		'%d rekordów zostało zaimportowanych.',
	],

	// Export.
	'Export' => 'Eksportuj',
	'Output' => 'Rezultat',
	'open' => 'otwórz',
	'save' => 'zapisz',
	'Format' => 'Format',
	'Data' => 'Dane',

	// Databases.
	'Database' => 'Baza danych',
	'DB' => 'BD',
	'Use' => 'Wybierz',
	'Invalid database.' => 'Nie znaleziono bazy danych.',
	'Alter database' => 'Zmień bazę danych',
	'Create database' => 'Utwórz bazę danych',
	'Database schema' => 'Schemat bazy danych',
	'Permanent link' => 'Trwały link',
	'Database has been dropped.' => 'Baza danych została usunięta.',
	'Databases have been dropped.' => 'Bazy danych zostały usunięte.',
	'Database has been created.' => 'Baza danych została utworzona.',
	'Database has been renamed.' => 'Nazwa bazy danych została zmieniona.',
	'Database has been altered.' => 'Baza danych została zmieniona.',
	// SQLite errors.
	'File exists.' => 'Plik już istnieje.',
	'Please use one of the extensions %s.' => 'Proszę użyć jednego z rozszerzeń: %s.',

	// Schemas (PostgreSQL, MS SQL).
	'Schema' => 'Schemat',
	'Schemas' => 'Schematy',
	'No schemas.' => 'Brak schematów.',
	'Show schema' => 'Pokaż schemat',
	'Alter schema' => 'Zmień schemat',
	'Create schema' => 'Utwórz schemat',
	'Schema has been dropped.' => 'Schemat został usunięty.',
	'Schema has been created.' => 'Schemat został utworzony.',
	'Schema has been altered.' => 'Schemat został zmieniony.',
	'Invalid schema.' => 'Nieprawidłowy schemat.',

	// Table list.
	'Engine' => 'Składowanie',
	'engine' => 'składowanie',
	'Collation' => 'Porównywanie znaków',
	'collation' => 'porównywanie znaków',
	'Data Length' => 'Rozmiar danych',
	'Index Length' => 'Rozmiar indeksów',
	'Data Free' => 'Wolne miejsce',
	'Rows' => 'Liczba rekordów',
	'%d in total' => '%d w sumie',
	'Analyze' => 'Analizuj',
	'Optimize' => 'Optymalizuj',
	'Vacuum' => 'Wyczyść',
	'Check' => 'Sprawdź',
	'Repair' => 'Napraw',
	'Truncate' => 'Opróżnij',
	'Tables have been truncated.' => 'Tabele zostały opróżnione.',
	'Move to other database' => 'Przenieś do innej bazy danych',
	'Move' => 'Przenieś',
	'Tables have been moved.' => 'Tabele zostały przeniesione.',
	'Copy' => 'Kopiuj',
	'Tables have been copied.' => 'Tabele zostały skopiowane.',
	'overwrite' => 'nadpisz',

	// Tables.
	'Tables' => 'Tabele',
	'Tables and views' => 'Tabele i perspektywy',
	'Table' => 'Tabela',
	'No tables.' => 'Brak tabel.',
	'Alter table' => 'Zmień tabelę',
	'Create table' => 'Utwórz tabelę',
	'Table has been dropped.' => 'Tabela została usunięta.',
	'Tables have been dropped.' => 'Tabele zostały usunięte.',
	'Tables have been optimized.' => 'Tabele zostały zoptymalizowane.',
	'Table has been altered.' => 'Tabela została zmieniona.',
	'Table has been created.' => 'Tabela została utworzona.',
	'Table name' => 'Nazwa tabeli',
	'Name' => 'Nazwa',
	'Show structure' => 'Struktura tabeli',
	'Column name' => 'Nazwa kolumny',
	'Type' => 'Typ',
	'Length' => 'Długość',
	'Auto Increment' => 'Automatyczny przyrost',
	'Options' => 'Opcje',
	'Comment' => 'Komentarz',
	'Default value' => 'Wartość domyślna',
	'Drop' => 'Usuń',
	'Drop %s?' => 'Usunąć %s?',
	'Are you sure?' => 'Czy na pewno?',
	'Size' => 'Rozmiar',
	'Compute' => 'Oblicz',
	'Move up' => 'Przesuń w górę',
	'Move down' => 'Przesuń w dół',
	'Remove' => 'Usuń',
	'Maximum number of allowed fields exceeded. Please increase %s.' => 'Przekroczono maksymalną liczbę pól. Zwiększ %s.',

	// Views.
	'View' => 'Perspektywa',
	'Materialized view' => 'Zmaterializowana perspektywa',
	'View has been dropped.' => 'Perspektywa została usunięta.',
	'View has been altered.' => 'Perspektywa została zmieniona.',
	'View has been created.' => 'Perspektywa została utworzona.',
	'Alter view' => 'Zmień perspektywę',
	'Create view' => 'Utwórz perspektywę',

	// Partitions.
	'Partition by' => 'Partycjonowanie',
	'Partition' => 'Partycja',
	'Partitions' => 'Partycje',
	'Partition name' => 'Nazwa partycji',
	'Values' => 'Wartości',

	// Indexes.
	'Indexes' => 'Indeksy',
	'Indexes have been altered.' => 'Indeksy zostały zmienione.',
	'Alter indexes' => 'Zmień indeksy',
	'Add next' => 'Dodaj następny',
	'Index Type' => 'Typ indeksu',
	'length' => 'długość',

	// Foreign keys.
	'Foreign keys' => 'Klucze obce',
	'Foreign key' => 'Klucz obcy',
	'Foreign key has been dropped.' => 'Klucz obcy został usunięty.',
	'Foreign key has been altered.' => 'Klucz obcy został zmieniony.',
	'Foreign key has been created.' => 'Klucz obcy został utworzony.',
	'Target table' => 'Tabela docelowa',
	'Change' => 'Zmień',
	'Source' => 'Źródło',
	'Target' => 'Cel',
	'Add column' => 'Dodaj kolumnę',
	'Alter' => 'Zmień',
	'Add foreign key' => 'Dodaj klucz obcy',
	'ON DELETE' => 'W przypadku usunięcia',
	'ON UPDATE' => 'W przypadku zmiany',
	'Source and target columns must have the same data type, there must be an index on the target columns and referenced data must exist.' => 'Źródłowa i docelowa kolumna muszą być tego samego typu, powinien istnieć indeks na docelowej kolumnie oraz muszą istnieć dane referencyjne.',

	// Routines.
	'Routines' => 'Procedury i funkcje',
	'Routine has been called, %d row(s) affected.' => [
		'Procedura została uruchomiona, zmieniono %d rekord.',
		'Procedura została uruchomiona, zmieniono %d rekordy.',
		'Procedura została uruchomiona, zmieniono %d rekordów.',
	],
	'Call' => 'Uruchom',
	'Parameter name' => 'Nazwa parametru',
	'Create procedure' => 'Utwórz procedurę',
	'Create function' => 'Utwórz funkcję',
	'Routine has been dropped.' => 'Procedura została usunięta.',
	'Routine has been altered.' => 'Procedura została zmieniona.',
	'Routine has been created.' => 'Procedura została utworzona.',
	'Alter function' => 'Zmień funkcję',
	'Alter procedure' => 'Zmień procedurę',
	'Return type' => 'Zwracany typ',

	// Events.
	'Events' => 'Wydarzenia',
	'Event' => 'Wydarzenie',
	'Event has been dropped.' => 'Wydarzenie zostało usunięte.',
	'Event has been altered.' => 'Wydarzenie zostało zmienione.',
	'Event has been created.' => 'Wydarzenie zostało utworzone.',
	'Alter event' => 'Zmień wydarzenie',
	'Create event' => 'Utwórz wydarzenie',
	'At given time' => 'O danym czasie',
	'Every' => 'Wykonuj co',
	'Schedule' => 'Harmonogram',
	'Start' => 'Początek',
	'End' => 'Koniec',
	'On completion preserve' => 'Nie kasuj wydarzenia po przeterminowaniu',

	// Sequences (PostgreSQL).
	'Sequences' => 'Sekwencje',
	'Create sequence' => 'Utwórz sekwencję',
	'Sequence has been dropped.' => 'Sekwencja została usunięta.',
	'Sequence has been created.' => 'Sekwencja została utworzona.',
	'Sequence has been altered.' => 'Sekwencja została zmieniona.',
	'Alter sequence' => 'Zmień sekwencję',

	// User types (PostgreSQL)
	'User types' => 'Typy użytkownika',
	'Create type' => 'Utwórz typ',
	'Type has been dropped.' => 'Typ został usunięty.',
	'Type has been created.' => 'Typ został utworzony.',
	'Alter type' => 'Zmień typ',

	// Triggers.
	'Triggers' => 'Wyzwalacze',
	'Add trigger' => 'Dodaj wyzwalacz',
	'Trigger has been dropped.' => 'Wyzwalacz został usunięty.',
	'Trigger has been altered.' => 'Wyzwalacz został zmieniony.',
	'Trigger has been created.' => 'Wyzwalacz został utworzony.',
	'Alter trigger' => 'Zmień wyzwalacz',
	'Create trigger' => 'Utwórz wyzwalacz',

	// Table check constraints.
	'Checks' => 'Kontrole',
	'Create check' => 'Utwórz kontrolę',
	'Alter check' => 'Zmień kontrolę',
	'Check has been created.' => 'Kontrola została utworzona.',
	'Check has been altered.' => 'Kontrola została zmieniona.',
	'Check has been dropped.' => 'Kontrola została usunięta.',

	// Selection.
	'Select data' => 'Pokaż dane',
	'Select' => 'pokaż',
	'Functions' => 'Funkcje',
	'Aggregation' => 'Agregacje',
	'Search' => 'Szukaj',
	'anywhere' => 'gdziekolwiek',
	'Sort' => 'Sortuj',
	'descending' => 'malejąco',
	'Limit' => 'Limit',
	'Limit rows' => 'Limit rekordów',
	'Text length' => 'Długość tekstu',
	'Action' => 'Czynność',
	'Full table scan' => 'Wymaga pełnego przeskanowania tabeli',
	'Unable to select the table' => 'Nie udało się pobrać danych z tabeli',
	'Search data in tables' => 'Wyszukaj we wszystkich tabelach',
	'as a regular expression' => 'jako wyrażenie regularne',
	'No rows.' => 'Brak rekordów.',
	'%d / ' => '%d / ',
	'%d row(s)' => [
		'%d rekord',
		'%d rekordy',
		'%d rekordów',
	],
	'Page' => 'Strona',
	'last' => 'ostatni',
	'Load more data' => 'Wczytaj więcej danych',
	'Loading' => 'Wczytywanie',
	'Whole result' => 'Wybierz wszystkie',
	'%d byte(s)' => [
		'%d bajt',
		'%d bajty',
		'%d bajtów',
	],

	// In-place editing in selection.
	'Modify' => 'Zmień',
	'Ctrl+click on a value to modify it.' => 'Ctrl+kliknij wartość, aby ją edytować.',
	'Use edit link to modify this value.' => 'Użyj linku edycji, aby zmienić tę wartość.',

	// Editing.
	'New item' => 'Nowy rekord',
	'Edit' => 'Edytuj',
	'original' => 'bez zmian',
	// label for value '' in enum data type
	'empty' => 'puste',
	'Insert' => 'Dodaj',
	'Save' => 'Zapisz zmiany',
	'Save and continue edit' => 'Zapisz i kontynuuj edycję',
	'Save and insert next' => 'Zapisz i dodaj następny',
	'Saving' => 'Zapisywanie',
	'Selected' => 'Zaznaczone',
	'Clone' => 'Duplikuj',
	'Delete' => 'Usuń',
	// %s can contain auto-increment value, e.g. ' 123'
	'Item%s has been inserted.' => 'Rekord%s został dodany.',
	'Item has been deleted.' => 'Rekord został usunięty.',
	'Item has been updated.' => 'Rekord został zaktualizowany.',
	'%d item(s) have been affected.' => [
		'Zmieniono %d rekord.',
		'Zmieniono %d rekordy.',
		'Zmieniono %d rekordów.',
	],
	'You have no privileges to update this table.' => 'Brak uprawnień do edycji tej tabeli.',

	// Data type descriptions.
	'Numbers' => 'Numeryczne',
	'Date and time' => 'Data i czas',
	'Strings' => 'Tekstowe',
	'Binary' => 'Binarne',
	'Lists' => 'Listy',
	'Network' => 'Sieć',
	'Geometry' => 'Geometria',
	'Relations' => 'Relacje',

	// Editor - data values.
	'now' => 'teraz',
	'yes' => 'tak',
	'no' => 'nie',

	// Plugins.
	'One Time Password' => 'Jednorazowe hasło',
	'Enter OTP code.' => 'Wprowadź kod OTP.',
	'Invalid OTP code.' => 'Nieprawidłowy kod OTP.',
	'Access denied.' => 'Odmowa dostępu.',
];
