<?php
	if(isset($_SESSION['username'])){
		include "app/model/M_login.php";
		$a=new M_login();
		$a->logout();
		
	}
?>
<script>window.location='http://localhost/atasbaju'</script>