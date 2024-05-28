    <?php
$servername = "localhost"; 
$username = "root"; 
$password = "abcdefghij"; 
$dbname = "test"; 

// Create connection with the database
$db = new mysqli($servername, $username, $password, $dbname);



$errors = []; // Array to store validation errors

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate and sanitize form inputs
    $firstName = trim($_POST['firstName']);
    $lastName = trim($_POST['lastName']);
    $username = trim($_POST['username']);
    $mobile = trim($_POST['mobile']);
    $email = trim($_POST['email']);
    $photo = $_FILES['photo']['name']; // File upload handling
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirmPassword'];

    // Validation for first name
    if (empty($firstName) || !preg_match("/^[A-Za-z]{3,}$/", $firstName)) {
        $errors['firstName'] = "First name is required and should contain at least 3 characters (only letters).";
    }

    // Validation for last name
    if (empty($lastName) || !preg_match("/^[A-Za-z]{2,}$/", $lastName)) {
        $errors['lastName'] = "Last name is required and should contain at least 2 characters (only letters).";
    }

    // Validation for username
    if (empty($username) || strlen($username) > 25) {
        $errors['username'] = "Username is required and should not exceed 25 characters.";
    }

    // Validation for mobile number
    if (!empty($mobile) && !preg_match("/^[0-9]{10}$/", $mobile)) {
        $errors['mobile'] = "Mobile number should contain exactly 10 digits.";
    }

    // Validation for email
    if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = "Invalid email address.";
    }

    // Validation for photo upload
    if (empty($photo)) {
        $errors['photo'] = "Please upload a photo.";
    } else {
        // File upload handling (e.g., check file type, size, etc.)
        // Example:
        $allowedExtensions = ['jpg', 'jpeg', 'png'];
        $fileExtension = strtolower(pathinfo($photo, PATHINFO_EXTENSION));
        if (!in_array($fileExtension, $allowedExtensions)) {
            $errors['photo'] = "Only JPG, JPEG, or PNG files are allowed.";
        }
    }

    // Validation for password
    if (empty($password) || strlen($password) < 8 || strlen($password) > 16 || !preg_match("/^(?=.*[a-z])(?=.*[A-Z]).{8,16}$/", $password)) {
        $errors['password'] = "Password must be 8-16 characters long, containing at least one uppercase and one lowercase letter.";
    }

    // Validation for confirm password
    if ($password !== $confirmPassword) {
        $errors['confirmPassword'] = "Passwords do not match.";
    }

    // If there are no validation errors, insert data into the database
    if (empty($errors)) {
        // Hash the password before storing it in the database (for security)
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        // Prepare and execute the SQL query to insert data into the users table
        
         $query = "INSERT INTO users (first_name, last_name, username, mobile_number, email, user_photo, password) VALUES ('$firstName', '$lastName', '$username', '$mobile', '$email', '$photo', '$hashedPassword')";
         $result = $db->query($query);

        // Redirect user to a success page or display a success message
        // Example: header("Location: registration_success.php"); exit();
    }
}
?>

<?php echo '<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>User Registration</title>
<style>
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
    input[type="email"],
    input[type="password"],
    input[type="file"],
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
	.login-link {
        text-align: center;
        margin-top: 10px;
    }
    .login-link a {
        color: blue;
        text-decoration: none;
    @media screen and (max-width: 600px) {
        .container {
            width: 90%;
        }
    }
</style>
</head>
<body>

<div class="container">
    <h2>User Registration</h2>
    <form action="'.htmlspecialchars($_SERVER["PHP_SELF"]).'" method="post" enctype="multipart/form-data">
        <label for="firstName">First Name <span class="error">*</span></label>
        <input type="text" id="firstName" name="firstName" required pattern="[A-Za-z]{3,}">
        
        <label for="lastName">Last Name <span class="error">*</span></label>
        <input type="text" id="lastName" name="lastName" required pattern="[A-Za-z]{2,}">
        
        <label for="username">Username <span class="error">*</span></label>
        <input type="text" id="username" name="username" required maxlength="25">
        
        <label for="mobile">Mobile Number</label>
        <input type="text" id="mobile" name="mobile" pattern="[0-9]{10}">
        
        <label for="email">Email Address <span class="error">*</span></label>
        <input type="email" id="email" name="email" required>
        
        <label for="photo">User Photo <span class="error">*</span></label>
        <input type="file" id="photo" name="photo" accept="image/jpeg, image/png">
        
        <label for="password">Password <span class="error">*</span></label>
        <input type="password" id="password" name="password" required minlength="8" maxlength="16" pattern="^(?=.*[a-z])(?=.*[A-Z]).{8,16}$">
        
        <label for="confirmPassword">Confirm Password <span class="error">*</span></label>
        <input type="password" id="confirmPassword" name="confirmPassword" required>
        
        <input type="submit" value="Submit">
    </form>
	<div class="login-link">
	<a href="login.php">Have an account? Click here to login</a>
</div>
</div>


</body>
</html>'
?>
