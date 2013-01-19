<?php
	class Pengeluaran{
		
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
			$query		= "select * from pengeluaran";
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
		
		function insert_data(C_pengeluaran $pengeluaran){
			$this->get_max("pengeluaran");
			$query="insert into pengeluaran values(".
					($this->max+1).",".
					"'".$pengeluaran->merk."',".
					"'".$pengeluaran->warna."',".
					"'".$pengeluaran->ukuran."',".
					"".$pengeluaran->jumlah.",".
					"'".$pengeluaran->tanggal."',".
					"'".$pengeluaran->keterangan."',".
					"'".$pengeluaran->jenis."'".
					")";
			$result	= mysql_query($query);
			if(!$result){
				$this->status			= false;
				$this->error_message	= mysql_error();
				return $this;
			}else{
				$result	= mysql_query($query);
				if(!$result){
					$this->status			= false;
					$this->error_message	= mysql_error();
					return $this;
				}else{
					$this->status			= true;
				}
			}
			
		}
		
		function select(C_pengeluaran $pengeluaran){
			$data_tmp=array();
			if($pengeluaran->condition=='all'){
				$query	= " select * from pengeluaran";
			}else{
				$query	= " select * from pengeluaran where ".$pengeluaran->condition;
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