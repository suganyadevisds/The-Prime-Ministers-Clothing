<?php
session_start();
error_reporting(0);

include('includes/config.php');



$msg="";
if (isset($_POST["submit"]))
{
	$designs=$_POST["designs"];
	$fabric=$_POST["fabric"];
		
		if (isset($_POST["fabric2"]))
		{
			$fabric2=$_POST["fabric2"];
		}
		else
		{
			$fabric2="0";
		}

	$sizes=$_POST["radios"];

	if ($designs!="" && $fabric!="" && $fabric2!="" && $sizes!="")
		{
			echo "<script>alert('Enter')</script>";
		}
	else
		{
//	echo "<script>alert('Designs=".$designs."Fabric=".$fabric."Fabric 2=".$fabric2."Sizes=".$sizes."')</script>";
	mysqli_query($con,"insert into custom(designs_id,fabric_id_1,fabric_id_2,size,status) values('".$designs."','".$fabric."','".$fabric2."','".$sizes."','Initialized')");
	$msg="Order Placed...";
	echo "<script type='text/javascript'> document.location ='custom1.php?msg='".$msg."#msgg' </script>";
		}
	//header("Location: custom1.php?msg=".$msg."#msg");
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

	    <title>The Prime Ministress - Clothing : Customize your designs</title>

	    <!-- Bootstrap Core CSS -->
	    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
	    
	    <!-- Fonts CSS -->
	    <link rel="stylesheet" href="assets/css/fonts.css">

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
		<link rel="stylesheet" href="assets/css/font-awesome.min.css">
		<link href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,700' rel='stylesheet' type='text/css'>
		
		<!-- Favicon -->
		<link rel="shortcut icon" href="assets/images/favicon.png">
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

		<!-- ============================================== HEADER ============================================== -->
<header class="header-style-1 bgcolor">
<?php include('includes/top-header.php');?>
<?php include('includes/main-header.php');?>
<?php include('includes/menu-bar.php');?>
</header>



<!-- ============================================== HEADER : END ============================================== -->
<div class="body-content " id="top-banner-and-menu">
	<div class=""><!--container-->
		<div class="furniture-container homepage-container">
		<div class="row">
		
			
			<div class="col-xs-12 col-sm-12 col-md-12 homebanner-holder">
				<!-- ========================================== SECTION – HERO ========================================= -->
			
<div id="hero" class="" style="padding:0px; margin:0px; vertical-align:top;">
	<div id="owl-main" class="owl-carousel owl-inner-nav owl-ui-sm" style="height:auto !important;">
		<div class="full-width-slider">	
			<div class="" >
				<!-- /.container-fluid --><img src="img/customize_banner1.png" width="100%">
			</div><!-- /.item -->
		</div><!-- /.full-width-slider -->
	    
	    <div class="full-width-slider">
			<div class="" style="background-image: url(img/customize_banner2.png); background-size:100%;  background-repeat:no-repeat;">
			<img src="img/customize_banner2.png" width="100%" height="100%">
			</div><!-- /.item -->
		</div><!-- /.full-width-slider -->

	</div><!-- /.owl-carousel -->
</div>
			
<!-- ========================================= SECTION – HERO : END ========================================= -->	
</div><!-- /.homebanner-holder -->
			
</div><!-- /.row -->


<div class="breadcrumb">
	<div class="container">
		<div class="breadcrumb-inner">
			<ul class="list-inline list-unstyled">
				<li><a href="#">Home</a></li>
				<li class='active'>Customize</li>
			</ul>
		</div><!-- /.breadcrumb-inner -->
	</div><!-- /.container -->
</div><!-- /.breadcrumb -->

<!--<div id="msg" style="color:red; text-align:center; "><?php if (isset($_GET["msg"])){echo $_GET["msg"];}?></div>-->
<style>
.customs
{
	text-align:left;
}
 .custom-div
 {
	padding:5px;
	margin:5px;
	width:100%;
	float:left;
	height:inherit;
	background:#f9f9f9;
	border:1px solid #ccc;
 }
 .custom-div h6
 {
	text-decoration:underline;
	font-weight:700;
	font-size:10px;
 }
.img-btn img{
  width:150px;
  height:inherit;
  
}
.img-btn > input{
  display:none
}
.img-btn > img{
  cursor:pointer;
  border:5px solid #b1b1b1;
}
.img-btn > input:checked + img{
  border-color: black;
  border-radius:10px;
}
#design_zoom, #fabric_zoom, #fabric2_zoom
{
	border:4px solid #1b1b1b;
}
.codefont
{
	font-size:10px;
	color: #a21a1a;
	text-align:center;
}
#msg
{
	text-align:center;
	font-size:20px;
	font-weight:bold;
}
#popupdiv
	{
		display:none;
	}
@media (min-width:1000px)
	{
	#popupdiv
	{
		display:block;
	}
	.img-btn img{
	width:100px;
	height:inherit;
	
	}
	}
</style>


<div class="container-fluid" id="msgg">
	<div id="msg"><?php echo $_GET['msg'];?></div>
<div class="customs">

<h3>CUSTOMIZE YOUR DESIGNS</h3>

<form method="post" enctype="multipart/form-data">

<div class="custom-div">
<h6>SELECT THE DESIGN</h6>

<div style="position: relative;" id="mod"> 

<?php 
$query=mysqli_query($con,"select * from model where status='In Stock'");
$cnt=1;
while($row=mysqli_fetch_array($query))
{
$mid=$row['id'];
$noOfFabrics=$row['noOfFabrics'];
$mcode=$row['mcode'];
$modelPrice=$row['modelPrice'];

?>
	<label class="img-btn">
			<input type="hidden" name="noOfFabrics<?php echo $mid;?>" value="<?php echo $noOfFabrics;?>">
            <input type="radio" name="designs"  value="<?php echo $mid;?>">
            <img src="admin/modelimages/<?php echo htmlentities($mid);?>/<?php echo htmlentities($row['modelimage1']);?>" alt="<?php echo htmlentities($row['modelname']);?>"  id="design_<?php echo $mid;?>">
			<div>Code: <span class="codefont"><?php echo $mcode;?></span></div>
    </label>

<script>
$(document).ready(function(){
	
	//design
	$("#design_<?php echo $mid;?>").click(function(){
		<?php
		if ($noOfFabrics==2)
			{
				?>
				$("#sec_fab").css("display", "block");
				<?php
			}
			else
				{
				?>
				$("#sec_fab").css("display", "none");
				<?php
				}
		?>

		//alert('hi');
		$("#fabric_zoom").hide(500);
		$("#fabric2_zoom").hide(500);

		var im=$('#design_<?php echo $mid;?>').attr('src');
		$('#design_zooming').attr('src',im);
		$("#design_zoom").css("z-index", 1);
		$("#design_zoom").append('<div id="childDiv<?php echo $mid;?>">Close</div>');
		$('#childDiv<?php echo $mid;?>').css({'position': 'relative','color':'white','font':'20px bold','background':'#550909','padding':'10px'}); 
		$('#childDiv<?php echo $mid;?>').css({'position': 'absolute','top': '0','right': '0'});
		$("#design_zoom").css({ "width": "30%"});
		$("#design_zoom").show(700);
		//document.querySelector("design_zoom").requestFullscreen();
	});

	$("#design_zoom").click(function(){
		
		$("#design_zoom").hide(500);
		
	});

});
</script>

<?php
}
?>
	<script>
	
	</script>
	<div id="popupdiv" >
	<div id="design_zoom" style="display:none;height:100%; width:auto; position: fixed;top: 50%;	left: 80%;margin-right: -50%;transform: translate(-50%, -50%);">
		<img id="design_zooming" style="border:1% solid #000;" src="" height="100%" width="100%">
	</div>
	<div id="fabric_zoom" style="display:none;height:100%;position: fixed;top: 50%;	left: 80%;margin-right: -50%;transform: translate(-50%, -50%);">
		<img id="fabric_zooming" style="border:1% solid #000;" src="" height="100%" width="100%">
	</div>
	<div id="fabric2_zoom" style="display:none;height:100%;position: fixed;top: 50%;	left: 80%;margin-right: -50%;transform: translate(-50%, -50%);">
		<img id="fabric2_zooming" style="border:1% solid #000;" src="" height="100%" width="100%">
	</div>
	</div>

</div>   
		
</div>


<div class="custom-div" style="border-top:1px solid #999;">

<h6>SELECT THE FABRIC</h6>
<div style="position: relative;" id="fab">

<?php 
$query1=mysqli_query($con,"select * from fabrics where status='In Stock'");
$cnt=1;
while($row1=mysqli_fetch_array($query1))
{
$fid=$row1['id'];
$fcode=$row1['fcode'];
$price=$row1['price'];
?>

	<label class="img-btn">
            <input type="radio" name="fabric" value="<?php echo $fid;?>">
            <img src="admin/fabricimages/<?php echo htmlentities($fid);?>/<?php echo htmlentities($row1['fabricImage1']);?>" alt="<?php echo htmlentities($row1['fabricName']);?>" id="fabric_<?php echo $fid;?>">
			<div>Code: <span class="codefont"><?php echo $fcode;?></span></div>
    </label>

	<script>
		$(document).ready(function(){
			//fabric
			$("#fabric_<?php echo $fid;?>").click(function(){
				//alert('hi');
				$("#design_zoom").hide(500);
				$("#fabric2_zoom").hide(500);
				
				var im=$('#fabric_<?php echo $fid;?>').attr('src');
				$('#fabric_zooming').attr('src',im);
				$("#fabric_zoom").css("z-index", 1);
				$("#fabric_zoom").append('<div id="fchildDiv<?php echo $fid;?>">Close</div>');
				$('#fchildDiv<?php echo $fid;?>').css({'position': 'relative','color':'white','font':'20px bold','background':'#550909','padding':'10px'}); 
				$('#fchildDiv<?php echo $fid;?>').css({'position': 'absolute','top': '0','right': '0'});
				$("#fabric_zoom").css({ "width": "30%"});
				$("#fabric_zoom").show(700);
				document.querySelector("fabric_zoom").requestFullscreen();
			});

			$("#fabric_zoom").click(function(){
				$("#fabric_zoom").hide(500);
				
			});
		});
	</script>

<?php
}
?>
	
	
</div>        


</div>

<!-- SECOND FABRIC -->


<div class="custom-div" style="border-top:1px solid #999; display:none;" id="sec_fab" >
<h6>SELECT THE SECOND FABRIC</h6>
<div style="position: relative;" id="fab2">

<?php 
$query2=mysqli_query($con,"select * from fabrics where status='In Stock'");
$cnt=1;
while($row2=mysqli_fetch_array($query2))
{
$fid2=$row2['id'];
$fcode2=$row2['fcode'];
$price2=$row2['price'];
?>

	<label class="img-btn">
            <input type="radio" name="fabric2" value="<?php echo $fid2;?>">
            <img src="admin/fabricimages/<?php echo htmlentities($fid2);?>/<?php echo htmlentities($row2['fabricImage1']);?>" alt="<?php echo htmlentities($row2['fabricName']);?>" id="fabric2_<?php echo $fid2;?>">
			<div>Code: <span class="codefont"><?php echo $fcode2;?></span></div>
    </label>

	<script>
		$(document).ready(function(){
			//fabric
			$("#fabric2_<?php echo $fid2;?>").click(function(){
				//alert('hi');
				$("#design_zoom").hide(500);
				$("#fabric_zoom").hide(500);
				
				var im=$('#fabric2_<?php echo $fid2;?>').attr('src');
				$('#fabric2_zooming').attr('src',im);
				$("#fabric2_zoom").css("z-index", 1);
				$("#fabric2_zoom").append('<div id="ffchildDiv<?php echo $fid2;?>">Close</div>');
				$('#ffchildDiv<?php echo $fid2;?>').css({'position': 'relative','color':'white','font':'20px bold','background':'#550909','padding':'10px'}); 
				$('#ffchildDiv<?php echo $fid2;?>').css({'position': 'absolute','top': '0','right': '0'});
				$("#fabric2_zoom").css({ "width": "30%"});
				$("#fabric2_zoom").show(700);
				document.querySelector("fabric_zoom").requestFullscreen();
			});

			$("#fabric2_zoom").click(function(){
				$("#fabric2_zoom").hide(500);
				
			});
		});
	</script>

<?php
}
?>
	

</div>
</div>

<!-- SECOND FABRIC-End -->

<div style="clear:both;"></div>
<div>
	<div class="stock-box" style="padding:5px; text-align:center;">
		<h5 style="text-decoration:underline;font-weight:700;font-size:10px;">SELECT YOUR SIZE</h5><br>
		<div class="radio-toolbar">
			<input  type="radio" id="radio0" name="radios" class="rad" value="XXS">
			<label  for="radio0">XXS</label>

			<input  type="radio" id="radio1" name="radios" class="rad" value="XS">
			<label  for="radio1">XS</label>

			<input type="radio" id="radio2" name="radios" class="rad" value="S">
			<label for="radio2">S</label>

			<input  type="radio" id="radio3" name="radios" class="rad" value="M">
			<label  for="radio3">M</label>

			<input  type="radio" id="radio4" name="radios" class="rad" value="L">
			<label  for="radio4">L</label>

			<input  type="radio" id="radio5" name="radios" class="rad" value="XL">
			<label  for="radio5">XL</label>

			<input  type="radio" id="radio6" name="radios" class="rad" value="XXL">
			<label  for="radio6">XXL</label>

			<input  type="radio" id="radio7" name="radios" class="rad" value="XXXL">
			<label  for="radio7">XXXL</label>

		</div>
	</div>
	<div>
	<div class="stock-box" style="padding:5px; text-align:center;">
		<h5 style="text-decoration:underline;font-weight:700;font-size:10px;">TOTAL PRICE (Inc. Fabrics and Model Stitching)</h5><br>
		<div id="getPrice">Price</div>
	</div>
	</div>
	<div style="margin:10px;text-align:center;">
		<input type="submit" name="submit" class="btn btn-primary" value="Submit your design">
	</div>
</div>
</form>	

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

	<?php
	//echo "<script>alert('".$_SESSION['qnty']."');</script>";
	?>

</body>
</html>