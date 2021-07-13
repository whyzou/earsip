<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('M_login');
	}
	public function index()
	{
		if ($this->session->userdata('username') != '') {
			redirect('dashboard');
		}

		$this->load->view('login');
	}
	public function getLogin()
	{
		$this->form_validation->set_rules('username', 'username', 'required');
		$this->form_validation->set_rules('password', 'password', 'required');

		$user = $this->input->post('username', true);
		$pass = $this->input->post('password');
		$this->M_login->getLogin($user, $pass);
	}
	public function logout()
	{
		$this->session->sess_destroy();
		redirect('auth');
	}

	public function blocked()
	{
		$data['title'] = '404 - Page Not Found';

		$this->load->view('template/header', $data);
		$this->load->view('404');
	}
}
