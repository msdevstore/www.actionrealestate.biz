<?php
        require "dbh.inc.php";

        $umail = $_POST['loginemail'];
        $upass = $_POST['loginpwd'];

        // Prepare query using placeholders (prevent sql injection)
        $sql = "SELECT * FROM users WHERE username=?;";
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt, $sql)){
            echo 'server';
            exit();
        }

        // Pass parameters and execute statement 
        mysqli_stmt_bind_param($stmt, "s", $umail);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        // User has successfully authenticated
        if ($row = mysqli_fetch_assoc($result)){
            # TODO: Fix verify problem
            //$pwdCheck = password_verify($upass, $row['password']);

            if (crypt($upass, '12345') == $row['password']){   // Form created with hash, or dummy accounts for testing
                if(!$row['status']) {
                    echo 'yet';
                    exit();
                } else {
                    session_start();
                    $_SESSION['auth'] = $row;
                    if ($row['role'] == 1) {
                        echo 'admin';
                        exit();
                    } else {
                        echo 'menu';
                        exit();
                    }
                }
            }
            else{
                echo 'pass';
                exit();
            }
        }
        else{
            echo 'mail';
            exit();
        }
        
        // Close connections
        mysqli_stmt_close($stmt);
        mysqli_close($conn);



