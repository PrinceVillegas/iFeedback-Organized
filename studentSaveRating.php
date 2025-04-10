<?php
session_start();
include("connect.php");

if (isset($_POST['login-button'])) {
    $studentID = $_POST['studentID'];
    $section = $_POST['section'];
    $username = $_POST['username'];
    $stmt = $conn->prepare("SELECT studentID FROM studentstbl WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();
    $studentData = $result->fetch_assoc();

    if (isset($studentData['studentID'])) {
        $_SESSION['studentID'] = $studentData['studentID'];
        $_SESSION['section'] = $section;
    } else {
        header("Location: login.php");
        exit();
    }
}

if (isset($_POST['submit-button'])) {
    $instructorName = $_POST['instructorName'];
    $rating1 = $_POST['rating1'];
    $rating2 = $_POST['rating2'];
    $rating3 = $_POST['rating3'];
    $rating4 = $_POST['rating4'];
    $rating5 = $_POST['rating5'];
    $rating6 = $_POST['rating6'];
    $rating7 = $_POST['rating7'];
    $rating8 = $_POST['rating8'];
    $rating9 = $_POST['rating9'];
    $rating10 = $_POST['rating10'];
    $freeComment = $_POST['freeComment'];

    // Retrieve the student ID and section from the session variable
    if (isset($_SESSION['studentID']) && isset($_SESSION['section'])) {
        $studentID = $_SESSION['studentID'];
        $studentSection = $_SESSION['section'];
    } else {
        header("Location: login.php");
        exit();
    }

    $stmt = $conn->prepare("SELECT instructorID FROM instructorstbl WHERE instructor_username = ?");
    $stmt->bind_param("s", $instructorName);
    $stmt->execute();

    $result2 = $stmt->get_result();
    if ($result2 !== null) {
      $instructorData = $result2->fetch_assoc();
      if (isset($instructorData['instructorID'])) {
        $instructorID = $instructorData['instructorID'];
      } else {
        header("Location: studentEvaluateInstructors.php");
        exit();
      }
    } else {
      header("Location: studentEvaluateInstructor.php");
      exit();
    }

    $isValid = true;

    if ($instructorName === '') {
      $isValid = false;
    }

    $ratings = array($rating1, $rating2, $rating3, $rating4, $rating5, $rating6, $rating7, $rating8, $rating9, $rating10);

    foreach ($ratings as $rating) {
      if ($rating === '') {
        $isValid = false;
      }
    }

    if ($freeComment === '') {
      $isValid = false;
    }

    if (!$isValid) {
      header("Location: studentEvaluateInstructors.php");
      exit();
    }

    // Create the ratings table if it does not exist
    $sql = "CREATE TABLE IF NOT EXISTS ratingstbl (
        ratingID INT AUTO_INCREMENT,
        instructorID INT,
        studentID INT,
        studentSection VARCHAR(255),
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
        freeComment TEXT,
        PRIMARY KEY (ratingID),
        FOREIGN KEY (instructorID) REFERENCES instructorstbl(instructorID)
      )";
}
    $conn->query($sql);

    $stmt3 = $conn->prepare("INSERT INTO ratingstbl (instructorID, studentID, studentSection, rating1, rating2, rating3, rating4, rating5, rating6, rating7, rating8, rating9, rating10, freeComment)
    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

    if ($stmt3 === false) {
      header("Location: studentEvaluateInstructors.php");
      exit();
    } 

    $studentSectionStr = strval($studentSection);
    $freeCommentStr = strval($freeComment);

    $stmt3->bind_param("iisiiiiiiiiiis", $instructorID, $studentID, $studentSectionStr, $rating1, $rating2, $rating3, $rating4, $rating5, $rating6, $rating7, $rating8, $rating9, $rating10, $freeCommentStr);
    $stmt3->execute();
    $stmt3->close();

$conn->query("CREATE TABLE IF NOT EXISTS user_activity (
    id INT AUTO_INCREMENT PRIMARY KEY,
    studentID INT,
    activity_name VARCHAR(255),
    activity_date DATETIME,
    activity_consequences TEXT
)");
 $activityName = 'Evaluated an Instructor';
 $activityConsequences = 'Successfully evaluated an instructor';
 
 $stmt = $conn->prepare("INSERT INTO user_activity (studentID, activity_name, activity_date, activity_consequences)
 VALUES (?, ?, NOW(), ?)");
 $stmt->bind_param("iss", $_SESSION['studentID'], $activityName, $activityConsequences);
 $stmt->execute();
 $stmt->close();

$evaluatedInstructors = array();
$allEvaluated = false; 

$stmt = $conn->prepare("SELECT instructorID FROM instructorstbl");
$stmt->execute();
$result = $stmt->get_result();
while ($row = $result->fetch_assoc()) {
    $instructorID = $row['instructorID'];
    $stmt2 = $conn->prepare("SELECT * FROM ratingstbl WHERE instructorID = ? AND studentID = ?");
    $stmt2->bind_param("ii", $instructorID, $_SESSION['studentID']);
    $stmt2->execute();
    $result2 = $stmt2->get_result();
    if ($result2->num_rows > 0) {
        $evaluatedInstructors[] = $instructorID;
    }
}

$stmt = $conn->prepare("SELECT instructorID FROM instructorstbl");
$stmt->execute();
$result = $stmt->get_result();
$allInstructorsEvaluated = true;
while ($row = $result->fetch_assoc()) {
  $instructorID = $row['instructorID'];
  if (!in_array($instructorID, $evaluatedInstructors)) {
    $allInstructorsEvaluated = false;
  }
}
if ($allInstructorsEvaluated) {
  $_SESSION['evaluation_finished'] = true;
  unset($_SESSION['evaluation_finished']);
  $updateQuery = "UPDATE studentstbl SET evalStatus = '1' WHERE studentID = '".$_SESSION['studentID']."'";
  $conn->query($updateQuery);
  header("Location: studentDashboard.php");
  exit();
} else {
  header("Location: studentEvaluateInstructors.php");
  exit();
}
 ?>