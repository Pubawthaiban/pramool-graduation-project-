<?PHP session_start(); require_once 'connect.php';?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
	    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
		<title>Document</title>
		<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstraps.css">
		<link rel="stylesheet" type="text/css" href="owl-carousel/owl.carousel.css">
		<link rel="stylesheet" type="text/css" href="owl-carousel/owl.theme.css">
		<link rel="stylesheet" type="text/css" href="StyleSheet/StyleCss.css">
		<link rel="stylesheet" type="text/css" href="font-awesome/css/font-awesome.min.css">
		<script src="jquery/external/jquery/jquery.js" type="text/javascript"></script>
		<script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
		<script src="owl-carousel/owl.carousel.js" type="text/javascript"></script>
		<script src="jquery/jquery-ui.min.js" type="text/javascript"></script>
		<script src="StyleSheet/script.js" type="text/javascript"></script>
		<script src="jquery/jquery.countdown.js" type="text/javascript"></script>
			<script type="text/javascript">
				$(function(){

					var $container = $("#showproduct");
			        $container.load("showproductindex.php");
			        var refreshId = setInterval(function()
			        {
			            $container.load('showproductindex.php');
			        }, 6500);

			    });

			    function search(s){
			    	window.location = "index.php?searth=" + s;
			    }

			    	function back(){
								<?php unset($_SESSION["searth"]) ?>
								window.location.href = "index.php";
							}
		    </script>
	</head>
		<body>

			<section>
		              <div id="owl-demo" class="owl-carousel" style="position: relative;"><!--สไล-->

			                <div class="item"><img src="Image/fullimage1.jpg" alt="The Last of us"></div>
			                <div class="item"><img src="Image/fullimage2.jpg" alt="GTA V"></div>
			                <div class="item"><img src="Image/fullimage3.jpg" alt="Mirror Edge"></div>
			                <div class="item"><img src="Image/fullimage4.jpg" alt="The Last of us"></div>
			                <div class="item"><img src="Image/fullimage5.jpg" alt="GTA V"></div>
			                <div class="item"><img src="Image/fullimage6.jpg" alt="Mirror Edge"></div>
    		                <div class="item"><img src="Image/fullimage7.jpg" alt="Mirror Edge"></div>

			          </div>
			</section>

				<nav class="navbar navbar-default">
				  <div class="container">

				    <div class="navbar-header">
				      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
				        <span class="sr-only">Toggle navigation</span>
				        <span class="icon-bar"></span>
				        <span class="icon-bar"></span>
				        <span class="icon-bar"></span>
				      </button>
				      <a class="navbar-brand" href="index.php">
							<i class="fa fa-gavel"></i>
							<span style="font-family:Courier New;font-weight: bold;">PraMool</span>
				      </a>
				    </div>

				    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				      
				      <ul class="nav navbar-nav navbar-right">

						<?php  if(empty($_SESSION['userid'])) : ?> <!---ตรวจสอบว่ามีการล็อกอินหรือยัง-->
				       	<div class="col-md-6"><!--ปุ่ม login-->
				        	<a href="javascript:void(0);" class="btn btn-primary navbar-btn btn-block" onclick="log(); return false">Sign In</a>
				      	</div>

				      	<div class="col-md-6"><!--สมัครสมาชิก-->
				        	<a href="javascript:void(0);" class="btn btn-success navbar-btn btn-block" onclick="regis(); return false">Sign Up</a>
				        </div>
				       <?php else : ?>

				       	<li><a href="addproduct_pramool.php"><i class="fa fa-archive fa-1x"></i> เพิ่มสินค้าประมูล</a></li>

				       		<li><a href="showpramool_history.php"><i class="fa fa-shopping-bag fa-1x"></i> สินค้าที่ประมูล</a></li>
 
				       	<li><a href="showpramool_now.php"><i class="fa fa-exclamation-circle fa-1x"></i> สินค้าที่ลงประมูล</a></li>
						
						<li class="dropdown">
				          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <span id="userfont"><?php echo $_SESSION['Fullnamw']; ?></span> <span class="caret"></span></a>
				          <ul class="dropdown-menu">
				          <?php if($_SESSION['userid'] == 4){ ?>
				            <li><a href="javascript:void(0);" onclick="adminshow(); return false" class="text-center"><i class="fa fa-user-secret fa-2x"></i> Admin Setting</a></li>
				          <?php } ?>
				            <li role="separator" class="divider"></li>
				            <li><a href="logout.php" class="text-center"><i class="fa fa-lock fa-2x"></i>   ออกจากระบบ</a></li>
				          </ul>
				        </li>

				       <?php endif; ?>

				      </ul>

				    </div>

				  </div>
				</nav>

				<div class="container">
					<div id="Tylemenu" class="col-md-3" style="padding-top: 20px;">
						<div class="list-group">
						<?php $sql = "select product_tyle_name, product_tyle_ID from pramool_product_tyle order by product_tyle_ID"; 
							  $succ = mysql_query($sql);
							   while ($sqllis = mysql_fetch_assoc($succ)) {
						?>

						  <button type="button" class="list-group-item" onclick="search(<?php echo $sqllis['product_tyle_ID']; ?>)"><?php echo $sqllis['product_tyle_name']; ?></button>

						  <?php } ?>
						</div>
					</div>
					<div id="showproduct" class="col-md-9" style="padding-top: 20px;">
					
					</div>
				</div>

				<?php


					if(isset($_GET['searth'])){
						$_SESSION['searth'] = $_GET['searth'];
					}

				?>

		</body>

</html>