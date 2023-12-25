<?php
class Inbox extends CI_Controller{
	function __construct(){
		parent::__construct();
		if($this->session->userdata('masuk') !=TRUE){
            $url=base_url('adminvotting');
			redirect($url);
			
        }
		$this->load->model(['M_data']);
		$this->load->library('upload');
		$this->load->helper('download');
	}

	function index(){
		$x['data']=$this->M_data->get_data('tbl_inbox');
		$this->load->view('admin/v_inbox',$x);
	
	}

function hapus(){
	$kode=strip_tags($this->input->post('xkode'));
	$where = array('inbox_id' => $kode);
	$this->M_data->delete_data($where,'tbl_inbox');
	echo $this->session->set_flashdata('msg','delete');	
	redirect('admin/Inbox');
}




}