<?php
// Connect to database
$host = 'localhost';
$username = 'username';
$password = 'password';
$database = 'dbname';

$conn = new mysqli($host, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve username and password from POST request
$username = $_POST['username'];
$password = $_POST['password'];

// SQL query to check if username and password exist in the database
$sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Login successful
    echo "Login successful";
} else {
    // Login failed
    http_response_code(401);
    echo "Login failed";
}

// Close database connection
$conn->close();
?>
