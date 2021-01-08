<?php
include"../koneksi.php";


$query = "DELETE FROM mahasiswa 
							WHERE nim ='$_GET[nim]'
								";

mysqli_query($koneksi, $query)
or die ("Gagal Perintah SQL".mysql_error());
header('location:datapendaftar.php');

?>

