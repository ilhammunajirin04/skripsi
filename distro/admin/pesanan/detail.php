 <?php 
    require '../../functions/db.php';
    require '../../functions/module.php';
    require '../templates/init_header.php';
    
    $id_pesanan = $_GET['id_pesanan'];

    $query_pesanan = mysqli_query($koneksi, "SELECT * FROM pesanan WHERE id_pesanan = '$id_pesanan'");
    $row_pesanan = mysqli_fetch_assoc($query_pesanan);

  ?>

    <div class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <h4 class="card-title">Table Pesanan</h4>
            </div>
            <div class="card-body">
              <table class="table">
                  <tr>
                    <td>ID Pesanan</td>
                    <td>:</td>
                    <td>#<?php echo $row_pesanan['id_pesanan']; ?></td>
                  </tr>

                  <tr>
                    <td>Nama</td>
                    <td>:</td>
                    <td><?php echo $row_pesanan['nama']; ?></td>
                  </tr>

                  <tr>
                    <td>Nomor Whatsapp</td>
                    <td>:</td>
                    <td><?php echo $row_pesanan['no_wa']; ?></td>
                  </tr>

                  <tr>
                    <td>Alamat</td>
                    <td>:</td>
                    <td><?php echo $row_pesanan['alamat']; ?></td>
                  </tr>

                  <tr>
                    <td>Tanggal Pembelian</td>
                    <td>:</td>
                    <td><?php echo $row_pesanan['tanggal']; ?></td>
                  </tr>

                  <tr>
                    <td>Status</td>
                    <td>:</td>
                    <td><?php echo status_pesanan($row_pesanan['status']); ?></td>
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
                      <th class="text-center"><?php echo $no; ?></th>
                      <td><?php echo $row_barang['nama_barang']; ?></td>
                      <td class="text-center"><?php echo rupiah($row['harga']); ?></td>
                      <td class="text-center"><?php echo $row['jumlah']; ?></td>
                      <td class="text-right"><?php echo rupiah($total); ?></td>
                    </tr>
                    <?php $no++; ?>
                <?php endwhile; ?>
                    <tr>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td class="text-center"><strong>Sub Total</strong></td>
                      <td class="text-right"><?php echo rupiah($subtotal); ?></td>
                    </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>


 <?php require_once "../templates/footer.php"; ?>
