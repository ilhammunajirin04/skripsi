<?php ob_start();
	session_start();

  	define('base_url', 'http://localhost/distro/');

  	if( !isset($_SESSION['admin']) ){
    	header('Location: login.php');
  	}
  	
	require 'header.php';
	require 'sidebar.php';
	require 'topbar.php';
 ?>