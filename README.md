AdminNeo
==========

**AdminNeo** is a full-featured database management tool written in PHP. It consists of a single file ready to deploy 
to the target server. As a companion, **EditorNeo** offers data manipulation for end-users.

AdminNeo is based on the [Adminer](https://www.adminer.org/) project by Jakub Vrána.

| <img src="/docs/images/screenshot-select.webp?raw=true" alt="Screenshot - Select data"/> | <img src="/docs/images/screenshot-structure.webp?raw=true" alt="Screenshot - Table structure"/> |
|------------------------------------------------------------------------------------------|-------------------------------------------------------------------------------------------------|
| <img src="/docs/images/screenshot-alter.webp?raw=true" alt="Screenshot - Alter table"/>  | <img src="/docs/images/screenshot-database.webp?raw=true" alt="Screenshot - Database"/>         |

### Key features
- Clean modern user interface
- Managing the structure of databases and tables
- Data manipulation and searching
- Exporting and importing databases and data
- Executing batch SQL commands
- Extendable by plugins
- And much more…

### Supported databases

- MySQL, MariaDB, PostgreSQL, MS SQL, SQLite, Oracle
- MongoDB, SimpleDB
- Elasticsearch (beta), ClickHouse (alpha)

Installation
------------

Just 3 steps to start using AdminNeo:
- Download the latest release from [adminneo.org/download](https://www.adminneo.org/download).
- Upload it to your HTTP server with PHP.
- Enjoy 😉

AdminNeo can be also [configured](https://www.adminneo.org/configuration) and extended by
[plugins](https://www.adminneo.org/plugins) or [customizations](https://www.adminneo.org/customizations).
For accessing a database that does not support a password, see [further instructions](https://www.adminneo.org/password).

Requirements
------------

- PHP 5.4+ with enabled sessions, modern web browser.
- Running AdminNeo from the source code requires PHP 7.1+.

It is also recommended to install [OpenSSL PHP extension](https://www.php.net/manual/en/book.openssl.php) for improved
security of stored login information.

Migrating from older versions
-----------------------------

Version 5 has been significantly redesigned and refactored. Unfortunately, this has resulted in many changes that break
backward compatibility.

A complete list of changes can be found in the [Upgrade Guide](https://www.adminneo.org/upgrade).

Docker
------

The official Docker image is available at [Docker Hub](https://hub.docker.com/r/peterknut/adminneo). Please follow the
instructions on the Docker page to get started.

Main project files
------------------

- admin/index.php - Development version of AdminNeo.
- admin/plugins.php - Plugins example.
- editor/index.php - Development version of EditorNeo.
- editor/plugins.php - Plugins example.
- editor/example.php - Customizations example.
- editor/sqlite.php - SQLite example.
- bin/compile.php - Create a single file version.
- bin/update-translations.php - Update translation files.
- tests/katalon.html - Katalon Automation Recorder test suite.
