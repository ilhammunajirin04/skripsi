<?php 

	session_start();

	$keranjang = $_SESSION['keranjang'];
	$id_barang = $_POST['id_barang'];
	$value = $_POST['value'];

	$keranjang[$id_barang]["jumlah"] = $value;

	$_SESSION['keranjang'] = $keranjang;

 ?>