<?php
    require "includes/header.inc.php";
?>

    <style>
        <?php include 'assets/css/teachers.css'; ?>
    </style>
    <?php 

    function listFolderFiles($dir, $ttId)
    {
        $unit = array('Byte', 'KB', 'MB', 'GB');
        foreach (new DirectoryIterator($dir) as $fileInfo) {
            if (!$fileInfo->isDot()) {
                $tempArr = explode('-', $ttId);
                $len = count($tempArr);
                $ttId = $tempArr[0];

                if($len > 1) {
                    for($i = 1; $i < $len; $i++) {
                        if($i == $len - 1) {
                            ++$tempArr[$i];
                        }
                        $ttId = $ttId.'-'.$tempArr[$i];
                    }
                } else {
                    ++$ttId;
                }
                if($len > 1){
                    $ttParentId = $tempArr[0];
                    for($i = 1; $i < $len - 1; $i++) {
                        $ttParentId = $ttParentId.'-'.$tempArr[$i];
                    }
                    
                    if ($fileInfo->isDir()) {    
                        echo '<tr data-tt-id="'.$ttId.'" data-tt-parent-id="'.$ttParentId.'"><td><span class="folder">' . $fileInfo->getFilename() . '</span></td><td>..</td><td>' . date("Y-m-d h-m-s", $fileInfo->getATime()). '</td><td>' .date("Y-m-d h-m-s", $fileInfo->getCTime()). '</td><td><a class="del-btn" href="#" path="'.$fileInfo->getPathname().'">Delete</a></td></tr>';
                        listFolderFiles($fileInfo->getPathname(), $ttId.'-0');
                    } else {
                        $size = $fileInfo->getSize();
                        $cnt = 0;
                        while($size > 1024) {
                            $size /= 1024;
                            $size = round($size, 2);
                            $cnt++;
                        }
                        echo '<tr data-tt-id="'.$ttId.'" data-tt-parent-id="'.$ttParentId.'"><td><a href="'.$fileInfo->getPathname().'"><span class="file">' . $fileInfo->getFilename() . '</span></a></td><td>' .$size." ".$unit[$cnt]. '</td><td>' . date("Y-m-d h-m-s", $fileInfo->getATime()). '</td><td>' .date("Y-m-d h-m-s", $fileInfo->getCTime()). '</td><td><a class="del-btn" href="#" path="'.$fileInfo->getPathname().'">Delete</a></td></tr>';
                    }
                } else {
                    if ($fileInfo->isDir()) {    
                        echo '<tr data-tt-id="'.$ttId.'"><td><span class="folder">' . $fileInfo->getFilename() . '</span></td><td>..</td><td>' . date("Y-m-d h-m-s", $fileInfo->getATime()). '</td><td>' .date("Y-m-d h-m-s", $fileInfo->getCTime()). '</td><td><a class="del-btn" href="#" path="'.$fileInfo->getPathname().'">Delete</a></td></tr>';
                        listFolderFiles($fileInfo->getPathname(), $ttId.'-0');
                    } else {
                        $size = $fileInfo->getSize();
                        $cnt = 0;
                        while($size > 1024) {
                            $size /= 1024;
                            $size = round($size, 2);
                            $cnt++;
                        }
                        echo '<tr data-tt-id="'.$ttId.'"><td><a href="'.$fileInfo->getPathname().'"><span class="file">' . $fileInfo->getFilename() . '</span></a></td><td>' .$size." ".$unit[$cnt]. '</td><td>' . date("Y-m-d h-m-s", $fileInfo->getATime()). '</td><td>' .date("Y-m-d h-m-s", $fileInfo->getCTime()). '</td><td><a class="del-btn" href="#" path="'.$fileInfo->getPathname().'">Delete</a></td></tr>';
                    }
                }
               
            }
        }
    }

    ?>
    <main>
        <div class="main-content px-2">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-ms-12" id="personal">
                    <div class="d-flex justify-content-between">
                        <h5 class="text-primary pt-2">Personal Data</h5>
                        <button class="btn btn-primary save-modal-btn" root="priv">File Upload</button>
                    </div>
                    <div class="welcome-message center">
                        <table class="treetable">
                            <thead>
                                <tr>
                                <th>Name</th>
                                <th>Size</th>
                                <th>Creation Date</th>
                                <th>Last Update</th>
                                <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                listFolderFiles('./priv/'.$page, 0);
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </main><!-- Button to Open the Modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal" id="modal-btn" style="display: none">
  Open modal
</button>
<!-- The Modal -->
<div class="modal" id="myModal">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">File Upload</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <div class="row">
            <div class="container">
                <input type="hidden" id="root">
                <div class="form-group">
                    <label>File Path</label>
                    <input class="form-control" placeholder="img/" id="priv_path">
                </div>
                <div class="form-group mt-3">
                    <input type="file" class="form-control" placeholder="background.jpg" id="priv_file">
                </div>
            </div>
        </div>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button class="btn btn-primary" id="priv_ok">Upload</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>

<!-- The Modal -->
<div class="modal" id="delModal">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">File Delete</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <div class="row">
            <div class="container">
                <input type="hidden" id="file_path">
                <h5>Are you sure to delete it?</h5>
            </div>
        </div>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button class="btn btn-primary" id="del-ok-btn">Sure</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>

<script type="text/javascript">
    $(document).ready(function() {
        $('.save-modal-btn').click(function(){
            if($(this).attr('root') == 'priv') {
                $('#root').val('priv/' + "<?= $username; ?>");
            } else{
                $('#root').val('pub');
            }
            //$('#myModal').modal('show');
            $('#modal-btn').attr('data-target', '#myModal');
            $('#modal-btn').click();
        });

        $('.del-btn').click(function() {
            $('#file_path').val($(this).attr('path'));
            $('#modal-btn').attr('data-target', '#delModal');
            $('#modal-btn').click();
        });

        $('#del-ok-btn').click(function() {
            $.ajax({
                url: "./controllers/Home.php",
                type: "post",
                data: {
                    type: 'deleteFile',
                    path: '.' + $('#file_path').val()
                },
                success: function(data) {
                    console.log(data);
                    if(data == 'success') {
                        alert('Success!');
                        location.reload();
                    } else {
                        alert('Failed!');
                    }
                },
                error: function(err) {
                    console.log(err);
                }
            })
        })

        $('#priv_ok').click(function() {
            if(!$('#priv_file').val()) {
                alert("You didn't select the file!");
            } else {
                var formData = new FormData();
                formData.append('type', 'saveFile');
                formData.append('root', $('#root').val());
                formData.append('priv_path', $('#priv_path').val());
                formData.append('priv_file', $('#priv_file')[0].files[0]);
                $.ajax({
                    url: "./controllers/Home.php",
                    type: 'post',
                    enctype: 'multipart/form-data',
                    contentType: false,
                    processData: false,
                    data: formData,
                    success:function(data) {
                        if(data == 1) {
                            alert('Image uploaded successfully!');
                            location.reload();
                        } else {
                            alert('Image upload failed!');
                        }
                    }
                })
            }
        })
    })
</script>

<?php
    require "includes/footer.inc.php";
?>