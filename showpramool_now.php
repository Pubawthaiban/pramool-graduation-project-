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
		</head>
		<body>

		<?php if(isset($_GET['del'])){
				$delimg = mysql_query("select productimg from pramool_product where id_product = '$_GET[del]'");
				$lisdel = mysql_fetch_array($delimg);
				unlink("Image/Img_Product/".$lisdel['productimg']);
				mysql_query("delete from pramool_product where id_product = '$_GET[del]'");

			} ?>

			<nav class="navbar navbar-default">
				  <div class="container">

				    <div class="navbar-header">
				      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
				        <span class="sr-only">Toggle navigation</span>
				        <span class="icon-bar"></span>
				        <span class="icon-bar"></span>
				        <span class="icon-bar"></span>
				      </button>
				      <a class="navbar-brand" href="javascript:void(0)" onclick="back()">
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




				<div class="container" style="padding-top: 64px;">
					<div class="row">
						<div class="col-md-8 col-md-offset-2">

						<?php $sql = "select *, CONCAT(pramool_customer.cus_name,' ',pramool_customer.cus_surname) as fullname from pramool_product INNER JOIN pramool_customer ON pramool_product.user_product = pramool_customer.cus_id";
				  $result = mysql_query($sql);
				  
				  while ($sqllis = mysql_fetch_array($result)) {
				  	if ($sqllis['user_product'] == $_SESSION['userid']) {
						 ?>
						 <a href="showdetail.php?id=<?= $sqllis['id_product']; ?>">
							<div class="col-md-4">
							    <div class="thumbnail">
							      <img src="Image/Img_Product/<?= $sqllis['productimg'];?>" style="width: 245px; height:163px;">
							      <div class="caption">
							        <h3 class="text-center"><?= $sqllis['nameproduct']; ?></h3>
							        <div class="text-center">
							        	<?php echo $sqllis['fullname']; ?>
							        </div>
							      
										<div data-countdown="<?= $sqllis['time_pramool_show'] ?>" style="text-align: center;">
								        </div>
								   
									<?php if(!empty($_SESSION['userid'])) { ?>
										<a href="javascript:void(0);" onclick="edi(<?= $sqllis['id_product']; ?>);" class="btn btn-warning btn-block" role="button">แก้ไข</a> 
										<a href="javascript:void(0);" onclick="delete_(<?= $sqllis['id_product']; ?>);" class="btn btn-warning btn-block" role="button">ลบ</a>
									<?php } ?>
							      </div>
							    </div>
							</div>
						  </a>
						<?php
									}
								}
						?>

						</div>
					</div>
				</div>

				<script type="text/javascript">
					$(function(){

					    $('[data-countdown]').each(function() {
					    	 var $this = $(this), finalDate = $(this).data('countdown');

						     $this.countdown(finalDate)
							  .on('update.countdown', function(event) {
							    var format = '%H ชั่วโมง %M นาที %S วินาที';
							    if(event.offset.days > 0) {
							      format = '%-d วัน ' + format;
							    }
							    if(event.offset.weeks > 0) {
							      format = '%-m เตือน ' + format;
							    }
							   $(this).html(event.strftime(format));
							 })
							 .on('finish.countdown', function(event) {
							   $(this).html('จบการประมูลแล้ว !!!')
							     .parent().addClass('disabled');
							 });
						 });

					});

					function edi(id){
						window.location = "addproduct_pramool.php?editshow=" + id
					}

					function delete_(id){
						window.location = "showpramool_now.php?del=" + id
					}

					function back(){
								<?php unset($_SESSION["searth"]) ?>
								window.location.href = "index.php";
							}
				</script>

		</body>
	</html>