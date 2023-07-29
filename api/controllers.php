<?php
require_once 'database.php';
require_once 'models.php';

// Function to generate a random and secure cookie value
function generateCookieValue() {
    $length = 64; // Set the desired length for the cookie value
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ!@#$%^&*()_+-=[]{}|:;"<>,.?/~'; // Define the characters to choose from
    $randomString = '';
    $max = strlen($characters) - 1;

    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $max)];
    }

    return $randomString;
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $form_action = $_POST["form_action"];

    if ($form_action === "login") {
        // Assuming your form has input fields with names "email" and "password"
        $email = $_POST["email"];
        $password = $_POST["password"];

        $user = User::getUserByEmail($email);

        if ($user && $password === $user->password) {
            // Password matches, login successful

            // Generate a random and secure cookie value
            $cookieValue = generateCookieValue();

            // Set the cookie with a 3-day duration (259200 seconds = 3 days)
            $cookieExpiration = time() + 259200; // 3 days
            setcookie("titip_user", $cookieValue, $cookieExpiration, '/');

            // Create a new instance of the User class
            $loggedInUser = new User($user->email, $user->password, $user->status);

            // Insert the session information into the "sessions" table
            $loggedInUser->insertSession($cookieValue);

            header("Location: https://aryadutapp.github.io/titipin/dashboard");
            exit();
        } 
        elseif ($user === -1) {
            // Email isn't registered, display an error message
            $errorMessage = "Email belum terdaftar";
            $encodedErrorMessage = urlencode($errorMessage);
            header("Location: masuk.php?error=$encodedErrorMessage");
            exit();
        } else {
            // Password doesn't match, redirect to "masuk.php" with an error message
            $errorMessage = "Kata sandi salah";
            $encodedErrorMessage = urlencode($errorMessage);
            header("Location: masuk.php?error=$encodedErrorMessage");
            exit();
        }
    } elseif ($form_action === "register") {
        // Assuming your form has input fields with names "email", "password", and "status"
        $reg_email = $_POST["email"];
        $reg_password = $_POST["password"];
        $reg_status = $_POST["status"];

        // Check if the email is already registered
        $existingUser = User::getUserByEmail($reg_email);
        if ($existingUser !== -1) {
            // Email is already registered, display an error message
            $errorMessage = "Email sudah terdaftar";
            $encodedErrorMessage = urlencode($errorMessage);
            header("Location: daftar.php?error=$encodedErrorMessage");
            exit();
        } else {
            // Email is not registered, proceed with user registration
            $newUser = new User($reg_email, $reg_password, $reg_status);
            if ($newUser->createUser()) {
                $message = "Registration successful!";
            } else {
                $message = "Failed to register user.";
            }
        }
    }  


    
    
    else {
        // If form_action is not "login" or "register", handle the specific case here
        $method = $_SERVER["REQUEST_METHOD"];
        $message = "Invalid form_action: $form_action (Method: $method)";
    }
} else {
    // If form_action is not "login" or "register", handle the specific case here
    $method = $_SERVER["REQUEST_METHOD"];
    $message = "Invalid form_action: $form_action (Method: $method)";
}

// Output the message after all the logic is executed
echo $message;
