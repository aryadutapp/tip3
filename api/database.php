
<?php
class Database {
    private static $host = "ep-odd-paper-540852-pooler.us-east-1.postgres.vercel-storage.com";
    private static $dbname = 'verceldb';
    private static $user = 'default';
    private static $password = 'xXk9cTjer8uA';
    private static $options = "endpoint=ep-odd-paper-540852";
    private static $connection = null;

    public static function getConnection() {
        if (self::$connection === null) {
            try {
                $dsn = "pgsql:host=" . self::$host . ";dbname=" . self::$dbname . ";" . self::$options;
                self::$connection = new PDO($dsn, self::$user, self::$password);
                self::$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                // Handle connection error if needed
                die("Connection to the database failed: " . $e->getMessage());
            }
        }

        return self::$connection;
    }
}


?>
