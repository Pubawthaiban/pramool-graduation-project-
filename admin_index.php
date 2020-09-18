<?php require_once 'adminform.php'; date_default_timezone_set('Asia/Bangkok');?>

	<div class="container" id="showproduct" style="padding-top: 64px;">

	</div>

	<script type="text/javascript">
		$(function(){

			var $container = $("#showproduct");
	        $container.load("showadminnow.php");
	        var refreshId = setInterval(function()
	        {
	            $container.load('showadminnow.php');
	        }, 2500);

			/*var dt = new Date();
			var time = dt.getDate() + "/" + dt.getMonth() + "/" + dt.getHours() + ":" + dt.getMinutes() + ":" + dt.getSeconds();
			$(".showtime").html(time);
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
			 });*/
		});

			/* function start(){
			 	$('.clock').countdown('start');
			 }

			 function stop(){
			 	$('.clock').countdown('stop');
			 }

			 function pause(){
			 	$('.clock').countdown('pause');
			 	alert($('.clock').text());
			 }

			 function resume1(){
			 	$('.clock').countdown('resume');
			 }

			 //<?= date("Y/m/d H:i:s", mktime(date("H"), date("i")+0, date("s")+0, date("m")+0  , date("d")+ $sqllis['pramoolday'], date("Y")+0)) ?>
			 function stratpramool(){
			 	alert();
			 }

				<!--<?php echo date('Y-m-d H:i:s', strtotime("+0 days 05 hours 00 seconds")); ?>

				<div class="clock"></div>

				<a href="#" class="btn btn-info" onclick="stop();">stop</a>
				<a href="#" class="btn btn-warning" onclick="start();">start</a>
				<a href="#" class="btn btn-primary" onclick="pause()">pause</a>
				<a href="#" class="btn btn-success" onclick="resume1()">resume</a>-->
			 */



			 function stratpramool(d,t,id){
			 	$.ajax({
			 		url: 'update_product.php',
			 		type: 'POST',
			 		data: {dates: d, times: t, id: id},
			 		cache: false,
			 		success: function(s){
							
						}
			 	});
			 	
			 }

	</script>

