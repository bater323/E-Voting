<?php
class Dashboard extends CI_Controller{
	function __construct(){
		parent::__construct();
		if($this->session->userdata('masuk') !=TRUE){
            $url=base_url('adminvotting');
			redirect($url);
			
        };
		$this->load->model(['M_data', 'm_login', 'M_pengunjung']);
	}
	function index(){
			$x['user'] = $this->M_data->data_user();     
			$x['polling'] = $this->M_data->data_polling();     
			$x['pengguna_admin'] = $this->M_data->data_pengguna();     
			$x['blm_verifikasi'] = $this->M_data->data_verifikasi();     
			$x['sdh_verifikasi'] = $this->M_data->sudah_verifikasi();   
			$x['pengguna'] = $this->M_data->pengguna_dashbord();
			$x['visitor'] = $this->M_pengunjung->statistik_pengujung();     
            $this->load->view('admin/v_dashboard',$x);
       
	
	}
	
}