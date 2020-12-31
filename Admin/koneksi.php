<?php

$koneksi = mysqli_connect("localhost","root","","beasiswa_iom");
 
// Check connection
if (mysqli_connect_errno()){
	echo "Koneksi database gagal : " . mysqli_connect_error();
}
 
?>


<!-- 
<div class="dropdown">
            <a class="dropdown-item" href="dp_edit?nim=<?php echo $row['nim']; ?>">Edit</a>
            <a class="dropdown-item" href="dp_hapus?nim=<?php echo $row['nim']; ?>">Hapus</a>
            <span class="dropdown-item-text">Menu</span>
            </div> -->