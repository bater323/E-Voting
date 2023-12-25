<?php
class Pengguna extends CI_Controller{
	function __construct(){
		parent::__construct();
		if($this->session->userdata('masuk') !=TRUE){
            $url=base_url('adminvotting');
			redirect($url);
			
        }
		$this->load->model(['M_data', 'm_login', 'm_pengunjung']);
		$this->load->library('upload');
		$this->load->helper('download');
	}

	function index(){
		
		$kode=$this->session->userdata('idadmin');
		$x['user']=$this->m_login->get_pengguna_login($kode);
		$x['data']=$this->m_login->get_all_pengguna();
		$this->load->view('admin/v_pengguna',$x);
	
	}

	function allpengguna(){
		$x['data']=$this->m_login->get_all_pengguna();
		$this->load->view('admin/v_pengguna',$x);
	}



	function addpengguna()
	{

		$nama = $this->input->post('xnama',TRUE);
		$email = $this->input->post('xemail',TRUE);
		$nohp = $this->input->post('xkontak',TRUE);
	$jenkel=$this->input->post('xjenkel');
	$username=$this->input->post('xusername',TRUE);
	$password=$this->input->post('xpassword',TRUE);
	$nohp=$this->input->post('xkontak');

	


		$config['upload_path'] = './assets/images/';
		$config['allowed_types'] = 'gif|jpg|png|jpeg|bmp';
		$config['encrypt_name'] = FALSE;

		$this->upload->initialize($config);
		if (!empty($_FILES['filefoto']['name'])) {
			if ($this->upload->do_upload('filefoto')) {
				$img_about = $this->upload->data();
				$image = $img_about['file_name'];
			}
			$data = [
				"pengguna_nama" => $nama,
				"pengguna_jenkel" => $jenkel,
				"pengguna_username" => $username,
				"pengguna_password" => md5($password),
				"pengguna_email" => $email,
				"pengguna_nohp" => $nohp,
				"pengguna_level" => '1',
				"pengguna_photo" => $image,
			];
			echo $this->session->set_flashdata('msg', 'succes');
			$this->M_data->insert_data($data, 'tbl_pengguna');
			redirect('admin/Pengguna/allpengguna');
		} else {
			$data = [
				"pengguna_nama" => $nama,
				"pengguna_jenkel" => $jenkel,
				"pengguna_username" => $username,
				"pengguna_password" => md5($password),
				"pengguna_email" => $email,
				"pengguna_nohp" => $nohp,
				"pengguna_level" => '1',
				"pengguna_photo" => 'user_blank.png',
			];
			echo $this->session->set_flashdata('msg', 'succes');
			$this->M_data->insert_data($data, 'tbl_pengguna');
			redirect('admin/Pengguna/allpengguna');
		}
	}

function update()
{

	$id = $this->input->post('kode');
	$nama=$this->input->post('xnama');
	$jenkel=$this->input->post('xjenkel');
	$email=$this->input->post('xemail');
	$username=$this->input->post('xusername');
	$password=$this->input->post('xpassword');
	$nohp=$this->input->post('xkontak');
	$foto_lama = $this->input->post('foto');
	
	$date= date('dmyhis');
	$config['upload_path'] = './assets/images/';
	$config['allowed_types'] = 'gif|jpg|png|jpeg|bmp';
	$config['encrypt_name'] = FALSE;
	$config['file_name'] = $date.$id;

	$this->upload->initialize($config);
	//var_dump($this->upload->do_upload('filefoto'));exit();
	if (!empty($_FILES['filefoto']['name'])) {			
		unlink('./assets/images/' . $foto_lama);
			if ($this->upload->do_upload('filefoto')) {
				$img_about = $this->upload->data();
				$image = $img_about['file_name'];
			}
		$where = array('pengguna_id' => $id);
		$data = array(
			"pengguna_nama" => $nama,
			"pengguna_jenkel" => $jenkel,
			"pengguna_username" => $username,
			"pengguna_password" => md5($password),
			"pengguna_email" => $email,
			"pengguna_nohp" => $nohp,
			"pengguna_photo" => $image,
		);
		echo $this->session->set_flashdata('msg', 'update');
		$this->M_data->update_data($where, $data, 'tbl_pengguna');
		redirect('admin/Pengguna/allpengguna');
	} else {
		$where = array('pengguna_id' => $id);
		$data = array(
			"pengguna_nama" => $nama,
			"pengguna_jenkel" => $jenkel,
			"pengguna_username" => $username,
			"pengguna_password" => md5($password),
			"pengguna_email" => $email,
			"pengguna_nohp" => $nohp,
			
		);
		echo $this->session->set_flashdata('msg', 'update');
		$this->M_data->update_data($where, $data, 'tbl_pengguna');
		redirect('admin/Pengguna/allpengguna');
	}
}

function update_PROFIL()
{

	$id = $this->input->post('kode');
	$nama=$this->input->post('xnama');
	$jenkel=$this->input->post('xjenkel');
	$email=$this->input->post('xemail');
	$username=$this->input->post('xusername');
	$password=$this->input->post('xpassword');
	$nohp=$this->input->post('xkontak');
	$foto_lama = $this->input->post('foto');
	
	$date= date('dmyhis');
	$config['upload_path'] = './assets/images/';
	$config['allowed_types'] = 'gif|jpg|png|jpeg|bmp';
	$config['encrypt_name'] = FALSE;
	$config['file_name'] = $date.$id;

	$this->upload->initialize($config);
	//var_dump($this->upload->do_upload('filefoto'));exit();
	if (!empty($_FILES['filefoto']['name'])) {			
		unlink('./assets/images/' . $foto_lama);
			if ($this->upload->do_upload('filefoto')) {
				$img_about = $this->upload->data();
				$image = $img_about['file_name'];
			}
		$where = array('pengguna_id' => $id);
		$data = array(
			"pengguna_nama" => $nama,
			"pengguna_jenkel" => $jenkel,
			"pengguna_username" => $username,
			"pengguna_password" => md5($password),
			"pengguna_email" => $email,
			"pengguna_nohp" => $nohp,
			"pengguna_photo" => $image,
		);
		echo $this->session->set_flashdata('msg', 'update');
		$this->M_data->update_data($where, $data, 'tbl_pengguna');
		redirect('admin/Pengguna');
	} else {
		$where = array('pengguna_id' => $id);
		$data = array(
			"pengguna_nama" => $nama,
			"pengguna_jenkel" => $jenkel,
			"pengguna_username" => $username,
			"pengguna_password" => md5($password),
			"pengguna_email" => $email,
			"pengguna_nohp" => $nohp,
			
		);
		echo $this->session->set_flashdata('msg', 'update');
		$this->M_data->update_data($where, $data, 'tbl_pengguna');
		redirect('admin/Pengguna');
	}
}


function hapus_pengguna(){
$kode=$this->input->post('xkode');
$data=$this->input->post('file');
		$path='./assets/images/'.$data;
		unlink($path);
$this->m_login->hapus_pengguna($kode);
echo $this->session->set_flashdata('msg','success-hapus');
redirect('admin/Pengguna/allpengguna');
}

function reset_password(){

$id=$this->uri->segment(4);
$get=$this->m_login->getusername($id);
if($get->num_rows()>0){
	$a=$get->row_array();
	$b=$a['pengguna_username'];
}
$pass=rand(123456,999999);
$this->m_login->resetpass($id,$pass);
echo $this->session->set_flashdata('msg','show-modal');
echo $this->session->set_flashdata('uname',$b);
echo $this->session->set_flashdata('upass',$pass);
redirect('Admin/Profile/allpengguna');

}


}