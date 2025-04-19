<?php
session_start();
include("connect.php");

// Display the last submitted rating if available
if (isset($_SESSION['last_submission'])) {
  $last = $_SESSION['last_submission'];
  echo "<div style='padding: 10px; background: #e0ffe0; border: 1px solid green; margin-bottom: 20px;'>";
  echo "<strong>✅ Rating Submitted:</strong><br>";
  echo "Instructor: " . htmlspecialchars($last['instructorFullName']) . "<br>";
  echo "Student ID: " . htmlspecialchars($last['studentID']) . "<br>";
  echo "Section: " . htmlspecialchars($last['studentSection']) . "<br>";
  echo "Average Rating: " . number_format($last['avgRating'], 2) . "<br>";
  echo "Comment: " . htmlspecialchars($last['freeComment']) . "<br>";
  echo "</div>";
  unset($_SESSION['last_submission']);
}

// Fetch instructors for dropdown
$instructors = [];
$instStmt = $conn->prepare("SELECT instructorID, instructorFullName FROM instructorstbl");
$instStmt->execute();
$instResult = $instStmt->get_result();
while ($row = $instResult->fetch_assoc()) {
  $instructors[] = $row;
}

// Get selected instructor
$selectedInstructorID = isset($_GET['instructor']) ? $_GET['instructor'] : null;

// Prepare query (filter if instructor selected)
if ($selectedInstructorID) {
  $stmt = $conn->prepare("
    SELECT r.*, i.instructorFullName 
    FROM studentratingstbl r
    JOIN instructorstbl i ON r.instructorID = i.instructorID
    WHERE r.instructorID = ?
  ");
  $stmt->bind_param("i", $selectedInstructorID);
} else {
  $stmt = null;  // No query yet
}

$result = null;
if ($stmt) {
  $stmt->execute();
  $result = $stmt->get_result();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Admin | Instructor Feedbacks</title>
  <style>
    table, th, td {
      border: 1px solid black;
      border-collapse: collapse;
      padding: 8px;
    }
    table {
      width: 100%;
      margin-top: 20px;
    }
    form {
      margin-bottom: 20px;
    }
    #ratingsTable {
      display: <?= $selectedInstructorID ? 'table' : 'none' ?>;
    }
  </style>
</head>
<body>
  <h2>Instructor Ratings</h2>

  <form method="GET" action="">
    <label for="instructor">Select Instructor:</label>
    <select name="instructor" id="instructor">
      <option value="">-- Select Instructor --</option>
      <?php foreach ($instructors as $instructor): ?>
        <option value="<?= $instructor['instructorID'] ?>" <?= $selectedInstructorID == $instructor['instructorID'] ? 'selected' : '' ?>>
          <?= htmlspecialchars($instructor['instructorFullName']) ?>
        </option>
      <?php endforeach; ?>
    </select>
    <button type="submit">Show</button>
  </form>

  <table id="ratingsTable">
    <tr>
      <th>Rating ID</th>
      <th>Instructor</th>
      <th>Student ID</th>
      <th>Student Section</th>
      <th>Average Rating</th>
      <th>Free Comment</th>
    </tr>
    <?php
    if ($result && $result->num_rows > 0) {
      while ($record = $result->fetch_assoc()) {
        $averageRating = (
          $record["rating1"] + $record["rating2"] + $record["rating3"] +
          $record["rating4"] + $record["rating5"] + $record["rating6"] +
          $record["rating7"] + $record["rating8"] + $record["rating9"] + $record["rating10"]
        ) / 10;

        echo "<tr>";
        echo "<td>" . $record["id"] . "</td>";
        echo "<td>" . htmlspecialchars($record["instructorFullName"]) . "</td>";
        echo "<td>" . htmlspecialchars($record["studentId"]) . "</td>";
        echo "<td>" . htmlspecialchars($record["sectionId"]) . "</td>";
        echo "<td>" . number_format($averageRating, 2) . "</td>";
        echo "<td>" . htmlspecialchars($record["freeComment"]) . "</td>";
        echo "</tr>";
      }
    } elseif ($selectedInstructorID) {
      echo "<tr><td colspan='6'>No ratings found for this instructor.</td></tr>";
    }
    ?>
  </table>
</body>
</html>
