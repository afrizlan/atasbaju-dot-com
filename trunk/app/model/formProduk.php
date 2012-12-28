<?php
class formProduk{
	function tambahProduk(){
		if(isset($_POST["simpan"])){  
			$idnum = $_POST["n_id"];
			$jenis_produk = $_POST["j_produk"];
			$merk = $_POST["merk"];
			$jenis_ukuran = $_POST["j_ukuran"];
			$jumlah = $_POST["jumlah"];
			$warna = $_POST["warna"];	
			$harga = $_POST["harga"];
			$keterangan = $_POST["keterangan"];
			//$datetime=date("d-m-y h:i:s");
			  
			$query="INSERT INTO produk( idnum, jenis_produk, merk, jenis_ukuran, jumlah, warna, harga, keterangan,  tanggal_masuk ) 
				VALUES( '$idnum', '$jenis_produk', '$merk', '$jenis_ukuran', '$jumlah', '$warna', '$harga', '$keterangan', now() )";
			$result=mysql_query($query);
		}
	}
	
	function cariProduk(){
		$cari = $_GET['cari'];
		$query = "SELECT * FROM produk WHERE warna LIKE '%" . $cari . "%'";
		$result = mysql_query($query, $database);
	}
	