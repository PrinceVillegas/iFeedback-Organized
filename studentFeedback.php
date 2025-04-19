<?php
session_start();
include("connect.php");
include("auth.php");

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

$username = $_SESSION['username'];

// Fetch student data
$stmt = $conn->prepare("SELECT * FROM studentstbl WHERE username = ?");
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();
$student = $result->fetch_assoc();

if (!$student) {
    echo "No student data found.";
    exit();
}

// Store student ID and sectionId in session (if not already stored)
$_SESSION['studentID'] = $student['studentId'];
$_SESSION['sectionId'] = $student['sectionId'];

// Extract student info
$studentFirstName = $student['firstName'];
$studentLastName = $student['surname'];
$sectionId = $student['sectionId'];

// Fetch section name
$sectionName = 'Unknown';
$sectionQuery = $conn->prepare("SELECT sectionName FROM sectiontbls WHERE sectionId = ?");
$sectionQuery->bind_param("i", $sectionId);
$sectionQuery->execute();
$sectionResult = $sectionQuery->get_result();
if ($sectionResult && $sectionResult->num_rows > 0) {
    $sectionRow = $sectionResult->fetch_assoc();
    $sectionName = $sectionRow['sectionName'];
}

// Get instructorId from query parameter
$instructorId = isset($_GET['instructorId']) ? (int)$_GET['instructorId'] : null;

$instructorName = '';
if ($instructorId) {
    $stmt = $conn->prepare("SELECT instructorFullName FROM instructorstbl WHERE instructorId = ?");
    $stmt->bind_param("i", $instructorId);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
        $instructor = $result->fetch_assoc();
        $instructorName = $instructor['instructorFullName'];
    } else {
        echo "Instructor not found.";
        exit();
    }
} else {
    echo "No instructor selected.";
    exit();
}

// Optional: Generate a CSRF/rating token
$token = bin2hex(random_bytes(16));
$_SESSION['ratingToken'] = $token;
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>iFeedback | Feedback</title>
    <link rel="icon" type="image/png" href="assets/svg/Icon Only.svg">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="assets/styles/Sidebar.css">
    <link rel="stylesheet" href="assets/styles/Feedback.css">
    <link rel="stylesheet" href="assets/styles/Feedback-Footer.css">
    <script src="assets/scripts/Footer.js"></script>
    <style>
        .main-content {
            margin-left: 90px; /* Adjust this value based on sidebar width */
            transition: margin-left 0.5s;
        }
        .sidebar.open + .main-content {
            margin-left: 240px; /* Adjust this value based on sidebar expanded width */
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
                <p id="studentName"><?php echo htmlspecialchars($studentFirstName); ?> <?php echo htmlspecialchars($studentLastName); ?></p>
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
    <div class="main-content">
    <div class="logo">
        <img src="assets/svg/Icon with Name.svg" alt="iFeedback Logo">
    </div>

    <div class="feedback">
     <div class="feeedback-container">
    <div class="text-header">  
        <h1>GIVE YOUR FEEDBACK</h1>
        <p><?php echo $instructorName; ?></p>
    </div>
            <div class="instructions">
                <b> Instructions:</b> 
                <p> On a scale of 1 to 4 stars, honestly rate the instructor's performance based on your experience.</p>
            </div>
            <div class="questions-container">
                <div class="table">
                    <p id="No">No.</p>
                    <p id="Questions">Questions</p>
                    <p id="Rating">Rating</p>
                </div>

              
                <form id="ratingForm" action="studentSaveRating.php" method="post">      
                <input type="hidden" name="instructorId" value="<?php echo $instructorId; ?>">
                <input type="hidden" name="studentID" value="<?php echo $_SESSION['studentID']; ?>">
                <input type="hidden" name="sectionId" value="<?php echo $_SESSION['sectionId']; ?>">
                <input type="hidden" name="token" value="<?php echo $token; ?>">


                <div class="question1">
                        <div class="questionrow1">
                            <h5>1</h5>
                            <p>How approachable is the instructor when you need clarification?</p>
                            <div class="form-position1"> 
                                <div class="rating">
                                    <span class="star" data-value="1">&#9733;</span>
                                    <span class="star" data-value="2">&#9733;</span>
                                    <span class="star" data-value="3">&#9733;</span>
                                    <span class="star" data-value="4">&#9733;</span>
                                    <input type="hidden" name="rating1" id="rating1" value="" required>
                                </div>
                            </div>
                        </div> 
                    </div>                  
                    <hr>
                    <div class="question2">
                        <div class="questionrow2">
                            <h5>2</h5>
                            <p>How effectively does the instructor use examples to explain complex topics?</p>
                            <div class="form-position2"> 
                                <div class="rating">
                                    <span class="star" data-value="1">&#9733;</span>
                                    <span class="star" data-value="2">&#9733;</span>
                                    <span class="star" data-value="3">&#9733;</span>
                                    <span class="star" data-value="4">&#9733;</span>
                                    <input type="hidden" name="rating2" id="rating2" value="" required>
                                </div>
                            </div>
                        </div> 
                    </div>
                    <hr>
                    <div class="question3">
                        <div class="questionrow3">
                            <h5>3</h5>
                            <p>How knowledgeable is the instructor about the subject?</p>
                            <div class="form-position3"> 
                                <div class="rating">
                                    <span class="star" data-value="1">&#9733;</span>
                                    <span class="star" data-value="2">&#9733;</span>
                                    <span class="star" data-value="3">&#9733;</span>
                                    <span class="star" data-value="4">&#9733;</span>
                                    <input type="hidden" name="rating3" id="rating3" value="" required>
                                </div>
                            </div>
                        </div> 
                    </div>
                    <hr>
                    <div class="question4">
                        <div class="questionrow4">
                            <h5>4</h5>
                            <p>How respectful is the teacher toward students?</p>
                            <div class="form-position4"> 
                                <div class="rating">
                                    <span class="star" data-value="1">&#9733;</span>
                                    <span class="star" data-value="2">&#9733;</span>
                                    <span class="star" data-value="3">&#9733;</span>
                                    <span class="star" data-value="4">&#9733;</span>
                                    <input type="hidden" name="rating4" id="rating4" value="" required>
                                </div>
                            </div>
                        </div> 
                    </div>
                    <hr>
                    <div class="question5">
                        <div class="questionrow5">
                            <h5>5</h5>
                            <p>How clearly does the teacher communicate grading criteria?</p>
                            <div class="form-position5"> 
                                <div class="rating">
                                    <span class="star" data-value="1">&#9733;</span>
                                    <span class="star" data-value="2">&#9733;</span>
                                    <span class="star" data-value="3">&#9733;</span>
                                    <span class="star" data-value="4">&#9733;</span>
                                    <input type="hidden" name="rating5" id="rating5" value="" required>
                                </div>
                            </div>
                        </div> 
                    </div>
                    <hr>
                    <div class="question6">
                        <div class="questionrow6">
                            <h5>6</h5>
                            <p>How well does the teacher foster a positive classroom environment?</p>
                            <div class="form-position6"> 
                                <div class="rating">
                                    <span class="star" data-value="1">&#9733;</span>
                                    <span class="star" data-value="2">&#9733;</span>
                                    <span class="star" data-value="3">&#9733;</span>
                                    <span class="star" data-value="4">&#9733;</span>
                                    <input type="hidden" name="rating6" id="rating6" value="" required>
                                </div>
                            </div>
                        </div> 
                    </div>
                    <hr>
                    <div class="question7">
                        <div class="questionrow7">
                            <h5>7</h5>
                            <p>How effective is the instructor at applying real-world examples?</p>
                            <div class="form-position7"> 
                                <div class="rating">
                                    <span class="star" data-value="1">&#9733;</span>
                                    <span class="star" data-value="2">&#9733;</span>
                                    <span class="star" data-value="3">&#9733;</span>
                                    <span class="star" data-value="4">&#9733;</span>
                                    <input type="hidden" name="rating7" id="rating7" value="" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="question8">
                        <div class="questionrow8">
                            <h5>8</h5>
                            <p>How well does the teacher provide a balanced workload for students?</p>
                            <div class="form-position8"> 
                                <div class="rating">
                                    <span class="star" data-value="1">&#9733;</span>
                                    <span class="star" data-value="2">&#9733;</span>
                                    <span class="star" data-value="3">&#9733;</span>
                                    <span class="star" data-value="4">&#9733;</span>
                                    <input type="hidden" name="rating8" id="rating8" value="">
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="question9">
                        <div class="questionrow9">
                            <h5>9</h5>
                            <p>How fair and unbiased is the instructor in grading?</p>
                            <div class="form-position9"> 
                                <div class="rating">
                                    <span class="star" data-value="1">&#9733;</span>
                                    <span class="star" data-value="2">&#9733;</span>
                                    <span class="star" data-value="3">&#9733;</span>
                                    <span class="star" data-value="4">&#9733;</span>
                                    <input type="hidden" name="rating9" id="rating9" value="">
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="question10">
                        <div class="questionrow10">
                            <h5>10</h5>
                            <p>How well does the instructor set reasonable deadlines?</p>
                            <div class="form-position10"> 
                                <div class="rating">
                                    <span class="star" data-value="1">&#9733;</span>
                                    <span class="star" data-value="2">&#9733;</span>
                                    <span class="star" data-value="3">&#9733;</span>
                                    <span class="star" data-value="4">&#9733;</span>
                                    <input type="hidden" name="rating10" id="rating10" value="">
                                </div>
                            </div>
                        </div>
                    </div>
                     
                    <div class="freeform">
                        <div class="freeform-label"> 
                            <label for="freeText">What are your overall comments for your instructor?</label><br>
                            <textarea id="freeComment" name="freeComment" rows="10" cols="50" placeholder="Type your message here..."></textarea>
                        </div>
                    </div>         
                    <div>
                    <button class="submit-button text-white focus-none" type="submit" name="submit-button">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

  <style>
    .star {
      cursor: pointer;
      color: #ccc;
    }
    .star.active {
      color: #ffd700;
    }
  </style>
    <script src="assets/scripts/Sidebar.js"></script>
    <script src="assets/scripts/Feedback.js"></script>
</body>
</html>
