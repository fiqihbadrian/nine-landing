<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_admin extends CI_Model
{
    public function count_users()
    {
        return $this->db->count_all('tb_user');
    }

    public function count_produk()
    {
        return $this->db->count_all('tb_produk');
    }

    public function latest_users($limit = 5)
    {
        return $this->db->order_by('id_user', 'DESC')->get('tb_user', $limit)->result();
    }

    public function latest_produk($limit = 6)
    {
        return $this->db->order_by('id', 'DESC')->get('tb_produk', $limit)->result();
    }
}
