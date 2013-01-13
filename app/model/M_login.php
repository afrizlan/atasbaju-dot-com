<?php

	class M_login{
		function __construct(){
			
		}
		
		function check($username,$password){
			$query="select * from login where username='".$username."' and password=md5('".$password."')";
			$result=mysql_query($query);
			$row=mysql_num_rows($result);
			if($row>0){
				while($row=mysql_fetch_array($result)){
					$_SESSION['username']	= $row['username'];
					$_SESSION['peran']		= $row['peran'];
				}
				return true;
			}else return false;
		}
		
		function logout(){
			session_destroy();
		}
	}