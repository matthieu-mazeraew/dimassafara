<?php
include"../koneksi.php";


$query = "DELETE FROM kriteria 
							WHERE kd_kriteria ='$_GET[kd_kriteria]'
								";

mysqli_query($koneksi, $query)
or die ("Gagal Perintah SQL".mysql_error());
header('location:kriteria.php');

?>

