<?php

	class M_daftar{
		function __construct(){
		
		}
		
		function insert($login,$akun,$perusahaan){
			$max;
			$query="select max(id) as max from login";
			$result=mysql_query($query);
			while($row=mysql_fetch_array($result)){
				$max=(int)$row['max'];
			}
			
			$query1="insert into login ".
					"values(".($max+1).",'".$login['username']."',md5('".$login['password']."'));";
			
			$query2="insert into akun ".
					"values(".($max+1).",'".$akun['n_depan']."','".$akun['n_belakang']."'".
					",'".$akun['email']."','".$akun['j_kelamin']."','".$akun['tanggal']."');";
					
			$query3="insert into perusahaan ".
					"values(".($max+1).",'".$perusahaan['n_per']."','".$perusahaan['e_per']."'".
					",'".$perusahaan['tel_per']."','".$perusahaan['f_per']."','".$perusahaan['a_per']."'".
					",'".$perusahaan['k_per']."','".$perusahaan['kec_per']."','".$perusahaan['kel_per']."');";
			
			mysql_query($query1);
			mysql_query($query2);
			mysql_query($query3);
			
		}
	}