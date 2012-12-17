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
include (connect.php);

	$cari = $_GET['cari'];
	$query = "SELECT * FROM produk WHERE warna LIKE '%" . $cari . "%'";

	$result = mysql_query($query, $database);

	echo "<table border='1'>";
	echo "<tr><td>No</td> <td>ID Produk</td> <td>Warna</td></tr>";
		for($i=0; $row = mysql_fetch_row($result); $i++){
	echo "<tr><td>$row[0]</td> <td>$row[1]</td> <td>$row[2]</td></tr>";}
	echo "</table>";
?>