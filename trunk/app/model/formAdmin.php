<?php
class formAdmin{
	function __construct(){
				
	}

	function updateAkun($akun,$login){
		
		$query1	=	"update akun ".
					"set ". 
					"nama_depan='".$akun['n_depan']."'".
					",nama_belakang='".$akun['n_belakang']."'".
					",email='".$akun['email']."'".
					",j_kelamin='".$akun['j_kelamin']."' ".
					"where id=".$login['id'];
		
		$query2	=	"update login ".
					"set ". 
					"username='".$login['username']."'".
					",peran=".$login['peran']." ".
					"where id=".$login['id'];
					
		echo $query2;
		mysql_query($query1);
		mysql_query($query2);
	}
	
	function deleteAdmin($id){
		mysql_query("DELETE FROM akun WHERE id='".$id."'");
		mysql_query("DELETE FROM login WHERE id='".$id."'");
		mysql_query("DELETE FROM perusahaan WHERE id='".$id."'");
	
	}
	
	function cariAkun($query){
		
		$q		= "select * from akun,login where akun.id=login.id ".$query." order by akun.id DESC";
		$lihat 	= mysql_query($q);
		
		$data=array();
		while($row = mysql_fetch_array($lihat)){
			$peran = $row['peran'];
			if($peran=="0"){
				$peran="admin";
			}else{
				$peran="pegawai";
			}
			$data[]=array(
				'id'			=> $row['id'],
				'nama_depan'	=> $row['nama_depan'],
				'nama_belakang'	=> $row['nama_belakang'],
				'email'			=> $row['email'],
				'j_kelamin'		=> $row['j_kelamin'],
				'tanggal_lahir'	=> $row['tanggal_lahir'],
				'peran'			=> $peran,
				'username'		=> $row['username']
			);
		}
		return $data;
	}
	
	function register(){
		$username = $_POST['username1'];
		$password = $_POST['password1'];
		if(!$username){
			return false;
		}else{
			if(!$password){
				return false;
			}
			$query="INSERT INTO login values ('$username', '$password')";
			$result = mysql_query($query)or die(mysql_error());
			if(!$result){
				return false;
			}
		}
	}
}
?>