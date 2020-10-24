<?php 


$host = 'localhost';
$user = 'root';
$pass = '';
$db = 'distro';

$koneksi = mysqli_connect($host, $user, $pass, $db) or die("Koneksi Database Gagal".mysqli_error($koneksi));


 ?>