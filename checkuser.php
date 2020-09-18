<?php
	require_once 'connect.php';// เชื่อมต่อ desses

	if (!empty($_POST['user'])){
		$sql = mysql_query("select cus_username from pramool_customer where cus_username = '$_POST[user]'");
		$checkuser = mysql_fetch_array($sql);
		if ($checkuser > 0){
			echo "no";
		}else{
			echo "yes";
		}	
	}else{
		echo "yes";
	}