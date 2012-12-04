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
		<form class="d_form" id="d_akun_f" method="post">
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
					<td colspan="3"><input type="text" name="j_kelamin" placeholder="" /></td>
				</tr>
				<tr>
					<td>Tanggal Lahir</td>
					<td>:</td>
					<td><input class="ttl" type="text" name="tanggal" placeholder="tanggal" /></td>
					<td><input class="ttl" type="text" name="bulan" placeholder="bulan" /></td>
					<td><input class="ttl" type="text" name="tahun" placeholder="tahun" /></td>
				</tr>
			</table>
			<div class="save" next_c=".d_form" next_i="#d_perusahaan_f" prev_c=".d_form" prev_i="#d_akun_f" ><p>Simpan</p></div>
		</form>
		
		<form class="d_form" id="d_perusahaan_f" method="post">
			<table>
				<tr>
					<td>Nama Perusahaan</td>
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
					<td colspan="3"><input type="text" name="j_kelamin" placeholder="" /></td>
				</tr>
				<tr>
					<td>Tanggal Lahir</td>
					<td>:</td>
					<td><input class="ttl" type="text" name="tanggal" placeholder="tanggal" /></td>
					<td><input class="ttl" type="text" name="bulan" placeholder="bulan" /></td>
					<td><input class="ttl" type="text" name="tahun" placeholder="tahun" /></td>
				</tr>
			</table>
			<div class="save"><p>Simpan</p></div>
		</form>
		
	</div>
	
</div>