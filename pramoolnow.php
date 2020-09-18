<?php session_start();

	  require_once 'connect.php';// เชื่อมต่อ desses
	  date_default_timezone_set('Asia/Bangkok');
	  $nameImg = date("Y-m-d_H-i-s");
	  $check_sql = mysql_query("select cus_id from pramool_userpramool where cus_id = '$_SESSION[userid]' and id_product = '$_POST[ID]'");
	  $checkuser = mysql_fetch_array($check_sql);

	  $price = 0;

	  if($checkuser > 0){
	  	$price = $_POST['price'] ;
	  }else{
	  	$selec = "select pricestrat from pramool_product where id_product = '$_POST[ID]'";
	  	$sql_arr = mysql_query($selec);
	  	$lis = mysql_fetch_array($sql_arr);
	  	$price = $lis['pricestrat'] + $_POST['price'] ;
	}

	  $sql = "insert into pramool_userpramool (cus_id, id_product, price, date_time) 
	  		  values ('$_SESSION[userid]','$_POST[ID]','$price','$nameImg')";
	  mysql_query($sql);

	  echo "success";