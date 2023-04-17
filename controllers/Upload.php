<?php

if(isset($_POST['type'])) {

		$type = $_POST['type'];

		switch ($type) {

			case 'createFolder': CreateFolder(); break;

			case 'templateUpload': TemplateUpload(); break;

			case 'fileUpload': FileUpload(); break;
			case 'fileUpload1': FileUpload1(); break;
			case 'fileUpload2': FileUpload2(); break;
			case 'fileUpload03': FileUpload03(); break;
			case 'fileUpload3': FileUpload3(); break;
			case 'fileUpload4': FileUpload4(); break;
			case 'fileUpload5': FileUpload5(); break;
			case 'fileUpload6': FileUpload6(); break;
			case 'fileUpload7': FileUpload7(); break;
			case 'fileUpload8': FileUpload8(); break;
			case 'fileUpload9': FileUpload9(); break;
			case 'addFileUpload': AddFileUpload(); break;
			case 'getFiles': GetFiles(); break;

			default: NotFound(); break;

		}

	}

	function CreateFolder() {
		$seller = $_POST['seller'];
		$buyer = $_POST['buyer'];
		session_start();
		$auth = $_SESSION['auth'];
		$username = $auth['username'];
		// if(!is_dir('../priv/'.$username)) {
		// 	mkdir('../priv/'.$username);
		// }
		// if(!is_dir('../priv/'.$username.'/pend')) {
		// 	mkdir('../priv/'.$username.'/pend');
		// }
		if(!is_dir('../priv/'.$username.'/pend/'.$seller.'_to_'.$buyer)) {
			mkdir('../priv/'.$username.'/pend/'.$seller.'_to_'.$buyer);
			echo 1;
		}
		else {
			$somePath = '../priv/'.$username.'/pend/'.$seller.'_to_'.$buyer;
            $all_files = scandir($somePath);
			echo json_encode($all_files);
		}
  	}

  	function FileUpload() {
		session_start();
		$auth = $_SESSION['auth'];
		$username = $auth['username'];

  		$folder = $_POST['folder'];

  		$path = '../priv/'.$username.'/pend/'.$folder.'/';
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

  	function FileUpload1() {
		session_start();
		$auth = $_SESSION['auth'];
		$username = $auth['username'];

  		$folder = $_POST['folder'];

  		$path = '../priv/'.$username.'/pend/'.$folder.'/';
  		$target_file = $path . basename($_FILES["file"]["name"]);
  		$extension = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

  		if($extension != 'pdf') {
  			echo 2;
  		}

  		else {
	  		$file_name = $path."Buyer Agency Agreement.".$extension;
			move_uploaded_file($_FILES["file"]["tmp_name"], $file_name);

			echo 1;
		}
  	}

  	function FileUpload2() {
		session_start();
		$auth = $_SESSION['auth'];
		$username = $auth['username'];

  		$folder = $_POST['folder'];

  		$path = '../priv/'.$username.'/pend/'.$folder.'/';
  		$target_file = $path . basename($_FILES["file"]["name"]);
  		$extension = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

  		if($extension != 'pdf') {
  			echo 2;
  		}

  		else {
	  		$file_name = $path."Sellers Disclosure.".$extension;
			move_uploaded_file($_FILES["file"]["tmp_name"], $file_name);

			echo 1;
		}
  	}

  	function FileUpload03() {
		session_start();
		$auth = $_SESSION['auth'];
		$username = $auth['username'];

  		$folder = $_POST['folder'];

  		$path = '../priv/'.$username.'/pend/'.$folder.'/';
  		$target_file = $path . basename($_FILES["file"]["name"]);
  		$extension = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

  		if($extension != 'pdf') {
  			echo 2;
  		}

  		else {
	  		$file_name = $path."PRIVATE MLS sheet.".$extension;
			move_uploaded_file($_FILES["file"]["tmp_name"], $file_name);

			echo 1;
		}
  	}

  	function FileUpload3() {
		session_start();
		$auth = $_SESSION['auth'];
		$username = $auth['username'];

  		$folder = $_POST['folder'];

  		$path = '../priv/'.$username.'/pend/'.$folder.'/';
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

  	function FileUpload4() {
		session_start();
		$auth = $_SESSION['auth'];
		$username = $auth['username'];

  		$folder = $_POST['folder'];

  		$path = '../priv/'.$username.'/pend/'.$folder.'/';
  		$target_file = $path . basename($_FILES["file"]["name"]);
  		$extension = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

  		if($extension != 'pdf') {
  			echo 2;
  		}

  		else {
	  		$file_name = $path."Proof of Funds.".$extension;
			move_uploaded_file($_FILES["file"]["tmp_name"], $file_name);

			echo 1;
		}
  	}

  	function FileUpload5() {
		session_start();
		$auth = $_SESSION['auth'];
		$username = $auth['username'];

  		$folder = $_POST['folder'];

  		$path = '../priv/'.$username.'/pend/'.$folder.'/';
  		$target_file = $path . basename($_FILES["file"]["name"]);
  		$extension = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

  		if($extension != 'pdf') {
  			echo 2;
  		}

  		else {
	  		$file_name = $path."PreAppoval.".$extension;
			move_uploaded_file($_FILES["file"]["tmp_name"], $file_name);

			echo 1;
		}
  	}

  	function FileUpload6() {
		session_start();
		$auth = $_SESSION['auth'];
		$username = $auth['username'];

  		$folder = $_POST['folder'];

  		$path = '../priv/'.$username.'/pend/'.$folder.'/';
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

  	function FileUpload7() {
		session_start();
		$auth = $_SESSION['auth'];
		$username = $auth['username'];

  		$folder = $_POST['folder'];

  		$path = '../priv/'.$username.'/pend/'.$folder.'/';
  		$target_file = $path . basename($_FILES["file"]["name"]);
  		$extension = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

  		if($extension != 'pdf') {
  			echo 2;
  		}

  		else {
	  		$file_name = $path."Deposit Check.".$extension;
			move_uploaded_file($_FILES["file"]["tmp_name"], $file_name);

			echo 1;
		}
  	}

  	function FileUpload8() {
		session_start();
		$auth = $_SESSION['auth'];
		$username = $auth['username'];

  		$folder = $_POST['folder'];

  		$path = '../priv/'.$username.'/pend/'.$folder.'/';
  		$target_file = $path . basename($_FILES["file"]["name"]);
  		$extension = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

  		if($extension != 'pdf') {
  			echo 2;
  		}

  		else {
	  		$file_name = $path."Deposit Money Notice.".$extension;
			move_uploaded_file($_FILES["file"]["tmp_name"], $file_name);

			echo 1;
		}
  	}

  	function FileUpload9() {
		session_start();
		$auth = $_SESSION['auth'];
		$username = $auth['username'];

  		$folder = $_POST['folder'];

  		$path = '../priv/'.$username.'/pend/'.$folder.'/';
  		$target_file = $path . basename($_FILES["file"]["name"]);
  		$extension = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

  		if($extension != 'pdf') {
  			echo 2;
  		}

  		else {
	  		$file_name = $path."Agreement of Sale.".$extension;
			move_uploaded_file($_FILES["file"]["tmp_name"], $file_name);

			echo 1;
		}
  	}

  	function AddFileUpload() {
		session_start();
		$auth = $_SESSION['auth'];
		$username = $auth['username'];

  		$folder = $_POST['folder'];


  		$path = '../priv/'.$username.'/pend/'.$folder.'/';
  		$target_file = $path . basename($_FILES["file"]["name"]);
  		$extension = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        $start_name = $_POST['name'];
        if($start_name == "") $start_name = basename($target_file, '.'.$extension);
        $actual_name = $start_name;

  		if($extension != 'pdf') {
  			echo 2;
  		}

  		else {
	  		$name = $actual_name.".".$extension;

			$i = 1;
			while(file_exists($path."".$actual_name.".".$extension))
			{           
			    $actual_name = (string)$start_name.$i;
			    $name = $actual_name.".".$extension;
			    $i++;
			}

	  		$file_name = $path."".$name;
			move_uploaded_file($_FILES["file"]["tmp_name"], $file_name);

			echo 1;
		}
  	}

  	function TemplateUpload() {
  		move_uploaded_file($_FILES["file"]["tmp_name"], "../priv/_template/index.php");
  		Distribute();
  	}

  	function Distribute() {
  		require "../includes/dbh.inc.php";
  		$sql = "SELECT * FROM users";
        $result = $conn->query($sql);
        $id = 0;
        if ($result->num_rows > 0) {
        	while($row = $result->fetch_assoc()) {
				if(!is_dir('../priv/'.$row['username'])) {
	        		mkdir('../priv/'.$row['username']);
	        		if(!is_dir('../priv/'.$row['username'].'/list')) {
						mkdir('../priv/'.$row['username'].'/list');
					}
					if(!is_dir('../priv/'.$row['username'].'/pend')) {
						mkdir('../priv/'.$row['username'].'/pend');
					}
					if(!is_dir('../priv/'.$row['username'].'/close')) {
						mkdir('../priv/'.$row['username'].'/close');
					}
	        	}
	  			//This is the part to copy file
				copy('../priv/_template/index.php', '../priv/'.$row['username'].'/index.php');
        	}
			echo 1;
		} else {
			echo 0;
		}
  	}



	function GetFiles() {
		$folder = $_POST['folder'];
		session_start();
		$auth = $_SESSION['auth'];
		$username = $auth['username'];
		if(!is_dir('../priv/'.$username.'/pend/'.$folder)) {
			mkdir('../priv/'.$username.'/pend/'.$folder);
			echo 1;
		}
		else {
			$somePath = '../priv/'.$username.'/pend/'.$folder;
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