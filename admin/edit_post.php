
<?php 
include ("../script/connection.php");

if (isset($_GET['edit'])) {
		//global $conn;
		$edit_id = $_GET['edit'];
		//echo $_GET['edit'];
		$edit =  "SELECT * FROM admin_reg 
		INNER JOIN post ON admin_reg.admin_id = post.sender_id";
		 
		$qry = mysqli_query($conn, $edit);

		while($row = mysqli_fetch_array($qry))
		{
		$username = $row['username'];
	    $postId = $row['post_id']; 
	    
		if ($postId == $edit_id) 
			{
				$post_title = $row['post_title'];
		    	$content = $row['content'];

	   		 }	
		}
			
}
	else{
		echo "No id";
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
		<h3>Edit Post</h3>

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

          <strong> <div class="alert alert-danger" id="ErrorBox"></div></strong>

			<div class="md-form mt-4">
                <input type="text" name="update_title" class="form-control" value="<?php echo  $post_title;?>" id="title" >
            </div>

            <!-- Password -->
            <div class="md-form mt-4">
                <textarea type="text" name="update_body" class="form-control" rows="6" id="post_field"><?php echo $content;?></textarea>
            </div> <br/>

            <div class="pull-right">
           <input type="submit" name="update" value="Update Post" class="btn btn-info" id="checking">
           </div>
			</form><!--Form ends her -->

		</div></br></br><!-- container ends here -->

	</div><!-- conatiner-fluid ends here-->

	<?php 

if ( isset($_POST['update'])) 
{
	// Gets the images name and the image and stor it in variables
	$folder = '../admin/photos/';
	$photoName = basename($_FILES['banner']['name']);
	$temp_name = $_FILES['banner']['tmp_name']; 
	$directory = $folder.$photoName;
	$fileType = pathinfo($directory, PATHINFO_EXTENSION);

	// Gets the post title and the post body and store it in a variable
	$post_update = mysqli_escape_string($conn, $_POST['update_body']);
	$title_update = mysqli_escape_string($conn, $_POST['update_title']);

	// Declaration of images extensions
	$allowTypes =  array('jpg', 'png', 'gif','jpeg');

	// checks if the post-title field is empty
	 if ($title_update == " " || empty($title_update)) {

	 	// use kavascript to get the error box
	 	echo "<script type='text/javascript'>
			document.getElementById('ErrorBox').innerHTML = 'Post title is empty..!'
	 	</script>";
	 	exit();
	 }

	 // checks if the post field is empty
	 if ($post_update == " " || empty($post_update)) {
	 	echo "<script type='text/javascript'>
			document.getElementById('ErrorBox').innerHTML = 'Post body is empty..!'
	 	</script>";
	 	exit();
	 }

	 // checks if file is an image
		if (in_array( $fileType, $allowTypes)) {

		// moves the post banner to photos folder
		move_uploaded_file($temp_name, $directory);
		}
	else{
		echo "<script type='text/javascript'>
			document.getElementById('ErrBox').innerHTML = 'Sorry, only jpg, jpeg, png and gif images are allowed.'
	 	</script>";
	 	exit();
	}//end of in_array of the banner

	 // Retrieves the admin users from the database
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
		$sl = "UPDATE post SET  content = '$post_update', post_title = '$title_update', banner = '$photoName' WHERE post_id = '$edit_id'";
		
		$query = mysqli_query($conn, $sl);
		 
		if ($query) {

			// Redirect to the admin home page if the update is successful
			echo "<script type='text/javascript'>
			document.getElementById('ErrorBox').innerHTML = 'Post has been updated'	;
			setTimeout(() => window.open('../admin/index.php', '_self'), 2000);
	 	</script>";
			  	
		}
		else{
			echo "<script type='text/javascript'>
			document.getElementById('ErrorBox').innerHTML = 'Chech your connection!'	
	 	</script>"; //  .mysqli_error($conn)
		}
}





	 ?>



</body>
</html>