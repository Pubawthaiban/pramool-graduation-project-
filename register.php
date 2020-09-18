<?PHP session_start();?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
			<meta http-equiv="X-UA-Compatible" content="IE=edge">
		    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
			<title>สมัครสมาชิก</title>
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
			<script src="jquery/bootbox.min.js" type="text/javascript"></script>
	</head>
		<body style="background-color: #E9EAED;">
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

				       	<div class="col-md-12">
				        	<a href="javascript:void(0);" class="btn btn-primary navbar-btn btn-block" onclick="log(); return false">Sign In</a>
				      	</div>
				       
				      </ul>

				    </div>

				  </div>
				</nav>
	<!-----------------------detail------------------------>
				<div class="container">
					<div class="row">
						<input type="text" name="st" style="display: none;">
						<section style="margin-top: 30px;margin-bottom: 50px;">
							<div class="col-md-6 col-md-offset-3 col-sm-6 col-sm-offset-3">
								<div class="formregis">
									<p class="text-center" style="font-family: Comic Sans, Comic Sans MS, cursive;">
										<i class="fa fa-gavel fa-3x"></i>
										PraMool.Com
									</p>
									<p class="text-center">
										<span id="txtshowerror" style="font-family: 'cs_prakasregular','Raleway', Arial, Helvetica, sans-serif;color: #FF0000">
										</span>
									</p>
										<hr style="margin-top: 0px;"/><!--ขีดเส้น-->
								<!--<fieldset>
									<legend>Legend</legend>-->
										<form id="registerform" class="form-horizontal">
											<div id="Duser" class="form-group">
												<label for="txtuser" class="col-sm-3 control-label" style="padding-right: 0px;">
													Username :
												</label>
												<div class="col-sm-9">
													<input type="text" class="form-control" id="txtuser" name="txtuser" placeholder="Username" onkeyup="checkusername()">
												</div>
											</div>
											<div id="Dpass" class="form-group">
												<label for="txtpass" class="col-sm-3 control-label" style="padding-right: 0px;">
													Password :
												</label>
												<div class="col-sm-9">
													<input type="password" class="form-control" id="txtpass" name="txtpass" placeholder="Password">
												</div>
											</div>
											<div id="Drepass" class="form-group">
												<label for="txtrepass" class="col-sm-3 control-label" style="padding-right: 0px;">
													Re-Password :
												</label>
												<div class="col-sm-9">
													<input type="password" class="form-control" id="txtrepass" name="txtrepass" placeholder="Re-Password">
												</div>
											</div>
											<div id="Dname" class="form-group">
												<label for="txtname" class="col-sm-3 control-label" style="padding-right: 0px;">
													ชื่อ :
												</label>
												<div class="col-sm-9">
													<input type="text" name="txtname" class="form-control" id="txtname" placeholder="ชื่อ">
												</div>
											</div>
											<div id="Dsurname" class="form-group">
												<label for="txtsername" class="col-sm-3 control-label" style="padding-right: 0px;">
													นามสกุล :
												</label>
												<div class="col-sm-9">
													<input type="text" name="txtsername" class="form-control" id="txtsername" placeholder="นานสกุล">
												</div>
											</div>
											<div id="Demail" class="form-group">
												<label for="txtemail" class="col-sm-3 control-label" style="padding-right: 0px;">
													E-mail :
												</label>
												<div class="col-sm-9">
													<input type="text" name="txtemail" class="form-control" id="txtemail" placeholder="e-mail">
												</div>
											</div>
											<div id="Dtel" class="form-group">
												<label for="txttel" class="col-sm-3 control-label" style="padding-right: 0px;">
													Tel :
												</label>
												<div class="col-sm-9">
													<input type="text" name="tel" class="form-control" id="txttel" placeholder="Tel">
												</div>
											</div>
											<div class="form-group">
												<div class="col-sm-12"><!--ปุ่ม-->
													<button id="btnsave" type="button" class="btn btn-primary btn-block" onclick="saveregis();">สมัครสมาชิก</button>
												</div>
											</div>
										</form>
								<!--<fieldset>-->
								</div>
							</div>
						</section>
					</div>
				</div>
		</body>
		<script type="text/javascript">
			$(document).keypress(function(e) { //เเช็คการกดปุ่ม Enter
				var key = e.which;
				if (key == 13){
					$('button[id=btnsave]').click();
    				return false;  
				}
			});

			function saveregis(){ //ตรวจสอบค่าว่างตอนสมัครสมาชิก
				if ($("input[name=txtuser]").val() == "") {

					$("#Dpass,#Drepass,#Dname,#Dsurname,#Demail,#Dtel").removeClass("has-warning");
					$("#Duser").addClass("has-warning");
					$("input[name=txtuser]").focus();
					$("#txtshowerror").text("Username ไม่ควรเป็นค่าว้าง !!!");

				}else if($("input[name=st]").val() == "no"){

					$("#Dpass,#Drepass,#Dname,#Dsurname,#Demail,#Dtel").removeClass("has-warning");
					$("#Duser").addClass("has-warning");
					$("#txtshowerror").text("Username นี้มีผู้ใช้แล้ว !!!");
					$("input[name=txtuser]").focus();

				} else if($("input[name=txtpass]").val() == ""){

					$("#Duser,#Drepass,#Dname,#Dsurname,#Demail,#Dtel").removeClass("has-warning");
					$("#Dpass").addClass("has-warning");
					$("input[name=txtpass]").focus();
					$("#txtshowerror").text("Password ไม่ควรเป็นค่าว้าง !!!");

				}else if($("input[name=txtrepass]").val() == ""){

					$("#Duser,#Dpass,#Dname,#Dsurname,#Demail,#Dtel").removeClass("has-warning");
					$("#Drepass").addClass("has-warning");
					$("input[name=txtrepass]").focus();
					$("#txtshowerror").text("Re-Password ไม่ควรเป็นค่าว้าง !!!");

				}else if($("input[name=txtpass]").val() != $("input[name=txtrepass]").val()){
					$("#Duser,#Dname,#Dsurname,#Demail,#Dtel").removeClass("has-warning");
					$("#Drepass,#Dpass").addClass("has-warning");
					$("input[name=txtpass]").focus();
					$("#txtshowerror").text("Password ไม่เหมือนกัน !!!");

				}else if($("input[name=txtname]").val() == ""){

					$("#Duser,#Dpass,#Drepass,#Dsurname,#Demail,#Dtel").removeClass("has-warning");
					$("#Dname").addClass("has-warning");
					$("input[name=txtname]").focus();
					$("#txtshowerror").text("ชื่อไม่ควรเป็นค่าว้าง !!!");

				}else if($("input[name=txtsername]").val() == ""){

					$("#Duser,#Dpass,#Drepass,#Dname,#Demail,#Dtel").removeClass("has-warning");
					$("#Dsurname").addClass("has-warning");
					$("input[name=txtsername]").focus();
					$("#txtshowerror").text("นามสกุลไม่ควรเป็นค่าว้าง !!!");

				}else if($("input[name=txtemail]").val() == ""){

					$("#Duser,#Dpass,#Drepass,#Dname,#Dsurname,#Dtel").removeClass("has-warning");
					$("#Demail").addClass("has-warning");
					$("input[name=txtemail]").focus();
					$("#txtshowerror").text("email ไม่ควรเป็นค่าว้าง !!!");

				}else if($("input[name=tel]").val() == ""){

					$("#Duser,#Dpass,#Drepass,#Dname,#Dsurname,#Demail").removeClass("has-warning");
					$("#Dtel").addClass("has-warning");
					$("input[name=tel]").focus();
					$("#txtshowerror").text("Tel ไม่ควรเป็นค่าว้าง !!!");

				}else{
					$.ajax({
						url: 'saveregister.php',
						type: 'POST',
						data: $('#registerform').serialize(),
						cache: false,
				        beforeSend: function(){
				        	$("#overlay,#load_show").fadeToggle('400')
				        	$("body").css("overflow", "hidden");
				        },
						success: function(ee){
							$("#overlay,#load_show").fadeToggle('100');
							$("#txtshowerror").html(ee);
							setTimeout(function(){ $("body").css("overflow", "auto"); }, 1000);
							bootbox.alert("สมัครสมาชิกเรียบร้อยแล้วค่ะ", function(){ 
								window.location.href = "index.php";
							 });
						}
					});
				}
			}

			function checkusername(){
				var username = $("input[name=txtuser]").val();
					$.ajax({
						url: 'checkuser.php',
						type: 'POST',
						data:{
							user: username
						} ,
				        /*beforeSend: function(){
				        	$("#overlay,#load_show").fadeToggle('400')
				        	$("body").css("overflow", "hidden");
				        },*/
						success: function(ee){
							//$("#overlay,#load_show").fadeToggle('400');
							$("input[name=st]").val(ee);
						}
					});
			}
				
		</script>
</html>