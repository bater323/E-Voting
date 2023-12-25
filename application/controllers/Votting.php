<?php
class Votting extends CI_Controller{
	function __construct(){
		parent::__construct();
		if($this->session->userdata('masuk') !=TRUE){
            $url=base_url('login.aspx');
			redirect($url);
			
        }
		$this->load->model(['M_data', 'm_login', 'M_pengunjung']);
		$this->load->library('upload');
		$this->load->helper('download');
	}

	function index(){
		$x['user'] = $this->M_data->get_data_poling();     
		$x['pengguna'] = $this->M_data->pengguna_user();     
		$this->load->view('v_dashboard',$x);
	}

	function data_votting(){
		$x['user1'] = $this->M_data->get_data_poling();     
		$x['pengguna'] = $this->M_data->pengguna_user();  
		$x['data']=$this->M_data->get_data_user_polling();
		$x['user'] = $this->M_data->data_user();     
		$x['polling'] = $this->M_data->data_polling();     
		$x['pengguna_admin'] = $this->M_data->data_pengguna();     
		$x['blm_verifikasi'] = $this->M_data->data_verifikasi();     
		$x['sdh_verifikasi'] = $this->M_data->sudah_verifikasi();     
		$x['pengguna'] = $this->M_data->pengguna_dashbord();
		$x['pilihan'] = $this->M_data->pilihan();
		$x['visitor'] = $this->M_pengunjung->statistik_pengujung();     
		$this->load->view('v_dashboard2',$x);
	}

	function votting()
	{	
		$iduser=$this->session->userdata('username');
		$idvoting = $this->input->post('xkode',TRUE);
		$tgl= date('Y-m-d H:i:s');

		$cek=$this->db->get_where('detail_votting', array('id_user' => $iduser));
		if($cek->num_rows()<= 0){
		
		$data=[
			"id_polling"=>$idvoting,
			"id_user"=>$iduser,															
			"jumlah_vot"=>1,																																												
			"tgl_vot"=>$tgl,												
			"status_vot"=>2,																				
		];		
		$this->M_data->insert_data($data,'detail_votting');
		$this->session->set_flashdata('message','<div class="alert alert-success"><i class="fa fa-check"> Voting Anda Berhasil Tersimpan..!!</i></div>');
		redirect('dashboard.aspx');
	}else{
		$this->session->set_flashdata('message','<div class="alert alert-danger"><i class="fa fa-check"> Anda Sudah Melakukan Voting..!!</i></div>');
		redirect('dashboard.aspx');
	}


	}

	function votting_user()
	{	
		$iduser=$this->session->userdata('username');
		$email=$this->session->userdata('email');
		$xnama=$this->session->userdata('nama');
		
		$idvoting = $this->input->post('xkode',TRUE);
		$nama = $this->input->post('xnama',TRUE);
		$tgl= date('Y-m-d H:i:s');
	
		$cek=$this->db->get_where('detail_votting', array('id_user' => $iduser));
		if($cek->num_rows()<= 0){
		
		$data=[
			"id_polling"=>$idvoting,
			"id_user"=>$iduser,															
			"jumlah_vot"=>1,																																												
			"tgl_vot"=>$tgl,												
			"status_vot"=>2,																				
		];
		
		$this->M_data->insert_data($data,'detail_votting');
		$this->session->set_flashdata('message','<div class="alert alert-success"><i class="fa fa-check"> Votting Berhasil Tersimpan..!!</i></div>');
		redirect('votting.aspx');
	}else{
		$this->session->set_flashdata('message','<div class="alert alert-danger"><i class="fa fa-check"> Anda Sudah Melakukan Votting..!!</i></div>');
		redirect('votting.aspx');
	}


	}


}