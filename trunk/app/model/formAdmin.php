<?php
class formAdmin{
	function __construct(){
				
	}

	function editAdmin(){
		/*$nama = $_POST['nama'];
		$tgl_lahir = $_POST['tgl_lahir'];
		$alamat = $_POST['alamat'];
		$jk = $_POST['jk'];
		$username = $_POST['username'];
		$password = $_POST['password'];
		$email = $_POST['email'];
		$a = mysql_query("UPDATE akun SET nama='$nama', tgl_lahir='$tgl_lahir', alamat='$alamat', jk='$jk', username='$username, password='$password' email='$email' WHERE id_hp='$_POST[id]'") or die(mysql_error());
		*/
		
		$query1="update into login ".
					"values(".$login['username']."',md5('".$login['password']."')) WHERE id_hp='$_POST[id];";
			
		$query2="insert into akun ".
					"values(".$akun['nmama_depan']."','".$akun['nama_belakang']."'".
					",'".$akun['email']."','".$akun['j_kelamin']."','".$akun['tanggal_lahir']."') WHERE id_hp='$_POST[id];";
		
		mysql_query($query1);
		mysql_query($query2);
	}
	
	function deleteAdmin(){
		mysql_query("DELETE FROM akun WHERE id_hp='$_GET[id]'");
		//header("location:lihat.php");
	}
	
	/*
	function getId(){
		$edit = mysql_query("SELECT * FROM akun WHERE id_hp='$_GET[id]'");
		$a = mysql_fetch_array($edit);
	}
	*/
	
	function cariAkun($username,$peran){
		$lihat = mysql_query("select * from akun,login where akun.id=login.id and login.username='".$username."' and akun.peran='".$peran."' order by akun.id DESC");
		//$lihat = mysql_query("select * from akun");
		$data=array();
		while($row = mysql_fetch_array($lihat)){
			$data[]=array(
				'id'			=> $row['id'],
				'nama_depan'	=> $row['nama_depan'],
				'nama_belakang'	=> $row['nama_belakang'],
				'email'			=> $row['email'],
				'j_kelamin'		=> $row['j_kelamin'],
				'tanggal_lahir'	=> $row['tanggal_lahir']
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