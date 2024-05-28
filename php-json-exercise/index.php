<?php
//Passing json data into a string variable
$json_data = '[
    {
        "name" : "Ayush Singh",
        "age"  : "22",
        "school" : "Dehradoon Public school"
    },
    {
        "name" : "Smith Patel",
        "age"  : "18",
        "school" : "St. Xaviour school"
    },
    {
        "name" : "Rena Pamar",
        "age"  : "12",
        "school" : "Delhi Public school"
    }
]';
//Converting the data into associative array

$data_array = json_decode($json_data, true);

//Checking if the data has been successfully fetched
if ($data_array === null) {
    echo "Error decoding JSON.";
} else {
    // Print column headers
    echo "<table border='1'><tr><th>Name</th><th>Age</th><th>School</th></tr>";

    // Loop over the array and print data
    foreach ($data_array as $item) {
        echo "<tr><td>" . $item['name'] . "</td><td>" . $item['age'] . "</td><td>" . $item['school'] . "</td></tr>";
    }

    // Close table tag
    echo "</table>";
}
?>
