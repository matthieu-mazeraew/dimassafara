<!DOCTYPE html> 
<html lang="en">

<head>
    <title>Edit bobot</title>
</head>
<body>
<?php
            include "sidebar.php";
            include "koneksi.php";
            $data = mysqli_query($koneksi, "select * from tb_pegawai where nip_npak = $_GET[nip_npak]");
            $row = mysqli_fetch_array ($data);
        ?>
<<div class="container">
        <div class="card mt-5">
            <div class="card-body">
            <table id="table" class="table table-striped table-bordered">


                    <form role="form" method="post" action="pegawai_update.php">
                        <input class="form-control border border-danger" type="hidden" required="" name="nip_npak" value="<?php echo $row['nip_npak'] ; ?>">

                    <div class="form-group">
                        <label>Nama</label>
                        <input class="form-control border border-danger" name="nama" type="text" required=""  value="<?php echo $row['nama'] ; ?>">
                    </div>

                    <div class="form-group">
                        <label>jabatan</label>
                        <input class="form-control border border-danger" name="jabatan" type="text" required=""  value="<?php echo $row['jabatan'] ; ?>">
                    </div>

                    <div class="form-group">
                        <label>No Telepon</label>
                        <input class="form-control border border-danger" name="no_telp" type="text" required=""  value="<?php echo $row['no_telp'] ; ?>">
                    </div>

                    <div class="form-group">
                        <label>Username</label>
                        <input class="form-control border border-danger" name="username" type="text" required=""  value="<?php echo $row['username'] ; ?>">
                    </div>

                    <div class="form-group">
                        <label>Password</label>
                        <input class="form-control border border-danger" name="pw" type="text" required=""  value="<?php echo $row['pw'] ; ?>">
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