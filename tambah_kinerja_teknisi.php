<!DOCTYPE html>
<html lang="en">
<meta charset="utf-8">
<?php
include ('include/header.php');
?>
<?php
 session_start();
 if (empty($_SESSION['nip'])) {
 header("location:index.php"); // jika belum login, maka dikembalikan ke file form_login.php
 }
 else {
 ?>
<body id="page-top">
  <!-- Page Wrapper -->
  <div id="wrapper">

    <?php
    include('include/sidebar.php');
    ?>

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">
        <?php
        include ('include/topbar.php');
        ?>
        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">TAMBAH DATA</h6>
            </div>
            <div class="card-body">
              <div>
                <form method="post" action="simpan_kinerja_teknisi.php">
            <table>
                <tr><td>NAMA TEKNISI</td><td><input type="text" name="teknisi" class="form-control"></td></tr>
                <tr><td>NIP</td><td><input type="text" name="nip" class="form-control"></td></tr>
                <tr><td>BULAN</td><td><input type="date" name="bulan" class="form-control"></td></tr>
                <tr><td>WAKTU MULAI</td><td>
                  <input type="text" id="jam1" style="width: 70px;" name="waktu_mulai" class="form-control" />
                </td></tr>
                <tr><td>WAKTU SELESAI</td><td>
                  <input type="text" id="jam2" style="width: 70px;" name="waktu_selesai" class="form-control" />
                </td></tr>
                <tr><td colspan="2"><button class="btn btn-success" type="submit" value="simpan">SIMPAN</button></td></tr>
            </table>
        </form>
              </div>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <?php
      include('include/footer.php');
      ?>

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="logout.php">Logout</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
<script type="text/javascript">
            $(document).ready(function() {
                $('#jam1').timepicker({
                    showPeriodLabels: false
                });
              });
</script>
<script type="text/javascript">
            $(document).ready(function() {
                $('#jam2').timepicker({
                    showPeriodLabels: false
                });
              });
</script>
<link rel="stylesheet" href="css/jquery-ui.css" type="text/css" />
<link rel="stylesheet" href="css/jquery.ui.timepicker.css?v=0.3.3" type="text/css" />
<script type="text/javascript" src="js/jquery-1.8.2.min.js"></script>
<script type="text/javascript" src="js/jquery-ui.js"></script> 
<script type="text/javascript" src="js/jquery.ui.timepicker.js?v=0.3.3"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>


  <!-- Page level plugins -->
  <script src="vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="js/demo/datatables-demo.js"></script>

</body>

</html>
<?php } ?>