<?php
	class M_keuangan{
		
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
					"'".$produk['tanggal']."'".
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
		function get_penjualan(){
			
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
					"'".$produk['keterangan']."'".
					")";
					echo $query;
			mysql_query($query);
		}
		
		function get_pengeluaran(){
		
		}
		
	}