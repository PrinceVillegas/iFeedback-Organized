<?php
session_start();
include "connect.php";
$sql = "CREATE TABLE IF NOT EXISTS studentratingstbl (
    id INT AUTO_INCREMENT PRIMARY KEY,
    instructorId INT,
    studentID INT,
    sectionId INT,
    rating1 INT,
    rating2 INT,
    rating3 INT,
    rating4 INT,
    rating5 INT,
    rating6 INT,
    rating7 INT,
    rating8 INT,
    rating9 INT,
    rating10 INT,
    freeComment TEXT
)";

if ($conn->query($sql) === TRUE) {
    echo "Table created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

// Insert form data into table
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $instructorId = $_POST["instructorId"];
    $studentID = $_POST["studentID"];
    $sectionId = $_POST["sectionId"];
    $rating1 = $_POST["rating1"];
    $rating2 = $_POST["rating2"];
    $rating3 = $_POST["rating3"];
    $rating4 = $_POST["rating4"];
    $rating5 = $_POST["rating5"];
    $rating6 = $_POST["rating6"];
    $rating7 = $_POST["rating7"];
    $rating8 = $_POST["rating8"];
    $rating9 = $_POST["rating9"];
    $rating10 = $_POST["rating10"];
    $freeComment = $_POST["freeComment"];

    $sql = "INSERT INTO studentratingstbl (instructorId, studentID, sectionId, rating1, rating2, rating3, rating4, rating5, rating6, rating7, rating8, rating9, rating10, freeComment) VALUES ('$instructorId', '$studentID', '$sectionId', '$rating1', '$rating2', '$rating3', '$rating4', '$rating5', '$rating6', '$rating7', '$rating8', '$rating9', '$rating10', '$freeComment')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>