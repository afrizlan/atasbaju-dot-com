<?php
class formWEB{
	function daftarUser(){
		$nama = $_POST['nama'];
		$tgl_lahir = $_POST['tgl_lahir'];
		$alamat = $_POST['alamat'];
		$jk = $_POST['jk'];
		$username = $_POST['username'];
		$password = $_POST['password'];
		$email = $_POST['email'];
		$sql = mysql_query("INSERT INTO user values ('','$nama','$tgl_lahir','$alamat','$jk','$username','$password','$email')") or die(mysql_error());
	}
	
	function daftarAdmin(){
		$nama = $_POST['nama'];
		$tgl_lahir = $_POST['tgl_lahir'];
		$alamat = $_POST['alamat'];
		$jk = $_POST['jk'];
		$username = $_POST['username'];
		$password = $_POST['password'];
		$email = $_POST['email'];
		$sql = mysql_query("INSERT INTO admin values ('','$nama','$tgl_lahir','$alamat','$jk','$username','$password','$email')") or die(mysql_error());
	}
	
	function editAdmin(){
		$nama = $_POST['nama'];
		$tgl_lahir = $_POST['tgl_lahir'];
		$alamat = $_POST['alamat'];
		$jk = $_POST['jk'];
		$username = $_POST['username'];
		$password = $_POST['password'];
		$email = $_POST['email'];
		$a = mysql_query("UPDATE admin SET nama='$nama', tgl_lahir='$tgl_lahir', alamat='$alamat', jk='$jk', username='$username, password='$password' email='$email' WHERE id_hp='$_POST[id]'") or die(mysql_error());
	}
	
	function deleteAdmin(){
		mysql_query("DELETE FROM admin WHERE id_hp='$_GET[id]'");
		header("location:lihat.php");
	}
	
	function getId(){
		$edit = mysql_query("SELECT * FROM admin WHERE id_hp='$_GET[id]'");
		$a = mysql_fetch_array($edit);
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