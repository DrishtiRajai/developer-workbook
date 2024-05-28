<?php

function calculatePercentage($amount, $interest_rate) {
	// Checking if there is a valid input before proceeding for the calculation
    if (is_numeric($amount) && is_numeric($interest_rate)) {
       
        $percentage = ($amount * $interest_rate) / 100;
        return $percentage;

    } 
	//If there is invalid input
	else {
       
        return "Please enter valid numeric values for amount and interest rate.";
    }
}

//Fetching the arguments from the HTML form into the PHP variables
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $amount = $_POST["amount"];
    $interest_rate = $_POST["interest_rate"];
    
    //Saving the function return value into a variable 
    $result = calculatePercentage($amount, $interest_rate);
    
    echo "Percentage Result: " . $result;
}
?>

<?php echo "
<!DOCTYPE html>
<html lang=\"en\">
<head>
    <meta charset=\"UTF-8\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
    <title>Percentage Calculator</title>
</head>
<body>
    <h1>Percentage Calculator</h1>
    <form method=\"post\">
        <label for=\"amount\">Amount:</label>
        <input type=\"text\" id=\"amount\" name=\"amount\"><br><br>
        
        <label for=\"interest_rate\">Interest Rate:</label>
        <input type=\"text\" id=\"interest_rate\" name=\"interest_rate\"><br><br>
        
        <input type=\"submit\" name=\"calculate\" value=\"Calculate\">
    </form>
</body>
</html>";
?>
