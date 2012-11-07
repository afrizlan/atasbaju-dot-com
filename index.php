<?php

	$path['view']="app/view/";
	
	$title="Login Page";
	
	$header="login_header";
	$content="login";
	$footer="login_footer";
	
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
	
	include $path['view'].$header.".php";
	include $path['view'].$content.".php";
	include $path['view'].$footer.".php";