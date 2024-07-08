-- Create the Database
CREATE DATABASE LibraryDB;

-- Use the Database
USE LibraryDB;

-- Create Authors Table
CREATE TABLE Authors (
    AuthorID INT AUTO_INCREMENT PRIMARY KEY,
    FirstName VARCHAR(50),
    LastName VARCHAR(50)
);

-- Create Books Table
CREATE TABLE Books (
    BookID INT AUTO_INCREMENT PRIMARY KEY,
    Title VARCHAR(100),
    Genre VARCHAR(50),
    AuthorID INT,
    FOREIGN KEY (AuthorID) REFERENCES Authors(AuthorID)
);

-- Create Borrowers Table
CREATE TABLE Borrowers (
    BorrowerID INT AUTO_INCREMENT PRIMARY KEY,
    FirstName VARCHAR(50),
    LastName VARCHAR(50)
);

-- Create BorrowingRecords Table
CREATE TABLE BorrowingRecords (
    RecordID INT AUTO_INCREMENT PRIMARY KEY,
    BookID INT,
    BorrowerID INT,
    BorrowDate DATE,
    ReturnDate DATE,
    FOREIGN KEY (BookID) REFERENCES Books(BookID),
    FOREIGN KEY (BorrowerID) REFERENCES Borrowers(BorrowerID)
);

-- Insert Sample Data into Authors Table
INSERT INTO Authors (FirstName, LastName) VALUES ('J.K.', 'Rowling');
INSERT INTO Authors (FirstName, LastName) VALUES ('George', 'Orwell');

-- Insert Sample Data into Books Table
INSERT INTO Books (Title, Genre, AuthorID) VALUES ('Harry Potter and the Philosopher\'s Stone', 'Fantasy', 1);
INSERT INTO Books (Title, Genre, AuthorID) VALUES ('1984', 'Dystopian', 2);

-- Insert Sample Data into Borrowers Table
INSERT INTO Borrowers (FirstName, LastName) VALUES ('John', 'Doe');
INSERT INTO Borrowers (FirstName, LastName) VALUES ('Jane', 'Smith');

-- Insert Sample Data into BorrowingRecords Table
INSERT INTO BorrowingRecords (BookID, BorrowerID, BorrowDate, ReturnDate) VALUES (1, 1, '2024-07-01', '2024-07-15');
INSERT INTO BorrowingRecords (BookID, BorrowerID, BorrowDate, ReturnDate) VALUES (2, 2, '2024-07-02', NULL);

-- Example Query: List all books and their authors
SELECT Books.Title, Authors.FirstName, Authors.LastName
FROM Books
JOIN Authors ON Books.AuthorID = Authors.AuthorID;

-- Example Query: List all borrowing records with borrower names and book titles
SELECT BorrowingRecords.BorrowDate, BorrowingRecords.ReturnDate, Books.Title, Borrowers.FirstName, Borrowers.LastName
FROM BorrowingRecords
JOIN Books ON BorrowingRecords.BookID = Books.BookID
JOIN Borrowers ON BorrowingRecords.BorrowerID = Borrowers.BorrowerID;
