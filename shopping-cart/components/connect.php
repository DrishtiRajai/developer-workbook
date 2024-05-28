<?php
$db_host = '172.104.166.158';
$db_name = 'training_drishtir';
$user_name = 'training_drishtir';
$user_password = 'qcDebtgIWCr2Yd24';

try {
    $conn = new PDO("mysql:host=$db_host;dbname=$db_name", $user_name, $user_password);
    // Set PDO to throw exceptions on errors
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
} catch(PDOException $e) {
    
}
?>
