<?php
$servername = "localhost";
$username = "your_username";
$password = "your_password";
$dbname = "LibraryDB";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$data = [];

// Fetch Authors
$sql = "SELECT AuthorID, FirstName, LastName FROM Authors";
$result = $conn->query($sql);
$authors = "<table><tr><th>AuthorID</th><th>FirstName</th><th>LastName</th></tr>";
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $authors .= "<tr><td>{$row['AuthorID']}</td><td>{$row['FirstName']}</td><td>{$row['LastName']}</td></tr>";
    }
}
$authors .= "</table>";
$data['authors'] = $authors;

// Fetch Books
$sql = "SELECT BookID, Title, Genre, AuthorID FROM Books";
$result = $conn->query($sql);
$books = "<table><tr><th>BookID</th><th>Title</th><th>Genre</th><th>AuthorID</th></tr>";
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $books .= "<tr><td>{$row['BookID']}</td><td>{$row['Title']}</td><td>{$row['Genre']}</td><td>{$row['AuthorID']}</td></tr>";
    }
}
$books .= "</table>";
$data['books'] = $books;

// Fetch Borrowers
$sql = "SELECT BorrowerID, FirstName, LastName FROM Borrowers";
$result = $conn->query($sql);
$borrowers = "<table><tr><th>BorrowerID</th><th>FirstName</th><th>LastName</th></tr>";
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $borrowers .= "<tr><td>{$row['BorrowerID']}</td><td>{$row['FirstName']}</td><td>{$row['LastName']}</td></tr>";
    }
}
$borrowers .= "</table>";
$data['borrowers'] = $borrowers;

// Fetch Borrowing Records
$sql = "SELECT RecordID, BookID, BorrowerID, BorrowDate, ReturnDate FROM BorrowingRecords";
$result = $conn->query($sql);
$borrowing_records = "<table><tr><th>RecordID</th><th>BookID</th><th>BorrowerID</th><th>BorrowDate</th><th>ReturnDate</th></tr>";
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $borrowing_records .= "<tr><td>{$row['RecordID']}</td><td>{$row['BookID']}</td><td>{$row['BorrowerID']}</td><td>{$row['BorrowDate']}</td><td>{$row['ReturnDate']}</td></tr>";
    }
}
$borrowing_records .= "</table>";
$data['borrowing_records'] = $borrowing_records;

$conn->close();

echo json_encode($data);
?>
