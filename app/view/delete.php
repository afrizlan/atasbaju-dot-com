<?php
	include "app/model/formAdmin.php";
	$id		= $_GET['id'];
	$admin 	= new formAdmin();
	$result	= $admin->deleteAdmin($id);
	
	echo "<script>window.location='?content=admin'</script>";