<?php 
session_start();
error_reporting(0);
include('includes/config.php');

	//if(isset($_GET['action']) && $_GET['action']=="add"){

	if(isset($_POST['submit'])){
	$id=intval($_POST['hid_id']);
	$sizes=$_POST["radios"];
	$tot_qty=$_POST['quan'];
	
	if (isset($sizes))
	{

		if(isset($_SESSION['cart'][$id])){

		// $_SESSION['cart'][$id]['quantity']=$_SESSION['cart'][$id]['quantity']+$tot_qty;
		
		$_SESSION['cart'][$id][$sizes] += $tot_qty;
		echo "<script type='text/javascript'> document.location ='my-cart.php'; </script>";

	}else{
		$sql_p="SELECT * FROM products WHERE id={$id}";
		$query_p=mysqli_query($con,$sql_p);
		if(mysqli_num_rows($query_p)!=0){
			$row_p=mysqli_fetch_array($query_p);
			
			$_SESSION['cart'][$row_p['id']][$sizes] = $tot_qty;

			//$_SESSION['cart'][$row_p['id']]=array("quantity" => $tot_qty, "price" => $row_p['productPrice']);
			//echo "<script>alert('Product has been added to the cart')</script>";
			echo "<script type='text/javascript'> document.location ='my-cart.php'; </script>";
	
		}else{
			$message="Product ID is invalid";
		}
	}
}
else
{
	echo "<script>alert('Please select the size')</script>";
	echo "<script type='text/javascript'> document.location ='product-details.php?pid=$id'; </script>";
}

}

$pid=intval($_GET['pid']);

if(isset($_GET['pid']) && $_GET['action']=="wishlist" )
{

$pid=intval($_GET['pid']);
	
$sizes1=$_GET["sizes"];
	
if (isset($sizes1))
{
	if(strlen($_SESSION['login'])==0)
    {   
header('location:login.php');
}
else
{
mysqli_query($con,"insert into wishlist(userId,productId,sizes) values('".$_SESSION['id']."','$pid','$sizes1')");
echo "<script>alert('Product aaded in wishlist');</script>";
header('location:my-wishlist.php');

}
}
else
{
	echo "<script>alert('Please select the size')</script>";
	echo "<script type='text/javascript'> document.location ='product-details.php?pid=$pid'; </script>";
}
}
//if(isset($_POST['submit']))
//{
/*	$qty=$_POST['quality'];
	$price=$_POST['price'];
	$value=$_POST['value'];
	$name=$_POST['name'];
	$summary=$_POST['summary'];
	$review=$_POST['review'];
	mysqli_query($con,"insert into productreviews(productId,quality,price,value,name,summary,review) values('$pid','$qty','$price','$value','$name','$summary','$review')");
*///}


?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
		<meta name="description" content="">
		<meta name="author" content="">
	    <meta name="keywords" content="MediaCenter, Template, eCommerce">
	    <meta name="robots" content="all">
	    <title>The Prime Ministress - Product Details</title>
	    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
	    <link rel="stylesheet" href="assets/css/main.css">
	    <link rel="stylesheet" href="assets/css/green.css">
	    <link rel="stylesheet" href="assets/css/owl.carousel.css">
		<link rel="stylesheet" href="assets/css/owl.transitions.css">
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
		<link rel="stylesheet" href="assets/css/mycss.css">

        <!-- Fonts --> 
		<link href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,700' rel='stylesheet' type='text/css'>
		<link rel="shortcut icon" href="assets/images/favicon.png">
	</head>
    <body class="cnt-home">
	
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
		<div class="breadcrumb-inner" style="height:70px;font-size:14px;">
<?php
$ret=mysqli_query($con,"select category.categoryName as catname,subCategory.subcategory as subcatname,products.productName as pname from products join category on category.id=products.category join subcategory on subcategory.id=products.subCategory where products.id='$pid'");
while ($rw=mysqli_fetch_array($ret)) {

?>
<br><a style="text-decoration:none; color:#000;" href="index.php">Home</a> / <?php echo htmlentities($rw['catname']);?> / <span style="color:#b63434;"><?php echo htmlentities($rw['pname']);?></span>

<?php }?>
		</div><!-- /.breadcrumb-inner -->
	</div><!-- /.container -->
</div><!-- /.breadcrumb -->
<div class="body-content outer-top-xs">
	<div class=''>
<style>
	
	.thumbnail-div
	{
		padding:10px 0px;
	}
	.product-details
	{
		padding:10px;
		max-width:900px;
		margin:auto;
	}
	.stock-box
	{
		font-size:12px; 
		padding:10px 0px;
	}
	.stock-box > span:first-child
	{
		font-weight:800;
	}
	.cart-quantity
	{
	padding-top:10px;
	}
	.cart-quantity .quant-input {
    display: inline-block;
    height: 35px;
    position: relative;
    width: 70px;
	
	}
	.cart-quantity .quant-input .arrows {
    position: absolute;
    right: 0;
    top: 0;
    z-index: 2;
    height: 100%;
	}
	.cart-quantity .quant-input .arrows .plus {
    box-sizing: border-box;
    display: block;
    text-align: center;
    width: 40px;
    cursor: pointer;
	}
	.cart-quantity .quant-input .arrows .minus {
    box-sizing: border-box;
    display: block;
    text-align: center;
    width: 40px;
    cursor: pointer;
}
.cart-quantity .quant-input .arrows .arrow .ir .icon.fa-sort-asc {
    top: 5px;
}
.cart-quantity .quant-input .arrows .arrow .ir .icon {
    position: relative;
}
.cart-quantity .quant-input .arrows .arrow .ir .icon.fa-sort-desc {
    top:-4px;
}
.cart-quantity .quant-input .arrows .arrow .ir .icon {
    position: relative;
}
.cart-quantity .quant-input input {
    background: none repeat scroll 0 0 #fff;
	
    border: 1px solid #f2f2f2;
	border: 2px solid #8a8484;
	border-radius:10px;
    box-sizing: border-box;
    font-size: 15px;
    height: 35px;
    left: 0;
    padding: 0 20px 0 18px;
    position: absolute;
    top: 0;
    width: 70px;
    z-index: 1;
}
.social-icons ul li a
{
	color:#b63434;
}
.social-icons ul li a:hover
{
	color:#000;
}
.description
{
	padding-top:10px;
	font-family:verdana;
	font-size:12px;
}
	@media (max-width: 576px) {
		.thumbnail-div div
		{
			width:33.3%;
		}
	}

</style>
<div class="container product-details">
	
<?php 
$ret=mysqli_query($con,"select * from products where id='$pid'");
$row=mysqli_fetch_array($ret);
$sizes1 = explode(',', $row['sizes']);
?>
 <form method="post" action=""  enctype="multipart/form-data">
<div class="row">
	<div class="col-xs-12 col-sm-6 col-md-6">
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12">
				<img id="image_main" class="img-responsive" alt="" src="admin/productimages/<?php echo htmlentities($row['id']);?>/<?php echo htmlentities($row['productImage1']);?>"/>
			</div>
			<div class="col-xs-12 col-sm-12 col-md-12">
				<div class="row thumbnail-div">
					<div class="col-xs-4 col-sm-4 col-md-4"><img id="image1" class="img-responsive" alt="" src="admin/productimages/<?php echo htmlentities($row['id']);?>/<?php echo htmlentities($row['productImage1']);?>" /></div>
					<div class="col-xs-4 col-sm-4 col-md-4"><img id="image2" class="img-responsive" alt="" src="admin/productimages/<?php echo htmlentities($row['id']);?>/<?php echo htmlentities($row['productImage2']);?>"/></div>
					<div class="col-xs-4 col-sm-4 col-md-4"><img id="image3" class="img-responsive" alt="" src="admin/productimages/<?php echo htmlentities($row['id']);?>/<?php echo htmlentities($row['productImage3']);?>"/></div>
				</div>
			</div>
		<div>
	
	</div>
	
</div>

</div>
<div class="col-xs-12 col-sm-6 col-md-6">
	
		
		<h2><?php echo htmlentities($row['productName']);?></h2>
			<div class="price-box">
				<span class="price">Rs. <?php echo htmlentities($row['productPrice']);?></span>
			</div>

			<div class="stock-box">
				<span class="">Add this clothing to your wish list: </span>
				<span><a class="btn btn-primary wishlist" data-toggle="tooltip" data-placement="right" title="Wishlist" href="product-details.php?pid=<?php echo htmlentities($row['id'])?>&&action=wishlist">
					<i class="fa fa-heart"></i>
				</a></span>
			</div>

			<div class="stock-box">
				<span class="">Availability :</span>
				<span class=""><?php echo htmlentities($row['productAvailability']);?></span>
			</div>	
			
			<div class="stock-box">
				<span class="">Product Brand :</span>
				<span class=""><?php echo htmlentities($row['productCompany']);?></span>
			</div>	
			
			<div class="stock-box">
				<span class="">Shipping Charge :</span>	
				<span class=""><?php if($row['shippingCharge']==0)
				{
					echo "Free";
				}
				else
				{
					echo htmlentities($row['shippingCharge']);
				}
				?></span>
			</div>	
			
			<div class="stock-box">
				<span class="">Quantity :</span>
				
				<div class="cart-quantity">
					<div class="quant-input">
						<div class="arrows">
							<div class="arrow plus gradient"><span class="ir"><i class="icon fa fa-sort-asc"></i></span></div>
							<div class="arrow minus gradient"><span class="ir"><i class="icon fa fa-sort-desc"></i></span></div>
						</div>
						<input type="text" value="1" name="quan" id="quan">
					</div>
				</div>
			</div>

			<div class="stock-box">
			<span class="">Available Sizes:</span><br>
				<div class="radio-toolbar">
					<input <?php if ($sizes1[0]=="" or $sizes1[0]==0){echo "disabled";}?> type="radio" id="radio0" name="radios" class="rad" value="XXS">
					<label <?php if ($sizes1[0]=="" or $sizes1[0]==0){echo "style='background:#f3f3f3;color:#666;text-decoration:line-through;'";}?> for="radio0">XXS</label>

					<input <?php if ($sizes1[1]=="" or $sizes1[1]==0){echo "disabled";}?> type="radio" id="radio1" name="radios" class="rad" value="XS">
					<label <?php if ($sizes1[1]=="" or $sizes1[1]==0){echo "style='background:#f3f3f3;color:#666;text-decoration:line-through;'";}?> for="radio1">XS</label>

					<input <?php if ($sizes1[2]=="" or $sizes1[2]==0){echo "disabled";}?> type="radio" id="radio2" name="radios" class="rad" value="S">
					<label <?php if ($sizes1[2]=="" or $sizes1[2]==0){echo "style='background:#f3f3f3;color:#666;text-decoration:line-through;'";}?> for="radio2">S</label>

					<input <?php if ($sizes1[3]=="" or $sizes1[3]==0){echo "disabled";}?> type="radio" id="radio3" name="radios" class="rad" value="M">
					<label <?php if ($sizes1[3]=="" or $sizes1[3]==0){echo "style='background:#f3f3f3;color:#666;text-decoration:line-through;'";}?> for="radio3">M</label>

					<input <?php if ($sizes1[4]=="" or $sizes1[4]==0){echo "disabled";}?> type="radio" id="radio4" name="radios" class="rad" value="L">
					<label <?php if ($sizes1[4]=="" or $sizes1[4]==0){echo "style='background:#f3f3f3;color:#666;text-decoration:line-through;'";}?> for="radio4">L</label>

					<input <?php if ($sizes1[5]=="" or $sizes1[5]==0){echo "disabled";}?> type="radio" id="radio5" name="radios" class="rad" value="XL">
					<label <?php if ($sizes1[5]=="" or $sizes1[5]==0){echo "style='background:#f3f3f3;color:#666;text-decoration:line-through;'";}?> for="radio5">XL</label>

					<input <?php if ($sizes1[6]=="" or $sizes1[6]==0){echo "disabled";}?> type="radio" id="radio6" name="radios" class="rad" value="XXL">
					<label <?php if ($sizes1[6]=="" or $sizes1[6]==0){echo "style='background:#f3f3f3;color:#666;text-decoration:line-through;'";}?> for="radio6">XXL</label>

					<input <?php if ($sizes1[7]=="" or $sizes1[7]==0){echo "disabled";}?> type="radio" id="radio7" name="radios" class="rad" value="XXXL">
					<label <?php if ($sizes1[7]=="" or $sizes1[7]==0){echo "style='background:#f3f3f3;color:#666;text-decoration:line-through;'";}?> for="radio7">XXXL</label>

				</div>
			</div>
<script>
	$(".rad").click(function(){
	var s=$(this).val();
  $(".wishlist").attr("href", "product-details.php?pid=<?php echo htmlentities($row['id'])?>&action=wishlist&sizes="+s);
});
</script>
			<div class="stock-box">
				<?php if($row['productAvailability']=='In Stock'){?>
					<input type="hidden" value="<?php echo $row['id']; ?>" name="hid_id">
				<input type="submit" name="submit" class="btn btn-primary fa fa-shopping-cart inner-right-vs" value=" ADD TO CART">
				<?php } else {?>
				<div class="action" style="color:red">Out of Stock</div>
				<?php } ?>
			</div>

			<div class="stock-box">
				<span class="">Share :</span>
				<span class="social-icons">
					<ul class="list-inline">
						<li><a class="fa fa-facebook" href="http://facebook.com/transvelo"></a></li>
						<li><a class="fa fa-twitter" href="#"></a></li>
						<li><a class="fa fa-linkedin" href="#"></a></li>
						<li><a class="fa fa-rss" href="#"></a></li>
						<li><a class="fa fa-pinterest" href="#"></a></li>
					</ul><!-- /.social-icons -->
				</span>
			</div>

			<div class="stock-box">
				<span class="">Description :</span>
				<div class="description">
				<p><?php echo $row['productDescription'];?></p>
				</div>
			</div>

</div>

</div>
</form>
</div>
				
<?php include('includes/footer.php');?>
<script>
	$("#image1").click(function(){
		//$('#image_main').slideUp(1000).removeAttr('class')
		$('#image_main').attr('src','admin/productimages/<?php echo htmlentities($row['id']);?>/<?php echo htmlentities($row['productImage1']);?>');
	});
	$("#image2").click(function(){
		//$('#image_main').hide(1000);
		$('#image_main').attr('src','admin/productimages/<?php echo htmlentities($row['id']);?>/<?php echo htmlentities($row['productImage2']);?>');
	});
	$("#image3").click(function(){
		//$('#image_main').hide(1000);
		$('#image_main').attr('src','admin/productimages/<?php echo htmlentities($row['id']);?>/<?php echo htmlentities($row['productImage3']);?>');
	});
</script>
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