<?php

	include "app/config/config.php";
	include "app/model/connect.php";
	echo "a";
	$title=$title['home'];
	$header=$header['home'];
	$content=$content['home'];
	$footer=$footer['home'];
	
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
	
	if(isset($_GET['m'])){
		include $path['model'].$_GET['m'].".php";
	}else{
		include $path['view'].$header.".php";
		include $path['view'].$content.".php";
		include $path['view'].$footer.".php";
	}
	
	
	