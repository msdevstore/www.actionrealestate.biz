<?php
    session_start();

    // If you are already connected goto Home page
    if (isset($_SESSION["auth"])){
      $auth = $_SESSION["auth"];
      if($auth['role'] == 1) {
        header("Location: ./Admin.php?page=Admin");
      } else {
        header("Location: ./menu.php?page=Menu");
      }
      exit();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Login page</title>
  <link rel="stylesheet" type="text/css" href="./assets/css/auth.css">
  <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
</head>
<body>
<div class="container">
  <div class="login-card">
    <form>
      <div class="title">WELCOME</div>
      <div class="form-group">
        <label class="label">Username</label>
        <div class="input-wrapper">
          <input  type="text" autocomplete="off" placeholder="Enter your username" class="input" id="login-email" value="" required>
        </div>
      </div>
      <div class="form-group">
        <label class="label">Password</label>
        <div class="input-wrapper">
          <input  type="password" autocomplete="off" placeholder="Enter your password" class="input" id="login-pwd" value="" required>
        </div>
      </div>
      <div class="form-group">
        <a class="button" id="login-btn" style="margin: auto">LOGIN</a>
      </div>
    </form>
  </div>
</div>
</body>
<script type="text/javascript">
  var localEmail = localStorage.getItem('localEmail');
  var localPassword = localStorage.getItem('localPassword');
  if(localEmail != "" && localPassword != "") {
    $.ajax({
      url: "./includes/login.inc.php",
      type: "post",
      data: {
        loginemail: localEmail,
        loginpwd: localPassword
      },
      success: function(res) {
        if(res == 'menu' || res == 'admin') {
          location.reload();
        }
      }
    })
  }
  $(document).ready(function() {
    $(document).keydown(function(e) {
      if(e.keyCode == 13) {
        $('#login-btn').click();
      }
    })

    $('#login-btn').click(function() {
      var email = $('#login-email').val();
      var password = $('#login-pwd').val();
      if(email && password) {
        $.ajax({
          url: "./includes/login.inc.php",
          type: "post",
          data: {
            loginemail: email,
            loginpwd: password
          },
          success: function(res) {
            if(res == 'server') {
              alert('Server error');
            } else if(res == 'yet') {
              alert('You are not permitted to login!');
            } else if(res == 'mail') {
              alert('You are not a member!');
            } else if(res == 'pass') {
              alert('Wrong password!');
            } else if(res == 'menu' || res == 'admin') {
              localStorage.setItem('localEmail', email);  
              localStorage.setItem('localPassword', password);
              if(res == "admin") {
                  localStorage.setItem('role', 'admin');
              } else if(res == "menu") {
                  localStorage.setItem('role', 'duty');
              }
              location.reload();
            } else {
              alert('Failed!');
            }
          },
          error: function(err) {
            console.log(err);
              alert('Failed!');
          }
        })
      }
    })
  })
</script>
</html>

