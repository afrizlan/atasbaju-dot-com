<?php
	if(isset($_POST['via_ajax'])){
		include "../model/m_data_pemasukan.php";
		include "../config/config.php";
		include "../model/connect.php";
		
	}else{
		include "app/model/m_data_pemasukan.php";
	}
	
	$data_pemasukan	= new C_data_pemasukan();
	if(isset($_POST['func'])){
		if(isset($_GET['p'])){
			$data = $data_pemasukan->$_POST['func']($_GET['p']);
		}else{
			$data = $data_pemasukan->$_POST['func']();
		}
		
		if(!isset($_POST['via_ajax'])){
			echo 	"<script>".
					"alert('".$data."');".
					"</script>";
		}
	}
	
	
	class C_data_pemasukan{
		var $jenis;
		var $merk;
		var $warna;
		var $ukuran;
		var $jumlah;
		var $tanggal;
		var $nama;
		var $no_hp;
		var $email;
		var $message;
		var $m_data_pemasukan;
		
		function __construct(){
			$this->m_data_pemasukan	= new M_data_pemasukan();
		}
		
		function input_pemasukan(){
			$required_data	= array(
				$_POST['jenis'],
				$_POST['merk'],
				$_POST['warna'],
				$_POST['ukuran'],
				$_POST['jumlah'],
				$_POST['tanggal'],
				$_POST['n_pembeli']
			);
			if(!in_array("",$required_data, TRUE)){
				$this->jenis	= $_POST['jenis'];
				$this->merk		= $_POST['merk'];
				$this->warna	= $_POST['warna'];
				$this->ukuran	= $_POST['ukuran'];
				$this->jumlah	= $_POST['jumlah'];
				$this->tanggal	= $_POST['tanggal'];
				$this->nama		= $_POST['n_pembeli'];
				$this->no_hp	= $_POST['hp_pembeli'];
				$this->email	= $_POST['e_pembeli'];
				
				$result			= $this->m_data_pemasukan->insert_data($this);
				$this->message	= "data berhasil diinputkan";
				return $this->message;
				
			}else{
				$this->message 	= "data yang anda masukkan tidak lengkap";
				return $this->message;
			}
			
		}
		
		function get_all_data(){
			$data	= $this->m_data_pemasukan->select_all();
			if($data->status){
				return $data->data;
			}else return $data->error_message;
			
		}
		
		function get_penjualan_by_category($condition){
			$this->condition	= $condition;
			$data				= $this->m_data_pemasukan->select($this);
		}
		
	
	}