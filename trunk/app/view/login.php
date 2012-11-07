<?php
	//============================identitas halaman yang dituju=======================
	$title="Home Page";//judul halaman yang akan di tuju ketika tombol submit di klik
	$content="home";//nama file yang akan di tuju ketika tombol submit di klik
?>
<div id="content">
	<form method="post" action="http://localhost/atasbaju-dot-com/index.php?title=<?php echo $title; ?>&content=<?php echo $content; ?>">
		<table>
			<tr>
				<td>Username</td>
				<td><input type="text" name="username" placeholder="username" /></td>
			</tr>
			<tr>
				<td>Password</td>
				<td><input type="password" name="password" placeholder="password" /></td>
			</tr>
			<tr>
				<td><input type="button" name="signup" value="SignUp" /></td>
				<td><input type="submit" name="login" value="Login" /></td>
			</tr>
		</table>
		
		
	</form>
</div>