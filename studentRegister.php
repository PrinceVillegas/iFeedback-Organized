<?php
session_start();
include ("connect.php");

// Fetch section options for sign-up dropdown
$query = "SELECT sectionId, sectionName FROM sectiontbls";
$result = $conn->query($query);

// Sign-up handler
if (isset($_POST['signUp'])) {
    $firstName = $_POST['firstName'];
    $middleName = $_POST['middleName'];
    $surname = $_POST['surname'];
    $section = $_POST['sectionID'];
    $studentID = $_POST['studentID'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirmPassword'];

    if ($password == $confirmPassword) {
        $checkUsername = "SELECT * FROM studentstbl WHERE username='$username'";
        $result = $conn->query($checkUsername);
        if ($result->num_rows > 0) {
            echo "<script>alert('Username already exists! Try again!');</script>";
        } else {
            // Hash the password using MD5
            $password = md5($password);

            $insertQuery = "INSERT INTO studentstbl (firstName, middleName, surname, sectionId, studentId, username, password, evalStatus)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
            $stmt = $conn->prepare($insertQuery);
            if ($stmt === false) {
                echo "Error preparing query: " . $conn->error;
            } else {
                $evalStatus = 0;
                $stmt->bind_param("sssssssi", $firstName, $middleName, $surname, $section, $studentID, $username, $password, $evalStatus);
                if ($stmt->execute()) {
                    insertActivity($studentID, 'User Signup', 'New student account created');
                    echo "Signup successful! Redirecting to index.php...";
                    header("location: index.php");
                    exit;
                } else {
                    echo "Error: " . $conn->error;
                }
            }
        }
    } else {
        echo "<script>alert('Password does not match!');</script>";
    }
}


// Table for user activity logs
$conn->query("CREATE TABLE IF NOT EXISTS user_activity (
    id INT AUTO_INCREMENT PRIMARY KEY,
    studentID INT,
    activity_name VARCHAR(255),
    activity_date DATETIME,
    activity_consequences TEXT
)");

// Activity logging function
function insertActivity($studentID, $activityName, $activityConsequences) {
    global $conn;
    $insertActivityQuery = "INSERT INTO user_activity (studentID, activity_name, activity_date, activity_consequences)
    VALUES (?, ?, NOW(), ?)";
    $stmt = $conn->prepare($insertActivityQuery);
    $stmt->bind_param("iss", $studentID, $activityName, $activityConsequences);
    $stmt->execute();
}
?>
