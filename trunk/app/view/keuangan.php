<?php include "app/model/M_keuangan.php";?>
<link rel="stylesheet" type="text/css" href="css/keuangan-style.css"></link>
<script type="text/javascript" src="js/keuangan.js"></script>

<div id="top" class="box">
	
	<div id="top_left" class="left">
		<h3>Penjualan</h3>
		<form method="post">
			<div class="left_form">
				<table>
					<tr>
						<td><label>Merk Baju</label></td>
						<td>
							<select name="merk">
							
								<option value="merk1">Merk1</option>
								<option value="merk2">Merk2</option>
								<option value="merk2">Merk3</option>
							</select>
						</td>
					</tr>
					<tr>
						<td><label>Warna Baju</label></td>
						<td>
							<select name="warna">
								<option value="merah">Merah</option>
								<option value="kuning">Kuning</option>
								<option value="hijau">Hijau</option>
							</select>
						</td>
					</tr>
					<tr>
						<td><label>Ukuran Baju</label></td>
						<td>
							<select name="ukuran">
								<option value="s">S</option>
								<option value="m">M</option>
								<option value="l">L</option>
							</select>
						</td>
					</tr>
					<tr>
						<td><label>Jumlah Terjual</label></td>
						<td><input type="text" name="jumlah"></input></td>
					</tr>
					<tr>
						<td><label>Tanggal</label></td>
						<td><input type="date" name="tanggal"></input></td>
					</tr>
				</table>
			</div>
			<div class="right_form">
				<fieldset>
				<legend>Detail Pembeli</legend>
				<table>
					<tr>
						<td><label>Nama</label></td>
						<td><input type="text" name="n_pembeli"></input></td>
					</tr>
					<tr>
						<td><label>No.HP</label></td>
						<td><input type="text" name="hp_pembeli"></input></td>
					</tr>
					<tr>
						<td><label>Email</label></td>
						<td><input type="text" name="e_pembeli"></input></td>
					</tr>
				</table>
				</fieldset>
			</div>
			<div id="button_cont">
				<input class="button" type="submit" name="simpan1" value="Simpan"></input>
				<input class="button" type="button" name="batal" value="Batal"></input>
			</div>
		</form>
		<?php
			if(isset($_POST['simpan1'])){
				$all_data=array(
					$_POST['merk'],
					$_POST['warna'],
					$_POST['ukuran'],
					$_POST['jumlah'],
					$_POST['tanggal'],
					$_POST['n_pembeli']
				);
				if(!in_array("",$all_data,TRUE)){
					$produk=array(
						'merk'=>$_POST['merk'],
						'warna'=>$_POST['warna'],
						'ukuran'=>$_POST['ukuran'],
						'jumlah'=>$_POST['jumlah'],
						'tanggal'=>$_POST['tanggal'],
					);
					$pembeli=array(
						'nama'=>$_POST['n_pembeli'],
						'hp'=>$_POST['hp_pembeli'],
						'email'=>$_POST['e_pembeli'],
						
					);
					$keuangan=new M_keuangan();
					$result=$keuangan->input_penjualan($produk,$pembeli);
				}else{
					echo "data yang anda masukkan tidak lengkap";
				}
			}
		?>
	</div>

	<div id="top_right" class="right">
		<input type="button" id="edit_filter" value="edit filter"></input>
		<div class='add_filter'>
			<div class="close_filter">x</div>
			<form method>
				<table>
					<tr>
						<td><label>Periode</label></td>
						<td>
							<input type="date" name="tanggal_awal"></input>
						</td>
						<td>
							<input type="date" name="tanggal_awal"></input>
						</td>
					</tr>
					<tr>
						<td><label>Kategori</label></td>
						<td>
							<select name="kategori">
								<option value="nama">Nama Baju</option>
								<option value="merk">Merk Baju</option>
								<option value="tanggal">Tanggal Terjual</option>
								<option value="jumlah">Jumlah Terjual</option>
								<option value="pilih" selected>Pilih Kategori</option>
							</select>
						</td>
						<td>
							<input type="text" name="nilai" placeholder="nilai kategori"></input>
						</td>
						<td></td>
					</tr>
				</table>
				<div class="bottom_cont">
					<input class="button" type="submit" name="simpan2" value="Cari"></input>
					<input class="button tambah_filter" type="button" name="tambah" value="Tambah Filter"></input>
				</div>
			</form>
		</div>
		<h3>Data Pemasukan</h3>
		<div id="thead">
			<table>
				<tr>
					<td>Tanggal</td>
					<td>Merk</td>
					<td>Ukuran</td>
					<td>Warna</td>
					<td>Jumlah</td>
				</tr>
			</table>
		</div>
		<div id="pemasukan">
			<table>
			<tbody>
				<?php
				$keuangan=new M_keuangan();
				$data=$keuangan->get_penjualan();
					foreach ($data as $row){
						echo "<tr>".
								"<td>".$row["tanggal"]."</td>".
								"<td>".$row["merk"]."</td>".
								"<td>".$row["ukuran"]."</td>".
								"<td>".$row["warna"]."</td>".
								"<td>".$row["jumlah"]."</td>".
							"</tr>";
					}
				?>
			</tbody>
			</table>
		</div>
		
	</div>
	
</div>

<div id="bottom" class="box">

	<div id="bottom_left" class="left">
		<h3>Pengeluaran</h3>
		<form method="post">
			<div class="left_form">
				<table>
					<tr>
						<td><label>Merk Baju</label></td>
						<td>
							<select name="merk">
								<option value="merk1">Merk1</option>
								<option value="merk2">Merk2</option>
								<option value="merk2">Merk3</option>
							</select>
						</td>
					</tr>
					<tr>
						<td><label>Warna Baju</label></td>
						<td>
							<select name="warna">
								<option value="merah">Merah</option>
								<option value="kuning">Kuning</option>
								<option value="hijau">Hijau</option>
							</select>
						</td>
					</tr>
					<tr>
						<td><label>Ukuran Baju</label></td>
						<td>
							<select name="ukuran">
								<option value="s">S</option>
								<option value="m">M</option>
								<option value="l">L</option>
							</select>
						</td>
					</tr>
					<tr>
						<td><label>Jumlah Produk</label></td>
						<td><input type="text" name="jumlah"></input></td>
					</tr>
					<tr>
						<td><label>Tanggal</label></td>
						<td><input type="date" name="tanggal"></input></td>
					</tr>
				</table>
			</div>
			<div class="right_form">
				<table>
				<tr><td><label>Keterangan</label></td></tr>
				<tr>
					<td><textarea name="keterangan"></textarea></td>
				</tr>
				</table>
			</div>
			<div class="button_cont">
				<input class="button" type="submit" name="simpan3" value="Simpan"></input>
				<input class="button" type="button" name="batal" value="Batal"></input>
			</div>
		</form>
		<?php
			if(isset($_POST['simpan3'])){
				$all_data=array(
					$_POST['merk'],
					$_POST['warna'],
					$_POST['ukuran'],
					$_POST['jumlah'],
					$_POST['tanggal']
				);
				if(!in_array("",$all_data,TRUE)){
					$produk=array(
						'merk'=>$_POST['merk'],
						'warna'=>$_POST['warna'],
						'ukuran'=>$_POST['ukuran'],
						'jumlah'=>$_POST['jumlah'],
						'tanggal'=>$_POST['tanggal'],
						'keterangan'=>$_POST['keterangan']
					);
					$keuangan=new M_keuangan();
					$result=$keuangan->input_pengeluaran($produk);
				}else{
					echo "data yang anda masukkan tidak lengkap";
				}
			}
		?>
	</div>

	<div id="bottom_right" class="right">
		<h3>Data Pengeluaran</h3>
		<form>
			<table>
				<tr>
					<td colspan="2"><label>Filter Berdasarkan : <label></td>
					<td colspan="2"><label>Periode : </label></td>
				</tr>
				<tr>
					<td>
						<select name="kategori">
							<option value="nama">Nama Baju</option>
							<option value="merk">Merk Baju</option>
							<option value="tanggal">Tanggal Terjual</option>
							<option value="jumlah">Jumlah Terjual</option>
							<option value="pilih" selected>Pilih Kategori</option>
						</select>
					</td>
					<td>
						<input type="text" name="nilai" placeholder="nilai kategori"></input>
					</td>
					<td>
						<input type="date" name="tanggal_awal"></input>
					</td>
					<td>
						<input type="date" name="tanggal_awal"></input>
					</td>
				</tr>
			</table>
			<div class="bottom_cont">
				<input class="button" type="submit" name="simpan4" value="Simpan"></input>
				<input class="button" type="button" name="tambah" value="Tambah Filter"></input>
			</div>
		</form>
		<div id="thead">
			<table>
				<tr>
					<td>Tanggal</td>
					<td>Merk</td>
					<td>Ukuran</td>
					<td>Warna</td>
					<td>Jumlah</td>
				</tr>
			</table>
		</div>
		<div id="pemasukan">
			<table>
			<tbody>
				<?php
				$keuangan=new M_keuangan();
				$data=$keuangan->get_pengeluaran();
					foreach ($data as $row){
						echo "<tr>".
								"<td>".$row["tanggal"]."</td>".
								"<td>".$row["merk"]."</td>".
								"<td>".$row["ukuran"]."</td>".
								"<td>".$row["warna"]."</td>".
								"<td>".$row["jumlah"]."</td>".
							"</tr>";
					}
				?>
			</tbody>
			</table>
		</div>
	</div>
	
</div>

