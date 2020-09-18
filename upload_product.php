<?php session_start();

	  require_once 'connect.php';// เชื่อมต่อ desses
	  date_default_timezone_set('Asia/Bangkok');
	  $img_tmp = $_FILES['upload']['tmp_name'];
	  $img_name = $_FILES["upload"]["name"];
	  $img_type = substr($img_name,-4);
	 // $imgArty = array('.jpg','.png','.gif');
	  $nameImg = date("Y-m-d_H-i-s").$img_type;
	  move_uploaded_file($img_tmp,"Image/Img_Product/".$nameImg) ;
	  $sql = "insert into pramool_product (nameproduct, pricestrat, pricemin, pricemax, pramoolday, parmooltime, productdetail, productimg, status, product_tyle, user_product)
	  		  values ('$_POST[proname]', '$_POST[pricestrat]', '$_POST[pricemin]', '$_POST[pricemax]', '$_POST[daystrat]', '$_POST[tiemstrat]', '$_POST[detailp]', '$nameImg', 0, '$_POST[tyle_product]', '$_SESSION[userid]')";
	  mysql_query($sql)or die("ERORRRRRR");

			echo "success";
			
	