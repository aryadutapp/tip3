<?php
require_once 'models.php';

// Function to fetch reservations based on the user's email
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

    // Fetch reservations for the user based on their email
    $user = User::getUserByEmail($userEmail);

    if (!$user) {
        // Handle the case when user not found (e.g., return an error code or show a message)
        die("User not found.");
    }

    $db = Database::getConnection();
    $query = "SELECT cust_name, store_id, book_time, Pickup_number
              FROM data_reservasi
              WHERE store_id = $1
              AND start_time IS NOT NULL
              ORDER BY book_time DESC
              LIMIT 1";

    $result = pg_query_params($db, $query, [$user->user_id]);

    if (!$result) {
        // Handle the error (e.g., log or show an error message)
        die("Error executing query: " . pg_last_error($db));
    }

    // Fetch the first row from the result set as an associative array
    $row = pg_fetch_assoc($result);

    if (!$row) {
        // Handle the case when no rows are found (e.g., return an empty response or show a message)
        die("No reservations found.");
    }

    // HTML receipt format
    echo "<html>
            <head>
                <title>Receipt</title>
            </head>
            <body>
                <h1>Struk Penitipan Barang Titip.in</h1>
                <p><strong>Customer Name:</strong> " . $row['cust_name'] . "</p>
                <p><strong>Store ID:</strong> " . $row['store_id'] . "</p>
                <p><strong>Booked Time:</strong> " . $row['book_time'] . "</p>
                <p><strong>Pickup Number:</strong> " . $row['pickup_number'] . "</p>
            </body>
          </html>";
}

// Call the function to fetch reservations and generate the HTML receipt
fetchReservations();
?>
