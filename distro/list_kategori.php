<?php 

  $kategori = isset($_GET['kategori']) ? $_GET['kategori'] : false;
  $id_kategori = isset($_GET['id_kategori']) ? $_GET['id_kategori'] : false;

  $query = mysqli_query($koneksi, "SELECT * FROM kategori WHERE aktif=1");
  
 ?>
  <div class="list-group">
    <?php while($row = mysqli_fetch_assoc($query)) : ?>
      <?php if($kategori == $row['kategori']) : ?>
        <a href="index.php?<?= $row['id_kategori']; ?>" class="list-group-item active"><?= $row['kategori']; ?></a>
      <?php else : ?>
        <a href="index.php?id_kategori=<?= $row['id_kategori']; ?>" class="list-group-item"><?= $row['kategori']; ?></a>
      <?php endif; ?>
    <?php endwhile; ?>
  </div>
</div>