<!DOCTYPE html>
<html lang="en">
<head>
  <title>AdminLTE 3 | DataTables</title>
</head>
<body>
  <?php
      include "sidebar.php";
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
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">

              <!-- /.card-header -->

              <div class="card-body">
                 <a href="dp_tambah.php" class="btn btn-success">Tambah Data</a>
                <table id="example1" class="table table-bordered table-striped">

                  <thead>
                  <tr>
                    <th>nim</th>
                    <th>Nama Pendaftar</th>
                    <th>Jurusan</th>
                    <th>prodi</th>
                    <th>Semester</th>
                    <th>IPK</th>
                    <th>Prestasi Non Akademik</th>
                    <th>Keikutsertaan Ormawa</th>
                    <th>Tanggungan Orang Tua</th>
                    <th>Penghasilan Orang Tua</th>
                    <th> </th>
                  </tr>
                  </thead>
                  <tbody>
                  <tr>
                    <?php
                        include "koneksi.php";
                        $data = mysqli_query($koneksi, "select * from tb_datapendaftar");
                        while ($row=mysqli_fetch_array($data))

                            {
                    ?>
                      <td>
                      <?php echo $row['nim']; ?>
                          </td>
                          <td>
                      <?php echo $row['nama_pendaftar']; ?>
                          </td>
                          <td>
                      <?php echo $row['prodi']; ?>
                          </td>
                          <td>
                      <?php echo $row['jurusan']; ?>
                          </td>
                          <td>
                      <?php echo $row['semester']; ?>
                          </td>
                          <td>
                      <?php echo $row['ipk']; ?>
                          </td>
                          <td>
                      <?php echo $row['prestasi_non_aka']; ?>
                          </td>
                          <td>
                      <?php echo $row['keikutsertaan_ormawa']; ?>
                          </td>
                          <td>
                      <?php echo $row['tanggungan_ortu']; ?>
                          </td>
                          <td>
                      <?php echo $row['penghasilan_ortu']; ?>
                          </td>
                          <td>
                          <div class="dropdown">
                            <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Aksi
                            <span class="caret"></span></button>
                            <ul class="dropdown-menu">
                              <li><a href="dp_edit.php?nim=<?php echo $row['nim']; ?>">Edit</a></li>
                              <li><a href="dp_hapus.php?nim=<?php echo $row['nim']; ?>">Hapus</a></li>
                            </ul>
                          </div>
                          </td>
                  </tr>
                  <?php
                    }
                  ?>
                  </tbody>
                   <tfoot>
                    
                  </tfoot>

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
