<!DOCTYPE html> 
<html lang="en">

<head>
    <title>Edit bobot</title>
</head>
<body>
<?php
            include "../sidebar.php";
            include "../koneksi.php";
            $data = mysqli_query($koneksi, "select * from tb_datapendaftar where nim = $_GET[nim]");
            $row = mysqli_fetch_array ($data);
        ?>
<<div class="container">
        <div class="card mt-5">
            <div class="card-body">
            <table id="table" class="table table-striped table-bordered">


                    <form role="form" method="post" action="dp_update.php">
                        <input class="form-control border border-danger" type="hidden" required="" name="nim" value="<?php echo $row['nim'] ; ?>">
                    <div class="form-group">
                        <label>Nama Pendaftar</label>
                        <input class="form-control border border-danger" name="nama_pendaftar" type="text" required=""  value="<?php echo $row['nama_pendaftar'] ; ?>">

                    <div class="form-group">
                                <label>Jurusan</label>
                                <select class="form-control border border-danger" name="jurusan" >">
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
                                <select class="form-control border border-danger" name="prodi" >">
                                <option value="<?php echo $row['prodi'] ; ?>"></option>
                                    <option>D3</option> 
                                    <option>D4</option>
                                </select>
                    </div>
                    <div class="form-group">
                        <label>Semester</label>
                        <input class="form-control border border-danger" name="semester" type="number" required=""  value="<?php echo $row['semester'] ; ?>">
                    </div>
                    <div class="form-group">
                        <label>IPK</label>
                        <input class="form-control border border-danger" name="ipk" type="number" required=""  value="<?php echo $row['ipk'] ; ?>">

                    <div class="form-group">
                        <label>Prestasi Non Akademik</label>
                        <input class="form-control border border-danger" name="prestasi_non_aka" type="number" required=""  value="<?php echo $row['prestasi_non_aka'] ; ?>">
                    </div>

                    <div class="form-group">
                                <label>Keikutsertaan Ormawa</label>
                                <select class="form-control border border-danger" name="keikutsertaan_ormawa" >">
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
                        <input class="form-control border border-danger" name="tanggungan_ortu" type="number" required=""  value="<?php echo $row['tanggungan_ortu'] ; ?>">
                    </div>

                    <div class="form-group">
                        <label>Penghasilan Orang Tua</label>
                        <input class="form-control border border-danger" name="penghasilan_ortu" type="number" required=""  value="<?php echo $row['penghasilan_ortu'] ; ?>">
                    </div>
                    <button type="submit" class="btn btn-primary pull-right">Simpan</button>
                    <a href="bobot.php" class="btn btn-success pull-right" style="margin-right:1%;">Batal</a>
                </form>
                </table>
            </div>
        </div>
     </div>
</body>
<script src="http://code.jquery.com/jquery-1.12.0.min.js"></script>
<script src="//cdn.datatables.net/1.10.11/js/jquery.dataTables.min.js"></script>
<script>
$(document).ready(function() {
$('.datatab').DataTable();
} );
</script>
</html>