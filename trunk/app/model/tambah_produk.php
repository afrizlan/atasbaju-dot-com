<?php  
require_once("connect.php"); 
connect_db();  
  
if($_POST["button"] == "Simpan")
{  
	$idnum = $_POST["idnum"];
	$jenis_produk = $_POST["jenis_produk"];
    $merk = $_POST["merk"];
    $jenis_ukuran = $_POST["jenis_ukuran"];
	$jumlah = $_POST["jumlah"];
	$warna = $_POST["warna"];	
	$harga = $_POST["harga"];
	$keterangan = $_POST["keterangan"];
	$datetime=date("d-m-y h:i:s");
      
    $query="INSERT INTO produk( idnum, jenis_produk, merk, jenis_ukuran, jumlah, warna, harga, tanggal_masuk ) 
		VALUES( '$idnum', '$jenis_produk', '$merk', '$jenis_ukuran', '$jumlah', '$warna', '$harga', '$keterangan' )";   
    $result=mysql_query($query);            
    
	if($result){  
        echo "Produk telah tersimpan!";
    }else{  
        echo "Data produk tidak berhasil disimpan!";  
    }  
}  
?>