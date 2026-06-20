<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_kategori extends CI_Model
{
    private $table = 'tb_kategori';

    public function get_all()
    {
        $this->db->order_by('nama_kategori', 'ASC');
        return $this->db->get($this->table)->result();
    }

    public function get_by_id($id)
    {
        return $this->db->where('id_kategori', $id)->get($this->table)->row();
    }

    public function insert($data)
    {
        return $this->db->insert($this->table, $data);
    }

    public function update($id, $data)
    {
        return $this->db->where('id_kategori', $id)->update($this->table, $data);
    }

    public function delete($id)
    {
        return $this->db->where('id_kategori', $id)->delete($this->table);
    }

    public function count_produk_by_kategori($id_kategori)
    {
        return $this->db->where('id_kategori', $id_kategori)->count_all_results('tb_produk');
    }
}
