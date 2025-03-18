<?php
$servername = "localhost";
$username = "your_username";
$password = "your_password";
$dbname = "LibraryDB";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$title = $_POST['title'];
$genre = $_POST['genre'];
$author_id = $_POST['author_id'];

$sql = "INSERT INTO Books (Title, Genre, AuthorID) VALUES ('$title', '$genre', '$author_id')";
if ($conn->query($sql) === TRUE) {
    echo "New book added successfully.";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

header("Location: index.html");
?>
