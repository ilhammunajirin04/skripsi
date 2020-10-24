 <?php 
    require '../../functions/db.php';
    require '../../functions/module.php';
    require '../templates/init_header.php';
    $query = mysqli_query($koneksi, "SELECT * FROM pesanan ORDER BY id_pesanan DESC");

  ?>

    <div class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <h4 class="card-title">Table Pesanan</h4>
            </div>
            <div class="card-body">
              <?php if(isset($_SESSION['success'])) : ?>
              <div class="alert alert-success">
                <?php echo $_SESSION['success']; ?>
                <?php unset($_SESSION['success']); ?>
              </div>
              <?php endif; ?>
              <div class="table-responsive">
                <table class="table">
                  <thead class="text-primary">
                    <th class="text-center">No</th>
                    <th class="text-center">ID Pesanan</th>
                    <th>Nama</th>
                    <th class="text-center">Tanggal Pesanan</th>
                    <th class="text-center">Status</th>
                    <th class="text-center">Aksi</th>
                  </thead>
                  <tbody>
                    <?php $no=1; while($row = mysqli_fetch_assoc($query)) : ?>
                    <tr>
                      <td class="text-center"><?php echo $no; ?></td>
                      <td class="text-center"><?php echo $row['id_pesanan']; ?></td>
                      <td><?php echo $row['nama']; ?></td>
                      <td class="text-center"><?php echo $row['tanggal']; ?></td>
                      <td class="text-center"><?php echo status_pesanan($row['status']); ?></td>
                      <td class="text-center">
                        <a href="detail.php?id_pesanan=<?php echo $row['id_pesanan']; ?>" class="badge badge-info">Detail</a>
                        <a href="ubah_status.php?id_pesanan=<?php echo $row['id_pesanan']; ?>" class="badge badge-success">Ubah Status</a>
                        <a onclick="return confirm('Apa anda yakin?')" href="hapus.php?id_pesanan=<?php echo $row['id_pesanan']; ?>" class="badge badge-danger">Hapus</a>
                      </td>
                    </tr>
                    <?php $no++; endwhile; ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>


 <?php require_once "../templates/footer.php"; ?>
