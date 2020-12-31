<?php
include"koneksi.php";


$query = "DELETE FROM tb_pegawai 
							WHERE nip_npak ='$_GET[nip_npak]'
								";

mysqli_query($koneksi, $query)
or die ("Gagal Perintah SQL".mysql_error());
header('location:datapegawai.php');

?>

