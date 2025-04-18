<?php
// Connect to the database
$conn = mysqli_connect('localhost', 'username', 'password', 'database_name');

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

// Get the user ID, start date, end date, and status from the AJAX request
$user_id = $_POST['user_id'];
$start_date = $_POST['start_date'];
$end_date = $_POST['end_date'];
$status = $_POST['status'];

// Update the countdown settings in the database
$sql = "UPDATE countdown_settings SET start_date = '$start_date', end_date = '$end_date', status = '$status' WHERE user_id = '$user_id'";
mysqli_query($conn, $sql);

// Close the database connection
mysqli_close($conn);

// Return a success message
echo json_encode(array('message' => 'Countdown settings updated successfully'));
?>