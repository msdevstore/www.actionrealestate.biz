<?php
    if (isset($_POST['register-submit'])){
        require "dbh.inc.php" ;

        $uname = $_POST['register-name'];
        $usname = $_POST['register-surname'];
        $username = $_POST['register-username'];
        $urole = $_POST['register-role'];
        $upass1 = $_POST['register-pwd1'];
        $upass2 = $_POST['register-pwd2'];

        // Check in backend if register fields are acceptable
        if (empty($uname) || empty($usname) || empty($username) || empty($upass1) || empty($upass2)){
            header("Location: ../signup.php?error=emptyfields");
            exit();
        }
        else if ($upass1 !== $upass2){
            header("Location: ../signup.php?error=passdonotmatch");
            exit();
        }
        else if (!preg_match("/^[a-zA-Z]+$/", $uname)){
            header("Location: ../signup.php?error=notvalidname");
            exit();
        }
        else if (!preg_match("/^[a-zA-Z]+$/", $usname)){
            header("Location: ../signup.php?error=notvalidsurname");
            exit();
        }
        else if (!preg_match("/^[a-zA-Z0-9_]+$/", $username)){
            header("Location: ../signup.php?error=notvalidusername");
            exit();
        }

        // Prepare query using placeholders (prevent sql injection)
        $sql = "SELECT username FROM users WHERE username=?;";
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt,$sql)){
            header("Location: ../signup.php?error=sqlerror");
            exit();
        }

        // Pass parameters and execute statement 
        mysqli_stmt_bind_param($stmt, "s", $username);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_store_result($stmt);
        $resultCheck = mysqli_stmt_num_rows($stmt);

        // Someone already exists with this id or email
        if ($resultCheck > 0){
            header("Location: ../signup.php?error=userexists");
            exit();
        }

        // -----------------------------------
        // Finaly if nothing is wrong add user
        // -----------------------------------
        // Prepare query using placeholders (prevent sql injection)
        $sql = "INSERT INTO users (firstname, lastname, username, password, role, status) VALUES (?, ?, ?, ?, ?, 0);";
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt, $sql)){
            header("Location: ../signup.php?error=sqlerror");
            exit();
        }
        // TODO: fix verify problem passwords does not match
        $hashedPwd = crypt($upass1, '12345');

        // Pass parameters and execute statement
        mysqli_stmt_bind_param($stmt, "ssssi", $uname, $usname, $username, $hashedPwd, $urole);
        mysqli_stmt_execute($stmt);

        //This is the part to create folder when user created.
        if(!is_dir('../priv/'.$username)) {
            mkdir('../priv/'.$username);
        }
        if(!is_dir('../priv/'.$username.'/list')) {
            mkdir('../priv/'.$username.'/list');
        }
        if(!is_dir('../priv/'.$username.'/pend')) {
            mkdir('../priv/'.$username.'/pend');
        }
        if(!is_dir('../priv/'.$username.'/close')) {
            mkdir('../priv/'.$username.'/close');
        }
        //This is the part to copy file
        copy('../priv/_template/index.php', '../priv/'.$username.'/index.php');

        header("Location: ../index.php?register=true");
        exit();

        // Close connections
        mysqli_stmt_close($stmt);
        mysqli_close($conn);
    }
    // Try to access register without submiting form
    else{
        header("Location: ../signup.php");
        exit();
    }
