<?php
class Home extends CI_Controller
{
	function __construct()
	{
		parent::__construct();

		$this->load->model(['M_data', 'contact_model']);
		$this->load->library('form_validation');
	}
	function index()
	{
		$x['user'] = $this->M_data->get_data_poling();
		$this->load->view('index', $x);
	}


	function send()
	{

		$this->form_validation->set_rules('name', 'Name', 'required|min_length[3]|max_length[40]|htmlspecialchars');
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
		$this->form_validation->set_rules('subject', 'Subject', 'required|min_length[3]|max_length[100]|htmlspecialchars');
		$this->form_validation->set_rules('message', 'Message', 'required');
		if ($this->form_validation->run() == FALSE) {
			$this->session->set_flashdata('msg', '<div class="alert alert-danger">Mohon masukkan input yang Valid!</div>');
			redirect('index.js');
		} else {
			$name = $this->input->post('name', TRUE);
			$email = $this->input->post('email', TRUE);
			$subject = $this->input->post('subject', TRUE);
			$message = strip_tags(htmlspecialchars($this->input->post('message', TRUE), ENT_QUOTES));

			$this->contact_model->save_message($name, $email, $subject, $message);
			$this->session->set_flashdata('msg', '<div class="alert alert-info">Terima kasih, Pesan Anda Akan Kami Proses..!!</div>');

			redirect('index.js');
		}
	}
}