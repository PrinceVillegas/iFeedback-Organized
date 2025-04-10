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
    <title>iFeedback | Admin | Support</title>
    <link rel="icon" type="image/png" href="assets/svg/Icon Only.svg">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" type="text/css" href="assets/styles/Sidebar.css">
    <link rel="stylesheet" type="text/css" href="assets/styles/Dashboard.css">
    <link rel="stylesheet" type="text/css" href="assets/styles/DashboardFooter.css">
    <link rel="stylesheet" type="text/css" href="assets/styles/FeedbackSupport.css">
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
        <div class="logo">
            <img src="assets/svg/Icon with Name.svg" alt="iFeedback Logo">
          </div>
        <div class="header">
            <p>SUPPORT</p>
        </div>
        <div class="container">
            <div class="tabsheader">
               <div class="tabs">
                 <div class="tab active">Unresolved</div>
                 <div class="tab">In Progress</div>
                 <div class="tab">Resolved</div>
               </div>
                <div class="searchBarActLog">
                    <img src="assets/svg/Search Icon.svg" class="search-icon">
                    <input type="text" class="search-input" placeholder="Search..." style="border: none; width: 178px;">
                </div>
            </div>
            <div style="max-height: 600px; overflow-y: auto;">
              <table>
                <tr>
                  <td class="checkbox-container"><input type="checkbox"> 
                  <td><button class="dropdown-button" onclick="toggleDropdown(event)">▼</button></td>
                  <th>Email</th>
                  <th>Message</th>
                  <th>Query ID</th>
                  <th>Date</th>
                </tr>
                <tr>
                  <td class="checkbox-container"><input type="checkbox"> 
                  <td><button class="dropdown-button" onclick="toggleDropdown(event)">▼</button></td>
                  <td>juandelacruz@gmail.com</td>
                  <td>I am requesting a password reset. I would like to initiate the process of changing my current password to a new one. This is necessary because i have forgotten my existing password or believe it may have been compromised.</td>
                  <td>#123AB</td>
                  <td>Jan 6</td>
                </tr>
                <tr>
                  <td class="checkbox-container"><input type="checkbox"> 
                  <td><button class="dropdown-button" onclick="toggleDropdown(event)">▼</button></td>
                  <td>juandelacruz@gmail.com</td>
                  <td>What steps are involved in changing my registe ...</td>
                  <td>#124CD</td>
                  <td>Jan 7</td>
                </tr>
                <tr>
                  <td class="checkbox-container"><input type="checkbox"> 
                  <td><button class="dropdown-button" onclick="toggleDropdown(event)">▼</button></td>
                  <td>juandelacruz@gmail.com</td>
                  <td>Can i update my contact number associated w...</td>
                  <td>#125EF</td>
                  <td>Jan 8</td>
                </tr>
                <tr>
                  <td class="checkbox-container"><input type="checkbox"> 
                  <td><button class="dropdown-button" onclick="toggleDropdown(event)">▼</button></td>
                  <td>juandelacruz@gmail.com</td>
                  <td>I'm having trouble resetting my password. W...</td>
                  <td>#126GH</td>
                  <td>Jan 9</td>
                </tr>
                <tr>
                  <td class="checkbox-container"><input type="checkbox"> 
                  <td><button class="dropdown-button" onclick="toggleDropdown(event)">▼</button></td>
                  <td>juandelacruz@gmail.com</td>
                  <td>Is it possible to change my email and contact...</td>
                  <td>#127IJ</td>
                  <td>Jan 10</td>
                </tr>
                <tr>
                  <td class="checkbox-container"><input type="checkbox"> 
                  <td><button class="dropdown-button" onclick="toggleDropdown(event)">▼</button></td>
                  <td>juandelacruz@gmail.com</td>
                  <td>Is it possible to change my email and contact...</td>
                  <td>#127IJ</td>
                  <td>Jan 10</td>
                </tr>
                <tr>
                  <td class="checkbox-container"><input type="checkbox"> 
                  <td><button class="dropdown-button" onclick="toggleDropdown(event)">▼</button></td>
                  <td>juandelacruz@gmail.com</td>
                  <td>Is it possible to change my email and contact...</td>
                  <td>#127IJ</td>
                  <td>Jan 10</td>
                </tr>
              </table>
            </div>
            <div class="dropdown" id="dropdown-menu">
                <button onclick="toggleMessage('msg1')" >View</button>
                <button onclick="openReplyModal()">Reply</button>
                <button onclick="toggleEscalateMenu(event)">Escalate</button>
            </div>
        </div>
        
        <div class="modal" id="reply-modal">
            <div class="modal-header">Reply</div>
            <div class="modal-content">
                <p><strong>To:</strong> juandelacruz@gmail.com</p>
                <p><strong>Subject:</strong> Password Reset Request Received</p>
                <p>Dear Student,</p>
                <p>Thank you for your request to reset your password. We have recieved your request and are currently processing it. Please allow 24-48 hours for us to verify your identity and complete the passwrod reset process. You will receive a separate email with further instructions on how to create a new password. In the meantime, please do not attempt to log in to your account.</p>
                <p>Sincerely,</p>
                <p>iFeedback Support System</p>
                <button onclick="closeReplyModal()">Send</button>
            </div>

        </div>
        
                <div class="escalate-menu" id="escalate-menu">
            <label><input type="checkbox"> Marked as In Progress</label>
            <br>
            <label><input type="checkbox"> Marked as Resolved</label>
        </div> 
    </div>


    <script src="assets/scripts/Dashboard.js"></script>
    <script src="assets/scripts/Support.js"></script>
    <script src="assets/scripts/Sidebar.js"></script>
    <script src="assets/scripts/Footer.js"></script>
</body>
</html>
