<?php
include"koneksi.php";


 function pendaftar(){

  $this->ci->load->model('tb_datapendaftar');
  return $this->ci->tb_datapendaftar->get()->num_rows();
 }
?>

