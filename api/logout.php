<?php
require_once 'models.php';

// Assuming you have the user's cookie value from the current session
// Replace this with the actual method to get the user's cookie value
$cookieValue = $_COOKIE['titip_user'];

// Get the user's email based on their session
$userEmail = User::getUserEmailBySession($cookieValue);

// Now you have the user's email, and you can use it for further operations
// ...

// Perform the logout actions
User::deleteSessionByEmail($userEmail);

// Clear the cookie by setting it to an empty value and expiring it (time in the past)
setcookie("titip_user", "", time() - 3600, '/');

// Redirect to index.html after logout
header("Location: ../");
exit();

?>
