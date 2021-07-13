<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Surat_keluar extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('M_user');
		$this->load->model('M_surat_keluar');
		$this->load->model('Security');
		$this->Security->Cek();
		$this->Security->level(2);

	}
	public function index()
	{
		$data['title'] = 'Data Surat Keluar';
		$data['mulai'] = $this->input->post('tanggal_mulai') ? $this->input->post('tanggal_mulai') : TANGGAL_AWAL_TAHUN;
		$data['akhir'] = $this->input->post('tanggal_akhir') ? $this->input->post('tanggal_akhir') : TANGGAL_AKHIR_TAHUN;
		$data['surat'] = $this->M_surat_keluar->getSuratKeluar($data['mulai'], $data['akhir']);

		$this->load->view('template/header', $data);
		$this->load->view('template/sidebar');
		$this->load->view('surat/surat_keluar');
		$this->load->view('template/footer');
	}


	public function add()
	{
		$this->rules();
		$this->form_validation->set_rules('tanggal_keluar', 'tanggal keluar', 'required');
		$data['title'] = 'Tambah Surat Keluar';

		if ($this->form_validation->run() == false) {
			$this->load->view('template/header', $data);
			$this->load->view('template/sidebar');
			$this->load->view('surat/surat_keluar_add');
			$this->load->view('template/footer');
		} else {


			$tanggal_keluar	= $this->input->post('tanggal_keluar', true);
			$nomor_agenda 	= $this->M_surat_keluar->getAgenda(date("Y", strtotime($tanggal_keluar))) + 1;

			//untuk pengecekan apabila tidak upload gambar
			$file = 1;
			if ($_FILES['file']['name'] != '')
				$file = $this->_uploadPDF();


			if ($file) {
				if ($file == 1)
					$file = null;

				$input = array(
					'nomor_agenda'		=> $nomor_agenda,
					'tanggal_keluar'	=> $tanggal_keluar,
					'nomor_surat'		=> $this->input->post('nomor_surat', true),
					'tanggal_surat'		=> $this->input->post('tanggal_surat'),
					'perihal'			=> $this->input->post('perihal', true),
					'penerima'			=> $this->input->post('penerima', true),
					'alamat_penerima'	=> $this->input->post('alamat_penerima', true),
					'lampiran'			=> $this->input->post('lampiran', true),
					'kode'				=> $this->input->post('kode', true),
					'keterangan'		=> $this->input->post('keterangan', true),
					'registrar'			=> $this->session->userdata('username'),
					'file'				=> $file,
				);

				if ($this->M_surat_keluar->addSuratKeluar($input)) {
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

			redirect('surat_keluar');
		}
	}
	public function update($id)
	{
		$this->rules();
		$data['title'] = 'Update Surat Keluar';


		if ($this->form_validation->run() == false) {

			$data['surat'] = $this->M_surat_keluar->editSuratKeluar($id)->row_array();
			$this->load->view('template/header', $data);
			$this->load->view('template/sidebar');
			$this->load->view('surat/surat_keluar_update');
			$this->load->view('template/footer');
		} else {

			//untuk pengecekan apabila tidak upload gambar
			$file = '';
			if ($_FILES['file']['name'] != '') {
				$this->_deleteFile($id);
				$file = $this->_uploadPDF();
			}

			$input = array(
				'tanggal_keluar'	=> $this->input->post('tanggal_keluar'),
				'nomor_surat'		=> $this->input->post('nomor_surat', true),
				'tanggal_surat'		=> $this->input->post('tanggal_surat'),
				'perihal'			=> $this->input->post('perihal', true),
				'penerima'			=> $this->input->post('penerima', true),
				'alamat_penerima'	=> $this->input->post('alamat_penerima', true),
				'lampiran'			=> $this->input->post('lampiran', true),
				'kode'				=> $this->input->post('kode', true),
				'keterangan'		=> $this->input->post('keterangan', true),
				'registrar'			=> $this->session->userdata('username'),
			);
			if ($file != '') {
				$input['file'] = $file;
			}
			if ($this->M_surat_keluar->updateSuratKeluar($id, $input)) {
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
			redirect('surat_keluar');
		}
	}


	public function delete($id)
	{
		$this->_deleteFile($id);
		$this->M_surat_keluar->deleteSuratKeluar($id);
		$this->session->set_flashdata(
			'message',
			'<div class="alert alert-success alert-dismissible fade show" role="alert">
					Berhasil <strong>Delete</strong> data surat
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>'
		);

		redirect('surat_keluar');
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
		$config['upload_path']          = './upload/surat_keluar/';
		$config['allowed_types']        = 'pdf';
		$config['file_name']            = uniqid('surat_keluar_');;
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
		$file = $this->db->where('id', $id)->get('surat_keluar')->row()->file;
		if ($file != null) {
			unlink('./upload/surat_keluar/' . $file);
		}
	}

}
