<?php
echo '
<!DOCTYPE html>
<html>
<body>
	<h1>Reservasi Cozzal</h1>

	<div class="container">

		<div class="tab">

			<div id="horizontalTab" style="display: block; width: 100%; margin: 0px;">
				<script src="js/easyResponsiveTabs.js" type="text/javascript"></script>
				<script type="text/javascript">
					$(document).ready(function () {
						$("#horizontalTab").easyResponsiveTabs({
							type: "default", //Types: default, vertical, accordion
							width: "auto", //auto or any width like 600px
							fit: true,   // 100% fit in a container
							closed: "accordion", // Start closed if in accordion view
							activate: function(event) { // Callback function if tab is switched
								var $tab = $(this);
								var $info = $("#tabInfo");
								var $name = $("span", $info);
								$name.text($tab.text());
								$info.show();
							}
						});

						$("#verticalTab").easyResponsiveTabs({
							type: "vertical",
							width: "auto",
							fit: true
						});
					});
				</script>

				<div class="tabs">
					<div class="tab-right">
						<div class="w3l-sign-in">
									<form action="proses/proses_add.php" method="post" class="agile_form">
										<div class="list_agileits_w3layouts"> ';
								
										 $CI =
										 $Proses = new Proses();
										 $show = $Proses->Unitby_id($_GET['id']);
										 $edit = $show->fetch(PDO::FETCH_OBJ);
										 echo '
										 <input type="text" name="kd_unit" value="'.$_GET['id'].'" class="hiden"/>
										 <input type="text" name="kd_apt" value="'.$edit->kd_apt.'" class="hiden"/>
											<div class="section_class_agileits sec-right">
											  <label class="label">No Unit</label>
											  <input type="text" name="no_unit" class="name agileits" value="'.$edit->no_unit.'" required="" disabled/>
											</div>
											<div class="section_class_agileits sec-right">
											  <label class="label">Nama Apartemen</label>
											  <input type="text"  name="nama_apt" class="name agileits" value="'.$edit->nama_apt.'" required="" disabled/>
											</div>
											<div class="section_class_agileits sec-right">
											  <label class="label">Check In</label>
											  <input type="text" name="CI" class="name agileits" value="'.$_GET['tci'].'" required="" />
											</div>
											<div class="section_class_agileits sec-right">
											  <label class="label">Check Out</label>
											  <input type="text" name="CO" class="name agileits" value="'.$_GET['tco'].'" required="" />
											</div>
											<div class="section_class_agileits sec-right">
											  <label class="label">Whatsapp</label>
											  <input type="text" placeholder="Phone Number / Whatsapp" name="no_tlp" class="name agileits" required=""/>
											</div>
											<div class="submit">
												<input type="submit" value="Kirim Permintaan" name="kirim">
											</div>
											<div class="clear"></div>
										</div>
									</form>
								</div>
					</div>
					<div class="clear"></div>
			</div>
		</div>
	</div>
';
?>
