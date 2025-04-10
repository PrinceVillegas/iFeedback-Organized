<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (empty($_SESSION['username']) || !isset($_SESSION['username'])) {
    header('Location: index.php'); 
    exit;
}
?>