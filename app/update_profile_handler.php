<?php
session_start();
/*
// Check if user is logged in
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

// Retrieve updated profile information from the form
$email = $_POST['email'];
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$password = $_POST['password']; // Note: Hash the password before storing it in the database

// Update the user's information in the database
$user_name = $_SESSION['username'];
$sql = "UPDATE users SET email = '$email', first_name = '$first_name', last_name = '$last_name', password = '$password' WHERE username = '$user_name'";

if ($conn->query($sql) === TRUE) {
    // Profile updated successfully
    header("Location: dashboard.php"); // Redirect to dashboard after successful update
    exit;
} else {
    // Error updating profile
    echo "Error updating profile: " . $conn->error;
}

// Close the database connection
$conn->close();
?>