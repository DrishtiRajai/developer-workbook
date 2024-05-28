<?php
session_start();

// Check if user is logged in
/*
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}*/

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

// Delete the user's account from the database
$user_name = $_SESSION['username'];
$sql = "DELETE FROM users WHERE username = '$user_name'";

if ($conn->query($sql) === TRUE) {
    // Account deleted successfully
    session_unset(); // Clear all session variables
    session_destroy(); // Destroy the session
    echo "Account deleted successfully.";
} else {
    // Error deleting account
    echo "Error deleting account: " . $conn->error;
}

// Close the database connection
$conn->close();
?>
