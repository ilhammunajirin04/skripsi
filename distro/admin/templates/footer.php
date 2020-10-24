      <footer class="footer footer-black  footer-white ">
        <div class="container-fluid">
          <div class="row">
            <div class="credits ml-auto">
              <span class="copyright">
                © <script>
                  document.write(new Date().getFullYear())
                </script>, made with <i class="fa fa-heart heart"></i> by Creative Tim
              </span>
            </div>
          </div>
        </div>
      </footer>
    </div>
  </div>
  <!--   Core JS Files   -->
  <script src="<?php echo base_url; ?>assets/js/core/jquery.min.js"></script>
  <script src="<?php echo base_url; ?>assets/js/core/popper.min.js"></script>
  <script src="<?php echo base_url; ?>assets/js/core/bootstrap.min.js"></script>
  <script src="<?php echo base_url; ?>assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
  <!-- Chart JS -->
  <script src="<?php echo base_url; ?>assets/js/plugins/chartjs.min.js"></script>
  <!--  Notifications Plugin    -->
  <script src="<?php echo base_url; ?>assets/js/plugins/bootstrap-notify.js"></script>
  <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="<?php echo base_url; ?>assets/js/paper-dashboard.min.js?v=2.0.1" type="text/javascript"></script>

  <script>
    $('.custom-file-input').on('change', function(){
      let filename = $(this).val().split('\\').pop();
      $(this).next('.custom-file-label').addClass('selected').html(filename);
    });
  </script>
</body>

</html>