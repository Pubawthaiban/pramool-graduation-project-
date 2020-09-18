<?php
		require_once 'connect.php';// เชื่อมต่อ desses
	    date_default_timezone_set('Asia/Bangkok');

	    $dates = $_POST['dates'];//วันที่จะประมูล
	    $times = $_POST['times'];//เวลาเป็น ชม
	    $id = $_POST['id'];//ID สินค้า
	    $stime = explode(":",$times);//ตัดเอาเครื่องหมาย : ออก ตัวอย่าง 22:00 พอตัดแล้ว เก็บในตัวแปร $stime[0] = 22 $stime[1] = 00
	    //มาปรับสถานะเพื่อเริ่มประมูล
	    $datelis = date('Y-m-d H:i:s', strtotime("+$dates days $stime[0] hours $stime[1] minutes 00 seconds"));
	    $sqlupdate = "update pramool_product set status = 1, time_pramool_show = '$datelis' where id_product = '$id'";

	    mysql_query($sqlupdate)or die("ERROE");

	    echo "Success";

