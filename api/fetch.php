<?php
require_once 'models.php';

// Function to get user's email based on their session
function getUserEmailFromSession() {
    if (!isset($_COOKIE['session_cookie'])) {
        return null;
    }

    $cookieValue = $_COOKIE['session_cookie'];
    return User::getUserEmailBySession($cookieValue);
}

// Function to get user ID based on their email
function getUserIdByEmail($email) {
    $user = User::getUserByEmail($email);
    return $user ? $user->id : null;
}

// Function to fetch reservations based on the user ID
function fetchReservations() {
    $userEmail = getUserEmailFromSession();

    if (!$userEmail) {
        // Redirect to "masuk.php" with an error message if session not found
        $errorMessage = "Sesi telah berakhir. Silakan masuk kembali.";
        $encodedErrorMessage = urlencode($errorMessage);
        header("Location: masuk.php?error=$encodedErrorMessage");
        exit();
    }

    $userId = getUserIdByEmail($userEmail);

    if (!$userId) {
        // Handle the case when user ID not found (e.g., return an error code or show a message)
        die("User ID not found.");
    }

    // Fetch reservations where the user ID matches the store_id
    $db = Database::getConnection();
    $query = "SELECT * FROM data_reservasi WHERE store_id = $1";
    $result = pg_query_params($db, $query, [$userId]);

    if (!$result) {
        // Handle the error (e.g., log or show an error message)
        die("Error executing query: " . pg_last_error($db));
    }

    // Fetch all rows from the result set and store them in an array
    $rows = array();
    while ($row = pg_fetch_assoc($result)) {
        $rows[] = $row;
    }

    // Return the data as JSON
    header('Content-Type: application/json');
    echo json_encode($rows);
}

// Call the function to fetch reservations
fetchReservations();
?>
