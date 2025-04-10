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
    <title>iFeedback | EvaluationPeriod</title>
    <link rel="icon" type="image/png" href="assets/svg/Icon Only.svg">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" type="text/css" href="assets/styles/Sidebar.css">
    <link rel="stylesheet" type="text/css" href="assets/styles/EvaluationPeriod.css">
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

    <div class="main-content">

        <!--Evaluation Period-->
        <div class="logo">
            <img src="assets/svg/Icon with Name.svg" alt="iFeedback Logo">
          </div>
        <div class="feedback-containergg">
          <div class="feedback-container">
            <div class="header">
              <h1>Evaluation Period</h1>
            </div>

       <div id="calendarControlContainer">
         <!--Calendar Control-->
         <div class="calendarContainergg">
            <div class="calendarContainer">
                    <div class="calendar-title">
                        <span id="calendar-title"></span>
                        <div class="navigation">
                            <button id="prevMonth">◀</button>
                            <button id="nextMonth">▶</button>
                        </div>
                    </div>
                   <div>
                    <div class="calendar">
                        <div class="day-header">
                            <p id="sunday">Su</p>
                            <p class="day">Mo</p>
                            <p class="day">Tu</p>
                            <p class="day">We</p>
                            <p class="day">Th</p>
                            <p class="day">Fr</p>
                            <p class="day">Sa</p>
                        </div>
                        <div id="calendar-days"></div>
                </div>
                   </div>
        </div>
        </div>
        <div class="reminder-card">
            <h2>Reminder</h2>
            <div class="ReminderContent">
                <div class="reminderDate">
                    <strong>Date</strong>
                    <p>Jan. 3, 2025</p>
                    <p>Jan. 5, 2025</p>
                </div>
                <div class="reminderNote">
                    <strong>Note</strong>
                    <p>Start of Classes</p>
                    <p>Start of Evaluation</p>
                </div>
            </div>
            <button class="create-reminder">
                <i class="bi bi-plus-circle"></i>
                Create Reminder
            </button>
        </div>
         <div class="controls">
            <div id="headernButton">
                <h4>Controls</h4>
            <button class="exit-button">
            <i class="bi bi-x-circle" style="font-size: 24px;"></i>
            </div>
            </button>
            <div class="currentDateStatus">
                <label for="currentDate">Current Date:</label>
                <input type="text" id="currentDate" readonly>
            </div>
            <div class="currentDateStatus">
                <label for="status">Status:</label>
                <select id="status">
                    <option class="statusoptions"  value="ongoing">Ongoing</option>
                    <option class="statusoptions" value="completed">Completed</option>
                    <option class="statusoptions" value="upcoming">Upcoming</option>
                    <option class="statusoptions" value="completed">Completed</option>
                </select>
            </div>
            <div class="actions">
                <p>Actions</p>
                <div id="StartDate">
                    <label for="startDate">Start Date:</label>
                    <input type="date" class="startDate" id="startDate" value="2025-01-05" style="text-align: center">
                </div>
                <div id="EndDate">
                    <label for="endDate">End Date:</label>
                    <button id="setDate">SET DATE</button>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

    </div>
    <script src="assets/scripts/EvaluationPeriod.js"></script>
    <script src="assets/scripts/Dashboard.js"></script>
    <script src="assets/scripts/Sidebar.js"></script>
    <script src="assets/scripts/Footer.js"></script>
</body>
</html>
