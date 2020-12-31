<?php 
// mengaktifkan session php
session_start();
 
// menghubungkan dengan koneksi
include 'koneksi.php';
 
// menangkap data yang dikirim dari form
$username = $_POST['username'];
$pw = $_POST['pw'];
 
// menyeleksi data user dengan username dan password yang sesuai
$result = mysqli_query($koneksi,"SELECT * FROM tb_pegawai where username='$username' and pw='$pw'");

$cek = mysqli_num_rows($result);
 
if($cek > 0) {
	$data = mysqli_fetch_assoc($result);
	$_SESSION['username'] = $username;
    $_SESSION['role'] = $data['jabatan'];
	if($_SESSION['role']=="Supervisor") {
		header("location:datapegawai.php");
	}
	else {
		header("location:datapegawai.php");
	}
	
} else {
	header("location:login.php?pesan=gagal, Username atau password salah.");
}
?>