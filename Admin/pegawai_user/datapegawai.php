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
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">

              <!-- /.card-header -->

              <div class="card-body">
                <div class="box-tools pull-left">
                <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#tambahuser"><i class="fa fa-male"></i> Tambah Pegawai</a>
                </div>
                <table id="example1" class="table table-bordered">

                  <thead class="bg bg-secondary">
                  <tr>
                    <th>No.</th>
                    <th>NIP/NPAK</th>
                    <th>Nama</th>
                    <th>Jabatan</th>
                    <th>no_telp</th>
                    <th>foto</th>
                    <th>username</th>
                    <th>Password</th>
                    <th> </th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php
                  $no = 1;
                        include "../koneksi.php";
                        $data = mysqli_query($koneksi, "select * from tb_pegawai");
                        while ($row=mysqli_fetch_array($data))

                            {
                    ?>
                  <tr>
                      <td><?php echo $no++;?></td>
                        <td>
                      <?php echo $row['nip_npak']; ?>
                          </td>
                          <td>
                      <?php echo $row['nama']; ?>
                          </td>
                          <td>
                      <?php echo $row['jabatan']; ?>
                          </td>
                          <td>
                      <?php echo $row['no_telp']; ?>
                          </td>
                          <td>
                      <?php echo $row['foto']; ?>
                          </td>
                          <td>
                      <?php echo $row['username']; ?>
                          </td>
                          <td>
                      <?php echo $row['pw']; ?>
                          </td>
                          <td>
                             <a href='pegawai_edit.php?nip_npak=<?php echo $row['nip_npak'];  ?>' class="btn btn-primary btn-flat btn-xs"><i class="fa fa-pencil"></i></a>
                             <a href='pegawai_hapus.php?nip_npak=<?php echo $row['nip_npak'];  ?>' class="btn btn-danger btn-flat btn-xs"><i class="fa fa-trash"></i></a>
                          </td>
                  </tr>
                  <?php
                    }
                  ?>
                  </tbody>

                   <!-- modal delete -->
                      <div class="example-modal">
                        <div id="deleteuser<?php echo $no; ?>" class="modal fade" role="dialog" style="display:none;">
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
                                  <h3 class="modal-title">Tambah Data Pegawai</h3>
                                </div>
                                <div class="modal-body">
                                  <form action="pegawai_input.php" method="post" role="form">
                                    <div class="form-group">
                                      <div class="row">
                                      <label class="col-sm-3 control-label text-right">nip_npak <span class="text-red">*</span></label>         
                                      <div class="col-sm-8"><input type="text" class="form-control" name="nip_npak" placeholder="nip_npak" value=""></div>
                                      </div>
                                    </div>
                                    <div class="form-group">
                                      <div class="row">
                                      <label class="col-sm-3 control-label text-right">Nama <span class="text-red">*</span></label>
                                      <div class="col-sm-8"><input type="text" class="form-control" name="nama" placeholder="nama" value=""></div>
                                      </div>
                                    </div>
                                    <div class="form-group">
                                      <div class="row">
                                      <label class="col-sm-3 control-label text-right">jabatan <span class="text-red">*</span></label>
                                      <div class="col-sm-8"><input type="text" class="form-control" name="jabatan" placeholder="jabatan" value="">
                                      </div>
                                      </div>
                                    </div>
                                    <div class="form-group">
                                     <div class="row">
                                      <label class="col-sm-3 control-label text-right">no_telp <span class="text-red">*</span></label>
                                      <div class="col-sm-8"><input type="number" class="form-control" name="no_telp" placeholder="no_telp" value="">
                                      </div>
                                      </div>
                                    </div>
                                    <div class="form-group">
                                    <div class="row">
                                      <label class="col-sm-3 control-label text-right">foto<span class="text-red">*</span></label>
                                      <div class="btn btn-mdb-color btn-rounded float-left"><span>Choose file</span><input type="file" name="foto" placeholder="foto" value="">
                                      </div>
                                      </div>
                                    </div>
                                    <div class="form-group">
                                    <div class="row">
                                      <label class="col-sm-3 control-label text-right">Username<span class="text-red">*</span></label>
                                      <div class="col-sm-8"><input type="text" class="form-control" name="username" placeholder="username" value="">
                                      </div>
                                      </div>
                                    </div>
                                    <div class="form-group">
                                    <div class="row">
                                      <label class="col-sm-3 control-label text-right">Password<span class="text-red">*</span></label>
                                      <div class="col-sm-8"><input type="text" class="form-control" name="pw" placeholder="pw" value="">
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

                      <!-- modal update user -->
                      <div class="example-modal">
                        <div id="updateuser<?php echo $no; ?>" class="modal fade bd-example-modal-sm" role="dialog" style="display:none;">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h3 class="modal-title">Edit Data User</h3>
                              </div>
                              <div class="modal-body">
                                   <form action="update.php" method="post" role="form">
                                  <?php
                                  $nim = $row['nim'];
                                  $query = "SELECT * FROM tb_datapendaftar WHERE nim='$nim'";
                                  $result = mysqli_query($koneksi, $query);
                                  while ($row = mysqli_fetch_assoc($result)) {
                                  ?>
                                    <div class="form-group">
                                      <div class="row">
                                      <label class="col-sm-3 control-label text-right">NIM <span class="text-red">*</span></label>         
                                      <div class="col-sm-8"><input type="text" class="form-control" name="nim" placeholder="nim" value="<?php echo $row['nim']; ?>"></div>
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
                                  <?php
                                  }
                                  ?>
                                </form>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div><!-- modal update user -->

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
