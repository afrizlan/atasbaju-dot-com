<?php
	
	$title="title=home+page";//judul halaman yang akan di tuju ketika tombol submit di klik
	$content="content=home2";//nama file yang akan di tuju ketika tombol submit di klik
	$index="http://localhost/atasbaju-dot-com/?";
	
	$url=$index.$title."&".$content;
	
?>
<link rel="stylesheet" type="text/css" href="css/style.css"></link>
<div id="content">
	<div id="login">
		<form method="post" action="<?php echo $url; ?>">
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
					<td><input type="button" class="btn btn-primary" name="signup" value="SignUp" /></td>
					<td><input type="submit" class="btn btn-primary" name="login" value="Login" /></td>
				</tr>
			</table>						
		</form>
	</div>
</div>