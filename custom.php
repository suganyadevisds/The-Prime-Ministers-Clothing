<?php
session_start();
error_reporting(0);

include('includes/config.php');

if(isset($_GET['action']) && $_GET['action']=="add"){
	$id=intval($_GET['id']);
	
	$sizes1=$_GET["sizes"];

	if (isset($sizes1))
	{
			if(isset($_SESSION['cart'][$id]))
			{
				$_SESSION['cart'][$id][$sizes1] += 1;

				echo "<script type='text/javascript'> document.location ='index.php'; </script>";
				
			}
			else
			{
				
				$sql_p="SELECT * FROM products WHERE id={$id}";
				$query_p=mysqli_query($con,$sql_p);
				if(mysqli_num_rows($query_p)!=0)
				{
					
					$row_p=mysqli_fetch_array($query_p);
					$_SESSION['cart'][$row_p['id']][$sizes1] = 1;

					echo "<script type='text/javascript'> document.location ='index.php'; </script>";

				}
				else
				{
					$message="Product ID is invalid";
				}
			}
		}
		else
		{
			echo "<script>alert('Please select the size')</script>";
			$msg="Please select the size";
			echo "<script type='text/javascript'> document.location ='index.php?msg='".$msg."' </script>";
		}

	}


?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<!-- Meta -->
		<meta charset="utf-8">
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
		<meta name="description" content="">
		<meta name="author" content="">
	    <meta name="keywords" content="MediaCenter, Template, eCommerce">
	    <meta name="robots" content="all">

	    <title>The Prime Ministress - Clothing : Customize your designs</title>

	    <!-- Bootstrap Core CSS -->
	    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
	    
	    <!-- Fonts CSS -->
	    <link rel="stylesheet" href="assets/css/fonts.css">

		<!-- Customizable CSS -->
	    <link rel="stylesheet" href="assets/css/main.css">
	    <link rel="stylesheet" href="assets/css/green.css">
	    <link rel="stylesheet" href="assets/css/owl.carousel.css">
		<link rel="stylesheet" href="assets/css/owl.transitions.css">
		<!--<link rel="stylesheet" href="assets/css/owl.theme.css">-->
		<link href="assets/css/lightbox.css" rel="stylesheet">
		<link rel="stylesheet" href="assets/css/animate.min.css">
		<link rel="stylesheet" href="assets/css/rateit.css">
		<link rel="stylesheet" href="assets/css/bootstrap-select.min.css">

		<!-- Demo Purpose Only. Should be removed in production -->
		<link rel="stylesheet" href="assets/css/config.css">
		<link rel="stylesheet" href="assets/css/mycss.css">

		<link href="assets/css/green.css" rel="alternate stylesheet" title="Green color">
		<link href="assets/css/blue.css" rel="alternate stylesheet" title="Blue color">
		<link href="assets/css/red.css" rel="alternate stylesheet" title="Red color">
		<link href="assets/css/orange.css" rel="alternate stylesheet" title="Orange color">
		<link href="assets/css/dark-green.css" rel="alternate stylesheet" title="Darkgreen color">
		<link rel="stylesheet" href="assets/css/font-awesome.min.css">
		<link href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,700' rel='stylesheet' type='text/css'>
		
		<!-- Favicon -->
		<link rel="shortcut icon" href="assets/images/favicon.png">
	</head>

    <body class="cnt-home bgborder">
	
		
	
		<!-- ============================================== HEADER ============================================== -->
<header class="header-style-1 bgcolor">
<?php include('includes/top-header.php');?>
<?php include('includes/main-header.php');?>
<?php include('includes/menu-bar.php');?>
</header>



<!-- ============================================== HEADER : END ============================================== -->
<div class="body-content " id="top-banner-and-menu">
	<div class=""><!--container-->
		<div class="furniture-container homepage-container">
		<div class="row">
		
			
			<div class="col-xs-12 col-sm-12 col-md-12 homebanner-holder">
				<!-- ========================================== SECTION – HERO ========================================= -->
			
<div id="hero" class="" style="padding:0px; margin:0px; vertical-align:top;">
	<div id="owl-main" class="owl-carousel owl-inner-nav owl-ui-sm" style="height:auto !important;">
		<div class="full-width-slider">	
			<div class="" >
				<!-- /.container-fluid --><img src="img/customize_banner.png" width="100%">
			</div><!-- /.item -->
		</div><!-- /.full-width-slider -->
	    
	    <div class="full-width-slider">
			<div class="" style="background-image: url(img/customize_banner.png); background-size:100%;  background-repeat:no-repeat;">
			<img src="img/customize_banner.png" width="100%">
			</div><!-- /.item -->
		</div><!-- /.full-width-slider -->

	</div><!-- /.owl-carousel -->
</div>
			
<!-- ========================================= SECTION – HERO : END ========================================= -->	
</div><!-- /.homebanner-holder -->
			
</div><!-- /.row -->


<div class="breadcrumb">
	<div class="container">
		<div class="breadcrumb-inner">
			<ul class="list-inline list-unstyled">
				<li><a href="#">Home</a></li>
				<li class='active'>Customize</li>
			</ul>
		</div><!-- /.breadcrumb-inner -->
	</div><!-- /.container -->
</div><!-- /.breadcrumb -->

<!--<div id="msg" style="color:red; text-align:center; "><?php if (isset($_GET["msg"])){echo $_GET["msg"];}?></div>-->
<style>
.customs
{
	text-align:left;
}
 .custom-div
 {
	padding:5px;
	margin:5px;
	width:100%;
	float:left;
	height:inherit;
	background:#f9f9f9;
	border:1px solid #ccc;
 }
 .custom-div h6
 {
	text-decoration:underline;
	font-weight:700;
	font-size:10px;
 }
.img-btn img{
  width:100px;
  height:inherit;
}
.img-btn > input{
  display:none
}
.img-btn > img{
  cursor:pointer;
  border:5px solid transparent;
}
.img-btn > input:checked + img{
  border-color: black;
  border-radius:10px;
}

</style>


<div style="text-align:center;">
    <img src="img/construction.jpg" width="100%">
</div>


<?php include('includes/footer.php');?>
	
	<script src="assets/js/jquery-1.11.1.min.js"></script>
	
	<script src="assets/js/bootstrap.min.js"></script>
	
	<script src="assets/js/bootstrap-hover-dropdown.min.js"></script>
	<script src="assets/js/owl.carousel.min.js"></script>
	
	<script src="assets/js/echo.min.js"></script>
	<script src="assets/js/jquery.easing-1.3.min.js"></script>
	<script src="assets/js/bootstrap-slider.min.js"></script>
    <script src="assets/js/jquery.rateit.min.js"></script>
    <script type="text/javascript" src="assets/js/lightbox.min.js"></script>
    <script src="assets/js/bootstrap-select.min.js"></script>
    <script src="assets/js/wow.min.js"></script>
	<script src="assets/js/scripts.js"></script>

	<!-- For demo purposes – can be removed on production -->
	
	<script src="switchstylesheet/switchstylesheet.js"></script>
	
	<script>
		$(document).ready(function(){ 
			$(".changecolor").switchstylesheet( { seperator:"color"} );
			$('.show-theme-options').click(function(){
				$(this).parent().toggleClass('open');
				return false;
			});
		});

		$(window).bind("load", function() {
		   $('.show-theme-options').delay(2000).trigger('click');
		});
	</script>
	<!-- For demo purposes – can be removed on production : End -->

	<?php
	//echo "<script>alert('".$_SESSION['qnty']."');</script>";
	?>

</body>
</html>