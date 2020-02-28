<!DOCTYPE html>
<html lang="en">

<?php
include ('include/header.php');
?>
<?php
include 'loginuser/koneksi.php';
$id         = $_GET['id'];
$data_laporan  = mysqli_query($connect, "select * from data_laporan where id='$id'");
$row        = mysqli_fetch_array($data_laporan);
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
              <h6 class="m-0 font-weight-bold text-primary">DATA LAPORAN TRANSAKSI</h6>
            </div>
            <div class="card-body">
              <div>
                <form method="post" action="edit_data_laporan.php">
                  <input type="hidden" value="<?php echo $row['id'];?>" name="id">
                  <table>
                    <tr><td>TEKNISI</td><td><input type="text" value="<?php echo $row['teknisi'];?>" name="teknisi" class="form-control"></td></tr>
                    <tr><td>TANGGAL KEGIATAN</td><td><input type="date" value="<?php echo $row['tanggal_kegiatan'];?>" name="tanggal_kegiatan" class="form-control"></td></tr>
                    <tr><td>NAMA KEGIATAN</td>
                      <td><select name="nama_kegiatan" class="form-control">
                      <option value="PERBAIKAN">PERBAIKAN</option>
                      <option value="DLL">DLL</option>
                      <option value="CASH">CASH</option>
                      <option value="REJECT">REJECT</option>
                      <option value="MAINTENANCE">MAINTENANCE</option>
                    </select></td></tr>
                    <tr><td>JAM</td><td><input type="time" value="<?php echo $row['jam'];?>" name="jam" class="form-control"></td></tr>
                    <tr><td>KODE PERBAIKAN</td>
                      <td><select name="kode_perbaikan" class="form-control">
                      <option value="A2-REJECT CARD">A2-REJECT CARD</option>
                      <option value="A3-INSTALASI">A3-INSTALASI</option>
                      <option value="A4-SETTINGS">A4-SETTINGS</option>
                      <option value="A5-CARTRIDGE">A5-CARTRIDGE</option>
                      <option value="A1-FLM">A1-FLM</option>
                    </select></td></tr></tr>
                    <tr><td colspan="2"><button class="btn btn-success" type="submit" value="simpan">SAVE</button>
                      <a  class="btn btn-success" href="data_laporan.php">Kembali</a></td></tr>
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