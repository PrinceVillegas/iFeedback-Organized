<?php
session_start();
include("connect.php");

// Query: for each instructor, gather their sections (if any)
$query = "
    SELECT 
      i.instructorFullName,
      COALESCE(
        GROUP_CONCAT(s.sectionName ORDER BY s.sectionName SEPARATOR ', '),
        'No sections'
      ) AS sections
    FROM instructorstbl i
    LEFT JOIN classroomstbl c 
      ON c.instructorID = i.id
    LEFT JOIN sectiontbls s 
      ON c.sectionId = s.sectionId
    GROUP BY i.id, i.instructorFullName
    ORDER BY i.instructorFullName
";
$result = $conn->query($query);
if (! $result) {
    die("Query Error: " . $conn->error);
}
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Instructors & Their Sections</title>
  <style>
    table { border-collapse: collapse; width: 60%; }
    th, td { border: 1px solid #ccc; padding: 8px; text-align: left; }
    th { background: #f4f4f4; }
  </style>
</head>
<body>
  <h1>Instructors & Their Sections</h1>
  <table>
    <thead>
      <tr>
        <th>Instructor</th>
        <th>Sections</th>
      </tr>
    </thead>
    <tbody>
      <?php if ($result->num_rows > 0): ?>
        <?php while ($row = $result->fetch_assoc()): ?>
          <tr>
            <td><?php echo htmlspecialchars($row['instructorFullName']); ?></td>
            <td><?php echo htmlspecialchars($row['sections']); ?></td>
          </tr>
        <?php endwhile; ?>
      <?php else: ?>
        <tr>
          <td colspan="2"><em>No instructors found.</em></td>
        </tr>
      <?php endif; ?>
    </tbody>
  </table>
</body>
</html>
