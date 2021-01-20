<?php
include "../koneksi.php";

$nama = $_POST['nama'];
$sifat = $_POST['sifat'];
$bobot = $_POST['bobot'];


$query = "insert INTO kriteria VALUES ('',' $nama', '$sifat', '$bobot')";

mysqli_query($koneksi, $query)
or die ("Gagal Perintah SQL".mysql_error());
header('location:kriteria.php');

?>