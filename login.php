<?php

// Replace these variables with your actual database credentials
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "dp";
$table = "dpkunal"; // Replace with your actual table name

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Get form data
$username = $_POST['username'];
$password = $_POST['password'];

// SQL query to check if username and password match
$sql = "SELECT * FROM `$table` WHERE `username` = '$username' AND `password` = '$password'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) == 1) {
    // Username and password match, redirect to dashboard page
    header("Location: dashboard.html");
    exit();
} else {
    // Username or password is incorrect
    echo '<script type="text/javascript">';
    echo 'alert("Incorrect username or password.");';
    echo 'window.location.href = "pages-login.html";';  // Redirect to login page
    echo '</script>';
}

// Close connection
mysqli_close($conn);

?>