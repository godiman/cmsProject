<?php 
session_start();
include ("../script/connection.php");
	if (isset($_GET['delete'])) {

		$delete_id = $_GET['delete'];
		//echo $_GET['id'];
		$delete = "DELETE FROM admin_reg WHERE admin_id = '$delete_id'";
		 
		if (mysqli_query($conn, $delete)) {
			header("Location: register_admin.php");
		}

		else{
			echo "Unable to delete";
		}
	}

	else{
		echo "No id";
}


 ?>