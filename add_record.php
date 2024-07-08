<?php
$servername = "localhost";
$username = "your_username";
$password = "your_password";
$dbname = "LibraryDB";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$book_id = $_POST['book_id'];
$borrower_id = $_POST['borrower_id'];
$borrow_date = $_POST['borrow_date'];
$return_date = isset($_POST['return_date']) ? $_POST['return_date'] : NULL;

$sql = "INSERT INTO BorrowingRecords (BookID, BorrowerID, BorrowDate, ReturnDate) VALUES ('$book_id', '$borrower_id', '$borrow_date', '$return_date')";
if ($conn->query($sql) === TRUE) {
    echo "New borrowing record added successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

header("Location: index.html");
?>
