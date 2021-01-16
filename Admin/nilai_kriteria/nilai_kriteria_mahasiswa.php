<?php

include "../koneksi.php";

$update = (isset($_GET['action']) AND $_GET['action'] == 'update') ? true : false;
if ($update) {
  $sql = $koneksi->query("SELECT * FROM nilai JOIN penilaian USING(kd_kriteria) WHERE kd_nilai='$_GET[key]'");
  $row = $sql->fetch_assoc();
}

if ($_SERVER["REQUEST_METHOD"] == "POST" AND isset($_POST["save"])) {
  $validasi = false; $err = false;
  if ($update) {
    $sql = "UPDATE nilai SET kd_kriteria='$_POST[kd_kriteria]', nim='$_POST[nim]', nilai='$_POST[nilai]' WHERE kd_nilai='$_GET[key]'";
  } else {
    $query = "INSERT INTO nilai VALUES ";
    foreach ($_POST["nilai"] as $kd_kriteria => $nilai) {
      $query .= "(NULL, '$kd_kriteria', '$_POST[nim]', '$nilai'),";
    }
    $sql = rtrim($query, ',');
    $validasi = true;
  }

  if ($validasi) {
    foreach ($_POST["nilai"] as $kd_kriteria => $nilai) {
      $q = $koneksi->query("SELECT kd_nilai FROM nilai WHERE kd_kriteria=$kd_kriteria AND nim=$_POST[nim] AND nilai LIKE '%$nilai%'");
      if ($q->num_rows) {
        echo alert("Nilai untuk ".$_POST["nim"]." sudah ada!", "?page=nilai");
        $err = true;
      }
    }
  }

  if (!$err AND $koneksi->query($sql)) {
    echo alert("Berhasil!");
  } else {
    echo alert("Gagal!");
  }
}

if (isset($_GET['action']) AND $_GET['action'] == 'delete') {
  $koneksi->query("DELETE FROM nilai WHERE kd_nilai='$_GET[key]'");
  echo alert("Berhasil!", "?page=nilai");
}
?>



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
                <a href="#" class="btn btn-secondary" data-toggle="modal" data-target="#tambahuser"><i class="fa fa-male"></i> Tambah</a>
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
          $a=mysqli_query($koneksi, "select * from mahasiswa order by nim asc;");
       
          while($da=mysqli_fetch_assoc($a)){
            echo "<tr>
              <td>".(++$i)."</td>
              <td>".$da['nim']."</td>
              <td>".$da['nama_pendaftar']."</td>";
              $idalt=$da['nim'];
              //ambil nilai
                $n=mysqli_query($koneksi, "select * from nilai where nim='$idalt' order by kd_nilai asc");
                
              while($dn=mysqli_fetch_assoc($n)){
              
                echo "<td align='center'>$dn[nilai]</td>";
              }
              echo "</tr>\n";

          }

          ?>
                    </tr>

                  </tbody>

                  <div class="example-modal">
                          <div id="tambahuser" class="modal fade bd-example-modal-sm" role="dialog" style="display:none;">
                            <div class="modal-dialog modal-lg"> 
                              <div class="modal-content">
                                <div class="modal-header">
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                  <h3 class="modal-title">Tambah Data Kriteria</h3>
                                </div>
                                <div class="modal-body">
                                  <form action="<?=$_SERVER["REQUEST_URI"]?>" method="post">
                                    <div class="form-group">
                                      <label for="nim">Mahasiswa</label>
                                      <?php if ($_POST): ?>
                                        <input type="text" name="nim" value="<?=$_POST["nim"]?>" class="form-control" readonly="on">
                                      <?php else: ?>
                                        <select class="form-control" name="nim">
                                          <option>---</option>
                                          <?php $sql = $koneksi->query("SELECT * FROM mahasiswa"); while ($data = $sql->fetch_assoc()): ?>
                                            <option value="<?=$data["nim"]?>" <?= (!$update) ? "" : (($row["nim"] != $data["nim"]) ? "" : 'selected="selected"') ?>><?=$data["nim"]?> | <?=$data["nama_pendaftar"]?></option>
                                          <?php endwhile; ?>
                                        </select>
                                      <?php endif; ?>
                                    </div>
                                    <?php if ($_POST): ?>
                                      <?php $q = $koneksi->query("SELECT * FROM kriteria"); while ($r = $q->fetch_assoc()): ?>
                                          <div class="form-group">
                                              <label for="nilai"><?=ucfirst($r["nama"])?></label>
                                              <select class="form-control" name="nilai[<?=$r["kd_kriteria"]?>]" id="nilai">
                                                <option>---</option>
                                                <?php $sql = $koneksi->query("SELECT * FROM penilaian WHERE kd_kriteria=$r[kd_kriteria]"); while ($data = $sql->fetch_assoc()): ?>
                                                  <option value="<?=$data["bobot"]?>" class="<?=$data["kd_kriteria"]?>"<?= (!$update) ? "" : (($row["kd_penilaian"] != $data["kd_penilaian"]) ? "" : ' selected="selected"') ?>><?=$data["keterangan"]?></option>
                                                <?php endwhile; ?>
                                              </select>
                                          </div>
                                      <?php endwhile; ?>
                                      <input type="hidden" name="save" value="true">
                                    <?php endif; ?>
                                    <button type="submit" id="simpan" class="btn btn-<?= ($update) ? "warning" : "info" ?> btn-block"><?=($_POST) ? "Simpan" : "Tampilkan Kriteria"?></button>
                                    <?php if ($update): ?>
                                      <a href="?page=nilai" class="btn btn-info btn-block">Batal</a>
                                    <?php endif; ?>
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
