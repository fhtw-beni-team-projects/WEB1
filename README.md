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

## DB Structure

The database consists of the following tables:

users: login information
profiles: personal information. seperate to users to allow in person / telephone reservations (theoretically)
posts: news posts
rooms: self explanatory
orders: self explanatory

note for start/end on orders: first and last day are always half, i.e. a room that booked until the 17th can get a new order in for the 17th again