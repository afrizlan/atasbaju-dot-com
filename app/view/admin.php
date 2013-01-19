<link rel="stylesheet" href="css/admin-style.css"></link>
<script type="text/javascript" src="js/admin.js"></script>
<?php
	session_start();
	include "app/model/formAdmin.php";
	include "app/model/M_daftar.php";
	$formAdmin	= new formAdmin();
	if (!isset($_SESSION['username']))
	{
		echo "<h1>Anda belum login</h1>";
		header("location: index.php");
	}
?>

<div id="admin">
	
	<div id="title">
		ADMINISTRATOR
	</div>
	
	<div id="boxes">
		<ul>
			<li id="c_akun" class="box"><p>Cari Akun</p></li>
			<li id="a_akun" class="box"><p>Tambah Akun Admin</p></li>
			<li id="logout"><a href="app/model/logout.php"><p class="box">Logout</p></a></li>
		</ul>
	</div>
	
	<div id="right">
		<div id="ts"></div>
		<center><form method="post" action="http://localhost/atasbaju/?content=admin">
				<div class="d_form"> 
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
					<input type="submit" name="cari" value="cari" id="cari_akun"></input>
				</div>
		</form>
	
		<div id="hasil_cari">
			<br><br><h5>Daftar Akun<hr width=700 size=2></h5>
			<table class="table" style="font-size:14px; border-spacing:0px; width:100%">
				<font color=white>
				<tr height="25" bgcolor="#0066FF">
				<td rowspan="1" valign="middle"><center>No.</center></td>
				<td rowspan="1" valign="middle"><center>Nama Depan</center></td>
				<td rowspan="1" valign="middle"><center>Nama Belakang</center></td>
				<td rowspan="1" valign="middle"><center>Username</center></td>
				<td rowspan="1" valign="middle"><center>Email</center></td>
				<td rowspan="1" valign="middle"><center>Jenis Kelamin</center></td>
				<td rowspan="1" valign="middle"><center>Peran</center></td>
				<td rowspan=1 valign=center align=center></td>
				<td rowspan=1 valign=center align=center></td>
				</tr>
				</font>
				  
				<?php
				$query='';
				if(isset($_POST['cari'])){
					$no = 1;
					if($_POST['username']!=""){
						$query	.= "and login.username='".$_POST['username']."'";
					}
					if($_POST['peran']!=""){
						$peran	= $_POST['peran'];
						
						if($peran == "admin"){
							$query	.= "and login.peran=0";
						}else{
							$query	.= "and login.peran=1";
						}
						
					}
					$data=$formAdmin->cariAkun($query);
					foreach($data as $row){
						echo	"<tr>
									<td>$no.</td>
									<td>$row[nama_depan]</td>
									<td>$row[nama_belakang]</td>
									<td>$row[username]</td>
									<td>$row[email]</td>
									<td>$row[j_kelamin]</td>
									<td>$row[peran]</td>
									<td align=center><a style='text-decoration:underline;color:blue;' class=btn btn-primary btn-small href='http://localhost/atasbaju/?content=edit&id=$row[id]'>Edit</a></li></ul></td>
									<td align=center><a style='text-decoration:underline;color:blue;' class=btn btn-primary btn-small href='http://localhost/atasbaju/?content=delete&id=$row[id]'>Hapus</a></li></ul></td>
								</tr>";
						$no++;
						}
				}
					?>
			</table></center>
		</div>
	</div>
	
	<div id="toShow">
		
		<div id="c_akun">
			<form method="post">
				<div class="d_form"> 
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
					<input type="submit" name="cari" value="cari" id="cari_akun"></input>
				</div>
			</form>
		</div>
		
		<div id="a_akun">
			<form method="post">
                  <table>
                      <tr>
                            <td>Nama Depan</td>
                            <td>:</td>
                            <td colspan="3"><input type="text" name="nama_depan" placeholder="Contoh: Budi" /></td>
                        </tr>
                        <tr>
                            <td>Nama Belakang</td>
                            <td>:</td>
                            <td colspan="3"><input type="text" name="nama_belakang" placeholder="Contoh: Setiawan" /></td>
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
                <input type="submit" name="daftar" value="simpan"></input>
            </form>
		</div>
		
		<?php
		
			if(isset($_POST['daftar'])){
				
				$all_data=array(
					$_POST['nama_depan'],
					$_POST['nama_belakang'],
					$_POST['email'],
					$_POST['j_kelamin'],
					$_POST['tahun'],
					$_POST['bulan'],
					$_POST['tanggal'],
					$_POST['username'],
					$_POST['password'],
					$_POST['k_password']
				);
				
				if(!in_array("",$all_data,TRUE)){
					$akun=array(
						'n_depan'		=>$_POST['nama_depan'],
						'n_belakang'	=>$_POST['nama_belakang'],
						'email'			=>$_POST['email'],
						'j_kelamin'		=>$_POST['j_kelamin'],
						'tanggal'		=>$_POST['tahun']."-".$_POST['bulan']."-".$_POST['tanggal']					
					);
				
					$login=array(
						'username'	=> $_POST['username'],
						'password'	=> $_POST['password'],
						'k_password'=> $_POST['k_password'],
						'peran'		=> 0
					);
					$daftar	= new M_daftar() ;
					$result	= $daftar->insert($login,$akun);
					
				}else echo ("data yang anda masukkan tidak lengkap!");
			}
		?>
		
		<div id="e_akun">
			<form method="post">
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
			<input type="submit" name="update" value="simpan"></input>
			</form>
		</div>
		
		<?php
			if (isset($_POST['update'])){
				$all_data=array(
					$_POST['nama_depan'],
					$_POST['nama_belakang'],
					$_POST['email'],
					$_POST['j_kelamin'],
					$_POST['tahun'],
					$_POST['bulan'],
					$_POST['tanggal'],
					$_POST['username'],
					$_POST['password'],
					$_POST['k_password'],
				);
				
				if(!in_array("",$all_data,TRUE)){
					$akun=array(
						'nama_depan'=>$_POST['nama_depan'],
						'nama_belakang'=>$_POST['nama_belakang'],
						'email'=>$_POST['email'],
						'j_kelamin'=>$_POST['j_kelamin'],
						'tanggal_lahir'=>$_POST['tahun']."-".$_POST['bulan']."-".$_POST['tanggal']					
					);
				
					$login=array(
						'username'=>$_POST['username'],
						'password'=>$_POST['password'],
						'k_password'=>$_POST['k_password']
					);
					
					$result=$formAdmin->editAdmin($akun,$login);
				}else echo ("data yang anda masukkan tidak lengkap!");
			}
		?>
		
	</div>
	
	<div id="logout">
      
    </div>
</div>