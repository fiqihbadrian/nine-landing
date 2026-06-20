<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        
        // Cek login
        if (!$this->session->userdata('logged_in')) {
            redirect('auth/login');
        }
        
        $this->load->database();
        $this->load->model('M_admin', 'm_admin');
    }

    public function index()
    {
        $data = [
            // User Statistics
            'total_users' => $this->m_admin->count_users(),
            'admin_users' => $this->m_admin->count_admin_users(),
            'regular_users' => $this->m_admin->count_regular_users(),
            
            // Product Statistics
            'total_produk' => $this->m_admin->count_produk(),
            'total_stok' => $this->m_admin->total_stok(),
            'produk_habis' => $this->m_admin->count_produk_habis(),
            'produk_stok_rendah' => $this->m_admin->count_produk_stok_rendah(),
            'total_nilai_stok' => $this->m_admin->total_nilai_stok(),
            
            // Category Statistics
            'total_kategori' => $this->m_admin->count_kategori(),
            'kategori_list' => $this->m_admin->get_kategori_with_count(),
            'produk_by_kategori' => $this->m_admin->count_produk_by_kategori(),
            
            // Latest Data
            'latest_produk' => $this->m_admin->latest_produk(),
            'latest_users' => $this->m_admin->latest_users(),
            'recent_activity' => $this->m_admin->recent_activity(8),
        ];

        $this->load->view('dashboard/v_header');
        $this->load->view('dashboard/v_navbar');
        $this->load->view('dashboard/v_main', $data);
        $this->load->view('dashboard/v_footer');
    }
}
