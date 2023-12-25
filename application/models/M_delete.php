<?php 
defined('BASEPATH') or exit ('No dirext script access allowed');
class M_delete extends CI_Model{

	function hapus_sekolah($kode){
		$hsl=$this->db->query("delete from tbl_sekolah where id_sekolah='$kode'");
		return $hsl;
	}

	function hapus_siswa($kode){
		$hsl=$this->db->query("delete from tbl_register where id='$kode'");
		return $hsl;
	}
	
}