<?php
    session_start();
    include("connect.php");
    include("auth.php");

    $username = $_SESSION['username'];

// Get student data
$query = "SELECT * FROM studentstbl WHERE username = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();

// Now get sectionName using sectionId
$sectionName = "Unknown Section"; // default

if ($sectionId !== null) {
    $stmt = $conn->prepare("SELECT sectionName FROM sectiontbls WHERE sectionId = ?");
    
    if ($stmt) {
        $stmt->bind_param("i", $sectionId);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result && $result->num_rows > 0) {
            $sectionRow = $result->fetch_assoc();
            $sectionName = $sectionRow['sectionName'];
        }
    } else {
        // Debug output if query failed
        echo "Prepare failed: (" . $conn->errno . ") " . $conn->error;
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>iFeedback | Instructors</title>
    <link rel="icon" type="image/png" href="assets/svg/Icon Only.svg">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="assets/styles/Sidebar.css">
    <link rel="stylesheet" href="assets/styles/Instructors.css">
</head>
<body>
  <!-- SIDEBAR -->
  <div class="sidebar d-flex flex-column align-items-center justify-content-between" id="sidebar">
        <ul class="align-items-start" id="menu">
            <div class="d-block justify-content-center" id="avatar-container">
                <div id="avatar">
                    <img src="assets/svg/Student Avatar.svg" alt="">
                </div>
                <div class="d-inline justify-content-center text-center" id="studentInfo">
                    <p id="studentName"><?php echo $row['firstName'];?> <?php echo $row['surname']; ?></p>
                    <p id="studentSection"><?php echo htmlspecialchars($sectionName); ?></p>
                    </div>
                <div class="justify-content-center">
                    <hr class="hidden-hr">
                </div>
            </div>
            <div id="sidebarIconContainer">
                <li class="active">
                    <a class="text-decoration-none align-items-center" href="studentDashboard.php">
                        <span class="icon"><i class="bi bi-grid"></i></span>
                        <span class="textIcon">Dashboard</span>
                    </a>
                </li>
                <li>
                    <a class="text-decoration-none align-items-center" href="studentFeedbackHistory.php">
                        <span class="icon align-middle"><i class="bi bi-pencil-square"></i></i></span>
                        <span class="textIcon align-middle">Feedback</span>
                    </a>
                </li>
                <li>
                    <a class="text-decoration-none align-items-center" href="studentInstructors.php">
                        <span class="icon"><i class="bi bi-people"></i></span>
                        <span class="textIcon">Instructors</span>
                    </a>
                </li>
                <li>
                    <a class="text-decoration-none align-items-center align-middle" href="studentBadges.php">
                        <span class="icon"><i class="bi bi-award"></i></i></span>
                        <span class="textIcon">Badges</span>
                    </a>
                </li>
                <li>
                  <a class="logout-button text-decoration-none align-items-center" href="studentLogout.php" onclick="logout()">
                    <span class="icon"><i class="bi bi-box-arrow-right"></i></span>
                    <span class="textIcon">Logout</span>
                  </a>
                </li>
            </div>
        </ul>
    </div>
    <div class="containerLogo">
        <img src="assets/svg/Icon with Name.svg" class="containerLogo1" alt="" width="15%" height="15%">
            <div class="containerMain">
                <nav class="containerInstructors">
                    <div class="instructorsText">
                        <p>INSTRUCTORS</p>
                    </div>
                </nav>
                <div id="labels">
                    <p id="instructorName">Name</p>
                    <p id="instructorDepartment">Department</p>
                    <p id="instructorRatings">Rating</p> 
                </div>
                    <div id="instructorsContent">
                        <div class="contentRows" id="row1">
                            <p>Instructor</p>
                            <p>English Department</p>
                            <p>5.0</p>
                    </div>
                    <hr>
                    <div class="contentRows" id="row2">
                        <p>Instructor</p>
                        <p>English Department</p>
                        <p>4.9</p>
                    </div>
                    <hr>
                    <div class="contentRows" id="row3">
                        <p>Instructor</p>
                        <p>IT Department</p>
                        <p>4.9</p>
                    </div>
                    <hr>
                    <div class="contentRows" id="row4">
                        <p>Instructor</p>
                        <p>IT Department</p>
                        <p>4.9</p>
                    </div>
                    <hr>
                    <div class="contentRows" id="row5">
                        <p>Instructor</p>
                        <p>Tourism and Hospitality Management Department</p>
                        <p>4.8</p>
                    </div>
                    <hr>
                    <div class="contentRows" id="row6">
                        <p>Instructor</p>
                        <p>Filipino Department</p>
                        <p>4.7</p>
                    </div>
                    <hr>
                    <div class="contentRows" id="row7">
                        <p>Instructor</p>
                        <p>Tourism and Hospitality Management Department</p>
                        <p>4.6</p>
                    </div>
                </div>
            </div>
         </div>
    <script src="assets/scripts/Sidebar.js"></script>

</body>
</html>