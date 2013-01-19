<?php
	include "app/model/formProduk.php";
	$id			= $_GET['id'];
	$produk 	= new formProduk();
	$result		= $produk->deleteProduk($id);
	
	echo "<script>window.location='?content=s_produk'</script>";