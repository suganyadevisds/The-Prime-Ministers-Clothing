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
				<li><a href="home.html">Home</a></li>
				<li class='active'>Our Policies</li>
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
<div class="panel panel-default checkout-step-01">

	

	
	<div class="col-xs-12  col-sm-12 col-md-12 payoption ">
<!-- panel-heading -->
<div class="panel-heading">
    	<h3 id="tcp" class="unicase-checkout-title">
	        <!--<a data-toggle="collapse" class="" data-parent="#accordion" href="#">-->
			Terms and Conditions
	       <!-- </a>-->
	     </h3>
    </div>
    <!-- panel-heading -->
<ol style="line-height:30px;">
	<li>Introduction<br>
Welcome to The Prime Ministress Clothing, an online clothing store. You agree to these Terms and Conditions when using our website or services.
	</li>
<li>Payments<br>
All sales are final. Payments are non-refundable.
	</li>
<li>Product Information<br>
We strive to provide accurate product information, but errors can occur and colors may vary slightly. 
</li>

<li>Governing Law<br>
These Terms and Conditions are governed by Tamilnadu rules and Indian government rules in force.

	</li>
<li>Changes to Terms and Conditions<br>
We reserve the right to update these Terms and Conditions at any time.
	</li>
	</ol>
</div>
	


	<div class="col-xs-12  col-sm-12 col-md-12 payoption">
<!-- panel-heading -->
<div class="panel-heading">
    	<h3 id="rp" class="unicase-checkout-title ">
	        <!--<a data-toggle="collapse" class="" data-parent="#accordion" href="#">-->
			<br>Return Policy
	       <!-- </a>-->
	     </h3>
    </div>
    <!-- panel-heading -->
	<ol style="line-height:30px;">
	<li>Exchange Only<br>
We do not offer returns or refunds. Only exchanges are permissible for the same or lower-priced items.
	</li>
<li>Exchange Conditions<br>
To initiate an exchange:
<br>a. Contact us within 2 days of delivery
<br>b. Provide reason for exchange
<br>c. Receive exchange shipping instructions
	</li>
	<li>Exchange Guidelines<br>
Exchanges are only permissible for items in original condition with tags attached.
	</li>
	</ol>
	</div>

	
	
	<div class="col-xs-12  col-sm-12 col-md-12 payoption">
<!-- panel-heading -->
<div class="panel-heading">
    	<h3 id="sp" class="unicase-checkout-title">
	        <!--<a data-toggle="collapse" class="" data-parent="#accordion" href="#">-->
			<br>Shipping Policy
	       <!-- </a>-->
	     </h3>
    </div>
    <!-- panel-heading -->
	<ol style="line-height:30px;">

<li>Shipping Times<br>
We strive to ship orders within 24-48 hours and its deliver between 4 to 10 working days.
	</li>
<li>Shipping Carriers<br>
We use shipping carriers and provide tracking information on our website.
	</li>
<li>Delivery Times<br>
Delivery times vary depending on location.
	</li>
<li>Shipping Costs<br>
Shipping costs are non-refundable.
	</li>
	</ol>
	</div>

	
	<div class="col-xs-12  col-sm-12 col-md-12 payoption">
<!-- panel-heading -->
<div class="panel-heading">
    	<h3 id="pp" class="unicase-checkout-title">
	        <!--<a data-toggle="collapse" class="" data-parent="#accordion" href="#">-->
			<br>Privacy Policy
			<!-- </a>-->
	     </h3>
    </div>
    <!-- panel-heading -->
	<ol style="line-height:30px;">

<li>Personal Information<br>
We collect personal information to process orders and improve our services.
	</li>
<li>Information Use<br>
We do not share information with third parties.
	</li>
<li>Marketing Communications<br>
You can opt out of marketing communications at any time.
	</li>
<li>Security<br>
We take reasonable measures to protect personal information.
<br>
Any disputes in this regard will lie within the jurisdiction of Chennai.

	</li>
	</ol>
	</div>

	<div class="col-xs-12  col-sm-12 col-md-12 payoption ">
			<!-- panel-heading -->
	<div class="panel-heading">
    	<h3 id="cu" class="unicase-checkout-title">
	        <!--<a data-toggle="collapse" class="" data-parent="#accordion" href="#">-->
			<br>Contact us
			<!-- </a>-->
	     </h3>
		 <h5>
		 <br>
The Prime Ministress Clothing,<br><br>
Ayanambakkam, <br><br>
Chennai – 600095.<br><br>
Phone: 9962093930<br></h5>
    </div>
    <!-- panel-heading -->



	
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
