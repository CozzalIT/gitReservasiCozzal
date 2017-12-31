<?php
  require('proses/proses.php');
	include "template/head.php";
?>
<!DOCTYPE html>
<html>
<body>
<?php
  if(!isset($_POST['search'])){
    include "page/home.php";
  }
  else {
    include "page/result.php";
  };

  include "template/footer.php";
?>
</body>
</html>
