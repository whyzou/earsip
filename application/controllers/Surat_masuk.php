<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Surat_masuk extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('M_user');
		$this->load->model('M_surat_masuk');
		$this->load->model('Security');
		$this->Security->Cek();
		$this->Security->level(2);
	}
	public function index()
	{
		$data['title'] = 'Data Surat Masuk';
		$data['mulai'] = $this->input->post('tanggal_mulai') ? $this->input->post('tanggal_mulai') : TANGGAL_AWAL_TAHUN;
		$data['akhir'] = $this->input->post('tanggal_akhir') ? $this->input->post('tanggal_akhir') : TANGGAL_AKHIR_TAHUN;
		$data['surat'] = $this->M_surat_masuk->getSuratMasuk($data['mulai'], $data['akhir']);

		$this->load->view('template/header', $data);
		$this->load->view('template/sidebar');
		$this->load->view('surat/surat_masuk');
		$this->load->view('template/footer');
	}

	
	public function add()
	{
		$this->rules();
		$this->form_validation->set_rules('tanggal_masuk', 'tanggal masuk', 'required');
		$data['title'] = 'Tambah Surat Masuk';

		if ($this->form_validation->run() == false) {
			$this->load->view('template/header', $data);
			$this->load->view('template/sidebar');
			$this->load->view('surat/surat_masuk_add');
			$this->load->view('template/footer');
		} else {


			$tanggal_masuk	= $this->input->post('tanggal_masuk', true);
			$nomor_agenda 	= $this->M_surat_masuk->getAgenda(date("Y", strtotime($tanggal_masuk))) + 1;

			//untuk pengecekan apabila tidak upload gambar
			$file = 1;
			if ($_FILES['file']['name'] != '')
				$file = $this->_uploadPDF();


			if ($file) {
				if ($file == 1)
					$file = null;

				$input = array(
					'nomor_agenda'		=> $nomor_agenda,
					'tanggal_masuk'		=> $tanggal_masuk,
					'nomor_surat'		=> $this->input->post('nomor_surat', true),
					'tanggal_surat'		=> $this->input->post('tanggal_surat'),
					'perihal'			=> $this->input->post('perihal', true),
					'pengirim'			=> $this->input->post('pengirim', true),
					'alamat_pengirim'	=> $this->input->post('alamat_pengirim', true),
					'lampiran'			=> $this->input->post('lampiran', true),
					'kode'				=> $this->input->post('kode', true),
					'keterangan'		=> $this->input->post('keterangan', true),
					'registrar'			=> $this->session->userdata('username'),
					'file'				=> $file,
				);

				if ($this->M_surat_masuk->addSuratMasuk($input)) {
					$this->session->set_flashdata(
						'message',
						'<div class="alert alert-success alert-dismissible fade show" role="alert">
							Berhasil <strong>Tambah</strong> data surat
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>'
					);
				} else {
					$this->session->set_flashdata(
						'message',
						'<div class="alert alert-danger alert-dismissible fade show" role="alert">
							Gagal <strong>Tambah</strong> data surat
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>'
					);
				}
			} else {
				$this->session->set_flashdata(
					'message',
					'<div class="alert alert-danger alert-dismissible fade show" role="alert">
						Gagal <strong>Tambah</strong> data surat (File Tidak Sesuai)
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>'
				);
			}

			redirect('surat_masuk');
		}
	}
	public function update($id)
	{
		$this->rules();
		$data['title'] = 'Update Surat Masuk';


		if ($this->form_validation->run() == false) {

			$data['surat'] = $this->M_surat_masuk->editSuratMasuk($id)->row_array();
			$this->load->view('template/header', $data);
			$this->load->view('template/sidebar');
			$this->load->view('surat/surat_masuk_update');
			$this->load->view('template/footer');
		} else {

			//untuk pengecekan apabila tidak upload gambar
			$file = '';
			if ($_FILES['file']['name'] != '') {
				$this->_deleteFile($id);
				$file = $this->_uploadPDF();
			}

			$input = array(
				'tanggal_masuk'		=> $this->input->post('tanggal_masuk'),
				'nomor_surat'		=> $this->input->post('nomor_surat', true),
				'tanggal_surat'		=> $this->input->post('tanggal_surat'),
				'perihal'			=> $this->input->post('perihal', true),
				'pengirim'			=> $this->input->post('pengirim', true),
				'alamat_pengirim'	=> $this->input->post('alamat_pengirim', true),
				'lampiran'			=> $this->input->post('lampiran', true),
				'kode'				=> $this->input->post('kode', true),
				'keterangan'		=> $this->input->post('keterangan', true),
				'registrar'			=> $this->session->userdata('username'),
			);
			if ($file != '') {
				$input['file'] = $file;
			}
			if ($this->M_surat_masuk->updateSuratMasuk($id, $input)) {
				$this->session->set_flashdata(
					'message',
					'<div class="alert alert-success alert-dismissible fade show" role="alert">
							Berhasil <strong>Update</strong> data surat
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>'
				);
			} else {
				$this->session->set_flashdata(
					'message',
					'<div class="alert alert-danger alert-dismissible fade show" role="alert">
							Gagal <strong>Update</strong> data surat
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>'
				);
			}
			redirect('surat_masuk');
		}
	}


	public function delete($id)
	{
		$this->_deleteFile($id);
		$this->M_surat_masuk->deleteSuratMasuk($id);
		$this->session->set_flashdata(
			'message',
			'<div class="alert alert-success alert-dismissible fade show" role="alert">
					Berhasil <strong>Delete</strong> data surat
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>'
		);

		redirect('surat_masuk');
	}

	public function rules()
	{
		$this->form_validation->set_rules('tanggal_surat', 'tanggal_surat', 'required');
		$this->form_validation->set_rules('nomor_surat', 'nomor_surat', 'required');
		$this->form_validation->set_rules('perihal', 'perihal', 'required');
		$this->form_validation->set_rules('lampiran', 'lampiran', 'required');
		$this->form_validation->set_rules('kode', 'kode', 'required');
		$this->form_validation->set_rules('keterangan', 'keterangan', 'required');
	}


	private function _uploadPDF()
	{
		$config['upload_path']          = './upload/surat_masuk/';
		$config['allowed_types']        = 'pdf';
		$config['file_name']            = uniqid('surat_masuk_');;
		$config['overwrite']			= true;
		$config['max_size']             = 4000; // 4MB

		$this->load->library('upload', $config);

		if ($this->upload->do_upload('file')) {
			return $this->upload->data("file_name");
		}

		return false;
	}

	private function _deleteFile($id)
	{
		$file = $this->db->where('id', $id)->get('surat_masuk')->row()->file;
		if ($file != null) {
			unlink('./upload/surat_masuk/' . $file);
		}
	}

	public function disposisi($id)
	{
		$this->form_validation->set_rules('alamat_aksi', 'alamat_aksi', 'required');
		$data['title'] = 'Disposisi';

		if ($this->form_validation->run() == false) {

			$data['disposisi'] = $this->M_surat_masuk->editSuratMasuk($id)->row_array();
			$this->load->view('template/header', $data);
			$this->load->view('template/sidebar');
			$this->load->view('surat/disposisi_input');
			$this->load->view('template/footer');

			$input = array(
				'alamat_aksi' 	=> $this->input->post('alamat_aksi', true),
				'informasi' 	=> $this->input->post('informasi', true),
				'catatan' 		=> $this->input->post('catatan', true),
			);
		} else {



			$input = array(
				'alamat_aksi' 	=> $this->input->post('alamat_aksi', true),
				'informasi' 	=> $this->input->post('informasi', true),
				'catatan' 		=> $this->input->post('catatan', true),
			);
			// var_dump($input);
			// die;
			if ($this->M_surat_masuk->updateSuratMasuk($id, $input)) {
				$this->session->set_flashdata(
					'message',
					'<div class="alert alert-success alert-dismissible fade show" role="alert">
							Berhasil <strong>Update</strong> Disposisi surat
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>'
				);
			} else {
				$this->session->set_flashdata(
					'message',
					'<div class="alert alert-danger alert-dismissible fade show" role="alert">
							Gagal <strong>Update</strong> Disposisi surat
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>'
				);
			}
			redirect('surat_masuk');
		}
	}

	public function print_disposisi($id)
	{
		$data['title'] = 'Print Disposisi';

		$data['disposisi'] = $this->M_surat_masuk->editSuratMasuk($id)->row_array();
		$this->load->view('template/header', $data);
		$this->load->view('surat/disposisi');
	}
}
