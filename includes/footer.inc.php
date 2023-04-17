    <footer>
    <script src="./assets/js/jquery.treetable.js"></script>
    <script>
    $(".treetable").treetable({ expandable: true });

    // Highlight selected row
    $(".treetable tbody").on("mousedown", "tr", function() {
    $(".selected").not(this).removeClass("selected");
    $(this).toggleClass("selected");
    });
    $("#uploadForm").on('submit', function(e){
        e.preventDefault();
        var formData = new FormData();
        formData.append('item', $('#item').val());
        formData.append('version', $('#version').val());
        // Attach file
        formData.append('file1', $('#file1')[0].files[0]); 
        formData.append('file2', $('#file2')[0].files[0]); 
        formData.append('file3', $('#file3')[0].files[0]); 
        formData.append('file4', $('#file4')[0].files[0]); 
        formData.append('file5', $('#file5')[0].files[0]); 
        formData.append('file6', $('#file6')[0].files[0]); 
        $.ajax({
            xhr: function() {
                var xhr = new window.XMLHttpRequest();
                xhr.upload.addEventListener("progress", function(evt) {
                    if (evt.lengthComputable) {
                        var percentComplete = ((evt.loaded / evt.total) * 100);
                        $(".progress-bar").width(percentComplete + '%');
                        $(".progress-bar").html(percentComplete+'%');
                    }
                }, false);
                return xhr;
            },
            type: 'POST',
            url: 'app/file/upload.php',
            data: formData,
            contentType: false,
            cache: false,
            processData:false,
            beforeSend: function(){
                $('#loading').slideDown();
                $(".progress-bar").width('0%');
                $('#uploadStatus').html('<img src="./assets/img/loading.gif"/>');
            },
            error:function(){
                $('#uploadStatus').html('<p style="color:#EA4335;">File upload failed, please try again.</p>');
            },
            success: function(resp){
                if(resp == 'ok'){
                    $('#uploadForm')[0].reset();
                    $('#uploadStatus').html('<p style="color:#28A74B;">File has uploaded successfully!</p>');
                }else if(resp == 'err'){
                    $('#uploadStatus').html('<p style="color:#EA4335;">Please select a valid file to upload.</p>');
                }
                $('#close-btn').click();
                setTimeout(mySlide, 1000);
                
            }
        });
    });

    function mySlide() {
        $('#loading').slideUp();
        window.location.reload();
    }
    
    // File type validation
    $("#fileInput").change(function(){
        var allowedTypes = ['application/pdf', 'application/msword', 'application/vnd.ms-office', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document', 'image/jpeg', 'image/png', 'image/jpg', 'image/gif'];
        var file = this.files[0];
        var fileType = file.type;
        if(!allowedTypes.includes(fileType)){
            alert('Please select a valid file (PDF/DOC/DOCX/JPEG/JPG/PNG/GIF).');
            $("#fileInput").val('');
            return false;
        }
    });
    </script>
    </footer>
</body>
</html>