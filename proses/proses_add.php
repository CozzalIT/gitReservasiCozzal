<?php
  require('proses.php');
  $proses = new proses();

  If (isset($_POST['kirim'])){
	  $kd_apt = $_POST['kd_apt'];
	  $kd_unit = $_POST['kd_unit'];
	  $check_in = $_POST['CI'];
	  $check_out = $_POST['CO'];
	  $no_tlp= $_POST['no_tlp'];
	  $nama = $_POST['nama'];
	  $tgl = date("Y-m-d");
    $add = $proses->addReservasi($kd_apt, $kd_unit, $no_tlp, $check_in, $check_out, $nama, $tgl);

    If($add == "Success"){
	   header("Location:../index.php?succes");
    }
  }

  If (isset($_POST['requestListing'])){
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $no_tlp = $_POST['no_tlp'];
    $email = $_POST['email'];
    $apartemen = $_POST['apartemen'];
    $tipe = $_POST['tipe'];
    $lantai = $_POST['lantai'];
    $kondisi = $_POST['kondisi'];
    $status = $_POST['status'];
    $add = $proses->addRequest($nama, $alamat, $no_tlp, $email, $apartemen, $tipe, $lantai, $kondisi, $status);

    If($add == "Success"){
      header("Location:../request.php?success");
    }
  }
?>
