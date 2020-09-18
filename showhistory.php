<?php session_start(); 
					require_once 'connect.php';

					$sql = "select * from pramool_customer where cus_id = '$_POST[ID]'";
					$s = mysql_query($sql);
					$array_user = array();

					$sqlarr = mysql_fetch_array($s);
						

					echo json_encode($sqlarr);
