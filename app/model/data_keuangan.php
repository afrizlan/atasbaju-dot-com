<?php

	class Data_keuangan{
		
		function __construct(){
		
		}
		
		function get_max($table_name){
			$max;
			$query="select max(id) as max from ".$table_name;
			$result=mysql_query($query);
			while($row=mysql_fetch_array($result)){
				$max=(int)$row['max'];
			}
			return $max;
		}
		
		function input_penjualan($produk=array(),$pembeli=array()){
			$max=$this->get_max("penjualan");
			$query1="insert into penjualan values(".
					($max+1).",".
					"'".$produk['merk']."',".
					"'".$produk['warna']."',".
					"'".$produk['ukuran']."',".
					"".$produk['jumlah'].",".
					"'".$produk['tanggal']."',".
					"'".$produk['jenis']."'".
					")";
			$query2="insert into pembeli values(".
					($max+1).",".
					"'".$pembeli['nama']."',".
					"'".$pembeli['hp']."',".
					"'".$pembeli['email']."'".
					")";
			mysql_query($query1);
			mysql_query($query2);
			
		}
		function get_penjualan($p=''){
			$data=array();
			$query='';
			
			if($p=='' or $p=='all')	$query="select * from penjualan";
			else 					$query="select * from penjualan where ".$p;
			//echo $query;
			$result=mysql_query($query);
			while($row=mysql_fetch_array($result)){
				$data[]=array(
					'jenis'		=>$row['jenis'],
					'merk'		=>$row['merk'],
					'warna'		=>$row['warna'],
					'ukuran'	=>$row['ukuran'],
					'jumlah'	=>$row['jumlah'],
					'tanggal'	=>$row['tanggal']
				);
			}
			if($p=='')	return $data;
			else 		echo json_encode($data);
		}
		
		function input_pengeluaran($produk){
			$max=$this->get_max("pengeluaran");
			$query="insert into pengeluaran values(".
					($max+1).",".
					"'".$produk['merk']."',".
					"'".$produk['warna']."',".
					"'".$produk['ukuran']."',".
					"".$produk['jumlah'].",".
					"'".$produk['tanggal']."',".
					"'".$produk['keterangan']."',".
					"'".$produk['jenis']."'".
					")";
			mysql_query($query);
		}
		
		function get_pengeluaran($p=''){
			$data=array();
			$query='';
			
			if($p=='' or $p=='all')	$query="select * from pengeluaran";
			else 		$query="select * from pengeluaran where ".$p;
			//echo $query;
			$result=mysql_query($query);
			while($row=mysql_fetch_array($result)){
				$data[]=array(
					'jenis'		=>$row['jenis'],
					'merk'		=>$row['merk'],
					'warna'		=>$row['warna'],
					'ukuran'	=>$row['ukuran'],
					'jumlah'	=>$row['jumlah'],
					'tanggal'	=>$row['tanggal']
				);
			}
			if($p=='')	return $data;
			else 		echo json_encode($data);
		}
		
	}

$function='';
	if(isset($_GET['f'])){
		$function=$_GET['f'];
		$keuangan=new Data_keuangan();
		if(isset($_GET['p'])){
			$parameter=$_GET['p'];
			$keuangan->$function($parameter);
			
		}else $keuangan->$function();
	}