<?php
    session_start();
    session_unset();
    session_destroy();
    header("location: instructorLoginPage.php");
    exit();
?>
