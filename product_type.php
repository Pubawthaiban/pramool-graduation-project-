<?php require_once 'adminform.php'; ?>

<?php
	
	if(!empty($_POST['addtyle'])){
		$sql = "insert into pramool_product_tyle (product_tyle_name) values ('$_POST[protyle]')";
		$succ = mysql_query($sql);

		if ($succ){
			$echo = '<div class="alert alert-success">
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
							บันทึกข้อมูลเรียบร้อยแล้ว
					</div>';
		}else{
			$echo =  '<div class="alert alert-error">
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
							เกิดข้อผิดพลาด !!!!!
 					</div>';
		}
	}else if (isset($_GET['delete_tyle'])){
		$sql = "delete from pramool_product_tyle where product_tyle_ID = '$_GET[tyleid]'";
		$succ = mysql_query($sql);

		if($succ){
			$echo = '<div class="alert alert-success">
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
							ลบข้อมูลเรียบร้อย
					</div>';
		}else{
			$echo =  '<div class="alert alert-error">
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
							เกิดข้อผิดพลาด !!!!!
 					</div>';
		}
	}else if(isset($_POST['edittyle'])){
		$sql = "update pramool_product_tyle set product_tyle_name = '$_POST[protyle]' where product_tyle_ID = '$_POST[edittyle]'";
		$query = mysql_query($sql);
		if($query){
			$echo = '<div class="alert alert-success">
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
							แก้ไขข้อมูลสำเร็จ
					</div>';
		}else{
			$echo =  '<div class="alert alert-error">
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
							เกิดข้อผิดพลาด !!!!!
 					</div>';
		}
	}
	

?>


<div class="container" style="padding-top: 64px;">
		<div class="row">
			<div class="col-md-4 col-md-offset-4">

				<form id="product_tyle" class="form-horizontal" action="product_type.php" method="post">
					
						<div class="form-group col-md-12" id="txttyle">
						      <input type="text"  name="protyle" placeholder="ประเภทสินค้า" class="form-control"
								<?php 
									if (isset($_GET['edit'])){
										$sql = mysql_query("select product_tyle_name, product_tyle_ID 
														  from pramool_product_tyle where product_tyle_ID = '$_GET[edit]'");
									    $lis = mysql_fetch_assoc($sql);
								?>
								value="<?= $lis['product_tyle_name']; ?>"
								<?php } ?>
						      >
						</div>
						<div class="form-group col-md-12" align="center">
							<?php if(isset($_GET['edit'])){ ?>
								<input type="hidden" name="edittyle" value="<?= $lis['product_tyle_ID']; ?>">
								<button type="button" id="save_tyle" class="btn btn-info" onclick="submitfrom();" 
										style="border-radius: 70px;padding-top: 17px;padding-bottom: 17px;">แก้ไขข้อมูล
								</button>
								<button type="button" id="save_tyle" class="btn btn-danger" onclick="submitback();" 
										style="border-radius: 70px;padding-top: 17px;padding-bottom: 17px;">ยกเลิก
								</button>
							<?php }else{ ?>
								<input type="hidden" name="addtyle" value="yes">
								<button type="button" id="save_tyle" class="btn btn-success" onclick="submitfrom();" 
										style="border-radius: 70px;padding-top: 17px;padding-bottom: 17px;">บันทึก
								</button>
							<?php } ?>
						</div>
					
				</form>

			</div>

			<div class="col-md-8 col-md-offset-2">
			
				<hr>

				<blockquote>
				  <p>ประเภทสินค้า</p>
				</blockquote>

				<?php 
					if(isset($echo)){
						echo $echo; 
					}
				?>

				<table id="SSS" class="table table-hover table-bordered">
					<tr>
						<th class="text-center">
							<label><b>ชื่อประเภทสินค้า</b></label>
						</th>
						<th class="text-center">
							<label><b>จัดการ</b></label>
						</th>
					</tr>
					<!------------------------>
					<?php
						$sql_string = 'select * from pramool_product_tyle';
						$sql = mysql_query($sql_string);
						 while( $fac = mysql_fetch_array($sql)){
					?>
					<tr>
						<td class="text-center">
							<?php echo $fac['product_tyle_name']; ?>
						</td>
						<th class="text-center">
							<button class="btn btn-default" type="button" onclick="edittyle('<?php echo $fac['product_tyle_ID']; ?>');">แก้ไข
							</button>
							<button class="btn btn-default" type="button" onclick="del('<?php echo $fac['product_tyle_ID']; ?>');">ลบ</button>
						</th>
					</tr>
					<?php } ?>
				</table>

			</div>



		</div>
</div>

<script type="text/javascript">
	
function submitfrom(){
	if($("input[name=protyle]").val() == ""){
		$("input[name=protyle]").focus();
		$("#txttyle").addClass('has-warning')
	}else{
		$("#product_tyle").submit();
	}
}

function edittyle(ID){
	window.location = "product_type.php?edit=" + ID;
}

function del(ID){
	bootbox.dialog({
	  message: "<b>คุณต้องการลบข้อมูล ใช้หรือไม่</b>",
	  title: " <i class='fa fa-trash'></i> เตือน !!!",
	  buttons: {
	  	danger: {
	      label: "ลบ",
	      className: "btn-danger",
	      callback: function() {
	        window.location = "product_type.php?delete_tyle=delete&tyleid=" + ID;
	      }
	    },
	    success: {
	      label: "ยกเลิก",
	      className: "btn-success",
	      callback: function() {
	        
	      }
	    }
	  }
	});
}

function submitback(){
	window.location = "product_type.php";
}

</script>


