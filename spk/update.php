<?php
include"koneksi.php";

$nim = $_POST['nim'];
$nama_pendaftar = $_POST['nama_pendaftar'];
$jurusan = $_POST['jurusan'];
$prodi = $_POST['prodi'];
$semester = $_POST['semester'];
$ipk = $_POST['ipk'];
$prestasi_non_aka = $_POST['prestasi_non_aka'];
$keikutsertaan_ormawa = $_POST['keikutsertaan_ormawa'];
$tanggungan_ortu = $_POST['tanggungan_ortu'];
$penghasilan_ortu = $_POST['penghasilan_ortu'];


mysqli_query($koneksi, "update tb_datapendaftar set nim='$nim', nama_pendaftar='$nama_pendaftar', jurusan='$jurusan', prodi='$prodi', semester='$semester', ipk='$ipk', prestasi_non_aka='$prestasi_non_aka', keikutsertaan_ormawa='$keikutsertaan_ormawa', tanggungan_ortu='$tanggungan_ortu', penghasilan_ortu='$penghasilan_ortu' where nim = '$nim'")
or die ("Gagal Perintah SQL".mysql_error());
header('location:datapendaftar.php');

?>
