<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_login extends CI_Model
{
	public function getLogin($user, $pass)
	{
		$cek = $this->db->where('username', $user)->get('user')->row();

		if ($cek > 0) {
			if (password_verify($pass, $cek->password)) {

				$this->db->select('user.*');
				$this->db->select('perusahaan.nama as pNama', false);
				$this->db->from('user');
				$this->db->join('perusahaan', 'user.id_perusahaan = perusahaan.id');
				$this->db->where('level', 2);
				$this->db->where('username', $cek->username);
				$profil = $this->db->get()->row();

				$sess = array(
					'username' 		=> $cek->username,
					'nama' 	 		=> $cek->nama,
					'level'	 		=> $cek->level,
					'profil'		=> $cek->gambar,
					'perusahaan' 	=> $profil->pNama
				);
				$this->session->set_userdata($sess);
				redirect('dashboard');
			} else {
				$this->session->set_flashdata(
					'info',
					'<div class="alert alert-danger alert-dismissible fade show" role="alert">
						 Username atau Password <strong>salah</strong>
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>'
				);
				redirect('Auth');
			}
		} else {
			$this->session->set_flashdata(
				'info',
				'<div class="alert alert-danger alert-dismissible fade show" role="alert">
					 Username atau Password <strong>salah</strong>
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>'
			);
			redirect('Auth');
		}
	}
}
