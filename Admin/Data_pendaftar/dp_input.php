<?php
include "../koneksi.php";

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
$foto = $_POST['foto'];

$query = "insert INTO tb_datapendaftar VALUES ('$nim',' $nama_pendaftar', '$jurusan', '$prodi', '$semester', '$ipk', '$prestasi_non_aka', '$keikutsertaan_ormawa', '$tanggungan_ortu', '$penghasilan_ortu', '$foto')";

mysqli_query($koneksi, $query)
or die ("Gagal Perintah SQL".mysql_error());
header('location:datapendaftar.php');

?>