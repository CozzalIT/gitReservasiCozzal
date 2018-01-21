<div class="topnav" id="myTopnav">
  <a><img src="images/logo.png" style="width : 95px"></a>
  <a href="index.php" <?php if ($thisPage == 'home') {echo 'class="active act"';}?>>Home</a>
  <a href="javascript: maintenance()" <?php if ($thisPage == 'help') {echo 'class="active act"';}?>>Cara Booking</a>
  <a href="request.php" <?php if ($thisPage == 'ownerRequest') {echo 'class="active act"';}?>>Daftarkan Tempatmu</a>
  <a href="javascript: maintenance()" <?php if ($thisPage == 'aboutUs') {echo 'class="active act"';}?>>About Us</a>
  <!-- Dropdown
  <div class="dropdown">
    <button class="dropbtn">Dropdown
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
      <a href="#">Link 1</a>
      <a href="#">Link 2</a>
      <a href="#">Link 3</a>
    </div>
  </div>
  -->
  <a href="javascript:void(0);" style="font-size:15px;" class="icon" onclick="myFunction()">&#9776;</a>
</div>
<script>
  function maintenance(){
    swal("Warning!", "Under Maintenance!", "warning");
  }
</script>
