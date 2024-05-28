<?php
session_start();

// Set session timeout to 5 minutes (300 seconds)
$session_timeout = 300; // 5 minutes * 60 seconds per minute

// Check if last activity time is set
if (isset($_SESSION['last_activity'])) {
    // Calculate elapsed time since last activity
    $elapsed_time = time() - $_SESSION['last_activity'];
    
    // If elapsed time exceeds session timeout, destroy session
    if ($elapsed_time > $session_timeout) {
        // Destroy session data
        session_unset();
        session_destroy();
        
        // Redirect user to login page or any other appropriate action
        header("Location: login.php");
        exit;
    }
}

// Update last activity time
$_SESSION['last_activity'] = time();
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

$error = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate login credentials against the database
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Perform query to check if username and password match
    $query = "SELECT * FROM users WHERE username = '$username'";
    $result = $db->query($query);

    if ($result) {
        // Check if any row is returned
        if ($result->num_rows == 1) {
            // Fetch user data
            $row = $result->fetch_assoc();
            // Verify password
            if (password_verify($password, $row['password'])) {
                // Password is correct, set session with username and redirect to dashboard.php
                $_SESSION['username'] = $username;
                header("Location: dashboard.php");
                exit;
            } else {
                // Password is incorrect
                $error = "Invalid username or password.";
            }
        } else {
            // Username does not exist
            $error = "Invalid username or password.";
        }
    } else {
        // Query execution failed
        $error = "Query failed: " . $db->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Login</title>
    <style>
        /* Your CSS styles */
		body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        background-color: #f2f2f2;
    }
    .container {
        max-width: 500px;
        margin: 50px auto;
        background-color: #fff;
        padding: 20px;
        border-radius: 5px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }
    h2 {
        text-align: center;
        margin-bottom: 20px;
    }
    label {
        display: block;
        margin-bottom: 5px;
    }
    input[type="text"],
    input[type="password"],
    input[type="submit"] {
        width: 100%;
        padding: 10px;
        margin-bottom: 10px;
        border: 1px solid #ccc;
        border-radius: 3px;
        box-sizing: border-box;
    }
    input[type="submit"] {
        background-color: #4CAF50;
        color: white;
        border: none;
        cursor: pointer;
    }
    input[type="submit"]:hover {
        background-color: #45a049;
    }
    .error {
        color: red;
        font-size: 0.9em;
        margin-top: 5px;
    }
	.register-link {
        text-align: center;
        margin-top: 10px;
    }
    .register-link a {
        color: blue;
        text-decoration: none;
    @media screen and (max-width: 600px) {
        .container {
            width: 90%;
        }
    }
}
    </style>
</head>
<body>

<div class="container">
    <h2>User Login</h2>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <label for="username">Username</label>
        <input type="text" id="username" name="username" required>
        
        <label for="password">Password</label>
        <input type="password" id="password" name="password" required>
        
        <input type="submit" value="Login">
        
        <?php if (!empty($error)) { ?>
            <div class="error"><?php echo $error; ?></div>
        <?php } ?>
    </form>
    <div class="register-link">
        <a href="registration.php">New user? Click here to register</a>
    </div>
</div>

</body>
</html>
