<?php
class User extends CI_Controller{
	function __construct(){
		parent::__construct();
		if($this->session->userdata('masuk') !=TRUE){
            $url=base_url('adminaptikom');
			redirect($url);
			
        }
		$this->load->model(['M_data']);
		$this->load->library('upload');
		$this->load->helper('download');
		$this->load->helper('date_helper');
 
	}

	function index(){
		$x['data']=$this->M_data->get_data_user();
		$this->load->view('admin/v_user',$x);
	
	}


	function update_status()
    {
        $id = $this->input->post('kode');
        $nama = $this->input->post('xnama');
        $email = $this->input->post('xemail');
        $status = $this->input->post('status');
        $where = array('id' => $id);
        $data = array(
            'status_anggota' => $status,
		);
		$this->session->set_flashdata('message','<div class="alert alert-info"><i class="fa fa-check"> Data Berhasil Terupdate..!!</i></div>');
        $this->M_data->update_data($where, $data, 'tblregister');
		redirect('data-daftar-user.aspx');
	}
	


	function konfirmasi()
    {


        $id = $this->input->post('kode');
        $no = $this->input->post('xno');
        $pass = $this->input->post('xpass');
        $nama = $this->input->post('xnama');
		$email = $this->input->post('xemail');
        $konfir = $this->input->post('xkonfir');
        $xpesan = $this->input->post('xpesan');
        $where = array('id' => $id);
        $data = array(
            'konfirmasi' => $konfir,
            'pesan' => $xpesan,
		);

		$this->session->set_flashdata('message','<div class="alert alert-info"><i class="fa fa-check"> Data Berhasil Terkirim..!!</i></div>');
        $this->M_data->update_data($where, $data, 'tblregister');
		redirect('data-daftar-user.aspx');
	}
	
	function get_nourut(){

		date_default_timezone_set('Asia/Jakarta');
        $tahun= date('Y');
        $aptikom='-Aptikom';
        
        $q = $this->db->query("SELECT MAX(RIGHT(id,4)) AS kd_max FROM tblregister");
        $kd = "";
        if($q->num_rows()>0){
            foreach($q->result() as $k){
                $tmp = ((int)$k->kd_max)+1;
                $kd = sprintf("%04s", $tmp);
            }
        }else{
            $kd = "001";
        }
        date_default_timezone_set('Asia/Jakarta');
        return $tahun.$kd.$aptikom;
	}

	function reset()
    {
        $id = $this->input->post('xno');
		$nourut=$this->get_nourut();
		$email = $this->input->post('xemail');
		// $this->db->query("SELECT* FROM tblregister where no_anggota='$id'");
		// $cek=$this->db->get_where('tblregister', array('no_anggota' => $id));
		// if($cek->num_rows()<= 0){

        $where = array('no_anggota' => $id);
        $data = array(
            'no_anggota' => $id,
            'email' => $email,
            'password_user' => $nourut,
		);
	

		$this->session->set_flashdata('message','<div class="alert alert-info"><i class="fa fa-check"> Data Berhasil Terkirim..!!</i></div>');
        $this->M_data->update_data($where, $data, 'tblregister');
		redirect('login.aspx');
    }



	function update()
{

	$id=$this->input->post('kode');
	$no_anggota = $this->input->post('no_anggota',TRUE);
	$nama = $this->input->post('nama',TRUE);
	$asal_pt = $this->input->post('asal_pt',TRUE);
	$email = $this->input->post('email',TRUE);
	$notelpon = $this->input->post('notelpon',TRUE);
	$status = $this->input->post('xstatus',TRUE);


	$where = array('id' => $id);
		$data = array(
			'id' =>$id,
			'no_anggota'=>$no_anggota,			
			'nama'=>$nama,					
			'asal_pt'=>$asal_pt,					
			'email'=>$email,					
			'telpon'=>$notelpon,
			'status_anggota'=>$status

		);
		
	$this->M_data->update_data($where, $data,'tblregister');
	$this->session->set_flashdata('message','<div class="alert alert-info"><i class="fa fa-check"> Data Berhasil Terupdate..!!</i></div>');
	redirect('data-daftar-user.aspx');

}

	function delete(){
		$kode=$this->input->post('xkode');
		$data=$this->input->post('file');
				$path='./assets/downloadfile/'.$data;
				unlink($path);
		$this->db->query("DELETE FROM tblregister where id='$kode'");
		$this->session->set_flashdata('message','<div class="alert alert-info"><i class="fa fa-check">  Data Berhasil Terhapus..!! </i></div>');
		redirect('data-daftar-user.aspx');
		}
	



}