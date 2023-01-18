## DB access file

To access the database, `classes/mysqli_init.php` reads the file `db_settings.ini` with the following structure:
```
[database]
driver = mysql
host = localhost
port = 3306
schema = schema
username = username
password = password
```
(fill in the missing data)

this file needs to be created manually, after that `hotel-null.sql` can be executed to import the db

## Admin account

Default accounts can be created without issues. If an admin account is needed, `user@email.com` with `user` can be used, otherwise set `perm_lvl` to 1 for any other account. User management is unfortunately not fully functioning

## Further notes

We didn't fully implement all requirements due to time management issues on our side. We are aware of this problem, but most implemented feature are functioning as intend.