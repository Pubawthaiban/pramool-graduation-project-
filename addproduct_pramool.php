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

				<div class="container" style="padding-top: 64px;">
					<div class="row">
						<div class="col-md-8 col-md-offset-2">

							
							<?php

								if(isset($_GET['success'])){
									
										$echo = '<div class="alert alert-success">
													<button type="button" class="close" data-dismiss="alert" aria-label="Close">
														<span aria-hidden="true">&times;</span>
													</button>
														บันทึกข้อมูลเรียบร้อยแล้ว
												</div>';
									
								}

								if(isset($_GET['editshow'])){
									$sqledit = "select * from pramool_product where id_product = '$_GET[editshow]'";
									$sql = mysql_query($sqledit);
									$lis = mysql_fetch_array($sql);
								}

							?>


							<form id="formproduct" class="form-horizontal" enctype="multipart/form-data">

								<div id="img" class="col-md-5 form-group">

								    <a href="#" id="eimg" class="thumbnail">
								    <?php if(isset($_GET['editshow'])){ ?>
									  <img id="previewing" src="Image/Img_Product/<?php echo $lis['productimg']; ?>" height="444" width="592" alt="No Image">
								     <?php }else{ ?>
								      <img id="previewing" src="Image/no_image.jpg" height="444" width="592" alt="No Image">
								      <?php } ?>
								    </a>

									<input type="file" name="upload" id="upload" style="display:none">

									<div align="center" >
										<input type="button" name="showbrow" class="btn btn-primary" value="เพิ่มรูปภาพ" id="showbor">
										<input type="button" name="cancle" class="btn btn-warning" value="ยกเลิก" id="showbor" style="display:none">
									</div>

									<div id="showimg_test">
									</div>

								 </div>


								<div class="col-md-7">
									<div id="namep" class="form-group col-md-12">
										<?php if(isset($_GET['editshow'])){ ?>
								        <input type="text" class="form-control" id="proname" value="<?php echo $lis['nameproduct'];?>" name="proname" placeholder="ชื่อสินค้า">
								        <?php }else{ ?>
										<input type="text" class="form-control" id="proname" name="proname" placeholder="ชื่อสินค้า">
								        <?php } ?>
								    </div>

								    <div id="protyle" class="form-group col-md-12">
								        <select name="tyle_product" class="form-control">
								        	<option value="0">-----เลือกประเภทสินค้า-----</option>
								        	<?php $sql = "select product_tyle_name, product_tyle_ID 
								        				  from pramool_product_tyle order by product_tyle_ID"; 
												  $succ = mysql_query($sql);
												   while ($sqllis = mysql_fetch_assoc($succ)) {

												   	if($sqllis['product_tyle_ID'] == $lis['product_tyle']){
											?>
												<option value="<?php echo $sqllis['product_tyle_ID']; ?>" selected>
											 		<?php echo $sqllis['product_tyle_name']; ?>
											 	</option>
											<?php }else{ ?>
											 	<option value="<?php echo $sqllis['product_tyle_ID']; ?>">
											 		<?php echo $sqllis['product_tyle_name']; ?>
											 	</option>
											<?php }
											} ?>
								        </select>
								    </div>

								    <div id="prices" class="form-group col-md-12">
								    <?php if(isset($_GET['editshow'])){ ?>
								        <input type="number" class="form-control" id="prop" value="<?php echo $lis['pricestrat'] ?>" name="pricestrat" min="0" placeholder="ราคาเริ่มต้นประมูล">
								    <?php }else{ ?>
										<input type="number" class="form-control" id="prop" name="pricestrat" min="0" placeholder="ราคาเริ่มต้นประมูล">
								    <?php } ?>
								    </div>

								     <div class="form-group col-md-12" style="margin-bottom: 0px;">
								        <?php if(isset($_GET['editshow'])){ ?>
								     	<div id="p1" class="form-group col-md-5">
								        	<input type="number" class="form-control" value="<?php echo $lis['pricemin'] ?>" name="pricemin" min="0" placeholder="วงเงินขั้นต่ำ">
								       	</div>
								       	<label class="col-md-1 control-label">-</label>
								       	<div id="p2" class="form-group col-md-5">
								        	<input type="number" class="form-control" value="<?php echo $lis['pricemax'] ?>" name="pricemax" min="0" placeholder="วงห้ามเกิน">
								       	</div>
								       	<?php }else{ ?>
										<div id="p1" class="form-group col-md-5">
								        	<input type="number" class="form-control" name="pricemin" min="0" placeholder="วงเงินขั้นต่ำ">
								       	</div>
								       	<label class="col-md-1 control-label">-</label>
								       	<div id="p2" class="form-group col-md-5">
								        	<input type="number" class="form-control" name="pricemax" min="0" placeholder="วงห้ามเกิน">
								       	</div>
								       	 <?php } ?>
								    </div>

								     <div class="form-group col-md-12" style="margin-bottom: 0px;">
								      <?php if(isset($_GET['editshow'])){ ?>
								     	<label for="daystrat" class="col-md-12 text-left" style="padding: 0px;">เวลาในการประมูลวินค้า :</label>
								     	<div id="day" class="form-group col-md-3">
								       		 <input type="number" id="daystrat" min="0" max="31" class="form-control" name="daystrat" placeholder="วัน" value="<?php echo $lis['pramoolday'] ?>">
								        </div>
								        <label class="col-md-1 control-label">:</label>
								        <div id="time" class="form-group col-md-4">
												<input type="time" name="tiemstrat" class="form-control" value="<?php echo $lis['parmooltime'] ?>">
										</div>
										<label class="col-md-1 control-label">ชม.</label>
										<?php }else{ ?>
											<label for="daystrat" class="col-md-12 text-left" style="padding: 0px;">เวลาในการประมูลวินค้า :</label>
								     	<div id="day" class="form-group col-md-3">
								       		 <input type="number" id="daystrat" min="0" max="31" class="form-control" name="daystrat" placeholder="วัน">
								        </div>
								        <label class="col-md-1 control-label">:</label>
								        <div id="time" class="form-group col-md-4">
												<input type="time" name="tiemstrat" class="form-control">
										</div>
										<label class="col-md-1 control-label">ชม.</label>
										 <?php } ?>
								    </div>

								    <div id="detail" class="form-group col-md-12" >
										<label class="col-md-12 text-left" style="padding: 0px;">คำอธิบายสินค้า :</label>
										<div class="form-group col-md-12">
										<?php if(isset($_GET['editshow'])){ ?>
											<textarea class="form-control" name="detailp" rows="3" id="detailproduct"><?php echo $lis['productdetail'] ?></textarea>
											<input type="text" name="STB" value="<?php echo $lis['id_product'] ?>" style="display:none;">
										<?php }else{ ?>
											<textarea class="form-control" name="detailp" rows="3" id="detailproduct"></textarea>
										<?php } ?>
										</div>
								    </div>
								</div>

								<div class="form-group col-md-12" align="center">
								<?php if(isset($_GET['editshow'])){ ?>
									<a href="#" id="submid" class="btn btn-success" style="border-radius: 70px;padding-top: 17px;padding-bottom: 17px;">แก้ไข</a>
								<?php }else{ ?>
									<a href="#" id="submid" class="btn btn-success" style="border-radius: 70px;padding-top: 17px;padding-bottom: 17px;">บันทึก</a>
								<?php } ?>
								</div>
								
							</form>
						</div>
					</div>
				</div>

				<script type="text/javascript">

					function imgbtn(){
						if($("input[name=upload]").val() == ""){
							$("input[name=cancle]").fadeOut();
						}else{
							$("input[name=cancle]").fadeIn();
						}
					}

					$("#showbor").on("click",function(e){  
				        $("#upload").click();
				        e.preventDefault();  
			    	});  

					$("input[name=upload]").on('change', function(event) {
						var file = this.files;
						//console.log(file);
						if(file.length > 0){
							var reader = new FileReader();
							reader.onload = imageIsLoaded;
							reader.readAsDataURL(this.files[0]);
							event.preventDefault();
						}
						imgbtn();
					});

					function imageIsLoaded(e) {
						$('#previewing').attr('src', e.target.result);
						$("input[name=test]").val("0")
					};

					$("input[name=cancle]").on('click', function(event) {
						<?php if(isset($_GET['editshow'])){ ?>
								$("input[name=upload]").val("");
								$('#previewing').attr('src', "Image/Img_Product/<?php echo $lis['productimg']; ?>");
								event.preventDefault();
								imgbtn();
							<?php }else{ ?>
								$("input[name=upload]").val("");
								$('#previewing').attr('src', "Image/no_image.jpg");
								event.preventDefault();
								imgbtn();
							<?php } ?>
					});

					$("#submid").click(function() {
						if($("#proname").val() == ""){
							$("#namep").addClass('has-warning');
							$("#prices,#p1,#p2,#day,#time,#detail,#eimg,#protyle").removeClass('has-warning errorimg');
							$("#proname").focus();
						}else if ($("select").val() == "0"){
							$("#protyle").addClass('has-warning');
							$("#prices,#p1,#p2,#day,#time,#detail,#eimg,#namep").removeClass('has-warning errorimg');
							$("select").focus();
						}else if ($("#prop").val() < 0 || $("#prop").val() == ""){
							$("#prices").addClass('has-warning');
							$("#namep,#p1,#p2,#day,#time,#detail,#eimg,#protyle").removeClass('has-warning errorimg');
							$("#prop").focus();
						}else if ($("input[name=pricemin]").val() < 0 || $("input[name=pricemin]").val() == ""){
							$("#p1").addClass('has-warning');
							$("#namep,#prices,#day,#p2,#time,#detail,#eimg,#protyle").removeClass('has-warning errorimg');
							$("input[name=pricemin]").focus();
						}else if($("input[name=pricemax]").val() < 0 || $("input[name=pricemax]").val() == ""){
							$("#p2").addClass('has-warning');
							$("#namep,#prices,#p1,#day,#time,#detail,#eimg,#protyle").removeClass('has-warning errorimg');
							$("input[name=pricemax]").focus();
						}else if($("input[name=daystrat]").val() < 0 || $("input[name=daystrat]").val() == ""){
							$("#day").addClass('has-warning');
							$("#namep,#prices,#p1,#p2,#time,#detail,#eimg,#protyle").removeClass('has-warning errorimg');
							$("input[name=daystrat]").focus();
						}else if($("input[name=tiemstrat]").val() == ""){
							$("#time").addClass('has-warning');
							$("#namep,#prices,#p1,#p2,#day,#detail,#eimg,#protyle").removeClass('has-warning errorimg');
							$("input[name=tiemstrat]").focus();
						}else if($("#detailproduct").val() == ""){
							$("#detail").addClass('has-warning');
							$("#namep,#prices,#p1,#p2,#day,#time,#eimg,#protyle").removeClass('has-warning errorimg');
							$("#detailproduct").focus();
						}else if($("input[name=upload]").val() == "" && $("input[name=STB]").val() == ""){
							$("#eimg").addClass('errorimg');
							$("#namep,#prices,#p1,#p2,#day,#time,#detail,#protyle").removeClass('has-warning');
						}else{
							
						<?php if(isset($_GET['editshow'])){ ?>

							$.ajax({
									url: "edit_product.php",
									type: 'POST',
									data: new FormData($("#formproduct")[0]),
									async: false,
								    cache: false,
								    contentType: false,
								    processData: false,
									success: function(data){
										window.location = "showpramool_now.php"
									}
								});
								
						<?php }else{ ?>

								$.ajax({
									url: "upload_product.php",
									type: 'POST',
									data: new FormData($("#formproduct")[0]),
									async: false,
								    cache: false,
								    contentType: false,
								    processData: false,
									success: function(data){
										window.location = "addproduct_pramool.php?success=success"
									}
								});

						<?php } ?>


						}
					});



							function back(){
								<?php unset($_SESSION["searth"]) ?>
								window.location.href = "index.php";
							}
				</script>

		</body>

</html>