<?php

namespace Adminer;

$translations = array(
	// label for database system selection (MySQL, SQLite, ...)
	'Home' => null,
	'System' => 'Система Бази Даних',
	'Server' => 'Сервер',
	'Username' => 'Користувач',
	'Password' => 'Пароль',
	'Permanent login' => 'Пам\'ятати сесію',
	'Login' => 'Увійти',
	'Logout' => 'Вийти',
	'Logged as: %s' => 'Ви увійшли як: %s',
	'Logout successful.' => 'Ви вдало вийшли з системи.',
	'Invalid server or credentials.' => null,
	'Language' => 'Мова',
	'Invalid CSRF token. Send the form again.' => 'Недійсний CSRF токен. Надішліть форму ще раз.',
	'No extension' => 'Нема розширень',
	'None of the supported PHP extensions (%s) are available.' => 'Жодне з PHP-розширень (%s), що підтримуються, не доступне.',
	'Session support must be enabled.' => 'Сесії повинні бути дозволені.',
	'Session expired, please login again.' => 'Сесія закінчилась, будь ласка, увійдіть в систему знову.',
	'%s version: %s through PHP extension %s' => 'Версія %s: %s з PHP-розширенням %s',
	'Refresh' => 'Оновити',

	// text direction - 'ltr' or 'rtl'
	'ltr' => 'ltr',

	'Privileges' => 'Привілеї',
	'Create user' => 'Створити користувача',
	'User has been dropped.' => 'Користувача було видалено.',
	'User has been altered.' => 'Користувача було змінено.',
	'User has been created.' => 'Користувача було створено.',
	'Hashed' => 'Хешовано',
	'Column' => 'Колонка',
	'Routine' => 'Процедура',
	'Grant' => 'Дозволити',
	'Revoke' => 'Заборонити',

	'Process list' => 'Перелік процесів',
	'%d process(es) have been killed.' => array('Було завершено %d процес.', 'Було завершено %d процеси.', 'Було завершёно %d процесів.'),
	'Kill' => 'Завершити процес',

	'Variables' => 'Змінні',
	'Status' => 'Статус',

	'SQL command' => 'SQL запит',
	'%d query(s) executed OK.' => array('%d запит виконано успішно.', '%d запити виконано успішно.', '%d запитів виконано успішно.'),
	'Query executed OK, %d row(s) affected.' => array('Запит виконано успішно, змінено %d рядок.', 'Запит виконано успішно, змінено %d рядки.', 'Запит виконано успішно, змінено %d рядків.'),
	'No commands to execute.' => 'Нема запитів до виконання.',
	'Error in query' => 'Помилка в запиті',
	'Execute' => 'Виконати',
	'Stop on error' => 'Зупинитись при помилці',
	'Show only errors' => 'Показувати тільки помилки',
	// sprintf() format for time of the command
	'%.3f s' => '%.3f s',
	'History' => 'Історія',
	'Clear' => 'Очистити',
	'Edit all' => 'Редагувати все',

	'File upload' => 'Завантажити файл',
	'From server' => 'З сервера',
	'Webserver file %s' => 'Файл %s на вебсервері',
	'Run file' => 'Запустити файл',
	'File does not exist.' => 'Файл не існує.',
	'File uploads are disabled.' => 'Завантаження файлів заборонене.',
	'Unable to upload a file.' => 'Неможливо завантажити файл.',
	'Maximum allowed file size is %sB.' => 'Максимально допустимий розмір файлу %sБ.',
	'Too big POST data. Reduce the data or increase the %s configuration directive.' => 'Занадто великий об\'єм POST-даних. Зменшіть об\'єм або збільшіть параметр директиви %s конфигурації.',

	'Export' => 'Експорт',
	'Output' => 'Вихідні дані',
	'open' => 'відкрити',
	'save' => 'зберегти',
	'Format' => 'Формат',
	'Data' => 'Дані',

	'Database' => 'База даних',
	'Use' => 'Обрати',
	'Select database' => 'Обрати базу даних',
	'Invalid database.' => 'Погана база даних.',
	'Database has been dropped.' => 'Базу даних було видалено.',
	'Databases have been dropped.' => 'Бази даних були видалені.',
	'Database has been created.' => 'Базу даних було створено.',
	'Database has been renamed.' => 'Базу даних було переіменовано.',
	'Database has been altered.' => 'Базу даних було змінено.',
	'Alter database' => 'Змінити базу даних',
	'Create database' => 'Створити базу даних',
	'Database schema' => 'Схема бази даних',

	// link to current database schema layout
	'Permanent link' => 'Постійне посилання',

	// thousands separator - must contain single byte
	',' => ' ',
	'0123456789' => '0123456789',
	'Engine' => 'Рушій',
	'Collation' => 'Співставлення',
	'Data Length' => 'Об\'єм даних',
	'Index Length' => 'Об\'єм індексів',
	'Data Free' => 'Вільне місце',
	'Rows' => 'Рядків',
	'%d in total' => '%d всього',
	'Analyze' => 'Аналізувати',
	'Optimize' => 'Оптимізувати',
	'Check' => 'Перевірити',
	'Repair' => 'Виправити',
	'Truncate' => 'Очистити',
	'Tables have been truncated.' => 'Таблиці було очищено.',
	'Move to other database' => 'Перенести до іншої бази даних',
	'Move' => 'Перенести',
	'Tables have been moved.' => 'Таблиці було перенесено.',
	'Copy' => 'копіювати',
	'Tables have been copied.' => 'Таблиці було зкопійовано.',

	'Routines' => 'Збережені процедури',
	'Routine has been called, %d row(s) affected.' => array('Була викликана процедура, %d запис було змінено.', 'Була викликана процедура, %d записи було змінено.', 'Була викликана процедура, %d записів було змінено.'),
	'Call' => 'Викликати',
	'Parameter name' => 'Назва параметра',
	'Create procedure' => 'Створити процедуру',
	'Create function' => 'Створити функцію',
	'Routine has been dropped.' => 'Процедуру було видалено.',
	'Routine has been altered.' => 'Процедуру було змінено.',
	'Routine has been created.' => 'Процедуру було створено.',
	'Alter function' => 'Змінити функцію',
	'Alter procedure' => 'Змінити процедуру',
	'Return type' => 'Тип, що повернеться',

	'Events' => 'Події',
	'Event has been dropped.' => 'Подію було видалено.',
	'Event has been altered.' => 'Подію було змінено.',
	'Event has been created.' => 'Подію було створено.',
	'Alter event' => 'Змінити подію',
	'Create event' => 'Створити подію',
	'At given time' => 'В даний час',
	'Every' => 'Кожного',
	'Schedule' => 'Розклад',
	'Start' => 'Початок',
	'End' => 'Кінець',
	'On completion preserve' => 'Після завершення зберегти',

	'Tables' => 'Таблиці',
	'Tables and views' => 'Таблиці і вигляди',
	'Table' => 'Таблиця',
	'No tables.' => 'Нема таблиць.',
	'Alter table' => 'Змінити таблицю',
	'Create table' => 'Створити таблицю',
	'Table has been dropped.' => 'Таблицю було видалено.',
	'Tables have been dropped.' => 'Таблиці були видалені.',
	'Tables have been optimized.' => 'Таблиці були оптимізовані.',
	'Table has been altered.' => 'Таблица була змінена.',
	'Table has been created.' => 'Таблиця була створена.',
	'Table name' => 'Назва таблиці',
	'Show structure' => 'Показати структуру',
	'engine' => 'рушій',
	'collation' => 'співставлення',
	'Column name' => 'Назва стовпця',
	'Type' => 'Тип',
	'Length' => 'Довжина',
	'Auto Increment' => 'Автоматичне збільшення',
	'Options' => 'Опції',
	'Comment' => 'Коментарі',
	'Drop' => 'Видалити',
	'Are you sure?' => 'Ви впевнені?',
	'Move up' => 'Пересунути вгору',
	'Move down' => 'Пересунути вниз',
	'Remove' => 'Видалити',
	'Maximum number of allowed fields exceeded. Please increase %s.' => 'Досягнута максимальна кількість доступних полів. Будь ласка, збільшіть %s.',

	'Partition by' => 'Розділити по',
	'Partition' => null,
	'Partitions' => 'Розділи',
	'Partition name' => 'Назва розділу',
	'Values' => 'Значення',

	'View' => 'Вигляд',
	'View has been dropped.' => 'Вигляд було видалено.',
	'View has been altered.' => 'Вигляд було змінено.',
	'View has been created.' => 'Вигляд було створено.',
	'Alter view' => 'Змінити вигляд',
	'Create view' => 'Створити вигляд',

	'Indexes' => 'Індекси',
	'Indexes have been altered.' => 'Індексування було змінено.',
	'Alter indexes' => 'Змінити індексування',
	'Add next' => 'Додати ще',
	'Index Type' => 'Тип індексу',
	'Column (length)' => 'Стовпець (довжина)',

	'Foreign keys' => 'Зовнішні ключі',
	'Foreign key' => 'Зовнішній ключ',
	'Foreign key has been dropped.' => 'Зовнішній ключ було видалено.',
	'Foreign key has been altered.' => 'Зовнішній ключ було змінено.',
	'Foreign key has been created.' => 'Зовнішній ключ було створено.',
	'Target table' => 'Цільова таблиця',
	'Change' => 'Змінити',
	'Source' => 'Джерело',
	'Target' => 'Ціль',
	'Add column' => 'Додати стовпець',
	'Alter' => 'Змінити',
	'Add foreign key' => 'Додати зовнішній ключ',
	'ON DELETE' => 'ПРИ ВИДАЛЕННІ',
	'ON UPDATE' => 'ПРИ ЗМІНІ',
	'Source and target columns must have the same data type, there must be an index on the target columns and referenced data must exist.' => 'Стовпці повинні мати той самий тип даних, цільові стовпці повинні бути проіндексовані і дані, на які посилаються повинні існувати.',

	'Triggers' => 'Тригери',
	'Add trigger' => 'Додати тригер',
	'Trigger has been dropped.' => 'Тригер було видалено.',
	'Trigger has been altered.' => 'Тригер було змінено.',
	'Trigger has been created.' => 'Тригер було створено.',
	'Alter trigger' => 'Змінити тригер',
	'Create trigger' => 'Створити тригер',
	'Time' => 'Час',
	'Event' => 'Подія',
	'Name' => 'Назва',

	'select' => 'вибрати',
	'Select' => 'Вибрати',
	'Select data' => 'Вибрати дані',
	'Functions' => 'Функції',
	'Aggregation' => 'Агрегація',
	'Search' => 'Пошук',
	'anywhere' => 'будь-де',
	'Search data in tables' => 'Шукати дані в таблицях',
	'as a regular expression' => null,
	'Sort' => 'Сортувати',
	'descending' => 'по спаданню',
	'Limit' => 'Обмеження',
	'Text length' => 'Довжина тексту',
	'Action' => 'Дія',
	'Unable to select the table' => 'Неможливо вибрати таблицю',
	'No rows.' => 'Нема рядків.',
	'%d row(s)' => array('%d рядок', '%d рядки', '%d рядків'),
	'Page' => 'Сторінка',
	'last' => 'остання',
	'Whole result' => 'Весь результат',
	'%d byte(s)' => array('%d байт', '%d байта', '%d байтів'),

	'Import' => 'Імпортувати',
	'%d row(s) have been imported.' => array('%d рядок було імпортовано.', '%d рядки було імпортовано.', '%d рядків було імпортовано.'),

	// in-place editing in select
	'Ctrl+click on a value to modify it.' => 'Ctrl+клікніть на значенні щоб змінити його.',
	'Use edit link to modify this value.' => 'Використовуйте посилання щоб змінити це значення.',

	// %s can contain auto-increment value
	'Item%s has been inserted.' => 'Запис%s було вставлено.',
	'Item has been deleted.' => 'Запис було видалено.',
	'Item has been updated.' => 'Запис було змінено.',
	'%d item(s) have been affected.' => array('Було змінено %d запис.', 'Було змінено %d записи.', 'Було змінено %d записів.'),
	'New item' => 'Новий запис',
	'original' => 'початковий',
	// label for value '' in enum data type
	'empty' => 'порожньо',
	'edit' => 'редагувати',
	'Edit' => 'Редагувати',
	'Insert' => 'Вставити',
	'Save' => 'Зберегти',
	'Save and continue edit' => 'Зберегти і продовжити редагування',
	'Save and insert next' => 'Зберегти і вставити знову',
	'Clone' => 'Клонувати',
	'Delete' => 'Видалити',

	'E-mail' => 'E-mail',
	'From' => 'Від',
	'Subject' => 'Заголовок',
	'Attachments' => 'Додатки',
	'Send' => 'Надіслати',
	'%d e-mail(s) have been sent.' => array('Було надіслано %d повідомлення.', 'Було надіслано %d повідомлення.', 'Було надіслано %d повідомлень.'),

	// data type descriptions
	'Numbers' => 'Числа',
	'Date and time' => 'Дата і час',
	'Strings' => 'Рядки',
	'Binary' => 'Двійкові',
	'Lists' => 'Списки',
	'Network' => 'Мережа',
	'Geometry' => 'Геометрія',
	'Relations' => 'Зв\'язки',

	'Editor' => 'Редактор',
	// date format in Editor: $1 yyyy, $2 yy, $3 mm, $4 m, $5 dd, $6 d
	'$1-$3-$5' => '$5.$3.$1',
	// hint for date format - use language equivalents for day, month and year shortcuts
	'[yyyy]-mm-dd' => 'дд.мм.[рррр]',
	// hint for time format - use language equivalents for hour, minute and second shortcuts
	'HH:MM:SS' => 'ГГ:ХХ:СС',
	'now' => 'зараз',
	'yes' => 'так',
	'no' => 'ні',

	// general SQLite error in create, drop or rename database
	'File exists.' => 'Файл існує.',
	'Please use one of the extensions %s.' => 'Будь ласка, використовуйте одне з розширень %s.',

	// PostgreSQL and MS SQL schema support
	'Alter schema' => 'Змінити схему',
	'Create schema' => 'Створити схему',
	'Schema has been dropped.' => 'Схему було видалено.',
	'Schema has been created.' => 'Схему було створено.',
	'Schema has been altered.' => 'Схему було змінено.',
	'Schema' => 'Схема',
	'Invalid schema.' => 'Невірна схема.',

	// PostgreSQL sequences support
	'Sequences' => 'Послідовності',
	'Create sequence' => 'Створити послідовність',
	'Sequence has been dropped.' => 'Послідовність було видалено.',
	'Sequence has been created.' => 'Послідовність було створено.',
	'Sequence has been altered.' => 'Послідовність було змінено.',
	'Alter sequence' => 'Змінити послідовність',

	// PostgreSQL user types support
	'User types' => 'Типи користувачів',
	'Create type' => 'Створити тип',
	'Type has been dropped.' => 'Тип було видалено.',
	'Type has been created.' => 'Тип було створено.',
	'Alter type' => 'Змінити тип',
	'Drop %s?' => 'Вилучити %s?',
	'Materialized view' => 'Матеріалізований вигляд',
	'Selected' => 'Вибрані',
	'overwrite' => 'перезаписати',
	'DB' => 'DB',
	'File must be in UTF-8 encoding.' => 'Файл повинен бути в кодуванні UTF-8.',
	'Modify' => 'Змінити',
	'Load more data' => 'Завантажити ще дані',
	'Loading' => 'Завантаження',
	'ATTACH queries are not supported.' => 'ATTACH-запити не підтримуються.',
	'Warnings' => 'Попередження',
	'Limit rows' => 'Обмеження рядків',
	'Adminer does not support accessing a database without a password, <a href="https://www.adminer.org/en/password/"%s>more information</a>.' => 'Adminer не підтримує доступ до бази даних без пароля, <a href="https://www.adminer.org/en/password/"%s>більше інформації</a>.',
	'Default value' => 'Значення за замовчуванням',
	'Full table scan' => 'Повне сканування таблиці',
	'Too many unsuccessful logins, try again in %d minute(s).' => array('Занадто багато невдалих спроб входу. Спробуйте знову через %d хвилину.', 'Занадто багато невдалих спроб входу. Спробуйте знову через %d хвилини.', 'Занадто багато невдалих спроб входу. Спробуйте знову через %d хвилин.'),
	'Thanks for using Adminer, consider <a href="https://www.adminer.org/en/donation/">donating</a>.' => 'Дякуємо, що користуєтесь Adminer, подумайте про <a href="https://www.adminer.org/en/donation/">внесок</a>.',
	'Master password expired. <a href="https://www.adminer.org/en/extension/"%s>Implement</a> %s method to make it permanent.' => 'Термін дії майстер пароля минув. <a href="https://www.adminer.org/en/extension/"%s>Реалізуйте</a> метод %s, щоб зробити його постійним.',
	'The action will be performed after successful login with the same credentials.' => 'Дія буде виконуватися після успішного входу в систему з тими ж обліковими даними.',
	'Connecting to privileged ports is not allowed.' => 'Підключення до привілейованих портів заборонено.',
	'There is a space in the input password which might be the cause.' => 'У вхідному паролі є пробіл, який може бути причиною.',
	'If you did not send this request from Adminer then close this page.' => 'Якщо ви не посилали цей запит з Adminer, закрийте цю сторінку.',
	'You can upload a big SQL file via FTP and import it from server.' => 'Ви можете завантажити великий файл SQL через FTP та імпортувати його з сервера.',
	'Size' => 'Розмір',
	'Compute' => 'Обчислити',
	'You are offline.' => 'Ви офлайн.',
	'You have no privileges to update this table.' => 'Ви не маєте привілеїв для оновлення цієї таблиці.',
	'Saving' => 'Збереження',
	'Unknown error.' => 'Невідома помилка.',
	'Database does not support password.' => 'База даних не підтримує пароль.',

	'Vacuum' => null,
	'%d / ' => array(),
	'Disable %s or enable %s or %s extensions.' => null,

	'Columns' => null,
	'Nullable' => null,
	'Default' => null,
	'Yes' => 'Так',
	'No' => 'Ні',
	'One Time Password' => null,
	'Invalid OTP code.' => null,

	'Schemas' => null,
	'No schemas.' => null,
	'Show schema' => null,
	'No driver' => null,
	'Database driver not found.' => null,
);
