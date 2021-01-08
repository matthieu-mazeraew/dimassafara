
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | User Profile</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
</head>

 <?php
      include "../sidebar.php";
      include "../koneksi.php";
            $data = mysqli_query($koneksi, "select * from mahasiswa where nim = $_GET[nim]");
            $row = mysqli_fetch_array ($data);
  ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Profile</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">User Profile</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-3">

            <!-- Profile Image -->
            <div class="card card-secondary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                <img class="profile-user-img img-fluid img-circle" 
                src="../../dist/img/<?php echo $row['foto'];?>" 
                width="100px" height="100px" alt="User profile picture">
                </div>

                <h3 class="profile-username text-center"><td><?php echo $row['nama_pendaftar']; ?></td></h3>

                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                    <b>Nim</b> <a class="float-right text-secondary"><td><?php echo $row['nim']; ?></td></a>
                  </li>
                  <li class="list-group-item">
                    <b>Prodi</b> <a class="float-right text-secondary"><td><?php echo $row['prodi']; ?></td></a>
                  </li>
                  <li class="list-group-item">
                    <b>Jurusan</b> <a class="float-right text-secondary"><td><?php echo $row['jurusan']; ?></td></a>
                  </li>
                   <li class="list-group-item">
                    <b>Semester</b> <a class="float-right text-secondary"><td><?php echo $row['semester']; ?></td></a>
                  </li>
                </ul>
                 <a href="datapendaftar.php" class="btn btn-dark btn-block"><b>kembali</b></a>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
          <div class="col-md-9">
            <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-tabs">
                  <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Details</a></li>
                  <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Edit</a></li>
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  <div class="active tab-pane" id="activity">
                    <!-- Post -->
                    <div class="post">
                       <table border="0" cellpadding="4">
                        <h2>
                          <tr>
                            <td>Nim</td>
                            <td><?php echo $row['nim']; ?></td>
                          </tr>
                          <tr>
                             <td>Nama Pendaftar</td>
                             <td><?php echo $row['nama_pendaftar']; ?></td>
                          </tr>
                          <tr>
                            <td>Prodi</td>
                            <td><?php echo $row['prodi']; ?></td>
                        </tr>
                        <tr>
                          <td>Jurusan</td>
                          <td><?php echo $row['jurusan']; ?></td>
                        </tr>
                        <tr>
                          <td>Semester</td>
                          <td><?php echo $row['semester']; ?></td>
                        </tr>
                        <tr>
                          <td>IPK</td>
                          <td><?php echo $row['ipk']; ?></td>
                        </tr>
                        <tr>
                          <td>Prestasi Non Akademik</td>
                          <td><?php echo $row['prestasi_non_aka']; ?></td>
                        </tr>
                        <tr>
                          <td>Keikutsertaan Ormawa</td>
                          <td><?php echo $row['keikutsertaan_ormawa']; ?></td>
                        </tr>
                        <tr>
                          <td>Tanggungan Ormawa</td>
                          <td><?php echo $row['tanggungan_ortu']; ?></td>
                        </tr>
                        <tr>
                          <td>Penghasilan Ormawa</td>
                          <td><?php echo $row['penghasilan_ortu']; ?></td>
                        </tr>
                      </h2>
                      </table>

                    </div>
                    <!-- /.post -->
                  </div>

                  <div class="tab-pane" id="settings">
                    <form role="form" method="post" action="dp_update.php">
                        <input class="form-control" type="hidden" required="" name="nim" value="<?php echo $row['nim'] ; ?>">
                    <div class="form-group">
                        <label>Nama Pendaftar</label>
                        <input class="form-control" name="nama_pendaftar" type="text" required=""  value="<?php echo $row['nama_pendaftar'] ; ?>">

                    <div class="form-group">
                                <label>Jurusan</label>
                                <select class="form-control" name="jurusan" >">
                                <option value="<?php echo $row['jurusan'] ; ?>"></option>
                                    <option>Teknik Informatika</option> 
                                    <option>Teknik Listrik</option>
                                    <option>Teknik Elektro</option>
                                    <option>Teknik Mesin</option>
                                    <option>Teknik Pengendalian Pencemaran Lingkungan</option> 
                                </select>
                    </div>

                    <div class="form-group">
                                <label>Prodi</label>
                                <select class="form-control" name="prodi" >">
                                <option value="<?php echo $row['prodi'] ; ?>"></option>
                                    <option>D3</option> 
                                    <option>D4</option>
                                </select>
                    </div>
                    <div class="form-group">
                        <label>Semester</label>
                        <input class="form-control" name="semester" type="number" required=""  value="<?php echo $row['semester'] ; ?>">
                    </div>
                    <div class="form-group">
                        <label>IPK</label>
                        <input class="form-control" name="ipk" type="number" required=""  value="<?php echo $row['ipk'] ; ?>">

                    <div class="form-group">
                        <label>Prestasi Non Akademik</label>
                        <input class="form-control" name="prestasi_non_aka" type="number" required=""  value="<?php echo $row['prestasi_non_aka'] ; ?>">
                    </div>

                    <div class="form-group">
                                <label>Keikutsertaan Ormawa</label>
                                <select class="form-control" name="keikutsertaan_ormawa" >">
                                <option value="<?php echo $row['keikutsertaan_ormawa'] ; ?>"></option>
                                    <option>Ketua</option> 
                                    <option>Sekretaris</option>
                                    <option>Bendahara</option>
                                    <option>Ketua Divisi</option>
                                    <option>Anggota</option> 
                                </select>
                    </div>

                    <div class="form-group">
                        <label>tanggungan Orang Tua</label>
                        <input class="form-control" name="tanggungan_ortu" type="number" required=""  value="<?php echo $row['tanggungan_ortu'] ; ?>">
                    </div>

                    <div class="form-group">
                        <label>Penghasilan Orang Tua</label>
                        <input class="form-control" name="penghasilan_ortu" type="number" required=""  value="<?php echo $row['penghasilan_ortu'] ; ?>">
                    </div>
                    <button type="submit" class="btn btn-primary pull-right">Simpan</button>
                    <a href="bobot.php" class="btn btn-success pull-right" style="margin-right:1%;">Batal</a>
                </form>
                  </div>
                  <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 3.1.0
    </div>
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>
</body>
</html>
