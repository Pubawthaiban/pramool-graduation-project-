<?PHP session_start();?>
<!DOCTYPE html>
<html lang="en">
		<head>
			<meta charset="UTF-8">
				<meta http-equiv="X-UA-Compatible" content="IE=edge">
			    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
				<title>เข้าสู่ระบบ</title>
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
				<script type="text/javascript">
					$(function() {
					  $("input[name=username]").focus();
					});
				</script>
		</head>
	<body style="background-color: #F9F9F9;">

				<div id="overlay" class="col-md-12 col-sm-12 col-xs-12">
				</div>
				<div id="load_show" class="col-md-4 col-md-offset-4 col-sm-4 col-sm-offset-4 col-xs-4 col-xs-offset-4 col-lg-4 col-lg-offset-4">
						<img src="Image/loading.gif" height="100" width="400" alt="loading..." class= "img-circle img-responsive">
				</div>
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
						       	<div class="col-md-12">
						        	<a href="javascript:void(0);" class="btn btn-success navbar-btn btn-block" onclick="regis(); return false">Sign Up</a>
						      	</div>
					        <?php else : ?>
					        	<li class="dropdown">
						          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php echo $_SESSION['userid']; ?> <span class="caret"></span></a>
						          <ul class="dropdown-menu">
						            <li><a href="#">Action</a></li>
						            <li><a href="#">Another action</a></li>
						            <li><a href="#">Something else here</a></li>
						            <li role="separator" class="divider"></li>
						            <li><a href="javascript:void(0);" class="text-center"><i class="fa fa-lock fa-1x"></i>   ออกจากระบบ</a></li>
						          </ul>
				       			 </li>
				    	    <?php endif; ?>

					      </ul>

					    </div>

					  </div>
					</nav>

					<div class="container">
						<div class="row">
							<div class="col-md-6 col-md-offset-3" style="margin-top: 100px;">

								<span class="col-md-12" id="alerterror"></span>

								<div class="col-md-5" style="margin-top: 24px;">
									<p class="text-center" style="font-family: Comic Sans, Comic Sans MS, cursive; font-size: 26px;">
										<i class="fa fa-gavel fa-2x"></i>
										ระบบสมาชิก
									</p>
								</div>

								<div class="col-md-6">
									<form id="loginform" accept-charset="utf-8" class="form-horizontal">
										<div class="form-group">
										  <div class="input-group">
										    <span class="input-group-addon">
										    	<i class="fa fa-user"></i>
										    </span>
										    <input type="text" name="username" class="form-control" placeholder="Username">
										  </div>
										</div>
										<div class="form-group">
										  <div class="input-group">
										    <span class="input-group-addon">
										    	<i class="fa fa-unlock-alt"></i>
										    </span>
										    <input type="password" name="password" class="form-control" placeholder="Password">
										  </div>
										</div>
										<div class="form-group">
												<button id="btnsave" type="button" class="btn btn-success btn-block" onclick="checksave();">เข้าสู่ระบบ</button>
										</div>
									</form>
								</div>

							</div>
						</div>
					</div>

					<script type="text/javascript">
						$(document).keypress(function(e) { //เเช็คการกดปุ่ม Enter
							var key = e.which;
							if (key == 13){
								$('button[id=btnsave]').click();
			    				return false;  
							}
						});

						
						function checksave(){
							$("#alerterror").html("");
							if($("input[name=username]").val() == ""){
								$("#alerterror").html('<div class="alert alert-dismissible alert-warning">\
														<button type="button" class="close" data-dismiss="alert">×</button>\
														<h4>เตือน!</h4><p>กรุณากรอก Username !!!</p>\
													  </div>');
								$("input[name=username]").focus();
							}else if ($("input[name=password]").val() == ""){
								$("#alerterror").html('<div class="alert alert-dismissible alert-warning">\
													 	<button type="button" class="close" data-dismiss="alert">×</button>\
													 	<h4>เตือน!</h4><p>กรุณากรอก Password !!!</p>\
													 </div>');
								$("input[name=password]").focus();
							}else{
								$.ajax({
									url: 'checklogin.php',
									type: 'POST',
									data: $('#loginform').serialize(),
							        beforeSend: function(){
							        	$("#overlay,#load_show").fadeToggle('400')
							        	$("body").css("overflow", "hidden");
							        },
									success: function(data){
										$("#overlay,#load_show").fadeToggle('400');
										if(data != "no"){
											window.location.href = "index.php";
										}else{
											$("#alerterror").html('<div class="alert alert-dismissible alert-warning">\
													 	<button type="button" class="close" data-dismiss="alert">×</button>\
													 	<h4>เตือน!</h4><p>ชื่อหรือรหัสผ่านไม่ถูกต้อง. !!!</p>\
													 </div>');
										}
									}
								});
							}
						}
					</script>
		
	</body>
</html>