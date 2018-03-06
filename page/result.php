<!DOCTYPE html>
<?php
function booked($str1,$str2)
{
	$ar = explode("+",$str1);
	$h = count($ar);
    for($i=0;$i<$h;$i++)
	{
		if($str2==$ar[$i])
			return "Benar";
	}
}

function hargasewa($hwd, $hwe, $week, $j_hari){
	$we =0;
	if($week>5){
		$we = 8-$week;
		if($j_hari==1) $we=1;
	}
	$wd=$j_hari-$we;	
	return ($hwe*$we)+($hwd*$wd);
}

if(isset($_POST['search']))
{
	echo '
<body>
<header> <h1 style="margin-bottom: 20px;">Data Unit Tersedia</h1> </header>
<section>
<br>
<div class="tabs" style="padding-bottom: 10px;padding-top: 24px;">
<div class="tab" style="overflow-x:auto; overflow-y:auto;">
<table class="result table table-striped table-bordered data" style="margin-top: 10px;padding-top: 15px;">
	<thead>
		<tr class="result">
			<th class="result">No Unit</th>
			<th class="result">Nama Apartemen</th>
			<th class="result">Alamat</th>
			<th class="result">Harga Total</th>
			<th class="result">Action</th>
		</tr>
	</thead>
	<tbody>';
				  $Proses = new Proses();
				  $CI2 = explode("/",$_POST['CI']);
				  $CO2 = explode("/",$_POST['CO']);
				  $CI=$CI2[2]."-".$CI2[0]."-".$CI2[1]; //YYYY-MM-DD
			      $week = date("w",strtotime($CI))+1; //urutan dari dalam seminggu, dimulai (1-7)
				  $CO=$CO2[2]."-".$CO2[0]."-".$CO2[1];
				  $jumlah_hari = (strtotime($CO) - strtotime($CI))/86400;
				  $show = $Proses->showTransaksi($CI,$CO);
				  $str = "_";
				  while($data = $show->fetch(PDO::FETCH_OBJ)){$str= $str."+".$data->kd_unit;}
				  $show = $Proses->showBlocked($CI,$CO);
				  while($data = $show->fetch(PDO::FETCH_OBJ)){$str= $str."+".$data->kd_unit;}
				  $show2 = $Proses->showUnit();
				  while($data2 = $show2->fetch(PDO::FETCH_OBJ)){
					if (booked($str,$data2->kd_unit)!="Benar")
					{
						$ec=0; if($_POST['jumlah_tamu']>5) $ec=$_POST['jumlah_tamu']-5; //ec = orag yg dhitung ektra charge
						$harga_sewa = hargasewa($data2->h_sewa_wd, $data2->h_sewa_we, $week, $jumlah_hari)+($data2->ekstra_charge*$ec);
						echo "

								<tr class='result'>
									<td class='result'>$data2->no_unit</td>
									<td class='result'>$data2->nama_apt</td>
									<td class='result'>$data2->alamat_apt</td>
									<td class='result'>".number_format($harga_sewa, 0, '.', '.')." IDR</td>
									<td class='result'>
										<a id='btn1' href='index.php?tci=$CI&tco=$CO&id=$data2->kd_unit'>Booking Sekarang</a>
										<a id='btn2' href='#popup'>Lihat Detail</a>
									</td>
								</tr>
							";
					}
				  };
				  echo "
					</tbody>
					<tr class='result'>
						<td colspan='5' class='result'><b>*Total harga meliputi total biaya sewa ditambah ekstra charge</b></td>
					</tr>
</table>
</div>
</div>
</section>
	<div id='popup'>
		<div class='window'>
			<a href='#' class='close-button' title='Close'>X</a>
			<h2> Judul here </h2>
		</div>
	</div>
</body>
<script type='text/javascript'>
	$(document).ready(function(){
		$('.data').DataTable();
	});
</script>
</html>";
}
?>
