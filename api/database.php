
<?php
class Database {
$dbhost = "ep-odd-paper-540852-pooler.us-east-1.postgres.vercel-storage.com";
$dbname = "verceldb";
$dbuser = "default";
$dbpassword = "xXk9cTjer8uA";
$dbopt = "endpoint=ep-odd-paper-540852";

    public static function getConnection() {
        if (self::$connection === null) {
$connectionString = "host=$dbhost dbname=$dbname user=$dbuser password=$dbpassword options=$dbopt";
            self::$connection = pg_connect($connectionString);

       


            if (!self::$connection) {
                // Failed to connect to the database
                die("Connection failed: " . pg_last_error());
            }
        }

        return self::$connection;
    }
}


?>
