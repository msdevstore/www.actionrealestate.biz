<?php



  if(isset($_POST['type'])) {

		$type = $_POST['type'];

		switch ($type) {

			case 'saveFile': saveFile(); break;

			case 'deleteFile': deleteFile(); break;

			default: NotFound(); break;

		}

	}



	function NotFound() {

      session_start();

      session_unset();

      session_write_close();

      $url = '../index.php';

      header('Location: '.$url);

  }

		

	function saveFile() {

		$path = $_POST['priv_path'];

		$path = trim($path, "/");

		$root = $_POST['root'];

		if(!$path) {

			$target_dir = "../".$root."/";

		} else {

			$target_dir = "../".$root."/".$path."/";

			if(!is_dir($target_dir)) {

				mkdir($target_dir);

			}

		}

		$target_file = $target_dir . basename($_FILES["priv_file"]["name"]);

		move_uploaded_file($_FILES["priv_file"]["tmp_name"], $target_file);

		echo 1;

	}



	function deleteFile() {

		$path = $_POST['path'];

		if(is_dir($path)) {

			deleteDirectory($path);

		} else {

			unlink($path);

		}

		echo 'success';

	}



	function deleteDirectory($dirPath) {

	    if (is_dir($dirPath)) {

	        $objects = scandir($dirPath);

	        foreach ($objects as $object) {

	            if ($object != "." && $object !="..") {

	                if (filetype($dirPath . DIRECTORY_SEPARATOR . $object) == "dir") {

	                    deleteDirectory($dirPath . DIRECTORY_SEPARATOR . $object);

	                } else {

	                    unlink($dirPath . DIRECTORY_SEPARATOR . $object);

	                }

	            }

	        }

	    reset($objects);

	    rmdir($dirPath);

	    }

	}