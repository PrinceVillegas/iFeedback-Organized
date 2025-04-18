<?php
session_start();
include("connect.php");
include("auth.php");

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

$username = $_SESSION['username'];

// Fetch the logged-in student's data
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

// Fetch instructors assigned to this student's section
$instructorStmt = $conn->prepare("
    SELECT i.instructorId, i.instructorFullName 
    FROM instructorstbl i 
    JOIN classroomstbl c ON i.instructorId = c.instructorId 
    WHERE c.sectionId = ?
");
$instructorStmt->bind_param("i", $studentSectionId);
$instructorStmt->execute();
$instructorsResult = $instructorStmt->get_result();

// If form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['instructorId'])) {
    $instructorId = $_POST['instructorId'];

    // Optional: validate if the instructor exists and belongs to the section
    $checkStmt = $conn->prepare("
        SELECT * FROM instructorstbl i 
        JOIN classroomstbl c ON i.instructorId = c.instructorId 
        WHERE i.instructorId = ? AND c.sectionId = ?
    ");
    $checkStmt->bind_param("ii", $instructorId, $studentSectionId);
    $checkStmt->execute();
    $checkResult = $checkStmt->get_result();

    if ($checkResult->num_rows === 0) {
        echo "Invalid instructor selection.";
        exit;
    }

    header("Location: studentFeedback.php?instructorId=$instructorId");
    exit;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>iFeedback | Evaluate</title>
    <link rel="icon" type="image/png" href="assets/svg/Icon Only.svg">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="assets/styles/Sidebar.css">
    <link rel="stylesheet" href="assets/styles/EvaluateInstructors.css">
    <style>
        .main-content {
            margin-left: 90px;
            transition: margin-left 0.5s;
        }
        .sidebar.open + .main-content {
            margin-left: 240px;
        }
    </style>
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
                    <p id="studentName"><?php echo $student['firstName'] . ' ' . $student['surname']; ?></p>
                    <p id="studentSection"><?php echo $student['section']; ?></p>
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
                        <span class="icon align-middle"><i class="bi bi-pencil-square"></i></span>
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
                        <span class="icon"><i class="bi bi-award"></i></span>
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

    <!-- MAIN CONTENT -->
    <div class="main-content">
        <img id="containerLogo" src="assets/svg/Icon with Name.svg" width="15%" height="15%">    
        <div class="feedback-containergg">
            <div class="feedback-container">
                <div class="header">
                    <h1>Evaluate an Instructor</h1>
                </div>
               <form action="" method="post" id="instructorForm">
                   <input type="hidden" name="instructorId" id="instructorId">
                   <div id="instructors-container">
                       <div class="instructors-cards">
                       <?php while ($instructor = $instructorsResult->fetch_assoc()): ?>
                            <div class="instructor-card" id="instructor-<?php echo $instructor['instructorId']; ?>" 
                                onclick="selectInstructor('<?php echo $instructor['instructorId']; ?>')">
                                <img src="assets/svg/Instructor Avatar.svg" alt="Instructor" class="instructoravatars">
                                <p><?php echo htmlspecialchars($instructor['instructorFullName']); ?></p>
                            </div>
                        <?php endwhile; ?>

                       </div>
                   </div>
                   <button type="submit" class="ok-button">OK</button>
               </form>
               
               <script>
    function selectInstructor(instructorId) {
        document.getElementById('instructorId').value = instructorId;
        document.getElementById('instructorForm').submit();
    }
</script>
    
            </div>
        </div>
    </div>

    <script src="assets/scripts/Sidebar.js"></script>
    <script src="assets/scripts/EvaluateInstructors.js"></script>
</body>
</html>
