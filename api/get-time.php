<?php
require_once 'models.php';

function fetchCurrentTimestamp() {

    $cookieValue = isset($_COOKIE['titip_user']) ? $_COOKIE['titip_user'] : null;

    $userEmail = User::getUserEmailBySession($cookieValue);

    if (!$userEmail) {
        // Redirect to "masuk.php" with an error message if session not found
        $errorMessage = "Sesi telah berakhir. Silakan masuk kembali.";
        $encodedErrorMessage = urlencode($errorMessage);
        header("Location: masuk.php?error=$encodedErrorMessage");
        exit();
    }

    // Get the current timestamp from the database
    $db = Database::getConnection();
    $query = "SELECT NOW() AS current_timestamp";
    $result = pg_query($db, $query);

    if (!$result) {
        // Handle the error (e.g., log or show an error message)
        die("Error executing query: " . pg_last_error($db));
    }

    // Fetch the row from the result set as an associative array
    $row = pg_fetch_assoc($result);

    // Return the data as JSON
    header('Content-Type: application/json');
    echo json_encode($row);
}

// Call the function to fetch the current timestamp
fetchCurrentTimestamp();
?>
