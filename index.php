<?php
  require('proses/proses.php');
	include "template/head.php";
?>
<!DOCTYPE html>
<html>
<body>
<?php
global $hasilbooking;
  if(!isset($_GET['tci']) && (!isset($_GET['tco'])) && (!isset($_GET['id'])) && (!isset($_POST['search'])) && (!isset($_POST['permintaan']))) {
	if(isset($_GET['succes']))
	$GLOBALS['hasilbooking']="True";
	include "page/home.php";
  }

  if(isset($_GET['tci'])&&isset($_GET['tco'])&&isset($_GET['id'])){
    include "page/booking.php";
  }

  if(isset($_POST['search'])){
    include "page/result.php";
  };

  if (isset($_POST['permintaan'])) {
    include "proses/cek.php";
  }

  include 'template/modal.php';
  include "template/footer.php";
?>
</body>
</html>
