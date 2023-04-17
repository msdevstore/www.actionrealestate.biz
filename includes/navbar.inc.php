    <header>
        <nav style="max-width:98%;text-align:right;" class="navMenu">
            <?php echo $auth['firstname'].' '.$auth['lastname']; ?>
               <br>  
               <a href="#" id="logout-btn">Log Out</a>
        </nav>
    </header>

<form action="/e/includes/logout.inc.php" method="GET" style="display: none" id="logout-action">logout</form>
    


<script src="/e/assets/js/action.js"></script>
<script type="text/javascript">
  $(document).ready(function() {
    $('#profile-btn').click(function() {
      $.ajax({
          url: "/e/controllers/User.php",
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
            url: "/e/controllers/User.php",
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
              url: "/e/controllers/User.php",
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
      localStorage.setItem('localEmail', "");  
      localStorage.setItem('localPassword', "");      
      $('#logout-action').submit();
    })
  })
</script>