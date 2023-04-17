<?php
	require "../includes/dbh.inc.php";

  if(isset($_POST['type'])) {
		$type = $_POST['type'];
		switch ($type) {
			case 'addUser': addUser(); break;
			case 'getUser': getUser(); break;
			case 'editUser': editUser(); break;
			case 'deleteUser': deleteUser(); break;
			case 'saveProfile': saveProfile(); break;
			case 'resetPassword': resetPassword(); break;
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

	function addUser() {
		require "../includes/dbh.inc.php";
		$firstname = $_POST['firstname'];
		$lastname = $_POST['lastname'];
		$username = $_POST['username'];
		$password = $_POST['password'];
		$role = $_POST['role'];
		$status = $_POST['status'];
		$hashedPwd = crypt($password, '12345');

    // Prepare query using placeholders (prevent sql injection)
    $sql = "SELECT username FROM users WHERE username=?;";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        echo 'sqlerror';
    } else {
    	// Pass parameters and execute statement 
	    mysqli_stmt_bind_param($stmt, "s", $username);
	    mysqli_stmt_execute($stmt);
	    mysqli_stmt_store_result($stmt);
	    $resultCheck = mysqli_stmt_num_rows($stmt);

	    // Someone already exists with this id or email
	    if ($resultCheck > 0){
	        echo 'userexist';
	    } else {
	    	$sql = "INSERT INTO users (firstname, lastname, username, role, password, status) VALUES ('".$firstname."', '".$lastname."', '".$username."', ".$role.", '".$hashedPwd."', ".$status.")";

			//This is the part to create folder when user created.
			if(!is_dir('../priv/'.$username)) {
				mkdir('../priv/'.$username);
			}
			if(!is_dir('../priv/'.$username.'/list')) {
				mkdir('../priv/'.$username.'/list');
			}
			if(!is_dir('../priv/'.$username.'/pend')) {
				mkdir('../priv/'.$username.'/pend');
			}
			if(!is_dir('../priv/'.$username.'/close')) {
				mkdir('../priv/'.$username.'/close');
			}
			//This is the part to copy file
			copy('../priv/_template/index.php', '../priv/'.$username.'/index.php');

			if($conn->query($sql)) {
				echo 'success';
			} else {
				echo 'failed';
			}
	    }
    }
	}

	function getUser() {
		require "../includes/dbh.inc.php";
		$id = $_POST['id'];

		$sql = "SELECT * FROM users WHERE id=".$id;
		$result = $conn->query($sql);
		$row = mysqli_fetch_assoc($result);
		echo json_encode($row);
	}

	function editUser() {
		require "../includes/dbh.inc.php";
    $id = $_POST['id'];
		$firstname = $_POST['firstname'];
		$lastname = $_POST['lastname'];
		$username = $_POST['username'];
		$password = $_POST['password'];
		$role = $_POST['role'];
		$status = $_POST['status'];

		$hashedPwd = crypt($password, '12345');

		$sql = "UPDATE users SET firstname='".$firstname."', lastname='".$lastname."', username='".$username."', password='".$hashedPwd."', role=".$role.", status=".$status." WHERE id=".$id;

		if(!is_dir('../priv/'.$username)) {
			mkdir('../priv/'.$username);
		}
		if($conn->query($sql)) {
			echo 'success';
		} else {
			echo 'failed';
		}
	}

	function saveProfile() {
		require "../includes/dbh.inc.php";
    $id = $_POST['id'];
		$firstname = $_POST['firstname'];
		$lastname = $_POST['lastname'];
		$username = $_POST['username'];

		$sql = "UPDATE users SET firstname='".$firstname."', lastname='".$lastname."', username='".$username."' WHERE id=".$id;

		if(!is_dir('../priv/'.$username)) {
			mkdir('../priv/'.$username);
		}
		$conn->query($sql);

		$sql2 = "SELECT * FROM users WHERE id=".$id;
		$result = $conn->query($sql2);
		$row = mysqli_fetch_assoc($result);
		session_start();
		$_SESSION['auth'] = $row;

		echo 1;
	}

	function resetPassword() {
		require "../includes/dbh.inc.php";
    $id = $_POST['id'];
		$current = $_POST['current'];
		$password = $_POST['password'];
		$rpassword = $_POST['rpassword'];

		$sql2 = "SELECT * FROM users WHERE id=".$id;
		$result = $conn->query($sql2);
		$row = mysqli_fetch_assoc($result);
		if(crypt($current, '12345') == $row['password']) {
			$new_password = crypt($password, '12345');
			$sql = "UPDATE users SET password='".$new_password."' WHERE id=".$id;
			$conn->query($sql);
			echo 1;
		} else {
			echo 0;
		}
	}

	function deleteUser() {
		require "../includes/dbh.inc.php";
		$id = $_POST['id'];

		$sql = "DELETE FROM users WHERE id=".$id;
		echo $conn->query($sql);

		$conn->close();
	}