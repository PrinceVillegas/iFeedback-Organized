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

// Prepare the SQL statement with JOIN to get instructor name
$stmt = $conn->prepare("
  SELECT r.*, i.instructorFullName 
  FROM ratingstbl r
  JOIN instructorstbl i ON r.instructorID = i.instructorID
");

if ($stmt === false) {
  echo "Error preparing SQL statement: " . $conn->error;
  exit();
}

$stmt->execute();
$result = $stmt->get_result();

if ($result === false) {
  echo "Error executing SQL statement: " . $conn->error;
  exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8w">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title> Admin | Instructor Feedbacks</title>
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
  </style>
</head>
<body>
  <h2>Instructor Ratings</h2>
  <table class="table border">
    <tr>
      <th>Rating ID</th>
      <th>Instructor</th>
      <th>Student ID</th>
      <th>Student Section</th>
      <th>Average Rating</th>
      <th>Free Comment</th>
    </tr>
    <?php
    if ($result) {
      while ($record = $result->fetch_assoc()) {
        $averageRating = (
          $record["rating1"] + $record["rating2"] + $record["rating3"] +
          $record["rating4"] + $record["rating5"] + $record["rating6"] +
          $record["rating7"] + $record["rating8"] + $record["rating9"] + $record["rating10"]
        ) / 10;

        echo "<tr>";
        echo "<td>" . $record["ratingID"] . "</td>";
        echo "<td>" . htmlspecialchars($record["instructorFullName"]) . "</td>";
        echo "<td>" . $record["studentID"] . "</td>";
        echo "<td>" . $record["studentSection"] . "</td>";
        echo "<td>" . number_format($averageRating, 2) . "</td>";
        echo "<td>" . htmlspecialchars($record["freeComment"]) . "</td>";
        echo "</tr>";
      }
    } else {
      echo "<tr><td colspan='6'>No results found.</td></tr>";
    }
    ?>
  </table>
</body>
</html>
