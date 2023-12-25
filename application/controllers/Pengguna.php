<?php
class Pengguna extends CI_Controller{
	function __construct(){
		parent::__construct();
		if($this->session->userdata('masuk') !=TRUE){
            $url=base_url('login.aspx');
			redirect($url);
			
        }
		$this->load->model(['M_data', 'm_login', 'm_pengunjung']);
		$this->load->library('upload');
		$this->load->helper('download');
		
	}

	function index(){
		$kode=$this->session->userdata('idadmin');
		$x['user']=$this->m_login->get_user($kode);
		$this->load->view('v_pengguna',$x);
	
	}


	function update()
{

	$id=$this->input->post('kode');
	$no_anggota = $this->input->post('no_anggota',TRUE);
	$nama = $this->input->post('nama',TRUE);
	$asal_pt = $this->input->post('asal_pt',TRUE);
	$email = $this->input->post('email',TRUE);
	$notelpon = $this->input->post('notelpon',TRUE);


	$where = array('id' => $id);
		$data = array(
			'id' =>$id,
			'no_anggota'=>$no_anggota,			
			'nama'=>$nama,					
			'asal_pt'=>$asal_pt,					
			'email'=>$email,					
			'telpon'=>$notelpon																						
		);
		
	$this->M_data->update_data($where, $data,'tblregister');
	$this->session->set_flashdata('message','<div class="alert alert-info"><i class="fa fa-check"> Data Berhasil Terupdate..!!</i></div>');
	redirect('profil.aspx');

}


function updatefile(){
				
	$kode=$this->session->userdata('no_anggota');
	$id = $this->input->post('kode');
	$tgl= date('Y-m-d H:i:s');
	$config['upload_path'] = './assets/downloadfile/';
	$config['allowed_types'] = 'pdf|jpg|png|jpeg';
	$config['max_size'] = '5048';
	$config['file_name'] = 'File'.date("ymdHis").$kode;

$this->upload->initialize($config);
if(!empty($_FILES['filedokumen']['name']))
{
if ($this->upload->do_upload('filedokumen'))
{
		$gbr = $this->upload->data();
		$file=$gbr['file_name'];
		// $data=$this->input->post('file');
		// $path='./assets/download_berkas_IdentitasPM/'.$data;
		// unlink($path);
		$this->db->query("UPDATE  tblregister SET bukti_file='$file',status_anggota='2',tgl_last_update='$tgl' where id='$id'");
		$this->session->set_flashdata('message','<div class="alert alert-success"><i class="fa fa-check"> File Berhasil Terupload..!!</i></div>');
		redirect('profil.aspx');
	
}else{
	$this->session->set_flashdata('message','<div class="alert alert-danger"><i class="fa fa-times"> Format atau Ukuran File Tidak Sesuai..!! </i></div>');
		redirect('profil.aspx');
}

}else{
	$this->session->set_flashdata('message','<div class="alert alert-danger"><i class="fa fa-times"> Upload File Gagal..!!</i></div>');
	redirect('profil.aspx');
} 

}

function downloadFile(){
	$id_bp=$this->uri->segment(4);
	$get_db=$this->db->query("SELECT*FROM tblregister where id='$id_bp'");
	$q=$get_db->row_array();
	$file=$q['bukti_file'];
	$path='./assets/downloadfile/'.$file;
	$data =  file_get_contents($path);
	$name = $file;
	force_download($name, $data); 
	redirect('profil.aspx');
}

function deleteFile(){
	$kode=$this->input->post('xkode');
	$data=$this->input->post('file');
			$path='./assets/downloadfile/'.$data;
			unlink($path);
	$this->db->query("UPDATE  tblregister  SET bukti_file='' where id='$kode'");
	$this->session->set_flashdata('message','<div class="alert alert-info"><i class="fa fa-check"> File Berhasil Terhapus..!! </i></div>');
	redirect('profil.aspx');
	}


}