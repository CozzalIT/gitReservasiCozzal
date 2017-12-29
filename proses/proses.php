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
  
  public function showTransaksi($CI,$CO){
	$sql = "SELECT tb_transaksi.kd_unit from tb_transaksi where (check_in<='$CI' and check_out>='$CO') 
	or (check_in>='$CI' and check_in<='$CO') 
	or (check_out>='$CI' and check_out<='$CO')" ;
	$query = $this->db->query($sql);
	return $query;
  }
  
    public function showUnit(){
	$sql = "SELECT * FROM tb_unit, tb_apt 
	where tb_apt.kd_apt=tb_unit.kd_apt";
	$query = $this->db->query($sql);
	return $query;
  }

} 
?>
