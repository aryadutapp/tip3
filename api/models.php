<?php

require_once 'database.php';

class User {
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
    date_default_timezone_set('Asia/Jakarta'); // Set the default time zone to Jakarta (GMT+7)
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
    date_default_timezone_set('Asia/Jakarta'); // Set the default time zone to Jakarta (GMT+7)
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

        // Function to insert user session information into the "sessions" table
// Create a new entry in the data_reservasi table
public function insertBarang($full_name, $size, $store_id) {
    $db = Database::getConnection(); // Get the database connection

    // Get the current timestamp for book_time, start_time, and end_time
    date_default_timezone_set('Asia/Jakarta'); // Set the default time zone to Jakarta (GMT+7)
    $nowTime = time() + 25200; // Add 7 hours (7 hours * 60 minutes * 60 seconds = 25200 seconds)


    // Prepare and execute the query to insert the data into the data_reservasi table
    $query = "INSERT INTO data_reservasi (cust_email, cust_name, store_id, book_time, start_time, reservation_status, size) VALUES ($1, $2, $3, to_timestamp($4), to_timestamp($5),  $6, $7)";
    $result = pg_query_params($db, $query, ["unregistered", $full_name, $store_id, $nowTime, $nowTime, "PESANAN MASUK", $size]);

    if (!$result) {
        // Handle the error (e.g., log or show an error message)
        die("Error executing query: " . pg_last_error($db));
    }

    return true; // Return true to indicate successful insertion
}

public function ambilBarang($kode_pickup, $harga) {
    $db = Database::getConnection(); // Get the database connection

    // Get the current timestamp for end_time
    date_default_timezone_set('Asia/Jakarta'); // Set the default time zone to Jakarta (GMT+7)
    $nowTime = time() + 25200; // Add 7 hours (7 hours * 60 minutes * 60 seconds = 25200 seconds)

    // Start a database transaction
    pg_query($db, "BEGIN");

    // Prepare and execute the query to update the data_reservasi table
    $queryUpdate = "UPDATE data_reservasi SET end_time = to_timestamp($1), reservation_status = $2 WHERE pickup_number = $3";
    $resultUpdate = pg_query_params($db, $queryUpdate, [$nowTime, "PESANAN KELUAR", $kode_pickup]);

    // Prepare and execute the query to insert into the data_pembayaran table
    $queryInsert = "INSERT INTO data_pembayaran (kode_ambil, price) VALUES ($1, $2)";
    $resultInsert = pg_query_params($db, $queryInsert, [$kode_pickup, $harga]);

    if ($resultUpdate && $resultInsert) {
        // Both update and insert were successful, commit the transaction
        pg_query($db, "COMMIT");
        return true; // Return true to indicate successful update and insert
    } else {
        // Handle the error, rollback the transaction, and show an error message
        pg_query($db, "ROLLBACK");
        die("Error executing query: " . pg_last_error($db));
    }
}



// Create a new entry in the data_reservasi table
public function insertBarangEmail($full_name, $size, $store_id, $email) {
    $db = Database::getConnection(); // Get the database connection

    // Get the current timestamp for book_time, start_time, and end_time
    date_default_timezone_set('Asia/Jakarta'); // Set the default time zone to Jakarta (GMT+7)
    $nowTime = time() + 25200; // Add 7 hours (7 hours * 60 minutes * 60 seconds = 25200 seconds)


    // Prepare and execute the query to insert the data into the data_reservasi table
    $query = "INSERT INTO data_reservasi (cust_email, cust_name, store_id, book_time, start_time, reservation_status, size) VALUES ($1, $2, $3, to_timestamp($4), to_timestamp($5),  $6, $7)";
    $result = pg_query_params($db, $query, [$email, $full_name, $store_id, $nowTime, $nowTime, "PESANAN MASUK", $size]);

    if (!$result) {
        // Handle the error (e.g., log or show an error message)
        die("Error executing query: " . pg_last_error($db));
    }

    return true; // Return true to indicate successful insertion
}


// Function to insert mitra information into the "data_mitra" table
//($reg_email, $reg_nama_toko, $reg_alamat, $reg_kelurahan, $reg_kecamatan, $reg_kota, $reg_provinsi, $reg_kode_pos, $reg_nama_pic, $reg_nomer_pic);
public function insertMitra($email, $nama_toko, $alamat, $kelurahan, $kecamatan, $kota, $provinsi, $kode_pos, $nama_pic, $nomer_pic) {
    $db = Database::getConnection(); // Get the database connection

    // Define the SQL query to insert mitra data into the "data_mitra" table
    $query = "INSERT INTO data_mitra (email, nama_toko, alamat, kelurahan, kecamatan, kota, provinsi, kode_pos, nama_pic, nomer_pic) 
              VALUES ($1, $2, $3, $4, $5, $6, $7, $8, $9, $10)";
    
    // Execute the query with parameters
    $result = pg_query_params($db, $query, [$email, $nama_toko, $alamat, $kelurahan, $kecamatan, $kota, $provinsi, $kode_pos, $nama_pic, $nomer_pic]);

    if (!$result) {
        // Handle the error (e.g., log or show an error message)
        die("Error executing query: " . pg_last_error($db));
    }

    return true; // Return true to indicate successful insertion
}



}


