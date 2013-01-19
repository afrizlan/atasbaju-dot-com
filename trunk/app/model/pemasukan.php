<?php
	class Pemasukan{
		
		var $status;
		var $data;
		var $error_message;
		var $max;
		
		function __construct(){
			
		}
		
		function get_max($table_name){
			$this->max;
			$query="select max(id) as max from ".$table_name;
			$result=mysql_query($query);
			while($row=mysql_fetch_array($result)){
				$this->max=(int)$row['max'];
			}
		}
		
		function select_all(){
			$query		= "select * from penjualan";
			$result		= mysql_query($query);
			$data_tmp	= array();
			if(!$result){
				$this->status			= false;
				$this->error_message	= mysql_error();
				return $this;
			}else{
				while($row = mysql_fetch_array($result)){
					$data_tmp[]	= array(
						'jenis'		=>$row['jenis'],
						'merk'		=>$row['merk'],
						'warna'		=>$row['warna'],
						'ukuran'	=>$row['ukuran'],
						'jumlah'	=>$row['jumlah'],
						'tanggal'	=>$row['tanggal']
					);
				}
				
				$this->data		= $data_tmp;
				$this->status	= true;
				return $this;
			}
			
		}
		
		function insert_data(C_pemasukan $pemasukan){
			$this->get_max("penjualan");
			$query1="insert into penjualan values(".
					($this->max+1).",".
					"'".$pemasukan->merk."',".
					"'".$pemasukan->warna."',".
					"'".$pemasukan->ukuran."',".
					"".$pemasukan->jumlah.",".
					"'".$pemasukan->tanggal."',".
					"'".$pemasukan->jenis."'".
					")";
			$query2="insert into pembeli values(".
					($this->max+1).",".
					"'".$pemasukan->nama."',".
					"'".$pemasukan->no_hp."',".
					"'".$pemasukan->email."'".
					")";
			$result	= mysql_query($query1);
			if(!$result){
				$this->status			= false;
				$this->error_message	= mysql_error();
				return $this;
			}else{
				$result	= mysql_query($query2);
				if(!$result){
					$this->status			= false;
					$this->error_message	= mysql_error();
					return $this;
				}else{
					$this->status			= true;
				}
			}
			
		}
		
		function select(C_pemasukan $pemasukan){
			$data_tmp=array();
			
			if($pemasukan->condition=='all'){
				$query	= " select * from penjualan";
			}else{
				$query	= " select * from penjualan where ".$pemasukan->condition;
			}
			
			$result	= mysql_query($query);
			if(!$result){
				$this->error_message	= mysql_error();
				
			}else{
				while($row=mysql_fetch_array($result)){
					$data_tmp[]=array(
						'jenis'		=>$row['jenis'],
						'merk'		=>$row['merk'],
						'warna'		=>$row['warna'],
						'ukuran'	=>$row['ukuran'],
						'jumlah'	=>$row['jumlah'],
						'tanggal'	=>$row['tanggal']
					);
				}
				
				$this->data		= $data_tmp;
				echo json_encode($this->data);
				
			}
		}
	}