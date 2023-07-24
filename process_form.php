<?php

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $form_action = $_POST["form_action"];

    if ($form_action === "login") {
        // Redirect to YouTube for login
        header('Location: https://www.youtube.com');
        exit;
    } elseif ($form_action === "register") {
        // Redirect to Google for registration
        header('Location: https://www.google.com');
        exit;
    }
}

function login($username, $password) {
    // Process login form data
    // Your login logic goes here
    // For example, check credentials, set session, redirect user, etc.
    echo "Login function called. Username: " . $username . ", Password: " . $password;
}

function register($username, $password) {
    // Process registration form data
    // Your registration logic goes here
    // For example, store user data in the database, redirect user, etc.
    echo "Register function called. Username: " . $username . ", Password: " . $password;
}
?>