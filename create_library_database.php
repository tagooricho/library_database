<?php
$servername = "localhost";
$username = "your_username";
$password = "your_password";

// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create database
$sql = "CREATE DATABASE library_database";
if ($conn->query($sql) === TRUE) {
    echo "Database created successfully\n";
} else {
    echo "Error creating database: " . $conn->error . "\n";
}

// Select the database
$conn->select_db("library_database");

// Create Authors table
$sql = "CREATE TABLE Authors (
    AuthorID INT AUTO_INCREMENT PRIMARY KEY,
    FirstName VARCHAR(50),
    LastName VARCHAR(50)
)";
if ($conn->query($sql) === TRUE) {
    echo "Table Authors created successfully\n";
} else {
    echo "Error creating table: " . $conn->error . "\n";
}

// Create Books table
$sql = "CREATE TABLE Books (
    BookID INT AUTO_INCREMENT PRIMARY KEY,
    Title VARCHAR(100),
    Genre VARCHAR(50),
    AuthorID INT,
    FOREIGN KEY (AuthorID) REFERENCES Authors(AuthorID)
)";
if ($conn->query($sql) === TRUE) {
    echo "Table Books created successfully\n";
} else {
    echo "Error creating table: " . $conn->error . "\n";
}

// Create Borrowers table
$sql = "CREATE TABLE Borrowers (
    BorrowerID INT AUTO_INCREMENT PRIMARY KEY,
    FirstName VARCHAR(50),
    LastName VARCHAR(50)
)";
if ($conn->query($sql) === TRUE) {
    echo "Table Borrowers created successfully\n";
} else {
    echo "Error creating table: " . $conn->error . "\n";
}

// Create BorrowingRecords table
$sql = "CREATE TABLE BorrowingRecords (
    RecordID INT AUTO_INCREMENT PRIMARY KEY,
    BookID INT,
    BorrowerID INT,
    BorrowDate DATE,
    ReturnDate DATE,
    FOREIGN KEY (BookID) REFERENCES Books(BookID),
    FOREIGN KEY (BorrowerID) REFERENCES Borrowers(BorrowerID)
)";
if ($conn->query($sql) === TRUE) {
    echo "Table BorrowingRecords created successfully\n";
} else {
    echo "Error creating table: " . $conn->error . "\n";
}

// Insert sample data into Authors table
$sql = "INSERT INTO Authors (FirstName, LastName) VALUES ('J.K.', 'Rowling')";
if ($conn->query($sql) === TRUE) {
    echo "Sample data inserted into Authors table successfully\n";
} else {
    echo "Error inserting data: " . $conn->error . "\n";
}

$sql = "INSERT INTO Authors (FirstName, LastName) VALUES ('George', 'Orwell')";
if ($conn->query($sql) === TRUE) {
    echo "Sample data inserted into Authors table successfully\n";
} else {
    echo "Error inserting data: " . $conn->error . "\n";
}

// Insert sample data into Books table
$sql = "INSERT INTO Books (Title, Genre, AuthorID) VALUES ('Harry Potter and the Philosopher\'s Stone', 'Fantasy', 1)";
if ($conn->query($sql) === TRUE) {
    echo "Sample data inserted into Books table successfully\n";
} else {
    echo "Error inserting data: " . $conn->error . "\n";
}

$sql = "INSERT INTO Books (Title, Genre, AuthorID) VALUES ('1984', 'Dystopian', 2)";
if ($conn->query($sql) === TRUE) {
    echo "Sample data inserted into Books table successfully\n";
} else {
    echo "Error inserting data: " . $conn->error . "\n";
}

// Insert sample data into Borrowers table
$sql = "INSERT INTO Borrowers (FirstName, LastName) VALUES ('John', 'Doe')";
if ($conn->query($sql) === TRUE) {
    echo "Sample data inserted into Borrowers table successfully\n";
} else {
    echo "Error inserting data: " . $conn->error . "\n";
}

$sql = "INSERT INTO Borrowers (FirstName, LastName) VALUES ('Jane', 'Smith')";
if ($conn->query($sql) === TRUE) {
    echo "Sample data inserted into Borrowers table successfully\n";
} else {
    echo "Error inserting data: " . $conn->error . "\n";
}

// Insert sample data into BorrowingRecords table
$sql = "INSERT INTO BorrowingRecords (BookID, BorrowerID, BorrowDate, ReturnDate) VALUES (1, 1, '2024-07-01', '2024-07-15')";
if ($conn->query($sql) === TRUE) {
    echo "Sample data inserted into BorrowingRecords table successfully\n";
} else {
    echo "Error inserting data: " . $conn->error . "\n";
}

$sql = "INSERT INTO BorrowingRecords (BookID, BorrowerID, BorrowDate, ReturnDate) VALUES (2, 2, '2024-07-02', NULL)";
if ($conn->query($sql) === TRUE) {
    echo "Sample data inserted into BorrowingRecords table successfully\n";
} else {
    echo "Error inserting data: " . $conn->error . "\n";
}

$conn->close();
?>
