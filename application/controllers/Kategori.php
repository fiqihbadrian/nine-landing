<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kategori extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        
        // Cek login
        if (!$this->session->userdata('logged_in')) {
            redirect('auth/login');
        }
        
        $this->load->model('M_kategori');
        $this->load->library('session');
    }

    public function index()
    {
        $data['kategori'] = $this->M_kategori->get_all();
        
        $this->load->view('dashboard/v_header');
        $this->load->view('dashboard/v_navbar');
        $this->load->view('dashboard/v_kategori', $data);
        $this->load->view('dashboard/v_footer');
    }

    public function tambah_kategori()
    {
        $this->load->view('dashboard/v_header');
        $this->load->view('dashboard/v_navbar');
        $this->load->view('dashboard/v_tambah_kategori');
        $this->load->view('dashboard/v_footer');
    }

    public function simpan_kategori()
    {
        $data = [
            'nama_kategori' => $this->input->post('nama_kategori')
        ];

        $this->M_kategori->insert($data);
        $this->session->set_flashdata('success', 'Kategori berhasil ditambahkan');
        redirect('kategori');
    }

    public function edit_kategori($id)
    {
        $data['kategori'] = $this->M_kategori->get_by_id($id);
        if (!$data['kategori']) {
            show_404();
        }

        $this->load->view('dashboard/v_header');
        $this->load->view('dashboard/v_navbar');
        $this->load->view('dashboard/v_edit_kategori', $data);
        $this->load->view('dashboard/v_footer');
    }

    public function update_kategori($id)
    {
        $kategori = $this->M_kategori->get_by_id($id);
        if (!$kategori) {
            show_404();
        }

        $data = [
            'nama_kategori' => $this->input->post('nama_kategori')
        ];

        $this->M_kategori->update($id, $data);
        $this->session->set_flashdata('success', 'Kategori berhasil diperbarui');
        redirect('kategori');
    }

    public function hapus_kategori($id)
    {
        $kategori = $this->M_kategori->get_by_id($id);
        if (!$kategori) {
            show_404();
        }

        // Cek apakah kategori masih digunakan oleh produk
        $count = $this->M_kategori->count_produk_by_kategori($id);
        if ($count > 0) {
            $this->session->set_flashdata('error', 'Kategori tidak dapat dihapus karena masih digunakan oleh ' . $count . ' produk');
            redirect('kategori');
            return;
        }

        $this->M_kategori->delete($id);
        $this->session->set_flashdata('success', 'Kategori berhasil dihapus');
        redirect('kategori');
    }
}
