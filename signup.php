<?php
    session_start();

    if (isset($_SESSION["Username"])){
        header("Location: ./Teachers.php");
        exit();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Sign up</title>
  <link rel="stylesheet" type="text/css" href="./assets/css/auth.css">
  <script src="./assets/js/register.js"></script> 
</head>
<body>
<?php
    // Check if some error exist and inform user
    if(isset($_GET['error'])){
        if($_GET['error'] == "sqlerror"){
          echo "<script>alert('There is something wrong with the database');</script>";
        }
        else if($_GET['error'] == "userexists"){
          echo "<script>alert('ID, Username or Email already exists!');</script>";
        }
        else{
          echo "<script>alert('Unexpected error');</script>";
        }
    }
?>
<div class="container">
  <div class="register-card">
    <form name="register-form" class="register-form" onsubmit="return validateForm()" action="includes/register.inc.php"  method="post">
      <div class="title">WELCOME</div>
      <div class="form-group">
        <label class="label">First Name</label>
        <div class="input-wrapper">
          <input  type="text" autocomplete="off" placeholder="Enter your first name" class="input"  name="register-name" required>
        </div>
      </div>
      <div class="form-group">
        <label class="label">Last Name</label>
        <div class="input-wrapper">
          <input  type="text" autocomplete="off" placeholder="Enter your last name" class="input" name="register-surname" required>
        </div>
      </div>
      <div class="form-group">
        <label class="label">Role</label>
        <div class="input-wrapper">
          <select  type="text" autocomplete="off" placeholder="Enter your username" class="input" name="register-role">
            <option value="0">User</option>
            <option value="1">Admin</option>
          </select>
        </div>
      </div>
      <div class="form-group">
        <label class="label">Username</label>
        <div class="input-wrapper">
          <input  type="text" autocomplete="off" placeholder="Enter your username" class="input" name="register-username" required>
        </div>
      </div>
      <div class="form-group">
        <label class="label">Password</label>
        <div class="input-wrapper">
          <input  type="password" autocomplete="off" placeholder="Enter your password" class="input" name="register-pwd1" required>
        </div>
      </div>
      <div class="form-group">
        <label class="label">Confirm Password</label>
        <div class="input-wrapper">
          <input  type="password" autocomplete="off" placeholder="Confirm your password" class="input" name="register-pwd2" required>
        </div>
      </div>
      <div class="form-group">
        <button class="button" type="submit" name="register-submit" style="margin: auto;">SIGN UP</button>
      </div>
    </form>
  </div>
</div>
</div>
</body>
</html>

