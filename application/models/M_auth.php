<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_auth extends CI_Model
{
    public function insert_user($data)
    {
        return $this->db->insert('tb_user', $data);
    }

    public function cek_login($username)
    {
        return $this->db->get_where('tb_user', ['username' => $username])->row();
    }

    public function get_user_by_id($id_user)
    {
        return $this->db->get_where('tb_user', ['id_user' => $id_user])->row();
    }
}
