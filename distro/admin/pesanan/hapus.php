<?php 

	require '../../functions/db.php';

	session_start();
	
	$id_pesanan = $_GET['id_pesanan'];
	mysqli_query($koneksi, "DELETE FROM pesanan WHERE id_pesanan = $id_pesanan");
	$_SESSION['success'] = 'Pesanan berhasil dihapus';
    header('Location: index.php');

 ?>