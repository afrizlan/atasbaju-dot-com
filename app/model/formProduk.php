<?php
	$function='';
	if(isset($_GET['f'])){
		$function=$_GET['f'];
		$formProduk=new formProduk();
		if(isset($_GET['p'])){
			$parameter=explode("-",$_GET['p']);
			$formProduk->$function($parameter);
			
		}else $formProduk->$function();
	}
	
	
	

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
			$query="INSERT INTO produk( idnum, jenis_produk, merk, jenis_ukuran, jumlah, warna, harga, keterangan,  tanggal_masuk ) 
				VALUES( '$idnum', '$jenis_produk', '$merk', '$jenis_ukuran', '$jumlah', '$warna', '$harga', '$keterangan', now() )";
			$result=mysql_query($query);
		}
	}
	
	function updateProduk($data){
		$query =	"update produk set ".
					"jenis_produk='".$data['jenis']."',".
					"merk='".$data['merk']."',".
					"jenis_ukuran='".$data['ukuran']."',".
					"jumlah='".$data['jumlah']."',".
					"warna='".$data['warna']."',".
					"harga='".$data['harga']."' ".
					"where idnum=".$data['id'];
		$result	=	mysql_query($query);
		if($result){
			echo "<script>alert(data berhasil di ubah)</script>";
		}
	}
	
	function cariProduk(){
		$cari 	= $_GET['cari'];
		$query 	= "SELECT * FROM produk WHERE warna LIKE '%" . $cari . "%'";
		$result = mysql_query($query, $database);
	}
	
	function cariProduk_id($query){
		$result	= mysql_query($query);
		$data=array();
		while($row=mysql_fetch_array($result)){
			$data[]=array(
				'merk'		=> $row['merk'],
				'warna'		=> $row['warna'],
				'harga'		=> $row['harga'],
				'ukuran'	=> $row['jenis_ukuran'],
				'jumlah'	=> $row['jumlah']
			);
		}
		return $data;
	}
	
	function deleteProduk($id){
		mysql_query("delete from produk where idnum='".$id."'");
	}
	
	function jenis_baju(){
		$query	= "select distinct(jenis_produk) from produk";
		$result	= mysql_query($query);
		$data	= array();
		while($row=mysql_fetch_array($result)){
			$data[] = array(
				'jenis' => $row['jenis_produk']
			);
		}
		return $data;
	}
	
	function data_list($p){
		$query	= "select distinct(".$p[2].") from produk where ".$p[1]."='".$p[0]."'";
		$result	= mysql_query($query);
		$data	= array();
		while($row=mysql_fetch_array($result)){
			$data[] = $row[$p[2]];
		}
		
		echo json_encode($data);
	}	
}
	