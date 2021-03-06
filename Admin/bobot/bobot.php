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
            <h1>-</h1>
          </div>

        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <h1>Data Kriteria</h1>
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">

              <!-- /.card-header -->

              <div class="card-body">
                <div class="box-tools pull-left">
                <a href="#" class="btn btn-secondary" data-toggle="modal" data-target="#tambahuser"><i class="fa fa-male"></i> Tambah Kriteria</a>
                </div>
                <table id="example1" class="table table-bordered table-striped">

                  <thead>
                  <tr>
                    <th>No.</th>
                    <th>nama</th>
                    <th>Sifat</th>
                    <th>Bobot</th>
                    <th> </th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php
                  $no = 1;
                        include "../koneksi.php";
                        $data = mysqli_query($koneksi, "SELECT a.kd_penilaian, b.nama AS kriteria, a.kd_penilaian, a.keterangan,a.berat FROM penilaian a JOIN kriteria b USING(kd_kriteria)");
                        while ($row=mysqli_fetch_array($data))

                            {
                    ?>
                  <tr>
                    <input type="hidden" name="id_bobot" value="<?php echo $row['kd_penilaian'] ; ?>">
                      <td><?php echo $no++;?></td>
                          <td>
                      <?php echo $row['kriteria']; ?>
                          </td>
                          <td>
                      <?php echo $row['keterangan']; ?>
                          </td>
                           <td>
                      <?php echo $row['berat']; ?>
                          </td>
                          <td>
                             <a href='dp_detail.php?nim=<?php echo $row['nim'];  ?>' class="btn btn-primary btn-flat btn-xs"><i class="fa fa-pencil"></i></a>
                             <a href='dp_hapus.php?nim=<?php echo $row['nim'];  ?>' class="btn btn-danger btn-flat btn-xs" ><i class="fa fa-trash"></a></td>
                           </td>
                          </td>
                  </tr>
                  <?php
                    }
                  ?>
                  </tbody>
                  
                         <!-- modal insert -->
                        <div class="example-modal">
                          <div id="tambahuser" class="modal fade bd-example-modal-sm" role="dialog" style="display:none;">
                            <div class="modal-dialog modal-lg"> 
                              <div class="modal-content">
                                <div class="modal-header">
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                  <h3 class="modal-title">Tambah sub kriteria</h3>
                                </div>
                                <div class="modal-body">
                                  <form action="dp_input.php" method="post" role="form">
                                    <div class="form-group">
                                      <div class="row">
                                      <label class="col-sm-3 control-label text-right">NIM <span class="text-red">*</span></label>         
                                      <div class="col-sm-8"><input type="text" class="form-control" name="nim" placeholder="nim" value=""></div>
                                      </div>
                                    </div>
                                    <div class="form-group">
                                      <div class="row">
                                      <label class="col-sm-3 control-label text-right">Nama Pendaftar <span class="text-red">*</span></label>
                                      <div class="col-sm-8"><input type="text" class="form-control" name="nama_pendaftar" placeholder="nama_pendaftar" value=""></div>
                                      </div>
                                    </div>
                                    <div class="form-group">
                                      <div class="row">
                                      <label class="col-sm-3 control-label text-right">jurusan <span class="text-red">*</span></label>
                                      <div class="col-sm-8"><input type="text" class="form-control" name="jurusan" placeholder="jurusan" value="">
                                      </div>
                                      </div>
                                    </div>
                                    <div class="form-group">
                                      <div class="row">
                                      <label class="col-sm-3 control-label text-right">Prodi <span class="text-red">*</span></label>
                                        <div class="col-sm-8"><select name="prodi" class="form-control select2" style="width: 100%;">
                                          <option value="User" selected="selected">-- Pilih Satu --</option>
                                          <option value="teknik informatika">Teknik Informatika</option>
                                          <option value="teknik mesin">Teknik Mesin</option>
                                          <option value="teknik elektronika">Teknik Elektronika</option>
                                          <option value="teknik listrik">Teknik Listrik</option>
                                          <option value="teknik pengendalian pencemaran lingkungan">Teknik Pengendalian Pencemaran Lingkungan</option>
                                        </select>
                                        </div>
                                      </div>
                                    </div>
                                    
                                  </form>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div><!-- modal insert close -->

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
