<?php
    session_start();
    include("connect.php");
    include("auth.php");

    $username = $_SESSION['username'];

    $query = "SELECT * FROM studentstbl WHERE username = '$username'";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    } else {
        echo "No data found";
    }

    if(isset($_SESSION['username'])){
        $username = $_SESSION['username'];
        $query=mysqli_query($conn, "SELECT studentstbl.* FROM `studentstbl` WHERE studentstbl.username='$username'");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>iFeedback | Feedback History</title>
    <link rel="icon" type="image/png" href="assets/svg/Icon Only.svg">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="assets/styles/Sidebar.css">
    <link rel="stylesheet" href="assets/styles/FeedbackHistory.css">
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
                    <p id="studentSection"><?php echo $row['section']; ?></p>
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
                    <div class="feedbackText">
                        <p>FEEDBACK HISTORY</p>
                    </div>
                </nav>
                    <div id="labels">
                        <p id=date>Date</p>
                        <p id=rating>Rating</p>
                        <p id=instructor>Instructors</p>
                        <p id=responses>Responses</p>
                    </div>
                <div id="feedbackContent">
                    <div class="contentRows" id="row1">
                        <p id=feedbackHistoryDate>12-08-24</p>
                            <form id="resultsform1" class="resultsform">
                                <span class="star" data-value="1">&#9733;</span>
                                <span class="star" data-value="2">&#9733;</span>
                                <span class="star" data-value="3">&#9733;</span>
                                <span class="star" data-value="4">&#9733;</span>
                                <input type="hidden" name="rating4" id="rating4" value="">
                            </form>
                        <p id="feedbackHistoryInstructors">Instructor</p>
                        <p id="feedbackHistoryResponses1" class="feedbackHistoryResponses">The lectures were engaging and easy to follow, and the assignments were challenging but rewarding.</p>
                    </div>
                <hr>
                    <div class="contentRows" id="row2">
                        <p id=feedbackHistoryDate>12-08-24</p>
                            <form id="resultsform1" class="resultsform">
                                <span class="star" data-value="1">&#9733;</span>
                                <span class="star" data-value="2">&#9733;</span>
                                <span class="star1" data-value="3">&#9733;</span>
                                <span class="star1" data-value="4">&#9733;</span>
                                <input type="hidden" name="rating4" id="rating4" value="">
                            </form>
                        <p id="feedbackHistoryInstructors">Instructor</p>
                        <p id="feedbackHistoryResponses2" class="feedbackHistoryResponses">The course materials were slightly organized, but the readings were dense and time-consuming.</p>
                    </div>
                <hr>
                    <div class="contentRows" id="row3">
                        <p id=feedbackHistoryDate>12-08-24</p>
                            <form id="resultsform1" class="resultsform">
                                <span class="star" data-value="1">&#9733;</span>
                                <span class="star" data-value="2">&#9733;</span>
                                <span class="star" data-value="3">&#9733;</span>
                                <span class="star1" data-value="4">&#9733;</span>
                                <input type="hidden" name="rating4" id="rating4" value="">
                            </form>
                        <p id="feedbackHistoryInstructors">Instructor</p>
                        <p id="feedbackHistoryResponses3" class="feedbackHistoryResponses">I would recommend Sir Instructor to students who are self-motivated</p>
                    </div>
                <hr>
                    <div class="contentRows" id="row4">
                        <p id=feedbackHistoryDate>12-08-24</p>
                            <form id="resultsform1" class="resultsform">
                                <span class="star" data-value="1">&#9733;</span>
                                <span class="star" data-value="2">&#9733;</span>
                                <span class="star" data-value="3">&#9733;</span>
                                <span class="star" data-value="4">&#9733;</span>
                                <input type="hidden" name="rating4" id="rating4" value="">
                            </form>
                        <p id="feedbackHistoryInstructors">Instructor</p>
                        <p id="feedbackHistoryResponses4" class="feedbackHistoryResponses">The course material was interesting, but the textbook was outdated.</p>
                    </div>
                <hr>
                    <div class="contentRows" id="row5">
                        <p id=feedbackHistoryDate>12-08-24</p>
                            <form id="resultsform1" class="resultsform">
                                <span class="star" data-value="1">&#9733;</span>
                                <span class="star" data-value="2">&#9733;</span>
                                <span class="star" data-value="3">&#9733;</span>
                                <span class="star" data-value="4">&#9733;</span>
                                <input type="hidden" name="rating4" id="rating4" value="">
                            </form>
                        <p id="feedbackHistoryInstructors">Instructor</p>
                        <p id="feedbackHistoryResponses5" class="feedbackHistoryResponses">I am grateful for the opportunity to learn from such a knowledgeable and passionate instructor.</p>
                    </div>
                <hr>
                    <div class="contentRows" id="row6">
                        <p id=feedbackHistoryDate>12-08-24</p>
                            <form id="resultsform1" class="resultsform">
                                <span class="star" data-value="1">&#9733;</span>
                                <span class="star" data-value="2">&#9733;</span>
                                <span class="star1" data-value="3">&#9733;</span>
                                <span class="star1" data-value="4">&#9733;</span>
                                <input type="hidden" name="rating4" id="rating4" value="">
                            </form>
                        <p id="feedbackHistoryInstructors">Instructor</p>
                        <p id="feedbackHistoryResponses6" class="feedbackHistoryResponses">The workload in Instructor is manageable, but the assignments are not very challenging.</p>
                    </div>
                </div>
            </div>
         </div>
    <script src="assets/scripts/Sidebar.js"></script>

</body>
</html>