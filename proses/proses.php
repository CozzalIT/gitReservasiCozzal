<?php
class Proses{
  public function __construct(){
    $this->db = new PDO('mysql:host=localhost;dbname=db_keuangan_cozzal','root','');
  }

  public function editUnit($kd_apt){
	$sql = "SELECT * from tb_unit
	INNER JOIN tb_apt ON tb_apt.kd_apt = tb_unit.kd_apt
	INNER JOIN tb_owner ON tb_owner.kd_owner = tb_unit.kd_owner
	where kd_apt='$kd_apt'";
	$query = $this->db->query($sql);
	return $query;
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

    public function Unitby_id($kd_unit){
	$sql = "SELECT * FROM tb_unit, tb_apt
	where tb_apt.kd_apt=tb_unit.kd_apt and kd_unit='$kd_unit'";
	$query = $this->db->query($sql);
	return $query;
  }

    public function addReservasi($kd_apt, $kd_unit, $no_tlp, $check_in, $check_out){
	$sql = "INSERT INTO tb_reservasi (kd_unit, kd_apt, check_in, check_out, no_tlp)
	VALUES ('$kd_unit', '$kd_apt', '$check_in', '$check_out', '$no_tlp')";
	$query = $this->db->query($sql);
	if(!$query){
	  return "Failed";
	}else{
	  return "Success";
	}
  }

}
?>
