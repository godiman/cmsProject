
<?php
session_start(); 
include ("../script/connection.php");
$admin = $_SESSION['username'];
	 if (!$admin) {
    header("location:index.php");
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

		
</head>
<body>
	<div class="container-fluid">

     <!-- Material form subscription -->
<div class="card">

    <h5 class="card-header bg-info white-text text-center py-4">
        <strong style="color: #fff;">Manage Admin</strong>
    </h5>

    <!--Card content-->
    <div class="card-body px-md-5">

        <!-- Form -->
        <form class="text-center" onsubmit="return Validation();" style="color: #757575;" action="../script/submit_register.php" target="_self" method="post">

            <p>
                <a href="#up">See All Registered Admin</a>
            </p>

           
            <strong> <div class="alert alert-danger" id="Errors"></div></strong>

            <!-- Username -->
            <div class="md-form mt-4">
                <input type="text" name="username" class="form-control" placeholder="Username" id="username" required="required">
            </div>

            <!-- Password -->
            <div class="md-form mt-4">
                <input type="Password" name="pass" class="form-control" placeholder="Password" id="pass" required="required">
            </div>

            <div class="md-form mt-4">
                <input type="Password" name="pass" class="form-control" placeholder="Confirm Password" id="confirm_pass" required="required">
            </div>

            <!-- Register button -->
            <button class="btn btn-outline-info btn-rounded btn-block z-depth-0 my-4 waves-effect" type="submit" name="register" id="reg">Register</button>

        </form>
        <!-- Form -->
    </div>
</div> <br/>
<!-- Material form registration -->


<table class="table table-hover table-striped" id="up">
	<!-- Heading of the table -->
	<tr>
		<th>No.</th>
		<th>Admin Name</th>
		<th>Date created</th>
		<th>Action</th>
	</tr>

	<!--php code that retrieve all Admins from the database-->
	<?php 
		global $conn;
		$sel = 	"SELECT * FROM admin_reg";
		$qry = mysqli_query($conn, $sel);

		// retrieve each row in the database
		while ($row = mysqli_fetch_array($qry)) {
			$id = $row['admin_id'];
			$username = $row['username'];
			$date = $row['Date_created'];	

	 ?>

		<tr>
			<!-- Displays all the admins table-->
			<td> <?php echo $id; ?></td>
			<td> <?php echo $username; ?></td>
			<td> <?php echo $date; ?></td>
			<td><a href="delete_admin.php?delete=<?php echo $id; ?>"> <button class="btn btn-info">Delete</button> </a> </td>
		</tr>
		
	<?php } ?>
</table><!--php code that retrieve all Admins from the database ends here-->

</div><!-- container fluid ends her -->


<!-- Validate form fields with javascript -->

<script type="text/javascript">
	function Validation() {
		//Gets all the input fields by id
		var user_name = document.getElementById('username').value;
		var pass_word = document.getElementById('pass').value;
		var confirmpass = document.getElementById('confirm_pass').value;

		if (user_name == '' || pass_word == '' || confirmpass == '') {
			document.getElementById('err_box').innerHTML = "Please fill all fields";
			//alert("fill all");
			return false;
		}
		else if(pass_word.length<6){
			document.getElementById('err_box').innerHTML = "Mininum password lenght is 6....";
			return false;
		}

		else if(pass_word != confirmpass){
			document.getElementById('err_box').innerHTML = "Password does not match!!";
			return false;
		}

		else{
		return true;
		}
	}
</script>

</body>
</html>