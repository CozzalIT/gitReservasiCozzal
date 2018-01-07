<!DOCTYPE html>
<?php
function Ada($str1,$str2)
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
<header> <h1>Data Unit Tersedia</h1> </header>
<br>
<section>
<br>
<table>
	<tr><th>No Unit</th><th>Nama Apartemen</th><th>Alamat</th><th>Harga Total</th><th>Action</th></tr>';
				  $Proses = new Proses();
				  $CI2 = explode("/",$_POST['CI']);
				  $CO2 = explode("/",$_POST['CO']);
				  $CI=$CI2[2]."-".$CI2[0]."-".$CI2[1]; //YYYY-MM-DD
			      $week = date("w",strtotime($CI))+1; //urutan dari dalam seminggu, dimulai (1-7)
				  $CO=$CO2[2]."-".$CO2[0]."-".$CO2[1];
				  $jumlah_hari = (strtotime($CO) - strtotime($CI))/86400;
				  $show = $Proses->showTransaksi($CI,$CO);
				  $str = "0"; 
				  while($data = $show->fetch(PDO::FETCH_OBJ)){
						$str= $str."+".$data->kd_unit;
				  };
				  $show2 = $Proses->showUnit();
				  while($data2 = $show2->fetch(PDO::FETCH_OBJ)){
					if (Ada($str,$data2->kd_unit)!="Benar")
					{
						$ec=0; if($_POST['jumlah_tamu']>5) $ec=$_POST['jumlah_tamu']-5; //ec = orag yg dhitung ektra charge
						if ($week>5) $harga_sewa = $data2->h_sewa_we; else $harga_sewa = $data2->h_sewa_wd;
						$harga_sewa = ($harga_sewa*$jumlah_hari)+($data2->h_sewa_wd*$ec);
						echo "
								<tr class=gradeC'>
								<td>$data2->no_unit</td>
								<td>$data2->nama_apt</td>
								<td>$data2->alamat_apt</td>
								<td>$harga_sewa</td>
								<td>
									<a class='btnn' href='index.php?tci=$CI&tco=$CO&id=$data2->kd_unit'>Booking Sekarang</a>
								</td>
								</tr>";
					}
				  };
				  echo "
</table>
</section>
</body>
</html>";
}
?>
