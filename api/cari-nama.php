<?php
require_once 'models.php';

// Function to fetch customer names based on the search query
function fetchCustomerNames($query) {
    $cookieValue = isset($_COOKIE['titip_user']) ? $_COOKIE['titip_user'] : null;
    $userEmail = User::getUserEmailBySession($cookieValue);

    if (!$userEmail) {
        // Redirect to "masuk.php" with an error message if session not found
        $errorMessage = "Sesi telah berakhir. Silakan masuk kembali.";
        $encodedErrorMessage = urlencode($errorMessage);
        header("Location: masuk.php?error=$encodedErrorMessage");
        exit();
    }

    // Fetch user information based on the user's email
    $user = User::getUserByEmail($userEmail);

    if (!$user) {
        // Handle the case when user not found (e.g., return an error code or show a message)
        die("User not found.");
    }

    $db = Database::getConnection();
    $query = "SELECT *
              FROM data_reservasi
              WHERE store_id = $1 AND CUST_NAME ILIKE $2
              ";
    $result = pg_query_params($db, $query, [$user->user_id, $query"]);

    if (!$result) {
        // Handle the error (e.g., log or show an error message)
        die("Error executing query: " . pg_last_error($db));
    }

    // Fetch all rows from the result set as an array of associative arrays
    $rows = pg_fetch_all($result);

    // Extract customer names from the result rows
    $customerNames = array_column($rows, 'cust_name');

    // Return the data as JSON
    header('Content-Type: application/json');
    echo json_encode($customerNames);
}

// Get query from the request
$query = isset($_POST['query']) ? $_POST['query'] : '';

// Call the function to fetch customer names
fetchCustomerNames($query);
?>
