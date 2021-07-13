<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('M_user');
		$this->load->model('M_perusahaan');
		$this->load->model('Security');
		$this->Security->Cek();
	}
	public function index()
	{
		$this->Security->level(1);
		$data['title'] = 'Data User';
		$data['user'] = $this->M_user->getUser();

		$this->load->view('template/header', $data);
		$this->load->view('template/sidebar');
		$this->load->view('user/user', $data);
		$this->load->view('template/footer');
	}

	public function add()
	{
		$this->Security->level(1);

		$this->_rules();
		$this->form_validation->set_rules('password', 'password', 'required');
		$this->form_validation->set_rules('username', 'username', 'required|trim');
		$data['title'] = 'Tambah User';

		if ($this->form_validation->run() == false) {
			$data['perusahaan'] = $this->M_perusahaan->getPerusahaan();
			$this->load->view('template/header', $data);
			$this->load->view('template/sidebar');
			$this->load->view('user/user_add', $data);
			$this->load->view('template/footer');
		} else {

			$password				= $this->input->post('password');
			$gambar					= $this->_uploadImage();

			$input = array(
				'username'			=> $this->input->post('username', true),
				'nama'				=> $this->input->post('nama', true),
				'password'			=> password_hash($password, PASSWORD_DEFAULT),
				'level'				=> 2,
				'id_perusahaan'		=> $this->input->post('perusahaan', true),
				'gambar'			=> $gambar,
			);

			$this->M_user->addUser($input);
			$this->session->set_flashdata(
				'message',
				'<div class="alert alert-success alert-dismissible fade show" role="alert">
					Berhasil <strong>Tambah</strong> data user
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>'
			);

			redirect('user');
		}
	}
	public function update($username)
	{
		$this->_rules();
		$data['title'] = 'Tambah User';


		if ($this->form_validation->run() == false) {

			$data['user'] = $this->M_user->editUser($username)->row_array();
			$data['perusahaan'] = $this->M_perusahaan->getPerusahaan();

			$this->load->view('template/header', $data);
			$this->load->view('template/sidebar');
			$this->load->view('user/user_update');
			$this->load->view('template/footer');
		} else {

			$password	= $this->input->post('password');

			$gambar = '';
			if ($_FILES['gambar']['name'] != '') {
				$this->_deleteImage($username);
				$gambar = $this->_uploadImage();
			}


			$input = array(
				'nama'				=> $this->input->post('nama', true),
				'id_perusahaan'		=> $this->input->post('perusahaan', true),
			);
			
			if ($gambar != '') {
				$input['gambar'] = $gambar;
			}

			if ($password != null) {
				$input['password'] = password_hash($password, PASSWORD_DEFAULT);
			}


			$this->M_user->updateUser($username, $input);

			$this->session->set_flashdata(
				'message',
				'<div class="alert alert-success alert-dismissible fade show" role="alert">
					Berhasil <strong>Update</strong> data user
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>'
			);

			redirect('user');
		}
	}

	public function delete($username)
	{
		$this->_deleteImage($username);
		$this->M_user->deleteUser($username);
		$this->session->set_flashdata(
			'message',
			'<div class="alert alert-success alert-dismissible fade show" role="alert">
					Berhasil <strong>Delete</strong> data user
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>'
		);

		redirect('user');
	}

	public function _rules()
	{
		$this->form_validation->set_rules('nama', 'nama', 'required');
		$this->form_validation->set_rules('perusahaan', 'perusahaan', 'required');
	}

	public function cek_username()
	{
		$username = $this->input->post('username');

		echo $this->db->where('username', $username)->get('user')->num_rows();
	}

	private function _uploadImage()
	{
		$config['upload_path']          = './upload/user/';
		$config['allowed_types']        = 'jpg|png|gif';
		$config['file_name']            = uniqid('gambar_user_');
		$config['overwrite']			= true;
		$config['max_size']             = 1024; // 1MB


		$this->load->library('upload', $config);

		if ($this->upload->do_upload('gambar')) {
			return $this->upload->data("file_name");
		}

		return "default.png";
	}

	private function _deleteImage($username)
	{
		$gambar = $this->M_user->editUser($username)->row()->gambar;
		if ($gambar != null) {
			unlink('./upload/user/' . $gambar);
		}
	}


	public function editProfil($username)
	{
		$this->form_validation->set_rules('nama', 'nama', 'required');

		$password	= $this->input->post('password');

		$gambar = '';
		if ($_FILES['gambar']['name'] != '') {
			$this->_deleteImage($username);
			$gambar = $this->_uploadImage();
		}


		$input = array(
			'nama' => $this->input->post('nama', true),
		);

		if ($gambar != '') {
			$input['gambar'] = $gambar;
		}


		if ($password != null) {
			$input['password'] = password_hash($password, PASSWORD_DEFAULT);
		}




		$this->M_user->updateUser($username, $input);

		$cek = $this->db->where('username', $username)->get('user')->row();
		$sess = array(
			'nama' 	 		=> $cek->nama,
			'profil'		=> $cek->gambar,
		);
		$this->session->set_userdata($sess);

		$this->session->set_flashdata(
			'edit',
			'<div class="alert alert-success alert-dismissible fade show" role="alert">
					Berhasil <strong>Update</strong> data user
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>'
		);

		redirect('dashboard');
	}

	public function dokumentasi()
	{
		$data['title'] = 'Dokumentasi';
	}
}
