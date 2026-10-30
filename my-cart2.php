<?php 
session_start();
error_reporting(0);
include('includes/config.php');

$_SESSION["alertmsg"]="";
if(isset($_POST['submit'])){
	//echo "<script>alert('in=".$_SESSION["incre"].$_SESSION["qnty"]."');</script>";
	if(!empty($_SESSION['cart'])){
			
		if ($_SESSION["incre"]==0)
		{
			$_SESSION['qnty']=0;
			
			//echo "<script>alert('".$_SESSION["qnty"]."');</script>";
			echo "<script type='text/javascript'> document.location ='my-cart.php'; </script>";
			
		}
		else
		{
		for($s=1;$s<=$_SESSION["incre"];$s++){
			
			//$key1=explode("_",$key);
			$siz=$_POST["size_hidden".$s];
			$quan=$_POST["quantity".$s];
			$key=$_POST["pid".$s];
			//echo "<script>alert('s=".$s."siz=".$siz."key=".$key."session quantity=".$_SESSION["qnty"]."quantity=".$quan."');</script>";
			if($quan==0){
				unset($_SESSION['cart'][$key][$siz]);
				
			}else{
					$_SESSION['cart'][$key][$siz]=$quan;
					$_SESSION["alertmsg"]="Your Cart has been Updated";
					echo "<script type='text/javascript'> document.location ='my-cart.php'; </script>";
			}
		}
	}
}
}

	// Code for Remove a Product from Cart
if(isset($_POST['remove_code']))
	{

if(!empty($_SESSION['cart'])){
		foreach($_POST['remove_code'] as $key){
			$key1=explode("_",$key);
				unset($_SESSION['cart'][$key1[0]][$key1[1]]);
				echo "<script type='text/javascript'> document.location ='my-cart.php'; </script>";
				
			}
			
	}
}
// code for insert product in order table


if(isset($_POST['ordersubmit'])) 
{
	
if(strlen($_SESSION['login'])==0)
    {   
header('location:login.php');
}
else
$query_chk_billing=mysqli_query($con,"select * from users where id='".$_SESSION['id']."'");
$row_chk_billing=mysqli_fetch_array($query_chk_billing);

$shippingAddress=$row_chk_billing["shippingAddress"];
$shippingState=$row_chk_billing["shippingState"];
$shippingCity=$row_chk_billing["shippingCity"];
$shippingPincode=$row_chk_billing["shippingPincode"];
$billingAddress=$row_chk_billing["billingAddress"];
$billingState=$row_chk_billing["billingState"];
$billingCity=$row_chk_billing["billingCity"];
$billingPincode=$row_chk_billing["billingPincode"];

 if ($shippingAddress=="" or $shippingCity=="" or $shippingPincode=="" or $billingAddress=="" or $billingState=="" or $billingCity=="" or $billingPincode=="")
{
	echo "<script>alert('Please, Enter all the details in the Billing and Shipping Address! and Click UPDATE Button');</script>";
}
else{

	for($s=1;$s<=$_SESSION["incre"];$s++)
	{
		$quantity=$_POST['quantity'.$s];
		$sizes=$_POST['size_hidden'.$s];
		$pid=$_POST['pid'.$s];
		//$pdd=$_SESSION['pid'];
		
		$_SESSION['randnum']=rand();
		if ($_SESSION['completed']==2)
		{$_SESSION['completed']=2;}
		else
		{$_SESSION['completed']=1;}
		
		//echo "<script>alert('".$_SESSION['randnum']."');</script>";
		if ($_SESSION['completed']==1){
		mysqli_query($con,"insert into orders(userId,productId,quantity,sizes,randnum) values('".$_SESSION['id']."','$pid','$quantity','$sizes','".$_SESSION['randnum']."')");
		}
		header('location:payment-method.php');
		
	}


//sizes
//foreach($svalue as $spid=> $ssizes){
//	mysqli_query($con,"update orders sizes='$ssizes' where userId='".$_SESSION['id']."' and productId='$spid'");
//}
}
}

// code for billing address updation
	if(isset($_POST['update']))
	{
		$baddress=$_POST['billingaddress'];
		$bstate=$_POST['bilingstate'];
		$bcity=$_POST['billingcity'];
		$bpincode=$_POST['billingpincode'];
		$query=mysqli_query($con,"update users set billingAddress='$baddress',billingState='$bstate',billingCity='$bcity',billingPincode='$bpincode' where id='".$_SESSION['id']."'");
		if($query)
		{
echo "<script>alert('Billing Address has been updated');</script>";
		}
	}


// code for Shipping address updation
	if(isset($_POST['shipupdate']))
	{
		$saddress=$_POST['shippingaddress'];
		$sstate=$_POST['shippingstate'];
		$scity=$_POST['shippingcity'];
		$spincode=$_POST['shippingpincode'];
		$query=mysqli_query($con,"update users set shippingAddress='$saddress',shippingState='$sstate',shippingCity='$scity',shippingPincode='$spincode' where id='".$_SESSION['id']."'");
		if($query)
		{
echo "<script>alert('Shipping Address has been updated');</script>";
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

	    <title>The Prime Ministress - My Cart</title>
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

	</head>
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
.mycart1
{
	clear:both;
	text-align: left; border: 1px solid #ccc; width:100%;
	min-height:120px; 
	position:relative;
	margin-top:15px;
}
.mycart1 input[type="checkbox"] {
	 accent-color:#000;
	 vertical-align: bottom;
}
.mycart1 > div:first-child
{
	float:left;
	width:50%;
}
.mycart1 > div:first-child img
{
	border:3px dashed #666; height:120px;
}
.mycart1 > div:last-child
{
	padding-right:5px;
	text-align:right;
	font-weight:500;  letter-spacing:1px; padding-top:15px; font-size:12px;
}
.mycart1 >div> div>h3 a
{
color:#000;
}
.removeicon 
{
	position:absolute;
	top:-5px;
	right:-10px;
	background:#fff;
	font-weight:700;
	padding:0px ;
	font-size:10px;
	color:#999;
	margin:-3px;
}
.switch {
  position: relative;
  display: inline-block;
  width: 25px;
  height: 14px;
}

.switch input { 
  opacity: 0;
  width: 0;
  height: 0;
}

.slider {
  position: absolute;
  cursor: pointer;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: #b63434;
  -webkit-transition: .4s;
  transition: .4s;
}

.slider:before {
  position: absolute;
  content: "";
  height: 7px;
  width: 7px;
  left: 4px;
  bottom: 4px;
  background-color: white;
  -webkit-transition: .4s;
  transition: .4s;
}

input:checked + .slider {
  background-color: #ccc;
}

input:focus + .slider {
  box-shadow: 0 0 1px #2196F3;
}

input:checked + .slider:before {
  -webkit-transform: translateX(8px);
  -ms-transform: translateX(8px);
  transform: translateX(8px);
}

.arrows
{
	position:absolute;top:0; right:5px;
}
@media (max-width: 350px) {
	.mycart1
{
	text-align: center; border: 1px solid #ccc; width:100%; padding:10px;

}
.mycart1 > div:first-child 
{
	clear:both !important;
	width:100%;
	
}
.mycart1 > div:first-child img {
    border: 3px dashed #666;
    width: 90%;
    height: inherit;
}
.mycart1 > div:last-child {
   
     text-align: center;
    font-weight: 500;
    letter-spacing: 1px;
    padding-top: 15px;
    font-size: 12px;
}	
.mycart1 input
{
	width:100% !important;
}
.arrows
{
	top:18px !important;

}
}
@media (min-width: 650px) {
	.mycart1 > div:last-child {
		padding-top:0px !important;
	}
	
.first-div
{
	width:20% !important;
}
.second-div > div:first-child
{
	float:left; 
}
.second-div > div:first-child a

{
	line-height:70px; text-align:center !important;
}
.second-div > div:last-child
{
	float:right; padding-top:10px; font-weight:500; text-align:left; letter-spacing:1px;
}
.arrows
{
	position:absolute;top:0; right:60px;
}
}
</style>
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
				<li class='active'>My Cart</li>
			</ul>
		</div><!-- /.breadcrumb-inner -->
	</div><!-- /.container -->
</div><!-- /.breadcrumb -->

<div class="body-content outer-top-xs">
	<div id="" style="color:red; text-align:center; "><?php // if (isset($_GET["msg"])){echo $_GET["msg"];}echo $msg;
	echo $_SESSION["alertmsg"];?></div>
	<div class="container">

<form name="cart" method="post">	
<?php
if(!empty($_SESSION['cart'])){
	?>



<?php
if(!empty($_SESSION['cart'])){
?>
 <?php
 $pdtid=array();
   /* $sql = "SELECT * FROM products WHERE id IN(";
			foreach($_SESSION['cart'] as $id => $value){
			$sql .=$id. ",";
			}
			$sql=substr($sql,0,-1) . ") ORDER BY id ASC";
			$query = mysqli_query($con,$sql);
			$totalprice=0;
			$totalqunty=0;
			if(!empty($query)){
				$j=1;
				while($row = mysqli_fetch_array($query)){
				$quantity=$_SESSION['cart'][$row['id']]['quantity'];
				echo $sizes1=$_SESSION['cart'][$row['id']]['sizes'];
				$subtotal= $_SESSION['cart'][$row['id']]['quantity']*$row['productPrice']+$row['shippingCharge'];
				$totalprice += $subtotal;
				$_SESSION['qnty']=$totalqunty+=$quantity;
*/
 
			$totalprice=0;
			$totalqunty=0;
			
			$i=1;
				foreach ($_SESSION['cart'] as $id => $sizes1) {
					
					foreach ($sizes1 as $size => $quantity) {
						$query = mysqli_query($con,"SELECT * FROM products WHERE id=".$id);
						$row = mysqli_fetch_array($query);
						//echo $id;
						//echo $size;
						//echo $quantity;
				
						if(!empty($query)){
				$subtotal= $quantity*$row['productPrice']+$row['shippingCharge'];
				$totalprice += $subtotal;
				$_SESSION['qnty']=$totalqunty+=$quantity;
?>
<?php
				array_push($pdtid,$row['id']);
//print_r($_SESSION['pid'])=$pdtid;exit;
	

	?>
<div class="mycart1">
		
		<div class="first-div">
			<a class="entry-thumbnail" href="detail.html">
				<img src="admin/productimages/<?php echo $id;?>/<?php echo $row['productImage1'];?>" alt="" height="100">
			</a>
		</div>	
		<div class="second-div">
			<div>
				<h3>
					<a href="product-details.php?pid=<?php echo htmlentities($pd=$id);?>" ><?php echo $row['productName'];
					$_SESSION['sid']=$pd;?></a>
				</h3>
			</div>

			<div class="removeicon">Remove & Update
<label class="switch">
<input type="checkbox" name="remove_code[]" value="<?php echo htmlentities($id."_".$size);?>" >
<span class="slider"></span>
</label>
				
			</div>
			<div>
				<div class="cart-product-quantity">
					<div class="quant-input" style="position:relative;">
						Quantity:
							<div class="arrows" style="">
							<div class="arrow plus gradient" style="height:6px;"><span class="ir"><i class="icon fa fa-sort-asc"></i></span></div>
							<div class="arrow minus gradient"><span class="ir"><i class="icon fa fa-sort-desc"></i></span></div>
							</div>
						<input type="text" style="width:30px;" value="<?php 
						echo $quantity;?>" name="quantity<?php echo $i; ?>">
					</div>
				</div>
				<div>		       
					<span style="">Sizes: </span>
					<span class="cart-grand-total-price">
					<input type="hidden" name="size_hidden<?php echo $i;?>" value="<?php echo $size;?>" >
					<input type="hidden" name="pid<?php echo $i;?>" value="<?php echo $id;?>" >
						
						
						<?php 
						
						echo $size; 

						
					//	echo $_SESSION['cart'][$row['id']]['sizes']; 
						?>
						</span>
				</div>
				<div>		       
					<span style="">Price / Unit: </span>
					<span class="cart-grand-total-price"><?php echo "Rs"." ".$row['productPrice']; ?>.00</span>
				</div>
				<div>		       
					<span style="">Shipping: </span>
					<span class="cart-grand-total-price"><?php echo "Rs"." ".$row['shippingCharge']; ?>.00</span></span>
				</div>
				<div>		       
					<span style="">Grand Total: </span>
					<span class="cart-grand-total-price"><?php echo ($quantity*$row['productPrice']+$row['shippingCharge']); ?>.00</span>
				</div>
			</div>
		</div>


</div>
								
								<?php
$i++;
}
} 
}
$_SESSION['pid']=$pdtid;
}
$_SESSION["incre"]=$i-1;
if ($_SESSION["incre"]==0){echo '<script>document.getElementById("quan-count").innerHTML="'.$_SESSION["incre"].'";</script>';$_SESSION['qnty']=0;unset($_SESSION['cart']);}
//echo $_SESSION['qnty'];
?>
<input type="hidden" id="hid" name="hid" value="">
<div class="" style="clear:both; width:100%; margin:auto;margin-top:10px;">
	<div style="float:left; width:40%;">
		<a href="index.php" class="btn btn-primary">Resume Shopping</a>
	</div>
	<div style="float:right; text-align:right; width:40%;">
		<?php //if ($_SESSION["incre"]!=0){?><input type="submit" name="submit" value="Update Cart" class="btn btn-primary"><?php //}?>
	</div>
</div><!-- /.shopping-cart-btn -->


<div style="clear:both; "><br><br></div>


<div class="row inner-bottom-sm" style="clear:both;">
			<div class="shopping-cart">
				
			<div class="col-xs-12 col-md-4 col-sm-12 estimate-ship-tax">
	<table class="table table-bordered">
		<thead>
			<tr>
				<th>
					<span class="estimate-title">Shipping Address</span>
				</th>
			</tr>
		</thead>
		<tbody>
				<tr>
					<td>
						<div class="form-group">
<?php
$query=mysqli_query($con,"select * from users where id='".$_SESSION['id']."'");
while($row=mysqli_fetch_array($query))
{
?>

<div class="form-group">
					    <label class="info-title" for="Billing Address">Billing Address<span>*</span></label>
					    <textarea class="form-control unicase-form-control text-input"  name="billingaddress" required="required"><?php echo $row['billingAddress'];?></textarea>
					  </div>



						<div class="form-group">
					    <label class="info-title" for="Billing State ">Billing State  <span>*</span></label>
			 <input type="text" class="form-control unicase-form-control text-input" id="bilingstate" name="bilingstate" value="<?php echo $row['billingState'];?>" required>
					  </div>
					  <div class="form-group">
					    <label class="info-title" for="Billing City">Billing City <span>*</span></label>
					    <input type="text" class="form-control unicase-form-control text-input" id="billingcity" name="billingcity" required="required" value="<?php echo $row['billingCity'];?>" >
					  </div>
 <div class="form-group">
					    <label class="info-title" for="Billing Pincode">Billing Pincode <span>*</span></label>
					    <input type="text" class="form-control unicase-form-control text-input" id="billingpincode" name="billingpincode" required="required" value="<?php echo $row['billingPincode'];?>" >
					  </div>


					  <button type="submit" name="update" class="btn-upper btn btn-primary checkout-page-button">Update</button>
			
					<?php } ?>
		
						</div>
					
					</td>
				</tr>
		</tbody><!-- /tbody -->
	</table><!-- /table -->
</div>

<div class="col-xs-12 col-md-4 col-sm-12 estimate-ship-tax">
	<table class="table table-bordered">
		<thead>
			<tr>
				<th>
					<span class="estimate-title">Billing Address</span>
				</th>
			</tr>
		</thead>
		<tbody>
				<tr>
					<td>
						<div class="form-group">
		<?php
$query=mysqli_query($con,"select * from users where id='".$_SESSION['id']."'");
while($row=mysqli_fetch_array($query))
{
?>

<div class="form-group">
					    <label class="info-title" for="Shipping Address">Shipping Address<span>*</span></label>
					    <textarea class="form-control unicase-form-control text-input"  name="shippingaddress" required="required"><?php echo $row['shippingAddress'];?></textarea>
					  </div>



						<div class="form-group">
					    <label class="info-title" for="Billing State ">Shipping State  <span>*</span></label>
			 <input type="text" class="form-control unicase-form-control text-input" id="shippingstate" name="shippingstate" value="<?php echo $row['shippingState'];?>" required>
					  </div>
					  <div class="form-group">
					    <label class="info-title" for="Billing City">Shipping City <span>*</span></label>
					    <input type="text" class="form-control unicase-form-control text-input" id="shippingcity" name="shippingcity" required="required" value="<?php echo $row['shippingCity'];?>" >
					  </div>
 <div class="form-group">
					    <label class="info-title" for="Billing Pincode">Shipping Pincode <span>*</span></label>
					    <input type="text" class="form-control unicase-form-control text-input" id="shippingpincode" name="shippingpincode" required="required" value="<?php echo $row['shippingPincode'];?>" >
					  </div>


					  <button type="submit" name="shipupdate" class="btn-upper btn btn-primary checkout-page-button">Update</button>
					<?php } ?>

		
						</div>
					
					</td>
				</tr>
		</tbody><!-- /tbody -->
	</table><!-- /table -->
</div>
<div class="col-xs-12 col-md-4 col-sm-12 cart-shopping-total">
	<table class="table table-bordered">
		<thead>
			<tr>
				<td>
					
					
						<div style="color:#b63434;font-size:16px; font-weight:500; text-align:center;">
							Grand Total: <?php echo $_SESSION['tp']="$totalprice". ".00"; ?>
						</div>
					
				</td>
			</tr>
		</thead><!-- /thead -->
		<tbody>
				<tr>
					<td  style="text-align:center;">
							<button type="submit" name="ordersubmit" class="btn btn-primary">PROCCED TO CHEKOUT</button>
						
					</td>
				</tr>
		</tbody><!-- /tbody -->
	</table>
	<?php } else {
echo "<div style='height:150px;text-align:center;'><h3>Your shopping Cart is empty</h3></div>";
		}
		
		?>
</div>			</div>
		</div> 
		</form>
<?php //echo include('includes/brands-slider.php');?>
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