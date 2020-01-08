<?php
session_start(); 
include ("../script/connection.php");
$admin = $_SESSION['username'];
if (!$admin) {
	header("location: admin_login.php");
}
 ?>



<!DOCTYPE html>
<html>
<head>
	<title>admi_pannel</title>

	<!-- Bootstrap CSS -->
	    <!-- Latest compiled and minified CSS -->
		<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
		<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
		<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

		<style type="text/css">
			#publish{
				text-align: left ! important;
			}
		</style>



</head>
<body>
	<div class="container-fluid" style="background-color: #f1f1f1; padding-bottom: 30px; padding-top: 10px;">
		
		<!-- Heading -->
		<h3>New Post</h3>

		<!-- sub headings -->
		<div class="nav nav-tabs" style="padding: 20px;">
			<li><a href="post.php" name=""><strong>Publish Post  </strong></a></li> 
			<select style="margin-left: 10px;">
				<option> Categories</option>
				<option>Services</option>
				<option>Gallery</option>
				<option>Blog</option>

			</select>
		</div>

		<div class="container" style="padding: 50px; background-color: #fff;">
			
			<!-- Form starta here -->
			<form class="text-center" action="" method="post" enctype="multipart/form-data" onsubmit="return check();">

				<div class="md-form mt-4" style="text-align:left;">
            	<label><strong>Upload Image:</strong></label><br>
              <input type="file" name="banner" id="Pix">
            </div> <br/>

          <strong> <div class="alert alert-danger" id="ErrBox"></div></strong>

			<div class="md-form mt-4">
                <input type="text" name="post_title" class="form-control" placeholder="Post Title" id="title" >
            </div>

            <!-- Password -->
            <div class="md-form mt-4">
                <textarea type="text" name="post_body" class="form-control" rows="6"  placeholder="Write post here" id="post_field"></textarea>
            </div> <br/>

            <div class="pull-right">
           <input type="submit" name="submit" value="Publish Post" class="btn btn-info" id="checking">
           </div>
			</form><!--Form ends her -->

		</div></br></br><!-- container ends here -->

	</div><!-- conatiner-fluid ends here-->

	<?php 



	if ( isset($_POST['submit'])) 
{
	$folder = '../admin/photos/';
	$photoName = basename($_FILES['banner']['name']);
	$temp_name = $_FILES['banner']['tmp_name']; 
	$directory = $folder.$photoName;
	$fileType = pathinfo($directory, PATHINFO_EXTENSION);

	$post = mysqli_escape_string($conn, $_POST['post_body']);
	$title = mysqli_escape_string($conn, $_POST['post_title']);
	 
	$allowTypes =  array('jpg', 'png', 'gif','jpeg');


	 // checks if the post-title field is empty
	 if ($title == " " || empty($title)) {
	 	echo "<script type='text/javascript'>
			document.getElementById('ErrBox').innerHTML = 'Post title is empty..!'
	 	</script>";
	 	exit();
	 }

	 // checks if the post field is empty
	 if ($post == " " || empty($post)) {
	 	echo "<script type='text/javascript'>
			document.getElementById('ErrBox').innerHTML = 'Post body is empty..!'
	 	</script>";
	 	exit();
	 }

	 // checks if file is an image
		if (in_array( $fileType, $allowTypes)) {
		move_uploaded_file($temp_name, $directory);
		}
	else{
		echo "<script type='text/javascript'>
			document.getElementById('ErrBox').innerHTML = 'Sorry, only jpg, jpeg, png and gif images are allowed.'
	 	</script>";
	 	exit();
	}//end of in_array

	 $db = "select * from admin_reg";
	 $qry = mysqli_query($conn, $db);

		// retrieve each row in the database
		while ($row = mysqli_fetch_array($qry)) 
		{
			// Admin username from the database
			$username = $row['username'];
			//$date = $row['Date_created'];	\


			// Check if the current username is the looged in user
			if ($username == $admin) {
				$_SESSION['id'] = $row['admin_id'];
			}
			

		}

		// The current admon ID
		$sender = $_SESSION['id'];

		

		// Insrt the post to the database
		$sl = "INSERT INTO post (sender_id, content, post_title, banner) VALUES ('$sender', '$post', '$title', '$directory')";

		$query = mysqli_query($conn, $sl);
		 
		if ($query) {
			echo "<script type='text/javascript'>
			document.getElementById('ErrBox').innerHTML = 'Post has been published'	
			setTimeout(() => window.open('../admin/index.php', '_self'), 2000);
	 	</script>";
			  	
		}
		else{
			echo "<script type='text/javascript'>
			document.getElementById('ErrBox').innerHTML = 'Chech your connection!'	
	 	</script>"; //  .mysqli_error($conn)
		}
}

 ?>
	
</body>
</html>

