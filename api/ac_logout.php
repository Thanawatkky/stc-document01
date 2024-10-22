<?php 
    session_start();
    include 'function.php'; 
    logToFile("logout",$_SESSION['fname']." logout successfully");
    session_unset();
    session_destroy();
    header("Location: ../login.php");
?>