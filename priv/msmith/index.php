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
    <link rel="stylesheet" type="text/css" href="/e/priv/_upload/css/upload2.css">
    <link rel="stylesheet" type="text/css" href="/e/assets/css/upload.css">


</head>







<body>
<div class="wrapper">

    <?php include '../../includes/navbar.inc.php';?>
    <br /><br />


    <script>
        if ($(window).width() < 705) {
            alert('This screen is too small to perform this function.  Please switch to landscape mode, or a larger device.');
        }
    </script>





    <center><p><a href="../../menu.php">Back to Evolution Home</a></p></center>


    <table width="99%" border="1">

        <tr>
            <td align="center" width="30%">Upload Selections</td>
            <td align="center" width="35%">Take Action</td>
            <td align="center" width="35%">View Results</td>
        </tr>

        <tr>
            <td>
                <p>
                    Please check your signatures &amp; dates, and<br>
                    upload only clean, legible PDF documents.
                    <br /><br /><br /><br />

                <center>
                    <h1>PENDING</h1>
                    <br />
                    Upload <u>NEW</u> Pended File. <br />
                    <a id="upload_new" class="button"><img class="upldDnldBtn" src="../_upload/img/uploadBL.jpg" /></a>

                    Upload <u>Additional</u> Docs to</br>Existing Pended File. <br/>
                    <a id="upload_additional" class="button"><img class="upldDnldBtn" src="../_upload/img/uploadBL.jpg" /></a>
                </center>
                </p>
            </td>

            <!-- The Modal -->
            <div class="modal" id="pend-start-confirm-modal">
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
                                    <h5>Do you represent the Buyer or the Seller?</h5>
                                    <input type="hidden" value="1" id="pend-status">
                                </div>
                            </div>
                        </div>

                        <!-- Modal footer -->
                        <div class="modal-footer">
                            <button class="btn btn-primary" data-dismiss="modal" id="pend-start-confirm-ok-btn">Buyer</button>
                            <button type="button" class="btn btn-danger" id="pend-start-confirm-no-btn" data-dismiss="modal">Seller</button>
                        </div>

                    </div>
                </div>
            </div>

            <td>

                <div id="form-1">
                    <center><br /><h2><p>NEW Pendings</p></h2><p><font size="+1">Please have the following documents ready as clean PDF's BEFORE starting your upload.<br /><br />Private MLS Sheet showing Commission, or<br />Public Sheet with Sharing Agreement<br />PA Consumer Notice<br />Buyer Broker Agreement<br />Estimated Closing Cost Sheet<br />Sellers Property Disclosure<br />Lead Paint Disclosure<br />Proof of Funds, or<br />Loan PreApproval<br />Copy of Deposit Check<br />Copy of Deposit Money Notice<br />Agreement of Sale</p></font></center>
                </div>
                <div id="form-2" style="display: none;">
                    <h2 class="text-primary text-center">NEW Pending Contract</h2>
                    <hr />
                    <div style="width: 200px; margin: 50px auto 0">
                        <div class="form-group text-center">
                            <label>Sellers Last Name:</label>
                            <input class="form-control not-special" id="seller-name">
                        </div>
                        <div class="form-group text-center">
                            <label>Buyers Last Name:</label>
                            <input class="form-control not-special" id="buyer-name">
                        </div>
                        <div class="form-group text-center">
                            <button class="btn btn-info" id="create-folder">Submit</button>
                        </div>
                    </div>
                </div>

                <div id="transaction-form" class="m-5" style="display: none;">
                    <h2 class="text-primary text-center">Select Transaction</h2>
                    <select class="form-control" id="transaction-dropdown">
                        <option value="" selected>--- Select Here ---</option>
                        <?php
                        $somePath = './pend';
                        $all_dirs = glob($somePath. '/*' , GLOB_ONLYDIR);
                        foreach($all_dirs as $dir) {
                            $folder = str_replace ("./pend/", "", $dir);
                            echo '<option value="'.$folder.'">'.$folder.'</option>';
                        }
                        ?>
                    </select>
                    <div class="form-group mt-5">
                        <h4 class="text-center">Type User Friendly File Name if Needed.</h4>
                        <input class="form-control text-center" id="add-file-name" />
                    </div>
                    <div class="form-group text-center">
                        <input type="file" id="add-file">
                        <button class="btn btn-info" id="add-file-btn">Upload</button>
                    </div>
                </div>

                <!-- The Modal -->
                <div class="modal" id="pend-continue-modal">
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
                                        <h5>You didn't finish uploading required files. Do you wish to continue?</h5>
                                    </div>
                                </div>
                            </div>

                            <!-- Modal footer -->
                            <div class="modal-footer">
                                <button class="btn btn-primary" id="pend-continue-modal-ok-btn" data-dismiss="modal">YES</button>
                                <button type="button" class="btn btn-danger" id="pend-continue-modal-cancel-btn" data-dismiss="modal">No</button>
                            </div>

                        </div>
                    </div>
                </div>

                <br><br>
                <div id="form-03" style="display: none;">
                    <hr />
                    <h3 class="text-info text-center mb-5">Please upload PRIVATE MLS sheet that SHOWS commission to Buyer Agent.</h3>
                    <div class="form-group text-center">
                        <input type="file" name="file" id="file-03" accept=".pdf">
                        <a href="#" class="btn btn-info" id="file-upload-03">Upload</a>
                    </div>
                    <hr />
                </div>
                <div id="form-3" style="display: none;">
                    <hr />
                    <h3 class="text-info text-center mb-5">Please upload PA Consumer Notice</h3>
                    <div class="form-group text-center">
                        <input type="file" name="file" id="file" accept=".pdf">
                        <a href="#" class="btn btn-info" id="file-upload">Upload</a>
                    </div>
                    <hr />
                </div>
                <div id="form-4" style="display: none;">
                    <hr />
                    <h3 class="text-info text-center mb-5">Please Upload Buyer Agency Agreement</h3>
                    <div class="form-group text-center">
                        <input type="file" name="file" id="file-1" accept=".pdf">
                        <a href="#" class="btn btn-info" id="file-upload-1">Upload</a>
                    </div>
                    <hr />
                </div>
                <div id="form-5" style="display: none;">
                    <hr />
                    <h3 class="text-info text-center mb-5">Please Upload Sellers Disclosure</h3>
                    <div class="form-group text-center">
                        <input type="file" name="file" id="file-2" accept=".pdf">
                        <a href="#" class="btn btn-info" id="file-upload-2">Upload</a>
                    </div>
                    <hr />
                </div>
                <div id="form-6" style="display: none;">
                    <hr />
                    <h3 class="text-info text-center mb-5">Please Upload Lead Paint Disclosure</h3>
                    <div class="form-group text-center">
                        <input type="file" name="file" id="file-3" accept=".pdf">
                        <a href="#" class="btn btn-info" id="file-upload-3">Upload</a>
                    </div>
                    <hr />
                </div>
                <div id="form-7" style="display: none;">
                    <hr />
                    <h3 class="text-info text-center mb-5">Please Upload Proof of Funds</h3>
                    <div class="form-group text-center">
                        <input type="file" name="file" id="file-4" accept=".pdf">
                        <a href="#" class="btn btn-info" id="file-upload-4">Upload</a>
                    </div>
                    <hr />
                </div>
                <div id="form-8" style="display: none;">
                    <hr />
                    <h3 class="text-info text-center mb-5">Please upload Pre-Appoval.</h3>
                    <div class="form-group text-center">
                        <input type="file" name="file" id="file-5" accept=".pdf">
                        <a href="#" class="btn btn-info" id="file-upload-5">Upload</a>
                    </div>
                    <hr />
                </div>
                <div id="form-9" style="display: none;">
                    <hr />
                    <h3 class="text-info text-center mb-5">Please upload Estimated Closing Costs.</h3>
                    <div class="form-group text-center">
                        <input type="file" name="file" id="file-6" accept=".pdf">
                        <a href="#" class="btn btn-info" id="file-upload-6">Upload</a>
                    </div>
                    <hr />
                </div>
                <div id="form-10" style="display: none;">
                    <hr />
                    <h3 class="text-info text-center mb-5">Please upload Deposit Check</h3>
                    <div class="form-group text-center">
                        <input type="file" name="file" id="file-7" accept=".pdf">
                        <a href="#" class="btn btn-info" id="file-upload-7">Upload</a>
                    </div>
                    <hr />
                </div>
                <div id="form-11" style="display: none;">
                    <hr />
                    <h3 class="text-info text-center mb-5">Please upload Deposit Money Notice</h3>
                    <div class="form-group text-center">
                        <input type="file" name="file" id="file-8" accept=".pdf">
                        <a href="#" class="btn btn-info" id="file-upload-8">Upload</a>
                    </div>
                    <hr />
                </div>
                <div id="form-12" style="display: none;">
                    <hr />
                    <h3 class="text-info text-center mb-5">Please upload Agreement of Sale</h3>
                    <div class="form-group text-center">
                        <input type="file" name="file" id="file-9" accept=".pdf">
                        <a href="#" class="btn btn-info" id="file-upload-9">Upload</a>
                    </div>
                    <hr />
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
                                <button class="btn btn-primary" id="create-folder-ok-btn">OK</button>
                                <button type="button" class="btn btn-danger" id="create-folder-cancel-btn" data-dismiss="modal" style="display: none">Close</button>
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
                                <button class="btn btn-primary" id="file-upload-6-ok-btn">OK</button>
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
                                <button class="btn btn-primary" id="file-upload-7-ok-btn">OK</button>
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
                                <button class="btn btn-primary" id="file-upload-8-ok-btn">OK</button>
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
                                <button class="btn btn-primary" id="file-upload-9-ok-btn">OK</button>
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

        <tr>
            <td colspan="3" align="center">Closing a File Section</td>
        </tr>

        <tr>
            <td>
                <center>
                    <h1>CLOSED</h1>
                    <br />
                    Upload <u>NEW</u> CLOSED File. <br />
                    <a id="upload_close_new" class="button"><img class="upldDnldBtn" src="../_upload/img/uploadGR.jpg" /></a>

                    Upload <u>Additional</u> Docs to</br>Existing CLOSED File. <br/>
                    <a id="upload_close_additional" class="button"><img class="upldDnldBtn" src="../_upload/img/uploadGR.jpg" /></a>
                </center>
            </td>

            <td>
                <center id="close-description"><br /><h2><p>Closing a File</p></h2><p><font size="+1">Please have the following documents ready as clean PDF's BEFORE starting your upload.<br /><font size="-1">NOTE: If you uploaded some of these during the Pending Process you do NOT need to upload them again!<br /><br /><font size="+1">Inspection Reports, Repairs, Replies, Responses and Negotiations<br />Appraisal Reports, Repairs, Replies, Responses and Negotiations<br />Occupancy Applications,Reports, Repairs, Replies, Responses and Negotiations<br />Closing Date or any other type of Extensions<br />Amendatory Clauses, CTA's, etc<br />Final Walkthrough<br />Settlement Sheet</p></font></center>

                <div id="transaction-close" class="m-5" style="display: none;">
                    <h2 class="text-primary text-center mb-5">Select Transaction</h2>
                    <select class="form-control" id="close-transaction-dropdown">
                        <option value="" selected>--- Select Here ---</option>
                        <?php
                        foreach($all_dirs as $dir) {
                            $folder = str_replace ("./pend/", "", $dir);
                            echo '<option value="'.$folder.'">'.$folder.'</option>';
                        }
                        ?>
                    </select>
                    <div class="form-group mt-5 center">
                        <button class="btn btn-info" id="close-start-btn">Start Closing Process</button>
                    </div>
                </div>

                <div id="close-list-folders" class="m-5" style="display: none;">
                    <h2 class="text-primary text-center mb-5">Please Select Your Listing to Close</h2>
                    <select class="form-control" id="close-list-folders-dropdown">
                        <option value="" selected>--- Select Here ---</option>
                        <?php
                        $somePath = './list';
                        $all_close_dirs = glob($somePath. '/*' , GLOB_ONLYDIR);
                        foreach($all_close_dirs as $dir) {
                            $folder = str_replace ("./list/", "", $dir);
                            echo '<option value="'.$folder.'">'.$folder.'</option>';
                        }
                        ?>
                    </select>
                    <div class="form-group mt-5 center">
                        <button class="btn btn-info" id="close-list-btn">Close Listing</button>
                    </div>
                </div>

                <div id="close-folders" class="m-5" style="display: none;">
                    <h2 class="text-primary text-center mb-5">Select Transaction</h2>
                    <select class="form-control" id="close-folders-dropdown">
                        <option value="" selected>--- Select Here ---</option>
                        <?php
                        $somePath = './close';
                        $all_close_dirs = glob($somePath. '/*' , GLOB_ONLYDIR);
                        foreach($all_close_dirs as $dir) {
                            $folder = str_replace ("./close/", "", $dir);
                            echo '<option value="'.$folder.'">'.$folder.'</option>';
                        }
                        ?>
                    </select>
                    <div class="form-group mt-5">
                        <label>Type User Friendly File Name if Needed.</label>
                        <input name="text" class="form-control" id="close-additional-file-name">
                    </div>
                    <div class="form-group text-center">
                        <input type="file" name="file" id="close-additional-file" accept=".pdf">
                        <div class="mt-2">
                            <a class="btn btn-info" id="close-additional-upload-btn">Upload</a>
                        </div>
                    </div>
                </div>
                <br><br>

                <!-- The Modal -->
                <div class="modal" id="close-continue-modal">
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
                                        <h5>You didn't finish uploading required files. Do you wish to continue?</h5>
                                    </div>
                                </div>
                            </div>

                            <!-- Modal footer -->
                            <div class="modal-footer">
                                <button class="btn btn-primary" id="close-continue-modal-ok-btn" data-dismiss="modal">YES</button>
                                <button type="button" class="btn btn-danger" id="close-continue-modal-cancel-btn" data-dismiss="modal">No</button>
                            </div>

                        </div>
                    </div>
                </div>

                <div id="chapter-one-a-form" style="display: none;">
                    <h3 class="text-info text-center mb-5">Please upload Buyers Reply to Inspections and all relevant documents as a single PDF</h3>
                    <div class="form-group text-center">
                        <input type="file" name="file" id="file-one-a" accept=".pdf">
                        <a class="btn btn-info" class="btn btn-info" id="file-one-a-btn">Upload</a>
                    </div>
                    <hr />
                </div>

                <div id="chapter-one-b-form" style="display: none;">
                    <h3 class="text-info text-center mb-5">Please upload Sellers Response to BRI</h3>
                    <div class="form-group text-center">
                        <input type="file" name="file" id="file-one-b" accept=".pdf">
                        <a class="btn btn-info" class="btn btn-info" id="file-one-b-btn">Upload</a>
                    </div>
                    <hr />
                </div>

                <div id="chapter-one-c-form" style="display: none;">
                    <h3 class="text-info text-center mb-5">Please upload any additional documents related to Buyers Inspections as a single PDF.</h3>
                    <div class="form-group text-center">
                        <input type="file" name="file" id="file-one-c" accept=".pdf">
                        <a class="btn btn-info" class="btn btn-info" id="file-one-c-btn">Upload</a>
                    </div>
                    <hr />
                </div>

                <div id="chapter-two-a-form" style="display: none;">
                    <h3 class="text-info text-center mb-5">Please upload Appraisal Corrective Proposal (ACP) and all relevant documents as a single PDF.</h3>
                    <div class="form-group text-center">
                        <input type="file" name="file" id="file-two-a" accept=".pdf">
                        <a class="btn btn-info" class="btn btn-info" id="file-two-a-btn">Upload</a>
                    </div>
                    <hr />
                </div>

                <div id="chapter-two-b-form" style="display: none;">
                    <h3 class="text-info text-center mb-5">Please upload Sellers Response to ACP.</h3>
                    <div class="form-group text-center">
                        <input type="file" name="file" id="file-two-b" accept=".pdf">
                        <a class="btn btn-info" class="btn btn-info" id="file-two-b-btn">Upload</a>
                    </div>
                    <hr />
                </div>

                <div id="chapter-two-c-form" style="display: none;">
                    <h3 class="text-info text-center mb-5">Please upload any remaining documents related to Buyers ACP, and any RE-Inspections as a single PDF.</h3>
                    <div class="form-group text-center">
                        <input type="file" name="file" id="file-two-c" accept=".pdf">
                        <a class="btn btn-info" class="btn btn-info" id="file-two-c-btn">Upload</a>
                    </div>
                    <hr />
                </div>

                <div id="chapter-three-a-form" style="display: none;">
                    <h3 class="text-info text-center mb-5">Please upload a single, ordered PDF document containing all municipal required property transfer occupancy information.</h3>
                    <div class="form-group text-center">
                        <input type="file" name="file" id="file-three-a" accept=".pdf">
                        <a class="btn btn-info" class="btn btn-info" id="file-three-a-btn">Upload</a>
                    </div>
                    <hr />
                </div>

                <div id="chapter-four-a-form" style="display: none;">
                    <h3 class="text-info text-center mb-5">Please upload all closing date extensions, in order, through the actual closing date, as a single PDF.</h3>
                    <div class="form-group text-center">
                        <input type="file" name="file" id="file-four-a" accept=".pdf">
                        <a class="btn btn-info" class="btn btn-info" id="file-four-a-btn">Upload</a>
                    </div>
                    <hr />
                </div>

                <div id="chapter-five-a-form" style="display: none;">
                    <h3 class="text-info text-center mb-5">Upload an Additional Document and give it a user friendly name, if needed.</h3>
                    <div class="form-group">
                        <label>File Name</label>
                        <input class="form-control" id="file_name_a" type="text">
                    </div>
                    <div class="form-group text-center">
                        <input type="file" name="file" id="file-five-a" accept=".pdf">
                        <a class="btn btn-info" class="btn btn-info" id="file-five-a-btn">Upload</a>
                    </div>
                    <hr />
                </div>

                <div id="chapter-five-b-form" style="display: none;">
                    <h3 class="text-info text-center mb-5">Would you like to Upload Another File?</h3>
                    <div class="form-group">
                        <label>File Name</label>
                        <input class="form-control" id="file_name_b" type="text">
                    </div>
                    <div class="form-group text-center">
                        <input type="file" name="file" id="file-five-b" accept=".pdf">
                        <a class="btn btn-info" class="btn btn-info" id="file-five-b-btn">Upload</a>
                    </div>
                    <hr />
                </div>

                <div id="chapter-six-form" style="display: none;">
                    <h3 class="text-info text-center mb-5">Please upload a copy of the signed Final Walkthrough.</h3>
                    <div class="form-group text-center">
                        <input type="file" name="file" id="file-six" accept=".pdf">
                        <a class="btn btn-info" class="btn btn-info" id="file-six-btn">Upload</a>
                    </div>
                    <hr />
                </div>

                <div id="chapter-seven-form" style="display: none;">
                    <h3 class="text-info text-center mb-5">Please upload a copy of the signed Settlement Sheet.</h3>
                    <div class="form-group text-center">
                        <input type="file" name="file" id="file-seven" accept=".pdf">
                        <a class="btn btn-info" class="btn btn-info" id="file-seven-btn">Upload</a>
                    </div>
                    <hr />
                </div>

                <div id="close-final-form" style="display: none;">
                    <h3 class="text-info text-center mb-5">Please check the document you created and upload it.</h3>
                    <div class="form-group text-center">
                        <input type="file" name="file" id="final-file" accept=".pdf">
                        <a class="btn btn-info" class="btn btn-info" id="final-file-btn">Upload</a>
                    </div>
                    <hr />
                </div>
            </td>

            <td>
                <br/>
                <div style="height: 500px; overflow-y: auto; margin-top: 30px;">
                    <div class="arrange created-folder-title" id="close-created-folder-title" style="display: none;">
                        <h2>CLOSE :</h2>
                        <h4>John_Eric</h4>
                    </div>
                    <br/><br/><br/>
                    <div id="close-file-show"></div>
                </div>
            </td>
        </tr>


        <tr>
            <td colspan="3" align="center">Listing Section</td>
        </tr>


        <tr>
            <td>
                <center>
                    <h1>LISTING</h1>
                    <br />
                    Upload <u>NEW</u> LISTING File. <br />
                    <a id="upload_list_new" class="button"><img class="upldDnldBtn" src="../_upload/img/uploadBL.jpg" /></a>

                    Upload <u>Additional</u> Docs to</br>Existing CLOSED File. <br/>
                    <a id="upload_list_additional" class="button"><img class="upldDnldBtn" src="../_upload/img/uploadBL.jpg" /></a>
                </center>
                <br><br>
            </td>

            <td>
            <center id="close-description"><br /><h2><p>Set Up a NEW Listing Folder</p></h2><p><font size="+1">Please have the following documents ready as clean PDF's BEFORE starting your upload.<br /><br />Sellers Consumer Notice<br />Estimated Closing Cost<br />Sellers Property Disclosures<br />Lead Paint Disclosure<br />Listing Contract<br /><br />Any additional documents such as surveys, plot maps, roof warranty's, etc can be uploaded using the Additional Docs button after the listing is created.</p></font></center>


                <div id="list-folders" class="m-5" style="display: none;">
                    <h2 class="text-primary text-center mb-5">Select Transaction</h2>
                    <select class="form-control" id="list-folders-dropdown">
                        <option value="" selected>--- Select Here ---</option>
                        <?php
                        $somePath = './list';
                        $all_dirs = glob($somePath. '/*' , GLOB_ONLYDIR);
                        foreach($all_dirs as $dir) {
                            $folder = str_replace ("./list/", "", $dir);
                            echo '<option value="'.$folder.'">'.$folder.'</option>';
                        }
                        ?>
                    </select>
                    <div class="form-group mt-5">
                        <label>Type User Friendly File Name if Needed</label>
                        <input name="text" class="form-control" id="list-additional-file-name">
                    </div>
                    <div class="form-group text-center">
                        <input type="file" name="file" id="list-additional-file" accept=".pdf">
                        <div class="mt-2">
                            <a class="btn btn-info" id="list-additional-upload-btn">Upload</a>
                        </div>
                    </div>
                </div>

                <!-- The Modal -->
                <div class="modal" id="list-continue-modal">
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
                                        <h5>You didn't finish uploading required files. Do you wish to continue?</h5>
                                    </div>
                                </div>
                            </div>

                            <!-- Modal footer -->
                            <div class="modal-footer">
                                <button class="btn btn-primary" id="list-continue-modal-ok-btn" data-dismiss="modal">YES</button>
                                <button type="button" class="btn btn-danger" id="list-continue-modal-cancel-btn" data-dismiss="modal">No</button>
                            </div>

                        </div>
                    </div>
                </div>

                <div id="list-contract" class="mt-5 mb-5" style="display: none">
                    <h2 class="text-center text-primary">NEW Listing Contract</h2>
                    <div class="form-container">
                        <div class="form-group">
                            <label>Sellers Last Name</label>
                            <input type="text" class="form-control" name="" id="list-start-seller">
                        </div>
                        <div class="form-group">
                            <label>House #</label>
                            <input name="list-start-house"
                                   oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                   type = "number"
                                   maxlength = "4"
                                   class="form-control"
                                   id="list-start-house"
                            />
                        </div>
                        <div class="form-group">
                            <label>Direction</label>
                            <select type="text" class="form-control" name="" id="list-start-direction">
                                <option value=""></option>
                                <option value="N">N</option>
                                <option value="S">S</option>
                                <option value="E">E</option>
                                <option value="W">W</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Street Name</label>
                            <input type="text" class="form-control" name="" id="list-start-street">
                        </div>
                        <div class="form-group">
                            <label>Street Suffix</label>
                            <select type="text" class="form-control" name="" id="list-start-street-suffix">
                                <option value="Ave">Ave</option>
                                <option value="Bvd">Bvd</option>
                                <option value="Dr">Dr</option>
                                <option value="Ln">Ln</option>
                                <option value="Rd">Rd</option>
                                <option value="St" selected>St</option>
                                <option value="Trl">Trl</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-success w-100 mt-4" id="list-submit">Submit</button>
                        </div>
                    </div>
                </div>

                <div id="list-consumer-notice" class="mt-5 mb-5" style="display: none;">
                    <hr />
                    <h3 class="text-info text-center mb-5">Please upload Consumer Notice</h3>
                    <div class="form-group text-center">
                        <input type="file" name="file" id="file-list-consumer-notice" accept=".pdf">
                        <a class="btn btn-info" id="file-list-consumer-notice-btn">Upload</a>
                    </div>
                    <hr />
                </div>

                <div id="list-estimated-closing-cost" class="mt-5 mb-5" style="display: none;">
                    <hr />
                    <h3 class="text-info text-center mb-5">Please upload the Sellers Estimated Closing Cost Sheet</h3>
                    <div class="form-group text-center">
                        <input type="file" name="file" id="file-list-estimated-closing-cost" accept=".pdf">
                        <a class="btn btn-info" id="file-list-estimated-closing-cost-btn">Upload</a>
                    </div>
                    <hr />
                </div>

                <div id="list-sellers-property-disclosure" class="mt-5 mb-5" style="display: none;">
                    <hr />
                    <h3 class="text-info text-center mb-5">Please upload the Sellers Property Disclosure</h3>
                    <div class="form-group text-center">
                        <input type="file" name="file" id="file-list-sellers-property-disclosure" accept=".pdf">
                        <a class="btn btn-info" id="file-list-sellers-property-disclosure-btn">Upload</a>
                    </div>
                    <hr />
                </div>

                <div id="list-lead-paint-disclosure" class="mt-5 mb-5" style="display: none;">
                    <hr />
                    <h3 class="text-info text-center mb-5">Please upload the Lead Paint Disclosure</h3>
                    <div class="form-group text-center">
                        <input type="file" name="file" id="file-list-lead-paint-disclosure" accept=".pdf">
                        <a class="btn btn-info" id="file-list-lead-paint-disclosure-btn">Upload</a>
                    </div>
                    <hr />
                </div>

                <div id="list-listing-contract" class="mt-5 mb-5" style="display: none;">
                    <hr />
                    <h3 class="text-info text-center mb-5">Please upload your Listing Contract</h3>
                    <div class="form-group text-center">
                        <input type="file" name="file" id="file-list-listing-contract" accept=".pdf">
                        <a class="btn btn-info" id="file-list-listing-contract-btn">Upload</a>
                    </div>
                    <hr />
                </div>

            </td>


            <td>

                <br/>
                <div style="height: 500px; overflow-y: auto; margin-top: 30px; display: none" id="list-created-folder-title">
                    <div class="arrange created-folder-title" style="display: flex;">
                        <h2>List :</h2>
                        <h4>John_123_Brand</h4>
                    </div>
                    <br/><br/><br/>
                    <div id="list-file-show"></div>
                </div>

            </td>

    </table>



    <!-- The Modal -->
    <div class="modal" id="list-lead-paint-disclosure-modal">
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
                            <h5>Is there a Lead Paint Disclosure?</h5>
                        </div>
                    </div>
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button class="btn btn-primary" id="list-lead-paint-disclosure-modal-ok-btn">Yes</button>
                    <button type="button" class="btn btn-danger" id="list-lead-paint-disclosure-modal-cancel-btn" data-dismiss="modal" style="display: none;"></button>
                    <button type="button" class="btn btn-danger" id="list-lead-paint-disclosure-modal-no-btn" data-dismiss="modal">No</button>
                </div>

            </div>
        </div>
    </div>

    <!-- The Modal -->
    <div class="modal" id="list-start-confirm">
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
                            <h5>The folder has been created, please upload files now.</h5>
                        </div>
                    </div>
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button class="btn btn-primary" id="list-start-confirm-ok-btn">OK</button>
                    <button type="button" class="btn btn-danger" id="list-start-confirm-modal-cancel-btn" data-dismiss="modal" style="display: none;"></button>
                </div>

            </div>
        </div>
    </div>







    <!-- The Modal -->
    <div class="modal" id="close-start-confirm">
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
                            <h5>Do you wish to upload additional closing documents at this time?</h5>
                        </div>
                    </div>
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button class="btn btn-primary" id="close-start-confirm-ok-btn">OK</button>
                    <button type="button" class="btn btn-danger" id="close-start-confirm-no-btn" data-dismiss="modal" style="display: none;">No</button>
                    <button type="button" class="btn btn-danger" id="close-start-confirm-cancel-btn" data-dismiss="modal">No</button>
                </div>

            </div>
        </div>
    </div>


    <!-- The Modal -->
    <div class="modal" id="close-listing-modal">
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
                            <h5>Your Pending Files have been Transferred to the new Closed Folder.
                                <BR><BR>
                                Do YOU also have the listing side of this transaction?
                            </h5>
                        </div>
                    </div>
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button class="btn btn-primary" id="close-listing-modal-ok-btn">Yes</button>
                    <button type="button" class="btn btn-danger" id="close-listing-modal-no-btn" data-dismiss="modal">No</button>
                    <button type="button" class="btn btn-danger" id="close-listing-modal-cancel-btn" data-dismiss="modal" style="display: none;">No</button>
                </div>

            </div>
        </div>
    </div>

    <!-- The Modal -->
    <div class="modal" id="close-start-modal">
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
                            <h5>Your Pending Files have been Transferred to the new Closed Folder.
                                <BR><BR>
                                Do you wish to upload additional closing documents at this time?
                            </h5>
                        </div>
                    </div>
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button class="btn btn-primary" id="close-start-modal-ok-btn">Yes</button>
                    <button type="button" class="btn btn-danger" id="close-start-modal-no-btn" data-dismiss="modal" style="display: none;">No</button>
                    <button type="button" class="btn btn-danger" id="close-start-modal-cancel-btn" data-dismiss="modal">No</button>
                </div>

            </div>
        </div>
    </div>

    <!-- The Modal -->
    <div class="modal" id="chapter-one-modal">
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
                            <h5>Were any of the optional Buyer Inspections elected?</h5>
                        </div>
                    </div>
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button class="btn btn-primary" id="chapter-one-modal-ok-btn">Yes</button>
                    <button type="button" class="btn btn-danger" id="chapter-one-modal-cancel-btn" data-dismiss="modal" style="display: none;"></button>
                    <button type="button" class="btn btn-danger" id="chapter-one-modal-no-btn" data-dismiss="modal">No</button>
                </div>

            </div>
        </div>
    </div>

    <!-- The Modal -->
    <div class="modal" id="chapter-one-a-modal">
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
                            <h5>Have you previously uploaded the Buyers Reply to Inspections & any pages from inspection, if applicable?</h5>
                        </div>
                    </div>
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button class="btn btn-primary" id="chapter-one-a-modal-ok-btn">Yes</button>
                    <button type="button" class="btn btn-danger" id="chapter-one-a-modal-cancel-btn" data-dismiss="modal" style="display: none;"></button>
                    <button type="button" class="btn btn-danger" id="chapter-one-a-modal-no-btn" data-dismiss="modal">No</button>
                </div>

            </div>
        </div>
    </div>

    <!-- The Modal -->
    <div class="modal" id="chapter-one-b-modal">
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
                            <h5>Have you previously uploaded the Sellers Response to BRI?</h5>
                        </div>
                    </div>
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button class="btn btn-primary" id="chapter-one-b-modal-ok-btn">Yes</button>
                    <button type="button" class="btn btn-danger" id="chapter-one-b-modal-cancel-btn" data-dismiss="modal" style="display: none;"></button>
                    <button type="button" class="btn btn-danger" id="chapter-one-b-modal-no-btn" data-dismiss="modal">No</button>
                </div>

            </div>
        </div>
    </div>

    <!-- The Modal -->
    <div class="modal" id="chapter-one-c-modal">
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
                            <h5>Have you previously uploaded any remaining documents related to Buyers                Inspections?</h5>
                        </div>
                    </div>
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button class="btn btn-primary" id="chapter-one-c-modal-ok-btn">Yes</button>
                    <button type="button" class="btn btn-danger" id="chapter-one-c-modal-cancel-btn" data-dismiss="modal" style="display: none;"></button>
                    <button type="button" class="btn btn-danger" id="chapter-one-c-modal-no-btn" data-dismiss="modal">No</button>
                </div>

            </div>
        </div>
    </div>

    <!-- The Modal -->
    <div class="modal" id="chapter-two-modal">
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
                            <h5>Were any repairs required by Appraiser?</h5>
                        </div>
                    </div>
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button class="btn btn-primary" id="chapter-two-modal-ok-btn">Yes</button>
                    <button type="button" class="btn btn-danger" id="chapter-two-modal-cancel-btn" data-dismiss="modal" style="display: none;"></button>
                    <button type="button" class="btn btn-danger" id="chapter-two-modal-no-btn" data-dismiss="modal">No</button>
                </div>

            </div>
        </div>
    </div>

    <!-- The Modal -->
    <div class="modal" id="chapter-two-a-modal">
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
                            <h5>Have you previously uploaded the Buyers Reply to Appraisal Required Repairs (Appraisal Corrective Proposal) & any pages from the appraisal, if applicable?</h5>
                        </div>
                    </div>
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button class="btn btn-primary" id="chapter-two-a-modal-ok-btn">Yes</button>
                    <button type="button" class="btn btn-danger" id="chapter-two-a-modal-cancel-btn" data-dismiss="modal" style="display: none;"></button>
                    <button type="button" class="btn btn-danger" id="chapter-two-a-modal-no-btn" data-dismiss="modal">No</button>
                </div>

            </div>
        </div>
    </div>

    <!-- The Modal -->
    <div class="modal" id="chapter-two-b-modal">
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
                            <h5>Have you previously uploaded the Sellers Response to ACP?</h5>
                        </div>
                    </div>
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button class="btn btn-primary" id="chapter-two-b-modal-ok-btn">Yes</button>
                    <button type="button" class="btn btn-danger" id="chapter-two-b-modal-cancel-btn" data-dismiss="modal" style="display: none;"></button>
                    <button type="button" class="btn btn-danger" id="chapter-two-b-modal-no-btn" data-dismiss="modal">No</button>
                </div>

            </div>
        </div>
    </div>

    <!-- The Modal -->
    <div class="modal" id="chapter-two-c-modal">
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
                            <h5>Have you previously uploaded any remaining documents related to Buyers ACP, and any RE-Inspections?</h5>
                        </div>
                    </div>
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button class="btn btn-primary" id="chapter-two-c-modal-ok-btn">Yes</button>
                    <button type="button" class="btn btn-danger" id="chapter-two-c-modal-cancel-btn" data-dismiss="modal" style="display: none;"></button>
                    <button type="button" class="btn btn-danger" id="chapter-two-c-modal-no-btn" data-dismiss="modal">No</button>
                </div>

            </div>
        </div>
    </div>

    <!-- The Modal -->
    <div class="modal" id="chapter-three-modal">
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
                            <h5>Because every municipality has different requirements related to occupancy it is impossible to specify which documents should be uploaded for a given transaction.<br><br> It is critical you have contacted the municipality for the appropriate procedures, as related to Paragraph 15(B) of form ASR.<br><br> These can include an Occupancy Inspection Report, Certificate of Occupancy, Property Transfer Certificate, moving fees, waivers, etc.<br><br> Please gather all these documents, into a single and ordered PDF for upload</h5>
                            <h5>Does the Municipality require any of the documents or procedures described above?</h5>
                        </div>
                    </div>
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button class="btn btn-primary" id="chapter-three-modal-ok-btn">Yes</button>
                    <button type="button" class="btn btn-danger" id="chapter-three-modal-cancel-btn" data-dismiss="modal" style="display: none;"></button>
                    <button type="button" class="btn btn-danger" id="chapter-three-modal-no-btn" data-dismiss="modal">No</button>
                </div>

            </div>
        </div>
    </div>

    <!-- The Modal -->
    <div class="modal" id="chapter-three-a-modal">
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
                            <h5>Have you previously uploaded a single, ordered PDF document containing all municipal required property transfer occupancy information?</h5>
                        </div>
                    </div>
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button class="btn btn-primary" id="chapter-three-a-modal-ok-btn">Yes</button>
                    <button type="button" class="btn btn-danger" id="chapter-three-a-modal-cancel-btn" data-dismiss="modal" style="display: none;"></button>
                    <button type="button" class="btn btn-danger" id="chapter-three-a-modal-no-btn" data-dismiss="modal">No</button>
                </div>

            </div>
        </div>
    </div>

    <!-- The Modal -->
    <div class="modal" id="chapter-four-modal">
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
                            <h5>Are there any closing date extensions?</h5>
                        </div>
                    </div>
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button class="btn btn-primary" id="chapter-four-modal-ok-btn">Yes</button>
                    <button type="button" class="btn btn-danger" id="chapter-four-modal-cancel-btn" data-dismiss="modal" style="display: none;"></button>
                    <button type="button" class="btn btn-danger" id="chapter-four-modal-no-btn" data-dismiss="modal">No</button>
                </div>

            </div>
        </div>
    </div>

    <!-- The Modal -->
    <div class="modal" id="chapter-four-a-modal">
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
                            <h5>Have you previously uploaded all closing date extensions, up to and including the actual closing date?</h5>
                        </div>
                    </div>
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button class="btn btn-primary" id="chapter-four-a-modal-ok-btn">Yes</button>
                    <button type="button" class="btn btn-danger" id="chapter-four-a-modal-cancel-btn" data-dismiss="modal" style="display: none;"></button>
                    <button type="button" class="btn btn-danger" id="chapter-four-a-modal-no-btn" data-dismiss="modal">No</button>
                </div>

            </div>
        </div>
    </div>

    <!-- The Modal -->
    <div class="modal" id="chapter-five-modal">
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
                            <h5>Other than the Final Walkthrough and Settlement Sheet, are there ANY other addendums or important documents, emails, receipts, reports, etc., that should be made part of the permanent file? Example: FHA Amendatory Clause, CTA's, personal property addendums, etc?</h5>
                        </div>
                    </div>
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button class="btn btn-primary" id="chapter-five-modal-ok-btn">Yes</button>
                    <button type="button" class="btn btn-danger" id="chapter-five-modal-cancel-btn" data-dismiss="modal" style="display: none;"></button>
                    <button type="button" class="btn btn-danger" id="chapter-five-modal-no-btn" data-dismiss="modal">No</button>
                </div>

            </div>
        </div>
    </div>

    <!-- The Modal -->
    <div class="modal" id="chapter-five-a-modal">
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
                            <h5>Upload an Additional Document and give it a user friendly name, if needed?</h5>
                        </div>
                    </div>
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button class="btn btn-primary" id="chapter-five-a-modal-ok-btn">Yes</button>
                </div>

            </div>
        </div>
    </div>

    <!-- The Modal -->
    <div class="modal" id="chapter-five-b-modal">
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
                            <h5>Would you like to Upload Another File?</h5>
                        </div>
                    </div>
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button class="btn btn-primary" id="chapter-five-b-modal-ok-btn">Yes</button>
                    <button type="button" class="btn btn-danger" id="chapter-five-b-modal-cancel-btn" data-dismiss="modal" style="display: none;"></button>
                    <button type="button" class="btn btn-danger" id="chapter-five-b-modal-no-btn" data-dismiss="modal">No</button>
                </div>

            </div>
        </div>
    </div>

    <!-- The Modal -->
    <div class="modal fade" id="final-modal">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Commission Distribution</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <div class="form-container" id="content">
                        <h3 class="center text-primary" id="final-modal-title"></h3>
                        <div class="section row">
                            <div class="col-6">
                                <div class="input-group mb-3 input-group-sm">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Seller Full Name</span>
                                    </div>
                                    <input type="text" class="form-control" id="final-seller" required>
                                </div>
                                <div class="form-group">
                                    <label>Sellers Agent:</label>
                                    <input class="form-control" id="final-seller-agent">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="input-group mb-3 input-group-sm">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Buyer Full Name</span>
                                    </div>
                                    <input type="text" class="form-control" id="final-buyer" required>
                                </div>
                                <div class="form-group">
                                    <label>Buyers Agent:</label>
                                    <input class="form-control" id="final-buyer-agent" required>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <label>Property Full Address:</label>
                        <div class="row">
                            <div class="col-3">
                                <div class="input-group mb-3 input-group-sm">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">House #</span>
                                    </div>
                                    <input type="text" class="form-control" id="final-house" required>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="input-group mb-3 input-group-sm">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Street</span>
                                    </div>
                                    <input type="text" class="form-control" id="final-street" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="input-group mb-3 input-group-sm">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">City</span>
                                    </div>
                                    <input type="text" class="form-control" id="final-city" required>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="input-group mb-3 input-group-sm">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">State</span>
                                    </div>
                                    <select class="form-control" id="final-state">
                                        <option>PA</option>
                                        <option>NJ</option>
                                        <option>NY</option>
                                        <option>FL</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="input-group mb-3 input-group-sm">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Zip</span>
                                    </div>
                                    <input type="text" class="form-control" id="final-zip" maxlength="15" required>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-4">
                                <div class="input-group mb-3 input-group-sm">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">MLS System</span>
                                    </div>
                                    <input type="text" class="form-control" id="final-mls" onkeyup="this.value = this.value.toUpperCase();" required>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="input-group mb-3 input-group-sm">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">MLS #</span>
                                    </div>
                                    <input type="text" class="form-control" id="final-mls2" required>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="input-group mb-3 input-group-sm">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Closing Date</span>
                                    </div>
                                    <input type="date" class="form-control" id="final-closing-date" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="input-group mb-3 input-group-sm">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Title Company</span>
                                    </div>
                                    <select class="form-control" id="final-company-name">
                                        <option value="">--- Choose from list ---</option>
                                        <option value="Covenant Abstract">Covenant Abstract</option>
                                        <option value="Fox Ridge Abstract">Fox Ridge Abstract</option>
                                        <option value="Surety Land Abstract">Surety Land Abstract</option>
                                        <option value="Toma Abstract">Toma Abstract</option>
                                        <option value="Other">Other - please enter below</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="input-group mb-3 input-group-sm">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Phone</span>
                                    </div>
                                    <input type="text" class="form-control" id="final-phone" required>
                                </div>
                            </div>
                        </div>
                        <div class="row" id="final-other-company-div" style="display: none">
                            <div class="col-6">
                                <div class="input-group mb-3 input-group-sm">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Enter Company Name</span>
                                    </div>
                                    <input type="text" class="form-control" id="final-other-company" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
<!--                            <div class="col-6">-->
<!--                                <div class="input-group mb-3 input-group-sm">-->
<!--                                    <div class="input-group-prepend">-->
<!--                                        <span class="input-group-text">Other</span>-->
<!--                                    </div>-->
<!--                                    <input type="text" class="form-control" id="final-other" required>-->
<!--                                </div>-->
<!--                            </div>-->
                            <div class="col-6">
                                <div class="input-group mb-3 input-group-sm">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Email</span>
                                    </div>
                                    <input type="email" class="form-control" id="final-email" required>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="section row" >
                            <div class="col-12">
                                <div class="row">
                                    <label class="col-8">Have you picked up and returned the ELB to the office?</label>
                                    <div class="col-4" style="display: flex; justify-content: space-between;">
                                        <div>
                                            <label for="switch1">Yes</label>
                                            <input type="radio" id="switch1" name="elb" value="Yes">
                                        </div>
                                        <div>
                                            <label for="switch2">No</label>
                                            <input type="radio" id="switch2" name="elb" value="No">
                                        </div>
                                        <div>
                                            <label for="switch3">N/A</label>
                                            <input type="radio" id="switch3" name="elb" value="N/A">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-8">Have you picked up your yard sign?</label>
                                    <div class="col-4" style="display: flex; justify-content: space-between;">
                                        <div>
                                            <label for="switch4">Yes</label>
                                            <input type="radio" id="switch4" name="yard" value="Yes">
                                        </div>
                                        <div>
                                            <label for="switch5">No</label>
                                            <input type="radio" id="switch5" name="yard" value="No">
                                        </div>
                                        <div>
                                            <label for="switch6">N/A</label>
                                            <input type="radio" id="switch6" name="yard" value="N/A">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-8">If not in your MLS, have you put listing in for information only?</label>
                                    <div class="col-4" style="display: flex; justify-content: space-between;">
                                        <div>
                                            <label for="switch7">Yes</label>
                                            <input type="radio" id="switch7" name="listing" value="Yes">
                                        </div>
                                        <div>
                                            <label for="switch8">No</label>
                                            <input type="radio" id="switch8" name="listing" value="No">
                                        </div>
                                        <div>
                                            <label for="switch9">N/A</label>
                                            <input type="radio" id="switch9" name="listing" value="N/A">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-8">Within 5 miles of Hazleton, have you requested a sold sign install?</label>
                                    <div class="col-4" style="display: flex; justify-content: space-between;">
                                        <div>
                                            <label for="switch10">Yes</label>
                                            <input type="radio" id="switch10" name="sold" value="Yes">
                                        </div>
                                        <div>
                                            <label for="switch11">No</label>
                                            <input type="radio" id="switch11" name="sold" value="No">
                                        </div>
                                        <div>
                                            <label for="switch12">N/A</label>
                                            <input type="radio" id="switch12" name="sold" value="N/A">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="section row" >
                            <div class="col-12">
                                <div class="form-group">
                                    <label>Lead Source</label>
                                    <select class="form-control" id="lead-source">
                                        <option value="">--- Choose one ---</option>
                                        <option value="Corporate Lead">Corporate Lead</option>
                                        <option value="Agent Lead">Agent Lead</option>
                                        <option value="Rocket Lead">Rocket Lead</option>
                                    </select>
                                </div>
                                <div class="input-group mb-3 input-group-sm">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Sales Price ($)</span>
                                    </div>
                                    <input type="text" class="form-control" id="sales-price" data-maxlength="15" oninput="this.value=this.value.slice(0,this.dataset.maxlength)" required>
                                </div>
                                <div class="input-group mb-3 input-group-sm">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Seller Assist ($)</span>
                                    </div>
                                    <input type="text" maxlength="15" class="form-control" id="seller-assist" oninput="this.value=this.value.slice(0,this.dataset.maxlength)" required>
                                </div>
                                <div class="input-group mb-3 input-group-sm">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Gross Commission Amount ($)</span>
                                    </div>
                                    <input type="text" class="form-control" data-maxlength="15" id="gross-commission-amount" oninput="this.value=this.value.slice(0,this.dataset.maxlength)" required>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row mb-5">
                            <div class="col-10"><h4 class="text-right">Please upload a copy of this form to your file ></h4></div>
                            <div class="col-2"><button type="button" class="btn btn-primary doc-btn" id="upload">Upload</button></div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-10"><h4 class="text-right">Please print a copy of this form ></h4></div>
                            <div class="col-2"><button type="button" class="btn btn-info doc-btn" id="download">Print</button></div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-12">
                                <h5>Please mail THIS Printed Document, along with Commission Check, and any Referral Fee Agreement, to:</h5>
                                <p class="mb-0">Action Real Estate</p>
                                <p class="mb-0">106 State Route 93 HWY</p>
                                <p class="mb-0">Hazleton, PA 18202</p>
                                <p>Attn: Closing</p>
                            </div>
                            <div class="col-10"><h4 class="text-right">Please close this document at this time ></h4></div>
                            <div class="col-2">
                                <button type="button" class="btn btn-secondary doc-btn" id="download-close" data-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-secondary doc-btn" id="download-close-ok" data-dismiss="modal" style="display: none"></button>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <div id="editor"></div>

    <!-- The Modal -->
    <div class="modal" id="chapter-final-modal">
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
                            <h5>Please check the document you created and upload it on server!</h5>
                        </div>
                    </div>
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button class="btn btn-primary" id="chapter-final-modal-ok-btn">OK</button>
                    <button type="button" class="btn btn-danger" id="chapter-final-modal-cancel-btn" data-dismiss="modal" style="display: none;"></button>
                </div>

            </div>
        </div>
    </div>













    <br />

</div><!-- end wrapper -->

</body>

<script src="/e/assets/js/upload.js"></script>
</html>