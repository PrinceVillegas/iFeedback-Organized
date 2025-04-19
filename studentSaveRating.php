<?php
session_start();
include "connect.php";

// Redirect if not logged in
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

$username = $_SESSION['username'];

// Fetch student data
$query = "SELECT * FROM studentstbl WHERE username = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 0) {
    echo "No student data found.";
    exit();
}

$student = $result->fetch_assoc();
$studentId = $student['studentId'];
$studentSectionId = $student['sectionId'];

// Create table if not exists
$tableQuery = "CREATE TABLE IF NOT EXISTS studentratingstbl (
    id INT AUTO_INCREMENT PRIMARY KEY,
    instructorId BIGINT,
    studentId VARCHAR(255),
    sectionId INT,
    rating1 INT, rating2 INT, rating3 INT, rating4 INT, rating5 INT,
    rating6 INT, rating7 INT, rating8 INT, rating9 INT, rating10 INT,
    freeComment TEXT
)";
$conn->query($tableQuery);

// Handle form submit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $instructorId = $_POST['instructorId'];

    // Check if already evaluated
    $checkStmt = $conn->prepare("SELECT * FROM studentratingstbl WHERE studentId = ? AND instructorId = ?");
    $checkStmt->bind_param("si", $studentId, $instructorId);
    $checkStmt->execute();
    $checkResult = $checkStmt->get_result();

    if ($checkResult->num_rows > 0) {
        header("Location: studentEvaluateInstructors.php");
        exit();
    }

    // Insert feedback
    $sql = "INSERT INTO studentratingstbl (
        instructorId, studentId, sectionId,
        rating1, rating2, rating3, rating4, rating5,
        rating6, rating7, rating8, rating9, rating10,
        freeComment
    ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param(
        "isiiiiiiiiiiis",
        $instructorId, $studentId, $studentSectionId,
        $_POST["rating1"], $_POST["rating2"], $_POST["rating3"],
        $_POST["rating4"], $_POST["rating5"], $_POST["rating6"],
        $_POST["rating7"], $_POST["rating8"], $_POST["rating9"],
        $_POST["rating10"], $_POST["freeComment"]
    );

    if ($stmt->execute()) {
        // Count rated instructors
        $ratedCountQuery = $conn->prepare("
            SELECT COUNT(DISTINCT instructorId) AS ratedCount
            FROM studentratingstbl
            WHERE studentId = ?
        ");
        $ratedCountQuery->bind_param("s", $studentId);
        $ratedCountQuery->execute();
        $ratedData = $ratedCountQuery->get_result()->fetch_assoc();
        $ratedCount = $ratedData['ratedCount'];

        // Total required
        $instructorCountQuery = $conn->prepare("
            SELECT COUNT(DISTINCT i.instructorId) AS totalInstructors
            FROM instructorstbl i
            JOIN classroomstbl c ON i.instructorId = c.instructorId
            WHERE c.sectionId = ?
        ");
        $instructorCountQuery->bind_param("i", $studentSectionId);
        $instructorCountQuery->execute();
        $totalInstructors = $instructorCountQuery->get_result()->fetch_assoc()['totalInstructors'];

        if ($ratedCount >= $totalInstructors) {
            // Update evalStatus & set popup session flag
            $updateStatus = $conn->prepare("UPDATE studentstbl SET evalStatus = 1 WHERE studentId = ?");
            $updateStatus->bind_param("s", $studentId);
            $updateStatus->execute();

            $_SESSION['show_popup'] = true;
            header("Location: studentDashboard.php");
            exit();
        } else {
            header("Location: studentEvaluateInstructors.php");
            exit();
        }
    } else {
        echo "Error: " . $stmt->error;
    }
}
$conn->close();
?>
