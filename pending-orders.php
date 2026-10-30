<?php 
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['login'])==0)
    {   
header('location:login.php');
}
else{
	
/*foreach($_SESSION['cart'] as $id => $value){
	if ($_GET['id']==$id)
	{
		unset($_SESSION['cart'][$id]);
	}
*/	
	if (isset($_GET['id'])) {
		mysqli_query($con,"delete from orders  where userId='".$_SESSION['id']."' and paymentMethod is null and id='".$_GET['id']."' ");

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

	    <title>The Prime Ministress - Pending Order History</title>
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

		<!-- Demo Purpose Only. Should be removed in production -->
		<link rel="stylesheet" href="assets/css/config.css">

		<link href="assets/css/green.css" rel="alternate stylesheet" title="Green color">
		<link href="assets/css/blue.css" rel="alternate stylesheet" title="Blue color">
		<link href="assets/css/red.css" rel="alternate stylesheet" title="Red color">
		<link href="assets/css/orange.css" rel="alternate stylesheet" title="Orange color">
		<link href="assets/css/dark-green.css" rel="alternate stylesheet" title="Darkgreen color">
		<!-- Demo Purpose Only. Should be removed in production : END -->

		
		<!-- Icons/Glyphs -->
		<link rel="stylesheet" href="assets/css/font-awesome.min.css">

        <!-- Fonts --> 
		<link href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,700' rel='stylesheet' type='text/css'>
		
		<!-- Favicon -->
		<link rel="shortcut icon" href="assets/images/favicon.png">

		<!-- HTML5 elements and media queries Support for IE8 : HTML5 shim and Respond.js -->
		<!--[if lt IE 9]>
			<script src="assets/js/html5shiv.js"></script>
			<script src="assets/js/respond.min.js"></script>
		<![endif]-->

		<style>

/* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  padding-top: 100px; /* Location of the box */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: strcoll; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

/* Modal Content */
.modal-content {
  background-color: #fefefe;
  margin: auto;
  padding: 20px;
  border: 1px solid #888;
  width:50%;
  position: relative;
    display: -ms-flexbox;
    display: flex;
    -ms-flex-direction: column;
    flex-direction: column;
    width: 50% !important;
    pointer-events: auto;
    background-color: #fff;
    background-clip: padding-box;
    border: 1px solid rgba(0, 0, 0, 0.2);
    border-radius: 0.3rem;
    outline: 0;
}

/* The Close Button */
.close {
  color: #aaaaaa;
  float: right;
  font-size: 28px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: #000;
  text-decoration: none;
  cursor: pointer;
}

@media (max-width: 700px) {
    .col-sm-4 {
        -ms-flex: 0 0 33.333333%;
        flex: 0 0 42.333333%;
        max-width: 32.333333%;
        white-space: wrap;
    }
	.entry-thumbnail img
	{
		width: 65px;
		height:inherit;
	}
	.modal-content {
		width: 100% !important;
	}
}
table, th, td
{
	padding:3px !important;
	
}
.order-list
{
	border-bottom:1px dashed #ccc;
	padding:10px 0px;
	text-align:left;
	
}
.order-list div
{
	height:100%;
	vertical-align:middle !important;
}
.order-list img
{
	border:3px dashed #000;
}
.order-list a
{
	font-size:12px;
	color:#000;
}
table
{
	border: 3px solid #7a7575 !important;
	padding:20px;
}
table tr:first-child
{
	background:#7a7575;
	margin:20px;
	
}
table tr:first-child a
{
	color:#fff;
	font-size:16px;

}
table tr:first-child img
{
	border:3px dashed #fff;

}

</style>
	</head>
    <body class="cnt-home bgborder">
	
		
	
		<!-- ============================================== HEADER ============================================== -->
<header class="header-style-1 bgcolor">
<?php include('includes/top-header.php');?>
<?php include('includes/main-header.php');?>
<?php include('includes/menu-bar.php');?>
</header>
<!-- ============================================== HEADER : END ============================================== -->
<div class="breadcrumb">
	<div class="container">
		<div class="breadcrumb-inner">
			<ul class="list-inline list-unstyled">
				<li><a href="#">Home</a></li>
				<li class='active'>Shopping Cart</li>
			</ul>
		</div><!-- /.breadcrumb-inner -->
	</div><!-- /.container -->
</div><!-- /.breadcrumb -->

<div class="body-content outer-top-xs">
	<div class="container">
	<form name="cart" method="post">	

<?php $query=mysqli_query($con,"select products.productImage1 as pimg1,products.productName as pname,products.id as proid,orders.productId as opid,orders.quantity as qty,orders.sizes as psizes,products.productPrice as pprice,products.shippingCharge as shippingcharge,orders.paymentMethod as paym,orders.orderDate as odate,orders.id as oid from orders join products on orders.productId=products.id where orders.userId='".$_SESSION['id']."' and orders.paymentMethod is null");
$cnt=1;
$num=mysqli_num_rows($query);
if($num>0)
{
while($row=mysqli_fetch_array($query))
{
?>
			<div class="row">
		
					
					
		<div class="col-xs-1 col-sm-4 col-md-4 order-list">
		<div>
		<a class="entry-thumbnail" href="detail.html">
			<img src="admin/productimages/<?php echo $row['proid'];?>/<?php echo $row['pimg1'];?>" alt="" width="84" height="146">
		</a>
		</div>
		</div>

		<div class="col-xs-1 col-sm-4 col-md-4 order-list">
		<div>
		<a href="product-details.php?pid=<?php echo $row['opid'];?>">
		<?php echo $row['pname'];?></a>
		<br>
		Size: <?php echo $row['psizes'];?>
		</div>
		</div>	
	
		<div class="col-xs-1 col-sm-4 col-md-4 order-list">
		<div>
		<a href="#"  id="myBtn<?php echo $cnt;?>">Delete
		</a>
		</div>
		</div>

</div>
<br>
<!-- The Modal -->
<div id="myModal<?php echo $cnt;?>" class="modal">

<!-- Modal content -->
<div class="modal-content">
<span class="close<?php echo $cnt;?>" style="cursor: pointer; font-size:26px;font-weight: bold; float:right;">&times;</span>


<table class="table table-bordered">

<tr>
	<th class="cart-description item">
		<a class="entry-thumbnail" href="detail.html">
			<img src="admin/productimages/<?php echo $row['proid'];?>/<?php echo $row['pimg1'];?>" alt=""  height="100">
		</a>
	</th>
	<td class="cart-product-name-info">
		<a href="product-details.php?pid=<?php echo $row['opid'];?>">
		<?php echo $row['pname'];?>
		<br><span style="font-size:12px;">Size: <?php echo $row['psizes'];?></span>
		</a>	
	</td>
</tr>


<tr>
	<th class="cart-qty item">Quantity</th>
	<td class="cart-product-quantity">
		<?php echo $qty=$row['qty']; ?>   
	</td>					
</tr>

<tr>
	<th class="cart-sub-total item">Price Per unit</th>
	<td class="cart-product-sub-total"><?php echo $price=$row['pprice']; ?>  </td>
</tr>

<tr>
	<th class="cart-sub-total item">Shipping Charge</th>
	<td class="cart-product-sub-total"><?php echo $shippcharge=$row['shippingcharge']; ?>  </td>
</tr>

<tr>
	<th class="cart-total item">Grandtotal</th>
	<td class="cart-product-grand-total"><?php echo (($qty*$price)+$shippcharge);?></td>
</tr>

<tr>
	<th class="cart-total item">Payment Method</th>
	<td class="cart-product-sub-total"><?php echo $row['paym']; ?>  </td>
</tr>

<tr>
	<th class="cart-description item">Order Date</th>
	<td class="cart-product-sub-total"><?php echo $row['odate']; ?>  </td>
</tr>

<tr>
	<th class="cart-total last-item">Action</th>
<td>
<a href="pending-orders.php?id=<?php echo $row['oid']; ?> ">Delete</a>
</td>
</tr>
</table>

</div><!-- modal content-->

</div><!-- modal -->


<script>
// Get the modal
var modal<?php echo $cnt;?> = document.getElementById("myModal<?php echo $cnt;?>");

// Get the button that opens the modal
var btn<?php echo $cnt;?> = document.getElementById("myBtn<?php echo $cnt;?>");

// Get the <span> element that closes the modal
var span<?php echo $cnt;?> = document.getElementsByClassName("close<?php echo $cnt;?>")[0];

// When the user clicks the button, open the modal 
btn<?php echo $cnt;?>.onclick = function() {
modal<?php echo $cnt;?>.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span<?php echo $cnt;?>.onclick = function() {
modal<?php echo $cnt;?>.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
if (event.target == modal<?php echo $cnt;?>) {
modal<?php echo $cnt;?>.style.display = "none";
}
}
</script>


<?php
$cnt=$cnt+1;}
?>
<div class="cart-checkout-btn pull-right" style="margin:10px;">
	<button type="submit" name="ordersubmit" class="btn btn-primary"><a style="color:#fff;" href="payment-method.php">PROCCED To Payment</a></button>
</div><br>
<?php } else {?>
<h4 style="height:200px;">No Result Found</h4><br>
<?php } ?>
</form>







		<!-- ============================================== BRANDS CAROUSEL ============================================== -->
<?php //echo include('includes/brands-slider.php');?>
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
</body>
</html>
<?php } ?>