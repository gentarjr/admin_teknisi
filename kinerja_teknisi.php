<!DOCTYPE html>
<html lang="en">

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
              <h6 class="m-0 font-weight-bold text-primary">KINERJA TEKNISI</h6>
            </div>
            <div class="card-body">
              <a class="btn btn-success" href="tambah_kinerja_teknisi.php">TAMBAH</a>
              <div>
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>NO</th>
                      <th>TEKNISI</th>
                      <th>NIP</th>
                      <th>BULAN</th>
                      <th>PREDIKAT</th>
                      <th>AKSI</th>
                    </tr>
                    <?php 
                    include 'loginuser/koneksi.php';
                    $no = 1;
                    $data = mysqli_query($connect,"select * from kinerja_teknisi");
                    while($d = mysqli_fetch_array($data)){
                      if ($d['predikat']<="45") {
                        $a = "SANGAT BAIK";
                      }else if ($d['predikat']>"46" && $d['predikat']<="60") {
                        $a = "BAIK";
                      }else if ($d['predikat']>"60" && $d['predikat']<="90") {
                        $a = "CUKUP BAIK";
                      }else if ($d['predikat']>"91" && $d['predikat']<="120") {
                        $a = "KURANG BAIK";
                      }else if ($d['predikat']>"120") {
                        $a = "SANGAT KURANG BAIK";
                      }
                    ?>
                  </thead>
                  <tbody>
                    <tr>
                      <td><?php echo $no++;?></td>
                      <td><?php echo $d['teknisi']; ?></td>
                      <td><?php echo $d['nip']; ?></td>
                      <td><?php echo $d['bulan']; ?></td>
                      <td><?php echo $a; ?></td>
                      <td><a class="btn btn-danger" href="delete_kinerja_teknisi.php?id=<?php echo $d['id']; ?>">HAPUS</a></td>
                    </tr>
                    <?php 
                     }
                    ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
          <script type="text/javascript" src="js/chartjs/Chart.js"></script>
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">DIAGRAM TEKNISI</h6>
            </div>
            <div class="card-body">
              <div>
                <div style="width: 500px;height: 500px">
                  <canvas id="myChart"></canvas>
                </div>
                <script>
                  var ctx = document.getElementById("myChart").getContext('2d');
                  var myChart = new Chart(ctx, {
                    type: 'bar',
                    data: {
                      labels: ["S.BAIK", "BAIK", "C.BAIK", "K.BAIK", "SANGAT KURANG"],
                      datasets: [{
                        label: 'Diagram Kinerja Teknisi',
                        data: [<?php $predikat = mysqli_query($connect,"select predikat from kinerja_teknisi WHERE predikat < 45");
                        echo mysqli_num_rows($predikat);?>,
                        <?php $predikat = mysqli_query($connect,"select predikat from kinerja_teknisi WHERE predikat BETWEEN 46 AND 60");
                        echo mysqli_num_rows($predikat);?>,
                        <?php $predikat = mysqli_query($connect,"select predikat from kinerja_teknisi WHERE predikat BETWEEN 61 AND 90");
                        echo mysqli_num_rows($predikat);?>,
                        <?php $predikat = mysqli_query($connect,"select predikat from kinerja_teknisi WHERE predikat BETWEEN 91 AND 120");
                        echo mysqli_num_rows($predikat);?>,
                        <?php $predikat = mysqli_query($connect,"select predikat from kinerja_teknisi WHERE predikat > 121");
                        echo mysqli_num_rows($predikat);?>,],
                        backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                        ],
                        borderColor: [
                        'rgba(255,99,132,1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                        ],
                        borderWidth: 1
                      }]
                    },
                    options: {
                      scales: {
                        yAxes: [{
                          ticks: {
                            beginAtZero:true
                          }
                        }]
                      }
                    }
                  });
                </script>
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