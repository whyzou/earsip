<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Security extends CI_Model
{
	public function Cek()
	{
		$username = $this->session->userdata('username');
		if ($username == '') {
			$this->session->sess_destroy();
			$this->session->set_flashdata(
				'info',
				'<div class="alert alert-danger alert-dismissible fade show" role="alert">
					 Maaf Anda Belum <strong>Login</strong>
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>'
			);
			redirect(base_url('auth'));
		}
	}
	public function level($lvl)
	{
		$username = $this->session->userdata('level');
		if ($username != $lvl) {
			$this->session->set_flashdata(
				'info',
				'<div class="alert alert-danger alert-dismissible fade show" role="alert">
					 Maaf Anda Tidak Punya <strong>Hak Akses</strong> ke Halaman Tersebut
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>'
			);
			redirect(base_url('dashboard'));
		}
	}
}
