<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_perusahaan extends CI_Model
{
    public function getPerusahaan()
    {
        return $this->db->get('perusahaan')->result_array();
    }

    public function addPerusahaan($input)
    {
        $this->db->insert('perusahaan', $input);
    }

    public function editPerusahaan($id)
    {
        $this->db->where('id', $id);
        return $this->db->get('perusahaan');
    }

    public function updatePerusahaan($id, $input)
    {
        $this->db->where('id', $id);
        $this->db->update('perusahaan', $input);
    }

    public function deletePerusahaan($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('perusahaan');
    }
}
