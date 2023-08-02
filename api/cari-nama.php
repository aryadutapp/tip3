<?php
// Simulate database or data source
$mockData = ['John Doe', 'Jane Smith', 'Robert Johnson', 'Alice Johnson', 'David Brown'];

$query = isset($_GET['query']) ? $_GET['query'] : '';

$filteredResults = array_filter($mockData, function ($name) use ($query) {
    return stripos($name, $query) !== false;
});

// Return JSON response
header('Content-Type: application/json');
echo json_encode($filteredResults);
?>
