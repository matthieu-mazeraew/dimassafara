<!DOCTYPE html> 
<html lang="en">

<head>
	<title>Tambah Data Pendaftar</title>
</head>
<body>
<?php
      include "sidebar.php";
?>
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

	 <div class="container">
        <div class="card mt-5">
            <div class="card-body">
            <table id="table" class="table table-striped table-bordered">
        <?php
            include "koneksi.php";
            $data = mysqli_query($koneksi, "select * from tb_datapendaftar where nim = $_GET[nim]");
            $row = mysqli_fetch_array ($data);
        ?>


            		<form role="form" method="post" action="update.php">
       				<div class="form-group">
                    	<label>nim</label>
                    	<input class="form-control border border-danger" name="nim"  disabled value="<?php echo $row['nim'] ; ?>">
                    </div>
                    <div class="form-group">
                    	<label>Nama Pendaftar</label>
                    	<input class="form-control border border-danger" name="nama_pendaftar"  value="<?php echo $row['nama_pendaftar'] ; ?>">
                    </div>
                    <div class="form-group">
                    	<label>Jurusan</label>
                    	<select class="form-control border border-danger" name="jurusan" >
                    		<option value="<?php echo $row['jurusan'] ; ?>"></option>
                    		<option value="Teknik Informatika">Teknik Informatika</option>
							<option value="Teknik Mesin">Teknik Mesin</option>
							<option value="Teknik Elektronika">Teknik Elektronika</option>
							<option value="Teknik Listrik">Teknik Listrik</option>
							<option value="Teknik Pengendalian Pencemaran Lingkungan">Teknik Pengendalian Pencemaran Lingkungan</option>
                        </select>
                    </div>
                    <div class="form-group">
                    	<label>Prodi</label>
                    	<select class="form-control border border-danger" name="prodi" >
                    		<option value="<?php echo $row['prodi'] ; ?>"></option>
                    		<option value="D3">D3</option>
							<option value="D4">D4</option>
						</select>
                    </div>
                     <div class="form-group">
                    	<label>Semester</label>
                    	<select class="form-control border border-danger" name="semester" >
                    		<option value="<?php echo $row['semester'] ; ?>"></option>
                    		<option value="1">1</option>
							<option value="2">2</option>
							<option value="3">3</option>
							<option value="4">4</option>
							<option value="5">5</option>
							<option value="6">6</option>
							<option value="7">7</option>
							<option value="8">8</option>
						</select>
                    </div>
                    <div class="form-group">
                    	<label>IPK</label>
                    	<input class="form-control border border-danger" name="ipk"  value="<?php echo $row['ipk'] ; ?>">
                    </div>

                    <div class="form-group">
                    	<label>Prestasi Non Akademik</label>
                    	<input class="form-control border border-danger" name="prestasi_non_aka"  value="<?php echo $row['prestasi_non_aka'] ; ?>">
                    </div>

                    <div class="form-group">
                    	<label>Keikutsertaan Ormawa</label>
                    	<input class="form-control border border-danger" name="keikutsertaan_ormawa"  value="<?php echo $row['keikutsertaan_ormawa'] ; ?>">
                    </div>

                    <div class="form-group">
                    	<label>tanggungan Orang Tua</label>
                    	<input class="form-control border border-danger" name="tanggungan_ortu"  value="<?php echo $row['tanggungan_ortu'] ; ?>">
                    </div>

                    <div class="form-group">
                    	<label>Penghasilan Orang Tua</label>
                    	<input class="form-control border border-danger" name="penghasilan_ortu"  value="<?php echo $row['penghasilan_ortu'] ; ?>">
                    </div>
                    <button type="submit" class="btn btn-primary pull-right">Simpan</button>
                    <a href="datapendaftar.php" class="btn btn-success pull-right" style="margin-right:1%;">Batal</a>
                </form>
                </table>
			</div>
		</div>
	 </div>
</body>