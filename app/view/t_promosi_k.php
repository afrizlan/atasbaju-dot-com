<?php
	$host="localhost"; 
	$username="root"; 
	$password=""; 
	mysql_connect("$host", "$username", "$password")or die("cannot connect server "); 
	mysql_select_db('atasbajucom')or die("cannot select DB");

	$jenis_query = "SELECT * FROM kegiatan";
	$jenis_result = mysql_query($jenis_query);
?>

<div id="tambah_promosi_k">
	
	<div id="title">
		TAMBAH PROMOSI KEGIATAN
	</div>

	<div id="form">
	<form method="post" action="tPromosi.php">
	<div class="tp_form" id="tp_form_p">
			<table>

                 <tr>
					<td>Keterangan</td>
					<td>:</td>
					<td colspan="3"><input type="text" name="keterangan" /></td>
  				 </tr>
			</table>
			
		    <table>
				<tr>
					<td>
						<input type="submit" class="saves" name="simpan" value="Simpan">
					</td>
				</tr>	
			</table>
	
	</div>
	</form>
	</div>
	
</div>

<?php
include ("connect.php");   
  
if(isset($_POST["simpan"]))
{  

	$jenis_produk = $_POST["j_produk"];
    $merk = $_POST["merk"];
	$keterangan_tambahan = $_POST["keterangan"];
	      
    $query="INSERT INTO promosi( jenis_produk, merk, keterangan_tambahan, ) 
		VALUES( '$jenis_produk', '$merk', '$keterangan_tambahan' )";
		   
		if(strlen($jenis_produk&&$merk&&$keterangan_tambahan)<1){
			echo "Semua data harus terisi!";
	}else{
		   
    	$result=mysql_query($query);            
    
		if($result){  
       		echo "Produk telah tersimpan!";
    	}else{  
       	 	echo "Data produk tidak berhasil disimpan!";  
    	}  
	}  
}
?>