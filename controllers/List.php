<?php

if(isset($_POST['type'])) {

    $type = $_POST['type'];

    switch ($type) {

        case 'listStart': ListStart(); break;
        case 'listConsumerNotice': ListConsumerNotice(); break;
        case 'listEstimatedClosingCost': ListEstimatedClosingCost(); break;
        case 'listPropertyDisclosure': ListPropertyDisclosure(); break;
        case 'listLeadPaintDisclosure': ListLeadPaintDisclosure(); break;
        case 'listListingContract': ListListingContract(); break;
        case 'getFiles': GetFiles(); break;
        case 'listAdditionalUpload': ListAdditionalUpload(); break;
        case 'deleteDocument': DeleteDocument(); break;

    }

}

function DeleteDocument() {
    session_start();
    $auth = $_SESSION['auth'];
    $username = $auth['username'];
    $folder = $_POST['folder'];
    $file = $_POST['file'];
    $path = $_POST['path'];
    $docPath = '../priv/'.$username.'/'.$path.'/'.$folder.'/'.$file;
    if(is_file($docPath)) {
        $result = unlink($docPath);
        if($result) echo 1;
        else echo 0;
    }
}

function ListAdditionalUpload() {
    session_start();
    $auth = $_SESSION['auth'];
    $username = $auth['username'];

    $folder = $_POST['folder'];
    $filename = $_POST['name'];

    $path = '../priv/'.$username.'/list/'.$folder.'/';
    $target_file = $path . basename($_FILES["file"]["name"]);
    $extension = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    if($extension != 'pdf') {
        echo 2;
    }

    else {
        if($filename == "") $file_name = $path.$_FILES["file"]["name"];
        else $file_name = $path.$filename.".".$extension;
        move_uploaded_file($_FILES["file"]["tmp_name"], $file_name);

        echo 1;
    }
}

function ListListingContract() {
    session_start();
    $auth = $_SESSION['auth'];
    $username = $auth['username'];

    $folder = $_POST['folder'];

    $path = '../priv/'.$username.'/list/'.$folder.'/';
    $target_file = $path . basename($_FILES["file"]["name"]);
    $extension = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    if($extension != 'pdf') {
        echo 2;
    }

    else {
        $file_name = $path."Listing Contract.".$extension;
        move_uploaded_file($_FILES["file"]["tmp_name"], $file_name);

        echo 1;
    }
}

function ListLeadPaintDisclosure() {
    session_start();
    $auth = $_SESSION['auth'];
    $username = $auth['username'];

    $folder = $_POST['folder'];

    $path = '../priv/'.$username.'/list/'.$folder.'/';
    $target_file = $path . basename($_FILES["file"]["name"]);
    $extension = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    if($extension != 'pdf') {
        echo 2;
    }

    else {
        $file_name = $path."Lead Paint Disclosure.".$extension;
        move_uploaded_file($_FILES["file"]["tmp_name"], $file_name);

        echo 1;
    }
}

function ListPropertyDisclosure() {
    session_start();
    $auth = $_SESSION['auth'];
    $username = $auth['username'];

    $folder = $_POST['folder'];

    $path = '../priv/'.$username.'/list/'.$folder.'/';
    $target_file = $path . basename($_FILES["file"]["name"]);
    $extension = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    if($extension != 'pdf') {
        echo 2;
    }

    else {
        $file_name = $path."Property Disclosure.".$extension;
        move_uploaded_file($_FILES["file"]["tmp_name"], $file_name);

        echo 1;
    }
}

function ListEstimatedClosingCost() {
    session_start();
    $auth = $_SESSION['auth'];
    $username = $auth['username'];

    $folder = $_POST['folder'];

    $path = '../priv/'.$username.'/list/'.$folder.'/';
    $target_file = $path . basename($_FILES["file"]["name"]);
    $extension = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    if($extension != 'pdf') {
        echo 2;
    }

    else {
        $file_name = $path."Estimated Closing Costs.".$extension;
        move_uploaded_file($_FILES["file"]["tmp_name"], $file_name);

        echo 1;
    }
}

function ListConsumerNotice() {
    session_start();
    $auth = $_SESSION['auth'];
    $username = $auth['username'];

    $folder = $_POST['folder'];

    $path = '../priv/'.$username.'/list/'.$folder.'/';
    $target_file = $path . basename($_FILES["file"]["name"]);
    $extension = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    if($extension != 'pdf') {
        echo 2;
    }

    else {
        $file_name = $path."Consumer Notice.".$extension;
        move_uploaded_file($_FILES["file"]["tmp_name"], $file_name);

        echo 1;
    }
}

function ListStart() {
    $seller = $_POST['seller'];
    $house = $_POST['house'];
    $direction = $_POST['direction'];
    $street = $_POST['street'];
    $streetSuffix = $_POST['streetSuffix'];
    session_start();
    $auth = $_SESSION['auth'];
    $username = $auth['username'];
    if(!is_dir('../priv/'.$username.'/list/'.$seller.'_'.$house.'_'.$street)) {
        mkdir('../priv/'.$username.'/list/'.$seller.'_'.$house.'_'.$street);
        echo 1;
    } else {
        $somePath = '../priv/'.$username.'/list/'.$seller.'_'.$house.'_'.$street;
        $all_files = scandir($somePath);
        echo json_encode($all_files);
    }
}

function GetFiles() {
    $folder = $_POST['folder'];
    session_start();
    $auth = $_SESSION['auth'];
    $username = $auth['username'];

    $somePath = '../priv/'.$username.'/list/'.$folder;
    $files = [];
    foreach (new DirectoryIterator($somePath) as $fileInfo) {
        if (!$fileInfo->isDot()) {
            $files[] = array(
                'name' => $fileInfo->getFilename(),
                'type' => strtoupper(pathinfo($fileInfo->getFilename(), PATHINFO_EXTENSION)),
                'date' => $fileInfo->getATime(),
            );
        }
    }
    usort($files, function ($a, $b) {
        return $a['date'] - $b['date'];
    });
    echo json_encode($files);
}