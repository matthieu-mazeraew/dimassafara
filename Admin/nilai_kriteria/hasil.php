<!DOCTYPE html>
<html lang="en">
<head>
  <title>Beasiswa IOM</title>
</head>
<body>
  <?php
      include "../sidebar.php";
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
      <h1>Hasil</h1>
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">

              <!-- /.card-header -->

              <div class="card-body">
                <div class="box-tools pull-left">
                </div>
                <table id="example1" class="table table-bordered table-striped">

                  <thead>
                  <tr style="vertical-align : middle;text-align:center;">
                    <th>no</th>
                    <th>Nama</th>
                    <th>nim</th>
                    <th>prodi</th>
                    <th>rangking</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php
                  $no = 1;
                        include "../koneksi.php";
                        $data = mysqli_query($koneksi, "select * from nilai_akhir");
                        while ($row=mysqli_fetch_array($data))

                            {
                    ?>
                  <tr>
                      <td><?php echo $no++;?></td>
                        <td>
                      <?php echo $row['nama']; ?>
                          </td>
                          <td>
                      <?php echo $row['nim']; ?>
                          </td>
                          <td>
                      <?php echo $row['prodi']; ?>
                          </td>
                           <td>
                      <?php echo $row['rangking']; ?>
                          </td>
                  </tr>
                  <?php
                    }
                  ?>
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
