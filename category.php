<?php
session_start();
error_reporting(0);
include('includes/config.php');
$cid=intval($_GET['cid']);
if(isset($_GET['action']) && $_GET['action']=="add")
{
	$id=intval($_GET['id']);
	$cid=intval($_GET['cid']);
	$sizes1=$_GET["sizes"];
if (isset($sizes1))
{
	
	if(isset($_SESSION['cart'][$id]))
	{
		//$_SESSION['cart'][$id]['quantity']++;
		$_SESSION['cart'][$id][$sizes1] += 1;
		echo "<script type='text/javascript'> document.location ='category.php?cid=".$cid."'; </script>";
	}
	else
	{
		$sql_p="SELECT * FROM products WHERE id={$id}";
		$query_p=mysqli_query($con,$sql_p);
		if(mysqli_num_rows($query_p)!=0)
		{
			$row_p=mysqli_fetch_array($query_p);
//			$_SESSION['cart'][$row_p['id']]=array("quantity" => 1, "price" => $row_p['productPrice']);
			$_SESSION['cart'][$row_p['id']][$sizes1] = 1;
					//echo "<script>alert('Product has been added to the cart')</script>";
		echo "<script type='text/javascript'> document.location ='category.php?cid=".$cid."'; </script>";

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

}

}
// COde for Wishlist
if(isset($_GET['pid']) && $_GET['action']=="wishlist" ){
	if(strlen($_SESSION['login'])==0)
    {   
header('location:login.php');
}
else
{
mysqli_query($con,"insert into wishlist(userId,productId) values('".$_SESSION['id']."','".$_GET['pid']."')");
echo "<script>alert('Product aaded in wishlist');</script>";
header('location:my-wishlist.php');

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

	    <title>The Prime Ministress - Product Category</title>

	    <!-- Bootstrap Core CSS -->
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
		<link rel="stylesheet" href="assets/css/mycss.css">

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

	</head>
	<style>
div.sticky {
	position: sticky;
	top: 0;
	opacity: 1;
	background-color: #2a2a2a;
	padding: 5px;
	font-size: 10px;
	color:#c5c5c5;
	z-index: 1;
	text-align:center;
}
</style>
	</head>

    <body class="cnt-home bgborder">
	<?php include('includes/sticky-top.php');?>

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
<?php
$catname=mysqli_query($con,"select * from category where id='$cid'");
$rowname=mysqli_fetch_array($catname)
?>
<div class="breadcrumb">
	<div class="container">
		<div class="breadcrumb-inner">
			<ul class="list-inline list-unstyled">
				<li><a href="#">Home</a></li>
				<li class='active'><?php echo $rowname["categoryName"]?></li>
			</ul>
		</div><!-- /.breadcrumb-inner -->
	</div><!-- /.container -->
</div><!-- /.breadcrumb -->

<div class="body-content">
	<div class='' style="padding:10px;">
		<div class='row '>
			
			<div class='col-md-12'>
					<!-- ========================================== SECTION – HERO ========================================= -->

	
				<div class="search-result-container">
					<div id="myTabContent" class="tab-content">
						<div class="tab-pane active " id="grid-container">
							<div class="category-product  inner-top-vs">
								<div class="row">									
<?php
$ret=mysqli_query($con,"select * from products where category='$cid'");
$num=mysqli_num_rows($ret);
if($num>0)
{
while ($row=mysqli_fetch_array($ret)) 
{
	$sizes = explode(',', $row['sizes']);
?>		

<div class="col-xs-12 col-sm-4 col-md-3 product_div" >		
			<div class="image1" id="image<?php echo htmlentities($row['id']);?>" style="position:relative; ">
				<a href="product-details.php?pid=<?php echo htmlentities($row['id']);?>">
				<img class="pimage"  src="admin/productimages/<?php echo htmlentities($row['id']);?>/<?php echo htmlentities($row['productImage1']);?>" data-echo="admin/productimages/<?php echo htmlentities($row['id']);?>/<?php echo htmlentities($row['productImage1']);?>"  width="180" height="300" alt=""></a>
			
				<div class="radio-toolbar" id="radio<?php echo htmlentities($row['id']);?>" style="position:absolute; bottom:0px; left:0px; text-align:center !important; display:none;width:98%; margin:1%;">

					<input <?php if ($sizes[0]=="" or $sizes[0]==0){echo "disabled";}?> type="radio" id="radio0<?php echo htmlentities($row['id']);?>" name="radios<?php echo htmlentities($row['id']);?>" class="r<?php echo htmlentities($row['id']);?>" value="XXS">
					<label <?php if ($sizes[0]=="" or $sizes[0]==0){echo "style='background:#ae9898;color:#666;text-decoration:line-through;'";}?> for="radio0<?php echo htmlentities($row['id']);?>">XXS</label>

					<input <?php if ($sizes[1]=="" or $sizes[1]==0){echo "disabled";}?> type="radio" id="radio1<?php echo htmlentities($row['id']);?>" name="radios<?php echo htmlentities($row['id']);?>" class="r<?php echo htmlentities($row['id']);?>" value="XS">
					<label <?php if ($sizes[1]=="" or $sizes[1]==0){echo "style='background:#ae9898;color:#666;text-decoration:line-through;'";}?> for="radio1<?php echo htmlentities($row['id']);?>">XS</label>

					<input <?php if ($sizes[2]=="" or $sizes[2]==0){echo "disabled";}?> type="radio" id="radio2<?php echo htmlentities($row['id']);?>" name="radios<?php echo htmlentities($row['id']);?>" class="r<?php echo htmlentities($row['id']);?>" value="S">
					<label <?php if ($sizes[2]=="" or $sizes[2]==0){echo "style='background:#ae9898;color:#666;text-decoration:line-through;'";}?> for="radio2<?php echo htmlentities($row['id']);?>">S</label>

					<input <?php if ($sizes[3]=="" or $sizes[3]==0){echo "disabled";}?> type="radio" id="radio3<?php echo htmlentities($row['id']);?>" name="radios<?php echo htmlentities($row['id']);?>" class="r<?php echo htmlentities($row['id']);?>" value="M">
					<label <?php if ($sizes[3]=="" or $sizes[3]==0){echo "style='background:#ae9898;color:#666;text-decoration:line-through;'";}?> for="radio3<?php echo htmlentities($row['id']);?>">M</label>

					<input <?php if ($sizes[4]=="" or $sizes[4]==0){echo "disabled";}?> type="radio" id="radio4<?php echo htmlentities($row['id']);?>" name="radios<?php echo htmlentities($row['id']);?>" class="r<?php echo htmlentities($row['id']);?>" value="L">
					<label <?php if ($sizes[4]=="" or $sizes[4]==0){echo "style='background:#ae9898;color:#666;text-decoration:line-through;'";}?> for="radio4<?php echo htmlentities($row['id']);?>">L</label>

					<input <?php if ($sizes[5]=="" or $sizes[5]==0){echo "disabled";}?> type="radio" id="radio5<?php echo htmlentities($row['id']);?>" name="radios<?php echo htmlentities($row['id']);?>" class="r<?php echo htmlentities($row['id']);?>" value="XL">
					<label <?php if ($sizes[5]=="" or $sizes[5]==0){echo "style='background:#ae9898;color:#666;text-decoration:line-through;'";}?> for="radio5<?php echo htmlentities($row['id']);?>">XL</label>

					<input <?php if ($sizes[6]=="" or $sizes[6]==0){echo "disabled";}?> type="radio" id="radio6<?php echo htmlentities($row['id']);?>" name="radios<?php echo htmlentities($row['id']);?>" class="r<?php echo htmlentities($row['id']);?>" value="XXL">
					<label <?php if ($sizes[6]=="" or $sizes[6]==0){echo "style='background:#ae9898;color:#666;text-decoration:line-through;'";}?> for="radio6<?php echo htmlentities($row['id']);?>">XXL</label>

					<input <?php if ($sizes[7]=="" or $sizes[7]==0){echo "disabled";}?> type="radio" id="radio7<?php echo htmlentities($row['id']);?>" name="radios<?php echo htmlentities($row['id']);?>" class="r<?php echo htmlentities($row['id']);?>" value="XXXL">
					<label <?php if ($sizes[7]=="" or $sizes[7]==0){echo "style='background:#ae9898;color:#666;text-decoration:line-through;'";}?> for="radio7<?php echo htmlentities($row['id']);?>">XXXL</label>

				</div>


			</div><!-- /.image -->			

			<script>
	$("#image<?php echo htmlentities($row['id']);?>").hover(function(){
  $("#radio<?php echo htmlentities($row['id']);?>").css("display", "block");
  }, function(){
  $("#radio<?php echo htmlentities($row['id']);?>").css("display", "none");
});

$(".r<?php echo htmlentities($row['id']);?>").click(function(){
	var s=$(this).val();
  $(".pick<?php echo $row['id'];?>").attr("href", "category.php?page=product&action=add&&id=<?php echo $row['id'];?>&cid=<?php echo $row['category'];?>&sizes="+s);
  $(".wishlist<?php echo $row['id'];?>").attr("href", "product-details.php?pid=<?php echo htmlentities($row['id'])?>&action=wishlist&sizes="+s);
});

</script>			
			
		<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12 product-info text-left" >
				<a href="product-details.php?pid=<?php echo htmlentities($row['id']);?>">
					<?php echo htmlentities($row['productName']);?>
				</a><br>
			<!--<div class="rating rateit-small"></div>-->
			
			
			<div class="product-price">	
				<div class="price" style="width:80%; float:left;">
					Rs.<?php echo htmlentities($row['productPrice']);?>			
				</div>
				<div style="width:10%; float:left;">
					<a class="btn-primary wishlist<?php echo $row['id'];?>" style="font-size:10px;padding:3px; margin:0px;" data-toggle="tooltip" data-placement="right" title="Wishlist" href="product-details.php?pid=<?php echo htmlentities($row['id'])?>&&action=wishlist">
					<i class="fa fa-heart"></i>
				</a>
				</div>
		
				<!--<span class="price-before-discount">Rs.<?php //echo htmlentities($row['productPriceBeforeDiscount']);?></span>-->
			</div><!-- /.product-price -->
			
			

		</div><!-- /.product-info -->
		
		<?php if($row['productAvailability']=='In Stock'){?>
		<div class="addtocart"><a class="pickit pick<?php echo $row['id'];?>" href="category.php?page=product&action=add&id=<?php echo $row['id']; ?>&cid=<?php echo $row['category']; ?>" >Pick to Cart</a></div>
		<?php } else {?>
		<div class="addtocart pickit" >Out of Stock</div>
		<?php } ?>
		
		</div><!--row-->

	</div><!-- /.product -->
      
		
<?php
}
}
else
{
?>
	
		<div class="col-sm-6 col-md-4 wow fadeInUp"> <h3>No Product Found</h3></div>
		
<?php 
}
?>	
		
	
		
		
	
		
	
		
	
		
										</div><!-- /.row -->
							</div><!-- /.category-product -->
						
						</div><!-- /.tab-pane -->
						
				

				</div><!-- /.search-result-container -->

			</div><!-- /.col -->
		</div></div>
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
	<!-- For demo purposes – can be removed on production : End -->

	

</body>
</html>