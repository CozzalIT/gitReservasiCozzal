<?php
class Proses{
  public function __construct(){
    $this->db = new PDO('mysql:host=localhost;dbname=db_keuangan_cozzal','root','');
  }

  public function showApartemen(){
	  $sql = "SELECT * FROM tb_apt where kd_apt!=0";
	  $query = $this->db->query($sql);
	  return $query;
  }

  public function showApartemenID($kd_apt){
	  $sql = "SELECT * FROM tb_apt where kd_apt = '$kd_apt'";
	  $query = $this->db->query($sql);
	  return $query;
  }

  public function showTransaksiUnit($kd_unit, $kd_apt){
    $sql = "SELECT * from tb_transaksi";
    if($kd_apt!="0" || $kd_unit!="0") $sql." where";
    if($kd_apt!="0") $sql = $sql." kd_unit='$kd_unit'";
    if($kd_apt!="0" && $kd_unit!="0") $sql." and";    
    if($kd_apt!="0") $sql = $sql." kd_apt='$kd_apt'"; 
    $query = $this->db->query($sql);
    return $query;
  }

  public function showTransaksi($CI,$CO){
  	$sql = "SELECT * from tb_transaksi where (check_in<='$CI' and check_out>='$CO')
  	or (check_in>='$CI' and check_in<'$CO')
  	or (check_out>'$CI' and check_out<='$CO')" ;
  	$query = $this->db->query($sql);
  	return $query;
  }

  public function showUnit(){
  	$sql = "SELECT * FROM tb_unit, tb_apt
  	where tb_apt.kd_apt=tb_unit.kd_apt and tb_unit.kd_unit !=0 ORDER BY tb_apt.kd_apt";
  	$query = $this->db->query($sql);
  	return $query;
  }

  public function Unitby_id($kd_unit){
  	$sql = "SELECT * FROM tb_unit, tb_apt
  	where tb_apt.kd_apt=tb_unit.kd_apt and kd_unit='$kd_unit'";
  	$query = $this->db->query($sql);
  	return $query;
  }

  public function addReservasi($kd_apt, $kd_unit, $no_tlp, $check_in, $check_out, $nama, $tgl){
  	$sql = "INSERT INTO tb_reservasi (kd_unit, kd_apt, check_in, check_out, no_tlp, nama, tgl_reservasi)
  	VALUES ('$kd_unit', '$kd_apt', '$check_in', '$check_out', '$no_tlp', '$nama', '$tgl')";
  	$query = $this->db->query($sql);
  	if(!$query){
  	  return "Failed";
  	}else{
  	  return "Success";
  	}
  }

  public function addRequest($nama, $alamat, $no_tlp, $email, $apartemen, $tipe, $lantai, $kondisi, $status){
    $sql = "INSERT INTO tb_request_listing (nama, alamat, no_tlp, email, apartemen, tipe, lantai, kondisi, status)
    VALUES ('$nama', '$alamat', '$no_tlp', '$email', '$apartemen', '$tipe', '$lantai', '$kondisi', '$status')";
    $query = $this->db->query($sql);
    if(!$query){
      return "Failed";
    }else{
      return "Success";
    }
  }

}
?>
