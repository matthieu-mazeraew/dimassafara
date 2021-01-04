<!DOCTYPE html>
<html lang="en">
<head>
  <title>AdminLTE 3 | DataTables</title>
</head>
<body>
  <?php
      include "../sidebar.php";
      include "../koneksi.php";
  ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Data Pendaftar</h1>
          </div>

        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <h1>Data Pendaftar</h1>
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">

              <!-- /.card-header -->

              <div class="card-body">
                <div class="box-tools pull-left">
                <a href="#" class="btn btn-secondary" data-toggle="modal" data-target="#tambahuser"><i class="fa fa-male"></i> Tambah Pendaftar</a>
                </div>
                <table id="example1" class="table table-bordered table-striped">

                  <thead>
                  <tr>
                  	<?php
					include "../koneksi.php";
					$data =mysqli_query($koneksi, "select * from kriteria");
					$row=mysqli_num_rows($data);

					?>
                    <th rowspan="2">No.</th>
                    <th rowspan="2">nim</th>
                    <th rowspan="2">Nama Pendaftar</th>
                    <th colspan="<?php echo $row; ?>">Kriteria</th>	
                  </tr>
                  <tr>
					<?php
					for($n=1;$n<=$row;$n++){
						echo"<th>C{$n}</th>";
					}
					?>
				  </tr>

                  </thead>
                  <tbody>
                  <?php
					$i=0;
					$a=mysqli_query($koneksi, "select * from mahasiswa order by nim asc");
					 
					while($da=mysql_fetch_assoc($a)){
						echo "<tr>
							<td>".(++$i)."</td>
							<td>".$da['nama_pendaftar']."</td>";
						echo "</tr>\n";

					}

					?>
                    </tr>

                  </tbody>

                </table>

              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
</body>
</html>
