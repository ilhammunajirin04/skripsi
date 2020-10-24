
<!-- Footer -->
    <footer class="py-5 bg-dark text-white bottom">
     
        <p class="m-0 text-center">Copyright &copy; Ilham 2020</p>
      
      <!-- /.container -->
    </footer>

    
    <!-- Bootstrap core JavaScript -->
    <script src="templates/ui-kit/js/core/jquery.3.2.1.min.js"></script>
    <script src="templates/ui-kit/js/core/popper.min.js"></script>
    <script src="templates/ui-kit/js/core/bootstrap.min.js"></script>

    <!-- plugins -->
    <!-- <script src="templates/ui-kit/js/now-ui-kit.js"></script>
    <script src="templates/ui-kit/js/plugins/bootstrap-datepicker.js"></script>
    <script src="templates/ui-kit/js/plugins/bootstrap-switch.js"></script>
    <script src="templates/ui-kit/js/plugins/jquery.sharrre.js"></script>
    <script src="templates/ui-kit/js/plugins/nouislider.min.js"></script> -->

    <!-- ajax -->
    <script src="templates/ajax.js"></script>
    <script>
      <?php if(isset($_SESSION['login'])) : ?>
        login(<?= $_SESSION['login']; ?>);
      <?php endif; ?>
    </script>
    
</body>

</html>

<!-- <script>
  $(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });
  });
</script> -->