<?php
    // Connect to Database
    $servername = "localhost";
    // $username = "v1cnk4t_root";
    // $password = "KKKkkk123!@#";
    // $dbname = "v1cnk4t_new";
    $username = "root";
    $password = "";
    $dbname = "v1cnk4t_new";

    $conn = mysqli_connect($servername, $username, $password, $dbname);

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }