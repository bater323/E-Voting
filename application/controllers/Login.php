<?php
class Login extends CI_Controller{
    function __construct(){
        parent:: __construct();
        $this->load->model('M_login');
        $this->load->model('M_data');
        $this->load->helper('date_helper');
        $this->load->library('upload');
    }
    function index(){
        $this->load->view('v_login');
    }

    function register(){
        $this->load->view('v_register');
    }

    function auth(){
        $username=strip_tags(str_replace("'", "", $this->input->post('username',TRUE)));
        $password=strip_tags(str_replace("'", "", $this->input->post('password',TRUE)));
        $cadmin=$this->M_login->cekuser($username,$password);
        if($cadmin->num_rows() > 0){
            $xcadmin=$cadmin->row_array();
            $newdata = array(
                'idadmin'   => $xcadmin['id'],
                'username'  => $xcadmin['no_anggota'],
                'nama'      => $xcadmin['nama'],
                'asal_pt'      => $xcadmin['asal_pt'],
                'email'      => $xcadmin['email'],
                'telpon'      => $xcadmin['telpon'],
                'status_anggota'     => $xcadmin['status_anggota'],
                'masuk' => TRUE
            );

            $this->session->set_userdata($newdata);
            redirect('dashboard1.aspx'); 
        }else{
            redirect('Login/gagallogin'); 
        }
    }


    function gagallogin(){
        $url=base_url();
        echo $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert"><button type="button" class="close" data-dismiss="alert"><span class="fa fa-close"></span></button> Username Atau Password Salah</div>');
        redirect($url);
    }

    function logout(){
        $this->session->sess_destroy();
        $url=base_url('login.aspx');
        redirect($url);
    }
}
