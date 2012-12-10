<?php
include"conn.php";
?>
<div id="daftar">
	
	<div id="title">
		ADMINISTRATOR
	</div>

	<div id="boxes">
		<ul>
			<li id="c_akun" class="box"><a href="?"><p>Cari Akun</p></li>
			<li id="a_akun" class="box"><a href="?"><p>Tambah Akun Admin</p></li>
			<li id="logout" class="box"><a href="?"><p>Logout</p></li>
		</ul>
	</div>
    
    <div id="form">
    	<form method="post">
        	<div class="d_form" id="c_akun"> 
                <table class="table">
                    <tr>
                        <td>Username</td>
                        <td>:</td>
                        <td colspan="3"><input type="text" name="username" placeholder="Contoh: budi_set" /></td>
                    </tr>
                    <tr>
                        <td>Peran</td>
                        <td>:</td>
                        <td colspan="3"><input type="text" name="peran" placeholder="Contoh: admin, pegawai, karyawan" /></td>
                    </tr>
                </table>
                <div class="submit" next_c=".d_form" next_i="#h_akun"><p>Cari</p></div>
            </div>
        </form>
     </div>
    	
     <div id="form">
        <form method="post">
        	<div class="d_form" id="h_akun">    
            <h5>Daftar Akun<hr width=400 size=3></h5></font>
            <table class="table">
            <font color=white>
            <tr height="25" bgcolor="#0066FF">
            <td rowspan="1" valign="middle"><center>No.</center></td>
            <td rowspan="1" valign="middle"><center>Nama Depan</center></td>
            <td rowspan="1" valign="middle"><center>Nama Belakang</center></td>
            <td rowspan="1" valign="middle"><center>Username</center></td>
            <td rowspan="1" valign="middle"><center>Email</center></td>
            <td rowspan="1" valign="middle"><center>Jenis Kelamin</center></td>
            <td rowspan=1 valign=center align=center>Edit</td>
            <td rowspan=1 valign=center align=center>Hapus</td>
            </tr>
            </font>
            
            <?php
            $no = 1;
            
            $lihat = mysql_query("SELECT * FROM akun order by id_hp DESC");
            while($a = mysql_fetch_array($lihat)){
            echo"
            <tr>
            <td align=right>$no.</td>
            <td align=right>$a[nama_depan]</td>
            <td>$a[nama_belakang]</td>
            <td>$a[username]</td>
            <td>$a[email]</td>
            <td>$a[jenis_kelamin]</td>
            <td align=center><a class=btn btn-primary btn-small href=edit.php?id=$a[id_hp]>Edit</a></li></ul></td>
            <td align=center><a class=btn btn-primary btn-small href=\"delete.php?id=$a[id_hp]\">Hapus</a></li></ul></td>
            </tr>";
            $no++;
            }
            ?>
            </table>
            </div>
         </form>
      </div>
         
         <div id="form">
            <form method="post">
                <div class="d_form" id="a_akun">
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
                        <div class="save" next_c=".konf" next_i="#konfirmasi" prev_c=".d_form" prev_i="#a_akun"><p>Simpan</p></div>
                    </div>
                </div>
                
                <div class="konf" id="konfirmasi" >
			<div id="pertanyaan_akhir">
				<h4>Dengan ini saya menyatakan:</h4>
				<p>
					informasi yang saya masukkan mengenai detail akun administrator adalah benar.
				</p>
			</div>
			<div class="nav">
			
				<table>
				<tr>
					<td>
						<input type="button" class="back" next_c=".d_form" next_i="#a_akun" prev_c=".konf" prev_i="#konfirmasi" value="Kembali">
					</td>
					<td>
						<input type="submit" class="saves" name="proses" value="Proses">
					</td>
				</tr>	
				</table>
			</div>
		</div>
        
                
                