<?php
include "koneksi.php";

$nip_npak = $_POST['nip_npak'];
$nama = $_POST['nama'];
$jabatan = $_POST['jabatan'];
$no_telp = $_POST['no_telp'];
$foto = $_POST['foto'];
$username = $_POST['username'];
$pw = $_POST['pw'];

$query = "insert INTO tb_pegawai VALUES ('$nip_npak',' $nama', '$jabatan', '$no_telp', '$foto', '$username','$pw')";

mysqli_query($koneksi, $query)
or die ("Gagal Perintah SQL".mysql_error());
header('location:datapegawai.php');

?>