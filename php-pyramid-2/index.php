<?php

$rows = 5;

// Outer loop for rows
for ($i = 1; $i <= $rows; $i++) {
    // Inner loop for printing spaces
    for ($j = $rows; $j > $i; $j--) {
        echo "&nbsp;&nbsp;";
    }
    // Inner loop for printing stars
    for ($k = 1; $k <= $i; $k++) {
        echo "*&nbsp;";
    }
    echo "<br>";
}

?>
