<?php session_start() ?>
  
 	<div id="promosi">
		<div id="slider">
			<div id="image">
				<ul>
					<li>
						<img src="img/contoh.png" />
						<div>
							Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras tristique volutpat fringilla.
							Aenean consequat auctor malesuada. Vestibulum non risus ac dolor porttitor vehicula.
						</div>
					</li>
					<li>
						<img src="img/contoh2.png" />
						<div>
							Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras tristique volutpat fringilla.
							Aenean consequat auctor malesuada. Vestibulum non risus ac dolor porttitor vehicula.
						</div>
					</li>
					<li>
						<img src="img/contoh2.png" />
						<div>
							Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras tristique volutpat fringilla.
							Aenean consequat auctor malesuada. Vestibulum non risus ac dolor porttitor vehicula.
						</div>
					</li>
					
				</ul>
			</div>
		</div>
		<div id="next" class="nav">
			<img src="img/next.png">
		</div>
		<div id="prev" class="nav">
			<img src="img/prev.png">
		</div>
		
	</div>
	
	<div id="login">
		<div id="title">LOGIN</div>
		<form id="log_form" method="post">
			<table>
				<tr>
					<td colspan="2">
						<input type="text" name="username" placeholder="username">
					</td>
				</tr>
				<tr>
					<td colspan="2">
						<input type="password" name="password" placeholder="password">
					</td>
				</tr>
				<tr>
					<td><a href="?">lupa password</a></td>
					<td><input type="submit" value="masuk" name="login"></td>
				</tr>
				<tr>
					<td colspan="2"><a href="?title=Daftar+Akun&content=daftar&header=daftar_header"><div id="daftar_a" >Daftar Akun</div></a></td>
				</tr>
			</table>
		</form>
		<?php
			include "app/model/M_login.php";
			if(isset($_POST['login'])){
				$username=htmlentities($_POST['username'],ENT_QUOTES);
				$password=htmlentities($_POST['password'],ENT_QUOTES);
				$check=new M_login();
				$result=$check->check($username,$password);
				if($result){
					if($_SESSION['peran']=="0"){
						echo "<script>window.location='?content=admin'</script>";
					}
					else{
						echo "<script>window.location='?content=keuangan'</script>";
					}
					
				}else echo "<script>window.location='?content=gagal&title=gagal+login'</script>";
			}
		?>
	</div>
		
	<div id="news">
		<div>Vivamus consectetur ornare accumsan. Duis id rhoncus tellus. In hac habitasse platea dictumst. Sed sagittis neque nec eros euismod interdum.</div>
	</div>
	
	<a href="?">
		<div id="facebook">
			<div>
				<p>Beritahu teman anda</p>
				<img src="img/fb-small.png">
			</div>
		</div>
	</a>
	
	<a href="?">
		<div id="twitter">
			<div>
				<p>Beritahu follower anda</p>
				<img src="img/twitter-small.png">
			</div>
		</div>
	</a>
	
		<a href="?">
		<div id="email">
			<div>
				<p>Kirimkan pertanyaan</p>
				<img src="img/mail-small.png">
			</div>
		</div>
	</a>
	