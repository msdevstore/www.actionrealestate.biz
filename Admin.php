<?php
    require "includes/header.inc.php";
?>

    <main>
    <center><a href="menuDesk.php"><h2 class="text-info">Enterprise Home Page</h2></a></center>
        <div class="main-content mx-2">
            <div class="d-flex justify-content-between mb-3">
                <button class="btn btn-outline-primary" id="new-user">Add User</button>
                <button class="btn btn-outline-info"  data-toggle="modal" data-target="#uploadModal">New Upload Template</button>
            </div>
            <table class="table table-hover shadow-lg" id="myTable">
                <thead>
                    <tr class="fw-bold text-muted">
                        <th>#</th>
                        <th>Full Name</th>
                        <th>Role</th>
                        <th>Username</th>
                        <th>Status</th>
                        <th style="text-align: right;">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        require "includes/dbh.inc.php";
                        $sql = "SELECT * FROM users";
                        $result = $conn->query($sql);
                        $id = 0;
                        if ($result->num_rows > 0) {
                          // output data of each row
                          while($row = $result->fetch_assoc()) {
                            $role = 'User';
                            if($row['role'] == 1) $role = 'Admin';
                            $status = 'Not yet';
                            if($row['status'] == 1) $status = 'Allowed';
                            echo 
                            '<tr>
                                <td class="text-white fw-bold text-hover-primary fs-6">'.++$id.'</td>
                                <td class="text-white fw-bold text-hover-primary fs-6">'.$row['firstname'].' '.$row['lastname'].'</td>
                                <td class="text-white fw-bold text-hover-primary fs-6">'.$role.'</td>
                                <td class="text-white fw-bold text-hover-primary fs-6">'.$row['username'].'</td>
                                <td class="text-white fw-bold text-hover-primary fs-6">'.$status.'</td>
                                <td class="text-end" style="text-align: right">
                                    <a class="btn btn-icon" href="./priv.php?page='.$row['username'].'">
                                        <img src="./assets/img/folder-1486.png">
                                    </a>
                                    <a class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1 hover edit-btn" item-id="'.$row['id'].'">
                                        <img src="./assets/img/pencil-5824.png">
                                    </a>
                                    <a class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm del-btn hover" item-id="'.$row['id'].'">
                                        <img src="./assets/img/recycle-bin-10444.png">
                                    </a>
                                </td>
                            </tr>';
                          }
                        } else {
                          echo "0 results";
                        }
                        $conn->close();
                    ?>
                </tbody>
            </table>
        </div>
    </main>
<!-- The Modal -->
<div class="modal" id="uploadModal">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Upload Template</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <div class="row">
            <div class="container">
                <div class="form-group mt-3">
                    <input type="file" class="form-control" id="template">
                </div>
            </div>
        </div>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button class="btn btn-primary" id="uploadModal-btn">Upload</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>
<!-- The Modal -->
<div class="modal" id="kt_modal_new_user">
  <div class="modal-dialog modal-dialog-centered">
    <form class="modal-content">
      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title" id="modal-title">Add New User</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <!--end::Heading-->
        <input type="hidden" id="id" value="0">
        <!--begin::Input group-->
        <div class="form-group">
            <!--begin::Label-->
            <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                <span class="required">First Name</span>
                <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Specify a target name for future usage and reference"></i>
            </label>
            <!--end::Label-->
            <input type="text" class="form-control form-control-solid" placeholder="Enter First Name" name="first_name" id="first_name" />
        </div>
        <!--end::Input group-->
        <!--begin::Input group-->
        <div class="form-group">
            <!--begin::Label-->
            <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                <span class="required">Last Name</span>
                <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Specify a target name for future usage and reference"></i>
            </label>
            <!--end::Label-->
            <input type="text" class="form-control form-control-solid" placeholder="Enter Last Name" name="last_name" id="last_name" />
        </div>
        <!--end::Input group-->
        <!--begin::Input group-->
        <div class="form-group">
            <!--begin::Label-->
            <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                <span class="required">Username</span>
            </label>
            <!--end::Label-->
            <input type="text" class="form-control form-control-solid" placeholder="Enter Username" name="username" id="username" />
        </div>
        <!--end::Input group-->
        <!--begin::Input group-->
        <div class="form-group" id="note">
            <!--begin::Label-->
            <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                <span class="required">Password</span>
            </label>
            <!--end::Label-->
            <input type="text" class="form-control form-control-solid" placeholder="Enter Password" name="password" id="password" />
        </div>
        <!--end::Input group-->
        <!--begin::Input group-->
        <div class="row g-9 mb-8">
            <!--begin::Col-->
            <div class="col-md-12 fv-row">
                <label class="required fs-6 fw-semibold mb-2">Assign Role</label>
                <select class="form-select form-select-solid form-control" data-control="select2" data-hide-search="true" data-placeholder="Select a Role" name="role" id="role">
                    <option value="">Select role...</option>
                    <option value="0">User</option>
                    <option value="1">Admin</option>
                </select>
            </div>
            <!--end::Col-->
        </div>
        <!--end::Input group-->
        <!--begin::Input group-->
        <div class="row g-9 mb-8">
            <!--begin::Col-->
            <div class="col-md-12 fv-row">
                <label class="required fs-6 fw-semibold mb-2">Status</label>
                <select class="form-select form-select-solid form-control" data-control="select2" data-hide-search="true" data-placeholder="Allow this user" name="status" id="status">
                    <option value="0">NotYet</option>
                    <option value="1">Allow</option>
                </select>
            </div>
            <!--end::Col-->
        </div>
        <!--end::Input group-->
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <a id="kt_modal_new_user_submit" class="btn btn-primary">
            Submit
        </a>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>

    </form>
  </div>
</div>
                        <div class="modal" id="del-Modal">
                          <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">

                              <!-- Modal Header -->
                              <div class="modal-header">
                                <h4 class="modal-title">Note</h4>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                              </div>

                              <!-- Modal body -->
                              <div class="modal-body">
                                <h4 class="text-center">Are you sure to delete this user?</h4>
                                <input type="hidden" id="del-id">
                              </div>

                              <!-- Modal footer -->
                              <div class="modal-footer">
                                <button type="submit" class="btn btn-success" id="del-Modal-ok">Sure</button>
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                              </div>

                            </div>
                          </div>
                        </div>
        <!--end::Modal - Cart User-->


        <script>
            $(document).ready(function() {
                var table = $('#myTable').DataTable({
                  "lengthMenu": [ [20, 50, 100, -1], [20, 50, 100, "All"] ]
                });
 
                // #myInput is a <input type="text"> element
                $('#myInput').on( 'keyup', function () {
                    table.search( this.value ).draw();
                });

                $(document).on('click', '#new-user', function() {
                    $('#id').val(0);
                    $('#first_name').val('');
                    $('#last_name').val('');
                    $('#username').val('');
                    $('#password').val('');
                    $('#role').val(0).change();
                    $('#status').val(0).change();
                    $('#modal-title').html('Add New User');
                    //$('#note').css('display', 'block');
                    //$('#kt_modal_new_user').modal('show');
            $('#modal-btn').attr('data-target', '#kt_modal_new_user');
            $('#modal-btn').click();
                });

                $('#uploadModal-btn').click(function() {
                    var file = $('#template').val();
                    console.log('kkk: ', file);
                    if(!file) {
                        alert("You didn't select file!");
                    } else {
                        var formData = new FormData();
                        formData.append('type', 'templateUpload');
                        formData.append('file', $('#template')[0].files[0]);
                        $.ajax({
                            url: "./controllers/Upload.php",
                            type: "POST",
                            enctype: 'multipart/form-data',
                            contentType: false,
                            processData: false,
                            data: formData,
                            success: function(res) {
                                console.log(res);
                                if(res == 1) {
                                    alert("Success!");
                                    location.reload();
                                }
                                else{
                                    alert("Failed!");
                                }
                            },
                            error: function(err) {
                                console.log(err);
                                alert("Failed!");
                            }
                        })
                    }
                });

                $('#kt_modal_new_user_submit').click(function() {
                    var id = $('#id').val();
                    var type = 'addUser';
                    if(id > 0) type = 'editUser';
                    $.ajax({
                        url: "./controllers/User.php",
                        type: "POST",
                        data: {
                            type: type,
                            id: id,
                            firstname: $('#first_name').val(),
                            lastname: $('#last_name').val(),
                            username: $('#username').val(),
                            password: $('#password').val(),
                            role: $('#role').val(),
                            status: $('#status').val()
                        },
                        success: function(res) {
                            if(res == 'success') {
                                alert('Success');
                                window.location.reload();
                            } else if(res == 'userexist') {
                                alert('User is already exist!')
                            } else {
                                alert('Failed');
                            }
                        },
                        error: function(err) {
                            console.log(err);
                        }
                    })
                })

                $(document).on('click', '.edit-btn', function() {
                    $.ajax({
                        url: "./controllers/User.php",
                        type: "POST",
                        data: {
                            type: 'getUser',
                            id: $(this).attr('item-id')
                        },
                        success: function(res) {
                            var user = JSON.parse(res);
                            $('#id').val(user['id']);
                            $('#first_name').val(user['firstname']);
                            $('#last_name').val(user['lastname']);
                            $('#username').val(user['username']);
                            $('#password').val('???');
                            $('#role').val(user['role']).change();
                            $('#status').val(user['status']).change();
                            $('#modal-title').html('Edit User');
                            //$('#note').css('display', 'none');
                            //$('#kt_modal_new_user').modal('show');
                            $('#modal-btn').attr('data-target', '#kt_modal_new_user');
                            $('#modal-btn').click();
                        },
                        error: function(err) {
                            console.log(err);
                        }
                    })
                });

                $(document).on('click', '.del-btn', function() {
                    var id = $(this).attr('item-id');
                    $('#del-id').val(id);
                    //$('#del-Modal').modal('show');
                    $('#modal-btn').attr('data-target', '#del-Modal');
                    $('#modal-btn').click();
                });

                $('#del-Modal-ok').on('click', function() {
                    $.ajax({
                        url: './controllers/User.php',
                        type: 'POST',
                        data: {
                            type: 'deleteUser',
                            id: $('#del-id').val()
                        },
                        success: function(res) {
                            if(res == 1) {
                                alert('Success');
                                window.location.reload();
                            } else {
                                alert('Failed');
                            }
                        },
                        error: function(err) {
                            console.log(err);
                        }
                    })
                });
            });
        </script>

<?php
    require "includes/footer.inc.php";
?>