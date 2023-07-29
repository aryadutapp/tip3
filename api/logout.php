<?php
require_once 'models.php';

// Check if the "titip_user" cookie is set
if (isset($_COOKIE['titip_user'])) {
    // Get the user's cookie value from the current session
    $cookieValue = $_COOKIE['titip_user'];

    // Get the user's email based on their session
    $userEmail = User::getUserEmailBySession($cookieValue);

    // If a valid user email is retrieved, perform the logout actions
    if ($userEmail) {
        // Perform the logout actions
        User::deleteSessionByEmail($userEmail);

        // Clear the cookie by setting it to an empty value and expiring it (time in the past)
        setcookie("titip_user", "", time() - 3600, '/');

        // Redirect to index.html after logout
        header("Location: ../");
        exit();
    }
}

// If there is no "titip_user" cookie or the user email is not found, directly redirect to index.html
header("Location: ../");
exit();
