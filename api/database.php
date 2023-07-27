<?php
class Database {
    private static $dbhost = "ep-odd-paper-540852-pooler.us-east-1.postgres.vercel-storage.com";
    private static $dbname = "verceldb";
    private static $dbuser = "default";
    private static $dbpassword = "xXk9cTjer8uA";
    private static $dbopt = "endpoint=ep-odd-paper-540852";
    private static $connection = null;

    public static function getConnection() {
        if (self::$connection === null) {
            $connectionString = "host=" . self::$dbhost . " dbname=" . self::$dbname . " user=" . self::$user . " password=" . self::$password . " options=" . self::$dbopt;
            self::$connection = pg_connect($connectionString);

            if (!self::$connection) {
                // Failed to connect to the database
                die("Connection failed: " . pg_last_error());
            }
        }

        return self::$connection;
    }
}
