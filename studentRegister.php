<?php

include ("connect.php");


$query = "SELECT sectionId, sectionName FROM sectiontbls";
$result = $conn->query($query);


if(isset($_POST['signUp'])){
    $firstName = $_POST['firstName'];
    $middleName = $_POST['middleName'];
    $surname = $_POST['surname'];
    $section = $_POST['section'];
    $studentID = $_POST['studentID'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirmPassword'];

    if($password == $confirmPassword){
        $checkUsername = "SELECT * FROM studentstbl WHERE username='$username'";
        $result = $conn->query($checkUsername);
        if($result->num_rows > 0){
            echo "<script>alert('Username already exist! Try again!');</script>";
        } else {
            $password = password_hash($password, PASSWORD_DEFAULT);
            $insertQuery = "INSERT INTO studentstbl (firstName, middleName, surname, section, studentID, username, password, evalStatus)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
            $stmt = $conn->prepare($insertQuery);
            if ($stmt === false) {
                echo "Error preparing query: " . $conn->error;
            } else {
                $evalStatus = 0;
                $stmt->bind_param("sssssssi", $firstName, $middleName, $surname, $section, $studentID, $username, $password, $evalStatus);
                if($stmt->execute()){
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


if(isset($_POST['login'])){
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Check if user is a regular user
    $sql = "SELECT studentID, section, username, password FROM studentstbl WHERE username='$username'";
    $result = $conn->query($sql);
    if($result->num_rows > 0){
        $row = $result->fetch_assoc();
        if(password_verify($password, $row['password'])){
            session_start();
            $_SESSION['username'] = $row['username'];
            $_SESSION['studentID'] = $row['studentID'];
            $_SESSION['section'] = $row['section'];
            $_SESSION['role'] = 'studenstbl';

            // Retrieve the user's activity data from the table
            $activityQuery = "SELECT * FROM user_activity WHERE studentID='".$_SESSION['studentID']."'";
            $activityResult = $conn->query($activityQuery);
            $activityData = array();
            while($activityRow = $activityResult->fetch_assoc()){
                $activityData[] = $activityRow;
            }
            $_SESSION['activityData'] = $activityData;
            header("location: studentDashboard.php");
            exit;
        } else {
            echo "<script>alert('Invalid username or password!');</script>";
        }
    }
}

// Create a table to store the user's activity data
$conn->query("CREATE TABLE IF NOT EXISTS user_activity (
    id INT AUTO_INCREMENT PRIMARY KEY,
    studentID INT,
    activity_name VARCHAR(255),
    activity_date DATETIME,
    activity_consequences TEXT
)");

// Function to insert user activity data
function insertActivity($studentID, $activityName, $activityConsequences){
    global $conn;
    $insertActivityQuery = "INSERT INTO user_activity (studentID, activity_name, activity_date, activity_consequences)
    VALUES (?, ?, NOW(), ?)";
    $stmt = $conn->prepare($insertActivityQuery);
    $stmt->bind_param("iss", $studentID, $activityName, $activityConsequences);
    $stmt->execute();
}

?>