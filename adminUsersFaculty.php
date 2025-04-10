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
    <title>iFeedback Admin | Users</title>
    <link rel="icon" type="image/png" href="assets/svg/Icon Only.svg">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" type="text/css" href="assets/styles/Sidebar.css">
    <link rel="stylesheet" type="text/css" href="assets/styles/adminUsers.css">
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
        <div class="containerLogo">
            <img src="assets/svg/Icon with Name.svg" class="containerLogo1" alt="" width="15%" height="15%">
                <div class="containerMain">
                    <nav class="containerUsers">
                        <div class="usersText">
                            <p>USER MANAGEMENT</p>
                        </div>
                    </nav>

                    <div class="filters">
                        <div class="grade-btns">
                            <div class="btn1">
                                <p onclick="window.location.href='adminUsersG11.php'">G11</p>
                            </div>
                            <div class="btn2" >
                                <p onclick="window.location.href='adminUsersG12.php'">G12</p>
                            </div>
                            <div class="btn3 active-btn" >
                                <p onclick="window.location.href='adminUsersFaculty.php'">FACULTY</p>
                            </div>
                        </div>

                        <div class="addUserBtn">
                            <p>ADD USER</p>
                        </div>

                        <div class="numberOfSelected">
                            <p>0 selected</p>
                        </div>

                        <div class="searchBar">
                            <div class="search-container">
                                <i class="bi bi-search"></i>
                                <input type="text" placeholder="Search" name="search">
                            </div>
                        </div>
                    </div>

                    <table class="userTable">
                        <thead>
                            <tr>
                                <th>
                                    <label class="thCheckbox">
                                        <input type="checkbox">
                                        <span class="checkmark"></span>
                                    </label>
                                </th>
                                
                                <th>Name</th>
                                <th>Department</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Status</th>
                                <th>Edit</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="tableRow1">
                                <td>
                                    <label class="td1Checkbox">
                                        <input type="checkbox">
                                        <span class="checkmark"></span>
                                    </label>
                                </td>

                                <td>
                                    <img src="assets/svg/Student Avatar.svg">
                                    Juan Dela Cruz
                                </td>
                                <td>Mathematics</td>
                                <td>juandelacruz@marikina.sti.edu.ph</td>
                                <td>0912345678</td>
                                <td>Part Time</td>
                                <td>
                                    <span class="icon"><i class="bi bi-pencil-square"></i></span>
                                    <span class="icon"><i class="bi bi-trash3"></i></span>
                                </td>
                            </tr>

                            <tr class="tableRow2">
                                <td>
                                    <label class="td2Checkbox">
                                        <input type="checkbox">
                                        <span class="checkmark"></span>
                                    </label>
                                </td>

                                <td>
                                    <img src="assets/svg/Student Avatar.svg">
                                    Juan Dela Cruz
                                </td>
                                <td>Filipino</td>
                                <td>juandelacruz@marikina.sti.edu.ph</td>
                                <td>0912345678</td>
                                <td>Full Time</td>
                                <td>
                                    <span class="icon"><i class="bi bi-pencil-square"></i></span>
                                    <span class="icon"><i class="bi bi-trash3"></i></span>
                                </td>
                            </tr>

                            <tr class="tableRow3">
                                <td>
                                    <label class="td3Checkbox">
                                        <input type="checkbox">
                                        <span class="checkmark"></span>
                                    </label>
                                </td>

                                <td>
                                    <img src="assets/svg/Student Avatar.svg">
                                    Juan Dela Cruz
                                </td>
                                <td>Social Science</td>
                                <td>juandelacruz@marikina.sti.edu.ph</td>
                                <td>0912345678</td>
                                <td>Full Time</td>
                                <td>
                                    <span class="icon"><i class="bi bi-pencil-square"></i></span>
                                    <span class="icon"><i class="bi bi-trash3"></i></span>
                                </td>
                            </tr>

                            <tr class="tableRow4">
                                <td>
                                    <label class="td4Checkbox">
                                        <input type="checkbox">
                                        <span class="checkmark"></span>
                                    </label>
                                </td>

                                <td>
                                    <img src="assets/svg/Student Avatar.svg">
                                    Juan Dela Cruz
                                </td>
                                <td>English</td>
                                <td>juandelacruz@marikina.sti.edu.ph</td>
                                <td>0912345678</td>
                                <td>Full Time</td>
                                <td>
                                    <span class="icon"><i class="bi bi-pencil-square"></i></span>
                                    <span class="icon"><i class="bi bi-trash3"></i></span>
                                </td>
                            </tr>

                            <tr class="tableRow5">
                                <td>
                                    <label class="td5Checkbox">
                                        <input type="checkbox">
                                        <span class="checkmark"></span>
                                    </label>
                                </td>

                                <td>
                                    <img src="assets/svg/Student Avatar.svg">
                                    Juan Dela Cruz
                                </td>
                                <td>Mathematics</td>
                                <td>juandelacruz@marikina.sti.edu.ph</td>
                                <td>0912345678</td>
                                <td>Part Time</td>
                                <td>
                                    <span class="icon"><i class="bi bi-pencil-square"></i></span>
                                    <span class="icon"><i class="bi bi-trash3"></i></span>
                                </td>
                            </tr>

                            <tr class="tableRow6">
                                <td>
                                    <label class="td6Checkbox">
                                        <input type="checkbox">
                                        <span class="checkmark"></span>
                                    </label>
                                </td>

                                <td>
                                    <img src="assets/svg/Student Avatar.svg">
                                    Juan Dela Cruz
                                </td>
                                <td>Information Technology</td>
                                <td>juandelacruz@marikina.sti.edu.ph</td>
                                <td>0912345678</td>
                                <td>Full Time</td>
                                <td>
                                    <span class="icon"><i class="bi bi-pencil-square"></i></span>
                                    <span class="icon"><i class="bi bi-trash3"></i></span>
                                </td>
                            </tr>

                            <tr class="tableRow7">
                                <td>
                                    <label class="td7Checkbox">
                                        <input type="checkbox">
                                        <span class="checkmark"></span>
                                    </label>
                                </td>

                                <td>
                                    <img src="assets/svg/Student Avatar.svg">
                                    Juan Dela Cruz
                                </td>
                                <td>Physical Education</td>
                                <td>juandelacruz@marikina.sti.edu.ph</td>
                                <td>0912345678</td>
                                <td>Full Time</td>
                                <td class="tdEdit">
                                    <span class="icon"><i class="bi bi-pencil-square"></i></span>
                                    <span class="icon"><i class="bi bi-trash3"></i></span>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    
                    <div class="page-btns">
                        <div class="page-btn1">
                            <p><</p>
                        </div>
                        <div class="page-btn2 active-btn">
                            <p>1</p>
                        </div>
                        <div class="page-btn3">
                            <p>2</p>
                        </div>
                        <div class="page-btn4">
                            <p>3</p>
                        </div>
                        <div class="page-btn5">
                            <p>...</p>
                        </div>
                        <div class="page-btn6">
                            <p>></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    <script src="assets/scripts/Sidebar.js"></script>
    <script src="assets/scripts/adminUsers.js"></script>
</body>
</html>
