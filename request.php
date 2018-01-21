<?php
  require('proses/proses.php');
	include "template/head.php";

  $thisPage = "ownerRequest";
?>
<!DOCTYPE html>
<html>
<body>
<?php
  include('template/navbar.php');
  if(isset($_GET['success'])){
    echo '
    <script>
      success();
      function success(){
        swal("Permintaan Dikirim!", "Silahkan tunggu konfirmasi dari kami!", "success");
      }
    </script>
    ';
  }
?>
<h1>Request Listing</h1>
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
      <form action="proses/proses_add.php" method="post" class="agile_form">
        <div class="tabs-booking">
          <div class="tab-right-book">
            <div class="w3l-sign-in">
              <div class="list_agileits_w3layouts">
                <div class="section_class_agileits sec-right">
                  <label class="label">Nama Lengkap</label>
                  <input type="text" name="nama" class="name agileits" value="" required="" placeholder="Nama"/>
                </div>
                <div class="section_class_agileits sec-right">
                  <label class="label">Alamat Lengkap</label>
                  <input type="text" name="alamat" class="name agileits" value="" required="" placeholder="Alamat"/>
                </div>
                <div class="section_class_agileits sec-right">
                  <label class="label">No Telpon</label>
                  <input type="text" name="no_tlp" class="name agileits" value="" required="" placeholder="Ex: 08..."/>
                </div>
                <div class="section_class_agileits sec-right">
                  <label class="label">Email</label>
                  <input type="text" name="email" class="name agileits" value="" required="" placeholder="Ex: abc@gmail.com"/>
                </div>
              </div>
            </div>
          </div>
          <div class="tab-left-book">
            <div class="list_agileits_w3layouts">
              <div class="section_class_agileits sec-right">
                <label class="label">Nama Apartemen</label>
                <input type="text" placeholder="Apartemen" name="apartemen" class="name agileits" required=""/>
              </div>
              <div class="section_class_agileits sec-right">
                <label class="label">Lantai</label>
                <input type="number" placeholder="0" name="lantai" class="number1 name agileits" required=""/>
              </div>
              <div class="section_class_agileits sec-right">
                <label class="label">Kondisi</label>
                <select name="kondisi" style="margin-top: 13.6px;">
                  <option>-- Pilih Kondisi --</option>
                  <option value="Fully Furnish">Fully Furnish</option>
                  <option value="Half Furnish">Half Furnish</option>
                  <option valur="Unfurnish">Unfurnish</option>
                </select>
              </div>
              <div class="section_class_agileits sec-right">
                <label class="label">Status</label>
                <select name="status" style="margin-top: 13.6px;">
                  <option>-- Status Kepemilikan --</option>
                  <option value="Pribadi">Pribadi</option>
                  <option value="Sewa">Sewa</option>
                </select>
              </div>
              <div class="submit">
                <input type="submit" value="Kirim Permintaan" name="requestListing">
              </div>
              </form>
              <div class="clear"></div>
            </div>
          </div>
        <div class="clear"></div>
    </div>
  </div>
</div>
<?php
  include "template/footer.php";
?>
</body>
<script>
  function myFunction() {
    var x = document.getElementById("myTopnav");
    if (x.className === "topnav") {
      x.className += " responsive";
    } else {
      x.className = "topnav";
    }
  }
</script>
</html>
