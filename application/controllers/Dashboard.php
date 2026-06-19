<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('M_admin', 'm_admin');
    }

    public function index()
    {
        $data = [
            'total_users' => $this->m_admin->count_users(),
            'total_produk' => $this->m_admin->count_produk(),
            'latest_produk' => $this->m_admin->latest_produk(),
        ];

        $this->load->view('dashboard/v_header');
        $this->load->view('dashboard/v_navbar');
        $this->load->view('dashboard/v_main', $data);
        $this->load->view('dashboard/v_footer');
    }
}
