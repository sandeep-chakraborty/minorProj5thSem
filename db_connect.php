<?php
$localhost = "localhost";
$username = "root";
$password = "";
$dbname = "stocks";

// Create connection without specifying the database
$connect = new mysqli($localhost, $username, $password);

// Check connection
if ($connect->connect_error) {
    die("Connection Failed: " . $connect->connect_error);
}

// Create database if it doesn't exist
$sql = "CREATE DATABASE IF NOT EXISTS $dbname";
if ($connect->query($sql) === TRUE) {
    // echo "Database created successfully or already exists";
} else {
    die("Error creating database: " . $connect->error);
}

// Select the database
$connect->select_db($dbname);

// echo "Successfully connected and database selected";
?>