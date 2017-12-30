<!DOCTYPE html>
<?php
function Ada($str1,$str2)
{
	$ar = explode("+",$str1);
	$h = count($ar)-1;
    for($i=0;$i<$h;$i++)
	{ 
		if($str2==$ar[$i])
			return "Benar";
	}
}

if(isset($_POST['search']))
{
	
include "template/head.php";
	
	echo '
<body>
<header> <h1>Data Unit Tersedia</h1> </header>
<br>
<section>
<br>
<table>
	<tr><th>No Unit</th><th>Nama Apartemen</th><th>Alamat</th><th>Action</th></tr>';
				  require("proses/proses.php");
				  $Proses = new Proses();
				  $CI2 = explode("/",$_POST['CI']);
				  $CO2 = explode("/",$_POST['CO']); 
				  $CI=$CI2[2]."-".$CI2[0]."-".$CI2[1];
				  $CO=$CO2[2]."-".$CO2[0]."-".$CO2[1];
				  $show = $Proses->showTransaksi($CI,$CO);
				  $str = ""; echo $str;
				  while($data = $show->fetch(PDO::FETCH_OBJ)){
						$str= $str."+".$data->kd_unit;
				  };
				  $show2 = $Proses->showUnit();
				  while($data2 = $show2->fetch(PDO::FETCH_OBJ)){
					if (Ada($str,$data2->kd_unit)!="Benar")
					{
						echo "
								<tr class=gradeC'>
								<td>$data2->no_unit</td>
								<td>$data2->nama_apt</td>
								<td>$data2->alamat_apt</td>
								<td>
									<a class='btnn' href='booking.php?tci=$CI&tco=$CO&id=$data2->kd_unit'>Booking Sekarang</a>
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