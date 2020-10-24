	<?php 

		require_once "core/init.php";

  		require_once "templates/header.php";

	 ?>

	<div class="container mt-3">
		<div class="row">	
			<div class="col-lg-12 col-md-12 col-xm-12">	
				<?php 

					if($totalKeranjang == 0) : 
				?>
					<h5 class="text-center">Saat ini belum ada barang didalam keranjang anda</h5>
						</div>
							</div>
					</div>
				<?php 
					else :
					$no = 1; 
					$subtotal  = 0;
				?>
	
				<table class="table table-sm">
				  <thead class="thead-light">
				    <tr>
				      <th scope="col">No</th>
				      <th scope="col">Gambar</th>
				      <th scope="col">Nama Barang</th>
				      <th scope="col">Jumlah</th>
				      <th scope="col">Harga Satuan</th>
				      <th scope="col">Total</th>
				      <th scope="col">Action</th>
				    </tr>
				  </thead>
				  <tbody>

				  	<?php foreach($keranjang as $key => $value) : 
				  		$id_barang = $key;

				  		$nama_barang = $value['nama_barang'];
				  		$jumlah = $value['jumlah'];
				  		$gambar = $value['gambar'];
				  		$harga = $value['harga'];

				  		$total = (int)$jumlah * $harga;
							$subtotal = $subtotal + $total;
				  	?>
					    <tr>
					      <th scope="row"><?= $no; ?></th>
					      <td><img src="<?= 'image/barang/'.$gambar; ?>" width="100px"></td>
					      <td><?= $nama_barang; ?></td>
					      <td><input type="text" name="<?= $id_barang; ?>" value="<?= $jumlah; ?>" class="form-control update-jumlah"></td>
					      <td><?= rupiah($harga); ?></td>
					      <td><?= rupiah($total); ?></td>
					      <td><a href="hapus_item.php?id_barang=<?= $id_barang; ?>" class="btn btn-primary btn-sm">Hapus</a></td>
					    </tr>
					    <?php $no++; ?>
						<?php endforeach; ?>
							<tr>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td><strong>Sub Total</strong></td>
								<td><?= rupiah($subtotal); ?></td>
							</tr>
				  </tbody>
				</table>
				<div class="clearfix mb-3">
					<div class="float-left">
						<a href="index.php" class="btn btn-secondary btn-sm">Lanjut Belanja</a>
					</div>
					<div class="float-right">
						<a href="detail-pesanan.php" class="btn btn-primary btn-sm">Lanjut Pemesanan</a>
					</div>	
				</div>	
			</div>
		</div>
	</div>
<?php endif; ?>

<?php require_once "templates/footer.php"; ?>

<script>

	$(".update-jumlah").on("input", function(e){
		var id_barang = $(this).attr("name");
		var value = $(this).val();
		
		$.ajax({
			method: "POST",
			url: "update_keranjang.php",
			data: "id_barang="+id_barang+"&value="+value
		})
		.done(function(data){
			location.reload();
		});
		
	});

</script>



