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

			    function back(){
								<?php unset($_SESSION["searth"]) ?>
								window.location.href = "index.php";
							}
					
		    </script>
	</head>
		<body>
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

				<div class="container">
					<div class="row">
						<div class="col-md-8 col-md-offset-2">

							<?php $sql = "select DISTINCT pramool_userpramool.pramool_id, pramool_product.* from pramool_userpramool
										  INNER JOIN pramool_product ON pramool_userpramool.id_product = pramool_product.id_product
										  where pramool_userpramool.cus_id = '$_SESSION[userid]'
										  GROUP BY pramool_product.id_product";
				  $result = mysql_query($sql);
				  while ($sqllis = mysql_fetch_array($result)) {
			 ?>
			 <a href="showdetail.php?id=<?= $sqllis['id_product']; ?>">
				<div class="col-sm-4 col-md-3">
				    <div class="thumbnail">
				      <img src="Image/Img_Product/<?= $sqllis['productimg'];?>">
				      <div class="caption">
				        <h3 class="text-center"><?= $sqllis['nameproduct']; ?></h3>
				        <?php if($sqllis['status'] == 0) { ?>
					        <div>
					        	<?php echo $sqllis['pramoolday']."วัน"." ".$sqllis['parmooltime']."ช.ม." ?>
					        </div>
					    <?php }else{ ?>
							<div data-countdown="<?= $sqllis['time_pramool_show'] ?>" style="text-align: center;">
					        </div>
					    <?php } ?>
						
				      </div>
				    </div>
				</div>
			</a>
			<?php
				}
			?>
		</div>

		<script type="text/javascript">
		$(function(){

			/*var today = new Date();
		    var dd = today.getDate()+0;
		    var mm = today.getMonth()+0;
		    var yyyy = today.getFullYear()+0;
		    var h = today.getHours() + 0;
		    var m = today.getMinutes()+0;
		    var s = today.getSeconds() + 0;
		    var today = yyyy+'/'+mm+'/'+dd + " " + h+":"+m+":"+s;*/
		    
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
		</script>
					
						</div>
					</div>
				</div>

		</body>

</html>