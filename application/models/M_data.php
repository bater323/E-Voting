<?php
defined('BASEPATH') or exit('No dirext script access allowed');
class M_data extends CI_Model
{

  
    function edit_data($where, $table)
    {
        return $this->db->get_where($table, $where);
    }
    function get_data($table)
    {
        return $this->db->get($table);
    }
    function insert_data($data, $table)
    {
        $this->db->insert($table, $data);
    }
    function update_data($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }
    function delete_data($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }
    function pengguna_dashbord()
    {
        $id_admin = $this->session->userdata('idadmin');
        $hsl = $this->db->query("SELECT * FROM tbl_pengguna WHERE pengguna_id='$id_admin'");
        return $hsl;
    }

    function pengguna_user()
    {
        $id_admin = $this->session->userdata('idadmin');
        $hsl = $this->db->query("SELECT * FROM tblregister WHERE id='$id_admin'");
        return $hsl;
    }

    function hapus_slider($kode){
		$hsl=$this->db->query("DELETE FROM tbl_slider where id_slider='$kode'");
		return $hsl;
    }

    function get_slider(){
      $hsl=$this->db->query("SELECT * FROM tbl_slider");
      return $hsl;
      }
    function hapus_image_berita($kode){
		$hsl=$this->db->query("DELETE FROM tbl_post where post_id='$kode'");
		return $hsl;
    }
    function hapus_image($kode){
		$hsl=$this->db->query("DELETE FROM tblpolling where id='$kode'");
		return $hsl;
    }


    function get_data_poling(){
      $this->db->select('tblpolling.*');
      $this->db->from('tblpolling');
          $this->db->order_by('id', 'ASC');
          $query = $this->db->get();
      return $query;
      }

      function get_all_Proses(){
        $idadmin = $this->session->userdata('kode_pt');  
        $this->db->select('
        a.id,
        a.id_polling,
        a.id_user,
        a.jumlah_vot,
        a.tgl_vot,
        a.status_vot,
        b.id,
        b.no_anggota,
        b.nama,
        b.asal_pt,
        b.email,
        b.status_anggota,
        c.id,
        c.nama,
        c.deskripsi,
        c.gambar
    
        ');
        $this->db->from('tblpolling c');
        $this->db->join('tblregister b', 'b.no_anggota=a.id_user','left');
        $this->db->join('detail_votting a', 'a.id_polling=c.id','left');
        $query = $this->db->get();
        return $query;
    }

      
    function get_data_user(){
		$this->db->select('tblregister.*');
		$this->db->from('tblregister');
        $this->db->order_by('id', 'DESC');
        $query = $this->db->get();
		return $query;
    }


    function get_data_polling(){
      $hsl=$this->db->query("SELECT tblpolling.*, sum(jml_polling) as totalpolling FROM tblpolling  order by id desc" );
      return $hsl;
      }

      function data_user(){
        $query = $this->db->query("SELECT COUNT(id) AS jumlah FROM tblregister");
        return $query;
    }


    function data_polling(){
      $query = $this->db->query("SELECT COUNT(id_user) AS jumlah_polling FROM detail_votting");
      return $query;
  }

  function data_pengguna(){
    $query = $this->db->query("SELECT COUNT(pengguna_id) AS jumlah_pengguna FROM tbl_pengguna");
    return $query;
}
function data_verifikasi(){
  $query = $this->db->query("SELECT COUNT(id) AS jml_verifikasi FROM tblregister where status_anggota='2'");
  return $query;
}

function sudah_verifikasi(){
  $query = $this->db->query("SELECT COUNT(id) AS jml_verifikasi FROM tblregister where status_anggota='1'");
  return $query;
}


function get_all_Polling(){
  $idadmin = $this->session->userdata('kode_pt');  
  $this->db->select('
  a.id,
  a.id_polling,
  a.id_user,
  a.jumlah_vot,
  a.tgl_vot,
  a.status_vot,
  a.tgl_vot,
  c.id,
  c.nama,
  c.deskripsi,
  c.gambar,
  sum(jumlah_vot) as totalpolling

  ');
  $this->db->from('detail_votting a');
  $this->db->join('tblpolling c', 'a.id_polling=c.id','left');
  $this->db->group_by('a.id_polling');

  $query = $this->db->get();
  return $query;
}

function get_calon_ketua(){
  $idadmin = $this->session->userdata('kode_pt');  
  $this->db->select('
  
  b.id_polling,
  b.id_user,
  b.jumlah_vot,
  b.tgl_vot,
  b.status_vot,
  b.tgl_vot,
  
  a.id,
  a.flayer,
  a.nama,
  a.deskripsi,
  a.tgl_create,
  a.gambar,
  sum(jumlah_vot) as totalpolling

  ');
  $this->db->from('tblpolling a');
  $this->db->join('detail_votting b', 'a.id=b.id_polling','left');
  $this->db->group_by('a.id');

  $query = $this->db->get();
  return $query;
}
function get_data_user_polling(){
  $idadmin = $this->session->userdata('kode_pt');  
  $this->db->select('
  a.`id`,
  a.`no_anggota` as noanggota,
  a.`nama` as nama_anggota,
  a.`asal_pt`,
  a.`email`,
  a.`telpon`,
  a.`password_user`,
  a.`bukti_file`,
  a.`status_anggota`,
  a.`tgl_register`,
  a.`tgl_last_update`,
  b.`id`,
  b.`masa_berlaku`,
  b.`no_anggota`,
  b.`nama`,
  b.`asal_pt`,
  b.`prodi`,
  b.`jabatan`,
  b.`telpon`,
  b.`email`

  ');
  $this->db->from('tblregister a');
  $this->db->join('tbl_anggota_aptikom b', 'a.no_anggota=b.no_anggota','left');
  $this->db->group_by('a.no_anggota');
  $this->db->order_by('a.id', 'DESC');
  $query = $this->db->get();
  return $query;
  }

  function pilihan(){
    $id = $this->session->userdata('username');
    $hsl=$this->db->query("SELECT
    a.`id_polling`,
    a.`id_user`,
    b.`nama` as nama_calon,
    b.`id`,
    b.deskripsi,
    c.`nama` as nama_user,
    c.`no_anggota`
    
    from `detail_votting` a
     LEFT JOIN `tblpolling` b ON a.`id_polling` = b.`id`
      LEFT JOIN `tblregister`  c ON a.`id_user`=c.`no_anggota`
    where a.id_user='$id' ");
		return $hsl;
    }


}
