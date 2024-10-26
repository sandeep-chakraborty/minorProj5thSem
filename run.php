<?php
require_once 'db_connect.php';  // Ensure the database is created

// Read the SQL file
$sql = file_get_contents('stocks.sql');

// Execute the SQL commands
if ($connect->multi_query($sql)) {
    do {
        // Store the result set
        if ($result = $connect->store_result()) {
            $result->free();
        }
    } while ($connect->next_result());
    echo "SQL file executed successfully.";
} else {
    echo "Error executing SQL file: " . $connect->error;
}

$connect->close();
?>