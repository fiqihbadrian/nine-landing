<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_produk extends CI_Model
{
    private $table = 'tb_produk';

    public function get_all()
    {
        $this->db->select('tp.*, tk.nama_kategori');
        $this->db->from('tb_produk tp');
        $this->db->join('tb_kategori tk', 'tk.id_kategori = tp.id_kategori', 'left');
        $this->db->order_by('tp.id_produk', 'DESC');
        return $this->db->get()->result();
    }

    public function get_by_id($id)
    {
        $this->db->select('tp.*, tk.nama_kategori');
        $this->db->from('tb_produk tp');
        $this->db->join('tb_kategori tk', 'tk.id_kategori = tp.id_kategori', 'left');
        $this->db->where('tp.id_produk', $id);
        return $this->db->get()->row();
    }

    public function insert($data)
    {
        return $this->db->insert($this->table, $data);
    }

    public function update($id, $data)
    {
        return $this->db->where('id_produk', $id)->update($this->table, $data);
    }

    public function delete($id)
    {
        return $this->db->where('id_produk', $id)->delete($this->table);
    }
}
