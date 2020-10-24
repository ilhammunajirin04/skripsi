<?php 

require_once "core/init.php";

$id_barang = $_GET['id_barang'];

$query = "SELECT nama_barang, gambar, harga FROM barang WHERE id_barang = '$id_barang'";
$result = mysqli_query($koneksi, $query);
$row = mysqli_fetch_assoc($result);

$keranjang = isset($_SESSION['keranjang']) ? $_SESSION['keranjang'] : false;	

$keranjang[$id_barang] = [
							"nama_barang" => $row['nama_barang'],
							"gambar" => $row['gambar'],
							"harga" => $row['harga'],
							"jumlah" => 1
 						 ];

$_SESSION['keranjang'] = $keranjang;

header('Location: index.php');
					 

?>
