<?php
session_start(); 
include ("../script/connection.php");
$admin = $_SESSION['username'];

	
	 

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
			<form class="text-center" action="post.php" method="post" enctype="file" onsubmit="return checks();">

				<div class="md-form mt-4" style="text-align:left;">
            	<label><strong>Upload Image:</strong></label><br>
               <input type="file" name="pix" id="Pix">
            </div> <br/>

           <strong> <div class="alert alert-danger" id="Errors"></div></strong>

			<div class="md-form mt-4">
                <input type="text" name="post_title" class="form-control" placeholder="Post Title" id="title" >
            </div>

            <!-- Password -->
            <div class="md-form mt-4">
                <textarea type="text" name="post_body" class="form-control" rows="6"  placeholder="Write post here"></textarea>
            </div> <br/>

            <div class="pull-right">
           <input type="submit" name="publish" value="Publish Post" class="btn btn-info" id="checking">
           </div>
			</form><!--Form ends her -->

		</div></br></br><!-- container ends here -->

	</div><!-- conatiner-fluid ends here-->

	<?php 
	if (!$admin) {
    header("location:index.php");
  }

	$db = "SELECT * FROM admin_reg";
		$qry = mysqli_query($conn, $db);
		// retrieve each row in the database
		while ($row = mysqli_fetch_array($qry)) {
			$username = $row['username'];

			if ($username == $admin) {
				$author = $row['admin_id'];
			}
		}

		//echo $author;

	 	$check = false;
	 	$posted = false;

		if (isset($_POST['publish']) || !empty($_POST['post_title']) || !empty($_POST['post_body'])) {
			//$phpto = $_FILE['pix']['name'];

			  $Post_title = mysqli_escape_string($conn, $_POST['post_title']);
			  $Post_body = mysqli_escape_string($conn, $_POST['post_body']);
			 //echo $author;
			  
$inset = "INSERT INTO post (admin_id, content, post_title) VALUES('$author','$Post_body','$Post_title')";
			 $qry = mysqli_query($conn, $inset);

			 if ($qry) {
			 	echo "Successful";
			 	//$posted = true;
			 }

			 else{
			 	echo "Check your internet connection";
			 }

		}
		
		else{
			$titleErr = "Post title or Post body is empty!!";
			$check = true;

		}

	
	 ?>

	 <script type="text/javascript">
	 /*	// javascript function that validate the user input
	 	function checks(){
	 	
	 	//	
	 	var publish = "<?php echo $sucess; ?>";
	 	var failed = "<?php echo $failed; ?>";
	 	var check_post = "<?php echo $posted; ?>";


	 	// php error value stord in javascript variables
	 	var error = "<?php echo $titleErr; ?>";

	 	// boolean var the return true if there iss an error
	 	var checkErr = "<?php echo $check; ?>";

	 	// checks if user fill the title input
	 	if (checkErr) {
	 	document.getElementById('Errors').innerHTML = error;
	 	return false;
	 	return;
	 	}

	 	else if(check_post){
	 		document.getElementById('Errors').innerHTML = publish;
	 		//url to open the admin dashboard
	 	return false;
	 	}


	 	else{
	 		return true;
	 	}

	 	}*/
	 </script>
	
</body>
</html>