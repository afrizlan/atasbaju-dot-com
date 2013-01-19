<?php
	
	if(isset($_POST['via_ajax'])){
		include "../model/pengeluaran.php";
		include "../config/config.php";
		include "../model/connect.php";
		
	}else{
		include "app/model/pengeluaran.php";
	}
		
	$data_pengeluaran	= new C_pengeluaran();
	
	if(isset($_POST['func'])){
		if(isset($_GET['p'])){
			$data = $data_pengeluaran->$_POST['func']($_GET['p']);
		}else{
			$data = $data_pengeluaran->$_POST['func']();
		}
		
		if(!isset($_POST['via_ajax'])){
			echo 	"<script>".
					"alert('".$data."');".
					"</script>";
		}
	}
	
	
	class C_pengeluaran{
		var $jenis;
		var $merk;
		var $warna;
		var $ukuran;
		var $jumlah;
		var $tanggal;
		var $keterangan;
		var $message;
		var $pengeluaran;
		
		function __construct(){
			$this->pengeluaran	= new Pengeluaran();
		}
		
		function input_pengeluaran(){
			$required_data	= array(
				$_POST['jenis'],
				$_POST['merk'],
				$_POST['warna'],
				$_POST['ukuran'],
				$_POST['jumlah'],
				$_POST['tanggal'],
				$_POST['keterangan']
			);
			if(!in_array("",$required_data, TRUE)){
				$this->jenis			= $_POST['jenis'];
				$this->merk				= $_POST['merk'];
				$this->warna			= $_POST['warna'];
				$this->ukuran			= $_POST['ukuran'];
				$this->jumlah			= $_POST['jumlah'];
				$this->tanggal			= $_POST['tanggal'];
				$this->keterangan		= $_POST['keterangan'];
				
				$result			= $this->pengeluaran->insert_data($this);
				$this->message	= "data berhasil diinputkan";
				return $this->message;
				
			}else{
				$this->message 	= "data yang anda masukkan tidak lengkap";
				return $this->message;
			}
			
		}
		
		function get_all_data(){
			$data	= $this->pengeluaran->select_all();
			if($data->status){
				return $data->data;
			}else return $data->error_message;
			
		}
		
		function get_pengeluaran_by_category($condition){
			$this->condition	= $condition;
			$data				= $this->pengeluaran->select($this);
		}
		
	
	}