<?php
function checkLoggedIn() {
    if (!isset($_SESSION)) {
        session_start();
    }
    if (!isset($_SESSION['user'])) {
        header("Location: ../php-challenge-auth/login.php"); 
        exit();
    }
}
?>