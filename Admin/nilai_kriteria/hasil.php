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
                    <th>Nama</th>
                    <th>nim</th>
                    <th>rangking</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php  
                  include "../koneksi.php";?>
                      <?php if ($query = $koneksi->query("SELECT (SELECT nama_pendaftar FROM mahasiswa WHERE nim=mhs.nim) AS nama,
                                  (SELECT nim FROM mahasiswa WHERE nim=mhs.nim) AS nim,
                                    SUM( IF( c.sifat = 'benefit', nilai.nilai / c.normalization, c.normalization / nilai.nilai ) * c.bobot ) AS rangking
                                    FROM nilai 
                                    JOIN mahasiswa mhs USING(nim) 
                                    JOIN ( SELECT nilai.kd_kriteria, kriteria.sifat, kriteria.bobot, 
                                          ROUND(IF(kriteria.sifat='benefit', MAX(nilai.nilai), MIN(nilai.nilai)), 1) AS normalization 
                                    FROM nilai JOIN kriteria USING(kd_kriteria) 
                                    GROUP BY nilai.kd_kriteria ) c USING (kd_kriteria) 
                                    GROUP BY nilai.nim ORDER BY rangking DESC")): ?>
                          <?php while($row = $query->fetch_assoc()): ?>
                          <tr>
                              <td><?=$row['nama']?></td>
                              <td><?=$row['nim']?></td>
                              <td><?=$row['rangking']?></td>
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
