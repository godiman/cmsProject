
<?php 
session_start(); 
include ("../script/connection.php");


// php code that create admin database
	if (isset($_POST['register']) && !empty($_POST['username']) && !empty($_POST['pass'])) {
		
		// storing the user input from the form into a local variable
			 $username = mysqli_real_escape_string($conn, trim($_POST['username']));
			 $pass = mysqli_real_escape_string($conn, trim($_POST['pass']));

			 //select users from the database
			 $sel_db = "SELECT username FROM admin_reg WHERE username = '$username'";
			 $db_qry = mysqli_query($conn, $sel_db);
			 $rows = mysqli_num_rows($db_qry);
			 // checks if username has already been taken

			 if ( $rows > 0) {
			 	echo "Username has already been taken!!";
			 	exit();
			 }
			 else{

			 	// Encrypt the password before storing in the database
			 	$password = md5('$pass');

			 	// Insert values to the database
			 	$sel = "INSERT INTO admin_reg (username, password) VALUES ('$username', '$password')";
			 	$qry = mysqli_query($conn, $sel);
			 	
			 	if ( $qry) {
			 		echo "registration successful";
			 		header("location: ../admin/index.php");
			 	}
			 }
	}

	else{
		#Error codes(field should not be empty)
	}
 ?> <!-- Create admin ends here-->