<?php include '../../includes/sessionCheck.inc.php';?>
<!DOCTYPE html>
<html lang="en">  
          



<head>
<meta name="viewport" content="width=device-width,initial-scale=1">
<meta charset="utf-8">
<meta property="og:type" content="website" />


      <title>File Upload Page</title>


<?php include '../../includes/headInfo.inc.php';?>
<link rel="stylesheet" type="text/css" href="/e/assets/css/bootstrap.min.css">


<link rel="stylesheet" type="text/css" href="/e/priv/_upload/css/upload.css">
<link rel="stylesheet" type="text/css" href="/e/assets/css/upload.css">
      


<!-- Begin Viewport Check for Responsive Design -->      
<!-- Intended Viewport of THIS Page is Mobile 480px or less -->      
<!-- Comment Out the Intended Viewport of THIS page in the JS below -->
<!-- Also adjust the IF and ELSE IF -->
<!-- <script type="text/javascript">
//if
// Mobile (small)
//(window.matchMedia("(max-width: 480px)").matches) {
//     window.location.replace("filename-mob.html");
//}

if
 Tablet (medium)
(window.matchMedia("(min-width: 481px) and (max-width: 1024px)").matches) {
     window.location.replace("menuTab.htm");
 }

else if
 Desktop (large)
(window.matchMedia("(min-width: 1025px)").matches) {
    window.location.replace("menuDesk.php");
}
</script>  -->
<!-- End Viewport Check for Responsive Design -->

</head>







<body>
<div class="wrapper">

<?php include '../../includes/navbar.inc.php';?>
<br /><br />
   
    







<table width="99%" border="1">

<tr>
    <td width=30%">Selection Column</td>
    <td width=39%">Action Column</td>
    <td width=30%">View Column</td>
</tr>

<tr>
    <td>
    <p>
       Please check your signatures and dates, and</br>
       upload only clean, legible PDF documents.
       <br /><br /><br /></br>
       
       <center>
       <h1>PENDING</h1>
       <br
       Upload <u>NEW</u> Pended File. <br/>
       <a id="upload_new" href="#"><img class="upldDnldBtn" src="../_upload/img/upload.jpg" width="334" height="109" alt="" title="" /></a>
       <br />
       Upload <u>Additional</u> Docs to</br>Existing Pended File. <br/>
       <a id="upload_additional" href="#"><img class="upldDnldBtn" src="../_upload/img/upload.jpg" width="334" height="109" alt="" title="" /></a>
       </center>
    </p>    
    </td>

    <td>
    
    
    <div id="form-1">
        <center><h2>NEW<br/>This cell for any forms and upload code.</h2></center>
    </div>
    <div id="form-2" style="display: none;">
        <h2 class="text-primary text-center">NEW Pending Contract</h2>
        <hr>
        <div style="width: 200px; margin: 50px auto 0">
            <div class="form-group text-center">
                <label>Sellers Last Name:</label>
                <input class="form-control" id="seller-name">
            </div>
            <div class="form-group text-center">
                <label>Buyers Last Name:</label>
                <input class="form-control" id="buyer-name">
            </div>
            <div class="form-group text-center">
                <button class="btn btn-info" id="create-folder">Submit</button>
            </div>
        </div>
    </div>

    <div id="transaction-form" style="display: none;">
        <h2 class="text-primary text-center">Select Transaction</h2>
        <select class="form-control" id="transaction-dropdown">
        <?php
            $somePath = './pend';
            $all_dirs = glob($somePath. '/*' , GLOB_ONLYDIR);
            foreach($all_dirs as $dir) {
                $folder = str_replace ("./pend/", "", $dir);
                echo '<option value="'.$folder.'">'.$folder.'</option>';
            }
        ?>            
        </select>
    </div>
    <br><br>
    <div id="form-3" style="display: none;">
        <hr>
        <h3 class="text-info text-center mb-5">Please upload PA Consumer Notice</h3>
        <div class="form-group text-center">
            <input type="file" name="file" id="file" accept=".pdf">
            <a href="#" class="btn btn-info" id="file-upload">Upload</a>
        </div>
        <hr>
    </div>
    <div id="form-4" style="display: none;">
        <hr>
        <h3 class="text-info text-center mb-5">Please Upload Buyer Agency Agreement</h3>
        <div class="form-group text-center">
            <input type="file" name="file" id="file-1" accept=".pdf">
            <a href="#" class="btn btn-info" id="file-upload-1">Upload</a>
        </div>
        <hr>
    </div>
    <div id="form-5" style="display: none;">
        <hr>
        <h3 class="text-info text-center mb-5">Please Upload Sellers Disclosure</h3>
        <div class="form-group text-center">
            <input type="file" name="file" id="file-2" accept=".pdf">
            <a href="#" class="btn btn-info" id="file-upload-2">Upload</a>
        </div>
        <hr>
    </div>
    <div id="form-6" style="display: none;">
        <hr>
        <h3 class="text-info text-center mb-5">Please Upload Lead Paint Disclosure</h3>
        <div class="form-group text-center">
            <input type="file" name="file" id="file-3" accept=".pdf">
            <a href="#" class="btn btn-info" id="file-upload-3">Upload</a>
        </div>
        <hr>
    </div>
    <div id="form-7" style="display: none;">
        <hr>
        <h3 class="text-info text-center mb-5">Please Upload Proof of Funds</h3>
        <div class="form-group text-center">
            <input type="file" name="file" id="file-4" accept=".pdf">
            <a href="#" class="btn btn-info" id="file-upload-4">Upload</a>
        </div>
        <hr>
    </div>
    <div id="form-8" style="display: none;">
        <hr>
        <h3 class="text-info text-center mb-5">Please upload PreAppoval.</h3>
        <div class="form-group text-center">
            <input type="file" name="file" id="file-5" accept=".pdf">
            <a href="#" class="btn btn-info" id="file-upload-5">Upload</a>
        </div>
        <hr>
    </div>
    <div id="form-9" style="display: none;">
        <hr>
        <h3 class="text-info text-center mb-5">Please upload Estimated Closing Costs.</h3>
        <div class="form-group text-center">
            <input type="file" name="file" id="file-6" accept=".pdf">
            <a href="#" class="btn btn-info" id="file-upload-6">Upload</a>
        </div>
        <hr>
    </div>
    <div id="form-10" style="display: none;">
        <hr>
        <h3 class="text-info text-center mb-5">Please upload Deposit Check</h3>
        <div class="form-group text-center">
            <input type="file" name="file" id="file-7" accept=".pdf">
            <a href="#" class="btn btn-info" id="file-upload-7">Upload</a>
        </div>
        <hr>
    </div>
    <div id="form-11" style="display: none;">
        <hr>
        <h3 class="text-info text-center mb-5">Please upload Deposit Money Notice</h3>
        <div class="form-group text-center">
            <input type="file" name="file" id="file-8" accept=".pdf">
            <a href="#" class="btn btn-info" id="file-upload-8">Upload</a>
        </div>
        <hr>
    </div>
    <div id="form-12" style="display: none;">
        <hr>
        <h3 class="text-info text-center mb-5">Please upload Agreement of Sale</h3>
        <div class="form-group text-center">
            <input type="file" name="file" id="file-9" accept=".pdf">
            <a href="#" class="btn btn-info" id="file-upload-9">Upload</a>
        </div>
        <hr>
    </div>

<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal" id="modal-btn" style="display: none">
  Open modal
</button>

<!-- The Modal -->
<div class="modal" id="create-folder-modal">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Note</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <div class="row">
            <div class="container">
                <h5 id="create-folder-content"></h5>
            </div>
        </div>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button class="btn btn-primary" id="create-folder-ok-btn">Sure</button>
        <button type="button" class="btn btn-danger" id="create-folder-cancel-btn" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>

<!-- The Modal -->
<div class="modal" id="file-upload-1-modal">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Note</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <div class="row">
            <div class="container">
                <h5 id="create-folder-content">Do You Have a Buyer Agency Agreement?</h5>
            </div>
        </div>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button class="btn btn-primary" id="file-upload-1-ok-btn">Yes</button>
        <button type="button" class="btn btn-danger" id="file-upload-1-cancel-btn" data-dismiss="modal" style="display: none;">No</button>
        <button type="button" class="btn btn-danger" id="file-upload-1-no-btn" data-dismiss="modal">No</button>
      </div>

    </div>
  </div>
</div>

<!-- The Modal -->
<div class="modal" id="file-upload-2-modal">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Note</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <div class="row">
            <div class="container">
                <h5 id="create-folder-content">Is there Sellers Disclosure?</h5>
            </div>
        </div>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button class="btn btn-primary" id="file-upload-2-ok-btn">Yes</button>
        <button type="button" class="btn btn-danger" id="file-upload-2-no-btn" data-dismiss="modal">No</button>
        <button type="button" class="btn btn-danger" id="file-upload-2-cancel-btn" data-dismiss="modal" style="display: none;">No</button>
      </div>

    </div>
  </div>
</div>

<!-- The Modal -->
<div class="modal" id="file-upload-3-modal">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Note</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <div class="row">
            <div class="container">
                <h5 id="create-folder-content">Is there a Lead Paint Disclosure?</h5>
            </div>
        </div>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button class="btn btn-primary" id="file-upload-3-ok-btn">Yes</button>
        <button type="button" class="btn btn-danger" id="file-upload-3-no-btn" data-dismiss="modal">No</button>
        <button type="button" class="btn btn-danger" id="file-upload-3-cancel-btn" data-dismiss="modal" style="display: none;">No</button>
      </div>

    </div>
  </div>
</div>

<!-- The Modal -->
<div class="modal" id="file-upload-4-modal">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Note</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <div class="row">
            <div class="container">
                <h5 id="create-folder-content">Is purchase cash or financed?</h5>
            </div>
        </div>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button class="btn btn-primary" id="file-upload-4-ok-btn">CASH</button>
        <button type="button" class="btn btn-info" id="file-upload-4-no-btn" data-dismiss="modal">FINANCED</button>
        <button type="button" class="btn btn-info" id="file-upload-4-cancel-btn" data-dismiss="modal" style="display: none;">NO </button>
      </div>

    </div>
  </div>
</div>

<!-- The Modal -->
<div class="modal" id="file-upload-6-modal">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Note</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <div class="row">
            <div class="container">
                <h5 id="create-folder-content">Please upload Estimated Closing Costs</h5>
            </div>
        </div>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button class="btn btn-primary" id="file-upload-6-ok-btn">Sure</button>
        <button type="button" class="btn btn-danger" id="file-upload-6-no-btn" data-dismiss="modal" style="display: none;">No</button>
        <button type="button" class="btn btn-danger" id="file-upload-6-cancel-btn" data-dismiss="modal" style="display: none;">No</button>
      </div>

    </div>
  </div>
</div>

<!-- The Modal -->
<div class="modal" id="file-upload-7-modal">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Note</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <div class="row">
            <div class="container">
                <h5 id="create-folder-content">Please upload Copy of Deposit Check</h5>
            </div>
        </div>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button class="btn btn-primary" id="file-upload-7-ok-btn">Sure</button>
        <button type="button" class="btn btn-danger" id="file-upload-7-no-btn" data-dismiss="modal" style="display: none;">No</button>
        <button type="button" class="btn btn-danger" id="file-upload-7-cancel-btn" data-dismiss="modal" style="display: none;">No</button>
      </div>

    </div>
  </div>
</div>

<!-- The Modal -->
<div class="modal" id="file-upload-8-modal">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Note</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <div class="row">
            <div class="container">
                <h5 id="create-folder-content">Please upload Copy of Deposit Money Notice</h5>
            </div>
        </div>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button class="btn btn-primary" id="file-upload-8-ok-btn">Sure</button>
        <button type="button" class="btn btn-danger" id="file-upload-8-no-btn" data-dismiss="modal" style="display: none;">No</button>
        <button type="button" class="btn btn-danger" id="file-upload-8-cancel-btn" data-dismiss="modal" style="display: none;">No</button>
      </div>

    </div>
  </div>
</div>

<!-- The Modal -->
<div class="modal" id="file-upload-9-modal">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Note</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <div class="row">
            <div class="container">
                <h5 id="create-folder-content">Please upload Copy of Agreement of Sale</h5>
            </div>
        </div>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button class="btn btn-primary" id="file-upload-9-ok-btn">Sure</button>
        <button type="button" class="btn btn-danger" id="file-upload-9-no-btn" data-dismiss="modal" style="display: none;">No</button>
        <button type="button" class="btn btn-danger" id="file-upload-9-cancel-btn" data-dismiss="modal" style="display: none;">No</button>
      </div>

    </div>
  </div>
</div>
    
    
    
    
    
    </td>
    <td>
        <br/>
        <div style="height: 500px; overflow-y: auto;">
            <div class="arrange created-folder-title" id="created-folder-title" style="display: none;">
                <h2>PEND :</h2>
                <h4>John_Eric</h4>
            </div>
            <br/><br/><br/>
            <div id="file-show"></div>
        </div>
    </td>
</tr>







</table>













<br />

</div><!-- end wrapper -->

</body>

<script src="/e/assets/js/upload.js"></script> />
</html>