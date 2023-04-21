<?php

	if(isset($_POST['type'])) {

		$type = $_POST['type'];

		switch ($type) {

			case 'copyFolders': CopyFolders(); break;
			case 'copyListFolders': CopyListFolders(); break;
			case 'getFiles': GetFiles(); break;
			case 'chapter-one-a': FileUploadOneA(); break;
			case 'chapter-one-b': FileUploadOneB(); break;
			case 'chapter-one-c': FileUploadOneC(); break;
			case 'chapter-two-a': FileUploadTwoA(); break;
			case 'chapter-two-b': FileUploadTwoB(); break;
			case 'chapter-two-c': FileUploadTwoC(); break;
			case 'chapter-three-a': FileUploadThreeA(); break;
			case 'chapter-four-a': FileUploadFourA(); break;
			case 'chapter-five-a': FileUploadFiveA(); break;
			case 'chapter-five-b': FileUploadFiveB(); break;
			case 'chapter-six': FileUploadSix(); break;
			case 'chapter-seven': FileUploadSeven(); break;
//			case 'chapter-eight': FileUploadEight(); break;
			case 'final-file': FileFinalUpload(); break;
			case 'upload-form': UploadForm(); break;
            case 'additionalUpload': AdditionalUpload(); break;

		}

	}

    function AdditionalUpload() {
        if(!isset($_SESSION))
        {
            session_start();
        }
        $auth = $_SESSION['auth'];
        $username = $auth['username'];

        $folder = $_POST['folder'];
        $filename = $_POST['name'];

        $path = '../priv/'.$username.'/close/'.$folder.'/';
        $target_file = $path . basename($_FILES["file"]["name"]);
        $extension = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        if($extension != 'pdf') {
            echo 2;
        }

        else {
            if($filename == "") $file_name = $path.$_FILES["file"]["name"];
            else $file_name = $path.$filename.'.'.$extension;
            move_uploaded_file($_FILES["file"]["tmp_name"], $file_name);

            echo 1;
        }
    }


	function UploadForm() {
		if(!empty($_POST['data'])){
	        session_start(); 
			$auth = $_SESSION['auth'];
			$username = $auth['username'];

	  		$folder = $_POST['folder'];

	  		$path = '../priv/'.$username.'/close/'.$folder.'/';

		    $data = $_POST['data'];

		    file_put_contents( $path."Commission Distribution.pdf", $data );
		    echo 1;
		}
	}

	function FileFinalUpload() {
		if(!isset($_SESSION)) 
	    { 
	        session_start(); 
	    }
		$auth = $_SESSION['auth'];
		$username = $auth['username'];

  		$folder = $_POST['folder'];

  		$path = '../priv/'.$username.'/close/'.$folder.'/';
  		$target_file = $path . basename($_FILES["file"]["name"]);
  		$extension = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

  		if($extension != 'pdf') {
  			echo 2;
  		}

  		else {
	  		$file_name = $path."Commission Distribution.".$extension;
			move_uploaded_file($_FILES["file"]["tmp_name"], $file_name);

			echo 1;
		}
  	}


	function FileUploadOneA() {
		if(!isset($_SESSION)) 
	    { 
	        session_start(); 
	    }
		$auth = $_SESSION['auth'];
		$username = $auth['username'];

  		$folder = $_POST['folder'];

  		$path = '../priv/'.$username.'/close/'.$folder.'/';
  		$target_file = $path . basename($_FILES["file"]["name"]);
  		$extension = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

  		if($extension != 'pdf') {
  			echo 2;
  		}

  		else {
	  		$file_name = $path."Buyer Reply to Insp.".$extension;
			move_uploaded_file($_FILES["file"]["tmp_name"], $file_name);

			echo 1;
		}
  	}


	function FileUploadOneB() {
		if(!isset($_SESSION)) 
	    { 
	        session_start(); 
	    }
		$auth = $_SESSION['auth'];
		$username = $auth['username'];

  		$folder = $_POST['folder'];

  		$path = '../priv/'.$username.'/close/'.$folder.'/';
  		$target_file = $path . basename($_FILES["file"]["name"]);
  		$extension = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

  		if($extension != 'pdf') {
  			echo 2;
  		}

  		else {
	  		$file_name = $path."Seller Response to BRI.".$extension;
			move_uploaded_file($_FILES["file"]["tmp_name"], $file_name);

			echo 1;
		}
  	}


	function FileUploadOneC() {
		if(!isset($_SESSION)) 
	    { 
	        session_start(); 
	    }
		$auth = $_SESSION['auth'];
		$username = $auth['username'];

  		$folder = $_POST['folder'];

  		$path = '../priv/'.$username.'/close/'.$folder.'/';
  		$target_file = $path . basename($_FILES["file"]["name"]);
  		$extension = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

  		if($extension != 'pdf') {
  			echo 2;
  		}

  		else {
	  		$file_name = $path."Add'l Inspection Docs.".$extension;
			move_uploaded_file($_FILES["file"]["tmp_name"], $file_name);

			echo 1;
		}
  	}


	function FileUploadTwoA() {
		if(!isset($_SESSION)) 
	    { 
	        session_start(); 
	    }
		$auth = $_SESSION['auth'];
		$username = $auth['username'];

  		$folder = $_POST['folder'];

  		$path = '../priv/'.$username.'/close/'.$folder.'/';
  		$target_file = $path . basename($_FILES["file"]["name"]);
  		$extension = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

  		if($extension != 'pdf') {
  			echo 2;
  		}

  		else {
	  		$file_name = $path."Appraisal Corrective Proposal.".$extension;
			move_uploaded_file($_FILES["file"]["tmp_name"], $file_name);

			echo 1;
		}
  	}


	function FileUploadTwoB() {
		if(!isset($_SESSION)) 
	    { 
	        session_start(); 
	    }
		$auth = $_SESSION['auth'];
		$username = $auth['username'];

  		$folder = $_POST['folder'];

  		$path = '../priv/'.$username.'/close/'.$folder.'/';
  		$target_file = $path . basename($_FILES["file"]["name"]);
  		$extension = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

  		if($extension != 'pdf') {
  			echo 2;
  		}

  		else {
	  		$file_name = $path."Seller Response to ACP.".$extension;
			move_uploaded_file($_FILES["file"]["tmp_name"], $file_name);

			echo 1;
		}
  	}


	function FileUploadTwoC() {
		if(!isset($_SESSION)) 
	    { 
	        session_start(); 
	    }
		$auth = $_SESSION['auth'];
		$username = $auth['username'];

  		$folder = $_POST['folder'];

  		$path = '../priv/'.$username.'/close/'.$folder.'/';
  		$target_file = $path . basename($_FILES["file"]["name"]);
  		$extension = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

  		if($extension != 'pdf') {
  			echo 2;
  		}

  		else {
	  		$file_name = $path."Additional ACP Docs.".$extension;
			move_uploaded_file($_FILES["file"]["tmp_name"], $file_name);

			echo 1;
		}
  	}


	function FileUploadThreeA() {
		if(!isset($_SESSION)) 
	    { 
	        session_start(); 
	    }
		$auth = $_SESSION['auth'];
		$username = $auth['username'];

  		$folder = $_POST['folder'];

  		$path = '../priv/'.$username.'/close/'.$folder.'/';
  		$target_file = $path . basename($_FILES["file"]["name"]);
  		$extension = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

  		if($extension != 'pdf') {
  			echo 2;
  		}

  		else {
	  		$file_name = $path."C_O Information.".$extension;
			move_uploaded_file($_FILES["file"]["tmp_name"], $file_name);

			echo 1;
		}
  	}


	function FileUploadFourA() {
		if(!isset($_SESSION)) 
	    { 
	        session_start(); 
	    }
		$auth = $_SESSION['auth'];
		$username = $auth['username'];

  		$folder = $_POST['folder'];

  		$path = '../priv/'.$username.'/close/'.$folder.'/';
  		$target_file = $path . basename($_FILES["file"]["name"]);
  		$extension = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

  		if($extension != 'pdf') {
  			echo 2;
  		}

  		else {
	  		$file_name = $path."Closing Extension.".$extension;
			move_uploaded_file($_FILES["file"]["tmp_name"], $file_name);

			echo 1;
		}
  	}


	function FileUploadFiveA() {
		if(!isset($_SESSION)) 
	    { 
	        session_start(); 
	    }
		$auth = $_SESSION['auth'];
		$username = $auth['username'];

  		$folder = $_POST['folder'];

  		$path = '../priv/'.$username.'/close/'.$folder.'/';
  		$target_file = $path . basename($_FILES["file"]["name"]);
  		$extension = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

  		if($extension != 'pdf') {
  			echo 2;
  		}

  		else {
	  		$file_name = $path."".$_POST['file_name'].".".$extension;
			move_uploaded_file($_FILES["file"]["tmp_name"], $file_name);

			echo 1;
		}
  	}


	function FileUploadFiveB() {
		if(!isset($_SESSION)) 
	    { 
	        session_start(); 
	    }
		$auth = $_SESSION['auth'];
		$username = $auth['username'];

  		$folder = $_POST['folder'];

  		$path = '../priv/'.$username.'/close/'.$folder.'/';
  		$target_file = $path . basename($_FILES["file"]["name"]);
  		$extension = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

  		if($extension != 'pdf') {
  			echo 2;
  		}

  		else {
	  		$file_name = $path."".$_POST['file_name'].".".$extension;
			move_uploaded_file($_FILES["file"]["tmp_name"], $file_name);

			echo 1;
		}
  	}


	function FileUploadSix() {
		if(!isset($_SESSION)) 
	    { 
	        session_start(); 
	    }
		$auth = $_SESSION['auth'];
		$username = $auth['username'];

  		$folder = $_POST['folder'];

  		$path = '../priv/'.$username.'/close/'.$folder.'/';
  		$target_file = $path . basename($_FILES["file"]["name"]);
  		$extension = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

  		if($extension != 'pdf') {
  			echo 2;
  		}

  		else {
	  		$file_name = $path."Final Walkthrough.".$extension;
			move_uploaded_file($_FILES["file"]["tmp_name"], $file_name);

			echo 1;
		}
  	}


	function FileUploadSeven() {
		if(!isset($_SESSION)) 
	    { 
	        session_start(); 
	    }
		$auth = $_SESSION['auth'];
		$username = $auth['username'];

  		$folder = $_POST['folder'];

  		$path = '../priv/'.$username.'/close/'.$folder.'/';
  		$target_file = $path . basename($_FILES["file"]["name"]);
  		$extension = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

  		if($extension != 'pdf') {
  			echo 2;
  		}

  		else {
	  		$file_name = $path."Settlement Sheet.".$extension;
			move_uploaded_file($_FILES["file"]["tmp_name"], $file_name);

			echo 1;
		}
  	}

	function CopyFolders() {		
		if(!isset($_SESSION)) 
	    { 
	        session_start(); 
	    }
		$auth = $_SESSION['auth'];
		$username = $auth['username'];
		$folder = $_POST['folder'];

		$somePath = '../priv/'.$username.'/pend';
        $all_dirs = glob($somePath. '/*' , GLOB_ONLYDIR);
        if(count($all_dirs)) {
        	recurse_copy('../priv/'.$username.'/pend/'.$folder, '../priv/'.$username.'/close/'.$folder);
			deleteDirectory('../priv/'.$username.'/pend/'.$folder);
	        echo 1;
        } else {
        	echo 0;
        }
  //       foreach($all_dirs as $dir) {
  //       	$folder = basename($dir);
  //       	if(!is_dir('../priv/'.$username.'/close/'.$folder)) {
  //       		mkdir('../priv/'.$username.'/close/'.$folder);
  //       	}
  //       }
		
			
  	}

    function CopyListFolders() {
        if(!isset($_SESSION))
        {
            session_start();
        }
        $auth = $_SESSION['auth'];
        $username = $auth['username'];
        $folder = $_POST['folder'];
        $listFolder = $_POST['listFolder'];

        $somePath = '../priv/'.$username.'/list';
        $all_dirs = glob($somePath. '/*' , GLOB_ONLYDIR);
        if(count($all_dirs)) {
            recurse_copy('../priv/'.$username.'/list/'.$listFolder, '../priv/'.$username.'/close/'.$folder.'/'.$listFolder);
            deleteDirectory('../priv/'.$username.'/list/'.$listFolder);
            echo 1;
        } else {
            echo 0;
        }
        //       foreach($all_dirs as $dir) {
        //       	$folder = basename($dir);
        //       	if(!is_dir('../priv/'.$username.'/close/'.$folder)) {
        //       		mkdir('../priv/'.$username.'/close/'.$folder);
        //       	}
        //       }


    }

	function GetFiles() {
		$folder = $_POST['folder'];
		session_start();
		$auth = $_SESSION['auth'];
		$username = $auth['username'];

		if(!is_dir('../priv/'.$username.'/close/'.$folder)) {
			mkdir('../priv/'.$username.'/close/'.$folder);
			echo 1;
		} else {
			$somePath = '../priv/'.$username.'/close/'.$folder;
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
  	}

  	function recurse_copy($src, $dst) {
	    $dir = opendir($src);
	    @mkdir($dst);
	    while(false !== ( $file = readdir($dir)) ) {
	        if (( $file != '.' ) && ( $file != '..' )) {
	            if ( is_dir($src . '/' . $file) ) {
	                recurse_copy($src . '/' . $file,$dst . '/' . $file);
	            }
	            else {
	                copy($src . '/' . $file,$dst . '/' . $file);
	            }
	        }
	    }
	    closedir($dir);
	}



    function deleteDirectory($dir) {
        if (!file_exists($dir)) {
            return true;
        }
    
        if (!is_dir($dir)) {
            return unlink($dir);
        }
    
        foreach (scandir($dir) as $item) {
            if ($item == '.' || $item == '..') {
                continue;
            }
    
            if (!deleteDirectory($dir . DIRECTORY_SEPARATOR . $item)) {
                return false;
            }
    
        }
    
        return rmdir($dir);
    }