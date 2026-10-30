<?php 
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['login'])==0)
    {   
header('location:login.php');
}
else{

if (isset($_POST['updatetransactionid'])) {
	 $upiid=$_POST['upiid'];
	 $hiddenid=$_POST['hiddenid'];
	mysqli_query($con,"update orders set transaction_id='".$upiid."' where id='".$hiddenid."'");
	$msg="Your transaction ID (".$upiid.") is updated, Once verified your order will be processed";
	//echo "<script>alert('".$msg."')</script>";
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
.fontkink1,.fontkink
{
	vertical-align:top !important;
}
.blink_me {
  animation: blinker 1s linear infinite;
  color:red;
}

@keyframes blinker {
  50% {
    opacity: 0;
  }
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
				<li class='active'>Your Orders</li>
			</ul>
		</div><!-- /.breadcrumb-inner -->
	</div><!-- /.container -->
</div><!-- /.breadcrumb -->





<div class="body-content outer-top-xs">
	<div class="container">
	<h3 style="">Your Order History</h3>	
	<br>
	<div id="msg" class="blink_me"><?php echo $msg;?></div>
		<?php $query=mysqli_query($con,"select products.productImage1 as pimg1,products.productName as pname,products.id as proid,orders.productId as opid,orders.quantity as qty,orders.sizes as psize,products.productPrice as pprice,products.shippingCharge as shippingcharge,orders.paymentMethod as paym,orders.orderDate as odate,orders.upiScanStatus as orderupiScanStatus, orders.id as orderid from orders join products on orders.productId=products.id where orders.userId='".$_SESSION['id']."' and orders.paymentMethod is not null");
		$cnt=1;
		while($row=mysqli_fetch_array($query))
		{
			$orderupiScanStatus=$row['orderupiScanStatus'];
		?>
				
			<div class="row">
		
					
					
						<div class="col-xs-1 col-sm-4 col-md-4 order-list">
						<div><a class="entry-thumbnail" href="detail.html">
						    <img src="admin/productimages/<?php echo $row['proid'];?>/<?php echo $row['pimg1'];?>" alt="" height="100">
						</a></div>
						</div>

						<div class="col-xs-1 col-sm-4 col-md-4 order-list" style="font-size:12px; font-weight:600;">
						<div><a href="product-details.php?pid=<?php echo $row['opid'];?>">
							<?php echo $row['pname'];?>
							<br>
							Size: <?php echo $row['psize'];?>
						</a></div>
						</div>	
					
						<div class="col-xs-1 col-sm-4 col-md-4 order-list" style="text-align:right;">
						<div><a href="javascript:void(0);" onClick="popUpWindow('track-order.php?oid=<?php echo htmlentities($row['orderid']);?>');" title="Click this order to see details" id="myBtn<?php echo $cnt;?>">
							Track
						</a></div>
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
					<th class="cart-qty item">Size</th>
					<td class="cart-product-quantity">
						<?php echo $psize=$row['psize']; ?>   
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
				<tr height="50">
      <td colspan="2" class="fontkink2" style="padding-left:0px;font-size:14px;"><div class="fontpink2"> <b>Order Tracking Details !</b></div></td>
      
    </tr>
    <tr height="30">
      <td  class="fontkink1"><b>Order ID:</b></td>
      <td  class="fontkink"><?php echo $row['orderid'];?></td>
    </tr>
<?php 
$ret1 = mysqli_query($con,"SELECT * FROM ordertrackhistory WHERE orderId='".$row['orderid']."'");
$num1=mysqli_num_rows($ret1);
if($num1>0)
{
while($row1=mysqli_fetch_array($ret1))
      {
     ?>
		
    
    
      <tr height="">
      <td class="fontkink1" ><b>At Date:</b></td>
      <td  class="fontkink"><?php echo $row1['postingDate'];?></td>
    </tr>
     <tr height="">
      <td  class="fontkink1"><b>Status:</b></td>
      <td  class="fontkink"><?php echo $row1['status'];?></td>
    </tr>
     <tr height="">
      <td  class="fontkink1"><b>Remark:</b></td>
      <td  class="fontkink">
	  	<form name="payment" method="post">
		<?php 
		echo $row1['remark'];
		if ($row1['status']=="Transaction ID is not valid")
		{
		?>
		<br><br>Please enter your valid transaction ID:
		<input type="hidden" value="<?php echo  $row1['orderId'];?>" name="hiddenid">
		<br><input type="text" name="upiid" placeholder="UPI TRANSACTION ID" style="height:20px; width:220px;">
		<br><br><input type="submit" class="btn btn-primary" name="updatetransactionid" value="Update Transaction ID">
		<?php
		}		
		?>
		</form>
		</td>
    </tr>

   
    <tr>
      <td colspan="2"><hr /></td>
    </tr>
   <?php } }
else{
   ?>
   <tr>
   <td colspan="2">Order Not Process Yet</td>
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
   <tr><td colspan="2"><b>
      Product Delivered successfully </b></td>
   <?php } 
 
  ?>


				
		</table>
	
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

		<?php
		$cnt=$cnt+1;}
		?>

				

		
	


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