<?php
class Proses{
  public function __construct(){
    $this->db = new PDO('mysql:host=localhost;dbname=db_keuangan_cozzal','root','');
  }

  public function showApartemen(){
	  $sql = "SELECT * FROM tb_apt";
	  $query = $this->db->query($sql);
	  return $query;
  }
}
?>
