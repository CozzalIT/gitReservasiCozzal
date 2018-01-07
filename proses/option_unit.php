<?php
// Load file koneksi.php
require("proses.php");

// Ambil data ID Provinsi yang dikirim via ajax post
$kd_apt = $_POST['apartemen'];

if ($kd_apt == 0){
	// Set defaultnya dengan tag option Pilih
	$html = "<option value=''>-- Pilih Unit --</option>";

	$Proses = new Proses();
	$show = $Proses->showUnit();
	while($data = $show->fetch(PDO::FETCH_OBJ)){
		$html .= "<option name='kd_unit' value='$data->kd_unit'>$data->no_unit - $data->nama_apt</option>"; // Tambahkan tag option ke variabel $html
	}


}
else{
	// Set defaultnya dengan tag option Pilih
	$html = "<option value=''>-- Pilih Unit --</option>";

	$Proses = new Proses();
	$show = $Proses->showUnit();
	while($data = $show->fetch(PDO::FETCH_OBJ)){
		if ($data->kd_apt==$kd_apt)
		$html .= "<option name='kd_unit' value='$data->kd_unit'>$data->no_unit - $data->nama_apt</option>"; // Tambahkan tag option ke variabel $html
	}
}

$callback = array('data_unit'=>$html); // Masukan variabel html tadi ke dalam array $callback dengan index array : data_kota

echo json_encode($callback); // konversi varibael $callback menjadi JSON
?>
