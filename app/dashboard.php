<?php
/*	session_start();

// Check if the user is not logged in, redirect to login page
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}*/

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <style>
        /* Reset styles */
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        /* Body styles */
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            padding: 20px;
        }

        /* Container styles */
        .container {
            max-width: 800px;
            margin: 0 auto;
        }

        /* Header styles */
        h1 {
            text-align: center;
            margin-bottom: 30px;
            color: #333;
        }

        /* User section styles */
        .user-section {
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            margin-bottom: 30px;
        }

        .user-section h2 {
            font-size: 24px;
            margin-bottom: 15px;
            color: #333;
        }

        .user-list {
            padding: 0;
            list-style: none;
        }

        .user-list-item {
            margin-bottom: 10px;
            padding: 10px;
            background-color: #f9f9f9;
            border-radius: 5px;
        }

        /* Logout link styles */
        .logout-link {
            display: block;
            text-align: center;
            margin-top: 300px;
			margin-left:900px;
            color: #007bff;
            text-decoration: none;
        }

        .logout-link:hover {
            text-decoration: underline;
        }
		 /* User photo styles */
		 .user-photo {
            position: absolute;
            top: 20px;
            right: 20px;
            width: 100px;
            height: 100px;
            border-radius: 50%;
            border: 3px solid #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
            overflow: hidden;
        }

        .user-photo img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Welcome to the Dashboard!</h1>
		<!-- User Photo -->
        <div class="user-photo">
            <!-- PHP code to fetch and display user photo -->
            <?php include('fetch_user_photo.php'); ?>
        </div>
		

        <!-- Latest Users Section -->
        <div class="user-section">
            <h2>Latest 5 Users Data</h2>
            <ul class="user-list">
                <!-- PHP code to fetch and display latest 5 users will go here -->
                <?php include('fetch_latest_users.php'); ?>
            </ul>
        </div>

        <!-- Logout Link -->
		<a href="update_profile.php">Update Profile</a>
        <a href="logout.php" class="logout-link">Logout</a>
    </div>
</body>
</html>
