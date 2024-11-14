<?php
// Database connection credentials
$servername = "localhost"; // Use your database server
$username = "root";
$password = "";
$dbname = "stock";

// Create database connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $name = $_POST['name'];
    $contact = $_POST['contact'];
    $address = $_POST['address'];
    $remarks = $_POST['remarks'];


    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Insert data into a table
    $sql = "INSERT INTO vendors (name, contact, address, remarks) VALUES ('$name', '$contact', '$address ', ' $remarks')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close the database connection
    $conn->close();
}
