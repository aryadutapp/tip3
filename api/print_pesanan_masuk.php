<?php
require_once 'models.php';

// Function to fetch reservations and mitra data based on the user's email
function fetchReservationsAndMitra() {

    $cookieValue = isset($_COOKIE['titip_user']) ? $_COOKIE['titip_user'] : null;

    $userEmail = User::getUserEmailBySession($cookieValue);

    if (!$userEmail) {
        // Redirect to "masuk.php" with an error message if session not found
        $errorMessage = "Sesi telah berakhir. Silakan masuk kembali.";
        $encodedErrorMessage = urlencode($errorMessage);
        header("Location: masuk.php?error=$encodedErrorMessage");
        exit();
    }

    // Fetch user data for the user based on their email
    $user = User::getUserByEmail($userEmail);

    if (!$user) {
        // Handle the case when user not found (e.g., return an error code or show a message)
        die("User not found.");
    }

    $db = Database::getConnection();

    // Fetch reservations for the user based on their email
    $queryReservations = "SELECT cust_name, store_id, book_time, Pickup_number
                          FROM data_reservasi
                          WHERE store_id = $1
                          AND start_time IS NOT NULL
                          ORDER BY book_time DESC
                          LIMIT 1";

    // Execute the query to fetch reservations
    $resultReservations = pg_query_params($db, $queryReservations, [$user->user_id]);

    if (!$resultReservations) {
        // Handle the error (e.g., log or show an error message)
        die("Error executing reservations query: " . pg_last_error($db));
    }

    // Fetch the first row from the reservations result set as an associative array
    $rowReservations = pg_fetch_assoc($resultReservations);

    if (!$rowReservations) {
        // Handle the case when no reservations are found (e.g., return an empty response or show a message)
        die("No reservations found.");
    }

    // Fetch mitra data for the user based on their email
    $queryMitra = "SELECT * FROM data_mitra WHERE email = $1";

    // Execute the query to fetch mitra data
    $resultMitra = pg_query_params($db, $queryMitra, [$userEmail]);

    if (!$resultMitra) {
        // Handle the error (e.g., log or show an error message)
        die("Error executing mitra query: " . pg_last_error($db));
    }

    // Fetch the first row from the mitra result set as an associative array
    $rowMitra = pg_fetch_assoc($resultMitra);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Receipt</title>
</head>
<body>
    <h1>Struk Penitipan Barang Titip.in</h1>
    <p><strong>Customer Name:</strong> <?= $rowReservations['cust_name'] ?></p>
    <p><strong>Store ID:</strong> <?= $rowReservations['store_id'] ?></p>
    <p><strong>Mitra Name:</strong> <?= $rowMitra['nama_toko'] ?></p>
    <p><strong>Mitra Alamat:</strong> <?= $rowMitra['alamat'] ?></p>
    <p><strong>Booked Time:</strong> <?= $rowReservations['book_time'] ?></p>
    <p><strong>Pickup Number:</strong> <?= $rowReservations['pickup_number'] ?></p>
    
    <!-- Print button -->
    <button onclick='window.print()'>Print</button>
    
    <!-- Copy button -->
    <button onclick='copyToClipboard()'>Salin sebagai Pesan</button>

    <!-- JavaScript to copy text to clipboard -->
    <script>
        function copyToClipboard() {
            var textToCopy = "Kode pengambilan barang TITIP.IN\n\n" +
                "Mitra: <?= $rowMitra['name'] ?>\n" +
                "ID Mitra: <?= $rowMitra['id_mitra'] ?>\n" +
                "Nomer Pengambilan: <?= $rowReservations['Pickup_number'] ?>\n" +
                "Alamat Mitra: <?= $rowMitra['alamat'] ?>\n" +
                "Jam: <?= $rowReservations['book_time'] ?>\n\n" +
                "JAGA KERAHASIAAN KODE PENGAMBILAN\n\n" +
                "Info lebih lanjut kunjungi: www.titipin.com";
            
            var textarea = document.createElement('textarea');
            textarea.value = textToCopy;
            document.body.appendChild(textarea);
            textarea.select();
            document.execCommand('copy');
            document.body.removeChild(textarea);
            
            alert('Text copied to clipboard:\n\n' + textToCopy);
        }
    </script>
</body>
</html>
<?php
}

// Call the function to fetch reservations and mitra data and generate the HTML content
fetchReservationsAndMitra();
?>
