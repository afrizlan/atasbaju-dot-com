<div id="tambah">
	
	<div id="title">
		TAMBAH PRODUK
	</div>

	<div id="form">
	<form method="post">
	  <div class="t_form" id="t_form_p">
			<table>                
				<tr>
					<td>Jenis Produk</td>
					<td>:</td>
					<td><label class="control-label" for="j_produk"></label>
                    <select type="text" name="j_produk">
                    	<option>Pilih salah satu</option>
					    <option>Kemeja</option>
 					    <option>Kaos</option>
					</select></td>
				</tr>
				
                <tr>
					<td>Merk</td>
					<td>:</td>
					<td colspan="3"><input type="text" name="merk" placeholder="Contoh: Djay Collection" /></td>
				</tr>
                
				<tr>
					<td>Jenis Ukuran</td>
					<td>:</td>
					<td><label class="control-label" for="j_ukuran"></label>
                    <select type="text" name="j_ukuran">
                    	<option>Pilih salah satu</option>
					    <option>S</option>
 					    <option>M</option>
                        <option>L</option>
                        <option>XL</option>
                        <option>XXL</option>
					</select></td>
				</tr>
                
				<tr>
					<td>Jumlah</td>
					<td>:</td>
					<td colspan="3"><input type="text" name="jumlah" placeholder="Contoh : 99" /></td>
				</tr>
                
				<tr>
					<td>Warna</td>
					<td>:</td>
					<td colspan="3"><input type="text" name="warna" placeholder="Contoh : hitam" /></td>
				</tr>
                
                <tr>
					<td>Harga</td>
					<td>:</td>
					<td colspan="3"><input type="text" name="harga" placeholder="Contoh : 125000" /></td>
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

<?php  

if(isset($_POST["simpan"]))
{  
	$jenis_produk = $_POST["j_produk"];
    $merk = $_POST["merk"];
    $jenis_ukuran = $_POST["j_ukuran"];
	$jumlah = $_POST["jumlah"];
	$warna = $_POST["warna"];	
	$harga = $_POST["harga"];
	$keterangan = $_POST["keterangan"];
      
    $query="INSERT INTO produk( jenis_produk, merk, jenis_ukuran, jumlah, warna, harga, keterangan,  tanggal_masuk ) 
		VALUES('$jenis_produk', '$merk', '$jenis_ukuran', '$jumlah', '$warna', '$harga', '$keterangan', now() )";
		   
		if(strlen($jenis_produk&&$jenis_ukuran&&$merk&&$jumlah&&$warna&&$harga)<1){
			echo "Semua data harus terisi!";
	}else{
		   
    	$result=mysql_query($query);            
    
		if($result){  
       		echo "<script>alert(Produk telah tersimpan!)</script>";
    	}else{  
       	 	echo "<script>alert(Data produk tidak berhasil disimpan!)</script>";  
    	}  
	}  
}
?>
	
	</div>
	</form>
	</div>
	
</div>