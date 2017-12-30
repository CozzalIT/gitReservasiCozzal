<?php
  require('proses.php');
  $proses = new proses();
  
   if(isset($_POST['kirim'])){
	  $kd_apt = $_POST['kd_apt'];
	  $kd_unit = $_POST['kd_unit'];
	  $check_in = $_POST['CI'];
	  $check_out = $_POST['CO'];
	  $no_tlp= $_POST['no_tlp'];

    $add = $proses->addReservasi($kd_apt, $kd_unit, $no_tlp, $check_in, $check_out);

    if($add == "Success"){
	   header('Location:../index.php');
    } 
  }
   
?>
