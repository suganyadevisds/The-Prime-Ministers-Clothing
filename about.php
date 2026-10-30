  <?php 
session_start();
error_reporting(0);
include('includes/config.php');

	
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

	    <title>The Prime Ministress - Payment Method</title>
	    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
	    <link rel="stylesheet" href="assets/css/main.css">
	    <link rel="stylesheet" href="assets/css/green.css">
	    <link rel="stylesheet" href="assets/css/owl.carousel.css">
		<link rel="stylesheet" href="assets/css/owl.transitions.css">
		<!--<link rel="stylesheet" href="assets/css/owl.theme.css">-->
		<link href="assets/css/lightbox.css" rel="stylesheet">
		<link rel="stylesheet" href="assets/css/animate.min.css">
		<link rel="stylesheet" href="assets/css/rateit.css">
		<link rel="stylesheet" href="assets/css/bootstrap-select.min.css">
		<link rel="stylesheet" href="assets/css/config.css">
		<link href="assets/css/green.css" rel="alternate stylesheet" title="Green color">
		<link href="assets/css/blue.css" rel="alternate stylesheet" title="Blue color">
		<link href="assets/css/red.css" rel="alternate stylesheet" title="Red color">
		<link href="assets/css/orange.css" rel="alternate stylesheet" title="Orange color">
		<link href="assets/css/dark-green.css" rel="alternate stylesheet" title="Darkgreen color">
		<link rel="stylesheet" href="assets/css/font-awesome.min.css">
		<link href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,700' rel='stylesheet' type='text/css'>
		<link rel="shortcut icon" href="assets/images/favicon.png">

		<style>
			.panel-body 
			{
				padding:5px !important;
				line-height: 33px;
				font-size: 16px;
				font-weight: 500;
				accent-color: #000;
			}
			.payoption
			{
				margin:0px;
				font-size: 12px;
    background: #f8f8f8;
    padding: 10px;
    border: 1px solid #ccc;
}
			.blink_me {
  animation: blinker 1s linear infinite;
}

@keyframes blinker {
  50% {
    opacity: 0;
  }
}
		</style>
	</head>
    <body class="cnt-home bgborder" <?php if ($i==1){?>onload="scrolldiv()"<?php }?>>
	<script>
        function scrolldiv() {
            var elem = document.getElementById("msg");
            elem.scrollIntoView();
        }
    </script>
		
<header class="header-style-1 bgcolor">
<?php include('includes/top-header.php');?>
<?php include('includes/main-header.php');?>
<?php include('includes/menu-bar.php');?>
</header>
<div class="breadcrumb">
	<div class="container">
		<div class="breadcrumb-inner">
			<ul class="list-inline list-unstyled">
				
				<li class='active'>About The Prime Ministress Clothing</li>
			</ul>
		</div><!-- /.breadcrumb-inner -->
	</div><!-- /.container -->
</div><!-- /.breadcrumb -->

<div class="body-content outer-top-bd">
	<div class="container">
		<div class="checkout-box faq-page inner-bottom-sm">
			<div class="row">
				<div class="col-md-12">
					<h4></h4>
					<div class="panel-group checkout-steps" id="">
						<!-- checkout-step-01  -->
<div class="panel">

	

	
<div class="col-xs-12  col-sm-12 col-md-12  ">
<!-- panel-heading -->
    <div class="panel-heading">
    	<h3 id="tcp" class="unicase-checkout-title">
			Welcome to The Prime Ministress Clothing
        </h3>
    </div>
    <!-- panel-heading -->
    <p style="margin:0px 16px 10px; font-size:12px;">
        Elevate Your Style, Empower Your Soul<br>
        Introducing The Prime Ministress Clothing, where fashion meets finesse. We're a boutique clothing brand dedicated to curating unique, high-quality garments that make you feel confident, elegant, and powerful.
    </p>
</div>
	
<div class="col-xs-12  col-sm-12 col-md-12  ">
<!-- panel-heading -->
    <div class="panel-heading">
    	<h3 id="tcp" class="unicase-checkout-title">
        Our Story
        </h3>
    </div>
    <!-- panel-heading -->
    <p style="margin:0px 16px 10px; font-size:12px;">
            Founded on the principles of creativity, quality, and individuality, The Prime Ministress Clothing is a labor of love. Our team of passionate designers, skilled artisans, and fabric connoisseurs come together to craft garments that tell a story. Every stitch, every fold, and every detail is meticulously considered to ensure our collections exceed your expectations.
    </p>
</div>

<div class="col-xs-12  col-sm-12 col-md-12 ">
<!-- panel-heading -->
    <div class="panel-heading">
    	<h3 id="tcp" class="unicase-checkout-title">
        Our Promise
        </h3>
    </div>
    <!-- panel-heading -->
    <p style="margin:0px 16px 10px; font-size:12px;">
        - Exclusive Designs: Handcrafted with love, our designs blend modern trends with timeless elegance.<br>
        - Premium Fabrics: Sourced from the finest mills, our fabrics ensure comfort, durability, and luxury.<br>
        - Customized Stitching: Attention to detail guarantees a perfect fit, every time.<br>
        - Unique Collections: Limited-edition releases ensure you stand out from the crowd.<br>
        - Sustainable Fashion: We prioritize eco-friendly practices, reducing waste and minimizing environmental impact.<br>
    </p>
</div>

<div class="col-xs-12  col-sm-12 col-md-12  ">
<!-- panel-heading -->
    <div class="panel-heading">
    	<h3 id="tcp" class="unicase-checkout-title">
        Our Collections
        </h3>
    </div>
    <!-- panel-heading -->
    <p style="margin:0px 16px 10px; font-size:12px;">
    - Heritage: Timeless classics with a modern twist<br>
- Rebel Chic: Edgy, bold, and unapologetic statement pieces<br>
- Elegance: Sophisticated, refined, and perfect for special occasions<br>
- Everyday Luxe: Effortless, comfortable, and stylish essentials<br>

    </p>
</div>


<div class="col-xs-12  col-sm-12 col-md-12  ">
<!-- panel-heading -->
    <div class="panel-heading">
    	<h3 id="tcp" class="unicase-checkout-title">
        Join the Movement
        </h3>
    </div>
    <!-- panel-heading -->
    <p style="margin:0px 16px 10px; font-size:12px;">
    At The Prime Ministress Clothing, we believe fashion is a form of self-expression. Join our community of strong, stylish women who dare to make a statement. Stay ahead of the curve with:
<br><br>

- Early access to new collections<br>
- Exclusive promotions and discounts<br>
- Behind-the-scenes insights into our design process<br>
- Personalized styling advice from our expert team<br>
    </p>
</div>


<div class="col-xs-12  col-sm-12 col-md-12  ">
<!-- panel-heading -->
    <div class="panel-heading">
    	<h3 id="tcp" class="unicase-checkout-title">
        Get Ready to Shine
        </h3>
    </div>
    <!-- panel-heading -->
    <p style="margin:0px 16px 10px; font-size:12px;">
    Visit us today and discover a world of fashion that's truly fit for a Prime Ministress.

</p>
</div>


<div class="col-xs-12  col-sm-12 col-md-12  ">
<!-- panel-heading -->
    <div class="panel-heading">
    	<h3 id="tcp" class="unicase-checkout-title">
        Contact Information:
            </h3>
    </div>
    <!-- panel-heading -->
    <p style="margin:0px 16px 10px; font-size:12px;">
    Website: https://theprimeministressclothing.com <br>
Email: admin@theprimeministressclothing.com <br>
Phone: 9962093930<br>
Address: Chennai, Tamilnadu, India.<br>

</p>
</div>


<div class="col-xs-12  col-sm-12 col-md-12  ">
<!-- panel-heading -->
    <div class="panel-heading">
    	<h3 id="tcp" class="unicase-checkout-title">
        Social Media Handles:
        </h3>
    </div>
    <!-- panel-heading -->
    <p style="margin:0px 16px 10px; font-size:14px; ">
         <a style="color:#000;" href="https://www.facebook.com/share/45xX5yVfKV2BS5sx/?mibextid=LQQJ4d" target="_blank" class=""><i class="icon fa fa-facebook"></i> Facebook</a><br>
        <a href="https://x.com/suganyadev53723?s=11"><i class="icon fa fa-twitter"></i></a>
        <!--<a href="#"><i class="icon fa fa-linkedin"></i></a>-->
        <a style="color:#000;" href="https://www.instagram.com/the_prime_ministress_clothing?igsh=NmVrZjJlMjdpOTRu&utm_source=qr" target="_blank"><i class="icon fa fa-instagram"></i> Instagram</a><br>
        <a style="color:#000;" href="https://pin.it/4ZlAg9PgI" target="_blank"><i class="icon fa fa-pinterest"></i> Pinrest</a><br>

</p>
</div>



	
</div>
<!-- checkout-step-01  -->
					  
					  	
					</div><!-- /.checkout-steps -->
				</div>
			</div><!-- /.row -->
		</div><!-- /.checkout-box -->
		<!-- ============================================== BRANDS CAROUSEL ============================================== -->
<?php // echo include('includes/brands-slider.php');?>
<!-- ============================================== BRANDS CAROUSEL : END ============================================== -->	</div><!-- /.container -->
</div><!-- /.body-content -->
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

	
	

</body>
</html>
