<?php
	include "app/model/formAdmin.php";
	$id			= $_GET['id'];
	$query		= "and login.id=".$id;
	$formAdmin	= new formAdmin();
	$result		= $formAdmin->cariAkun($query);
?>

<div id="edit_akun">
	<form method="post">
		<table>
			<tr>
				<td><label>Nama Depan</label></td>
				<td><input name="n_depan" type="text" value="<?php echo $result[0]['nama_depan'];?>"></input></td>
			</tr>
			<tr>
				<td><label>Nama Belakang</label></td>
				<td><input name="n_belakang" type="text" value="<?php echo $result[0]['nama_belakang'];?>"></input></td>
			</tr>
			<tr>
				<td><label>Username</label></td>
				<td><input name="username" type="text" value="<?php echo $result[0]['username'];?>"></input></td>
			</tr>
			<tr>
				<td><label>Email</label></td>
				<td><input name="email" type="text" value="<?php echo $result[0]['email'];?>"></input></td>
			</tr>
			<tr>
				<td><label>Jenis Kelamin</label></td>
				<td><input name="j_kelamin" type="text" value="<?php echo $result[0]['j_kelamin'];?>"></input></td>
			</tr>
			<tr>
				<td><label>Peran</label></td>
				<td>
					<select name="peran">
						<option value="0">Admin</option>
						<option value="1">Pegawai</option>
					</select>
				</td>
			</tr>
		</table>
		<input type='reset' value="reset">
		<input type='submit' name="simpan" value="simpan" style="float:left;">
		<a href="http://localhost/atasbaju/?content=admin" style="color:blue;text-decoration:underline;">kembali ke halaman admin</a>
	</form>
</div>
<?php
	if(isset($_POST['simpan'])){
		$akun=array(
			'n_depan'		=> $_POST['n_depan'],
			'n_belakang'	=> $_POST['n_belakang'],
			'email'			=> $_POST['email'],
			'j_kelamin'		=> $_POST['j_kelamin']
		);
		$login=array(
			'id'			=> $id,
			'username'		=> $_POST['username'],
			'peran'			=> $_POST['peran'],
		);
		$formAdmin->updateAkun($akun,$login);
	}
?>