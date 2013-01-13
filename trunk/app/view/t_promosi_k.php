<?php
	$host="localhost"; 
	$username="root"; 
	$password=""; 
	mysql_connect("$host", "$username", "$password")or die("cannot connect server "); 
	mysql_select_db('atasbajucom')or die("cannot select DB");

	$jenis_query = "SELECT * FROM produk";
	$jenis_result = mysql_query($jenis_query);
?>

<div id="tambah_promosi">
	
	<div id="title">
		TAMBAH PROMOSI KEGIATAN
	</div>

	<div id="form">
	<form method="post" action="tPromosi.php">
	<div class="tp_form" id="tp_form_p">
			<table>
				<tr>
						<td>Jenis Produk</td>
						<td>:</td>
						<td><label class="control-label" for="j_produk"></label>
                    	<select type="text" name="j_produk">
                        	<option value="none">Pilih Salah Satu</option>
					    	<option value="kemeja">Kemeja</option>
 					    	<option value="kaos">Kaos</option>
						</select></td>
				 </tr>
				
			   	 <tr>
						<td>Pilih Baju</td>
						<td>:</td>
						<td><label class="control-label" for="p_baju"></label>
                    	<select type="text" name="p_baju">
		            	</select>
                    	<option value="none">Pilih Salah Satu</option>
					    	<?php
								while($row = mysql_fetch_array($jenis_result)){
							?>
            			<option value="<?php echo $row['jenis_produk']; ?>" onClick="">
							<?php echo $row['merk']; ?> </option>
            				<?php } ?>
						</td>
				</tr>
                
                <tr>
					<td>Keterangan Tambahan</td>
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