<?php
require_once 'database.php';

class User {
    public $id;
    public $email;
    public $password;
    public $status;

    public function __construct($email, $password, $status) {
        $this->email = $email;
        $this->password = $password;
        $this->status = $status;
    }

    // Create a new user in the database
    public function createUser() {
        $db = Database::getConnection(); // Get the database connection
        $hashedPassword = $this->password; // Replace this with the actual hashing logic

        $query = "INSERT INTO data_user (email, password, status) VALUES ($1, $2, $3)";
        $result = pg_query_params($db, $query, [$this->email, $hashedPassword, $this->status]);

        if (!$result) {
            // Handle the error (e.g., log or show an error message)
            die("Error executing query: " . pg_last_error($db));
        }

        return true; // Return true to indicate successful creation
    }

// Read user data from the database by email
public static function getUserByEmail($email) {
    $db = Database::getConnection(); // Get the database connection
    $query = "SELECT * FROM data_user WHERE email = $1";
    $result = pg_query_params($db, $query, [$email]);

    if (!$result) {
        // Handle the error (e.g., log or show an error message)
        die("Error executing query: " . pg_last_error($db));
    }

    // Check if any rows are returned
    $rowCount = pg_num_rows($result);
    if ($rowCount === 0) {
        // Email doesn't exist, return an error code or a specific value to indicate this
        return -1; // You can use any value that makes sense for your application
    }

    return pg_fetch_object($result);
}


    // Update user data in the database
    public function updateUser() {
        $db = Database::getConnection(); // Get the database connection
        $query = "UPDATE data_user SET email = $1, password = $2, status = $3 WHERE id = $4";
        $result = pg_query_params($db, $query, [$this->email, $this->password, $this->status, $this->id]);

        if (!$result) {
            // Handle the error (e.g., log or show an error message)
            die("Error executing query: " . pg_last_error($db));
        }

        return true; // Return true to indicate successful update
    }

    // Delete user from the database by ID
    public static function deleteUserById($id) {
        $db = Database::getConnection(); // Get the database connection
        $query = "DELETE FROM data_user WHERE id = $1";
        $result = pg_query_params($db, $query, [$id]);

        if (!$result) {
            // Handle the error (e.g., log or show an error message)
            die("Error executing query: " . pg_last_error($db));
        }

        return true; // Return true to indicate successful deletion
    }
}
