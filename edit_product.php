<?php session_start();

	  require_once 'connect.php';// เชื่อมต่อ desses
	  date_default_timezone_set('Asia/Bangkok');
	  $img_tmp = $_FILES['upload']['tmp_name'];
	  $img_name = $_FILES["upload"]["name"];
	  $img_type = substr($img_name,-4);
	 // $imgArty = array('.jpg','.png','.gif');

	 if(empty($_FILES["upload"]["name"])){

	 	$sql = "update pramool_product set nameproduct = '$_POST[proname]', pricestrat = '$_POST[pricestrat]', pricemin = '$_POST[pricemin]', pricemax = '$_POST[pricemax]', pramoolday = '$_POST[daystrat]', parmooltime = '$_POST[tiemstrat]', productdetail = '$_POST[detailp]', product_tyle = '$_POST[tyle_product]' where id_product = '$_POST[STB]'";
	   
	 }else{
	 	$nameImg = date("Y-m-d_H-i-s").$img_type;

	  move_uploaded_file($img_tmp,"Image/Img_Product/".$nameImg) ;

	  $sql = "update pramool_product set nameproduct = '$_POST[proname]', pricestrat = '$_POST[pricestrat]', pricemin = '$_POST[pricemin]', pricemax = '$_POST[pricemax]', pramoolday = '$_POST[daystrat]', parmooltime = '$_POST[tiemstrat]', productdetail = '$_POST[detailp]', productimg = '$nameImg', product_tyle = '$_POST[tyle_product]' where id_product = '$_POST[STB]'";
	
	 }
	  $sss = mysql_query($sql);

	  echo "success";