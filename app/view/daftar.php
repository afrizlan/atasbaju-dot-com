<div id="daftar">
	
	<div id="title">
		DAFTAR AKUN
	</div>

	<div id="boxes">
		<ul>
			<li id="d_akun" class="box"><p>Detail Akun</p></li>
			<li id="d_perusahaan" class="box"><p>Detail Perusahaan</p></li>
			<li id="selesai" class="box"><p>Registrasi Akun Selesai</p></li>
		</ul>
	</div>

	<div id="form">
	<form method="post">
		<div class="d_form" id="d_akun_f">
			<table>
				<tr>
					<td>Nama Depan</td>
					<td>:</td>
					<td colspan="3"><input type="text" name="n_depan" placeholder="Contoh: Budi" /></td>
				</tr>
				<tr>
					<td>Nama Belakang</td>
					<td>:</td>
					<td colspan="3"><input type="text" name="n_belakang" placeholder="Contoh: Setiawan" /></td>
				</tr>
				<tr>
					<td>Username</td>
					<td>:</td>
					<td colspan="3"><input type="text" name="username" placeholder="Contoh: budi_set" /></td>
				</tr>
				<tr>
					<td>Email</td>
					<td>:</td>
					<td colspan="3"><input type="text" name="email" placeholder="Contoh: a@mail.com" /></td>
				</tr>
				<tr>
					<td>Password</td>
					<td>:</td>
					<td colspan="3"><input type="password" name="password" placeholder="minimal 6 karakter" /></td>
				</tr>
				<tr>
					<td>Konfirmasi Password</td>
					<td>:</td>
					<td colspan="3"><input type="password" name="k_password" placeholder="minimal 6 karakter" /></td>
				</tr>
				<tr>
					<td>Jenis Kelamin</td>
					<td>:</td>
					<td colspan="3" id="pria"><input type="radio" name="j_kelamin" value="laki-laki">Laki-Laki</input>
			        <input type="radio" name="j_kelamin" value="perempuan">Perempuan</input></td>
				</tr>
				<tr>
					<td>Tanggal Lahir</td>
					<td>:</td>
					<td><input class="ttl" type="text" name="tanggal" placeholder="tanggal" /></td>
					<td><input class="ttl" type="text" name="bulan" placeholder="bulan" /></td>
					<td><input class="ttl" type="text" name="tahun" placeholder="tahun" /></td>
				</tr>
			</table>
			<div class="nav">
				<div class="save" next_c=".d_form" next_i="#d_perusahaan_f" prev_c=".d_form" prev_i="#d_akun_f"><p>Simpan</p></div>
			</div>
		</div>
		
		<div class="d_form" id="d_perusahaan_f">
			<table>
				<tr>
					<td>Nama Perusahaan</td>
					<td>:</td>
					<td colspan="3"><input type="text" name="n_per" placeholder="Contoh: PT. Maju Mundur" /></td>
				</tr>
				<tr>
					<td>Email</td>
					<td>:</td>
					<td colspan="3"><input type="text" name="e_per" placeholder="Contoh: a@mail.com" /></td>
				</tr>
				<tr>
					<td>No Telepon</td>
					<td>:</td>
					<td colspan="3"><input type="text" name="tel_per" placeholder="Contoh: 085xxxxxxxx" /></td>
				</tr>
				<tr>
					<td>Fax</td>
					<td>:</td>
					<td colspan="3"><input type="text" name="f_per" placeholder="Contoh: (031)766xxxx" /></td>
				</tr>
				<tr>
					<td>Alamat</td>
					<td>:</td>
					<td colspan="3"><input type="text" name="a_per" placeholder="Contoh: Jl. Arif Rahman" /></td>
				</tr>
				<tr>
					<td>Kota</td>
					<td>:</td>
					<td colspan="3"><input type="text" name="k_per" placeholder="Contoh: surabaya" /></td>
				</tr>
				<tr>
					<td>Kecamatan</td>
					<td>:</td>
					<td colspan="3"><input type="text" name="kec_per" placeholder="Contoh: sukolilo" /></td>
				</tr>
				<tr>
					<td>Kelurahan</td>
					<td>:</td>
					<td colspan="3"><input type="text" name="kel_per" placeholder="Contoh: gebang putih" /></td>
				</tr>
				<!--<tr>
					<td>Kota/Kec/Kel</td>
					<td>:</td>
					<td><input class="ttl" type="text" name="k_per" placeholder="Kota" /></td>
					<td><input class="ttl" type="text" name="kec_per" placeholder="Kecamatan" /></td>
					<td><input class="ttl" type="text" name="kel_per" placeholder="Kelurahan" /></td>
				</tr>-->
				
			</table>
			<div class="nav">
				<div class="back" next_c=".d_form" next_i="#d_akun_f" prev_c=".d_form" prev_i="#d_perusahaan_f" ><p>Kembali</p></div>
				<div class="save" next_c=".konf" next_i="#konfirmasi" prev_c=".d_form" prev_i="#d_perusahaan_f" ><p>Simpan</p></div>
			</div>
			
		</div>
	
		<div class="konf" id="konfirmasi" >
			<div id="pertanyaan_akhir">
				<h4>Dengan ini saya menyatakan:</h4>
				<p>
					informasi yang saya masukkan mengenai detail akun dan detail perusahaan
					benar.
				</p>
			</div>
			<div class="nav">
			
				<table>
				<tr>
					<td>
						<input type="button" class="back" next_c=".d_form" next_i="#d_perusahaan_f" prev_c=".konf" prev_i="#konfirmasi" value="Kembali">
					</td>
					<td>
						<input type="submit" class="saves" name="proses" value="Proses">
					</td>
				</tr>	
				</table>
			
			</div>
		</div>
	
		<?php
		include "app/model/M_daftar.php";
		
			if(isset($_POST['proses'])){
				
				$akun=array(
					'n_depan'=>$_POST['n_depan'],
					'n_belakang'=>$_POST['n_belakang'],
					'email'=>$_POST['email'],
					'j_kelamin'=>$_POST['j_kelamin'],
					'tanggal'=>$_POST['tahun']."-".$_POST['bulan']."-".$_POST['tanggal']					
				);
				
				$login=array(
					'username'=>$_POST['username'],
					'password'=>$_POST['password'],
					'k_password'=>$_POST['k_password']
				);
				$perusahaan=array(
					'n_per'=>$_POST['n_per'],
					'e_per'=>$_POST['e_per'],
					'tel_per'=>$_POST['tel_per'],
					'f_per'=>$_POST['f_per'],
					'a_per'=>$_POST['a_per'],
					'k_per'=>$_POST['k_per'],
					'kec_per'=>$_POST['kec_per'],
					'kel_per'=>$_POST['kel_per']
				);				
					
				$daftar=new M_daftar();
				$result=$daftar->insert($login,$akun,$perusahaan);
				
				
			}
		?>
	
	</form>
	</div>
	
</div>