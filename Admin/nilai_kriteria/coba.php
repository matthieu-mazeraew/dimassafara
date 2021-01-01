<!DOCTYPE html>
<html lang="en">
<head>
  <title>AdminLTE 3 | DataTables</title>
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
      <h1>Nilai Kriteria mahasiswa</h1>
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
                    <th>No.</th>
                    <th>nim</th>
                    <th>Nama Pendaftar</th>
                    <th>Kriteria</th>
                    <th>Nilai</th>
                    <th> </th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php $no = 1; 
                  include "../koneksi.php";?>
                      <?php if ($query = $koneksi->query("SELECT a.kd_nilai, c.nim, c.prodi, c.jurusan, c.semester, c.nama_pendaftar AS nama_pendaftar FROM nilai a JOIN mahasiswa c ON c.nim=a.nim")): ?>
                          <?php while($row = $query->fetch_assoc()): ?>
                          <tr>
                              <td><?=$no++?></td>
                              <td><?=$row['nim']?></td>
                              <td><?=$row['nama_pendaftar']?></td>
                              <td><?=$row['prodi']?></td>
                              <td><?=$row['jurusan']?></td>
                              <td><?=$row['semester']?></td>
                              <td>
                             <a href='dp_detail.php?nim=<?php echo $row['nim'];  ?>' class="btn btn-primary btn-flat btn-xs"><i class="fa fa-pencil"></i></a>
                             <a href='dp_hapus.php?nim=<?php echo $row['nim'];  ?>' class="btn btn-danger btn-flat btn-xs" ><i class="fa fa-trash"></a></td>
                           </td>
                          </td>
                  </tr>
                  <?php endwhile ?>
                  <?php endif ?>
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
