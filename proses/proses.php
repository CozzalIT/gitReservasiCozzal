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

  public function showApartemenID($kd_apt){
	  $sql = "SELECT * FROM tb_apt where kd_apt = '$kd_apt'";
	  $query = $this->db->query($sql);
	  return $query;
  }

  public function showTransaksiUnit($kd_unit){
    $sql = "SELECT * from tb_transaksi where kd_unit='$kd_unit'";
    $query = $this->db->query($sql);
    return $query;
  }

  public function showTransaksi($CI,$CO){
	$sql = "SELECT * from tb_transaksi where (check_in<='$CI' and check_out>='$CO')
	or (check_in>='$CI' and check_in<='$CO')
	or (check_out>='$CI' and check_out<='$CO')" ;
	$query = $this->db->query($sql);
	return $query;
  }

  public function showUnit(){
	$sql = "SELECT * FROM tb_unit, tb_apt
	where tb_apt.kd_apt=tb_unit.kd_apt ORDER BY tb_apt.kd_apt";
	$query = $this->db->query($sql);
	return $query;
  }

  public function Unitby_id($kd_unit){
	$sql = "SELECT * FROM tb_unit, tb_apt
	where tb_apt.kd_apt=tb_unit.kd_apt and kd_unit='$kd_unit'";
	$query = $this->db->query($sql);
	return $query;
  }

  public function addReservasi($kd_apt, $kd_unit, $no_tlp, $check_in, $check_out, $nama){
	$sql = "INSERT INTO tb_reservasi (kd_unit, kd_apt, check_in, check_out, no_tlp, nama)
	VALUES ('$kd_unit', '$kd_apt', '$check_in', '$check_out', '$no_tlp', '$nama')";
	$query = $this->db->query($sql);
	if(!$query){
	  return "Failed";
	}else{
	  return "Success";
	}
  }

}
?>
