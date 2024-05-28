<?php

$servername = "172.104.166.158";
$username = "training_drishtir";
$password = "qcDebtgIWCr2Yd24";
$dbname = "training_drishtir";


$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);	
}


$username = "john_day";
$email = "john@example.in";
$first_name = "John";
$last_name = "Day";
$password = password_hash("password456", PASSWORD_DEFAULT); // Hash the password for security


$sql = "INSERT INTO users (username, email, first_name, last_name, password)
        VALUES ('$username', '$email', '$first_name', '$last_name', '$password')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}


$conn->close();
?>
