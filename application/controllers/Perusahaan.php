<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Perusahaan extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('M_perusahaan');
		$this->load->model('Security');
		$this->Security->Cek();
		$this->Security->level(1);
		
	}
	public function index()
	{
		$data['title'] = 'Data Perusahaan';
		$data['perusahaan'] = $this->M_perusahaan->getPerusahaan();

		$this->load->view('template/header', $data);
		$this->load->view('template/sidebar');
		$this->load->view('perusahaan/perusahaan', $data);
		$this->load->view('template/footer');
	}

	public function add()
	{
		$this->_rules();
		$data['title'] = 'Tambah Perusahaan';

		if ($this->form_validation->run() == false) {

			$this->load->view('template/header', $data);
			$this->load->view('template/sidebar');
			$this->load->view('perusahaan/perusahaan_add');
			$this->load->view('template/footer');
		} else {


			$input = array(
				'nama'		=> $this->input->post('nama', true),
				'alamat'	=> $this->input->post('alamat', true)
			);

			$this->M_perusahaan->addPerusahaan($input);

			$this->session->set_flashdata(
				'message',
				'<div class="alert alert-success alert-dismissible fade show" role="alert">
					Berhasil <strong>Tambah</strong> data perusahaan
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>'
			);

			redirect('perusahaan');
		}
	}
	public function update($id)
	{
		$this->_rules();
		$data['title'] = 'Update Perusahaan';

		if ($this->form_validation->run() == false) {

			$data['perusahaan'] = $this->M_perusahaan->editPerusahaan($id)->result();

			// var_dump($data['perusahaan']);
			// die;
			$this->load->view('template/header', $data);
			$this->load->view('template/sidebar');
			$this->load->view('perusahaan/perusahaan_update', $data);
			$this->load->view('template/footer');
		} else {

			$input = array(
				'nama'		=> $this->input->post('nama', true),
				'alamat'	=> $this->input->post('alamat', true)
			);

			$this->M_perusahaan->updatePerusahaan($id, $input);

			$this->session->set_flashdata(
				'message',
				'<div class="alert alert-success alert-dismissible fade show" role="alert">
					Berhasil <strong>Update</strong> data perusahaan
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>'
			);

			redirect('perusahaan');
		}
	}

	public function delete($id)
	{
		$this->M_perusahaan->deletePerusahaan($id);
		$this->session->set_flashdata(
			'message',
			'<div class="alert alert-success alert-dismissible fade show" role="alert">
				Berhasil <strong>Delete</strong> data perusahaan
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>'
		);
		redirect('perusahaan');
	}

	public function _rules()
	{
		$this->form_validation->set_rules('nama', 'nama', 'required');
		$this->form_validation->set_rules('alamat', 'alamat', 'required');
	}
}
