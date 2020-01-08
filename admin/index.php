
<?php 
  session_start();
  include ("../script/connection.php");
  $admin = $_SESSION['username'];
  if (!$admin) {
    header("location:admin_login.php");
  }
 ?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>CMS Project</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/simple-sidebar.css" rel="stylesheet">

  <!--styles the side bar text -->
  <style type="text/css">
    .bg-secondary{
      color: #fff;
      font-weight: bold;
    }

/*styles the navbar text*/
    .nav-link{
      color: #fff !important;
    }

  </style>

  

</head>

<body>

  <div class="d-flex" id="wrapper">

    <!-- Sidebar -->
    <div class="bg-secondary border-right" id="sidebar-wrapper">

      <div class="sidebar-heading" style="background-color: #0097a7"><?php echo $admin; ?> </div>
      <div class="list-group list-group-flush">
        
        <a href="#" onMouseOver="this.style.color='red'" onMouseOut="this.style.color= '#fff'" id="dash" class="list-group-item list-group-item-action bg-secondary">Dashboard</a>
        <a href="post.php" onMouseOver="this.style.color='red'" onMouseOut="this.style.color= '#fff'" id="post"  class="list-group-item list-group-item-action bg-secondary">Add New Post</a>
        <a href="#" onMouseOver="this.style.color='red'" onMouseOut="this.style.color= '#fff'" id="cat" class="list-group-item list-group-item-action bg-secondary">Categories</a>

        <a href="register_admin.php" type="button" target=".container-fluid" onMouseOver="this.style.color='red'" onMouseOut="this.style.color= '#fff'" id="admin" class="list-group-item list-group-item-action bg-secondary">Manage Admin</a>

        <a href="#" onMouseOver="this.style.color='red'" onMouseOut="this.style.color= '#fff'" id="comment" class="list-group-item list-group-item-action bg-secondary">Comments</a>
        <a href="#" onMouseOver="this.style.color='red'" onMouseOut="this.style.color= '#fff'" id="preview" class="list-group-item list-group-item-action bg-secondary">Live Blog</a>
        <a href="admin_logout.php" onMouseOver="this.style.color='red'" onMouseOut="this.style.color= '#fff'" id="logout" class="list-group-item list-group-item-action bg-secondary">Log Out</a>
      </div>
    </div>
    <!-- /#sidebar-wrapper -->

    <!-- Page Content -->
    <div id="page-content-wrapper">

      <nav class="navbar navbar-expand-lg navbar-light bg-secondary border-bottom">
        <button class="btn btn-info" id="menu-toggle">Colapse Sidebar</button>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

              <h2 style="margin-left: 25px;">Admin Dashboard</h2>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
            <li class="nav-item active">
              <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Link</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Dropdown
              </a>
              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="#">Action</a>
                <a class="dropdown-item" href="#">Another action</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#">Something else here</a>
              </div>
            </li>
          </ul>
        </div>
      </nav>

      <div class="container-fluid" id="">
        <strong><div id="ErrBox"></div></strong>

      <table class="table table-hover table-striped" id="up">
  <!-- Heading of the table -->
  <tr>
    <th>No.</th>
    <th>Post title</th>
    <th>Author</th>
    <th>Date created</th>
    <th>Action</th>
    <th>Details</th>
  </tr>

  <!--php code that retrieve all Admins from the database-->
  <?php 
    global $conn;
    $sel =  "SELECT * FROM admin_reg INNER JOIN post ON admin_reg.admin_id = post.sender_id";
    $qry = mysqli_query($conn, $sel);

    // retrieve each row in the database
    while ($row = mysqli_fetch_array($qry)) {
      $id = $row['post_id'];
      $username = $row['username'];
      $date = $row['post_time']; 
      $post_title = $row['post_title'];

   ?>

    <tr>
      <!-- Displays all the admins table-->
      <td><?php echo $id ?></td>
      <td> <?php echo $post_title  ?>  </td>
      <td><?php echo $username ?> </td>
      <td> <?php echo $date ?> </td>

      <td> <a href="index.php?delete=<?php echo $id; ?>"> <button class="btn btn-danger">Delete</button></a> <a href="index.php?edit=<?php echo $id; ?>"><button class="btn btn-info">Edit</button></a> </td>

      <td> <a href="../blog.php"> <button class="btn btn-info"> Preview</button></a></td>
    </tr>
    
  <?php } ?>
</table><!--php code that retrieve all Admins from the database ends here-->

<?php 
  
  if (isset($_GET['delete'])) {

    $delete_id = $_GET['delete'];
    //echo $_GET['id'];
    $delete = "DELETE FROM post WHERE post_id = '$delete_id'";
     
    if (mysqli_query($conn, $delete)) {
      echo "<script type='text/javascript'>
      document.getElementById('ErrBox').innerHTML = 'Post has been deleted from the database'
      window.open('index.php','_self')
    </script>";
    }

    else{
      echo "<script type='text/javascript'>
      document.getElementById('ErrBox').innerHTML = 'Something went wrong!'
    </script>";
    exit();
    }
  }

  else{
    
}
 ?>
    
        </div> <!-- contain-fluid ends here -->

        <?php 

          if (isset($_GET['edit'])) {

            //echo $_GET['edit'];
            include 'edit_post.php';

          }
         ?>



    </div>
    <!-- /#page-content-wrapper -->

  </div>
  <!-- /#wrapper -->

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <!-- Menu Toggle Script -->
  <script>
    $("#menu-toggle").click(function(e) {
      e.preventDefault();
      $("#wrapper").toggleClass("toggled");
    });
  </script>

<!-- My JQuery function  -->
  <script type="text/javascript">
    
   /* $(document).ready(function(){
  $("").click(function(){
    $(".container-fluid").hide();
  });
  $("#post").click(function(){
     $("").show();
  });
});

    // open the admin registration page in the admin home page
    $(document).ready(function(){
    $("#post").click(function(){
        $(".container-fluid").load("post.php");
    });
});


// open the admin create post page in the admin home page
$(document).ready(function(){
    $("#admin").click(function(){
        $(".container-fluid").load("register_admin.php");
    });
});*/

  </script>

</body>

</html>
