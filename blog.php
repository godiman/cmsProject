
<?php 
	session_start();
	include ("script/connection.php");
 ?>

<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<html>
<head>
<title>Fashioner a Fashion Category  Flat Bootstrap Responsive Website Template | Blog :: w3layouts</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Fashioner Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
<!-- Custom Theme files -->
<link href="css/style.css" rel='stylesheet' type='text/css' />
<link rel="stylesheet" type="text/css" href="css/component.css" />
	
<script src="js/jquery-1.11.1.min.js"></script>
<script type="text/javascript" src="js/bootstrap.js"></script>	
<!--web-fonts-->
 <link href='//fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Cabin:400,700,500,600' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Pacifico|Prata' rel='stylesheet' type='text/css'>
<!--//web-fonts-->
<script type="text/javascript" src="js/move-top.js"></script>
<script type="text/javascript" src="js/easing.js"></script>
<script type="text/javascript">
			jQuery(document).ready(function($) {
				$(".scroll").click(function(event){		
					event.preventDefault();
					$('html,body').animate({scrollTop:$(this.hash).offset().top},900);
				});
			});
</script>
<!--/script-->
        <script src="js/jquery.chocolat.js"></script>
		<link rel="stylesheet" href="css/chocolat.css" type="text/css" media="screen">
		<!--light-box-files -->
		<script type="text/javascript">
		$(function() {
			$('.gallery a').Chocolat();
		});
		</script>
</head>
<body>
	<!--start-header-->
	<div class="top-bar" id="home">
				<div class="container">
					<div class="row">
						<div class="col-md-8 top-left">
							<span class="phone wow fadeInDown"  data-wow-duration=".8s" data-wow-delay=".3s">
								<i class="glyphicon glyphicon-phone"></i>
								<em>+440 875369208</em>
							</span>
							<span class="email wow fadeInDown"  data-wow-duration=".8s" data-wow-delay=".3s">
								<i class="glyphicon glyphicon-send"></i>
								<em><a href="mailto:info@example.com">mail@example.com</a></em>
							</span>
							<span class="location wow fadeInDown"  data-wow-duration=".8s" data-wow-delay=".3s">
										<i class="glyphicon glyphicon-map-marker"></i>
										   <em>London, Jasmin Road</em>
									</span>
						</div>
						<div class="col-md-4 head-right wow fadeInDown"  data-wow-duration=".8s" data-wow-delay=".3s">
						   <ul class="top-icons">
									<li><a class="fb" href="#"></a></li>
									<li><a class="twitt" href="#"></a></li>
									<li><a class="goog" href="#"></a></li>
									<li><a class="drib" href="#"></a></li>
							   </ul>
						</div>
						<div class="clearfix"></div>
					</div>
				</div>
    </div>
	<div class="header">
		<div class="container">
			<div class="header-nav">
				<nav class="navbar navbar-default">
					<!-- Brand and toggle get grouped for better mobile display -->
					<div class="navbar-header">
					  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					  </button>
					<div class="logo">
							<h1><a class="navbar-brand" href="index.html">F<span>ashioner</span></a></h1>
						</div>
					</div>

					<!-- Collect the nav links, forms, and other content for toggling -->
					<div class="collapse navbar-collapse nav-wil" id="bs-example-navbar-collapse-1">
					 <ul class="nav navbar-nav cl-effect-14">
					 
						<li><a href="index.html" class="active">Home</a></li>
						<li><a href="about.html">About</a></li>
						<li><a href="typo.html">Services</a></li>
						<li><a href="gallery.html">Gallery</a></li>
						<li><a href="blog.html">Blog</a></li>
						<li><a href="contact.html">Contact</a></li>
					  </ul>
						
					</div><!-- /.navbar-collapse -->
				</nav>
			</div>
		</div>
	</div>
<!-- //header -->


		  <!--banner-slider-->
		     <div class="banner two">
			  <h2 class="tittle wow fadeInUp"  data-wow-duration="1s" data-wow-delay=".3s">Blogs</h2>
             </div>
			<!--//end-banner-->
	<!--start-albums-->
	 <div class="clearfix"></div>
		
		<?php 
   
    $sel =  "SELECT * FROM admin_reg INNER JOIN post ON admin_reg.admin_id = post.sender_id";
    $qry = mysqli_query($conn, $sel);

    // retrieve each row in the database
    while ($row = mysqli_fetch_array($qry)) {
      $id = $row['post_id'];
      $username = $row['username'];
      $date = $row['post_time']; 
      $post_title = $row['post_title'];
      $post = $row['content'];
      $banner = $row['banner'];
 
   ?>

	 <!--/fashion-->
              <div class="blog">
			      <div class="container">
						<div class="blog-grid">
						     <div class="col-md-5 blog-pic wow fadeInDown"  data-wow-duration=".8s" data-wow-delay=".3s">
						        <a href="single.html" class="mask"><img src="<?php echo $banner; ?>" alt="image" class="img-responsive zoom-img"></a>
						     </div>
							
	


							 <div class="col-md-7 blog-text">
								 <a href="single.html"><h4 class="wow fadeInUp animated animated" data-wow-delay=".5s"><?php echo $post_title; ?></h4></a>
								       <div class="item_info">
											<ul>
											   <li><a href="#"><i class="glyphicon glyphicon-user"></i><?php echo $username; ?></a></li>
											   <li><i class="glyphicon glyphicon-calendar"></i><?php echo $date; ?></li>
											   <li><a href="#"><i class="glyphicon glyphicon-comment"></i>20 Comments</a></li>
											   <li><a href="#"><i class="glyphicon glyphicon-heart"></i>300 Likes</a></li>
											</ul>				
									  </div>
								<p class="wow fadeInUp animated animated" data-wow-delay=".5s"><?php echo $post; ?></p>
								 <a class="sing" href="single.html">Read More</a>
						     </div>


							   <div class="clearfix"> </div>
						</div>
						<!--
						<div class="blog-grid two">
						     <div class="col-md-5 blog-pic wow fadeInDown"  data-wow-duration=".8s" data-wow-delay=".3s">
						        <a href="single.html" class="mask"><img src="<?php echo $banner; ?>" alt="image" class="img-responsive zoom-img"/></a>
						     </div>
							 <div class="col-md-7 blog-text">
								 <a href="single.html wow fadeInUp animated animated" data-wow-delay=".5s"><h4>Blog tittle lorem ipsump</h4></a>
								       <div class="item_info">
											<ul>
											   <li><a href="#"><i class="glyphicon glyphicon-user"></i>Admin</a></li>
											   <li><i class="glyphicon glyphicon-calendar"></i>04.Nov.2015</li>
											   <li><a href="#"><i class="glyphicon glyphicon-comment"></i>20 Comments</a></li>
											   <li><a href="#"><i class="glyphicon glyphicon-heart"></i>300 Likes</a></li>
											</ul>				
									  </div>
								 <p class="wow fadeInUp animated animated" data-wow-delay=".5s">Nam nec tellus a odio tincidunt auctor a ornare odio.Lorem Ipsum is simply dummy text of the printing and typesetting industry Sed non mauris vitae erat consequat auctor eu in elit.Lorem Ipsum is simply dummy text of the printing and typesetting industry Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Mauris in erat justo.</p>
								 <a class="sing" href="single.html">Read More</a>
						     </div>
							   <div class="clearfix"> </div>
						</div>

						
						<div class="blog-grid">
						     <div class="col-md-5 blog-pic wow fadeInDown"  data-wow-duration=".8s" data-wow-delay=".3s">
						        <a href="single.html" class="mask"><img src="images/b3.jpg" alt="image" class="img-responsive zoom-img"></a>
						     </div>
							 <div class="col-md-7 blog-text">
								 <a href="single.html wow fadeInUp animated animated" data-wow-delay=".5s"><h4>Blog tittle lorem ipsump</h4></a>
								       <div class="item_info">
											<ul>
											   <li><a href="#"><i class="glyphicon glyphicon-user"></i>Admin</a></li>
											   <li><i class="glyphicon glyphicon-calendar"></i>04.Nov.2015</li>
											   <li><a href="#"><i class="glyphicon glyphicon-comment"></i>20 Comments</a></li>
											   <li><a href="#"><i class="glyphicon glyphicon-heart"></i>300 Likes</a></li>
											</ul>				
									  </div>
								 <p class="wow fadeInUp animated animated" data-wow-delay=".5s">Nam nec tellus a odio tincidunt auctor a ornare odio.Lorem Ipsum is simply dummy text of the printing and typesetting industry Sed non mauris vitae erat consequat auctor eu in elit.Lorem Ipsum is simply dummy text of the printing and typesetting industry Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Mauris in erat justo.</p>
								 <a class="sing" href="single.html">Read More</a>
						     </div>
							   <div class="clearfix"> </div>
						</div> -->

						<?php  } ?>

						<!--start-blog-pagenate-->
						<div class="blog-pagenat blog-pic wow fadeInDown"  data-wow-duration=".8s" data-wow-delay=".3s">
							<ul>
								<li><a class="frist" href="#">Prev</a></li>
								<li><a href="#">1</a></li>
								<li><a href="#">2</a></li>
								<li><a href="#">3</a></li>
								<li><a href="#">4</a></li>
								<li><a href="#">5</a></li>
								<li><a class="last" href="#">Next</a></li>
								<div class="clearfix"> </div>
							</ul>
						</div>
						<!--//end-blog-pagenate-->
                  </div>
              </div>
	<!--footer--->
		<div class="footer text-center">
				<div class="container">
					<div class="footer-grids">
						<div class="col-md-6 footer-text">  
							<h3 class="wow fadeInDown"  data-wow-duration=".8s" data-wow-delay=".2s">About us</h3>
							<p class="wow fadeInUp"  data-wow-duration="1s" data-wow-delay=".3s">Lorem Ipsum is simply dummy text of the printing and typesetting industry.Lorem Ipsum has been the industry's standard dummy text ever since, Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.Lorem Ipsum is simply dummy text of the printing and typesetting industry</p>
							<a class="read" href="about.html">Read More</a>
						</div>
						<div class="col-md-6 footer-info">
							<h3 class="wow fadeInDown"  data-wow-duration=".8s" data-wow-delay=".2s">Get in touch</h3>
							<p class="wow fadeInUp"  data-wow-duration="1s" data-wow-delay=".3s">Lorem Ipsum is simply dummy text of the printing and typesetting industry.Lorem Ipsum has been the industry's standard dummy text ever since, </p>
							<div class="support">
							   <form>
							    <input type="text" placeholder="Email...." required="">

							    <input type="submit" value="SUBSCRIBE" class="botton">
							  </form>
							</div>
					</div>
					<div class="clearfix"> </div>
				</div>
				<div class="copy">
		              <p class="wow fadeInUp"  data-wow-duration="1s" data-wow-delay=".3s">&copy; 2016 Fashioner . All Rights Reserved | Design by <a href="http://w3layouts.com/">W3layouts</a> </p>
		            </div>
				</div>
			</div>

	<!--start-smoth-scrolling-->
			<script type="text/javascript">
								jQuery(document).ready(function($) {
									$(".scroll").click(function(event){		
										event.preventDefault();
										$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
									});
								});
								</script>
							<!--start-smoth-scrolling-->
						<script type="text/javascript">
									$(document).ready(function() {
										/*
										var defaults = {
								  			containerID: 'toTop', // fading element id
											containerHoverID: 'toTopHover', // fading element hover id
											scrollSpeed: 1200,
											easingType: 'linear' 
								 		};
										*/
										
										$().UItoTop({ easingType: 'easeOutQuart' });
										
									});
								</script>
		<a href="#home" id="toTop" class="scroll" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>
		<!-- animation-effect -->
<link href="css/animate.min.css" rel="stylesheet"> 
<script src="js/wow.min.js"></script>
<script>
 new WOW().init();
</script>
<!-- //animation-effect -->



</body>
</html>