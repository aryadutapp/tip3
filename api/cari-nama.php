<?php
require_once 'models.php';

// Function to fetch reservations based on the user's email and query parameter
function fetchReservations() {

    $cookieValue = isset($_COOKIE['titip_user']) ? $_COOKIE['titip_user'] : null;

    $userEmail = User::getUserEmailBySession($cookieValue);

    if (!$userEmail) {
        // Redirect to "masuk.php" with an error message if session not found
        $errorMessage = "Sesi telah berakhir. Silakan masuk kembali.";
        $encodedErrorMessage = urlencode($errorMessage);
        header("Location: masuk.php?error=$encodedErrorMessage");
        exit();
    }

    // Get the query parameter if provided
    $query = isset($_GET['query']) ? $_GET['query'] : '';
    
    // Fetch reservations for the user and query
    $user = User::getUserByEmail($userEmail);

    if (!$user) {
        // Handle the case when user not found (e.g., return an error code or show a message)
        die("User not found.");
    }

    $db = Database::getConnection();
    $query = "SELECT *
              FROM data_reservasi
              WHERE store_id = $1 AND cust_name ILIKE '%koko%'
              ";
    $result = pg_query_params($db, $query, [$user->user_id]);

    if (!$result) {
        // Handle the error (e.g., log or show an error message)
        die("Error executing query: " . pg_last_error($db));
    }

    // Fetch all rows from the result set as an array of associative arrays
    $rows = pg_fetch_all($result);

    // Remove the 'pickup_number' key from each row
    foreach ($rows as &$row) {
        unset($row['pickup_number']);
    }

    // Return the data as JSON
    header('Content-Type: application/json');
    echo json_encode($rows);
}

// Call the function to fetch reservations
fetchReservations();
?>
