<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_user extends CI_Model
{
    //login cek
    public function cekUser($data)
    {
        return $this->db->get_where('login_session', $data);
    }

    public function getUser()
    {

        $this->db->select('user.*');
        $this->db->select('perusahaan.nama as pNama', false);
        $this->db->from('user');
        $this->db->join('perusahaan', 'user.id_perusahaan = perusahaan.id');
        $this->db->where('level', 2);
        return $this->db->get()->result_array();
    }

    public function addUser($input)
    {
        $this->db->insert('user', $input);
    }

    public function editUser($username)
    {
        $this->db->where('username', $username);
        return $this->db->get('user');
    }

    public function updateUser($username, $input)
    {
        $this->db->where('username', $username);
        $this->db->update('user', $input);
    }

    public function deleteUser($username)
    {
        $this->db->where('username',$username);
        $this->db->delete('user');
    }


}
