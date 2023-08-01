<?php
// info_db.php
$dbhost = "ep-odd-paper-540852-pooler.us-east-1.postgres.vercel-storage.com";
$dbname = "verceldb";
$dbuser = "default";
$dbpassword = "xXk9cTjer8uA";
$dbopt = "endpoint=ep-odd-paper-540852";

// Establish a database connection
$conn = pg_connect("host=$dbhost dbname=$dbname user=$dbuser password=$dbpassword options=$dbopt");
if (!$conn) {
    die("Database connection failed");
}

// Query to fetch data from the 'data_resevasi' table (replace with your table name)
$sql = "SELECT * FROM data_resevasi";

// Execute the query
$result = pg_query($conn, $sql);
if (!$result) {
    die("Query failed");
}

// Fetch all rows as an associative array
$results = pg_fetch_all($result);

// Close the database connection
pg_close($conn);

// Return the results as JSON data
echo json_encode($results);
?>
