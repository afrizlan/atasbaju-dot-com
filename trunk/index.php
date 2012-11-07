<?php

	$path['view']="app/view/";
	
	$header="login_header";
	$content="login";
	$footer="login_footer";
	
	$title="Login Page";
	
	if(isset($_GET['title'])){
		$title=$_GET['title'];
	}
	
	if(isset($_GET['header'])){
		$header=$_GET['header'];
	}
	
	if(isset($_GET['content'])){
		$content=$_GET['content'];
	}
	
	if(isset($_GET['footer'])){
		$footer=$_GET['footer'];
	}
	
	require $path['view'].$header.".php";
	require $path['view'].$content.".php";
	require $path['view'].$footer.".php";