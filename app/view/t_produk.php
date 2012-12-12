<div id="tambah">
	
	<div id="title">
		TAMBAH PRODUK
	</div>

	<div id="form">
	<form method="post">
	  <div class="t_form" id="t_form_p">
			<table>
				<tr>
					<td>Nomor ID</td>
					<td>:</td>
					<td colspan="3"><input type="text" name="n_id" placeholder="Contoh: 0123456789" /></td>
				</tr>
				<tr>
					<td>Jenis Produk</td>
					<td>:</td>
					<td colspan="3"><input type="text" name="j_produk"/></td>
				</tr>
				<tr>
					<td>Merk</td>
					<td>:</td>
					<td colspan="3"><input type="text" name="merk" placeholder="Contoh: Djay Collection" /></td>
				</tr>
				<tr>
					<td>Jenis Ukuran</td>
					<td>:</td>
					<td colspan="3"><input type="text" name="j_ukuran" /></td>
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
require_once("connect.php"); 
  
if($_POST["simpan"] == "Simpan")
{  
	$idnum = $_POST["idnum"];
	$jenis_produk = $_POST["jenis_produk"];
    $merk = $_POST["merk"];
    $jenis_ukuran = $_POST["jenis_ukuran"];
	$jumlah = $_POST["jumlah"];
	$warna = $_POST["warna"];	
	$harga = $_POST["harga"];
	$keterangan = $_POST["keterangan"];
	$datetime=date("d-m-y h:i:s");
      
    $query="INSERT INTO produk( idnum, jenis_produk, merk, jenis_ukuran, jumlah, warna, harga, tanggal_masuk ) 
		VALUES( '$idnum', '$jenis_produk', '$merk', '$jenis_ukuran', '$jumlah', '$warna', '$harga', '$keterangan' )";   
    $result=mysql_query($query);            
    
	if($result){  
        echo "Produk telah tersimpan!";
    }else{  
        echo "Data produk tidak berhasil disimpan!";  
    }  
}  
?>
	
	</div>
	</form>
	</div>
	
</div>