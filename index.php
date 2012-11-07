<?php

	$path['view']="app/view";
	
	$header="login_header.php";
	$content="login.php";
	$footer="login_footer.php";
	
	if(isset($_GET['header'])){
		$header=$_GET['header'];
	}
	
	if(isset($_GET['content'])){
		$content=$_GET['content'];
	}
	
	if(isset($_GET['footer'])){
		$footer=$_GET['footer'];
	}
	
	echo $path['view']+$header;
	/*include $content;
	include $footer;*/