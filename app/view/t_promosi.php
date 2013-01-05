<div id="tambah_promosi">
	
	<div id="title">
		TAMBAH PROMOSI
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
                    	<option value="none">Pilih Salah Satu</option>
					    <option>S</option>
					</select></td>
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
	$a=formPromosi;
	$a->tambahPromosi();
	if($a){
		$result=(strlen($jenis_produk&&$jenis_ukuran&&$keterangan)<1){
			echo "Semua data harus terisi!";
			}
	}else{   
    	if($result){  
       		echo "Produk telah tersimpan!";
    	}else{  
       	 	echo "Data produk tidak berhasil disimpan!";  
    	}  
	}
?>