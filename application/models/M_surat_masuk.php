<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_surat_masuk extends CI_Model
{


    public function getSuratMasuk($mulai, $akhir)
    {
        //by tahun
        $user = $this->session->userdata('username');
        $this->db->select('surat_masuk.*');
        $this->db->select('user.nama as uNama', false);
        $this->db->select('perusahaan.nama as pNama', false);
        $this->db->from('surat_masuk');
        $this->db->join('user', 'surat_masuk.registrar = user.username');
        $this->db->join('perusahaan', 'user.id_perusahaan = perusahaan.id');
        $this->db->where('user.username', $user);
        $this->db->where('surat_masuk.tanggal_masuk >=', $mulai);
        $this->db->where('surat_masuk.tanggal_masuk <=', $akhir);
        return $this->db->get()->result_array();
    }



    public function addSuratMasuk($input)
    {
        return $this->db->insert('surat_masuk', $input);
    }

    public function editSuratMasuk($id)
    {
        $this->db->where('id', $id);
        return $this->db->get('surat_masuk');
    }

    public function updateSuratMasuk($id, $input)
    {
        $this->db->where('id', $id);
        return $this->db->update('surat_masuk', $input);
    }

    public function deleteSuratMasuk($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('surat_masuk');
    }

    public function getAgenda($tahunMasuk)
    {
        return $this->db->query("Select * FROM `surat_masuk` WHERE (SELECT YEAR(tanggal_masuk) as tahun) = '$tahunMasuk'")->num_rows();
    }

    public function export($mulai = TANGGAL_AWAL_TAHUN, $akhir = TANGGAL_AKHIR_TAHUN)
    {
        $user = $this->session->userdata('username');
        $this->db->select('surat_masuk.*');
        $this->db->select('user.nama as uNama', false);
        $this->db->select('perusahaan.nama as pNama, perusahaan.alamat', false);
        $this->db->from('surat_masuk');
        $this->db->join('user', 'surat_masuk.registrar = user.username');
        $this->db->join('perusahaan', 'user.id_perusahaan = perusahaan.id');
        $this->db->where('user.username', $user);
        if ($mulai != '' && $akhir != '') {
            $this->db->where('surat_masuk.tanggal_masuk >=', $mulai);
            $this->db->where('surat_masuk.tanggal_masuk <=', $akhir);
        }
        return $this->db->get()->result_array();
    }
}
