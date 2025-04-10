<?php
    session_start();
    include("connect.php");

    $current_admin_username = $_SESSION['admin_username'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>iFeedback</title>
    <link rel="icon" type="image/png" href="assets/svg/Icon Only.svg">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" type="text/css" href="assets/styles/Sidebar.css">
    <link rel="stylesheet" type="text/css" href="assets/styles/ActivityLog.css">
</head>
<body>
    <!-- SIDEBAR -->
     <!-- SIDEBAR -->
     <div class="sidebar d-flex flex-column align-items-center justify-content-between" id="sidebar">
        <ul class="align-items-start" id="menu">
            <div class="d-block justify-content-center" id="avatar-container">
                <div id="avatar">
                    <img src="assets/svg/Student Avatar.svg" alt="">
                </div>
                <div class="d-inline justify-content-center text-center" id="studentInfo">
                <p id="adminUsername"><?php echo $current_admin_username; ?></p>
                </div>
                <div class="justify-content-center">
                    <hr class="hidden-hr">
                </div>
            </div>
            <div id="sidebarIconContainer">
                <li class="active">
                    <a class="text-decoration-none align-items-center" href="adminDashboard.php">
                        <span class="icon"><i class="bi bi-grid"></i></span>
                        <span class="textIcon">Dashboard</span>
                    </a>
                </li>
                <li>
                    <a class="text-decoration-none align-items-center" href="adminUsersFaculty.php">
                        <span class="icon align-middle"><i class="bi bi-people"></i></span>
                        <span class="textIcon align-middle">Users</span>
                    </a>
                </li>
                <li>
                    <a class="text-decoration-none align-items-center" href="">
                        <span class="icon"><i class="bi bi-pencil-square"></i></span>
                        <span class="textIcon">Feedbacks</span>
                    </a>
                </li>
                <li>
                    <a class="text-decoration-none align-items-center align-middle" href="AdminEvaluationPeriod.php">
                        <span class="icon"><i class="bi bi-file-text"></i></span>
                        <span class="textIcon">Eval.Period</span>
                    </a>
                </li>
                <li>
                    <a class="text-decoration-none align-items-center align-middle" href="">
                        <span class="icon"><i class="bi bi-megaphone"></i></i></span>
                        <span class="textIcon">Announcement</span>
                    </a>
                </li>
                <li>
                    <a class="text-decoration-none align-items-center align-middle" href="adminActivityLog.php">
                        <span class="icon"><i class="bi bi-arrow-clockwise"></i></span>
                        <span class="textIcon">Activity Log</span>
                    </a>
                </li>
                <li>
                    <a class="text-decoration-none align-items-center align-middle" href="adminSupport.php">
                        <span class="icon"><i class="bi bi-telephone"></i></span>
                        <span class="textIcon">Support</span>
                    </a>
                </li>
                <li>
                    <a class="text-decoration-none align-items-center" href="adminLogout.php">
                        <span class="icon"><i class="bi bi-box-arrow-right"></i></span>
                        <span class="textIcon">Log Out</span>
                    </a>
                </li>
            </div>
        </ul>
    </div>
            <!--Activity Log-->
    <div class="main-content">
        <img src="assets/svg/Icon with Name.svg" class="logo">
        <div class="main-contentbody">
            <div class="main-contenttitle">
                <p id="titleActivityLog">Activity Log</p>
            </div>   
                <div id="activityLogContentContainer">
                    <div id="labelnSearchbar">
                        <div class="labelborder">
                            <p id="">DATE RANGE</p>
                        </div>
                        <div class="labelborder">
                            <p id="">USER TYPE</p>
                       </div>
                        <div class="labelborder">
                            <p id="">ACTIVITY TYPE</p>
                        </div>
                        <div class="searchBarActLog">
                            <img src="assets/svg/Search Icon.svg" class="search-icon">
                            <input type="text" class="search-input" placeholder="Search..." style="border: none;">
                        </div>
                        </div>
                            <div class="timeline-container">
                            <p class="dateContent">January 20, 2025 - Today</p>
                            <div class="ActivityLogRow">
                                <div class="update-container1">
                                <img src="assets/svg/Student Avatar.svg" class="student-timelineicon">
                                <div class="instructorsInfo">
                                <p class="containerName">Juan Dela Cruz</p>
                                <p class="containerInfo">Grade 11 student</p>
                                </div>
                                <p class="containerAction">Completed the mini-quiz for the 1st Quarter.</p>
                                </div>
                                <div class="timenImageposition">
                                <p class="timeLine1">2:49 PM</p>
                                <img src="assets/svg/Timeline Icon (Completed).svg" class="timelineImageContainer">
                                </div>
                            </div>
                            
                            <div class="ActivityLogRow">
                                <div class="vertical-line2"></div>
                                <div class="update-container2">
                                <img src="assets/svg/Student Avatar.svg" class="student-timelineicon">
                                <div class="instructorsInfo">
                                <p class="containerName">Juan Dela Cruz</p>
                                <p class="containerInfo">Grade 11 student</p>
                                </div>
                                <p class="containerAction">Submitted their feedback.</p>
                                </div>
                                <div class="timenImageposition">
                                <p class="timeLine2">1:17 PM</p>
                                <img src="assets/svg/Timeline Icon (Submitted).svg" class="timelineImageContainer">
                                </div>
                            </div>
                            <div class="ActivityLogRow">
                                <div class="update-container3">
                                <img src="assets/svg/Instructor Avatar.svg" class="instructor-timelineicon">
                                <div class="instructorsInfo">
                                <p class="containerName">Juan Dela Cruz</p>
                                <p class="containerInfo">Instructor</p>
                                </div>
                                <p class="containerAction">Logged Out</p>
                                </div>
                                <div class="timenImageposition">
                                <p class="timeLine3">10:09 AM</p>
                                <img src="assets/svg/Timeline Icon (Logged Out).svg" class="timelineImageContainer">
                                </div>
                            </div>
                            <div class="ActivityLogRow">
                                <div class="update-container4">
                                <img src="assets/svg/Student Avatar.svg" class="instructor-timelineicon">
                                <div class="instructorsInfo">
                                <p class="containerName">Juan Dela Cruz</p>
                                <p class="containerInfo">Grade 11 student</p>
                                </div>
                                <p class="containerAction">Earned Quarter 1 Challenge Badge.</p>
                                </div>
                                <div class="timenImageposition">
                                <p class="timeLine4">9:04 AM</p>
                                <img src="assets/svg/Timeline Icon (Earned Badge).svg" class="timelineImageContainer">
                                </div>
                            </div>
                            <div class="page-container">
                                <div class="line-seperator1"></div>
                                <div class="arrowhead">></div>
                                <div class="line-seperator2"></div>
                                <div class="line-seperator3"></div>
                                <div class="line-seperator4"></div>
                                <div class="arrowhead1"><</div>
                                <p class="page1">1</p>
                                <p class="page2">2</p>
                                <p class="page3">3</p>
                                <div class="page-highlight"></div>
                            </div>
                            </div>

            </div>

        </div>

    <script src="assets/scripts/Dashboard.js"></script>
    <script src="assets/scripts/Sidebar.js"></script>
    <script src="assets/scripts/Footer.js"></script>    
</body>
</html>
