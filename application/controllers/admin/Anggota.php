<?php
class Anggota extends CI_Controller{
	function __construct(){
		parent::__construct();
		if($this->session->userdata('masuk') !=TRUE){
            $url=base_url('adminvotting');
			redirect($url);
			
        }
		$this->load->model(['M_data']);
		$this->load->library('upload');
		$this->load->helper('download');
		$this->load->helper('date_helper');
 
	}

	function index(){
		// $x['data']=$this->M_data->getAllkaryawan();
		$this->load->view('admin/v_anggota');
	
	}

	function cetak(){
		// $x['data']=$this->M_data->getAllkaryawan();
		$this->load->view('v_cetak');
	
	}






}