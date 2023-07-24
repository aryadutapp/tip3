<?php
// controllers/process_form.php

// Include the database connection information (config/info_db.php)
require_once '../config/info_db.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $form_action = $_POST["form_action"];
    
    // Check if form_action is "login"
    if ($form_action === "login") {
        // Assuming your form has input fields with names "email" and "password"
        $email = $_POST["email"];
        $password = $_POST["password"];
        
        // Connect to the PostgreSQL database
        $connectionString = "host=$dbhost dbname=$dbname user=$dbuser password=$dbpassword options=$dbopt";
        $db = pg_connect($connectionString);

        if (!$db) {
            // Failed to connect to the database
            die("Connection failed: " . pg_last_error());
        }

        // Prepare the SQL statement to fetch user data based on email
        $email = pg_escape_string($email); // To prevent SQL injection
        $query = "SELECT * FROM data_user WHERE email = '$email'";
        $result = pg_query($db, $query);

        if (!$result) {
            // Query execution failed
            die("Query failed: " . pg_last_error($db));
        }

        // Fetch the user data
        $user = pg_fetch_assoc($result);

        // Manually compare passwords (not recommended for production use)
        if ($user && $password === $user['password']) {
            // Password matches, login successful
            echo "Login successful!";
            header("Location: https://aryadutapp.github.io/titipin/dashboard");
            exit(); // Make sure to add an exit() after the redirect to prevent further execution of the script


        } else {
            // Password doesn't match or user not found, prompt to register
            echo "tidak terdaftar<br>";
            echo "email masukan :  $email<br>";
            echo "passworn masukan : $password<br>";
            echo "aksi: $form_action<br>";
        }

        // Close the database connection
        pg_close($db);
    } 
    
    
    if ($form_action === "register") {
        if (!isset($_POST["email"]) || !isset($_POST["password"]) || !isset($_POST["status"])) {
            echo "Please enter email, password, and status!";
            exit();
        }

        $reg_email = $_POST["email"];
        $reg_password = $_POST["password"];
        $reg_status = $_POST["status"];

        // Connect to the PostgreSQL database
        $connectionString = "host=$dbhost dbname=$dbname user=$dbuser password=$dbpassword options=$dbopt";
        $db = pg_connect($connectionString);

        if (!$db) {
            // Failed to connect to the database
            die("Connection failed: " . pg_last_error());
        }

        // Prepare the SQL statement to check if email already exists in the database
        $reg_email = pg_escape_string($reg_email); // To prevent SQL injection
        $query = "SELECT * FROM data_user WHERE email = '$reg_email'";
        $result = pg_query($db, $query);

        if (!$result) {
            // Query execution failed
            die("Query failed: " . pg_last_error($db));
        }

        // Check if the email already exists in the database
        if (pg_num_rows($result) > 0) {
            echo "Email already exists! Please choose a different email.";
            pg_close($db);
            exit();
        }

        // You should hash the password in a production environment.
        // Using plaintext password for demonstration purposes only.
        // In a production environment, use password_hash() function.
        $hashedPassword = $reg_password;

        $query = "INSERT INTO data_user (email, password, status) VALUES ('$reg_email', '$hashedPassword', '$reg_status')";
        $result = pg_query($db, $query);

        if (!$result) {
            // Query execution failed
            die("Query failed: " . pg_last_error($db));
        }

        // Registration successful, you can redirect to a success page or display a success message.
        echo "Registration successful!";

        // Close the database connection
        pg_close($db);
    } else {
        // If form_action is not "login" or "register", you can handle the specific case here
        echo "Invalid form_action: $form_action";
    }
}

