<?php 
  require '../functions/db.php';
  require 'templates/init_header.php';

  $query_kategori = mysqli_query($koneksi, "SELECT * FROM kategori ORDER BY kategori ASC");
  while($row_kategori = mysqli_fetch_assoc($query_kategori)){
  	$id_kategori = $row_kategori['id_kategori'];
  	$array_kategori[] = $row_kategori['kategori'];
  	$query_barang = mysqli_query($koneksi, "SELECT * FROM barang WHERE id_kategori = $id_kategori");
  	// $row_barang = mysqli_fetch_assoc($query_barang);
  	$jumlah_barang[] = mysqli_num_rows($query_barang);
  }

  $semua_barang = mysqli_query($koneksi,"SELECT * FROM barang");
  $total_barang = mysqli_num_rows($semua_barang);

  $query_sudah_bayar = mysqli_query($koneksi,"SELECT * FROM pesanan WHERE status = 1");
  $query_belum_bayar = mysqli_query($koneksi,"SELECT * FROM pesanan WHERE status = 0");
  $jumlah_sudah_bayar = mysqli_num_rows($query_sudah_bayar);
  $jumlah_belum_bayar = mysqli_num_rows($query_belum_bayar);
 ?>

 <div class="content">
    <div class="row">
      <div class="col-md-12">
        <h3 class="description">Dashboard</h3>
        <div class="row">
	    	<div class="col-md-4">
	    		<div class="card">
	    			<div class="card-header">
		              	<h4 class="card-title">
		              		Barang
		              		<div class="float-right"><?php echo $total_barang; ?></div>
		              	</h4>
		            </div>		
		            <div class="card-body">
		            	<table class="table">
		            		<tr>
		            			<th class="text-left">Kategori</th>
		            			<th class="text-center">Jumlah Barang</th>
		            		</tr>
		            		<?php $i=0; foreach($array_kategori as $kategori) : ?>
		            		<tr>
		            			<td class="text-left"><?php echo $kategori; ?></td>
		            			<td class="text-center"><?php echo $jumlah_barang[$i]; ?></td>
		            		</tr>
		            		<?php $i++; endforeach; ?>
		            	</table>
		            </div>
	    		</div>
	    	</div>

	    	<div class="col-md-4">
	    		<div class="card">
	    			<div class="card-header">
		              <h4 class="card-title">
		              	Pesanan
		              	<div class="float-right"><?php echo $jumlah_belum_bayar+$jumlah_sudah_bayar; ?></div>
		              </h4>
		            </div>		
		            <div class="card-body">
		            	<table class="table">
		            		<tr>
		            			<th class="text-center">Belum Bayar</th>
		            			<th class="text-center">Sudah Bayar</th>
		            		</tr>
		            		<tr>
		            			<td class="text-center"><?php echo $jumlah_sudah_bayar; ?></td>
		            			<td class="text-center"><?php echo $jumlah_belum_bayar; ?></td>
		            		</tr>
		            	</table>
		            </div>
	    		</div>
	    	</div>
        </div>
      </div>
    </div>
  </div>
      

 <?php require 'templates/footer.php'; ?>