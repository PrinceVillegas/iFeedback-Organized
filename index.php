<?php
session_start();
include("connect.php");
$query1 = "CREATE TABLE IF NOT EXISTS studentstbl (
    id INT PRIMARY KEY AUTO_INCREMENT,
    firstName VARCHAR(255),
    middleName VARCHAR(255),
    surname VARCHAR(255),
    sectionId INT,
    studentId VARCHAR(255),
    username VARCHAR(255),
    password VARCHAR(255),
    evalStatus INT DEFAULT 0 CHECK (evalStatus IN (0, 1)),
    FOREIGN KEY (sectionID) REFERENCES sectiontbls(sectionId)
)";
$conn->query($query1);

$query2 = "CREATE TABLE IF NOT EXISTS sectiontbls (
    sectionId INT AUTO_INCREMENT PRIMARY KEY,
    sectionName VARCHAR(100) NOT NULL UNIQUE,
    sectionDescription VARCHAR(500) DEFAULT 'No description provided'
)";


$conn->query($query2);

$insertQuery = "INSERT INTO sectiontbls (sectionName, sectionDescription) VALUES
('ABM101A', 'Accountancy, Business, Management'),
('ABM201A', 'Accountancy, Business, Management'),
('CULART101A', 'Culinary Arts'),
('CULART201A', 'Culinary Arts'),
('HUMSS201A', 'Humanities and Social Sciences'),
('ICTE101A', 'Information and Communications Technology'),
('ICTE102A', 'Information and Communications Technology'),
('ICTE201A', 'Information and Communications Technology'),
('ICTE202P', 'Information and Communications Technology Practical'),
('TOPE101A', 'Technology and Engineering Principles'),
('TOPE201A', 'Technology and Engineering Principles')";

$conn->query($insertQuery);

$query = "SELECT sectionId, sectionName FROM sectiontbls"; 
$result = $conn->query($query);


$usernameError = "";
$passwordError = "";

// Login handler
if (isset($_POST['login'])) {
    $username = trim($_POST['username']);
    $passwordInput = $_POST['password'];
    $password = md5($passwordInput); // Note: consider upgrading to password_hash later for better security

    $checkUser = $conn->prepare("SELECT * FROM studentstbl WHERE username = ?");
    $checkUser->bind_param("s", $username);
    $checkUser->execute();
    $result = $checkUser->get_result();

    if ($result->num_rows === 0) {
        $usernameError = "*Username does not exist";
    } else {
        $user = $result->fetch_assoc();
        if ($user['password'] !== $password) {
            $passwordError = "*Incorrect password";
        } else {
            $_SESSION['username'] = $user['username'];
            $_SESSION['role'] = 'student';
            header("Location: studentDashboard.php");
            exit();
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>iFeedback</title>
    <link rel="icon" type="image/png" href="assets/svg/Icon Only.svg">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="assets/styles/LandingPage.css">
    <link rel="stylesheet" type="text/css" href="assets/styles/Login.css">
    <link rel="stylesheet" type="text/css" href="assets/styles/SignUp.css">
    <link rel="stylesheet" type="text/css" href="assets/styles/Footer.css">
    <link rel="stylesheet" type="text/css" href="assets/styles/AboutUs.css">
    <link rel="stylesheet" type="text/css" href="assets/styles/FAQs.css">
    <link rel="stylesheet" type="text/css" href="assets/styles/ContactUs.css">
    <link rel="stylesheet" type="text/css" href="assets/styles/PrivacyPolicy.css">
    <link rel="stylesheet" type="text/css" href="assets/styles/TermsOfService.css">
    <link rel="stylesheet" type="text/css" href="assets/styles/Guidelines.css">
    <link rel="stylesheet" type="text/css" href="assets/styles/ContactUsThankYou.css">
</head>
<body>
    <nav class="navbar navbar-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img src="assets/svg/Icon with Name.svg" alt="" width="75%" height="75%" id="logo">
            </a>
            <div class="d-grid gap-2 d-md-flex justify-content-md-end" id="navbarButtons">
                <button class="btn btn-primary btn-lg col-6 me-md-3" id="loginButton" type="button" onclick="showLogin()">Login</button>
                <button class="btn btn-primary btn-lg col-7 me-md-5" id="signUpButton" type="button" onclick="showSignUp()">Sign Up</button>
            </div>
        </div>
    </nav>
    <dialog id="Login" class="Login">
    <div class="d-flex justify-content-end" id="btnCloseLogin">
        <button class="btnCloseLogin">&times;</button>
    </div>
    <h1>Log In</h1>
    <h5>Please enter your details</h5>
    <div class="containerLogin">
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" class="loginForm">
            <div class="loginUN">
                <div class="d-flex justify-content-between align-items-center">
                    <label for="username">USERNAME</label>
                    <span style="color:red;"><?php echo $usernameError; ?></span>
                </div>
                <input type="text" name="username" id="username" placeholder="Enter your username"
                    value="<?php echo isset($_POST['username']) ? htmlspecialchars($_POST['username']) : ''; ?>">
            </div>

            <div class="loginPW">
                <div class="d-flex justify-content-between align-items-center">
                    <label for="password">PASSWORD</label>
                    <span style="color:red;"><?php echo $passwordError; ?></span>
                </div>
                <input type="password" name="password" id="password" placeholder="Enter your password">
            </div>

            <div class="RMFG">
                <input type="checkbox" id="remember-me">
                <label for="remember-me">Remember Me</label>
                <a href="#">Forgot Password</a>
            </div>

            <div class="d-flex justify-content-center">
                <input type="submit" class="btn" value="LOGIN" name="login">
            </div>

            <div class="d-flex justify-content-center" id="DHAA">
                <p>Don't have an account?</p>
                <a class="loginToSignUp" onclick="loginToSignUp()">Sign Up</a>
            </div>
        </form>
    </div>
</dialog>



    <!-- Sign Up Pop-up -->
    <dialog id="SignUp" class="SignUp">
        <div class="d-flex justify-content-end" id="btnCloseSignUp">
            <button class="btnCloseSignUp">&times;</button>
        </div>
        <h1>Sign Up</h1>
        <h5>Please enter your details</h5>

       <div class="containerSignUp">
           <form action="studentRegister.php" method="post" class="signUpForm">
               <div class="signUpFN">
                   <label for="firstName">FIRST NAME</label>
                   <input type="text" name="firstName" id="firstName" placeholder="Enter your first name">
                   <span id="firstName-error" style="display: none;">*Please enter your first name</span>
               </div>
               <div class="signUpMN">
                   <label for="middleName">MIDDLE NAME</label>
                   <input type="text" name="middleName" id="middleName" placeholder="Enter your middle name(Optional)">
                   <span id="middleName-error" style="display: none;">*Please enter your middle name</span>
               </div>
               <div class="signUpSN">
                   <label for="surname">SURNAME</label>
                   <input type="text" name="surname" id="surname" placeholder="Enter your surname">
                   <span id="surname-error" style="display: none;">*Please enter your surname</span>
               </div>
               <div class="signUpSection">
                    <label for="section">SECTION</label>
                    <select id="section" name="section">
                        <option value="" selected disabled class="text-secondary">Select your section</option>
                        <?php
                        $query = "SELECT sectionId, sectionName FROM sectiontbls";
                        $result = $conn->query($query);
                        if ($result && $result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                echo '<option value="' . htmlspecialchars($row["sectionId"]) . '">' . htmlspecialchars($row["sectionName"]) . '</option>';
                            }
                        }
                        ?>
                    </select>
                    <input type="hidden" name="sectionID" id="sectionID" value="">
                    
                    <script>
                        document.getElementById("section").addEventListener("change", function() {
                            document.getElementById("sectionID").value = this.value;
                        });
                    </script>
                    <span id="section-error" class="gray-text" style="display: none;">*Please select your section</span>
                </div>
               <div class="signUpStudentID">
                   <label for="studentID">STUDENT ID</label>
                   <input type="text" name="studentID" id="studentID" placeholder="Enter your student ID">
                   <span id="studentID-error" style="display: none;">*Please enter your student ID</span>
               </div>
               <div class="signUpUsername">
                   <label for="usernameSU">USERNAME</label>
                   <input type="text" name="username" id="usernameSU" placeholder="Enter a valid username" pattern="[a-zA-Z0-9]+" title="Please input formal username">
                   <span id="username-error" style="display: none;">*Please enter a valid username</span>
               </div>
               <div class="signUpPassword">
                   <label for="passwordSU">PASSWORD</label>
                   <input type="password" name="password" id="passwordSU" placeholder="Enter a strong password (min 12 chars, 1 upper, 1 number)">
                   <span id="password-error" style="display: none;">*Please enter a password</span>
               </div>
               <div class="signUpConfirmPassword">
                   <label for="confirmPasswordSU">CONFIRM PASSWORD</label>
                   <input type="password" name="confirmPassword" id="confirmPasswordSU" placeholder="Re-enter your password">
                   <span id="confirmPassword-error" style="display: none;">*Please confirm your password</span>
               </div>
               <div class="d-flex justify-content-center">
                   <input type="submit" class="btn" value="SIGN UP" name="signUp">
               </div>
           </form>
       </div>

            <!-- Already have an account? -->
            <div class="d-flex justify-content-center" id="AHAA">
                <p>Already have an account?</p>
                <a class="signUpToLogin" onclick="signUpToLogin()">Log In</a>
            </div>
        </div>
    </dialog>

    <div class="container-fluid">
        <div class="row g-0" id="containerRow">
            <!-- Text -->
            <div class="col-6" id="containerColumn1">
                <div class="text">
                    <input id="ch" type="checkbox">
    
                    <p class="mainText">What is iFeedback?</p>
                    <p class="subText">iFeedback is a web-based evaluation system that empowers students to share their thoughts and 
                        feedback to their instructors’ teaching methods. By providing a platform for open communication, iFeedback 
                        fosters a more engaging and effective learning environment.</p>
                    <div class="hiddenText">
                        <p>This structured feedback system helps students feel heard and can enhance their overall learning experience, 
                            while also providing valuable insights for teachers to improve their instruction. By providing a platform 
                            for students to share their honest feedback on teaching methods, course content, and overall learning 
                            environment, we can create a more engaging and effective educational experience.</p>
                        
                        <label for="ch">SHOW LESS</label>
                    </div>
    
                    <label for="ch">READ MORE</label>
                </div>
            </div>

            <!-- Vector -->
            <div class="col-6" id="containerColumn2">
                <img id="vector" src="assets/svg/Big Vector.svg" alt="" width="90%" height="90%">
            </div>
        </div>
    </div>

  <!-- Reminder Pop-up -->
  <dialog class="reminder-popup" id="reminder-popup">
    <div class="reminder-cointainer">
        <div class="popup-icon">!</div>
        <h1 class="popup-title">REMINDER</h1>
        <p class="popup-message d-flex justify-content-center">
            This web application is intended solely for research <br>
            purposes. All collected data will be used strictly for <br>
            academic analysis and handled with utmost <br> confidentiality.
        </p>
        <button class="popup-button">I UNDERSTAND</button>
    </div>
</dialog>


    <div class="footerBorder"></div>

    <!-- Footer -->
    <section class="footer">
        <footer>
            <img src="assets/svg/Icon Only.svg" alt="" class="icon">
            <div class="column1">
                <ul>
                    <ul>
                    <li><a onclick="showAboutUs()">About Us</a></li>
                    <li><a onclick="showFAQs()">FAQs</a></li>
                </ul>
            </div>

            <div class="column2">
                <ul>
                    <li><a onclick="showPrivacyPolicy()">Privacy Policy</a></li>
                    <li><a onclick="showTermsOfService()">Terms of Service</a></li>
                </ul>
            </div>

            <div class="column3">
                <ul>
                    <li><a onclick="showContactUs()">Contact Us</a></li>
                </ul>
            </div>

            <div class="column4">
                <ul>
                    <li>Last Updated:</li>
                    <li>MM/DD/YYYY</li>
                </ul>
            </div>  

            <hr class="border border-white border-1 opacity-100">
            <section class="copyright">
                <p>Copyright © 2024. All rights reserved.</p>
            </section>
            
        </footer>
   </section>

    <!-- About Us Pop-up -->
    <dialog class="AboutUs">
        <nav class="navbarAboutUs">
            <div class="navbar-brand" id="aboutUsLogo">
                <img src="assets//svg/Icon with Name.svg" alt="" width="25%" height="100%">
            </div>
        
            <div class="d-flex justify-content-end" id="closeAU">
                <button class="btnCloseAU">&times;</button>
            </div>
        </nav>

        <div class="aboutUsContent">
            <div class="row" id="aboutUsRow">
                <!-- Image -->
                <div class="col" id="aboutUsColumn1">
                    <div class="aboutUsImage">
                        <img src="assets\images\GROUP 3 ALLSTAR GROUPIE.jpg" alt="">
                    </div>
                </div>
    
                <!-- Text -->
                <div class="col" id="aboutUsColumn2">
                    <div class="aboutUsText">
                        <h1>ABOUT US</h1>
                        <p>The students from STI College Marikina are developing a web-based feedback system named iFeedback, which provides students with a voice. It is an essential tool that helps identify the issues, problems, and other concerns of students. This web application has been developed with the aim of ensuring that the learning experiences of students are improved, and allowing educational institutions to identify and address concerns quickly and effectively. Together, they are working to create a more responsive learning environment where all the voices of students are heard. This project is intended solely for research purposes and will not be published publicly.</p>
                    </div>
                </div>
            
            </div>
        </div>  
    </dialog>

    <!-- FAQs Pop-up -->
    <dialog id="FAQs" class="FAQs">
        <nav class="navbarFAQs"> 
            <div class="navbar-brand" id="aboutUsLogo">
                <img src="assets/svg/Icon with Name.svg" alt="">
            </div>

            <div class="d-flex justify-content-end" id="closeFAQs">
                <button class="btnCloseFAQs">&times;</button>
            </div>
        </nav>
        <h1>FAQ</h1>
        <h5>Frequently Asked Questions</h5>
        
        <div class="wrapper">
            <div class="collapsible">
                <input type="checkbox" id="collapsible-1" name="collapsible1">
                <label for="collapsible-1">What will happen to my feedback?</label>
                <div class="collapsible-text">
                    <p>Once you submit your feedback, it will be collected by iFeedback and sent to the instructor you reviewed. Instructors can access and review the feedback at any time.</p>
                </div>
            </div>
        </div>
        <div class="wrapper">
            <div class="collapsible">
                <input type="checkbox" id="collapsible-2" name="collapsible2">
                <label for="collapsible-2">How does the process of the feedback system work?</label>
                <div class="collapsible-text">
                    <p>Users will begin by clicking the 'Start' button to access a set of guidelines. Next, they will select an instructor and complete an evaluation form to provide feedback. Upon submission, the system will recognize their participation by awarding a badge. Finally, the collected feedback will contribute to the instructor’s overall rating.</p>
                </div>
            </div>
        </div>
        <div class="wrapper">
            <div class="collapsible">
                <input type="checkbox" id="collapsible-3" name="collapsible3">
                <label for="collapsible-3">Who can see my feedback?</label>
                <div class="collapsible-text">
                    <p>All feedback submitted will be displayed anonymously, and will not include any identifying information such as your name, section and student ID. Instructors will only see the content of the feedback, but they won't be able to identify who submitted it. 
                    </p>
                </div>
            </div>
        </div>
        <div class="wrapper">
            <div class="collapsible">
                <input type="checkbox" id="collapsible-4" name="collapsible4">
                <label for="collapsible-4">Can I edit my feedback?</label>
                <div class="collapsible-text">
                    <p>The purpose of iFeedback is to provide a platform for students to share their experiences and thoughts. It aims to facilitate open communication between students and instructors, helps in identifying the problem between instructors and students, and provides  an effective solution.
                    </p>
                </div>
            </div>
        </div>
        <div class="wrapper">
            <div class="collapsible">
                <input type="checkbox" id="collapsible-5" name="collapsible5">
                <label for="collapsible-5">How often can I give feedback?</label>
                <div class="collapsible-text">
                    <p>iFeedback can be used by both students and instructors. Students can freely provide more and structured feedback on their courses, instructors, and other academic concerns. On the other hand, instructors can improve their teaching skills by reflecting on the feedback of their students.</p>
                </div>
            </div>
        </div>
        <div class="d-flex justify-content-center" id="questionNotHere">
            <p>Question not here?</p>
            <a class="faqsToContactUs" onclick="faqsToContactUs()">Contact Us</a>
        </div>
    </dialog>

    <!-- Contact Us Pop-up -->
    <dialog id="ContactUs" class="ContactUs">
        <nav class="navbarContactUs"> 
            <div class="navbar-brand" id="contactUsLogo">
                <img src="assets/svg/Icon with Name.svg" alt="" width="75%" height="100%">
            </div>

            <div class="d-flex justify-content-end" id="closeCU">
                <button class="btnCloseCU">&times;</button>
            </div>
        </nav>
        <h1>NEED HELP?</h1>
        <h5>Reach out to us!</h5>

        <div class="containerCU">
            <div class="forms">
                <div class="formFNLN">
                    <img class="iconFN" src="assets/images/FirstName.png" alt="">
                    <form class="formFN">
                        <input type="text" placeholder="First Name">
                    </form>

                    <form class="formLN">
                        <input type="text" placeholder="Last Name">
                    </form>
                </div>
                
                <img class="iconEmail" src="assets/images/Email.png" alt="">
                <form class="formEmail">
                    <input type="email" placeholder="Email">
                </form>

                <img class="iconPhone" src="assets/images/Phone.png" alt="">
                <form class="formPhone">
                    <input type="number" placeholder="Phone">
                </form>

                <textarea class="formMessage" placeholder="Type your message here..."></textarea>

                <div class="d-flex justify-content-center">
            <input class="contactUsSubmitbtn" type="submit" value="Submit">
                </div>
            </div>
        </div>
    </dialog>

    <!--Contact Us Thank You Pop-up-->
    <dialog id="ContactUsPopUp" class="ContactUsPopUpMessage">
        <div class="popup-icon-contact-container">
            <div class="popup-icon-contact">
                <img src="assets/svg/Sign Up Thank You Icon.svg" alt="">
            </div>
            <div class="popup-contact-thankyou">
            <h1 class="popup-contact-title">THANK YOU!</h1>
            <p class="popup-messagecontact d-flex justify-content-center">Thank you for reaching out! We've received your <br> message and will get back to you as soon as possible.</p>
            <button class="popup-contact-button" onclick="document.getElementById('ContactUsPopUp').close()">OK</button>
        </div>
    </dialog>

    <!-- Privacy Policy Pop-up -->
    <dialog id="privacyPolicy" class="privacyPolicy">
        <nav class="navbarPrivacyPolicy"> 
            <div class="navbar-brand" id="privacyPolicyLogo">
                <img src="assets/svg/Icon with Name.svg" alt="">
            </div>

            <div class="d-flex justify-content-end" id="closePrivacyPolicy">
                <button class="btnClosePrivacyPolicy">&times;</button>
            </div>
        </nav>
        <h1>PRIVACY POLICY</h1>
        <h5>Your Data, Your Rights</h5>
        
        <div class="wrapper">
            <div class="collapsible">
                <input type="checkbox" id="collapsible-6" name="collapsible6">
                <label for="collapsible-6">Introduction</label>
                <div class="collapsible-text">
                    <p>This Privacy and Policy of iFeedback demonstrates how we use and manage your personal data and information. As we respect your privacy and keep the information safe and secure, preventing unauthorized access. We  ensure that your privacy matters.</p>
                </div>
            </div>
        </div>
        <div class="wrapper">
            <div class="collapsible">
                <input type="checkbox" id="collapsible-7" name="collapsible7">
                <label for="collapsible-7">Data and Information We Collect</label>
                <div class="collapsible-text">
                    <p>We ensure that the information that will be collected is safe and secured and will not be leaked. All the data collected will be handled by our data management and stored safely. We will be collecting your personal information such as name, section, email address, and contact number as a requirement for you to provide feedback and use our iFeedback.</p>
                </div>
            </div>
        </div>
        <div class="wrapper">
            <div class="collapsible">
                <input type="checkbox" id="collapsible-8" name="collapsible8">
                <label for="collapsible-8">How We Use Your Information</label>
                <div class="collapsible-text">
                    <p>iFeedback uses your information to verify and authenticate the identity of those who will use it and to avoid troll users, in order to make sure that the feedback is submitted by legitimate users and not by fake users. As we use your feedback that you provided, we will analyze, reflect and take actions to the suggestions, feedback and critiques.</p>
                </div>
            </div>
        </div>
        <div class="wrapper">
            <div class="collapsible">
                <input type="checkbox" id="collapsible-9" name="collapsible9">
                <label for="collapsible-9">Your Rights</label>
                <div class="collapsible-text">
                    <p>We make sure that we care about our users. You have the right to request and access a copy of the data and information that we hold. You can freely modify the personal information of yours. You may also request a cancellation of your account, and ask for a complete erasure of your personal information.</p>
                </div>
            </div>
        </div>

    </dialog>

    <!-- Terms of Service Pop-up -->
    <dialog id="termsOfService" class="termsOfService">
        <nav class="navbarTermsOfService"> 
            <div class="navbar-brand" id="termsOfServiceLogo">
                <img src="assets/svg/Icon with Name.svg" alt="">
            </div>

            <div class="d-flex justify-content-end" id="closeTermsOfService">
                <button class="btnCloseTermsOfService">&times;</button>
            </div>
        </nav>
        <h1>TERMS OF SERVICE</h1>
        <h5>Your Usage, Your Responsibilities</h5>
        
        <div class="wrapper">
            <div class="collapsible">
                <input type="checkbox" id="collapsible-10" name="collapsible10">
                <label for="collapsible-10">Honest Feedback</label>
                <div class="collapsible-text">
                    <p>Users are encouraged to provide honest and unbiased feedback about teachers while maintaining professionalism.</p>
                </div>
            </div>
        </div>
        <div class="wrapper">
            <div class="collapsible">
                <input type="checkbox" id="collapsible-11" name="collapsible11">
                <label for="collapsible-11">Constructive Criticism and Restricted Content</label>
                <div class="collapsible-text">
                    <p>Please refrain from using harmful, degrading, or excessively harsh language. Avoid personal attacks, defamatory statements, irrelevant personal details, and inflammatory, offensive, or hateful language. The goal of feedback should be to support educators in their improvements, not to insult them.</p>
                </div>
            </div>
        </div>
        <div class="wrapper">
            <div class="collapsible">
                <input type="checkbox" id="collapsible-12" name="collapsible12">
                <label for="collapsible-12">Privacy and Confidentiality</label>
                <div class="collapsible-text">
                    <p>Respect the privacy of teachers, students, and other users.  Avoid disclosing identifiable student information or confidential academic records in evaluations.  Do not upload, share, or use screenshots or other content from the platform outside its intended use.</p>
                </div>
            </div>
        </div>
        <div class="wrapper">
            <div class="collapsible">
                <input type="checkbox" id="collapsible-13" name="collapsible13">
                <label for="collapsible-13">Platform Usage Rights</label>
                <div class="collapsible-text">
                    <p>Feedback is anonymized to ensure data privacy while providing insights to educators.</p>
                </div>
            </div>
        </div>
        <div class="wrapper">
            <div class="collapsible">
                <input type="checkbox" id="collapsible-14" name="collapsible14">
                <label for="collapsible-14">Relevance and Accuracy</label>
                <div class="collapsible-text">
                    <p>Make sure your feedback is focused solely on the teacher’s professional role, performance, or influence in education. Avoid posting false, exaggerated, or misleading statements about the teacher or their practices.</p>
                </div>
            </div>
        </div>
    </dialog>
    <script src="assets/scripts/Header.js"></script>
    <script src="assets/scripts/Footer.js"></script>
    <script src="assets/scripts/Guidelines.js"></script>
    <script src="assets/scripts/LandingPageReminder.js"></script>
    <script src="assets/scripts/Index.js"></script>
    <script src="assets/scripts/LogIn.js"></script>
</body>
</html>
