<?php
    session_start();
    include("connect.php");

    $instructor_username = $_SESSION['instructor_username'];

    $query = "SELECT * FROM Instructorstbl WHERE instructor_username = '$instructor_username'";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        $instructor_row = $result->fetch_assoc();
        $instructor_username = $instructor_row['instructor_username'];
        $instructor_department = $instructor_row['department'];
    } else {
        echo "No data found";
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>iFeedback | Feedbacks</title>
    <link rel="icon" type="image/png" href="assets/svg/Icon Only.svg" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" />
    <link rel="stylesheet" type="text/css" href="assets/styles/Sidebar.css" />
    <link rel="stylesheet" href="assets/styles/instructorFeedback.css" />
</head>

<body>
    <!-- SIDEBAR -->
    <div class="sidebar d-flex flex-column align-items-center justify-content-between" id="sidebar">
        <ul class="align-items-start" id="menu">
            <div class="d-block justify-content-center" id="avatar-container">
                <div id="avatar">
                    <img src="assets/svg/Student Avatar.svg" alt="" />
                </div>
                <div class="d-inline justify-content-center text-center" id="studentInfo">
                    <p id="IName"><?php echo $instructor_username; ?></p>
                    <p id="instructorDepartment"><?php echo $instructor_department; ?></p>
                </div>
                <div class="justify-content-center">
                    <hr class="hidden-hr" />
                </div>
            </div>
            <div id="sidebarIconContainer">
                <li>
                    <a class="text-decoration-none align-items-center" href="dashboardInstructor.php">
                        <span class="icon"><i class="bi bi-grid"></i></span>
                        <span class="textIcon">Dashboard</span>
                    </a>
                </li>
                <li class="active">
                    <a class="text-decoration-none align-items-center" href="">
                        <span class="icon align-middle"><i class="bi bi-pencil-square"></i></span>
                        <span class="textIcon align-middle">Feedback</span>
                    </a>
                </li>
                <li>    
                    <a class="text-decoration-none align-items-center" href="logout.php">
                        <span class="icon"><i class="bi bi-box-arrow-right"></i></span>
                        <span class="textIcon">Logout</span>
                    </a>
                </li>
            </div>
        </ul>
    </div>

    <div class="main-content">
        <div class="main-container">
            <!-- logo -->
            <div class="logo">
                <img src="assets/svg/Icon with Name.svg" alt="ifeedback logo" />
            </div>

            <!-- feedbacks container -->
            <div class="feedbacks-container">
                <!-- feedback header -->
                <header>
                    <h1>feedbacks</h1>
                </header>

                <!-- filters -->
                <div class="filters">
                    <!-- dropdown filter -->
                    <div class="dropdown" id="dropdown">
                        <button class="btn-custom dropdown-toggle" type="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            <span class="sort">Sort by</span>
                        </button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Date</a></li>
                            <li><a class="dropdown-item" href="#">Rating</a></li>
                        </ul>
                    </div>

                    <!-- grade-year filter -->
                    <div class="grade-btns">
                        <div class="btn1 active-btn">
                            <p>G11</p>
                        </div>
                        <div class="btn2">
                            <p>G12</p>
                        </div>
                    </div>
                </div>

                <!-- cards -->
                <div class="cards-container">
                    <div class="card" id="card" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        <div class=" card-content">
                            <!-- date and time -->
                            <div class="date-time">
                                <div class="date">1/05/2025</div>
                                <div class="time">12:20 PM</div>
                            </div>

                            <!-- card header -->
                            <div class="cards-header">
                                <img src="assets/svg/Student Avatar.svg" alt="student icon" />

                                <ul class="rating" data-rating="3">
                                    <li><i class="bi bi-star-fill"></i></li>
                                    <li><i class="bi bi-star-fill"></i></li>
                                    <li><i class="bi bi-star-fill"></i></li>
                                    <li><i class="bi bi-star-fill"></i></li>
                                </ul>
                            </div>

                            <!-- card-text -->
                            <div class="card-text">
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed
                                    do eiusmod tempor incididunt ut labore et dolore magna
                                    aliqua.
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-custom-head">
                                    <!-- date and time -->
                                    <div class="date-time">
                                        <div class="date">1/05/2025</div>
                                        <div class="time">12:20 PM</div>
                                    </div>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <!-- card header -->
                                    <div class="cards-header">
                                        <img src="assets/svg/Student Avatar.svg" alt="student icon" />

                                        <ul class="rating" data-rating="3">
                                            <li><i class="bi bi-star-fill"></i></li>
                                            <li><i class="bi bi-star-fill"></i></li>
                                            <li><i class="bi bi-star-fill"></i></li>
                                            <li><i class="bi bi-star-fill"></i></li>
                                        </ul>
                                    </div>

                                    <!-- card-text -->
                                    <div class="card-text">
                                        <p>
                                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed
                                            do eiusmod tempor incididunt ut labore et dolore magna
                                            aliqua. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed
                                            do eiusmod tempor incididunt ut labore et dolore magna
                                            aliqua.
                                        </p>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>

    <!-- sidebar script -->
    <script src="assets/scripts/Sidebar.js"></script>

    <!-- boostrap js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>

    <!-- instructor feedback script -->
    <script src="assets/scripts/instructorFeedbacks.js"></script>
</body>

</html>