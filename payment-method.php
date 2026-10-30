  <?php 
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['login'])==0)
{   
header('location:login.php');
}
else{
	
	$order_id=$_SESSION['id'].rand();
	$string=$_SESSION['inserted'];
	// Split numerical characters
	preg_match_all('/\d+/', $string, $numbers);
	//print_r($numbers[0]);

	// Split alphabetical characters
	preg_match_all('/[a-zA-Z]+/', $string, $letters);
	//print_r($letters[0]); 


	$_SESSION['completed']=1;
	$i=0;
	
		if (isset($_POST['payment_id']) )
		//if ($_POST['paymethod']=="Online Payment")
		{
			//razor payment code
			for($s2=0;$s2<$_SESSION["incre"];$s2++)
			{
				$spid=$numbers[0][$s2];
				$ssizes=$letters[0][$s2];
				
				//given by razorpay 
				$payment_id=$_POST['payment_id'];

				mysqli_query($con,"update orders set transaction_id='".$payment_id."', paymentMethod='Online Payment', orderId='".$order_id."' where userId='".$_SESSION['id']."' and paymentMethod is null and sizes='$ssizes' and productId='$spid' and tempId='".$_SESSION['tempid']."'");
			
				//updating stock values
					$rquan=mysqli_query($con,"select * from orders where userId='".$_SESSION['id']."' and sizes='$ssizes' and productId='$spid' and tempId='".$_SESSION['tempid']."'");
					$nquan=mysqli_fetch_array($rquan);

					$rstock=mysqli_query($con,"select * from products where id='".$spid."'");
					$nstock=mysqli_fetch_array($rstock);
					$chk_size=explode(',', $nstock['sizes']);
					
					if ($ssizes=="XXS"){$pos=0;}
					if ($ssizes=="XS"){$pos=1;}
					if ($ssizes=="S"){$pos=2;}
					if ($ssizes=="M"){$pos=3;}
					if ($ssizes=="L"){$pos=4;}
					if ($ssizes=="XL"){$pos=5;}
					if ($ssizes=="XXL"){$pos=6;}
					if ($ssizes=="XXXL"){$pos=7;}
					
					$oldquan=$chk_size[$pos];
					$quan=$nquan['quantity'];
					$newquan=($oldquan)-($quan);
					$chk_size[$pos]=$newquan;
					$usizes=implode(',', $chk_size);
					
					mysqli_query($con,"update products set sizes ='$usizes' where id='$spid'");

			}
			unset($_SESSION['cart']);
			$_SESSION['completed']=0;
			$_SESSION["inserted"]="";
			header('location:order-placed.php');
		}

	if (isset($_POST['submit'])) {
		
		if ($_POST['paymethod']=="COD")
		{
			for($s=0;$s<$_SESSION["incre"];$s++)
			{
				$spid=$numbers[0][$s];
				$ssizes=$letters[0][$s];
				mysqli_query($con,"update orders set paymentMethod='".$_POST['paymethod']."', orderId='".$order_id."' where userId='".$_SESSION['id']."' and paymentMethod is null and sizes='$ssizes' and productId='$spid' and tempId='".$_SESSION['tempid']."'");
			
				//updating stock values
					$rquan=mysqli_query($con,"select * from orders where userId='".$_SESSION['id']."' and sizes='$ssizes' and productId='$spid' and tempId='".$_SESSION['tempid']."'");
					$nquan=mysqli_fetch_array($rquan);

					$rstock=mysqli_query($con,"select * from products where id='".$spid."'");
					$nstock=mysqli_fetch_array($rstock);
					$chk_size=explode(',', $nstock['sizes']);
					
					if ($ssizes=="XXS"){$pos=0;}
					if ($ssizes=="XS"){$pos=1;}
					if ($ssizes=="S"){$pos=2;}
					if ($ssizes=="M"){$pos=3;}
					if ($ssizes=="L"){$pos=4;}
					if ($ssizes=="XL"){$pos=5;}
					if ($ssizes=="XXL"){$pos=6;}
					if ($ssizes=="XXXL"){$pos=7;}
					
					$oldquan=$chk_size[$pos];
					$quan=$nquan['quantity'];
					$newquan=($oldquan)-($quan);
					$chk_size[$pos]=$newquan;
					$usizes=implode(',', $chk_size);
					
					mysqli_query($con,"update products set sizes ='$usizes' where id='$spid'");

			}
			unset($_SESSION['cart']);
			$_SESSION['completed']=0;
			$_SESSION["inserted"]="";
			header('location:order-placed.php');
		}
		else
		if ($_POST['paymethod']=="UPI")
		{
			 $upiid=$_POST['upiid'];
			 $reupiid=$_POST['reupiid'];
			if ($upiid=="" or $reupiid=="")
			{
				$i=1;
				$msg="Please enter the Transaction ID and Re-enter Transaction ID<br>";
				 
			}
			 else
			if ($upiid!="" and $reupiid!="" and $upiid==$reupiid)
			{
				for($s1=0;$s1<$_SESSION["incre"];$s1++)
				{
					$spid=$numbers[0][$s1];
					$ssizes=$letters[0][$s1];
					mysqli_query($con,"update orders set transaction_id='".$upiid."' , paymentMethod='".$_POST['paymethod']."', orderId='".$order_id."' where userId='".$_SESSION['id']."' and paymentMethod is null and sizes='$ssizes' and productId='$spid' and tempId='".$_SESSION['tempid']."'");
								
					//updating stock values
						$rquan=mysqli_query($con,"select * from orders where userId='".$_SESSION['id']."' and sizes='$ssizes' and productId='$spid' and tempId='".$_SESSION['tempid']."'");
						$nquan=mysqli_fetch_array($rquan);
		
						$rstock=mysqli_query($con,"select * from products where id='".$spid."'");
						$nstock=mysqli_fetch_array($rstock);
						$chk_size=explode(',', $nstock['sizes']);
						
						if ($ssizes=="XXS"){$pos=0;}
						if ($ssizes=="XS"){$pos=1;}
						if ($ssizes=="S"){$pos=2;}
						if ($ssizes=="M"){$pos=3;}
						if ($ssizes=="L"){$pos=4;}
						if ($ssizes=="XL"){$pos=5;}
						if ($ssizes=="XXL"){$pos=6;}
						if ($ssizes=="XXXL"){$pos=7;}
						
						$oldquan=$chk_size[$pos];
						$quan=$nquan['quantity'];
						$newquan=($oldquan)-($quan);
						$chk_size[$pos]=$newquan;
						$usizes=implode(',', $chk_size);
						
						mysqli_query($con,"update products set sizes ='$usizes' where id='$spid'");
				
				}
				unset($_SESSION['cart']);
				$_SESSION['completed']=0;
				$_SESSION["inserted"]="";
				header('location:order-placed.php');
			}
			else
			if ($upiid!=$reupiid)
			{
				$i=1;
				$msg="Please check the UPI transaction ID!<br>";
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
		<script>
$(document).ready(function(){
  $("#paybtn").click(function(){
  
	$("#payon").prop('checked', true);

	document.getElementById('payon').checked = true;

  });
});
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
				<li class='active'>Payment Method</li>
			</ul>
		</div><!-- /.breadcrumb-inner -->
	</div><!-- /.container -->
</div><!-- /.breadcrumb -->

<div class="body-content outer-top-bd">
	<div class="container">
		<div class="checkout-box faq-page inner-bottom-sm">
			<div class="row">
				<div class="col-md-12">
					<h2>Choose Payment Method</h2>
					<div class="panel-group checkout-steps" id="">
						<!-- checkout-step-01  -->
<div class="panel panel-default checkout-step-01">

	<!-- panel-heading -->
		<div class="panel-heading">
    	<h4 class="unicase-checkout-title">
	        <!--<a data-toggle="collapse" class="" data-parent="#accordion" href="#">-->
	         Pay through net banking / online method
	       <!-- </a>-->
	     </h4>
    </div>
    <!-- panel-heading -->

	<div id="" class="">

		<!-- panel-body  -->
	    <div class="panel-body">
			
	    <form name="payment" method="post">
			<div class="col-xs-12  col-sm-12 col-md-12 " style="margin-bottom:30px;">
				<!--<input type="radio" name="paymethod" value="OP" > Online Payment <br>-->
				<input id="payon" type="radio" name="paymethod" value="Online Payment" checked="checked"> Online Payment <br>
				<span style="padding:0px 0px; font-size:12px;">Please check and update your shipping address</span>

				<div id="online-razorpay">
<?php
$ruser=mysqli_query($con,"select * from users where id='".$_SESSION['id']."'");
$nuser=mysqli_fetch_array($ruser);

$ret=mysqli_query($con,"SELECT * FROM admin WHERE id=1");
$numt=mysqli_fetch_array($ret);
$kidd=$numt['idd'];

$original_string = 'Hello, World!';

// Base64 Decoding
$kidd = base64_decode($kidd);
//echo "Decoded: $decoded_string\n";


?>

<!-- razorpay payhment gateway-->
 	<!--<input type="text" name="name" id="name" placeholder="name"><br><br>-->
    <input type="hidden" name="amt" id="amt" value="<?php echo $_SESSION['tp'];?>">
    <input type="button" name="paybtn" id="paybtn" value="Pay Online" onclick="pay_now()" class="btn btn-primary"><br><br>
    </div>
	</div>

<!-- panel-heading -->
<div class="panel-heading">
    	<h4 class="unicase-checkout-title">
	        <!--<a data-toggle="collapse" class="" data-parent="#accordion" href="#">-->
			 Select any one of these Payment Method (Manual Gpay or COD)
	       <!-- </a>-->
	     </h4>
    </div>
    <!-- panel-heading -->
			<div class="col-xs-12  col-sm-12 col-md-12 payoption">
				
			<input type="radio" name="paymethod" value="UPI"> Scan & Pay with any UPI app <br>
				<div style="font-size:12px; padding:0px">
				<img src="img/razor_pay1.png" width="100">
				<br><img src="img/upi-app.png" height="15">
				<br><span style="padding:0px 50px;">(or)</span>
				<br>UPI ID: suganya.devi.sd@okhdfcbank
				<hr style="background:#999;">
				<span id="msg" class="blink_me" style="font-size:12px; color:red;"><?php echo $msg;?></span>
				After Payment, Enter the UPI transaction ID
				<br><input type="text" name="upiid" placeholder="UPI TRANSACTION ID" style="height:20px; width:80%;">
				<br><input type="text" name="reupiid" placeholder="RE-ENTER UPI TRANSACTION ID" style="height:20px; width:80%;">
				</div>
			</div>
	
			<div class="col-xs-12  col-sm-12 col-md-12 payoption">
				<input type="radio" name="paymethod" value="COD"> Pay/Cash On Delivery <br>
				<span style="padding:0px 0px; font-size:12px;">Please check and update your shipping address</span>
				
				<div class="col-xs-12  col-sm-12 col-md-12  text-right" >
				<input type="submit" value="Place Order" name="submit" class="btn btn-primary">
				</div>
			</div>
			

			
		</form>		
		</div>
		<!-- panel-body  -->

	</div><!-- row -->
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

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>

    <script>
        function pay_now()
        {
			
           // var name=jQuery('#name').val();
            var amt=jQuery('#amt').val();
			var pm='Online Payment';

            jQuery.ajax({
                type: 'post',
                url: 'payment-method.php',
                data: "amt="+amt+"&paymentMethod="+pm,

                success:function(result){
					//alert('hi');
                    var options={
                        "key": "<?php echo $kidd;?>", 
                        "amount": amt*100,
                        "currency": "INR",
                        "name": "The Prime Ministress Clothing", //your business name
                        "description": "Transaction is processing",
                        "image": "https://theprimeministressclothing.com/img/logo.png",
                       
                        "handler":function(response){
                            jQuery.ajax({
                                type: 'post',
                                url: 'payment-method.php',
                                data: "payment_id="+response.razorpay_payment_id,
                                success:function(result){
                                    window.location.href="order-placed.php";
                                }
                            });
                        }
                    };
                    var rzp1=new Razorpay(options);
                    rzp1.open();
                }
            });
        }
    </script>
	<!-- razorpay payhment gateway-->
	
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
<?php } ?>