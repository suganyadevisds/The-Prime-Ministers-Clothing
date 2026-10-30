<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['login'])==0)
    {   
header('location:login.php');
}
else{
// Code forProduct deletion from  wishlist	
$wid=intval($_GET['del']);
$sizes1=intval($_GET['sizes']);

if(isset($_GET['del']))
{
$query=mysqli_query($con,"delete from wishlist where id='$wid'");
echo "<script type='text/javascript'> document.location ='my-wishlist.php'; </script>";
}


if(isset($_GET['action']) && $_GET['action']=="add")
{
	$sizes1=$_GET['sizes'];
	//echo "<script>alert('".$sizes1."');</script>";
	$id=intval($_GET['id']);
	$wid=intval($_GET['wid']);
	$csizes="no";
	$query_stock=mysqli_query($con,"select * from products where id='$id'");
	$row_stock=mysqli_fetch_array($query_stock);
	$psizes=explode(",",$row_stock["sizes"]);
	foreach($psizes as $psize) {
		if ($psize==$sizes1)
		{
			$csizes="yes";
		}
	}
	$productAvailability=$row_stock["productAvailability"];
	if ($productAvailability=="Out of Stock" and $csizes="yes")
	{
		$msg="This product is out of stock";
	}
	else
	{
	
	//	$query=mysqli_query($con,"delete from wishlist where productId='$id' and sizes='$sizes1'");
		$query=mysqli_query($con,"delete from wishlist where id='$wid'");
		$query_size=mysqli_query($con,"select * from wishlist where id='$wid'");
		$row_size=mysqli_fetch_array($query_size);
		if(isset($_SESSION['cart'][$id]))
		{
			//$_SESSION['cart'][$id]['quantity']++;
			$_SESSION['cart'][$id][$sizes1] += 1;
			echo "<script type='text/javascript'> document.location ='my-cart.php'; </script>";
		}
		else
		{
			$sql_p="SELECT * FROM products WHERE id={$id}";
			$query_p=mysqli_query($con,$sql_p);
			if(mysqli_num_rows($query_p)!=0)
			{
				$row_p=mysqli_fetch_array($query_p);
			//	$_SESSION['cart'][$row_p['id']]=array("quantity" => 1, "price" => $row_p['productPrice']);	
			$_SESSION['cart'][$row_p['id']][$sizes1] = 1;
			//header('location:my-wishlist.php');
			echo "<script type='text/javascript'> document.location ='my-cart.php'; </script>";	
			}
		
			else
			{
				$msg="Product ID is invalid";
			}
		}
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

	    <title>The Prime Ministress - My Wishlist</title>
	    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
	    
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
		<link rel="shortcut icon" href="assets/images/favicon.png">
		<style>
			.wishlist
{
	min-height: 120px; height:auto; line-height: 120px; text-align: center; border-top: 1px solid #ccc; border-bottom: 1px solid #ccc;
}
.wishlist div img
{

border:3px dashed #000 !important;
}

@media (max-width: 550px) {
	.wishlist div
{
	
clear:both;

width:100% !important;
}
.wishlist div img
{
width:30% !important;
height:inherit !important;
border:3px dashed #000 !important;
}
.wishlist
{
	 line-height: unset; text-align: center; position:relative;border: 1px solid #ccc; margin:10px !important; padding:10px;
	}

.wishlist div:last-child
{
	width:10px !important;
position:absolute;
top:5px;
right:5px;

}
.wishlist div:last-child a
{
	color:#999; font-size:14px;
}
}
.blink_me {
  animation: blinker 1s linear infinite; color:red; text-align:center; font-size:12px;
}

@keyframes blinker {
  50% {
    opacity: 0;
  }
}
		</style>
	</head>
    <body class="cnt-home bgborder">
<header class="header-style-1 bgcolor">

	<!-- ============================================== TOP MENU ============================================== -->
<?php include('includes/top-header.php');?>
<!-- ============================================== TOP MENU : END ============================================== -->
<?php include('includes/main-header.php');?>
	<!-- ============================================== NAVBAR ============================================== -->
<?php include('includes/menu-bar.php');?>
<!-- ============================================== NAVBAR : END ============================================== -->

</header>

<!-- ============================================== HEADER : END ============================================== -->
<div class="breadcrumb">
	<div class="container">
		<div class="breadcrumb-inner">
			<ul class="list-inline list-unstyled">
				<li><a href="home.html">Home</a></li>
				<li class='active'>Wishlist</li>
			</ul>
		</div><!-- /.breadcrumb-inner -->
	</div><!-- /.container -->
</div><!-- /.breadcrumb -->

<div class="body-content outer-top-bd">
	<div class="container">
	<form method="get" enctype="multipart/form-data">
	<div id="msg" class="blink_me"><?php echo $msg;?></div>
<?php
$ret=mysqli_query($con,"select products.productName as pname,products.productName as proid,products.productImage1 as pimage,products.productPrice as pprice,wishlist.productId as pid,wishlist.id as wid,wishlist.sizes as wsizes from wishlist join products on products.id=wishlist.productId where wishlist.userId='".$_SESSION['id']."'");
$num=mysqli_num_rows($ret);
	if($num>0)
	{
		if($num>0){echo "<h3>My Wishlist</h3>";}

while ($row=mysqli_fetch_array($ret)) {

?>
<div style="margin:0px;">
			<div class="row wishlist" style="">

					<div class="" style="float:left; min-width:100px; width:20%;"><img src="admin/productimages/<?php echo htmlentities($row['pid']);?>/<?php echo htmlentities($row['pimage']);?>" alt="<?php echo htmlentities($row['pname']);?>" height="100"></div>
					<div class="" style="float:left; min-width:100px; width:50%; font-size:14px; font-weight:500;">
						<a style="color:#000;" href="product-details.php?pid=<?php echo htmlentities($pd=$row['pid']);?>"><?php echo htmlentities($row['pname']);?><span style="color:#b63434;"> (<?php echo htmlentities($row['wsizes']);?>)</span></a>
						  - Rs.	<?php echo htmlentities($row['pprice']);?>
						  
					</div>
					<div class="" style="float:left; min-width:70px; width:20%;">
						<a href="my-wishlist.php?page=product&action=add&id=<?php echo $row['pid']; ?>&wid=<?php echo $row['wid']; ?>&sizes=<?php echo htmlentities($row['wsizes']);?>" class="btn-upper btn btn-primary">Add to cart</a>

					</div>
					<div class="" style="float:left; min-width:10px; width:10%;">
						<a style="color:#000; font-size:14px;" href="my-wishlist.php?del=<?php echo htmlentities($row['wid']);?>&sizes=<?php echo htmlentities($row['wsizes']);?>" onClick="return confirm('Are you sure you want to delete?')" class=""><i class="fa fa-times"></i></a>
					</div>
			</div><!-- /.row --></div>
				<?php } } else{ ?>
				<div class="row">
					<div  class="col-md-12" style="font-size: 18px;height:150px; font-weight:bold; text-align:center;">Your Wishlist is Empty</div>

				</div>
				<?php } ?>
			
				</form>			
		
	<?php //include('includes/brands-slider.php');?>
</div>
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
</body>
</html>
<?php } ?>