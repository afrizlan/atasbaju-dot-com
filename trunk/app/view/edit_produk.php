<?php
	include "app/model/formProduk.php";
	$id			= $_GET['id'];
	$query		= "select * from produk where idnum='".$id."'";
	$produk		= new formProduk();
	$result		= $produk->cariProduk_id($query);
?>

<div id="edit_akun">
	<form method="post">
		<table>
			<tr>
				<td><label>Jenis</label></td>
				<td>
					<select name="jenis">
						<option value="Kemeja">Kemeja</option>
						<option value="Kaos">Kaos</option>
					</select>
				</td>
			</tr>
			<tr>
				<td><label>Merk</label></td>
				<td><input name="merk" type="text" value="<?php echo $result[0]['merk'];?>"></input></td>
			</tr>
			<tr>
				<td><label>Warna</label></td>
				<td><input name="warna" type="text" value="<?php echo $result[0]['warna'];?>"></input></td>
			</tr>
			<tr>
				<td><label>Harga</label></td>
				<td><input name="harga" type="text" value="<?php echo $result[0]['harga'];?>"></input></td>
			</tr>
			<tr>
				<td><label>Ukuran</label></td>
				<td><input name="ukuran" type="text" value="<?php echo $result[0]['ukuran'];?>"></input></td>
			</tr>
			<tr>
				<td><label>Jumlah Stock</label></td>
				<td><input name="jumlah" type="text" value="<?php echo $result[0]['jumlah'];?>"></input></td>
			</tr>
		</table>
		<input type='reset' value="reset">
		<input type='submit' name="simpan" value="simpan" style="float:left;">
		<a href="http://localhost/atasbaju/?content=s_produk" style="color:blue;text-decoration:underline;">kembali ke halaman produk</a>
	</form>
</div>
<?php
	if(isset($_POST['simpan'])){
		$data=array(
			'merk'		=> $_POST['merk'],
			'warna'		=> $_POST['warna'],
			'harga'		=> $_POST['harga'],
			'ukuran'	=> $_POST['ukuran'],
			'jumlah'	=> $_POST['jumlah'],
			'jenis'		=> $_POST['jenis'],
			'id'		=> $id
		);
		
		$produk->updateProduk($data);
		echo "<script>document.location.reload(true)</script>";
	}
?>