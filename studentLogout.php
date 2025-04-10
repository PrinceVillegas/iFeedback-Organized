<?php
session_start();
unset($_SESSION['evaluation_finished']);
session_unset();
session_destroy();
header("location: index.php");
exit();
?>
