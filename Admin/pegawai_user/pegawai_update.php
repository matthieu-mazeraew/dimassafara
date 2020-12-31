<?php
include"koneksi.php";

$nip_npak = $_POST['nip_npak'];
$nama = $_POST['nama'];
$jabatan = $_POST['jabatan'];
$no_telp = $_POST['no_telp'];
$username = $_POST['username'];
$pw = $_POST['pw'];


mysqli_query($koneksi, "update tb_pegawai set nip_npak ='$nip_npak', nama='$nama', jabatan='$jabatan', no_telp='$no_telp', username='$username', pw='$pw' where nip_npak = '$nip_npak'")
or die ("Gagal Perintah SQL".mysql_error());
header('location:datapegawai.php');

?>