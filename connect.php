<?php
	$con = mysql_connect("localhost","root","sa1234");
	$con_db = mysql_select_db("db_pramool") or die("gชื่อมต่อ Dasses ไม่ได้นะจ๊ะ");
	mysql_query("SET NAMES UTF8");