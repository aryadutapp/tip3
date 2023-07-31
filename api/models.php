

<?php

if (basename(__FILE__) !== basename($_SERVER['SCRIPT_FILENAME'])) {
    http_response_code(403); // Set the HTTP response code to 403 (Forbidden)
    echo "Direct access not allowed.";
    exit;
}
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

    // Generate a random salt for bcrypt
    $salt = password_hash(uniqid(), PASSWORD_BCRYPT);

    // Hash the password using bcrypt with the generated salt
    $hashedPassword = password_hash($this->password . $salt, PASSWORD_BCRYPT);

    $query = "INSERT INTO data_user (email, password, status, user_salt) VALUES ($1, $2, $3, $4)";
    $result = pg_query_params($db, $query, [$this->email, $hashedPassword, $this->status, $salt]);

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

// Function to get user's email based on their session from the "sessions" table
public static function getUserEmailBySession($cookieValue) {
    $db = Database::getConnection(); // Get the database connection

    // Delete any expired sessions first before retrieving the email
    $queryDeleteExpired = "DELETE FROM sessions WHERE expired_time <= NOW()";
    $resultDeleteExpired = pg_query($db, $queryDeleteExpired);

    if (!$resultDeleteExpired) {
        // Handle the error (e.g., log or show an error message)
        die("Error executing query: " . pg_last_error($db));
    }

    $query = "SELECT email FROM sessions WHERE cookie_value = $1";
    $result = pg_query_params($db, $query, [$cookieValue]);

    if (!$result) {
        // Handle the error (e.g., log or show an error message)
        die("Error executing query: " . pg_last_error($db));
    }

    // Check if any rows are returned
    $rowCount = pg_num_rows($result);
    if ($rowCount === 0) {
        // No session found for the given cookie value or it has expired
        // Redirect to "masuk.php" with an error message indicating the session has expired
        $errorMessage = "Sesi telah berakhir. Silakan masuk kembali.";
        $encodedErrorMessage = urlencode($errorMessage);
        header("Location: masuk.php?error=$encodedErrorMessage");
        exit();
    }

    $row = pg_fetch_assoc($result);
    return $row['email'];
}


    // Function to insert user session information into the "sessions" table
public function insertSession($cookieValue) {
    $db = Database::getConnection(); // Get the database connection

    // Calculate the expiration time, 4 days from now
    $expirationTime = time() + (4 * 24 * 60 * 60); // 4 days * 24 hours * 60 minutes * 60 seconds

    $query = "INSERT INTO sessions (email, cookie_value, expired_time) VALUES ($1, $2, to_timestamp($3))";
    $result = pg_query_params($db, $query, [$this->email, $cookieValue, $expirationTime]);

    if (!$result) {
        // Handle the error (e.g., log or show an error message)
        die("Error executing query: " . pg_last_error($db));
    }

    return true; // Return true to indicate successful insertion
}


    // Function to delete user session information from the "sessions" table by email
    public static function deleteSessionByEmail($email) {
        $db = Database::getConnection(); // Get the database connection

        $query = "DELETE FROM sessions WHERE email = $1";
        $result = pg_query_params($db, $query, [$email]);

        if (!$result) {
            // Handle the error (e.g., log or show an error message)
            die("Error executing query: " . pg_last_error($db));
        }

        return true; // Return true to indicate successful deletion
    }

    
}
