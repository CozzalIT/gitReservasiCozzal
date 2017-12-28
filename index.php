<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<?php
  require('proses/proses.php');
?>

<!DOCTYPE html>
<html>
<head>

	<title>Reservasi Cozzal</title>

	<!-- For-Mobile-Apps -->
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="keywords" content="Travel Packages Widget Responsive, Login Form Web Template, Flat Pricing Tables, Flat Drop-Downs, Sign-Up Web Templates, Flat Web Templates, Login Sign-up Responsive Web Template, Smartphone Compatible Web Template, Free Web Designs for Nokia, Samsung, LG, Sony Ericsson, Motorola Web Design" />
		<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
	<!-- //For-Mobile-Apps -->

	<!-- Style -->
	<link rel="stylesheet" href="css/style.css" type="text/css" media="all" />
	<link href="css/font-awesome.css" rel="stylesheet">
	<!-- Default-JavaScript-File --> <script type="text/javascript" src="js/jquery.min.js"></script>

	<!-- Web-Fonts -->
		<link href='//fonts.googleapis.com/css?family=Raleway:400,500,600,700,800' rel='stylesheet' type='text/css'>
		<link href='//fonts.googleapis.com/css?family=Open+Sans:400,600,700' rel='stylesheet' type='text/css'>
	<!-- //Web-Fonts -->

</head>
<body>

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
							<li class="resp-tab-item"><i class="fa fa-building" aria-hidden="true"></i>Apartemen</li>
							<li class="resp-tab-item"><i class="fa fa-calendar" aria-hidden="true"></i>Check In</li>
							<li class="resp-tab-item"><i class="fa fa-phone" aria-hidden="true"></i>Contact Us</li>
						</ul>
					</div>

					<div class="tab-right">
						<div class="resp-tabs-container">
							<div class="tab-1 resp-tab-content">
								<div class="w3l-sign-in">
									<form action="#" method="post" class="agile_form">
										<div class="list_agileits_w3layouts">
											<div class="section_class_agileits sec-left">
												<select id="apartemen" name="apartemen">
													<option value="0">-- Pilih Apartemen --</option>
													<option value="1">Semua Apartemen</option>
													<?php
											  	  $Proses = new Proses();
							  				    $show = $Proses->showApartemen();
							  				    while($data = $show->fetch(PDO::FETCH_OBJ)){
													    echo "<option name='kd_apt' value='$data->kd_apt'>$data->nama_apt</option>";
													  }
												  ?>
												</select>
											</div>
											<div class="section_class_agileits sec-right">
												<select>
													<option value="0">-- Pilih Unit --</option>
													<option value="1">12BD - Newton</option>
													<option value="3">18BF - Newton</option>
													<option value="2">A123 - Metro The Suite</option>
													<option value="1">A10 - Gateway</option>
												</select>
											</div>
											<div class="clear"></div>
										</div>
										<!-- <label class="label">Check In</label> -->
										<input placeholder="Check In" class="date" id="check_in" type="text" value="" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = '';}" required=""/>
										<input placeholder="Check Out" class="date" id="check_out" type="text" value="" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = '';}" required=""/>
										<div class="list_agileits_w3layouts">
											<div class="section_class_agileits sec-right">
											  <input type="text" placeholder="Phone Number / Whatsapp" name="name" class="name agileits" required=""/>
											</div>
											<div class="clear"></div>
										</div>
										<div class="submit">
										  <input type="submit" value="Kirim Permintaan">
										</div>
									</form>
								</div>
							</div>
							<div class="tab-1 resp-tab-content">
								<div class="register agileits">
								  <form action="#" method="post" class="agile_form">
									  <div class="section_class_agileits sec-right">
										  <input placeholder="Check in date" class="date" id="datepicker3" type="text" value="" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = '';}" required=""/>
										  <input placeholder="Check out date" class="date" id="datepicker4" type="text" value="" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = '';}" required=""/>
										</div>
										<div class="submit">
										  <input type="submit" value="search">
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
	<div class="footer">
		<p> &copy; 2017 Travel Packages Widget. All Rights Reserved | Design by <a href="http://w3layouts.com">W3layouts</a></p>
	</div>
	<!--start-date-piker-->
		<link rel="stylesheet" href="css/jquery-ui.css" />
		<script src="js/jquery-ui.js"></script>
			<script>
				$(function() {
				$( "#check_in,#check_out,#datepicker2,#datepicker3,#datepicker4,#datepicker5,#datepicker6,#datepicker7" ).datepicker();
				});
			</script>
<!-- 97-rgba(0, 0, 0, 0.75)/End-date-piker -->
</body>
</html>
