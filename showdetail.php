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
				<script src="jquery/bootbox.min.js" type="text/javascript"></script>
				<script src="StyleSheet/script.js" type="text/javascript"></script>
				<script src="jquery/jquery.countdown.js" type="text/javascript"></script>
				
		</head>
	<body style="background-color: #F9F9F9;font-family: 'rsuregular', Tahoma, Helvetica, sans-serif;">

				
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
						<div class="row" style="padding-top: 42px;">
							<div class="col-md-8 col-md-offset-2">
								<?php $sql = "select *, CONCAT(pramool_customer.cus_name,' ',pramool_customer.cus_surname) as fullname from pramool_product INNER JOIN pramool_customer ON pramool_product.user_product = pramool_customer.cus_id where id_product = '$_GET[id]'";
								  $result = mysql_query($sql);
								  
								  while ($sqllis = mysql_fetch_array($result)) {
								  	
				 				?>
				 				<form class="form-horizontal" method="post" accept-charset="utf-8">
				 					<div class="form-group col-md-6 text-center">
				 						<img src="Image/Img_Product/<?= $sqllis['productimg'];?>" width="253px" height="253px">
				 					</div>
				 					<div class="form-group col-md-6" style="margin-bottom:0px;">
				 						<font size="5" color="#020202"><label>ชื่อสินค้า :</label>
										</font> <font size="5" color="#7C7C7C"><?= $sqllis['nameproduct'] ?></font>
				 					</div>
				 					<div class="form-group col-md-6" style="margin-bottom:0px;">
				 						<font size="5" color="#020202"><label>เจ้าของสินค้า :</label>
										</font> <font size="5" color="#7C7C7C"><?= $sqllis['fullname'] ?></font>
				 					</div>
				 					<div class="form-group col-md-6" style="margin-bottom:0px;">
				 						<font size="5" color="#020202"><label>เวลาที่เหลือ :</label></font>
				 						<?php if($sqllis['status'] != 0) { ?>
											<span style="color: #7C7C7C;font-size: 20px;" data-countdown="<?= $sqllis['time_pramool_show']; ?>" style="text-align: center;">
							        		</span>
						        		<?php }else{ ?>
											<font size="5" color="#F90303"><label>รอการยืนยัน</label></font>
						        		<?php } ?>
				 					</div>
				 					<div class="form-group col-md-6" style="margin-bottom:0px;">
				 						<font size="5" color="#020202"><label>ประมูลครังถัดไป :</label></font>
				 						<?php if($sqllis['status'] != 0) { ?>
										<span style="color: #7C7C7C;font-size: 20px;" id="clock" style="text-align: center;">
											00:00:00
						        		</span>
						        		<?php }else{ ?>
											<font size="5" color="#F90303"><label>รอการยืนยัน</label></font>
						        		<?php } ?>
				 					</div>
				 					<div class="form-group col-md-6" style="margin-bottom:9px;">
				 						<font size="5" color="#020202"><label class="col-md-9" style="padding: 0px;">ใส่ราคาประมูลของคุณ :</label></font>
				 						<div class="col-md-3" style="padding: 0px;">
				 							<input type="number" name="price_pramool" value="0" max="<?= $sqllis['pricemax']; ?>" min="<?= $sqllis['pricemin']; ?>" class="form-control">
				 						</div>
				 					</div>
				 					<div class="form-group col-md-6" style="margin-bottom:9px;position: relative;">
				 						<blockquote class="blockquote-reverse">
										 	 <footer>ราคาประมูลต่ำสุด :<cite title="Source Title"><?php echo  $sqllis['pricemin']; ?></cite></footer>
										 	 <footer>ราคาประมูลมากสุด :<cite title="Source Title"><?php echo  $sqllis['pricemax']; ?></cite></footer>
										</blockquote>
									<?php  if(!empty($_SESSION['userid'])) : ?>
										
										<?php if($_SESSION['userid'] != $sqllis['cus_id'] && $sqllis['status'] != 0){ ?>
										<button id="btn" type="button" class="btn btn-warning" onclick="pramoll(<?= $sqllis['id_product']; ?>);" style="position: absolute;top: 6px;"><i class="fa fa-gavel"></i> ประมูล</button>
										<?php }else{ ?>
										<button id="btn" type="button" class="btn btn-warning" style="position: absolute;top: 6px;"><i class="fa fa-gavel"></i>ไม่สามารถประมูลได้</button>
										<?php } ?>
										<button id="btnn" type="button" class="btn btn-warning" style="position: absolute;top: 6px;display: none;">ทำการประมูลแล้วรอรอบถัดไป</button>
									 
									 <?php else : ?>
										<button type="button" onclick="log();" class="btn btn-info" style="position: absolute;top: 6px;">ลงชื่อเข้าใช้</button>
									 <?php endif; ?>
									<div id="er" style="display: none;">
										<div id="div_error" class="alert alert-danger" style=""  role="alert">
										  <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
										  <span class="sr-only">Error:</span>
										  <span id="erroe_text"></span>
										</div>
									</div>

				 					</div>


										

				 				</form>
								
								<?php
									}
								?>
								
								<?php  $sql = "
													SELECT A.cus_id, A.fullname, A.sumprice, A.date_time FROM
													(
														select pramool_customer.cus_id, CONCAT(pramool_customer.cus_name,' ',pramool_customer.cus_surname) as fullname,
																		SUM(pramool_userpramool.price) as sumprice, pramool_userpramool.date_time
														from pramool_userpramool
														inner join pramool_customer on pramool_userpramool.cus_id = pramool_customer.cus_id
														inner join pramool_product on pramool_userpramool.id_product = pramool_product.id_product
														where pramool_userpramool.id_product = '$_GET[id]' 
														GROUP BY pramool_userpramool.cus_id
													)A ORDER BY  A.sumprice DESC LIMIT 1"; 

										$sqll = mysql_query($sql);
										$lis = mysql_fetch_array($sqll);
										if($lis > 0) {
								?>
								
								<div class="col-md-12 text-center" style="border: 1px solid red">
									<font size="5" color="#20E116"><label>ผู้ชนะการประมูล :</label></font>
									<a href="javascript:void(0);" onclick="showhi(<?php echo $lis['cus_id']; ?>); return false"><font size="5" color="#6203FF"><?php echo $lis['fullname']; ?></font></a>
								</div>
								
								<?php } ?>

								<div class="col-md-12">
									<table class="table table-striped table-bordered">
										<tr>
											<th class="text-center">
												ชื่อผู้ประมูล
											</th>
											<th class="text-center">
												ราคาประมูล
											</th>
											<th class="text-center">
												เวลาประมูล
											</th>
										</tr>

										<?php 
											$sql = "
													SELECT  A.fullname, A.sumprice, A.date_time FROM
													(
														select  CONCAT(pramool_customer.cus_name,' ',pramool_customer.cus_surname) as fullname,
																		SUM(pramool_userpramool.price) as sumprice, pramool_userpramool.date_time
														from pramool_userpramool
														inner join pramool_customer on pramool_userpramool.cus_id = pramool_customer.cus_id
														inner join pramool_product on pramool_userpramool.id_product = pramool_product.id_product
														where pramool_userpramool.id_product = '$_GET[id]' 
														GROUP BY pramool_userpramool.cus_id
													)A ORDER BY  A.sumprice DESC";

											$succ = mysql_query($sql);
											while ($sqllis = mysql_fetch_array($succ)) {
										 ?>

											<tr>
												<th class="text-center">
													<?php echo $sqllis['fullname']; ?>
												</th>
												<th class="text-center">
													<?php echo $sqllis['sumprice']; ?>
												</th>
												<th class="text-center">
													<?php echo $sqllis['date_time']; ?>
												</th>
											</tr>

										 <?php } ?>

									</table>
								</div>

							</div>
						</div>
					</div>

					<script type="text/javascript">
						
						$('[data-countdown]').each(function() {
					    	 var $this = $(this), finalDate = $(this).data('countdown');
					    	 var fiveSeconds = new Date().getTime() + 20000;

						     $this.countdown(finalDate)
							  .on('update.countdown', function(event) {
							    var format = '%H ชั่วโมง %M นาที %S';
							    if(event.offset.days > 0) {
							      format = '%-d วัน ' + format;
							    }
							    if(event.offset.weeks > 0) {
							      format = '%-m เตือน ' + format;
							    }
							   $(this).html(event.strftime(format));

							   $('#clock').countdown(fiveSeconds, function(event) {
								   $(this).html(event.strftime('%S'));
							    }).on('finish.countdown', function(event) {
									   $(this).html('จบการประมูลแล้ว').parent().addClass('disabled');
									   setTimeout(function(){ 
									   		window.location.reload(); 
									   }, 3000);
								});

							 })
							 .on('finish.countdown', function(event) {
							   $(this).html('จบการประมูลแล้ว !!!').parent().addClass('disabled');
							   					$("#btn").attr('disabled', 'disabled');
							   					<?php if(empty($_GET['success'])){ ?>
							   						window.location = "showdetail.php?success=yess&id=<?php echo $_GET['id']?>";
							   					<?php } ?>
							  				 <?php 
							  				 	if(!empty($_GET['success'])){
							  				 	  $sql = "update pramool_product set status = 8 where id_product = '$_GET[id]'";
									   			  mysql_query($sql);
									   			  	}
									   		 ?>
							 });
						 });

						

						

						function pramoll(ID){
							var min = $("input[name=price_pramool]").attr('min');
							var max = $("input[name=price_pramool]").attr('max');
							if (parseInt(min) > $("input[name=price_pramool]").val()){
								$("#er").css("display", "inline");
								$("#erroe_text").html("จำนวนเงินในการประมูลต่ำกว่าที่กำหนด !!!");
							}else if(parseInt(max) < $("input[name=price_pramool]").val()){
								$("#er").css("display", "inline");
								$("#erroe_text").html("จำนวนเงินในการประมูลเกินกว่าที่กำหนด !!!");
							}else{
								$.ajax({
								url: 'pramoolnow.php',
								type: 'POST',
								data:{
									ID: ID,
									price: $("input[name=price_pramool]").val()
								} ,
								success: function(data){
									$("#btn").css("display", "none");
									$("#btnn").css("display", "inline");
								}
							});
							}
						}

						function showhi(id){
							
							$.ajax({
								url: 'showhistory.php',
								type: 'post',
								dataType: 'json',
								data: {ID: id},
								success: function(data){
									bootbox.alert("<table><tr><td style='text-align: right;'>ชื่อ :</td><td>"+ data.cus_name + " " + data.cus_surname + "</td>\
														  </tr>\
														  <tr><td style='text-align: right;'>เบอร์โทร :</td><td>" + data.cus_tel + "</td></tr>\
														  <tr><td style='text-align: right;'>E-mail :</td><td>" + data.cus_email + "</td></tr>\
												   </tabal>", function() {
									});
								}
							});
							
						}

						 function back(){
								<?php unset($_SESSION["searth"]) ?>
								window.location.href = "index.php";
							}

					</script>


	</body>
</html>