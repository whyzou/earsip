<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('M_dashboard');
		$this->load->model('Security');
		$this->Security->Cek();
	}
	
	public function index()
	{


		$data['dashboard'] = $this->M_dashboard->getData();
		$data['title'] = 'Dashboard';

		$this->load->view('template/header', $data);
		$this->load->view('template/sidebar');
		$this->load->view('dashboard');
		$this->load->view('template/footer');
	}




}
