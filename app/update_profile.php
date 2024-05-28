
<!-- Update Profile Page (update-profile.php) -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Profile</title>
	<style>
		
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f2f2f2;
        }
        h1 {
            text-align: center;
            margin-bottom: 20px;
        }
        form {
            max-width: 400px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        label {
            display: block;
            margin-bottom: 5px;
        }
        input[type="text"],
        input[type="email"],
        input[type="password"],
        input[type="file"],
        input[type="submit"],
        button {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 3px;
            box-sizing: border-box;
        }
        input[type="submit"],
        button {
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
        }
        input[type="submit"]:hover,
        button:hover {
            background-color: #45a049;
        }
        button {
            background-color: #f44336;
        }
        button:hover {
            background-color: #d32f2f;
        }
    
	</style>
</head>
<body>
    <h1>Update Your Profile</h1>
    <form action="update_profile_handler.php" method="POST">
        <!-- Add form fields for updating profile information -->
        <!-- Example: -->
        <!-- Email Address -->
        <label for="email">Email Address:</label>
        <input type="email" id="email" name="email" required><br>
        <!-- First Name -->
        <label for="first_name">First Name:</label>
        <input type="text" id="first_name" name="first_name" required><br>
        <!-- Last Name -->
        <label for="last_name">Last Name:</label>
        <input type="text" id="last_name" name="last_name" required><br>
       
        <!-- Password -->
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required><br>
        <!-- Submit Button -->
        <input type="submit" value="Update Profile">
    </form>
    <!-- Delete Profile Button with Confirmation Box -->
    <button  onclick="confirmDelete()">Delete Profile</button>
    <script>
        function confirmDelete() {
            if (confirm("Are you sure you want to delete your profile?")) {
                // Redirect to delete-profile-handler.php to handle profile deletion
                window.location.href = "delete_profile_handler.php";
            }
        }
    </script>
</body>
</html>
