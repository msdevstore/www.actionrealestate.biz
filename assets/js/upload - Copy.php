$(document).ready(function() {
	$('#upload_new').click(function() {
        modalOpen("pend-start-confirm-modal");
	});

	$('#pend-start-confirm-ok-btn').click(function() {
        $('#pend-status').val(1);
        $('#form-1').css('display', 'none');
        $('#form-2').css('display', 'block');
        $('#form-03').css('display', 'none');
        $('#form-3').css('display', 'none');
        $('#form-4').css('display', 'none');
        $('#form-5').css('display', 'none');
        $('#form-6').css('display', 'none');
        $('#form-7').css('display', 'none');
        $('#form-8').css('display', 'none');
        $('#form-9').css('display', 'none');
        $('#form-10').css('display', 'none');
        $('#form-11').css('display', 'none');
        $('#form-12').css('display', 'none');
        $('#created-folder-title').css('display', 'none');
        $('#file-show').empty();
        $('#transaction-form').css('display', 'none');
    })

    $('#pend-start-confirm-no-btn').click(function() {
        $('#pend-status').val(0);
        $('#form-1').css('display', 'none');
        $('#form-2').css('display', 'block');
        $('#form-03').css('display', 'none');
        $('#form-3').css('display', 'none');
        $('#form-4').css('display', 'none');
        $('#form-5').css('display', 'none');
        $('#form-6').css('display', 'none');
        $('#form-7').css('display', 'none');
        $('#form-8').css('display', 'none');
        $('#form-9').css('display', 'none');
        $('#form-10').css('display', 'none');
        $('#form-11').css('display', 'none');
        $('#form-12').css('display', 'none');
        $('#created-folder-title').css('display', 'none');
        $('#file-show').empty();
        $('#transaction-form').css('display', 'none');
    })

    $('#upload_additional').click(function() {
        $('#form-1').css('display', 'none');
        $('#form-2').css('display', 'none');
        $('#form-3').css('display', 'none');
        $('#form-03').css('display', 'none');
        $('#form-4').css('display', 'none');
        $('#form-5').css('display', 'none');
        $('#form-6').css('display', 'none');
        $('#form-7').css('display', 'none');
        $('#form-8').css('display', 'none');
        $('#form-9').css('display', 'none');
        $('#form-10').css('display', 'none');
        $('#form-11').css('display', 'none');
        $('#form-12').css('display', 'none');
        let folder = $('#transaction-dropdown').val();
        $('#created-folder-title h4').html(folder);
        $('#created-folder-title').css('display', 'flex');
        GetFiles();
        $('#transaction-form').css('display', 'block');
    });

	var pendFiles = [];

    $('#transaction-dropdown').change(function() {
        let folder = $('#transaction-dropdown').val();
        $('#created-folder-title h4').html(folder);
        // GetFiles();
        if(folder.length > 0) {
            var formData = new FormData();
            formData.append('type', 'getFiles');
            formData.append('folder', folder);
            $.ajax({
                url: "/e/controllers/Upload.php",
                type: 'post',
                enctype: 'multipart/form-data',
                contentType: false,
                processData: false,
                data: formData,
                success:function(res) {
                    var files = JSON.parse(res);
                    $('#file-show').empty();
                    files.forEach((file, index) => {
                        $('#file-show').prepend(`<div class="arrange file-title">
                            <div class="icon">
                                <a href="#"><img src="/e/assets/img/pdf.png" width="100%" height="100%" alt="" title="" /></a>
                            </div>
                            <h4 class="text-center m-0">${file['name']}</h4>
                            <div class="icon">
                                <a href="#" class="filemenu-btn" num="${index}"><img src="/e/assets/img/tools.png" width="100%" height="100%" alt="" title="" /></a>
                                <ul class="submenu" id="submenu-${index}">
                                    <li><a class="mail-btn" folder=${folder} file="${file['name']}" path="./pend/${folder}/${file['name']}">Email</a></li>
                                    <li><a href="./pend/${folder}/${file['name']}" target="_blank">Download</a></li>
                                    <li><a href="./pend/${folder}/${file['name']}" target="_blank">Print</a></li>
                                </ul>
                            </div>
                        </div>
                        <br>`);
                    });
                    if(files.findIndex(file => file['name'] === 'Agreement of Sale.pdf') < 0) {
                        pendFiles = files;
                        modalOpen('pend-continue-modal');
                    }
                }
            })
        }
    })

    $('#pend-continue-modal-ok-btn').click(function() {
        console.log(pendFiles);
        $('#transaction-form').hide();
        if(pendFiles.findIndex(file => file['name'] === 'PRIVATE MLS sheet.pdf') < 0) {
            $('#form-2').css('display', 'none');
            $('#form-03').css('display', 'block');
        }
        else if(pendFiles.findIndex(file => file['name'] === 'Consumer Notice.pdf') < 0) {
            $('#form-2').css('display', 'none');
            $('#form-3').css('display', 'block');
        } else if(pendFiles.findIndex(file => file['name'] === 'Buyer Agency Agreement.pdf') < 0) {
            $('#form-2').css('display', 'none');
            modalOpen('file-upload-1-modal');
        } else if(pendFiles.findIndex(file => file['name'] === 'Sellers Disclosure.pdf') < 0) {
            $('#form-2').css('display', 'none');
            modalOpen('file-upload-2-modal')
        } else if(pendFiles.findIndex(file => file['name'] === 'Lead Paint Disclosure.pdf') < 0) {
            $('#form-2').css('display', 'none');
            modalOpen('file-upload-3-modal')
        } else if(pendFiles.findIndex(file => file['name'] === 'Proof of Funds.pdf') < 0 && pendFiles.findIndex(file => file['name'] === 'PreAppoval.pdf') < 0) {
            $('#form-2').css('display', 'none');
            modalOpen('file-upload-4-modal')
        } else if(pendFiles.findIndex(file => file['name'] === 'Estimated Closing Costs.pdf') < 0) {
            $('#form-2').css('display', 'none');
            modalOpen('file-upload-6-modal')
        } else if(pendFiles.findIndex(file => file['name'] === 'Deposit Check.pdf') < 0) {
            $('#form-2').css('display', 'none');
            modalOpen('file-upload-7-modal')
        } else if(pendFiles.findIndex(file => file['name'] === 'Deposit Money Notice.pdf') < 0) {
            $('#form-2').css('display', 'none');
            modalOpen('file-upload-8-modal')
        } else if(pendFiles.findIndex(file => file['name'] === 'Agreement of Sale.pdf') < 0) {
            $('#form-2').css('display', 'none');
            modalOpen('file-upload-9-modal')
        }
    })

    function GetFiles() {
        var folder = $('#transaction-dropdown').val();
        if(folder.length > 0) {
            var formData = new FormData();
            formData.append('type', 'getFiles');
            formData.append('folder', folder);
            $.ajax({
                url: "/e/controllers/Upload.php",
                type: 'post',
                enctype: 'multipart/form-data',
                contentType: false,
                processData: false,
                data: formData,
                success:function(res) {
                    var files = JSON.parse(res);
                    $('#file-show').empty();
                    files.forEach((file, index) => {
                        $('#file-show').prepend(`<div class="arrange file-title">
                            <div class="icon">
                                <a href="#"><img src="/e/assets/img/pdf.png" width="100%" height="100%" alt="" title="" /></a>
                            </div>
                            <h4 class="text-center m-0">${file['name']}</h4>
                            <div class="icon">
                                <a href="#" class="filemenu-btn" num="${index}"><img src="/e/assets/img/tools.png" width="100%" height="100%" alt="" title="" /></a>
                                <ul class="submenu" id="submenu-${index}">
                                    <li><a class="mail-btn" folder=${folder} file="${file['name']}" path="./pend/${folder}/${file['name']}">Email</a></li>
                                    <li><a href="./pend/${folder}/${file['name']}" target="_blank">Download</a></li>
                                    <li><a href="./pend/${folder}/${file['name']}" target="_blank">Print</a></li>
                                </ul>
                            </div>
                        </div>
                        <br>`);
                    });
                }
            })
        }
    }



    $(document).on('click', '.mail-btn', function() {
        const link = new URL($(this).attr('path'), document.baseURI).href;
        const file = $(this).attr('file');
        $('#maillink').val(link);
        $('#mailfile').val(file);
        $('#modal-btn').attr('data-target', '#mail-modal');
        $('#modal-btn').click();
    })
    $('#mail-ok-btn').click(function() {
        const to = $('#mailto').val();
        const subject = $('#mailsubject').val();
        const message = $('#mailmessage').val();
        if(!to || !subject) {
            alert("Please input Email address and Subject!");
        } else {
            $.ajax({
                url: "/e/controllers/Mail.php",
                type: "post",
                data: {
                    to: to,
                    subject: subject,
                    message: message,
                    link: $('#maillink').val(),
                    file: $('#mailfile').val(),
                },
                success: function(res) {
                    if(res) {
                        alert("Email was sent successfully!");
                        $('#mailmessage').val('');
                    }
                    else alert("Something happened!")
                },
                error: function(err) {
                    alert("Something happened!")
                }
            })
        }
    })

	$('#create-folder').click(function() {
		var seller = $('#seller-name').val();
		var buyer = $('#buyer-name').val();
		if(!seller || ! buyer) alert("You didn't input all names!");
		else {
            seller = titleCase(seller);
            buyer = titleCase(buyer);
			$.ajax({
				url: "/e/controllers/Upload.php",
				type: "post",
				data: {
					type: "createFolder",
					seller: seller,
					buyer: buyer
				},
				success: function(res) {
					var folder = seller + "_to_" + buyer;
					if(res == 1) {
						$('#transaction-dropdown').prepend("<option value='" + folder + "'>" + folder + "</option>");
                        $('#transaction-dropdown').val(folder).change();
                        $('#created-folder-title h4').html(folder);
                        $('#created-folder-title').css('display', 'flex');
                        var txt = "The folder '" + folder + "' has been created.<br>Please Upload Files Now";
                        $('#create-folder-content').html(txt);
                        $('#modal-btn').attr('data-target', '#create-folder-modal');
                        $('#modal-btn').click();
					}else {
                        var folders = JSON.parse(res);
                        folders.splice(0, 2);
                        console.log(folders);
                        var len = folders.length;
                        $('#transaction-dropdown').val(folder).change();
                        $('#created-folder-title h4').html(folder);
                        $('#created-folder-title').css('display', 'flex');
                        alert("Folder Already Exists - Please Finish Uploading Minimum Required Docs");
                        $('#file-show').empty();
                        folders.forEach(item => {
                            $('#file-show').prepend(`<div class="arrange file-title">
                                <div class="icon">
                                    <a href="#"><img src="/e/assets/img/pdf.png" width="100%" height="100%" alt="" title="" /></a>
                                </div>
                                <h4 class="text-center m-0">${item.slice(0, -4)}</h4>
                                <div class="icon">
                                    <a href="#"><img src="/e/assets/img/tools.png" width="100%" height="100%" alt="" title="" /></a>
                                </div>
                            </div>
                            <br>`);
                        });

                        if(folders.indexOf('PRIVATE MLS sheet.pdf') < 0) {
                            $('#form-2').css('display', 'none');
                            $('#form-03').css('display', 'block');
                        }
                        else if(folders.indexOf('Consumer Notice.pdf') < 0) {
                            $('#form-2').css('display', 'none');
                            $('#form-3').css('display', 'block');
                        } else if(folders.indexOf('Buyer Agency Agreement.pdf') < 0) {
                            $('#form-2').css('display', 'none');
                            modalOpen('file-upload-1-modal')
                        } else if(folders.indexOf('Sellers Disclosure.pdf') < 0) {
                            $('#form-2').css('display', 'none');
                            modalOpen('file-upload-2-modal')
                        } else if(folders.indexOf('Lead Paint Disclosure.pdf') < 0) {
                            $('#form-2').css('display', 'none');
                            modalOpen('file-upload-3-modal')
                        } else if(folders.indexOf('Proof of Funds.pdf') < 0 && folders.indexOf('PreAppoval.pdf') < 0) {
                            $('#form-2').css('display', 'none');
                            modalOpen('file-upload-4-modal')
                        } else if(folders.indexOf('Estimated Closing Costs.pdf') < 0) {
                            $('#form-2').css('display', 'none');
                            modalOpen('file-upload-6-modal')
                        } else if(folders.indexOf('Deposit Check.pdf') < 0) {
                            $('#form-2').css('display', 'none');
                            modalOpen('file-upload-7-modal')
                        } else if(folders.indexOf('Deposit Money Notice.pdf') < 0) {
                            $('#form-2').css('display', 'none');
                            modalOpen('file-upload-8-modal')
                        } else if(folders.indexOf('Agreement of Sale.pdf') < 0) {
                            $('#form-2').css('display', 'none');
                            modalOpen('file-upload-9-modal')
                        }
                        // var txt = "Folder Already Exists - Please Finish Uploading Minimum Required Docs";
                        // $('#create-folder-content').html(txt);
                        // $('#modal-btn').attr('data-target', '#create-folder-modal');
                        // $('#modal-btn').click();
                    }
				},
				error: function(err) {
					console.log(err);
				}
			})
		}
	});

	$('#create-folder-ok-btn').click(function() {
		$('#form-2').css('display', 'none');
		// $('#transaction-form').css('display', 'block');
		$('#form-03').css('display', 'block');
        $('#create-folder-cancel-btn').click();
	});

    $('#file-upload-03').click(function() {
        var file = $('#file-03').val();
        if(!file) alert("You didn't select file!");
        else {
            var folder = $('#transaction-dropdown').val();
            var formData = new FormData();
            formData.append('type', 'fileUpload03');
            formData.append('folder', folder);
            formData.append('file', $('#file-03')[0].files[0]);
            $.ajax({
                url: "/e/controllers/Upload.php",
                type: 'post',
                enctype: 'multipart/form-data',
                contentType: false,
                processData: false,
                data: formData,
                success:function(res) {
                    if(res === '1') {
                        alert(`PRIVATE MLS sheet.pdf successfully uploaded to ${folder}`);
                        GetFiles();
                        $('#form-03').css('display', 'none');
                        if($('#pend-status').val() === "1") $('#form-3').css('display', 'block');
                        else modalOpen('file-upload-2-modal');
                    } else if(res == 2) {
                        alert('The file is not pdf!');
                    } else {
                        alert('Consumer Notice.pdf upload failed!');
                    }
                }
            })
        }
    });

    $('#seller-name, #buyer-name').on('keypress', function (event) {
        const regex = new RegExp("[^-_a-zA-Z0-9]"); //  pattern="[-a-zA-Z0-9_\.]+"
        const key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
        if (regex.test(key)) {
            event.preventDefault();
            return false;
        }
    });

	$('#file-upload').click(function() {
		var file = $('#file').val();
		if(!file) alert("You didn't select file!");
		else {
			var folder = $('#transaction-dropdown').val();
			var formData = new FormData();
            formData.append('type', 'fileUpload');
            formData.append('folder', folder);
            formData.append('file', $('#file')[0].files[0]);
            $.ajax({
                url: "/e/controllers/Upload.php",
                type: 'post',
                enctype: 'multipart/form-data',
                contentType: false,
                processData: false,
                data: formData,
                success:function(res) {
                    if(res === '1') {
                        alert(`Consumer Notice.pdf successfully uploaded to ${folder}`);
                        GetFiles();
			            modalOpen('file-upload-1-modal')
                    } else if(res == 2) {
                        alert('The file is not pdf!');
                    } else {
                        alert('Consumer Notice.pdf upload failed!');
                    }
                }
            })
		}
	});

	$('#file-upload-1-ok-btn').click(function() {
		$('#form-3').css('display', 'none');
		$('#form-4').css('display', 'block');
        $('#file-upload-1-cancel-btn').click();
	});

	$('#file-upload-1-no-btn').click(function() {
		$('#form-3').css('display', 'none');
        $('#file-upload-1-cancel-btn').click();
        $('#modal-btn').attr('data-target', '#file-upload-2-modal');
        $('#modal-btn').click();
	});


	$('#file-upload-1').click(function() {
		var file = $('#file-1').val();
		if(!file) alert("You didn't select file!");
		else {
			var folder = $('#transaction-dropdown').val();
			var formData = new FormData();
            formData.append('type', 'fileUpload1');
            formData.append('folder', folder);
            formData.append('file', $('#file-1')[0].files[0]);
            $.ajax({
                url: "/e/controllers/Upload.php",
                type: 'post',
                enctype: 'multipart/form-data',
                contentType: false,
                processData: false,
                data: formData,
                success:function(res) {
                    if(res == 1) {
                        alert(`Buyer Agency Agreement.pdf successfully uploaded to ${folder}`);
                        GetFiles();
			            $('#modal-btn').attr('data-target', '#file-upload-2-modal');
			            $('#modal-btn').click();
                    } else if(res == 2) {
                        alert('The file is not pdf!');
                    } else {
                        alert('Buyer Agency Agreement.pdf upload failed!');
                    }
                }
            })
		}
	});

	$('#file-upload-2-ok-btn').click(function() {
		$('#form-4').css('display', 'none');
		$('#form-5').css('display', 'block');
        $('#file-upload-2-cancel-btn').click();
	});

    /////////////////////////////////
    $('#file-upload-2-no-btn').click(function() {
        $('#form-4').css('display', 'none');
        $('#form-5').css('display', 'block');
        $('#file-upload-2-cancel-btn').click();
        $('#modal-btn').attr('data-target', '#file-upload-3-modal');
        $('#modal-btn').click();
    });

	$('#file-upload-2').click(function() {
		var file = $('#file-2').val();
		if(!file) alert("You didn't select file!");
		else {
			var folder = $('#transaction-dropdown').val();
			var formData = new FormData();
            formData.append('type', 'fileUpload2');
            formData.append('folder', folder);
            formData.append('file', $('#file-2')[0].files[0]);
            $.ajax({
                url: "/e/controllers/Upload.php",
                type: 'post',
                enctype: 'multipart/form-data',
                contentType: false,
                processData: false,
                data: formData,
                success:function(res) {
                    if(res == 1) {
                        alert(`Sellers Disclosure.pdf successfully uploaded to ${folder}`);
                        GetFiles();
			            $('#modal-btn').attr('data-target', '#file-upload-3-modal');
			            $('#modal-btn').click();
                    } else if(res == 2) {
                        alert('The file is not pdf!');
                    } else {
                        alert('Sellers Disclosure.pdf upload failed!');
                    }
                }
            })
		}
	});

	$('#file-upload-3-ok-btn').click(function() {
		$('#form-5').css('display', 'none');
		$('#form-6').css('display', 'block');
        $('#file-upload-3-cancel-btn').click();
	});

    $('#file-upload-3-no-btn').click(function() {
        $('#form-5').css('display', 'none');
        $('#file-upload-3-cancel-btn').click();
        $('#modal-btn').attr('data-target', '#file-upload-4-modal');
        $('#modal-btn').click();
    });


	$('#file-upload-3').click(function() {
		var file = $('#file-3').val();
		if(!file) alert("You didn't select file!");
		else {
			var folder = $('#transaction-dropdown').val();
			var formData = new FormData();
            formData.append('type', 'fileUpload3');
            formData.append('folder', folder);
            formData.append('file', $('#file-3')[0].files[0]);
            $.ajax({
                url: "/e/controllers/Upload.php",
                type: 'post',
                enctype: 'multipart/form-data',
                contentType: false,
                processData: false,
                data: formData,
                success:function(res) {
                    if(res == 1) {
                        alert(`Lead Paint Disclosure.pdf successfully uploaded to ${folder}`);
                        GetFiles();
			            $('#modal-btn').attr('data-target', '#file-upload-4-modal');
			            $('#modal-btn').click();
                    } else if(res == 2) {
                        alert('The file is not pdf!');
                    } else {
                        alert('Lead Paint Disclosure.pdf upload failed!');
                    }
                }
            })
		}
	});

	$('#file-upload-4-ok-btn').click(function() {
		$('#form-6').css('display', 'none');
		$('#form-7').css('display', 'block');
        $('#file-upload-4-cancel-btn').click();
	});

    $('#file-upload-4-no-btn').click(function() {
        $('#form-6').css('display', 'none');
        $('#form-8').css('display', 'block');
        $('#file-upload-4-cancel-btn').click();
    });


	$('#file-upload-4').click(function() {
		var file = $('#file-4').val();
		if(!file) alert("You didn't select file!");
		else {
			var folder = $('#transaction-dropdown').val();
			var formData = new FormData();
            formData.append('type', 'fileUpload4');
            formData.append('folder', folder);
            formData.append('file', $('#file-4')[0].files[0]);
            $.ajax({
                url: "/e/controllers/Upload.php",
                type: 'post',
                enctype: 'multipart/form-data',
                contentType: false,
                processData: false,
                data: formData,
                success:function(res) {
                    if(res == 1) {
                        alert(`Proof of Funds.pdf successfully uploaded to ${folder}`);
                        GetFiles();
			            $('#modal-btn').attr('data-target', '#file-upload-6-modal');
			            $('#modal-btn').click();
                    } else if(res == 2) {
                        alert('The file is not pdf!');
                    } else {
                        alert('Proof of Funds.pdf upload failed!');
                    }
                }
            })
		}
	});

	$('#file-upload-5').click(function() {
		var file = $('#file-5').val();
		if(!file) alert("You didn't select file!");
		else {
			var folder = $('#transaction-dropdown').val();
			var formData = new FormData();
            formData.append('type', 'fileUpload5');
            formData.append('folder', folder);
            formData.append('file', $('#file-5')[0].files[0]);
            $.ajax({
                url: "/e/controllers/Upload.php",
                type: 'post',
                enctype: 'multipart/form-data',
                contentType: false,
                processData: false,
                data: formData,
                success:function(res) {
                    if(res == 1) {
                        alert(`PreAppoval.pdf successfully uploaded to ${folder}`);
                        GetFiles();
			            $('#modal-btn').attr('data-target', '#file-upload-6-modal');
			            $('#modal-btn').click();
                    } else if(res == 2) {
                        alert('The file is not pdf!');
                    } else {
                        alert('PreAppoval.pdf upload failed!');
                    }
                }
            })
		}
	});

	$('#file-upload-6-ok-btn').click(function() {
        $('#form-7').css('display', 'none');
        $('#form-8').css('display', 'none');
		$('#form-9').css('display', 'block');
        $('#file-upload-6-cancel-btn').click();
	});

	$('#file-upload-6').click(function() {
		var file = $('#file-6').val();
		if(!file) alert("You didn't select file!");
		else {
			var folder = $('#transaction-dropdown').val();
			var formData = new FormData();
            formData.append('type', 'fileUpload6');
            formData.append('folder', folder);
            formData.append('file', $('#file-6')[0].files[0]);
            $.ajax({
                url: "/e/controllers/Upload.php",
                type: 'post',
                enctype: 'multipart/form-data',
                contentType: false,
                processData: false,
                data: formData,
                success:function(res) {
                    if(res == 1) {
                        alert(`Estimated Closing Costs.pdf successfully uploaded to ${folder}`);
                        GetFiles();
			            $('#modal-btn').attr('data-target', '#file-upload-7-modal');
			            $('#modal-btn').click();
                    } else if(res == 2) {
                        alert('The file is not pdf!');
                    } else {
                        alert('Estimated Closing Costs.pdf upload failed!');
                    }
                }
            })
		}
	});

	$('#file-upload-7-ok-btn').click(function() {
		$('#form-9').css('display', 'none');
		$('#form-10').css('display', 'block');
        $('#file-upload-7-cancel-btn').click();
	});

	$('#file-upload-7').click(function() {
		var file = $('#file-7').val();
		if(!file) alert("You didn't select file!");
		else {
			var folder = $('#transaction-dropdown').val();
			var formData = new FormData();
            formData.append('type', 'fileUpload7');
            formData.append('folder', folder);
            formData.append('file', $('#file-7')[0].files[0]);
            $.ajax({
                url: "/e/controllers/Upload.php",
                type: 'post',
                enctype: 'multipart/form-data',
                contentType: false,
                processData: false,
                data: formData,
                success:function(res) {
                    if(res == 1) {
                        alert(`Deposit Check.pdf successfully uploaded to ${folder}`);
                        GetFiles();
			            $('#modal-btn').attr('data-target', '#file-upload-8-modal');
			            $('#modal-btn').click();
                    } else if(res == 2) {
                        alert('The file is not pdf!');
                    } else {
                        alert('Deposit Check.pdf upload failed!');
                    }
                }
            })
		}
	});

	$('#file-upload-8-ok-btn').click(function() {
		$('#form-10').css('display', 'none');
		$('#form-11').css('display', 'block');
        $('#file-upload-8-cancel-btn').click();
	});

	$('#file-upload-8').click(function() {
		var file = $('#file-8').val();
		if(!file) alert("You didn't select file!");
		else {
			var folder = $('#transaction-dropdown').val();
			var formData = new FormData();
            formData.append('type', 'fileUpload8');
            formData.append('folder', folder);
            formData.append('file', $('#file-8')[0].files[0]);
            $.ajax({
                url: "/e/controllers/Upload.php",
                type: 'post',
                enctype: 'multipart/form-data',
                contentType: false,
                processData: false,
                data: formData,
                success:function(res) {
                    if(res == 1) {
                        alert(`Deposit Money Notice.pdf successfully uploaded to ${folder}`);
                        GetFiles();
			            $('#modal-btn').attr('data-target', '#file-upload-9-modal');
			            $('#modal-btn').click();
                    } else if(res == 2) {
                        alert('The file is not pdf!');
                    } else {
                        alert('Deposit Money Notice.pdf upload failed!');
                    }
                }
            })
		}
	});

	$('#file-upload-9-ok-btn').click(function() {
		$('#form-11').css('display', 'none');
		$('#form-12').css('display', 'block');
        $('#file-upload-9-cancel-btn').click();
	});

	$('#file-upload-9').click(function() {
		var file = $('#file-9').val();
		if(!file) alert("You didn't select file!");
		else {
			var folder = $('#transaction-dropdown').val();
			var formData = new FormData();
            formData.append('type', 'fileUpload9');
            formData.append('folder', folder);
            formData.append('file', $('#file-9')[0].files[0]);
            $.ajax({
                url: "/e/controllers/Upload.php",
                type: 'post',
                enctype: 'multipart/form-data',
                contentType: false,
                processData: false,
                data: formData,
                success:function(res) {
                    if(res == 1) {
                        alert(`Agreement of Sale.pdf successfully uploaded to ${folder}`);
                        GetFiles();
			            // $('#modal-btn').attr('data-target', '#file-upload-9-modal');
			            // $('#modal-btn').click();
			            alert("Your Minimum Required Documents are complete. Upload any additional documents via the Additional Docs Upload button!");
                    } else if(res == 2) {
                        alert('The file is not pdf!');
                    } else {
                        alert('Agreement of Sale.pdf upload failed!');
                    }
                }
            })
		}
	});


    $('#add-file-btn').click(function() {
        var name = $('#add-file-name').val();
        var file = $('#add-file').val();
        var folder = $('#transaction-dropdown').val();
        if(!folder) alert("You didn't select transaction!");
        else {
            if(!file) alert("You didn't select file!");
            else {
                var formData = new FormData();
                formData.append('type', 'addFileUpload');
                formData.append('folder', folder);
                formData.append('name', name);
                formData.append('file', $('#add-file')[0].files[0]);
                $.ajax({
                    url: "/e/controllers/Upload.php",
                    type: 'post',
                    enctype: 'multipart/form-data',
                    contentType: false,
                    processData: false,
                    data: formData,
                    success:function(res) {
                        console.log(res);
                        if(res == 1) {
                            alert('Uploaded successfully!');
                            $('#add-file').val('');
                            $('#add-file-name').val('');
                            GetFiles();
                        } else if(res == 2) {
                            alert('The file is not pdf!');
                        } else {
                            alert('File upload failed!');
                        }
                    }
                })
            }
        }
    });

    function titleCase(string){
      return string[0].toUpperCase() + string.slice(1).toLowerCase();
    }

    $(document).click(function() {
        $('.submenu').css('display', 'none');
    })

    $(document).on('click', '.filemenu-btn', function(e) {
        e.stopPropagation();
        const num = $(this).attr('num');
        $('#submenu-' + num).toggle();
    })

    $('#upload_close_new').click(function() {
        $('#close-description').hide();
        $('#close-folders').hide();
        $('#transaction-close').css('display', 'block');
        const folder = $('#close-transaction-dropdown').val();
        $('#close-created-folder-title h4').html(folder);
        $('#close-created-folder-title').css('display', 'flex');
        GetCloseFiles()
    })

    $('#close-start-btn').click(function() {
        const folder = $('#close-transaction-dropdown').val();
        $.ajax({
            url: "/e/controllers/Close.php",
            type: 'post',
            data: {
                type: 'copyFolders',
                folder: folder
            },
            success: function(res) {
                console.log(res);
                if(res === "1") {
                    GetCloseFiles();
                    alert("The process is ready to go!");
                    $('#modal-btn').attr('data-target', '#close-listing-modal');
                    $('#modal-btn').click();
                } else if(res === "0") {
                    alert("There's no transaction to start!");
                } else alert("Failed!");
            },
            error: function(err) {
                console.log(err);
            }
        })
    })

    $('#upload_close_additional').click(function() {
        $('#close-description').hide();
        $('#transaction-close').hide();
        $('#chapter-one-a-form').hide();
        $('#chapter-one-b-form').hide();
        $('#chapter-one-c-form').hide();
        $('#chapter-two-a-form').hide();
        $('#chapter-two-b-form').hide();
        $('#chapter-two-c-form').hide();
        $('#chapter-three-a-form').hide();
        $('#chapter-four-a-form').hide();
        $('#chapter-five-a-form').hide();
        $('#chapter-five-b-form').hide();
        $('#chapter-six-form').hide();
        $('#chapter-seven-form').hide();
        $('#close-final-form').hide();
        $('#close-folders').show();
    })
    var closeFiles = [];
    $('#close-folders-dropdown').change(function(e) {
        $('#close-created-folder-title h4').html(e.target.value)
        $('#close-created-folder-title').css('display', 'flex');
        // GetCloseListFiles();
        var folder = $('#close-folders-dropdown').val();
        if(folder.length > 0) {
            var formData = new FormData();
            formData.append('type', 'getFiles');
            formData.append('folder', folder);
            $.ajax({
                url: "/e/controllers/Close.php",
                type: 'post',
                enctype: 'multipart/form-data',
                contentType: false,
                processData: false,
                data: formData,
                success:function(res) {
                    var files = JSON.parse(res);
                    $('#close-file-show').empty();
                    if(files.length) {
                        files.forEach((file, index) => {
                            $('#close-file-show').prepend(`<div class="arrange file-title">
                                <div class="icon">
                                    <a href="#"><img src="/e/assets/img/pdf.png" width="100%" height="100%" alt="" title="" /></a>
                                </div>
                                <h4 class="text-center m-0">${file['name']}</h4>
                                <div class="icon">
                                    <a class="filemenu-btn button" num="${index}"><img src="/e/assets/img/tools.png" width="100%" height="100%" alt="" title="" /></a>
                                    <ul class="submenu" id="submenu-${index}">
                                        <li><a class="mail-btn" folder=${folder} file="${file['name']}" path="./pend/${folder}/${file['name']}">Email</a></li>
                                        <li><a href="./pend/${folder}/${file['name']}" target="_blank">Download</a></li>
                                        <li><a href="./pend/${folder}/${file['name']}" target="_blank">Print</a></li>
                                    </ul>
                                </div>
                            </div>
                            <br>`);
                        });
                        closeFiles = files;
                        if(closeFiles.findIndex(file => file['name'] === 'Commission Distribution.pdf') < 0 || closeFiles.findIndex(file => file['name'] === 'Final Walkthrough.pdf') < 0 || closeFiles.findIndex(file => file['name'] === 'Settlement Sheet.pdf') < 0)
                            modalOpen('close-continue-modal')
                    }
                }
            })
        }
    })

    $('#close-continue-modal-ok-btn').click(function() {
        if(closeFiles.findIndex(file => file['name'] === 'Final Walkthrough.pdf') < 0) {
            $('#chapter-six-form').show();
        } else if(closeFiles.findIndex(file => file['name'] === 'Settlement Sheet.pdf') < 0) {
            $('#chapter-seven-form').show();
        } else if(closeFiles.findIndex(file => file['name'] === 'Commission Distribution.pdf') < 0) {
            modalOpen('final-modal');
        }
        $('#close-folders').hide();
    })

    // if(pendFiles.findIndex(file => file['name'] === 'PRIVATE MLS sheet.pdf') < 0) {
    //     $('#form-2').css('display', 'none');
    //     $('#form-03').css('display', 'block');
    // }
    // else if(pendFiles.findIndex(file => file['name'] === 'Consumer Notice.pdf') < 0) {
    //     $('#form-2').css('display', 'none');
    //     $('#form-3').css('display', 'block');
    // }

    function GetCloseListFiles() {
        var folder = $('#close-folders-dropdown').val();
        if(folder.length > 0) {
            var formData = new FormData();
            formData.append('type', 'getFiles');
            formData.append('folder', folder);
            $.ajax({
                url: "/e/controllers/Close.php",
                type: 'post',
                enctype: 'multipart/form-data',
                contentType: false,
                processData: false,
                data: formData,
                success:function(res) {
                    var files = JSON.parse(res);
                    $('#close-file-show').empty();
                    if(files.length) {
                        files.forEach((file, index) => {
                            $('#close-file-show').prepend(`<div class="arrange file-title">
                                <div class="icon">
                                    <a href="#"><img src="/e/assets/img/pdf.png" width="100%" height="100%" alt="" title="" /></a>
                                </div>
                                <h4 class="text-center m-0">${file['name']}</h4>
                                <div class="icon">
                                    <a class="filemenu-btn button" num="${index}"><img src="/e/assets/img/tools.png" width="100%" height="100%" alt="" title="" /></a>
                                    <ul class="submenu" id="submenu-${index}">
                                        <li><a class="mail-btn" folder=${folder} file="${file['name']}" path="./pend/${folder}/${file['name']}">Email</a></li>
                                        <li><a href="./pend/${folder}/${file['name']}" target="_blank">Download</a></li>
                                        <li><a href="./pend/${folder}/${file['name']}" target="_blank">Print</a></li>
                                    </ul>
                                </div>
                            </div>
                            <br>`);
                        });
                    }
                }
            })
        }
    }

    $('#close-additional-upload-btn').click(function() {
        var file = $('#close-additional-file').val();
        var fileName = $('#close-additional-file-name').val();
        var folder = $('#close-folders-dropdown').val();
        if(!file) alert("You didn't select file!");
        else {
            if(!folder) alert("You didn't select transaction!");
            else {
                var formData = new FormData();
                formData.append('type', 'additionalUpload');
                formData.append('folder', folder);
                formData.append('name', fileName);
                formData.append('file', $('#close-additional-file')[0].files[0]);
                $.ajax({
                    url: "/e/controllers/Close.php",
                    type: 'post',
                    enctype: 'multipart/form-data',
                    contentType: false,
                    processData: false,
                    data: formData,
                    success:function(res) {
                        if(res == 1) {
                            if(!fileName) alert(`File successfully uploaded to ${folder}`);
                            else alert(`${fileName}.pdf successfully uploaded to ${folder}`);
                            GetCloseListFiles();
                            $('#close-additional-file').val('');
                            $('#close-additional-file-name').val('');
                        } else if(res == 2) {
                            alert('The file is not pdf!');
                        } else {
                            alert('File upload failed!');
                        }
                    }
                })
            }
        }
    })

    $('#close-transaction-dropdown').change(function(e) {
        $('#close-created-folder-title h4').html(e.target.value)
        GetCloseFiles();
    })

    $('#close-listing-modal-ok-btn').click(function() {
        $('#transaction-close').hide();
        $('#close-listing-modal-cancel-btn').click();
        $('#close-list-folders').show();
    })

    $('#close-listing-modal-no-btn').click(function() {
        $('#transaction-close').hide();
        $('#close-listing-modal-cancel-btn').click();
        $('#close-start-modal h5').html(`Do you wish to upload your Additional Closing Docs at this time?`);
        $('#modal-btn').attr('data-target', '#close-start-modal');
        $('#modal-btn').click();
    })

    $('#close-list-btn').click(function() {
        const folder = $('#close-transaction-dropdown').val();
        const listFolder = $('#close-list-folders-dropdown').val();
        $.ajax({
            url: "/e/controllers/Close.php",
            type: 'post',
            data: {
                type: 'copyListFolders',
                folder: folder,
                listFolder: listFolder
            },
            success: function(res) {
                console.log(res);
                if(res === "1") {
                    GetCloseFiles();
                    alert("The process is ready to go!");
                    $('#close-start-modal h5').html(`Your Listing Folder has been Moved to the New Closed Folder.<br><br>Do you wish to upload your additional Closing Docs at this time?`);
                    $('#modal-btn').attr('data-target', '#close-start-modal');
                    $('#modal-btn').click();
                } else if(res === "0") {
                    alert("There's no transaction to start!");
                } else alert("Failed!");
            },
            error: function(err) {
                console.log(err);
            }
        })
    })

    ///////////////////////////////
    $('#close-start-modal-ok-btn').click(function() {
        $('#transaction-close').hide();
        $('#close-list-folders').hide();
        $('#close-start-modal-cancel-btn').click();
        $('#modal-btn').attr('data-target', '#chapter-one-modal');
        $('#modal-btn').click();
    })
    ////////////////////////

    $('#chapter-one-modal-ok-btn').click(function() {
        $('#chapter-one-modal-cancel-btn').click();
        $('#modal-btn').attr('data-target', '#chapter-one-a-modal');
        $('#modal-btn').click();
    })

    $('#chapter-one-modal-no-btn').click(function() {
        $('#chapter-one-modal-cancel-btn').click();
        $('#modal-btn').attr('data-target', '#chapter-two-modal');
        $('#modal-btn').click();
    })

    $('#chapter-one-a-modal-no-btn').click(function() {
        $('#chapter-one-a-form').show();
    })

    $('#chapter-one-a-modal-ok-btn').click(function() {
        $('#chapter-one-a-modal-cancel-btn').click();
        $('#modal-btn').attr('data-target', '#chapter-one-b-modal');
        $('#modal-btn').click();
    })

    $('#file-one-a-btn').click(function() {
        var folder = $('#close-transaction-dropdown').val();
        var formData = new FormData();
        formData.append('type', 'chapter-one-a');
        formData.append('folder', folder);
        formData.append('file', $('#file-one-a')[0].files[0]);
        $.ajax({
            url: "/e/controllers/Close.php",
            type: 'post',
            enctype: 'multipart/form-data',
            contentType: false,
            processData: false,
            data: formData,
            success: function(res) {
                console.log(res);
                if(res == 1) {
                    alert('Uploaded successfully!');
                    GetCloseFiles();
                    $('#chapter-one-a-modal-cancel-btn').click();
                    $('#modal-btn').attr('data-target', '#chapter-one-b-modal');
                    $('#modal-btn').click();

                } else if(res == 2) {
                    alert('The file is not pdf!');
                } else {
                    alert('File upload failed!');
                }
            }
        })
    })

    $('#chapter-one-b-modal-no-btn').click(function() {
        $('#chapter-one-a-form').hide();
        $('#chapter-one-b-form').show();
    })

    $('#chapter-one-b-modal-ok-btn').click(function() {
        $('#chapter-one-b-modal-cancel-btn').click();
        $('#chapter-one-a-form').hide();
        $('#modal-btn').attr('data-target', '#chapter-one-c-modal');
        $('#modal-btn').click();
    })

    $('#file-one-b-btn').click(function() {
        var folder = $('#close-transaction-dropdown').val();
        var formData = new FormData();
        formData.append('type', 'chapter-one-b');
        formData.append('folder', folder);
        formData.append('file', $('#file-one-b')[0].files[0]);
        $.ajax({
            url: "/e/controllers/Close.php",
            type: 'post',
            enctype: 'multipart/form-data',
            contentType: false,
            processData: false,
            data: formData,
            success: function(res) {
                console.log(res);
                if(res == 1) {
                    alert('Uploaded successfully!');
                    GetCloseFiles();
                    $('#chapter-one-b-modal-cancel-btn').click();
                    $('#modal-btn').attr('data-target', '#chapter-one-c-modal');
                    $('#modal-btn').click();
                } else if(res == 2) {
                    alert('The file is not pdf!');
                } else {
                    alert('File upload failed!');
                }
            }
        })
    })

    $('#chapter-one-c-modal-no-btn').click(function() {
        $('#chapter-one-b-form').hide();
        $('#chapter-one-c-form').show();
    })

    $('#chapter-one-c-modal-ok-btn').click(function() {
        $('#chapter-one-c-modal-cancel-btn').click();
        $('#chapter-one-b-form').hide();
        $('#modal-btn').attr('data-target', '#chapter-two-modal');
        $('#modal-btn').click();
    })

    $('#file-one-c-btn').click(function() {
        var folder = $('#close-transaction-dropdown').val();
        var formData = new FormData();
        formData.append('type', 'chapter-one-c');
        formData.append('folder', folder);
        formData.append('file', $('#file-one-c')[0].files[0]);
        $.ajax({
            url: "/e/controllers/Close.php",
            type: 'post',
            enctype: 'multipart/form-data',
            contentType: false,
            processData: false,
            data: formData,
            success: function(res) {
                console.log(res);
                if(res == 1) {
                    alert('Uploaded successfully!');
                    GetCloseFiles();
                    $('#chapter-one-c-modal-cancel-btn').click();
                    $('#modal-btn').attr('data-target', '#chapter-two-modal');
                    $('#modal-btn').click();
                } else if(res == 2) {
                    alert('The file is not pdf!');
                } else {
                    alert('File upload failed!');
                }
            }
        })
    })

    $('#chapter-two-modal-ok-btn').click(function() {
        $('#chapter-two-modal-cancel-btn').click();
        $('#modal-btn').attr('data-target', '#chapter-two-a-modal');
        $('#modal-btn').click();
    })

    $('#chapter-two-modal-no-btn').click(function() {
        $('#chapter-two-modal-cancel-btn').click();
        $('#modal-btn').attr('data-target', '#chapter-three-modal');
        $('#modal-btn').click();
    })

    $('#chapter-two-a-modal-no-btn').click(function() {
        $('#chapter-one-c-form').hide();
        $('#chapter-two-a-form').show();
    })

    $('#chapter-two-a-modal-ok-btn').click(function() {
        $('#chapter-two-a-modal-cancel-btn').click();
        $('#chapter-one-c-form').hide();
        $('#modal-btn').attr('data-target', '#chapter-two-b-modal');
        $('#modal-btn').click();
    })

    $('#file-two-a-btn').click(function() {
        var folder = $('#close-transaction-dropdown').val();
        var formData = new FormData();
        formData.append('type', 'chapter-two-a');
        formData.append('folder', folder);
        formData.append('file', $('#file-two-a')[0].files[0]);
        $.ajax({
            url: "/e/controllers/Close.php",
            type: 'post',
            enctype: 'multipart/form-data',
            contentType: false,
            processData: false,
            data: formData,
            success: function(res) {
                console.log(res);
                if(res == 1) {
                    alert('Uploaded successfully!');
                    GetCloseFiles();
                    $('#chapter-two-a-modal-cancel-btn').click();
                    $('#modal-btn').attr('data-target', '#chapter-two-b-modal');
                    $('#modal-btn').click();
                } else if(res == 2) {
                    alert('The file is not pdf!');
                } else {
                    alert('File upload failed!');
                }
            }
        })
    })

    $('#chapter-two-b-modal-no-btn').click(function() {
        $('#chapter-two-a-form').hide();
        $('#chapter-two-b-form').show();
    })

    $('#chapter-two-b-modal-ok-btn').click(function() {
        $('#chapter-two-b-modal-cancel-btn').click();
        $('#chapter-two-a-form').hide();
        $('#modal-btn').attr('data-target', '#chapter-two-c-modal');
        $('#modal-btn').click();
    })

    $('#file-two-b-btn').click(function() {
        var folder = $('#close-transaction-dropdown').val();
        var formData = new FormData();
        formData.append('type', 'chapter-two-b');
        formData.append('folder', folder);
        formData.append('file', $('#file-two-b')[0].files[0]);
        $.ajax({
            url: "/e/controllers/Close.php",
            type: 'post',
            enctype: 'multipart/form-data',
            contentType: false,
            processData: false,
            data: formData,
            success: function(res) {
                console.log(res);
                if(res == 1) {
                    alert('Uploaded successfully!');
                    GetCloseFiles();
                    $('#chapter-two-b-modal-cancel-btn').click();
                    $('#modal-btn').attr('data-target', '#chapter-two-c-modal');
                    $('#modal-btn').click();
                } else if(res == 2) {
                    alert('The file is not pdf!');
                } else {
                    alert('File upload failed!');
                }
            }
        })
    })

    $('#chapter-two-c-modal-no-btn').click(function() {
        $('#chapter-two-b-form').hide();
        $('#chapter-two-c-form').show();
    })

    $('#chapter-two-c-modal-ok-btn').click(function() {
        $('#chapter-two-c-modal-cancel-btn').click();
        $('#chapter-two-b-form').hide();
        $('#modal-btn').attr('data-target', '#chapter-three-modal');
        $('#modal-btn').click();
    })

    $('#file-two-c-btn').click(function() {
        var folder = $('#close-transaction-dropdown').val();
        var formData = new FormData();
        formData.append('type', 'chapter-two-c');
        formData.append('folder', folder);
        formData.append('file', $('#file-two-c')[0].files[0]);
        $.ajax({
            url: "/e/controllers/Close.php",
            type: 'post',
            enctype: 'multipart/form-data',
            contentType: false,
            processData: false,
            data: formData,
            success: function(res) {
                console.log(res);
                if(res == 1) {
                    alert('Uploaded successfully!');
                    GetCloseFiles();
                    $('#chapter-two-c-modal-cancel-btn').click();
                    $('#modal-btn').attr('data-target', '#chapter-three-modal');
                    $('#modal-btn').click();
                } else if(res == 2) {
                    alert('The file is not pdf!');
                } else {
                    alert('File upload failed!');
                }
            }
        })
    })

    $('#chapter-three-modal-ok-btn').click(function() {
        $('#chapter-three-modal-cancel-btn').click();
        $('#modal-btn').attr('data-target', '#chapter-three-a-modal');
        $('#modal-btn').click();
    })

    $('#chapter-three-modal-no-btn').click(function() {
        $('#chapter-three-modal-cancel-btn').click();
        $('#modal-btn').attr('data-target', '#chapter-four-modal');
        $('#modal-btn').click();
    })

    $('#chapter-three-a-modal-ok-btn').click(function() {
        $('#chapter-three-a-modal-cancel-btn').click();
        $('#chapter-two-c-form').hide();
        $('#modal-btn').attr('data-target', '#chapter-four-modal');
        $('#modal-btn').click();
    })

    $('#chapter-three-a-modal-no-btn').click(function() {
        $('#chapter-three-a-modal-cancel-btn').click();
        $('#chapter-two-c-form').hide();
        $('#chapter-three-a-form').show();
    })

    $('#file-three-a-btn').click(function() {
        var folder = $('#close-transaction-dropdown').val();
        var formData = new FormData();
        formData.append('type', 'chapter-three-a');
        formData.append('folder', folder);
        formData.append('file', $('#file-three-a')[0].files[0]);
        $.ajax({
            url: "/e/controllers/Close.php",
            type: 'post',
            enctype: 'multipart/form-data',
            contentType: false,
            processData: false,
            data: formData,
            success: function(res) {
                console.log(res);
                if(res == 1) {
                    alert('Uploaded successfully!');
                    GetCloseFiles();
                    $('#chapter-three-a-modal-cancel-btn').click();
                    $('#modal-btn').attr('data-target', '#chapter-four-modal');
                    $('#modal-btn').click();
                } else if(res == 2) {
                    alert('The file is not pdf!');
                } else {
                    alert('File upload failed!');
                }
            }
        })
    })

    $('#chapter-four-modal-ok-btn').click(function() {
        $('#chapter-four-modal-cancel-btn').click();
        $('#modal-btn').attr('data-target', '#chapter-four-a-modal');
        $('#modal-btn').click();
    })

    $('#chapter-four-modal-no-btn').click(function() {
        $('#chapter-four-modal-cancel-btn').click();
        $('#modal-btn').attr('data-target', '#chapter-five-modal');
        $('#modal-btn').click();
    })

    $('#chapter-four-a-modal-no-btn').click(function() {
        $('#chapter-four-a-modal-cancel-btn').click();
        $('#chapter-three-a-form').hide();
        $('#chapter-four-a-form').show();
    })

    $('#chapter-four-a-modal-ok-btn').click(function() {
        $('#chapter-four-a-modal-cancel-btn').click();
        $('#chapter-three-a-form').hide();
        $('#modal-btn').attr('data-target', '#chapter-five-modal');
        $('#modal-btn').click();
    })

    $('#file-four-a-btn').click(function() {
        var folder = $('#close-transaction-dropdown').val();
        var formData = new FormData();
        formData.append('type', 'chapter-four-a');
        formData.append('folder', folder);
        formData.append('file', $('#file-four-a')[0].files[0]);
        $.ajax({
            url: "/e/controllers/Close.php",
            type: 'post',
            enctype: 'multipart/form-data',
            contentType: false,
            processData: false,
            data: formData,
            success: function(res) {
                console.log(res);
                if(res == 1) {
                    alert('Uploaded successfully!');
                    GetCloseFiles();
                    $('#chapter-four-a-modal-cancel-btn').click();
                    $('#modal-btn').attr('data-target', '#chapter-five-modal');
                    $('#modal-btn').click();
                } else if(res == 2) {
                    alert('The file is not pdf!');
                } else {
                    alert('File upload failed!');
                }
            }
        })
    })

    $('#chapter-five-modal-ok-btn').click(function() {
        $('#chapter-five-modal-cancel-btn').click();
        $('#chapter-four-a-form').hide();
        $('#chapter-five-a-form').show();
        // $('#modal-btn').attr('data-target', '#chapter-five-a-modal');
        // $('#modal-btn').click();
    })

    $('#chapter-five-modal-no-btn').click(function() {
        $('#chapter-five-modal-cancel-btn').click();
        $('#chapter-four-a-form').hide();
        $('#chapter-six-form').show();
        // $('#modal-btn').attr('data-target', '#chapter-five-a-modal');
        // $('#modal-btn').click();
    })

    // $('#chapter-five-a-modal-ok-btn').click(function() {
    //     $('#chapter-four-a-form').hide();
    //     $('#chapter-five-a-form').show();
    // })

    $('#file-five-a-btn').click(function() {
        var folder = $('#close-transaction-dropdown').val();
        var formData = new FormData();
        formData.append('type', 'chapter-five-a');
        formData.append('folder', folder);
        formData.append('file_name', $('#file_name_a').val());
        formData.append('file', $('#file-five-a')[0].files[0]);
        $.ajax({
            url: "/e/controllers/Close.php",
            type: 'post',
            enctype: 'multipart/form-data',
            contentType: false,
            processData: false,
            data: formData,
            success: function(res) {
                console.log(res);
                if(res == 1) {
                    alert('Uploaded successfully!');
                    GetCloseFiles();
                    $('#chapter-five-a-modal-cancel-btn').click();
                    $('#modal-btn').attr('data-target', '#chapter-five-b-modal');
                    $('#modal-btn').click();
                } else if(res == 2) {
                    alert('The file is not pdf!');
                } else {
                    alert('File upload failed!');
                }
            }
        })
    })

    $('#chapter-five-b-modal-ok-btn').click(function() {
        $('#chapter-five-b-modal-cancel-btn').click();
        $('#chapter-five-a-form').hide();
        $('#file_name_b').val('');
        $('#file-five-b').val('');
        $('#chapter-five-b-form').show();
    })


    $('#chapter-five-b-modal-no-btn').click(function() {
        $('#chapter-five-b-modal-cancel-btn').click();
        $('#chapter-five-a-form').hide();
        $('#chapter-six-form').show();
    })

    $('#file-five-b-btn').click(function() {
        var folder = $('#close-transaction-dropdown').val();
        var fileName = $('#file_name_b').val();
        if(!fileName) {
            alert("Please enter file name!");
        }
        else {
            var formData = new FormData();
            formData.append('type', 'chapter-five-b');
            formData.append('folder', folder);
            formData.append('file_name', fileName);
            formData.append('file', $('#file-five-b')[0].files[0]);
            $.ajax({
                url: "/e/controllers/Close.php",
                type: 'post',
                enctype: 'multipart/form-data',
                contentType: false,
                processData: false,
                data: formData,
                success: function(res) {
                    console.log(res);
                    if(res == 1) {
                        alert('Uploaded successfully!');
                        GetCloseFiles();
                        $('#chapter-five-b-form').hide();
                        // $('#chapter-six-form').show();
                        $('#modal-btn').attr('data-target', '#chapter-five-b-modal');
                        $('#modal-btn').click();
                    } else if(res == 2) {
                        alert('The file is not pdf!');
                    } else {
                        alert('File upload failed!');
                    }
                }
            })
        }
    })

    $('#file-six-btn').click(function() {
        var folder = $('#close-transaction-dropdown').val();
        var formData = new FormData();
        formData.append('type', 'chapter-six');
        formData.append('folder', folder);
        formData.append('file', $('#file-six')[0].files[0]);
        $.ajax({
            url: "/e/controllers/Close.php",
            type: 'post',
            enctype: 'multipart/form-data',
            contentType: false,
            processData: false,
            data: formData,
            success: function(res) {
                console.log(res);
                if(res == 1) {
                    alert('Uploaded successfully!');
                    GetCloseFiles();
                    $('#chapter-six-form').hide();
                    $('#chapter-seven-form').show();
                } else if(res == 2) {
                    alert('The file is not pdf!');
                } else {
                    alert('File upload failed!');
                }
            }
        })
    })

    $('#file-seven-btn').click(function() {
        var folder = $('#close-transaction-dropdown').val();
        var formData = new FormData();
        formData.append('type', 'chapter-seven');
        formData.append('folder', folder);
        formData.append('file', $('#file-seven')[0].files[0]);
        $.ajax({
            url: "/e/controllers/Close.php",
            type: 'post',
            enctype: 'multipart/form-data',
            contentType: false,
            processData: false,
            data: formData,
            success: function(res) {
                console.log(res);
                if(res == 1) {
                    alert('Uploaded successfully!');
                    GetCloseFiles();
                    $('#final-modal-title').html(folder);
                    $('#modal-btn').attr('data-target', '#final-modal');
                    $('#modal-btn').click();
                } else if(res == 2) {
                    alert('The file is not pdf!');
                } else {
                    alert('File upload failed!');
                }
            }
        })
    })

    // var folder = $('#close-transaction-dropdown').val();
    // $('#final-modal-title').html(folder);
    // $('#modal-btn').attr('data-target', '#final-modal');
    // $('#modal-btn').click();

    $('#download-close').click(function() {
        alert("By closing this file, I certify I have uploaded all required documents pertaining to this file.")
    })

    var specialElementHandlers = {
      '#editor': function(element, renderer) {
        return true;
      }
    };

    $('#upload').click(function () {
        let pdf = getPDF(1);
    })


    $('#download').click(function() {
        let pdf = getPDF(2);
    })

    function getPDF(type) {
        $('#chapter-seven-form').hide();
        if(!$("[name='elb']").val()) alert("You have to select one option!");
        let pdf = new jsPDF('p', 'pt', 'letter');
        var title = $('#final-modal-title').html();

        if(!$('#final-seller').val()) alert("You didn't input Seller Full Name!");
        else {
            if(!$('#final-buyer').val()) alert("You didn't input Buyer Full Name!");
            else {
                if(!$('#final-seller-agent').val()) alert("You didn't input Seller Agent!");
                else {
                    if(!$('#final-buyer-agent').val()) alert("You didn't input Buyer Agent!");
                    else {
                        if(!$('#final-house').val()) alert("You didn't input House!");
                        else {
                            if(!$('#final-city').val()) alert("You didn't input City!");
                            else {
                                if(!$('#final-street').val()) alert("You didn't input Street!");
                                else {
                                    if(!$('#final-state').val()) alert("You didn't input State!");
                                    else {
                                        if(!$('#final-zip').val()) alert("You didn't input Zip!");
                                        else {
                                            if(!$('#final-mls').val()) alert("You didn't input MLS SYSTEM!");
                                            else {
                                                if(!$('#final-mls2').val()) alert("You didn't input MLS #");
                                                else {
                                                    if(!$('#final-closing-date').val()) alert("You didn't input Closing Date!");
                                                    else {
                                                        if(!$('#final-company-name').val()) alert("You didn't input Company Name!");
                                                        else {
                                                            if($('#final-company-name').val() === 'Other' && $('#final-other-company').val() === '') alert("You didn't input company name!");
                                                            else {
                                                                if(!$('#final-phone').val()) alert("You didn't input Phone Number!");
                                                                else {
                                                                    // if(!$('#final-other').val()) alert("You didn't input Other!");
                                                                    // else {
                                                                        if(!$('#final-email').val()) alert("You didn't input Email!");
                                                                        else {
                                                                            var elb = $("[name='elb']:checked").val();
                                                                            var yard = $("[name='yard']:checked").val();
                                                                            var listing = $("[name='listing']:checked").val();
                                                                            var sold = $("[name='sold']:checked").val();

                                                                            if(elb === undefined) alert("You didn't check ELB!");
                                                                            else {
                                                                                if(yard === undefined) alert("You didn't check Yard!");
                                                                                else {
                                                                                    if(listing === undefined) alert("You didn't check Listing");
                                                                                    else {
                                                                                        if(sold === undefined) alert("You didn't check Sold");
                                                                                        else {
                                                                                            if(!$('#lead-source').val()) alert("You didn't select Lead Source!");
                                                                                            else {
                                                                                                if(!$('#sales-price').val()) alert("You didn't input Sales Price!");
                                                                                                else {
                                                                                                    if(!$('#seller-assist').val()) alert("You didn't input Seller Assist!");
                                                                                                    else {
                                                                                                        if(!$('#gross-commission-amount').val()) alert("You didn't input Gross Commission Amound!");
                                                                                                        else {
                                                                                                            var seller = 'Seller Full Name : ' + $('#final-seller').val();

                                                                                                            var buyer = 'Buyer Full Name : ' + $('#final-buyer').val();

                                                                                                            var sellerAgent = 'Seller Agent : ' + $('#final-seller-agent').val();
                                                                                                            var buyerAgent = 'Buyer Agent : ' + $('#final-buyer-agent').val();

                                                                                                            var house = 'House #: ' + $('#final-house').val();
                                                                                                            var city = 'City : ' + $('#final-city').val();
                                                                                                            var street = 'Street : ' + $('#final-street').val();
                                                                                                            var state = 'State : ' + $('#final-state').val();
                                                                                                            var zip = 'Zip : ' + $('#final-zip').val();

                                                                                                            var mls = 'MLS System : ' + $('#final-mls').val();
                                                                                                            var mls2 = 'MLS # : ' + $('#final-mls2').val();
                                                                                                            var closeDate = 'Closing Date : ' + $('#final-closing-date').val();
                                                                                                            var companyName = $('#final-company-name').val();
                                                                                                            if(companyName === "Other") {
                                                                                                                companyName = $('#final-other-company').val();
                                                                                                            }
                                                                                                            companyName = 'Title Company : ' + companyName;
                                                                                                            var phone = 'Phone : ' + $('#final-phone').val();
                                                                                                            var other = 'Other : ' + $('#final-other').val();
                                                                                                            var email = 'Email : ' + $('#final-email').val();

                                                                                                            var leadSource = 'Lead Source : ' + $('#lead-source').val();
                                                                                                            var salesPrice = 'Sales Price : $' + $('#sales-price').val();
                                                                                                            var sellerAssist = 'Seller Assist : $' + $('#seller-assist').val();
                                                                                                            var grossCommission = 'Gross Commission Amount : $' + $('#gross-commission-amount').val();

                                                                                                            // if(!seller1 && !seller2 && !seller3 && !seller4 && !buyer1 && !buyer2 && !buyer3 && !buyer4 && !sellerAgent && !buyerAgent && !house && !city && !street && !state && !zip && !mls && !mls2 && !closeDate && !companyName && !phone && !email && !elb && !yard && !listing && !sold && !leadSource && !salesPrice && !sellerAssist && !grossCommission) {
                                                                                                            //     alert('Please input all the data!');
                                                                                                            // } else {
                                                                                                            pdf.text( 'Commission Distribution', 300, 50, 'center' );

                                                                                                            pdf.text( title, 300, 80, 'center' );

                                                                                                            pdf.text( seller , 30, 120 );
                                                                                                            // pdf.text( seller2 , 30, 140 );
                                                                                                            // pdf.text( seller3 , 30, 160 );
                                                                                                            // pdf.text( seller4, 30, 180 );

                                                                                                            pdf.text( buyer, 320, 120 );
                                                                                                            // pdf.text( buyer2, 320, 140 );
                                                                                                            // pdf.text( buyer3, 320, 160 );
                                                                                                            // pdf.text( buyer4, 320, 180 );

                                                                                                            pdf.text( sellerAgent, 30, 140 );
                                                                                                            pdf.text( buyerAgent, 320, 140 );

                                                                                                            pdf.text( 'Property Full Address', 30, 200 );
                                                                                                            pdf.text( house, 30, 230 );
                                                                                                            pdf.text( city, 30, 250 );
                                                                                                            pdf.text( street, 160, 230 );
                                                                                                            pdf.text( state, 320, 250 );
                                                                                                            pdf.text( zip, 430, 250 );

                                                                                                            pdf.text( mls, 30, 310 );
                                                                                                            pdf.text( mls2, 220, 310 );
                                                                                                            pdf.text( closeDate, 370, 310 );
                                                                                                            pdf.text( companyName, 30, 330 );
                                                                                                            pdf.text( phone, 320, 330 );
                                                                                                            pdf.text( other, 30, 350 );
                                                                                                            pdf.text( email, 320, 350 );

                                                                                                            pdf.text( 'Have you picked up and returned the ELB to the office?', 30, 410 );
                                                                                                            pdf.text( 'Have you picked up your yard sign?', 30, 430 );
                                                                                                            pdf.text( 'If not in your MLS, have you put listing in for information only?', 30, 450 );
                                                                                                            pdf.text( 'Within 5 miles of Hazleton, have you requested a sold sign install?', 30, 470 );

                                                                                                            pdf.text( elb, 550, 410, 'right' );
                                                                                                            pdf.text( yard, 550, 430, 'right' );
                                                                                                            pdf.text( listing, 550, 450, 'right' );
                                                                                                            pdf.text( sold, 550, 470, 'right' );

                                                                                                            pdf.text( leadSource, 30, 530 );
                                                                                                            pdf.text( salesPrice, 30, 550 );
                                                                                                            pdf.text( sellerAssist, 30, 570 );
                                                                                                            pdf.text( grossCommission, 30, 590 );

                                                                                                            if(type === 1) {
                                                                                                                let data = pdf.output();
                                                                                                                var folder = $('#close-transaction-dropdown').val();
                                                                                                                $.ajax({
                                                                                                                    url: "/e/controllers/Close.php",
                                                                                                                    type: "POST",
                                                                                                                    data: {
                                                                                                                        type: 'upload-form',
                                                                                                                        folder: folder,
                                                                                                                        data: data,
                                                                                                                    }
                                                                                                                }).done(function(res) {
                                                                                                                    if(res == 1) {
                                                                                                                        GetCloseFiles();
                                                                                                                        alert("Uploaded successfully!");
                                                                                                                    }
                                                                                                                    else alert("Failed!");
                                                                                                                })
                                                                                                            } else if(type === 2) {
                                                                                                                pdf.save("Commission Distribution.pdf");
                                                                                                            }
                                                                                                            // }
                                                                                                            // return pdf;
                                                                                                        }
                                                                                                    }
                                                                                                }
                                                                                            }
                                                                                        }
                                                                                    }
                                                                                }
                                                                            }
                                                                        }
                                                                    // }
                                                                }
                                                            }
                                                        }
                                                    }
                                                }
                                            }
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }
    }

    $('#chapter-final-modal-ok-btn').click(function() {
        $('#close-final-form').show();
        $('#chapter-final-modal-cancel-btn').click();
    })

    $('#upload').click(function() {
        $.ajax({
            url: "/e/controllers/Close.php",
            type: "POST",
            data: {
                type: 'upload-form',
            },
            success: function(res) {
                console.log(res);
            },
            error: function(err) {
                console.log(err);
            }
        })
    })

    function GetCloseFiles() {
        var folder = $('#close-transaction-dropdown').val();
        if(folder.length > 0) {
            var formData = new FormData();
            formData.append('type', 'getFiles');
            formData.append('folder', folder);
            $.ajax({
                url: "/e/controllers/Close.php",
                type: 'post',
                enctype: 'multipart/form-data',
                contentType: false,
                processData: false,
                data: formData,
                success:function(res) {
                    var files = JSON.parse(res);
                    $('#close-file-show').empty();
                    if(files.length) {
                        files.forEach((file, index) => {
                            $('#close-file-show').prepend(`<div class="arrange file-title">
                                <div class="icon">
                                    <a href="#"><img src="/e/assets/img/pdf.png" width="100%" height="100%" alt="" title="" /></a>
                                </div>
                                <h4 class="text-center m-0">${file['name']}</h4>
                                <div class="icon">
                                    <a class="filemenu-btn button" num="${index}"><img src="/e/assets/img/tools.png" width="100%" height="100%" alt="" title="" /></a>
                                    <ul class="submenu" id="submenu-${index}">
                                        <li><a class="mail-btn" folder=${folder} file="${file['name']}" path="./pend/${folder}/${file['name']}">Email</a></li>
                                        <li><a href="./pend/${folder}/${file['name']}" target="_blank">Download</a></li>
                                        <li><a href="./pend/${folder}/${file['name']}" target="_blank">Print</a></li>
                                    </ul>
                                </div>
                            </div>
                            <br>`);
                        });
                    }
                        
                }
            })
        }            
    }

    $('#final-company-name').change(function(e) {
        if(e.target.value === "Other") {
            $('#final-other-company-div').show();
        } else {
            $('#final-other-company-div').hide();
        }
    })

    $('#final-file-btn').click(function() {
        var folder = $('#close-transaction-dropdown').val();
        var formData = new FormData();
        formData.append('type', 'final-file');
        formData.append('folder', folder);
        formData.append('file', $('#final-file')[0].files[0]);
        $.ajax({
            url: "/e/controllers/Close.php",
            type: 'post',
            enctype: 'multipart/form-data',
            contentType: false,
            processData: false,
            data: formData,
            success: function(res) {
                if(res == 1) {
                    alert('Uploaded successfully!');
                    GetCloseFiles();
                    alert("Done!");
                } else if(res == 2) {
                    alert('The file is not pdf!');
                } else {
                    alert('File upload failed!');
                }
            }
        })
    })

    function updateTextView(_obj){
      var num = getNumber(_obj.val());
      if(num==0){
        _obj.val('');
      }else{
        _obj.val(num.toLocaleString());
      }
    }

    function getNumber(_str){
        const arr = _str.split('');
        const out = [];
        for(let cnt=0; cnt<arr.length; cnt++){
        if(isNaN(arr[cnt])===false){
          out.push(arr[cnt]);
        }
      }
      return Number(out.join(''));
    }

      $('#sales-price').on('keyup',function(){
        updateTextView($(this));
      });

      $('#seller-assist').on('keyup',function(){
        updateTextView($(this));
      });

      $('#gross-commission-amount').on('keyup',function(){
        updateTextView($(this));
      });

      $('#upload_list_new').click(function() {
          $('#list-contract').hide();
          $('#list-consumer-notice').hide();
          $('#list-estimated-closing-cost').hide();
          $('#list-sellers-property-disclosure').hide();
          $('#list-listing-contract').hide();
          $('#list-folders').hide();
          $('#list-contract').show();
      })

    $('#upload_list_additional').click(function() {
        $('#list-contract').hide();
        $('#list-consumer-notice').hide();
        $('#list-estimated-closing-cost').hide();
        $('#list-sellers-property-disclosure').hide();
        $('#list-lead-paint-disclosure').hide();
        $('#list-listing-contract').hide();
        $('#list-folders').show();
    })

    var listFiles = [];

    $('#list-folders-dropdown').change(function (e) {
        $('#list-created-folder-title h4').html(e.target.value);
        if(e.target.value) {
            // GetListFiles();
            $('#list-created-folder-title').show();
            var folder = $('#list-created-folder-title h4').html();
            if(folder.length > 0) {
                var formData = new FormData();
                formData.append('type', 'getFiles');
                formData.append('folder', folder);
                $.ajax({
                    url: "/e/controllers/List.php",
                    type: 'post',
                    enctype: 'multipart/form-data',
                    contentType: false,
                    processData: false,
                    data: formData,
                    success:function(res) {
                        var files = JSON.parse(res);
                        $('#list-file-show').empty();
                        if(files.length) {
                            files.forEach((file, index) => {
                                $('#list-file-show').prepend(`<div class="arrange file-title">
                                <div class="icon">
                                    <a href="#"><img src="/e/assets/img/pdf.png" width="100%" height="100%" alt="" title="" /></a>
                                </div>
                                <h4 class="text-center m-0">${file['name']}</h4>
                                <div class="icon">
                                    <a class="filemenu-btn button" num="${index}"><img src="/e/assets/img/tools.png" width="100%" height="100%" alt="" title="" /></a>
                                    <ul class="submenu" id="submenu-${index}">
                                        <li><a class="mail-btn" folder=${folder} file="${file['name']}" path="./pend/${folder}/${file['name']}">Email</a></li>
                                        <li><a href="./pend/${folder}/${file['name']}" target="_blank">Download</a></li>
                                        <li><a href="./pend/${folder}/${file['name']}" target="_blank">Print</a></li>
                                    </ul>
                                </div>
                            </div>
                            <br>`);
                            });
                            listFiles = files;
                            if(listFiles.findIndex(file => file['name'] === 'Listing Contract.pdf') < 0) {
                                modalOpen('list-continue-modal');
                            }
                        }
                    }
                })
            }
        } else {
            $('#list-created-folder-title').hide();
        }
    })

    $('#list-continue-modal-ok-btn').click(function() {
        if(listFiles.findIndex(file => file['name'] === 'Consumer Notice.pdf') < 0) {
            $('#list-consumer-notice').show();
        } else if(listFiles.findIndex(file => file['name'] === 'Estimated Closing Costs.pdf') < 0) {
            $('#list-estimated-closing-cost').show();
        } else if(listFiles.findIndex(file => file['name'] === 'Property Disclosure.pdf') < 0) {
            $('#list-sellers-property-disclosure').show();
        } else if(listFiles.findIndex(file => file['name'] === 'Lead Paint Disclosure.pdf') < 0) {
            $('#list-lead-paint-disclosure').show();
        } else if(listFiles.findIndex(file => file['name'] === 'Listing Contract.pdf') < 0) {
            $('#list-listing-contract').show();
        }
        $('#list-folders').hide();
    })

    $('#list-additional-upload-btn').click(function() {
        var file = $('#list-additional-file').val();
        var fileName = $('#list-additional-file-name').val();
        var folder = $('#list-folders-dropdown').val();
        if(!file) alert("You didn't select file!");
        else {
            if(!folder) alert("You didn't select transaction!");
            else {
                var formData = new FormData();
                formData.append('type', 'listAdditionalUpload');
                formData.append('folder', folder);
                formData.append('name', fileName);
                formData.append('file', $('#list-additional-file')[0].files[0]);
                $.ajax({
                    url: "/e/controllers/List.php",
                    type: 'post',
                    enctype: 'multipart/form-data',
                    contentType: false,
                    processData: false,
                    data: formData,
                    success:function(res) {
                        if(res == 1) {
                            if(!fileName) alert(`File successfully uploaded to ${folder}`);
                            else alert(`${fileName}.pdf successfully uploaded to ${folder}`);
                            GetListFiles();
                            $('#list-additional-file').val('');
                            $('#list-additional-file-name').val('');
                        } else if(res == 2) {
                            alert('The file is not pdf!');
                        } else {
                            alert('File upload failed!');
                        }
                    }
                })
            }
        }
    })

      $('#list-submit').click(function() {
        let seller = $('#list-start-seller').val();
        const house = $('#list-start-house').val();
        const direction = $('#list-start-direction').val();
          let street = $('#list-start-street').val();
        const streetSuffix = $('#list-start-street-suffix').val();

        seller = titleCase(seller);
        street = titleCase(street);

        if(!seller || !house || !street) {
            alert("You didn't input all data!");
        } else {
            $.ajax({
                url: "/e/controllers/List.php",
                type: "post",
                data: {
                    type: 'listStart',
                    seller: seller,
                    house: house,
                    direction: direction,
                    street: street,
                    streetSuffix: streetSuffix,
                },
                success: function(res) {
                    console.log(res);
                    if(res == 1) {
                        modalOpen('list-start-confirm');
                        $('#list-created-folder-title h4').html(`${seller}_${house}_${street}`);
                        $('#list-created-folder-title').show();
                    } else {
                        alert(`${seller}_${house}_${street} folder already exist! Please finish uploading files!`);
                        var folders = JSON.parse(res);
                        folders.splice(0, 2);
                        console.log(folders);
                        $('#list-created-folder-title h4').html(`${seller}_${house}_${street}`);
                        $('#list-created-folder-title').show();
                        GetListFiles();


                        if(folders.indexOf('Consumer Notice.pdf' ) < 0) {
                            $('#list-contract').hide();
                            $('#list-consumer-notice').show();
                        } else if(folders.indexOf('Estimated Closing Costs.pdf') < 0) {
                            $('#list-contract').hide();
                            $('#list-consumer-notice').hide();
                            $('#list-estimated-closing-cost').show();
                        } else if(folders.indexOf('Property Disclosure.pdf') < 0) {
                            $('#list-contract').hide();
                            $('#list-consumer-notice').hide();
                            $('#list-estimated-closing-cost').hide();
                            $('#list-sellers-property-disclosure').show();
                        } else if(folders.indexOf('Lead Paint Disclosure.pdf') < 0) {
                            $('#list-contract').hide();
                            $('#list-consumer-notice').hide();
                            $('#list-estimated-closing-cost').hide();
                            $('#list-sellers-property-disclosure').hide();
                            $('#list-lead-paint-disclosure').hide();
                            modalOpen('list-lead-paint-disclosure-modal');
                        } else if(folders.indexOf('Listing Contract.pdf') < 0) {
                            $('#list-contract').hide();
                            $('#ist-listing-contract').show();
                        }
                    }
                },
                error: function(err) {
                    console.log(err);
                    alert("Something's wrong");
                }
            })
        }
      });

      $('#list-start-confirm-ok-btn').click(function() {
          $('#list-contract').hide();
          $('#list-consumer-notice').show();
          $('#list-start-confirm-modal-cancel-btn').click();
      });

    $('#list-start-confirm-ok-btn').click(function() {
        $('#list-contract').hide();
        $('#list-consumer-notice').show();
        $('#list-start-confirm-modal-cancel-btn').click();
    });

    $('#file-list-consumer-notice-btn').click(function() {
        var file = $('#file-list-consumer-notice').val();
        if(!file) alert("You didn't select file!");
        else {
            var folder = $('#list-created-folder-title h4').html();
            var formData = new FormData();
            formData.append('type', 'listConsumerNotice');
            formData.append('folder', folder);
            formData.append('file', $('#file-list-consumer-notice')[0].files[0]);
            $.ajax({
                url: "/e/controllers/List.php",
                type: 'post',
                enctype: 'multipart/form-data',
                contentType: false,
                processData: false,
                data: formData,
                success:function(res) {
                    if(res == 1) {
                        alert(`Consumer Notice.pdf successfully uploaded to ${folder}`);
                        GetListFiles();
                        $('#list-consumer-notice').hide();
                        $('#list-estimated-closing-cost').show();
                    } else if(res == 2) {
                        alert('The file is not pdf!');
                    } else {
                        alert('Consumer Notice.pdf upload failed!');
                    }
                }
            })
        }
    });

    $('#file-list-estimated-closing-cost-btn').click(function() {
        var file = $('#file-list-estimated-closing-cost').val();
        if(!file) alert("You didn't select file!");
        else {
            var folder = $('#list-created-folder-title h4').html();
            var formData = new FormData();
            formData.append('type', 'listEstimatedClosingCost');
            formData.append('folder', folder);
            formData.append('file', $('#file-list-estimated-closing-cost')[0].files[0]);
            $.ajax({
                url: "/e/controllers/List.php",
                type: 'post',
                enctype: 'multipart/form-data',
                contentType: false,
                processData: false,
                data: formData,
                success:function(res) {
                    if(res == 1) {
                        alert(`Estimated Closing Costs.pdf successfully uploaded to ${folder}`);
                        GetListFiles();
                        $('#list-estimated-closing-cost').hide();
                        $('#list-sellers-property-disclosure').show();
                    } else if(res == 2) {
                        alert('The file is not pdf!');
                    } else {
                        alert('File upload failed!');
                    }
                }
            })
        }
    });

    $('#file-list-sellers-property-disclosure-btn').click(function() {
        var file = $('#file-list-sellers-property-disclosure').val();
        if(!file) alert("You didn't select file!");
        else {
            var folder = $('#list-created-folder-title h4').html();
            var formData = new FormData();
            formData.append('type', 'listPropertyDisclosure');
            formData.append('folder', folder);
            formData.append('file', $('#file-list-sellers-property-disclosure')[0].files[0]);
            $.ajax({
                url: "/e/controllers/List.php",
                type: 'post',
                enctype: 'multipart/form-data',
                contentType: false,
                processData: false,
                data: formData,
                success:function(res) {
                    if(res == 1) {
                        alert(`Property Disclosure.pdf successfully uploaded to ${folder}`);
                        GetListFiles();
                        modalOpen('list-lead-paint-disclosure-modal');
                    } else if(res == 2) {
                        alert('The file is not pdf!');
                    } else {
                        alert('File upload failed!');
                    }
                }
            })
        }
    });

    $('#list-lead-paint-disclosure-modal-ok-btn').click(function() {
        $('#list-lead-paint-disclosure-modal-cancel-btn').click();
        $('#list-sellers-property-disclosure').hide();
        $('#list-lead-paint-disclosure').show();
    });

    $('#list-lead-paint-disclosure-modal-no-btn').click(function() {
        $('#list-lead-paint-disclosure-modal-cancel-btn').click();
        $('#list-sellers-property-disclosure').hide();
        $('#list-listing-contract').show();
    });

    $('#file-list-lead-paint-disclosure-btn').click(function() {
        var file = $('#file-list-lead-paint-disclosure').val();
        if(!file) alert("You didn't select file!");
        else {
            var folder = $('#list-created-folder-title h4').html();
            var formData = new FormData();
            formData.append('type', 'listLeadPaintDisclosure');
            formData.append('folder', folder);
            formData.append('file', $('#file-list-lead-paint-disclosure')[0].files[0]);
            $.ajax({
                url: "/e/controllers/List.php",
                type: 'post',
                enctype: 'multipart/form-data',
                contentType: false,
                processData: false,
                data: formData,
                success:function(res) {
                    if(res == 1) {
                        alert(`Lead Paint Disclosure.pdf successfully uploaded to ${folder}`);
                        GetListFiles();
                        $('#list-lead-paint-disclosure').hide();
                        $('#list-listing-contract').show();
                    } else if(res == 2) {
                        alert('The file is not pdf!');
                    } else {
                        alert('File upload failed!');
                    }
                }
            })
        }
    });

    $('#file-list-listing-contract-btn').click(function() {
        var file = $('#file-list-listing-contract').val();
        if(!file) alert("You didn't select file!");
        else {
            var folder = $('#list-created-folder-title h4').html();
            var formData = new FormData();
            formData.append('type', 'listListingContract');
            formData.append('folder', folder);
            formData.append('file', $('#file-list-listing-contract')[0].files[0]);
            $.ajax({
                url: "/e/controllers/List.php",
                type: 'post',
                enctype: 'multipart/form-data',
                contentType: false,
                processData: false,
                data: formData,
                success:function(res) {
                    if(res == 1) {
                        GetListFiles();
                        alert(`Listing Contract.pdf successfully uploaded to ${folder}`);
                        alert('Your Minimum Required Documents are complete.  Upload any additional documents via the Additional Docs Upload Button!');
                    } else if(res == 2) {
                        alert('The file is not pdf!');
                    } else {
                        alert('File upload failed!');
                    }
                }
            })
        }
    });








    function GetListFiles() {
        var folder = $('#list-created-folder-title h4').html();
        if(folder.length > 0) {
            var formData = new FormData();
            formData.append('type', 'getFiles');
            formData.append('folder', folder);
            $.ajax({
                url: "/e/controllers/List.php",
                type: 'post',
                enctype: 'multipart/form-data',
                contentType: false,
                processData: false,
                data: formData,
                success:function(res) {
                    var files = JSON.parse(res);
                    $('#list-file-show').empty();
                    if(files.length) {
                        files.forEach((file, index) => {
                            $('#list-file-show').prepend(`<div class="arrange file-title">
                                <div class="icon">
                                    <a href="#"><img src="/e/assets/img/pdf.png" width="100%" height="100%" alt="" title="" /></a>
                                </div>
                                <h4 class="text-center m-0">${file['name']}</h4>
                                <div class="icon">
                                    <a class="filemenu-btn button" num="${index}"><img src="/e/assets/img/tools.png" width="100%" height="100%" alt="" title="" /></a>
                                    <ul class="submenu" id="submenu-${index}">
                                        <li><a class="mail-btn" folder=${folder} file="${file['name']}" path="./pend/${folder}/${file['name']}">Email</a></li>
                                        <li><a href="./pend/${folder}/${file['name']}" target="_blank">Download</a></li>
                                        <li><a href="./pend/${folder}/${file['name']}" target="_blank">Print</a></li>
                                    </ul>
                                </div>
                            </div>
                            <br>`);
                        });
                    }

                }
            })
        }
    }

    function modalOpen(modal) {
        $('#modal-btn').attr('data-target', '#' + modal);
        $('#modal-btn').click();
    }


})