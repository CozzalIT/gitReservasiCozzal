<?php
  require('proses/proses.php');
	include "template/head.php";
?>
<!DOCTYPE html>
<html>
<body>
<?php
  if(!isset($_GET['tci']) && (!isset($_GET['tco'])) && (!isset($_GET['id'])) && (!isset($_POST['search']))) {
    include "page/home.php";
  }

  if(isset($_GET['tci'])&&isset($_GET['tco'])&&isset($_GET['id'])){
    include "page/booking.php";
  }

  if(isset($_POST['search'])){
    include "page/result.php";
  };

  include "template/footer.php";
?>
</body>
</html>
