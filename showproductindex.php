<?php session_start(); require_once 'connect.php'; ?>

		<div class="row">
			<?php
				if(isset($_SESSION['searth'])){
				 $sql = "select *, CONCAT(pramool_customer.cus_name,' ',pramool_customer.cus_surname) as fullname 
							from pramool_product 
							INNER JOIN pramool_customer ON pramool_product.user_product = pramool_customer.cus_id
							INNER JOIN pramool_product_tyle ON pramool_product.product_tyle = pramool_product_tyle.product_tyle_ID
							WHERE pramool_product.product_tyle = '$_SESSION[searth]'";
					}else{
						$sql = "select *, CONCAT(pramool_customer.cus_name,' ',pramool_customer.cus_surname) as fullname 
							from pramool_product 
							INNER JOIN pramool_customer ON pramool_product.user_product = pramool_customer.cus_id
							INNER JOIN pramool_product_tyle ON pramool_product.product_tyle = pramool_product_tyle.product_tyle_ID";
					}
				  $result = mysql_query($sql);
				  
				  while ($sqllis = mysql_fetch_array($result)) {
				  	if ($sqllis['status'] != 0) {
				  		if ($sqllis['status'] != 8) {
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
				        <?php if($sqllis['status'] == 0) { ?>
					        <div style="text-align: center;">
					        	<?php echo $sqllis['pramoolday']."วัน"." ".$sqllis['parmooltime']."ช.ม." ?>
					        </div>
					    <?php }else{ ?>
							<div data-countdown="<?= $sqllis['time_pramool_show'] ?>" style="text-align: center;">
					        </div>
					    <?php } ?>
						<?php if(!empty($_SESSION['userid'])) { ?>
							<a href="javascript:void(0);" class="btn btn-warning btn-block" role="button">ประมูลสินค้า</a> 
						<?php }else{ ?>
							<a href="javascript:void(0);" class="btn btn-success btn-block" role="button" onclick="regis(); return false">สมัครสมาชิก</a> 
						<?php } ?>
				      </div>
				    </div>
				</div>
			  </a>
			<?php
						}
					}
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