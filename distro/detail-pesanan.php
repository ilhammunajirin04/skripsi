<?php

// if(!isset($_SESSION['user'])){
// 	$_SESSION['proses_pesanan'] = true;
// 	header('Location: login.php');
// }

require_once "core/init.php";
require_once "templates/header.php";
date_default_timezone_set("Asia/Bangkok");

if(isset($_POST['submit'])){

	$nama = $_POST['nama'];
	$no_wa = $_POST['no_wa'];
	$alamat = $_POST['alamat'];

	$waktu_saat_ini = date("Y-m-d H:i:s");
	$status = 0;

	$query_pesanan = "INSERT INTO pesanan(nama, no_wa, alamat, tanggal, status) VALUES('$nama', '$no_wa', '$alamat', '$waktu_saat_ini', '$status')";
	mysqli_query($koneksi, $query_pesanan);

	$id_pesanan_terakhir = mysqli_insert_id($koneksi);

	$keranjang = $_SESSION['keranjang'];
	foreach($keranjang as $key => $value) { 
  		$id_barang = $key;
  		$nama_barang = $value['nama_barang'];
  		$harga = $value['harga'];
  		$jumlah = $value['jumlah'];

  		$query_pesanan_detail = "INSERT INTO detail_pesanan(id_pesanan, id_barang, jumlah, harga) 
  							VALUES('$id_pesanan_terakhir', '$id_barang', '$jumlah', '$harga')";
  		mysqli_query($koneksi, $query_pesanan_detail);					

	}
	unset($_SESSION['keranjang']);
	header('Location: konfirmasi-pesanan.php?id_pesanan='.$id_pesanan_terakhir);
	
}

?>

<div class="container">
	<div class="row mt-4">
		<div class="col-md-6">
			<div class="card">
			  <div class="card-header">Alamat Pengiriman Barang</div>
			  <div class="card-body">
				  <form action="" method="POST">

						<div class="form-group">
							<label>Nama Lengkap</label>
							<input class="form-control" type="text" name="nama">
						</div>

						<div class="form-group">
							<label>Nomor Whatsapp</label>
							<input class="form-control" type="text" name="no_wa">
						</div>

						<div class="form-group">
							<label>Alamat Lengkap</label>
							<textarea class="form-control" name="alamat"></textarea>
						</div>

<!-- 						<div class="form-group">
							<label>Kota</label>
							<select class="form-control form-control" name="kota">
							<?php
								$query = mysqli_query($koneksi, "SELECT * FROM kota WHERE status='on' ORDER BY kota ASC");
								while($row = mysqli_fetch_assoc($query)) :
							 ?>
							 	<option value="<?= $row['id_kota']; ?>"><?= $row['kota']." (".rupiah($row['tarif']).")"; ?></option>
							 <?php endwhile; ?>	
							</select>
						</div> -->
						<br>
						<div class="form-group">
							<!-- <a href="https://api.whatsapp.com/send?phone=+6283822108723" class="btn btn-primary btn-sm mt-1" type="submit" name="submit">Submit</a> -->
							<button class="btn btn-primary btn-sm mt-1" type="submit" name="submit">Submit</button>
						</div>
					</form>
				</div>
			</div>
		</div>
		<div class="col-md-6">
			<div class="card">
			  <div class="card-header">
			    Detail Order
			  </div>
			  <div class="card-body">
			    <table class="table table-sm">
					  <thead class="thead-light">
					    <tr>
					      <th scope="col" class="text-center">No</th>
					      <th scope="col">Nama Barang</th>
					      <th scope="col" class="text-center">Quantity</th>
					      <th scope="col" class="text-right">Total</th>
					    </tr>
					  </thead>
					  <tbody>
					  	<?php 
					  		$no = 1;
					  		$subtotal = 0;
					  		foreach($keranjang as $key => $value) : 
					  		$id_barang = $key;

					  		$nama_barang = $value['nama_barang'];
					  		$harga = $value['harga'];
					  		$jumlah = $value['jumlah'];

					  		$total = $harga * $jumlah;
					  		$subtotal = $subtotal + $total;
					  	?>
						    <tr>
						      <th class="text-center"><?= $no; ?></th>
						      <td><?= $nama_barang; ?></td>
						      <td class="text-center"><?= $jumlah; ?></td>
						      <td class="text-right"><?= rupiah($total); ?></td>
						    </tr>
						    <?php $no++; ?>
						<?php endforeach; ?>
								<tr>
									<td></td>
									<td></td>
									<td class="text-center"><strong>Sub Total</strong></td>
									<td class="text-right"><?= rupiah($subtotal); ?></td>
								</tr>
					  </tbody>
					</table>
			  </div>
			</div>
		</div>
	</div>
</div>

<?php require_once "templates/footer.php"; ?>