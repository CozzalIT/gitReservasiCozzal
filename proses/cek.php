<h1>Reservasi Cozzal</h1>

<div class="container">

	<div class="tab">

		<div id="horizontalTab" style="display: block; width: 100%; margin: 0px;">
			<div class="tabs-konfirmasi">
        <?php
        $kd_unit = $_POST['unit'];
        $unit = explode('*', $kd_unit);
		    $apt = $_POST['apartemen'];

        $check_in = explode("/",$_POST['check_in']);
        $check_out = explode("/",$_POST['check_out']);
        $check_in_mod = $check_in[2]."-".$check_in[0]."-".$check_in[1];
        $check_out_mod = $check_out[2]."-".$check_out[0]."-".$check_out[1];

        $Proses = new Proses(); $hasil = "Kosong";
        $show = $Proses->showTransaksiUnit($unit[0],$apt);
        while($data = $show->fetch(PDO::FETCH_OBJ)){
          if (($data->check_in <= $check_in_mod and $data->check_out >= $check_out_mod)
            or ($data->check_in >= $check_in_mod and $data->check_in < $check_out_mod)
            or ($data->check_out > $check_in_mod and $data->check_out <= $check_out_mod)){
              $hasil = "Terisi";
          }
        }
      if($hasil=="Kosong"){
          $show = $Proses->showBlocked($check_in_mod,$check_out_mod);
          while($data = $show->fetch(PDO::FETCH_OBJ)){
              if($data->kd_unit==$unit[0]) $hasil = "Terisi";   
          }
      }
        if ($hasil == "Kosong"){
          if ($unit[0]==0)
		  header('Location:index.php?tci='.$check_in_mod.'&tco='.$check_out_mod.'&id='.$unit[0].'&kd_apt='.$apt);    
		  else
		  header('Location:index.php?tci='.$check_in_mod.'&tco='.$check_out_mod.'&id='.$unit[0]);
		  }
		  else  
		  echo "
                <h1 class='icon'><i class='fa fa-warning' aria-hidden='true'></i></h1><br><h1 class='notice'>Unit tidak tersedia! Silakan pilih tanggal atau unit lain</h1>
               ";

        ?>

				<div class="clear"></div>
			</div>
		</div>
	</div>
</div>
