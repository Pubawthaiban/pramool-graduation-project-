<?php session_start();
	require_once 'connect.php';// เชื่อมต่อ desses

	$sql = mysql_query("insert into pramool_customer (cus_username, cus_password, cus_name, cus_surname, cus_email, cus_tel)
		   values ('$_POST[txtuser]', '$_POST[txtpass]', '$_POST[txtname]', '$_POST[txtsername]', '$_POST[txtemail]', '$_POST[tel]')")or die("ERORRRRRR");

	if ($sql){
		echo "pass";
	}else{
		echo "error";
	}


	