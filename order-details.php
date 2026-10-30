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

	    <title>The Prime Ministress - Order History</title>
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
		<link rel="stylesheet" href="assets/css/font-awesome.min.css">
		<link href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,700' rel='stylesheet' type='text/css'>
		<link rel="shortcut icon" href="assets/images/favicon.png">
	<script language="javascript" type="text/javascript">
var popUpWin=0;
function popUpWindow(URLStr, left, top, width, height)
{
 if(popUpWin)
{
if(!popUpWin.closed) popUpWin.close();
}
popUpWin = open(URLStr,'popUpWin', 'toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=yes,resizable=no,copyhistory=yes,width='+600+',height='+600+',left='+left+', top='+top+',screenX='+left+',screenY='+top+'');
}

</script>

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
  overflow: scroll !important; /* Enable scroll if needed */
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
	min-height:250px;
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
	margin:10px;
	text-align: left; border: 1px solid #ccc; width:100%;
	min-height:120px; 
	position:relative;

}
.mycart1 input[type="checkbox"] {
	 accent-color:#000;
}
.mycart1 > div:first-child
{
	float:left;
	width:20%;
}	
.mycart1 > div:first-child img
{
	border:3px dashed #666; height:120px;
}
.mycart1 > div:last-child
{
	padding-right:5px;
	text-align:right;
	font-weight:500;  letter-spacing:1px; padding-top:0; font-size:12px;
}
.mycart1 >div> div>h3 a
{
color:#000;
}
.removeicon
{
	position:absolute;
	top:-10px;
	right:-10px;
	background: #fff;
	font-size:10px;
    border-radius: 5px;
    border: 2px solid #ccc;
    padding: 0px 3px;
}
.removeicon a
{
	color:#000;

	font-weight:600;
}
.removeicon a:hover
{
	color:#666; text-decoration:none;
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
    width: 40%;
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
.fontkink
{
	padding:0px 10px; border:1px solid #ccc;
}
.fontkink1
{
	padding:0px 10px; border:1px solid #ccc; background:#ccc;
}
</style>

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

		
		<?php 
$orderid=$_POST['orderid'];
$email=$_POST['email'];
$ret = mysqli_query($con,"select t.email,t.id from (select usr.email,odrs.id from users as usr join orders as odrs on usr.id=odrs.userId) as t where  t.email='$email' and (t.id='$orderid')");
$num=mysqli_num_rows($ret);
if($num>0)
{
$query=mysqli_query($con,"select products.productImage1 as pimg1,products.productName as pname,orders.productId as opid,orders.quantity as qty,products.productPrice as pprice,orders.paymentMethod as paym,orders.orderDate as odate,orders.id as orderid from orders join products on orders.productId=products.id where orders.id='$orderid' and orders.paymentMethod is not null");
$cnt=1;
while($row=mysqli_fetch_array($query))
{
?><div class="row">
		<div class="mycart1">
		
		<div class="first-div">
			<a class="entry-thumbnail" href="detail.html">
			    <img src="admin/productimages/<?php echo $row['opid'];?>/<?php echo $row['pimg1'];?>" alt="" width="84" height="146">
			</a>
		</div>	
		<div class="second-div">
			<div>
				
				<h3 class='cart-product-description'><a href="product-details.php?pid=<?php echo $row['opid'];?>">
				<?php echo $row['pname'];?></a></h3>
				
			</div>

			<div class="removeicon">
				<a href="javascript:void(0);" onClick="popUpWindow('track-order.php?oid=<?php echo htmlentities($row['orderid']);?>');" title="Click this order to see details" id="myBtn<?php echo $cnt;?>">
					Track
				</a>
			</div>
<!-- The Modal -->
<div id="myModal<?php echo $cnt;?>" class="modal">

  <!-- Modal content -->
   <div class="modal-content">
   <span class="close<?php echo $cnt;?>" style="cursor: pointer; font-size:26px;font-weight: bold; float:right;">&times;</span>
  <?php 
  $oid=$row['orderid']; 
  ?> 
   <script language="javascript" type="text/javascript">
function f2()
{
window.close();
}
function f3()
{
window.print(); 
}
</script>

<div style="text-align:left;"> 
 <form name="updateticket" id="updateticket" method="post"> 
<table width="100%" border="0" cellspacing="0" cellpadding="0">

    <tr height="50">
      <td colspan="2" class="fontkink2" style="padding:10px; background:#666; color:#fff;"><div class="fontpink2"> <b>Order Tracking Details !</b></div></td>
      
    </tr>
    <tr height="30">
      <td  class="fontkink1"><b>Order ID:</b></td>
      <td  class="fontkink1"><?php echo $oid;?></td>
    </tr>
    <?php 
	
$ret = mysqli_query($con,"SELECT * FROM ordertrackhistory WHERE orderId='$oid'");
$num=mysqli_num_rows($ret);
if($num>0)
{
while($row=mysqli_fetch_array($ret))
      {
     ?>
		
    
    
      <tr height="20">
      <td class="fontkink" ><b>At Date:</b></td>
      <td  class="fontkink"><?php echo $row['postingDate'];?></td>
    </tr>
     <tr height="20">
      <td  class="fontkink"><b>Status:</b></td>
      <td  class="fontkink"><?php echo $row['status'];?></td>
    </tr>
     <tr height="20">
      <td  class="fontkink"><b>Remark:</b></td>
      <td  class="fontkink"><?php echo $row['remark'];?></td>
    </tr>

   
    <tr>
      <td colspan="2"><hr /></td>
    </tr>
   <?php } }
else{
   ?>
   <tr>
   <td colspan="2"><br><br>Order Not Process Yet</td>
   </tr>
   <?php  }
$st='Delivered';
   $rt = mysqli_query($con,"SELECT * FROM orders WHERE id='$oid'");
     while($num=mysqli_fetch_array($rt))
     {
     $currrentSt=$num['orderStatus'];
   }
     if($st==$currrentSt)
     { ?>
   <tr><td colspan="2"><br><br><b>
      Product Delivered successfully </b></td>
   <?php } 
 
  ?>
</table>
 </form>
</div>


</div>
</div>

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

			<div>
				<div class="cart-product-quantity">
				Quantity: <?php echo $qty=$row['qty']; ?>
				</div>
				<div>		       
					<span style="">Price / Unit: </span>
					<span class="cart-grand-total-price"><?php echo $price=$row['pprice']; ?>  </span>
				</div>
				<div>		       
					<span style="">Payment Mode: </span>
					<span class="cart-grand-total-price"><?php echo $row['paym']; ?></span>
				</div>
				<div>		       
					<span style="">Grand Total: </span>
					<span class="cart-grand-total-price"><?php echo $qty*$price;?></span>
				</div>
				<div>		       
					<span style="">Ordered Date: </span>
					<span class="cart-grand-total-price"><?php echo $row['odate']; ?></span>
				</div>
				
			</div>
		</div>

		
		
		</div><!-- mycart1-->
	</div><!--row -->
		<?php $cnt=$cnt+1;} } else { ?>
				<div style="height:150px; text-align:center;"><h3>Either order id or  Registered email id is invalid</h3></div>
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