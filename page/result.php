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

if(isset($_POST['search']))
{
	echo '
<body>
<header> <h1 style="margin-bottom: 20px;">Data Unit Tersedia</h1> </header>
<section>
<br>
<center>
<div class="tab">
<table class="result">
	<thead>
		<tr class="result">
			<th class="result">No Unit</th>
			<th class="result">Nama Apartemen</th>
			<th class="result">Alamat</th>
			<th class="result">Harga Total</th>
			<th class="result">Action</th>
		</tr>
	</thead>';
				  $Proses = new Proses();
				  $CI2 = explode("/",$_POST['CI']);
				  $CO2 = explode("/",$_POST['CO']);
				  $CI=$CI2[2]."-".$CI2[0]."-".$CI2[1]; //YYYY-MM-DD
			      $week = date("w",strtotime($CI))+1; //urutan dari dalam seminggu, dimulai (1-7)
				  $CO=$CO2[2]."-".$CO2[0]."-".$CO2[1];
				  $jumlah_hari = (strtotime($CO) - strtotime($CI))/86400;
				  $show = $Proses->showTransaksi($CI,$CO);
				  $str = "_";
				  while($data = $show->fetch(PDO::FETCH_OBJ)){
						$str= $str."+".$data->kd_unit;
				  };
				  $show2 = $Proses->showUnit();
				  while($data2 = $show2->fetch(PDO::FETCH_OBJ)){
					if (booked($str,$data2->kd_unit)!="Benar")
					{
						$ec=0; if($_POST['jumlah_tamu']>5) $ec=$_POST['jumlah_tamu']-5; //ec = orag yg dhitung ektra charge
						if ($week>5) $harga_sewa = $data2->h_sewa_we; else $harga_sewa = $data2->h_sewa_wd;
						$harga_sewa = ($harga_sewa*$jumlah_hari)+($data2->h_sewa_wd*$ec);
						echo "
						  <tbody>
								<tr class='result'>
									<td class='result'>$data2->no_unit</td>
									<td class='result'>$data2->nama_apt</td>
									<td class='result'>$data2->alamat_apt</td>
									<td class='result'>$harga_sewa</td>
									<td class='result'>
										<a class='btnn' href='index.php?tci=$CI&tco=$CO&id=$data2->kd_unit'>Booking Sekarang</a>
									</td>
								</tr>
							</tbody>";
					}
				  };
				  echo "
					<tr>
					</tr>
					<tr class='result'>
						<td colspan='5' class='result'><b>*Total harga meliputi total biaya sewa ditambah ekstra charge</b></td>
					</tr>
</table>
</div>
</center>
</section>
</body>
</html>";
}
?>
