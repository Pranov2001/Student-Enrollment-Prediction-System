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
$name = $_POST['name'];
$email = $_POST['email'];
$username = $_POST['username'];
$password = $_POST['password'];

// SQL query to insert data into the database
$sql = "INSERT INTO `$table` (`name`, `email`, `username`, `password`) VALUES ('$name', '$email', '$username', '$password')";

$result = mysqli_query($conn, $sql);

if ($result) {
    header("Location: index.html");
    exit();

} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
    echo '<script type="text/javascript">';
    echo 'alert("Inter All Fields");';
    echo 'window.location.href = "pages-register.html";';  // Replace "new_page.php" with the actual page URL you want to redirect to
    echo '</script>';
}

// Close connection
mysqli_close($conn);

?>