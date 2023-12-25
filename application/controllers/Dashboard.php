<?php
class dashboard extends CI_Controller{
	function __construct(){
		parent::__construct();
		if($this->session->userdata('masuk') !=TRUE){
            $url=base_url('login.aspx');
			redirect($url);
			
        };
		$this->load->model(['M_data', 'm_login', 'M_pengunjung']);
	}
	function index(){
			$x['user'] = $this->M_data->get_data_poling();     
			$x['pengguna'] = $this->M_data->pengguna_user();     
            $this->load->view('v_dashboard',$x);
       
	
	}

	function exampel(){
		$x['user'] = $this->M_data->get_data_poling();     
		$x['pengguna'] = $this->M_data->pengguna_user();     
		$x['datacalon'] = $this->db->query("Select*From tblpolling");   
		$this->load->view('v_dashboard1',$x);
   

}
	
}