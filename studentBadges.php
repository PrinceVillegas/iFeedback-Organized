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
    <title>iFeedback | Badges</title>
    <link rel="icon" type="image/png" href="assets/svg/Icon Only.svg">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="assets/styles/Sidebar.css">
    <link rel="stylesheet" href="assets/styles/Badges.css">
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
            <img src="assets/svg/Icon with Name.svg" class="containerLogo1" alt="" width="15%" height="15%" id="containerLogo1">
                <div class="containerMain">
                    <nav class="containerBadges">
                        <div class="badgesText">
                            <p>BADGES</p>
                         </div>
                    </nav>          
                   <div id="badgesDescriptionEL">
                   <p id="badgesTextDescription">Here are the badges you've earned through your iFeedback journey!</p>
                        <div id="ELButtonContainer">
                            <button id="earnedButton" class="active">
                                <p>Earned</p>
                            </button>
                            <button id="lockedButton"  >
                                <p>Locked</p>
                            </button>
                        </div>
                   </div>  
                <div id="earnedBadgesContainer">
                    <div class="badgeRows">
                        <img src="assets/svg/Feedback Ninja Badge .svg" alt="">
                        <b>Ninja Badge</b>
                        <p>You have mastered feedback and deliver insights with speed!</p>
                    </div>                   
                <hr>
                    <div class="badgeRows">
                        <img src="assets/svg/Communicator Badge.svg" alt="">
                        <b>Communicator Badge</b>
                        <p>Your respectful, focused feedback is making a positive impact!</p>
                    </div>                   
                <hr>
                    <div class="badgeRows">
                        <img src="assets/svg/Feedback Wizard Badge.svg" alt="">
                        <b>Wizard Badge</b>
                        <p>Your magical understanding of evaluation has earned you this prestigious badge!</p>
                    </div>                      
                <hr>
                    <div class="badgeRows">
                        <img src="assets/svg/Feedback Ninja Badge .svg" alt="">
                        <b>Quarter 1 Challenge Badge</b>
                        <p>Earned for finishing the Mini Quiz Challenge for the 1st Quarter!</p>
                    </div>              
                </div>

        <!-- LOCKED BADGES -->
            <div id=lockedBadgesContainer>
                <div class="badgeRows">
                        <img src="assets/svg/2ndQrtBadge.svg" alt="">
                        <b>Quarter 2 Challenge Badge</b>
                        <p>Earned for finishing the Mini Quiz Challenge for the 2nd Quarter!</p>
                    </div>                   
                <hr>
                    <div class="badgeRows">
                        <img src="assets/svg/3rdQrtBadge.svg" alt="">
                        <b>Quarter 3 Challenge Badge</b>
                        <p>Earned for finishing the Mini Quiz Challenge for the 3rd Quarter!</p>
                    </div>                   
                <hr>
                    <div class="badgeRows">
                        <img src="assets/svg/4thQrtBadge.svg" alt="">
                        <b>Quarter 4 Challenge Badge</b>
                        <p>Earned for finishing the Mini Quiz Challenge for the 4th Quarter!</p>
                    </div>                               
                </div>
            </div>
        </div>
    <script src="assets/scripts/Sidebar.js"></script>
    <script src="assets/scripts/Badges.js"></script>
</body>
</html>