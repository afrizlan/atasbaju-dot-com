<?php

	class M_login{
		function __construct(){
		
		}
		
		function check($username,$password){
			$query="select * from akun where username=md5('".$username."') and password=md5('".$password."')";
			echo $query;
			$result=mysql_query($query);
			$row=mysql_num_rows($result);
			if($row>0){
				return true;
			}else return false;
		}
	}