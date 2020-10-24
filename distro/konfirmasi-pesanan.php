<?php

// if(!isset($_SESSION['user'])){
// 	$_SESSION['proses_pesanan'] = true;
// 	header('Location: login.php');
// }

require_once "core/init.php";
require_once "templates/header.php";

$id_pesanan = $_GET['id_pesanan'];

$query_pesanan = mysqli_query($koneksi, "SELECT * FROM pesanan WHERE id_pesanan = '$id_pesanan'");
$row_pesanan = mysqli_fetch_assoc($query_pesanan);

?>

<div class="container">
	<div class="row mt-4">
		<div class="col-md-7">
			<div class="card">
			  <div class="card-header">
			    Detail Pembelian
			  </div>
			  <div class="card-body">
			  	<table class="table">
		      		<tr>
		      			<td>ID Pembelian</td>
		      			<td>:</td>
		      			<td><?= $row_pesanan['id_pesanan']; ?></td>
		      		</tr>

		      		<tr>
		      			<td>Nama</td>
		      			<td>:</td>
		      			<td><?= $row_pesanan['nama']; ?></td>
		      		</tr>

		      		<tr>
		      			<td>Nomor Whatsapp</td>
		      			<td>:</td>
		      			<td><?= $row_pesanan['no_wa']; ?></td>
		      		</tr>

		      		<tr>
		      			<td>Alamat</td>
		      			<td>:</td>
		      			<td><?= $row_pesanan['alamat']; ?></td>
		      		</tr>

		      		<tr>
		      			<td>Tanggal Pembelian</td>
		      			<td>:</td>
		      			<td><?= $row_pesanan['tanggal']; ?></td>
		      		</tr>

		      		<tr>
		      			<td>Status</td>
		      			<td>:</td>
		      			<td><?= $row_pesanan['status']; ?></td>
		      		</tr>
		      	</table>

			    <table class="table table-sm">
					  <thead class="thead-light">
					    <tr>
					      <th scope="col" class="text-center">No</th>
					      <th scope="col">Nama Barang</th>
					      <th scope="col" class="text-center">Harga</th>
					      <th scope="col" class="text-center">Jumlah</th>
					      <th scope="col" class="text-right">Total</th>
					    </tr>
					  </thead>
					  <tbody>
					  	<?php 
					  		$no = 1;
					  		
					  		$query_pesanan_detail = mysqli_query($koneksi, "SELECT * FROM detail_pesanan WHERE id_pesanan = '$id_pesanan'");
					  		$total = 0;
					  		$subtotal = 0;
					  		while($row = mysqli_fetch_assoc($query_pesanan_detail)) :
					  			$id_barang = $row['id_barang'];
					  			$query_barang = mysqli_query($koneksi, "SELECT * FROM barang WHERE id_barang = '$id_barang'");
					  			$row_barang = mysqli_fetch_assoc($query_barang);
						  		$total = $row['harga'] * $row['jumlah'];
						  		$subtotal = $subtotal + $total;
						  		$array[] =
						  			[
						  				'nama_barang' => $row_barang['nama_barang'],
						  				'harga' => $row_barang['harga'],
						  				'jumlah' => $row['jumlah'],
						  				'total' => $total,
									];
					  	?>
						    <tr>
						      <th class="text-center"><?= $no; ?></th>
						      <td><?= $row_barang['nama_barang']; ?></td>
						      <td class="text-center"><?= rupiah($row['harga']); ?></td>
						      <td class="text-center"><?= $row['jumlah']; ?></td>
						      <td class="text-right"><?= rupiah($total); ?></td>
						    </tr>
						    <?php $no++; ?>
						<?php endwhile; ?>
								<tr>
									<td></td>
									<td></td>
									<td></td>
									<td class="text-center"><strong>Sub Total</strong></td>
									<td class="text-right"><?= rupiah($subtotal); ?></td>
								</tr>
					  </tbody>
				</table>
			  	<div align="center" class="mt-5">
			  		<a href="https://api.whatsapp.com/send?phone=+6283822108723&text=Detail Pesanan %0ANama: <?php echo $row_pesanan['nama']; ?>%0ANomor Whatsapp: <?php echo $row_pesanan['no_wa']; ?>%0AAlamat: <?php echo $row_pesanan['alamat']; ?>%0A%0A<?php foreach($array as $wa) : ?>Nama Barang: <?php echo $wa['nama_barang']; ?>%0AHarga: <?php echo $wa['harga']; ?>%0AJumlah: <?php echo $wa['jumlah']; ?>%0ATotal: <?php echo $wa['total']; ?>%0A%0A
			  			<?php endforeach; ?><?php echo 'Total Harga : '.$subtotal; ?>%0A%0ABukti Transfer%0ANo Rekening: %0ANama pemilik no rekening: %0A
			  			" 
			  			class="btn btn-primary text-center">Konfirmasi Pembayaran</a>
			  	</div>
			  </div>
			</div>
		</div>
		<div class="col-md-5">
			<div class="card">
				<div class="card-header">Pembayaran</div>
				<div class="card-body">
					<table class="table">
						<tr>
							<th>Nama Bank</th>
							<th>No Rekening</th>
							<th>A/N</th>
						</tr>
						<tr>
							<td>BRI</td>
							<td>000-000-000</td>
							<td>Ilham Munajirin</td>
						</tr>
						<tr>
							<td>BNI</td>
							<td>000-000-000</td>
							<td>Ilham Munajirin</td>
						</tr>
						<tr>
							<td>Mandiri</td>
							<td>000-000-000</td>
							<td>Ilham Munajirin</td>
						</tr>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
<br><br>
<?php require_once "templates/footer.php"; ?>