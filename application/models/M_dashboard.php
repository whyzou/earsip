<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_dashboard extends CI_Model
{
    public function getData()
    {
        $data['perusahaan'] = $this->db->get('perusahaan')->num_rows();
        $data['user'] = $this->db->get('user')->num_rows();





        if ($this->session->userdata('username') != 'admin') {
            //surat_masuk
            $this->suratMasuk($this->session->userdata('username'));
            $data['surat_masuk'] = $this->db->get()->num_rows();

            //surat_keluar
            $this->suratKeluar($this->session->userdata('username'));
            $data['surat_keluar'] = $this->db->get()->num_rows();
        } else {
            $data['surat_masuk'] = $this->db->get('surat_masuk')->num_rows();
            $data['surat_keluar'] = $this->db->get('surat_keluar')->num_rows();
        }
        return $data;
    }

    private function suratMasuk($user)
    {
        $this->db->select('surat_masuk.*');
        $this->db->from('surat_masuk');
        $this->db->join('user', 'surat_masuk.registrar = user.username');
        $this->db->where('user.username', $user);
    }
    private function suratKeluar($user)
    {
        $this->db->select('surat_keluar.*');
        $this->db->from('surat_keluar');
        $this->db->join('user', 'surat_keluar.registrar = user.username');
        $this->db->where('user.username', $user);
    }
}
