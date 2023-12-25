<?php
class Register extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('M_login');
        $this->load->model('M_data');
        $this->load->helper('date_helper');
        $this->load->library('upload');
        $this->load->helper('download');
    }

    function index()
    {
        $this->load->view('v_register');
    }

    function save_user()
    {

        $no_anggota = $this->input->post('no_anggota', TRUE);
        $nama = $this->input->post('nama', TRUE);
        $asal_pt = $this->input->post('asal_pt', TRUE);
        $email = $this->input->post('email');
        $telpon = $this->input->post('notelpon', TRUE);
        $berkas = $this->input->post('berkas');
        $nourut = 'evotting';
        $tgl_create = date("Y-m-d H:i:s");
        $cek = $this->db->get_where('tblregister', array('no_anggota' => $no_anggota));
        if ($cek->num_rows() <= 0) {
            $data = [
                'no_anggota' => $no_anggota,
                'nama' => $nama,
                'asal_pt' => $asal_pt,
                'email' => $email,
                'telpon' => $telpon,
                'password_user' => $nourut,
                'status_anggota' => 2,
                'tgl_register' => $tgl_create,

            ];

            $this->session->set_flashdata('msg', '<div class="alert alert-success"><i class="fa fa-check"> Data Berhasil Tersimpan..!!</i></div>');

            $this->M_data->insert_data($data, 'tblregister');
            redirect(base_url() . 'login.aspx');
        } else {
            $this->session->set_flashdata('msg', '<div class="alert alert-danger"><i class="fa fa-check"> No Anggota Anda Telah Terdaftar..!!</i></div>');
            redirect(base_url() . 'register-anggota.aspx');
        }
    }



    function get_nourut()
    {

        date_default_timezone_set('Asia/Jakarta');
        $tahun = date('Y');
        $tgl_create = date("H:i:s");
        $vot = '-evotting';
        $waktu = date('his');
        $q = $this->db->query("SELECT MAX(RIGHT(id,5)) AS kd_max FROM tblregister");
        $kd = "";
        if ($q->num_rows() > 0) {
            foreach ($q->result() as $k) {
                $tmp = ((int)$k->kd_max) + 1;
                $kd = sprintf("%05s", $tmp);
            }
        } else {
            $kd = "01";
        }
        date_default_timezone_set('Asia/Jakarta');
        return $tahun . $waktu . $vot;
    }
}