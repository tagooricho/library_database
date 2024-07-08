<?php
$servername = "localhost";
$username = "your_username";
$password = "your_password";
$dbname = "LibraryDB";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];

$sql = "INSERT INTO Borrowers (FirstName, LastName) VALUES ('$first_name', '$last_name')";
if ($conn->query($sql) === TRUE) {
    echo "New borrower added successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

header("Location: index.html");
?>
