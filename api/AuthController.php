<?php
require_once 'database.php';
require_once 'models.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $form_action = $_POST["form_action"];

    if ($form_action === "login") {
        // Assuming your form has input fields with names "email" and "password"
        $email = $_POST["email"];
        $password = $_POST["password"];

        $user = User::getUserByEmail($email);

        if ($user && $password === $user->password) {
            // Password matches, login successful
            $message = "Login successful!";
            header("Location: https://aryadutapp.github.io/titipin/dashboard");
            exit();
        } else {
            // Password doesn't match or user not found, prompt to register
            $message = "Login failed. Please check your credentials.";
        }
    }

    if ($form_action === "register") {
        // Assuming your form has input fields with names "email", "password", and "status"
        $reg_email = $_POST["email"];
        $reg_password = $_POST["password"];
        $reg_status = $_POST["status"];

        $newUser = new User($reg_email, $reg_password, $reg_status);

        if ($newUser->createUser()) {
            $message = "Registration successful!";
        } else {
            $message = "Failed to register user.";
        }
    } else {
        // If form_action is not "login" or "register", you can handle the specific case here
        $message = "Invalid form_action: $form_action";
    }
}

// Output the message after all the logic is executed
echo $message;
