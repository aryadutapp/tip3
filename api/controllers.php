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
            header("Location: https://aryadutapp.github.io/titipin/dashboard");
            exit();
        } 
          if ($user === -1) {
        // Email isnt registered, display an error message
            $errorMessage = "Email belum terdaftar";
            $encodedErrorMessage = urlencode($errorMessage);
            header("Location: masuk.php?error=$encodedErrorMessage");
            exit();
    }
              
        else {
            // Password doesn't match redirect to "masuk.php" with error message
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
        
    } else {
        // If form_action is not "login" or "register", you can handle the specific case here
        $message = "Method Post But Invalid form_action: $form_action";
    }
}

else {
    // If form_action is not "login" or "register", you can handle the specific case here
    $message = "Invalid form_action: $form_action";
}

// Output the message after all the logic is executed
echo $message;
