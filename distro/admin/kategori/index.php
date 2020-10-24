 <?php 
    require '../../functions/db.php';
    require '../templates/init_header.php';
    $query = mysqli_query($koneksi, "SELECT * FROM kategori");

  ?>

    <div class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <h4 class="card-title">Table Kategori</h4>
            </div>
            <div class="card-body">
              <?php if(isset($_SESSION['success'])) : ?>
              <div class="alert alert-success">
                <?php echo $_SESSION['success']; ?>
                <?php unset($_SESSION['success']); ?>
              </div>
              <?php endif; ?>
              <a href="tambah.php" class="btn btn-primary">Tambah Kategori</a>
              <div class="table-responsive">
                <table class="table">
                  <thead class="text-primary">
                    <th>No</th>
                    <th>Nama Kategori</th>
                    <th>Status</th>
                    <th>Aksi</th>
                  </thead>
                  <tbody>
                    <?php $no=1; while($row = mysqli_fetch_assoc($query)) : ?>
                    <tr>
                      <td><?php echo $no; ?></td>
                      <td><?php echo $row['kategori']; ?></td>
                      <td><?php echo $row['aktif']; ?></td>
                      <td>
                        <a href="edit.php?id_kategori=<?php echo $row['id_kategori']; ?>" class="badge badge-success">Edit</a>
                        <a onclick="return confirm('Apa anda yakin?')" href="hapus.php?id_kategori=<?php echo $row['id_kategori']; ?>" class="badge badge-danger">Hapus</a>
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
