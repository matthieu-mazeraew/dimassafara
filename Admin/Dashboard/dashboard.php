
<!DOCTYPE html>
<html lang="en">
<head>
  <title>AdminLTE 3 | DataTables</title>
    <?php
      include "../sidebar.php";
      include "../koneksi.php";

      $ti = mysqli_query($koneksi,"select * from mahasiswa where jurusan ='Teknik Informatika'");
      $ti = mysqli_num_rows($ti);
      $te = mysqli_query($koneksi,"select * from mahasiswa where jurusan ='Teknik Elektronika'");
      $te = mysqli_num_rows($te);
      $tppl = mysqli_query($koneksi,"select * from mahasiswa where jurusan ='Teknik Pengendalian Pencemaran Lingkungan'");
      $tppl = mysqli_num_rows($tppl);
      $tm = mysqli_query($koneksi,"select * from mahasiswa where jurusan ='Teknik Mesin'");
      $tm = mysqli_num_rows($tm);
?>
    
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Pendaftar', 'Hours per Day'],
          ['Teknik Informatika',   <?php echo $ti ?>],
          ['Teknik Elektronika',    <?php echo $te ?>],
          ['Teknik Pengendalian Pencemaran Lingkungan',    <?php echo $tppl ?>],
          ['Teknik Mesin',    <?php echo $tm ?>]
        ]);

        var options = {
          title: ''
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }

    </script>
</head>
<body>

    <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>ChartJS</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">ChartJS</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-3 col-6">
	<!-- Main content -->
  <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>8</h3>

                <p>Pendaftar</p>
              </div>
              <div class="icon">
                <i class="ion ion-person"></i>
              </div>
              <a href="#" class="small-box-footer"></i></a>
            </div>
          </div>

          <div class="col-lg-3 col-6">          
          <div class="small-box bg-primary">
              <div class="inner">
                <h3>20</h3>

                <p>Jumlah Diterima</p>
              </div>
              <div class="icon">
                <i class="ion ion-person"></i>
              </div>
              <a href="#" class="small-box-footer"></i></a>
            </div>
          </div>
          <!-- ./col -->        
      </div>

      <!-- batas antar row -->

      <div class="row">
        <div class="col-lg-6 col-6">
          <div class="card card-secondary">
              <div class="card-header">
                <h3 class="card-title">Chart Perbandingan Pendaftar tiap Jurusan</h3>
              </div>
              <div class="card-body">
                <div id="piechart" style="height: 250px;"></div>
              </div>
              <!-- /.card-body -->
            </div>
    </div>
      </div>

</div>
</section>

</div>
</body>
</html>