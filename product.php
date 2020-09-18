<?php require_once 'adminform.php'; ?>

	<div class="container" style="padding-top: 64px;">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<form id="formproduct" class="form-horizontal" enctype="multipart/form-data">

					<div id="img" class="col-md-5 form-group">

					    <a href="#" id="eimg" class="thumbnail">
					      <img id="previewing" src="Image/no_image.jpg" height="444" width="592" alt="No Image">
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
					        <input type="text" class="form-control" id="proname" name="proname" placeholder="ชื่อสินค้า">
					    </div>

					    <div id="prices" class="form-group col-md-12">
					        <input type="number" class="form-control" id="prop" name="pricestrat" min="0" placeholder="ราคาเริ่มต้นประมูล">
					    </div>

					     <div class="form-group col-md-12" style="margin-bottom: 0px;">
					     	<div id="p1" class="form-group col-md-5">
					        	<input type="number" class="form-control" name="pricemin" min="0" placeholder="วงเงินขั้นต่ำ">
					       	</div>
					       	<label class="col-md-1 control-label">-</label>
					       	<div id="p2" class="form-group col-md-5">
					        	<input type="number" class="form-control" name="pricemax" min="0" placeholder="วงห้ามเกิน">
					       	</div>
					    </div>

					     <div class="form-group col-md-12" style="margin-bottom: 0px;">
					     	<label for="daystrat" class="col-md-12 text-left" style="padding: 0px;">เวลาในการประมูลวินค้า :</label>
					     	<div id="day" class="form-group col-md-3">
					       		 <input type="number" id="daystrat" min="0" max="31" class="form-control" name="daystrat" placeholder="วัน">
					        </div>
					        <label class="col-md-1 control-label">:</label>
					        <div id="time" class="form-group col-md-4">
									<input type="time" name="tiemstrat" class="form-control">
							</div>
							<label class="col-md-1 control-label">ชม.</label>
					    </div>

					    <div id="detail" class="form-group col-md-12" >
							<label class="col-md-12 text-left" style="padding: 0px;">คำอธิบายสินค้า :</label>
							<div class="form-group col-md-12">
								<textarea class="form-control" name="detailp" rows="3" id="detailproduct"></textarea>
							</div>
					    </div>
					</div>

					<div class="form-group col-md-12" align="center">
						<a href="#" id="submid" class="btn btn-success" style="border-radius: 70px;padding-top: 17px;padding-bottom: 17px;">บันทึก</a>
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
			$("input[name=upload]").val("");
			$('#previewing').attr('src', "Image/no_image.jpg");
			event.preventDefault();
			imgbtn();
		});

		$("#submid").click(function() {
			if($("#proname").val() == ""){
				$("#namep").addClass('has-warning');
				$("#prices,#p1,#p2,#day,#time,#detail,#eimg").removeClass('has-warning errorimg');
				$("#proname").focus();
			}else if ($("#prop").val() < 0 || $("#prop").val() == ""){
				$("#prices").addClass('has-warning');
				$("#namep,#p1,#p2,#day,#time,#detail,#eimg").removeClass('has-warning errorimg');
				$("#prop").focus();
			}else if ($("input[name=pricemin]").val() < 0 || $("input[name=pricemin]").val() == ""){
				$("#p1").addClass('has-warning');
				$("#namep,#prices,#day,#p2,#time,#detail,#eimg").removeClass('has-warning errorimg');
				$("input[name=pricemin]").focus();
			}else if($("input[name=pricemax]").val() < 0 || $("input[name=pricemax]").val() == ""){
				$("#p2").addClass('has-warning');
				$("#namep,#prices,#p1,#day,#time,#detail,#eimg").removeClass('has-warning errorimg');
				$("input[name=pricemax]").focus();
			}else if($("input[name=daystrat]").val() < 0 || $("input[name=daystrat]").val() == ""){
				$("#day").addClass('has-warning');
				$("#namep,#prices,#p1,#p2,#time,#detail,#eimg").removeClass('has-warning errorimg');
				$("input[name=daystrat]").focus();
			}else if($("input[name=tiemstrat]").val() == ""){
				$("#time").addClass('has-warning');
				$("#namep,#prices,#p1,#p2,#day,#detail,#eimg").removeClass('has-warning errorimg');
				$("input[name=tiemstrat]").focus();
			}else if($("#detailproduct").val() == ""){
				$("#detail").addClass('has-warning');
				$("#namep,#prices,#p1,#p2,#day,#time,#eimg").removeClass('has-warning errorimg');
				$("#detailproduct").focus();
			}else if($("input[name=upload]").val() == ""){
				$("#eimg").addClass('errorimg');
				$("#namep,#prices,#p1,#p2,#day,#time,#detail").removeClass('has-warning');
			}else{
				$.ajax({
					url: 'upload_product.php',
					type: 'POST',
					data: new FormData($("#formproduct")[0]),
					async: false,
				    cache: false,
				    contentType: false,
				    processData: false,
					success: function(data){
						$("#showimg_test").html(data)
					}
				});
			}
		});
	</script>

	