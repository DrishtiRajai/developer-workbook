<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "abcdefghij";
$dbname = "test";

// Create connection with the database
$db = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}

// Query to fetch latest 5 users
$query = "SELECT * FROM users ORDER BY registration_date DESC LIMIT 5";
$result = $db->query($query);

// Display users
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo '<li class="user-list-item">' . $row["first_name"] ." ". $row["last_name"] .'</li>';
    }
} else {
    echo '<li>No users found</li>';
}

// Close database connection
$db->close();
?>
