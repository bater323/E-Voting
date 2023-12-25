<?php
class Polling extends CI_Controller{
	function __construct(){
		parent::__construct();
		if($this->session->userdata('masuk') !=TRUE){
            $url=base_url('adminvotting');
			redirect($url);
			
        }
		$this->load->model(['M_data','m_login']);
		$this->load->library('upload');
		$this->load->helper('download');
	}

	function index(){
		$x['data']=$this->M_data->get_calon_ketua();
		$this->load->view('admin/v_polling',$x);
	
	}


	function save()
	{
		$kode=$this->session->userdata('idadmin');
		$date= date('dmyhis');
		$nama=$this->input->post('nama');
		$xdeksripsi=$this->input->post('xdeksripsi');

		$tgl= date('Y-m-d H:i:s');
		$config['upload_path'] = './assets/images/';
		$config['allowed_types'] = 'gif|jpg|png|jpeg|bmp';
		$config['encrypt_name'] = FALSE;
		$config['file_name'] ='File'.$date;

		$this->upload->initialize($config);
		if (!empty($_FILES['filefoto']['name'])) {
			if ($this->upload->do_upload('filefoto')) {
				$img_about = $this->upload->data();
				$image = $img_about['file_name'];
			}
			$data = [
				"nama" => $nama,
				"deskripsi" => $xdeksripsi,
				"gambar" => $image,
				"tgl_create" =>$tgl,
				"id_user" =>$kode,
			
			];
			$this->M_data->insert_data($data, 'tblpolling');
			$this->session->set_flashdata('message','<div class="alert alert-success"><i class="fa fa-check"> Data Berhasil Tersimpan..!!</i></div>');
			redirect('data-polling.aspx');
		} else {
			$this->session->set_flashdata('message','<div class="alert alert-danger"><i class="fa fa-check"> Data Gagal Tersimpan..!!</i></div>');
			redirect('data-polling.aspx');
		}
	}

function update()
{

	$id = $this->input->post('kode');
	$kode=$this->session->userdata('idadmin');
		$date= date('dmyhis');
		$nama=$this->input->post('nama');
		$xdeksripsi=$this->input->post('xdeksripsi');

		$tgl= date('Y-m-d H:i:s');
	$foto_lama = $this->input->post('foto');
	$date= date('dmyhis');
	$config['upload_path'] = './assets/images/';
	$config['allowed_types'] = 'gif|jpg|png|jpeg|bmp';
	$config['encrypt_name'] = FALSE;
	$config['file_name'] ='File'.$date;

	$this->upload->initialize($config);
	//var_dump($this->upload->do_upload('filefoto'));exit();
	if (!empty($_FILES['filefoto']['name'])) {			
		unlink('./assets/images/' .$foto_lama);
			if ($this->upload->do_upload('filefoto')) {
				$img_about = $this->upload->data();
				$image = $img_about['file_name'];
			}
		$where = array('id' => $id);
		$data = array(
				'id' => $id,
				'nama' => $nama,
				'deskripsi' => $xdeksripsi,
				'gambar' => $image,
				'tgl_update' =>$tgl,
				'id_user' =>$kode

		);
		$this->session->set_flashdata('message','<div class="alert alert-success"><i class="fa fa-check"> Data Berhasil Tersimpan..!!</i></div>');
		$this->M_data->update_data($where, $data, 'tblpolling');
		redirect('data-polling.aspx');
	} else {
		$this->session->set_flashdata('message','<div class="alert alert-danger"><i class="fa fa-check"> Data Gagal Tersimpan..!!</i></div>');
		redirect('data-polling.aspx');
	}
}


function updatefile(){
				
	$kode=$this->session->userdata('no_anggota');
	$id = $this->input->post('kode');
	$tgl= date('Y-m-d H:i:s');
	$config['upload_path'] = './assets/images/';
	$config['allowed_types'] = 'jpg|png|jpeg';
	$config['max_size'] = '5048';
	$config['file_name'] = 'File'.date("ymdHis").$kode;

$this->upload->initialize($config);
if(!empty($_FILES['filedokumen']['name']))
{
if ($this->upload->do_upload('filedokumen'))
{
		$gbr = $this->upload->data();
		$file=$gbr['file_name'];
		$this->db->query("UPDATE  tblpolling SET flayer='$file' where id='$id'");
		$this->session->set_flashdata('message','<div class="alert alert-success"><i class="fa fa-check"> File Berhasil Terupload..!!</i></div>');
		redirect('data-polling.aspx');
	
}else{
	$this->session->set_flashdata('message','<div class="alert alert-danger"><i class="fa fa-times"> Format atau Ukuran File Tidak Sesuai..!! </i></div>');
		redirect('data-polling.aspx');
}

}else{
	$this->session->set_flashdata('message','<div class="alert alert-danger"><i class="fa fa-times"> Upload File Gagal..!!</i></div>');
	redirect('data-polling.aspx');
} 

}

function deleteFile(){
	$kode=$this->input->post('xkode');
	$data=$this->input->post('file');
			$path='./assets/images/'.$data;
			unlink($path);
	$this->db->query("UPDATE  tblpolling  SET flayer='' where id='$kode'");
	$this->session->set_flashdata('message','<div class="alert alert-info"><i class="fa fa-check"> File Berhasil Terhapus..!! </i></div>');
redirect('data-polling.aspx');
	}


function delete(){
	$kode=$this->input->post('xkode');
	$data=$this->input->post('file');
			$path='./assets/images/'.$data;
			unlink($path);
	$this->db->query("DELETE FROM tblpolling where id='$kode'");
	$this->session->set_flashdata('message','<div class="alert alert-info"><i class="fa fa-check">  Data Berhasil Terhapus..!! </i></div>');
	redirect('data-polling.aspx');
	}



}