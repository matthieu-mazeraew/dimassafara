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
                <div class="box-tools pull-left">
                <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#tambahuser"><i class="fa fa-male"></i> Tambah User</a>
                </div>
                <table id="example1" class="table table-bordered table-striped">

                  <thead>
                  <tr>
                    <th>No.</th>
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
                  <?php
                  $no = 1;
                        include "koneksi.php";
                        $data = mysqli_query($koneksi, "select * from tb_datapendaftar");
                        while ($row=mysqli_fetch_array($data))

                            {
                    ?>
                  <tr>
                      <td><?php echo $no++;?></td>
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
                             <a href="dp_edit.php?nim=<?php echo $row['nim']; ?>" class="btn btn-primary btn-flat btn-xs">Edit</a>
                             <a href="dp_hapus.php?nim=<?php echo $row['nim']; ?>" class="btn btn-danger btn-flat btn-xs"><i class="fa fa-trash"></i> Delete</a>
                          </td>
                  </tr>
                  <?php
                    }
                  ?>
                  </tbody>

                   <!-- modal delete -->
                      <div class="example-modal">
                        <div id="deleteuser<?php echo $nim; ?>" class="modal fade" role="dialog" style="display:none;">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h3 class="modal-title">Konfirmasi Delete Data User</h3>
                              </div>
                              <div class="modal-body">
                                <h4 align="center" >Apakah anda yakin ingin menghapus Pendaftar berikut <?php echo $row['nim'];?><strong><span class="grt"></span></strong> ?</h4>
                              </div>
                              <div class="modal-footer">
                                <button id="nodelete" type="button" class="btn btn-danger pull-left" data-dismiss="modal">Cancle</button>
                                <a href="dp_hapus.php?nim=<?php echo $row['nim']; ?>" class="btn btn-primary">Delete</a>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div><!-- modal delete -->
                  
                         <!-- modal insert -->
                        <div class="example-modal">
                          <div id="tambahuser" class="modal fade bd-example-modal-sm" role="dialog" style="display:none;">
                            <div class="modal-dialog modal-lg"> 
                              <div class="modal-content">
                                <div class="modal-header">
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                  <h3 class="modal-title">Tambah Data Pendaftar</h3>
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
                                    <div class="form-group">
                                     <div class="row">
                                      <label class="col-sm-3 control-label text-right">Semester <span class="text-red">*</span></label>
                                      <div class="col-sm-8"><input type="number" class="form-control" name="semester" placeholder="semester" value="">
                                      </div>
                                      </div>
                                    </div>
                                    <div class="form-group">
                                    <div class="row">
                                      <label class="col-sm-3 control-label text-right">IPK<span class="text-red">*</span></label>
                                      <div class="col-sm-8"><input type="number" class="form-control" name="ipk" placeholder="ipk" value="">
                                      </div>
                                      </div>
                                    </div>
                                    <div class="form-group">
                                    <div class="row">
                                      <label class="col-sm-3 control-label text-right">Prestasi Non Akademik<span class="text-red">*</span></label>
                                      <div class="col-sm-8"><input type="number" class="form-control" name="prestasi_non_aka" placeholder="prestasi_non_aka" value="">
                                      </div>
                                      </div>
                                    </div>
                                    <div class="form-group">
                                    <div class="row">
                                      <label class="col-sm-3 control-label text-right">Keikutsertaan Ormawa<span class="text-red">*</span></label>
                                      <div class="col-sm-8"><input type="text" class="form-control" name="keikutsertaan_ormawa" placeholder="keikutsertaan_ormawa" value="">
                                      </div>
                                      </div>
                                    </div>
                                    <div class="form-group">
                                    <div class="row">
                                      <label class="col-sm-3 control-label text-right">Tanggungan Orang Tua<span class="text-red">*</span></label>
                                      <div class="col-sm-8"><input type="number" class="form-control" name="tanggungan_ortu" placeholder="tanggungan_ortu" value="">
                                      </div>
                                      </div>
                                    </div>
                                    <div class="form-group">
                                    <div class="row">
                                      <label class="col-sm-3 control-label text-right">Penghasilan Orang Tua<span class="text-red">*</span></label>
                                      <div class="col-sm-8"><input type="number" class="form-control" name="penghasilan_ortu" placeholder="penghasilan_ortu" value="">
                                      </div>
                                      </div>
                                    </div>
                                    <div class="form-group">
                                    <div class="modal-footer">
                                      <button id="nosave" type="button" class="btn btn-danger pull-left" data-dismiss="modal">Batal</button>
                                      <input type="submit" name="submit" class="btn btn-primary" value="Simpan">
                                    </div>
                                  </div>
                                    <!--<div class="box-footer">
                                      <a href="../user/data_user.php" class="btn btn-danger"><i class="fa fa-close"></i> Batal</a>
                                      <input type="submit" name="submit" class="btn btn-primary" value="Simpan">
                                    </div> /.box-footer -->
                                  </form>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div><!-- modal insert close -->


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
