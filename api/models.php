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
        $query = "SELECT * FROM data_user WHERE email = ?";
        $stmt = $db->prepare($query);
        $stmt->execute([$email]);
        return $stmt->fetch(PDO::FETCH_OBJ);
    }

    // Update user data in the database
    public function updateUser() {
        $db = Database::getConnection(); // Get the database connection
        $query = "UPDATE data_user SET email = ?, password = ?, status = ? WHERE id = ?";
        $stmt = $db->prepare($query);
        $stmt->execute([$this->email, $this->password, $this->status, $this->id]);
        return true; // Return true to indicate successful update
    }

    // Delete user from the database by ID
    public static function deleteUserById($id) {
        $db = Database::getConnection(); // Get the database connection
        $query = "DELETE FROM data_user WHERE id = ?";
        $stmt = $db->prepare($query);
        $stmt->execute([$id]);
        return true; // Return true to indicate successful deletion
    }
}
