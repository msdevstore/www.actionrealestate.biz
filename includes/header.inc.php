<?php
    session_start();

    // Check if user is not connected
    if (!isset($_SESSION["auth"])){
        header("Location: ./index.php");
        exit();
    }
    $auth = $_SESSION["auth"];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php echo "<title>".substr(basename($_SERVER['PHP_SELF']),0,-4)."</title>"; ?>
  <link href="/e/assets/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="/e/assets/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="/e/assets/css/jquery.treetable.css" />
    <link rel="stylesheet" href="/e/assets/css/jquery.treetable.theme.default.css" >
  <link rel="stylesheet" href="/e/assets/css/bootstrap.min.css">
  <script src="/e/assets/js/jquery.slim.min.js"></script>
  <script src="/e/assets/js/popper.min.js"></script>
  <script src="/e/assets/js/jquery-3.4.1.min.js"></script>
  <script src="/e/assets/js/bootstrap.bundle.min.js"></script>
  <script type="text/javascript" src="/e/assets/js/jquery.dataTables.min.js"></script>
  <link rel="stylesheet" type="text/css" href="/e/assets/css/custom.css">
  <style>
    a:hover {
      transform: translate(-3px, -3px);
    }
    a.navbar-brand {
      color: dodgerblue !important;
    }
  </style>
    
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-sm navbar-dark">
          <div class="container-fluid">
            <?php if(isset($_GET['page'])) {
                $page = $_GET['page'];
                $title = strtoupper($page);
            } ?>
            <a class="navbar-brand" href="Admin.php?page=Home"><?= $title; ?></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div>
              <li class="nav-item dropdown" style="list-style: none;">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown"><?php echo $auth['firstname'].' '.$auth['lastname']; ?></a>
                <ul class="dropdown-menu" style="right: 0px; left: auto;">
                  <li><a class="dropdown-item" href="#" id="profile-btn">My Profile</a></li>
                  <li><a class="dropdown-item" href="#" data-toggle="modal" data-target="#myPassword">Reset Password</a></li>
                  <li><a class="dropdown-item" href="#" id="logout-btn">Logout</a></li>
                </ul>
              </li>
            </div>
          </div>
        </nav>
    </header>
    <br>
    <br>
<form action="./includes/logout.inc.php" method="GET" style="display: none" id="logout-action">logout</form>
    <!-- The Modal -->
<div class="modal" id="myProfile">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">My Profile</h4>
        <button type="button" class="btn-close" data-dismiss="modal"></button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <!--begin::Input group-->
        <div class="d-flex flex-column mb-8 fv-row">
            <!--begin::Label-->
            <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                <span class="required">First Name</span>
                <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Specify a target name for future usage and reference"></i>
            </label>
            <!--end::Label-->
            <input type="text" class="form-control form-control-solid" placeholder="Enter First Name" name="first_name" id="profile_first_name" />
        </div>
        <!--end::Input group-->
        <!--begin::Input group-->
        <div class="d-flex flex-column mb-8 fv-row">
            <!--begin::Label-->
            <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                <span class="required">Last Name</span>
                <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Specify a target name for future usage and reference"></i>
            </label>
            <!--end::Label-->
            <input type="text" class="form-control form-control-solid" placeholder="Enter Last Name" name="last_name" id="profile_last_name" />
        </div>
        <!--end::Input group-->
        <!--begin::Input group-->
        <div class="d-flex flex-column mb-8 fv-row">
            <!--begin::Label-->
            <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                <span class="required">Username</span>
            </label>
            <!--end::Label-->
            <input type="text" class="form-control form-control-solid" placeholder="Enter Username" name="username" id="profile_username" />
        </div>
        <!--end::Input group-->
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-success" id="save-profile-btn">Save</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>
    

<div class="modal" id="myPassword">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">My Profile</h4>
        <button type="button" class="btn-close" data-dismiss="modal"></button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <div class="row">
          <div class="col-12">
            <label>Current Password</label>
            <input class="form-control" type="password" id="current">
          </div>
        </div>
        <div class="row mt-4">
          <div class="col-6">
            <div class="form-group">
              <label>New Password</label>
              <input class="form-control" type="password" id="npassword">
            </div>
          </div>
          <div class="col-6">
            <div class="form-group">
              <label>Confirm Password</label>
              <input class="form-control" type="password" id="rpassword">
            </div>
          </div>
        </div>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-success" id="save-password-btn">Save</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal" id="modal-btn" style="display: none">
  Open modal
</button>

<script type="text/javascript">
  $(document).ready(function() {
    $('#profile-btn').click(function() {
      $.ajax({
          url: "./controllers/User.php",
          type: "POST",
          data: {
              type: 'getUser',
              id: "<?= $auth['id']; ?>"
          },
          success: function(res) {
              var user = JSON.parse(res);
              $('#profile_first_name').val(user['firstname']);
              $('#profile_last_name').val(user['lastname']);
              $('#profile_username').val(user['username']);
            $('#modal-btn').attr('data-target', '#myProfile');
            $('#modal-btn').click();
          },
          error: function(err) {
              console.log(err);
          }
      })
    });
    $('#save-profile-btn').click(function() {
      if(!$('#profile_username').val()) {
        alert("You didn't input UserName!");
      } else {
        $.ajax({
            url: "./controllers/User.php",
            type: "POST",
            data: {
                type: 'saveProfile',
                id: "<?= $auth['id']; ?>",
                firstname: $('#profile_first_name').val(),
                lastname: $('#profile_last_name').val(),
                username: $('#profile_username').val(),
            },
            success: function(res) {
                if(res == 1) {
                    alert('Success');
                    location.reload();
                } else {
                    alert('Failed');
                }
            },
            error: function(err) {
                console.log(err);
            }
        })
      }
    })
    $('#save-password-btn').click(function() {
      if(!$('#current').val() || !$('#npassword').val()) {
        alert("You didn't input all data!");
      } else {
        if($('#npassword').val() != $('#rpassword').val()) {
          alert("Please confirm new password!");
        } else {
          $.ajax({
              url: "./controllers/User.php",
              type: "POST",
              data: {
                  type: 'resetPassword',
                  id: "<?= $auth['id']; ?>",
                  current: $('#current').val(),
                  password: $('#npassword').val(),
                  rpassword: $('#rpassword').val()
              },
              success: function(res) {
                  if(res == 1) {
                    alert('Success');
                    location.reload();
                  } else if(res == 0) {
                    alert('Current Password is not correct!');
                  } else {
                    alert('Failed');
                  }
              },
              error: function(err) {
                  console.log(err);
              }
          })
        }
      }
    })
    $('#logout-btn').click(function() {
      // localStorage.setItem('localEmail', "");  
      // localStorage.setItem('localPassword', "");      
      document.cookie = 'localEmail=; localPassword=;expires=Thu, 01 Jan 1970 00:00:00 UTC;role=';
      $('#logout-action').submit();
    })
  })
</script>