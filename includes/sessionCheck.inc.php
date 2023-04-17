<?php
    session_start();

    // Check if user is not connected
    if (!isset($_SESSION["auth"])){
        header("Location: /e/index.php");
        exit();
    }
    $auth = $_SESSION["auth"];
?>