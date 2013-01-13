<div id="tambah_promosi_k">
	
	<div id="title">
		TAMBAH KEGIATAN
	</div>

	<div id="form">
	<form method="post" action="tPromosi.php">
	<div class="tp_form" id="tp_form_p">
			<table>
            	<tr>
						<td>Nama Kegiatan</td>
						<td>:</td>
						<td colspan="3"><input type="text" name="n_keg" placeholder="Contoh: Sale 90% OFF!" /></td>
				</tr>
				<tr>
						<td>Jenis Kegiatan</td>
						<td>:</td>
						<td><label class="control-label" for="j_kegiatan"></label>
                    	<select type="text" name="j_kegiatan">
                        	<option value="none">Pilih Salah Satu</option>
					    	
						</select></td>
				 </tr>
                 <tr>
					<td>Tempat Pelaksanaan</td>
					<td>:</td>
					<td colspan="3"><input type="text" name="tempat_p" /></td>
  				 </tr>
                 
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

	$nama_keg = $_POST["n_keg"];
	$jenis_keg = $_POST["jenis_keg"];
    $tempat = $_POST["tempat_p"];
	$keterangan_tambahan = $_POST["keterangan"];
	      
    $query="INSERT INTO kegiatan( n_keg, jenis_keg, tempat_p, keterangan ) 
		VALUES( '$nama_keg', '$jenis_keg', '$tempat', '$keterangan' )";
		   
		if(strlen($nama_keg&&$jenis_keg&&$tempat&&$keterangan)<1){
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