<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_surat_keluar extends CI_Model
{
  

    public function getSuratKeluar($mulai, $akhir)
    {
        //get surat by tahun keluar(kirim)surat
        $user = $this->session->userdata('username');
        $this->db->select('surat_keluar.*');
        $this->db->select('user.nama as uNama', false);
        $this->db->select('perusahaan.nama as pNama', false);
        $this->db->from('surat_keluar');
        $this->db->join('user', 'surat_keluar.registrar = user.username');
        $this->db->join('perusahaan', 'user.id_perusahaan = perusahaan.id');
        $this->db->where('user.username', $user);
        $this->db->where('surat_keluar.tanggal_keluar >=', $mulai);
        $this->db->where('surat_keluar.tanggal_keluar <=', $akhir);
        return $this->db->get()->result_array();
    }


    public function addSuratKeluar($input)
    {
        return $this->db->insert('surat_keluar', $input);
    }

    public function editSuratKeluar($id)
    {
        $this->db->where('id', $id);
        return $this->db->get('surat_keluar');
    }

    public function updateSuratKeluar($id, $input)
    {
        $this->db->where('id', $id);
        return $this->db->update('surat_keluar', $input);
    }

    public function deleteSuratKeluar($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('surat_keluar');
    }

    public function getAgenda($tahunKeluar)
    {
        return $this->db->query("Select * FROM `surat_keluar` WHERE (SELECT YEAR(tanggal_keluar) as tahun) = '$tahunKeluar'")->num_rows();
    }

    public function export($mulai = TANGGAL_AWAL_TAHUN, $akhir = TANGGAL_AKHIR_TAHUN)
    {
        $user = $this->session->userdata('username');
        $this->db->select('surat_keluar.*');
        $this->db->select('user.nama as uNama', false);
        $this->db->select('perusahaan.nama as pNama, perusahaan.alamat', false);
        $this->db->from('surat_keluar');
        $this->db->join('user', 'surat_keluar.registrar = user.username');
        $this->db->join('perusahaan', 'user.id_perusahaan = perusahaan.id');
        $this->db->where('user.username', $user);
        if ($mulai != '' && $akhir != '') {
            $this->db->where('surat_keluar.tanggal_keluar >=', $mulai);
            $this->db->where('surat_keluar.tanggal_keluar <=', $akhir);
        }
        return $this->db->get()->result_array();
    }
}
