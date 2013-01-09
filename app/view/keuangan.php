<?php include "app/controller/c_data_pemasukan.php";?>
<?php include "app/controller/c_data_pengeluaran.php";?>
<link rel="stylesheet" type="text/css" href="css/keuangan-style.css"></link>
<script type="text/javascript" src="js/keuangan.js"></script>

<div id="top" class="box">
	
	<div id="top_left" class="left">
		<h3>Penjualan</h3>
		<form method="post" id="form_penjualan">
			<input type="hidden" name="func" value="input_pemasukan"></input>
			<div class="left_form" id="cb">
				<table>
					<tr>
						<td><label>Jenis Baju</label></td>
						<td>
							<select name="jenis" class="list" column="jenis_produk" next_d="merk">
								<?php
									include "app/model/formProduk.php";
									$list = new formProduk();
									$data = $list->jenis_baju();
									foreach($data as $row){
										echo "<option value='".$row['jenis']."'>".$row['jenis']."</option>";
									}
								?>
								<option value="" selected>Pilih Jenis</option>
							</select>
						</td>
					</tr>
					<tr>
						<td><label>Merk Baju</label></td>
						<td>
							<select name="merk" id="merk" class="list" column="merk" next_d="warna">
								<option value="" selected>Pilih Merk</option>
							</select>
						</td>
					</tr>
					<tr>
						<td><label>Warna Baju</label></td>
						<td>
							<select name="warna" id="warna" class="list" column="warna" next_d="jenis_ukuran">
								<option value="" selected>Pilih Warna</option>
							</select>
						</td>
					</tr>
					<tr>
						<td><label>Ukuran Baju</label></td>
						<td>
							<select name="ukuran" id="jenis_ukuran">
								<option value="" selected>Pilih Ukuran</option>
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
				<input class="button" type="reset" name="batal" value="Batal"></input>
			</div>
		</form>
		<?php
			/*if(isset($_POST['simpan1'])){
				$all_data=array(
					$_POST['jenis'],
					$_POST['merk'],
					$_POST['warna'],
					$_POST['ukuran'],
					$_POST['jumlah'],
					$_POST['tanggal'],
					$_POST['n_pembeli']
				);
				if(!in_array("",$all_data,TRUE)){
					$produk=array(
						'jenis'		=> $_POST['jenis'],
						'merk'		=> $_POST['merk'],
						'warna'		=> $_POST['warna'],
						'ukuran'	=> $_POST['ukuran'],
						'jumlah'	=> $_POST['jumlah'],
						'tanggal'	=> $_POST['tanggal']
					);
					$pembeli=array(
						'nama'=>$_POST['n_pembeli'],
						'hp'=>$_POST['hp_pembeli'],
						'email'=>$_POST['e_pembeli']
						
					);
					$keuangan=new Data_keuangan();
					$result=$keuangan->input_penjualan($produk,$pembeli);
				}else{
					echo "data yang anda masukkan tidak lengkap";
				}
			}*/
		?>
	</div>

	<div id="top_right" class="right">
		<input type="button" class="edit_filter" value="edit filter"></input>
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
							<input type="date" name="tanggal_akhir"></input>
						</td>
					</tr>
					<tr>
						<td><label>Kategori</label></td>
						<td>
							<select name="kategori[]">
								<option value="jenis">Jenis Baju</option>
								<option value="merk">Merk Baju</option>
								<option value="tanggal">Tanggal Terjual</option>
								<option value="jumlah">Jumlah Terjual</option>
								<option value="ukuran">Ukuran Baju</option>
								<option value="warna">Warna Baju</option>
								<option value="" selected>Pilih Kategori</option>
							</select>
						</td>
						<td>
							<input type="text" class="nilai" name="nilai[]" placeholder="nilai kategori"></input>
						</td>
						<td></td>
					</tr>
				</table>
				<div class="bottom_cont">
					<input class="button" type="button" id="simpan2" name="simpan2" value="Cari"></input>
					<input class="button tambah_filter" type="button" name="tambah" value="Tambah Filter"></input>
				</div>
			</form>
			
		</div>
		<h3>Data Pemasukan</h3>
		<div id="thead">
			<table>
				<tr>
					<td>Tanggal</td>
					<td>Jenis</td>
					<td>Merk</td>
					<td>Ukuran</td>
					<td>Warna</td>
					<td>Jumlah</td>
				</tr>
			</table>
		</div>
		<div id="pemasukan" class="data_table">
			<table>
			<tbody>
				<?php
				$data_pemasukan	= new c_data_pemasukan();
				$data			= $data_pemasukan->get_all_data();
					foreach ($data as $row){
						echo "<tr>".
								"<td>".$row["tanggal"]."</td>".
								"<td>".$row["jenis"]."</td>".
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
		<input type="hidden" name="func_d" value="input_pengeluaran"></input>
			<div class="left_form">
				<table>
					<tr>
						<td><label>Jenis Baju</label></td>
						<td>
							<select name="jenis" class="list" column="jenis_produk" next_d="merk">
								<?php
									$data = $list->jenis_baju();
									foreach($data as $row){
										echo "<option value='".$row['jenis']."'>".$row['jenis']."</option>";
									}
								?>
								<option value="" selected>Pilih Jenis</option>
							</select>
						</td>
					</tr>
					<tr>
						<td><label>Merk Baju</label></td>
						<td>
							<select name="merk" id="merk" class="list" column="merk" next_d="warna">
								<option value="" selected>Pilih Merk</option>
							</select>
						</td>
					</tr>
					<tr>
						<td><label>Warna Baju</label></td>
						<td>
							<select name="warna" id="warna" class="list" column="warna" next_d="jenis_ukuran">
								<option value="" selected>Pilih Warna</option>
							</select>
						</td>
					</tr>
					<tr>
						<td><label>Ukuran Baju</label></td>
						<td>
							<select name="ukuran" id="jenis_ukuran">
								<option value="" selected>Pilih Ukuran</option>
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
				<input class="button" type="reset" name="batal" value="Batal"></input>
			</div>
		</form>
		<?php
			/*if(isset($_POST['simpan3'])){
				$all_data=array(
					$_POST['jenis'],
					$_POST['merk'],
					$_POST['warna'],
					$_POST['ukuran'],
					$_POST['jumlah'],
					$_POST['tanggal']
				);
				if(!in_array("",$all_data,TRUE)){
					$produk=array(
						'jenis'			=> $_POST['jenis'],
						'merk'			=> $_POST['merk'],
						'warna'			=> $_POST['warna'],
						'ukuran'		=> $_POST['ukuran'],
						'jumlah'		=> $_POST['jumlah'],
						'tanggal'		=> $_POST['tanggal'],
						'keterangan'	=> $_POST['keterangan']
					);
					$keuangan=new C_data_pengeluaran();
					$result=$keuangan->input_pengeluaran($produk);
				}else{
					echo "data yang anda masukkan tidak lengkap";
				}
			}*/
		?>
	</div>

	<div id="bottom_right" class="right">
		<input type="button" class="edit_filter" value="edit filter"></input>
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
							<input type="date" name="tanggal_akhir"></input>
						</td>
					</tr>
					<tr>
						<td><label>Kategori</label></td>
						<td>
							<select name="kategori[]">
								<option value="jenis">Jenis Baju</option>
								<option value="merk">Merk Baju</option>
								<option value="tanggal">Tanggal Terjual</option>
								<option value="jumlah">Jumlah Terjual</option>
								<option value="ukuran">Ukuran Baju</option>
								<option value="warna">Warna Baju</option>
								<option value="" selected>Pilih Kategori</option>
							</select>
						</td>
						<td>
							<input type="text" class="nilai" name="nilai[]" placeholder="nilai kategori"></input>
						</td>
						<td></td>
					</tr>
				</table>
				<div class="bottom_cont">
					<input class="button" type="button" id="simpan2" name="simpan2" value="Cari"></input>
					<input class="button tambah_filter" type="button" name="tambah" value="Tambah Filter"></input>
				</div>
			</form>
			<?php
				/*if(isset($_POST['simpan2'])){
					foreach
				}*/
			?>
		</div>
		<h3>Data Pengeluaran</h3>
		<div id="thead">
			<table>
				<tr>
					<td>Tanggal</td>
					<td>Jenis</td>
					<td>Merk</td>
					<td>Ukuran</td>
					<td>Warna</td>
					<td>Jumlah</td>
				</tr>
			</table>
		</div>
		<div id="pengeluaran" class="data_table">
			<table>
			<tbody>
				<?php
				$data_pengeluaran	= new c_data_pengeluaran();
				$data				= $data_pengeluaran->get_all_data();
					foreach ($data as $row){
						echo "<tr>".
								"<td>".$row["tanggal"]."</td>".
								"<td>".$row["jenis"]."</td>".
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

