<?php
// Simulate database credentials
$servername = "localhost";
$username = "username";
$password = "password";
$dbname = "database_name";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve username and password from POST request
$username = $_POST['username'];
$password = $_POST['password'];

// Perform database query to check if user exists
$sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // User exists, login successful
    $response = array("success" => true);
} else {
    // User does not exist or incorrect credentials
    $response = array("success" => false, "message" => "Invalid username or password.");
}

// Close database connection
$conn->close();

// Return response as JSON
echo json_encode($response);
?>
