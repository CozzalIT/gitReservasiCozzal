<h1>Reservasi Cozzal</h1>

<div class="container">

	<div class="tab">

		<div id="horizontalTab" style="display: block; width: 100%; margin: 0px;">
			<script src="js/easyResponsiveTabs.js" type="text/javascript"></script>
			<script type="text/javascript">
				$(document).ready(function () {
					$('#horizontalTab').easyResponsiveTabs({
						type: 'default', //Types: default, vertical, accordion
						width: 'auto', //auto or any width like 600px
						fit: true,   // 100% fit in a container
						closed: 'accordion', // Start closed if in accordion view
						activate: function(event) { // Callback function if tab is switched
							var $tab = $(this);
							var $info = $('#tabInfo');
							var $name = $('span', $info);
							$name.text($tab.text());
							$info.show();
						}
					});


					if ($('#F').val()=="True") swal("Permintaan dikirim","Silahkan tunggu balasan dari kami","success");

					$('#verticalTab').easyResponsiveTabs({
						type: 'vertical',
						width: 'auto',
						fit: true
					});
				});
			</script>

			<div class="tabs">

				<div class="tab-left">
					<ul class="resp-tabs-list">
						<li class="resp-tab-item"><i class="fa fa-calendar" aria-hidden="true"></i>Check In</li>
						<li class="resp-tab-item"><i class="fa fa-building" aria-hidden="true"></i>Apartemen</li>
						<li class="resp-tab-item"><i class="fa fa-phone" aria-hidden="true"></i>Contact Us</li>
					</ul>
				</div>

				<div class="tab-right">
					<div class="resp-tabs-container">
						<div class="tab-1 resp-tab-content">
							<div class="register agileits">
								<form action="" method="post" class="agile_form">
									<div class="section_class_agileits sec-right">
										<input placeholder="Check in date" name="CI" class="date" id="datepicker3" type="text" value="" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = '';}" required=""/>
										<input placeholder="Check out date" name="CO" class="date" id="datepicker4" type="text" value="" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = '';}" required=""/>
										<input type="text" name="day" class="name agileits number1" min="1" max="1000" id="jumlah_hari"  />
										<input type="number" placeholder="Jumlah Tamu" name="jumlah_tamu" min="1" class="number1" />
									</div>
									<div class="submit">
										<input type="submit" value="search" name="search">
									</div>
								</form>
							</div>
						</div>
						<div class="tab-1 resp-tab-content">
							<div class="w3l-sign-in">
								<form action="" method="post" class="agile_form">
									<div class="list_agileits_w3layouts">
										<div class="section_class_agileits sec-left">
											<select id="apartemen" name="apartemen" onchange="$('#price_div').hide();" required="">
												<option value="">-- Pilih Apartemen --</option>
												<?php
													$Proses = new Proses();
													$show = $Proses->showApartemen();
													while($data = $show->fetch(PDO::FETCH_OBJ)){
														echo "<option value='$data->kd_apt'>$data->nama_apt</option>";
													}
													echo '
													<option value="0">Semua Apartemen</option>
													</select>
													<input type="text" name="day" id="F" style="display:none" value='.$GLOBALS['hasilbooking'].' disabled />';
												?>
										</div>
										<div class="section_class_agileits sec-right">
											<select name="unit" id="unit" required="">
												<option value="">-- Pilih Unit --</option>
												<option name='kd_unit' id="unit" value='0'>Semua Unit</option>
											</select>
											<!--<div id="loading" style="margin-top: 15px;">
												<img src="images/loading.gif" width="18"> <small>Loading...</small>
											</div>-->
										</div>
										<div class="clear"></div>
									</div>
									<div class="section_class_agileits sec-right">
										<label class="label" >Check In</label>
										<input placeholder="mm/dd/yyyy" class="date" id="check_in" name="check_in" type="text" value="" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = '';}" required=""/>
									</div>
									<div class="section_class_agileits sec-right">
										<label class="label" >Check Out</label>
										<input placeholder="mm/dd/yyyy" class="date" id="check_out" name="check_out" type="text" value="" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = '';}" required=""/>
									</div>
									<div id="jumhar2_div" class="section_class_agileits sec-right">
										<label class="label" >Jumlah hari</label>
										<input type="text" name="day" min="1" max="1000" class="name agileits number1" id="jumlah_harii2" />
									</div>
									<div id="price_div" class="section_class_agileits sec-right">
										<label class="label" >Harga Normal Per Malam</label>
										<input type="text" class="name agileits" id="price" disabled/>
									</div>
									<div class="section_class_agileits sec-right">
									</div>
									<div class="submit">
										<input type="submit" name="permintaan" value="Kirim Permintaan">
									</div>
								</form>
							</div>
						</div>
						<div class="tab-1 resp-tab-content gallery-images">
							<div class="wthree-subscribe">
								<form action="#" method="post" class="agile_form">
									<div class="submit">
										<input type="submit" value="search">
									</div>
								</form>
							</div>
						</div>
					</form>
					</div>
				</div>
				<div class="clear"></div>
			</div>
		</div>
	</div>
</div>
