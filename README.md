### DB access file

To access the database, `classes/mysqlo_init.php` reads the file `db_settings.ini` with the following structure:
```
[database]
driver = mysql
host = localhost
port = 3307
schema = schema
username = username
password = password
```