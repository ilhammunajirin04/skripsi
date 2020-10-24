<?php 

	require '../../functions/db.php';

	session_start();
	
	$id_kategori = $_GET['id_kategori'];
	mysqli_query($koneksi, "DELETE FROM kategori WHERE id_kategori = $id_kategori");
	$_SESSION['success'] = 'Kategori berhasil dihapus';
    header('Location: index.php');

 ?>