
<!DOCTYPE html>
<html>
<head>
	<title>Admin Login</title>
	 <!-- Bootstrap CSS -->
	    <!-- Latest compiled and minified CSS -->

<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<link rel="stylesheet" type="text/css" href="../admin/css/admin_form.css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
</head>

<body>
	<div class="wrapper fadeInDown">
  <div id="formContent">
    <!-- Tabs Titles -->

    <!-- Icon 
    <div class="fadeIn first">
      <img src="http://danielzawadzki.com/codepen/01/icon.svg" id="icon" alt="User Icon" />
    </div> -->


    <h2>Admin Login</h2>
   
    <!-- Login Form -->
    <form method="post" action="../script/login.php">
      <input type="text"  class="fadeIn second" name="username" placeholder="Admin" required="required">
      <input type="password" class="fadeIn third" name="pass" placeholder="password" required="required">
      <input type="submit" class="fadeIn fourth" value="Log In" name="log_in">
    </form>

    <!-- Remind Passowrd -->
    <div id="formFooter">
      <a class="underlineHover" href="#">Forgot Password?</a>
    </div>

  </div>
</div>

</body>
</html>