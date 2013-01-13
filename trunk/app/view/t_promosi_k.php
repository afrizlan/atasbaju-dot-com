<div id="tambah_promosi_k">
	
	<div id="title">
		TAMBAH PROMOSI KEGIATAN
	</div>

	<div id="form">
	<form method="post" action="tPromosi_k.php">
	<div class="tp_form" id="tp_form_p">
			<table>
				<tr>
						<td>Pilih Kegiatan</td>
						<td>:</td>
						<td><label class="control-label" for="p_keg"></label>
                    	<select type="text" name="p_keg">
		            	</select>
                    	<option value="none">Pilih Salah Satu</option>	
						</td>
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

	$jenis_kegiatan = $_POST["p_keg"];
	$keterangan_tambahan = $_POST["keterangan"];
	      
    $query="INSERT INTO promosi( jenis_kegiatan, keterangan_tambahan, ) 
		VALUES( '$jenis_kegiatan', '$keterangan_tambahan' )";
		   
		if(strlen($jenis_kegiatan&&$keterangan_tambahan)<1){
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