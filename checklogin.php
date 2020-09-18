<?php session_start();
	require_once 'connect.php';// เชื่อมต่อ desses

	$sql = mysql_query("select cus_id, cus_name, cus_surname from pramool_customer where cus_username = '$_POST[username]' and cus_password = '$_POST[password]'");
	$fac = mysql_fetch_array($sql);

	if ($fac){
		$_SESSION['userid'] = $fac['cus_id'];
		$_SESSION['Fullnamw'] = $fac['cus_name']." ".$fac['cus_surname'];
		echo "pass";
	}else{
		echo "no";
	}