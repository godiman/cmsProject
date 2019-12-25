<?php 
	include 'connection.php';
	session_start();

	if (isset($_POST['log_in']) && !empty($_POST['username']) && !empty($_POST['pass'])) {
		
		$username = mysqli_escape_string($conn, trim($_POST['username']));
		$pass = mysqli_escape_string($conn, trim($_POST['pass']));

		//Encrypt the password
		$password = md5('$pass');
		
		$sel = 	"SELECT * FROM admin_reg WHERE username = '$username' && password = '$password'";
		$qry = mysqli_query($conn, $sel);

		if (mysqli_num_rows($qry) == 0) {
			echo "You are not an admin!!!";
		}

		else{
			$_SESSION['username'] = $username;
			header("location: ../admin/index.php");
		}
	}

	else{
		echo "Fields are required";
	}
 ?>