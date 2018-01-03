<?php
$unit = $_POST['unit'];

$check_in = explode("/",$_POST['check_in']);
$check_out = explode("/",$_POST['check_out']);
$check_in_mod = $check_in[2]."-".$check_in[0]."-".$check_in[1];
$check_out_mod = $check_out[2]."-".$check_out[0]."-".$check_out[1];

echo "<br>$check_in_mod<br>$check_out_mod<br>";

$Proses = new Proses();
$show = $Proses->showTransaksiUnit($unit);
while($data = $show->fetch(PDO::FETCH_OBJ)){
  if (($data->check_in <= $check_in_mod and $data->check_out >= $check_out_mod)
    or ($data->check_in >= $check_in_mod and $data->check_in <= $check_out_mod)
    or ($data->check_out >= $check_in_mod and $data->check_out <= $check_out_mod) ){
      echo "
        Tanggal $check_in_mod sampai $check_out_mod unit tidak tersedia, Silakan pilih tanggal atau unit lain.
      ";
      $hasil = "Terisi";
  } else {
    $hasil = "Kosong";
  }
}

if ($hasil == "Kosong"){
  echo 'Permintaan dikirim, silahkan tunggu konfirmasi kami via WA/Telpon';
}

?>
