<?php


// Create database connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	// Retrieve form data
	$name = $_POST['name'];
	$brand = $_POST['brand'];




	// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}

	// Insert data into a table
	$sql = "INSERT INTO product_cat (name, brand) VALUES ('$name', '$brand')";

	if ($conn->query($sql) === TRUE) {
		echo "New record created successfully";
	} else {
		echo "Error: " . $sql . "<br>" . $conn->error;
	}

	// Close the database connection
	$conn->close();
}
