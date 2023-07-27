<?php
// Replace these with your actual database credentials
$dbhost = "ep-odd-paper-540852-pooler.us-east-1.postgres.vercel-storage.com";
$dbname = "verceldb";
$dbuser = "default";
$dbpassword = "xXk9cTjer8uA";
$dbopt = "endpoint=ep-odd-paper-540852";

class Database {
    private $host;
    private $dbname;
    private $user;
    private $password;
    private $options;
    private $connection;

    public function __construct() {
        global $dbhost, $dbname, $dbuser, $dbpassword, $dbopt;
        $this->host = $dbhost;
        $this->dbname = $dbname;
        $this->user = $dbuser;
        $this->password = $dbpassword;
        $this->options = $dbopt;

        $dsn = "pgsql:host=$this->host;dbname=$this->dbname;$this->options";

        try {
            $this->connection = new PDO($dsn, $this->user, $this->password);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            // Handle connection error if needed
            echo "Connection to the database failed: " . $e->getMessage();
            die();
        }
    }

    public function getConnection() {
        return $this->connection;
    }
}
