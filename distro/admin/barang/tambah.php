 <?php 

    require '../../functions/db.php';
    require '../templates/init_header.php';

    if(isset($_POST['submit'])){
      $kode_barang = $_POST['kode_barang'];
      $id_kategori = $_POST['id_kategori'];
      $nama_barang = $_POST['nama_barang'];
      $harga = $_POST['harga'];
      $stok = $_POST['stok'];
      
      $nama_gambar = $_FILES['gambar']['name'];
      $lokasi = '../../image/barang/'.$nama_gambar;
      move_uploaded_file($_FILES['gambar']['tmp_name'], $lokasi);

      $sql = "INSERT INTO barang(id_kategori, kode_barang, nama_barang, harga, stok, gambar) VALUES('$id_kategori', '$kode_barang', '$nama_barang', '$harga', '$stok', '$nama_gambar')";
      $query = mysqli_query($koneksi, $sql);
      $_SESSION['success'] = 'Barang berhasil ditambahkan';
      header('Location: index.php');

    }

    $query_kategori = mysqli_query($koneksi, "SELECT * FROM kategori WHERE aktif = 1 ORDER BY kategori ASC");

  ?>

 <div class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <h4 class="card-title">Tambah Barang</h4>
            </div>
            <div class="card-body">
              <form action="" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                  <label>Kode Barang</label>
                  <input type="text" name="kode_barang" class="form-control">
                </div>

                <div class="form-group">
                  <label>Nama Barang</label>
                  <input type="text" name="nama_barang" class="form-control">
                </div>

                <div class="form-group">
                  <label>Harga</label>
                  <input type="text" name="harga" class="form-control">
                </div>

                <div class="form-group">
                  <label>Stok</label>
                  <input type="text" name="stok" class="form-control">
                </div>

                <div class="form-group">
                  <label>Kategori</label>
                  <select name="id_kategori" class="form-control">
                    <?php while($row_kategori = mysqli_fetch_assoc($query_kategori)) : ?>
                      <option value="<?php echo $row_kategori['id_kategori']; ?>"><?php echo $row_kategori['kategori']; ?></option>
                    <?php endwhile; ?>
                  </select>
                </div>

                <label>Gambar</label>
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                  </div>
                  <div class="custom-file">
                    <input type="file" name="gambar" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
                    <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                  </div>
                </div>

                <button type="submit" name="submit" class="btn btn-primary btn-fill btn-sm">Tambah</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>

 <?php require_once "../templates/footer.php"; ?>


