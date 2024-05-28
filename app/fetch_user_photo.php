<?php
session_start();

// Database connection
$servername = "localhost";
$username = "root";
$password = "abcdefghij";
$dbname = "test";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch user's photo path from the database
$user_name = $_SESSION['username']; // Assuming you store user ID in the session
$sql = "SELECT first_name, user_photo FROM users WHERE username = '$user_name'"; // Adjust the query according to your database schema
$result = $conn->query($sql);
if ($result === false) {
    // Query execution failed
    die("Error executing query: " . $conn->error);
}
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $photo_path = $row["user_photo"];
	$name=$row["first_name"];
	

    // Display the user's photo
	
    echo '<img src="' . urlencode($photo_path ). '" alt="User Photo">';
	echo '<div style="text-align: center;z-index: 5	; position: relative; ">' . $name . '</div>';	
	
	
    
} else {
    // Default photo or placeholder if user's photo not found
    echo '<img src="default_photo.jpg" alt="User Photo">';
}

// Close the database connection
$conn->close();
?>
