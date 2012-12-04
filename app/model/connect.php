<?php
	
	$con=mysql_connect($host,$uname,$pass);
	if(!$con){
		echo "connection error:".mysql_error();
	}
	$db=mysql_select_db("atasbaju");
	if(!$db){
		echo "no database found : ".mysql_error();
	}
	