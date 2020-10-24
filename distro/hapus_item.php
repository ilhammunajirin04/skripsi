<?php 

session_start();

$id_barang = $_GET['id_barang'];
$keranjang = $_SESSION['keranjang'];

unset($keranjang[$id_barang]);

$_SESSION['keranjang'] = $keranjang;

header("Location: index.php?page=keranjang");

 ?>