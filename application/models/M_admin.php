<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_admin extends CI_Model
{
    // User Statistics
    public function count_users()
    {
        return $this->db->count_all('tb_user');
    }

    public function count_admin_users()
    {
        return $this->db->where('role', 'admin')->count_all_results('tb_user');
    }

    public function count_regular_users()
    {
        return $this->db->where('role', 'customer')->count_all_results('tb_user');
    }

    public function latest_users($limit = 5)
    {
        return $this->db->order_by('id_user', 'DESC')->get('tb_user', $limit)->result();
    }

    // Product Statistics
    public function count_produk()
    {
        return $this->db->count_all('tb_produk');
    }

    public function total_stok()
    {
        $query = $this->db->select_sum('stok')->get('tb_produk');
        $result = $query->row();
        return $result->stok ? $result->stok : 0;
    }

    public function count_produk_habis()
    {
        return $this->db->where('stok <=', 0)->count_all_results('tb_produk');
    }

    public function count_produk_stok_rendah($threshold = 10)
    {
        return $this->db->where('stok >', 0)->where('stok <=', $threshold)->count_all_results('tb_produk');
    }

    public function latest_produk($limit = 6)
    {
        $this->db->select('tp.*, tk.nama_kategori');
        $this->db->from('tb_produk tp');
        $this->db->join('tb_kategori tk', 'tp.id_kategori = tk.id_kategori', 'left');
        $this->db->order_by('tp.id_produk', 'DESC');
        $this->db->limit($limit);
        return $this->db->get()->result();
    }

    public function total_nilai_stok()
    {
        $query = $this->db->select('SUM(harga * stok) as total_nilai')->get('tb_produk');
        $result = $query->row();
        return $result->total_nilai ? $result->total_nilai : 0;
    }

    // Category Statistics
    public function count_kategori()
    {
        return $this->db->count_all('tb_kategori');
    }

    public function get_kategori_with_count()
    {
        $this->db->select('tk.id_kategori, tk.nama_kategori, COUNT(tp.id_produk) as total_produk');
        $this->db->from('tb_kategori tk');
        $this->db->join('tb_produk tp', 'tk.id_kategori = tp.id_kategori', 'left');
        $this->db->group_by('tk.id_kategori');
        $this->db->order_by('total_produk', 'DESC');
        return $this->db->get()->result();
    }

    public function get_all_kategori()
    {
        return $this->db->order_by('nama_kategori', 'ASC')->get('tb_kategori')->result();
    }

    // Product by Category
    public function count_produk_by_kategori()
    {
        $this->db->select('tk.nama_kategori as kategori, COUNT(tp.id_produk) as total');
        $this->db->from('tb_kategori tk');
        $this->db->join('tb_produk tp', 'tk.id_kategori = tp.id_kategori', 'left');
        $this->db->group_by('tk.id_kategori');
        return $this->db->get()->result();
    }

    // Recent Activity
    public function recent_activity($limit = 10)
    {
        // Combine recent users and products
        $users = $this->db->select("'user' as type, nama as name, id_user as created_at")
            ->order_by('id_user', 'DESC')
            ->get('tb_user', $limit)
            ->result_array();

        $products = $this->db->select("'product' as type, nama_produk as name, id_produk as created_at")
            ->order_by('id_produk', 'DESC')
            ->get('tb_produk', $limit)
            ->result_array();

        $combined = array_merge($users, $products);
        
        return array_slice($combined, 0, $limit);
    }
}
