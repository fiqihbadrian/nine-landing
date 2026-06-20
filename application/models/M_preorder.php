<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_preorder extends CI_Model
{
    private $table = 'tb_preorder';

    public function get_all()
    {
        $this->db->select('tp.*, tpr.nama_produk as produk_nama, tpr.gambar, tk.nama_kategori');
        $this->db->from('tb_preorder tp');
        $this->db->join('tb_produk tpr', 'tpr.id_produk = tp.id_produk', 'left');
        $this->db->join('tb_kategori tk', 'tk.id_kategori = tpr.id_kategori', 'left');
        $this->db->order_by('tp.id_preorder', 'DESC');
        return $this->db->get()->result();
    }

    public function get_by_id($id)
    {
        $this->db->select('tp.*, tpr.nama_produk as produk_nama, tpr.harga, tpr.gambar, tk.nama_kategori');
        $this->db->from('tb_preorder tp');
        $this->db->join('tb_produk tpr', 'tpr.id_produk = tp.id_produk', 'left');
        $this->db->join('tb_kategori tk', 'tk.id_kategori = tpr.id_kategori', 'left');
        $this->db->where('tp.id_preorder', $id);
        return $this->db->get()->row();
    }

    public function get_by_status($status)
    {
        $this->db->where('status', $status);
        $this->db->order_by('id_preorder', 'DESC');
        return $this->db->get($this->table)->result();
    }

    public function insert($data)
    {
        return $this->db->insert($this->table, $data);
    }

    public function update($id, $data)
    {
        return $this->db->where('id_preorder', $id)->update($this->table, $data);
    }

    public function delete($id)
    {
        return $this->db->where('id_preorder', $id)->delete($this->table);
    }

    public function count_by_status($status)
    {
        return $this->db->where('status', $status)->count_all_results($this->table);
    }

    public function get_recent($limit = 5)
    {
        $this->db->order_by('id_preorder', 'DESC');
        $this->db->limit($limit);
        return $this->db->get($this->table)->result();
    }
}
