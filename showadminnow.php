	<?php require_once 'connect.php'; ?>
		<div class="row">
			<?php $sql = "select * from pramool_product";
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
						<?php if ($sqllis['status'] == 0) { $dates = $sqllis['pramoolday']; $datetime = $sqllis['parmooltime']; $id = $sqllis['id_product'];?>
				        	<a href="javascript:void(0);" class="btn btn-primary btn-block" onclick="stratpramool('<?= $dates ?>','<?= $datetime ?>','<?= $id ?>');return false" role="button">รอยืนยันการประมูล</a> 
						<?php }else{ ?>
							<a href="javascript:void(0);" class="btn btn-warning btn-block" role="button">อยู่ระหว่างการประมูล</a> 
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
