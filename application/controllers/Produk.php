<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Produk extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        
        // Cek login
        if (!$this->session->userdata('logged_in')) {
            redirect('auth/login');
        }
        
        $this->load->model('M_produk');
        $this->load->model('M_admin', 'm_admin');
        $this->load->library('session');
    }

    public function index()
    {
        $data['produk'] = $this->M_produk->get_all();
        $data['latest_produk'] = array_slice($data['produk'], 0, 5);
        
        $this->load->view('dashboard/v_header');
        $this->load->view('dashboard/v_navbar');
        $this->load->view('dashboard/v_produk', $data);
        $this->load->view('dashboard/v_footer');
    }

    public function tambah()
    {
        $this->load->model('M_kategori');
        $data['kategori'] = $this->M_kategori->get_all();
        $data['produk'] = $this->M_produk->get_all();
        $data['latest_produk'] = array_slice($data['produk'], 0, 5);
        
        $this->load->view('dashboard/v_header');
        $this->load->view('dashboard/v_navbar');
        $this->load->view('dashboard/v_tambah_produk', $data);
        $this->load->view('dashboard/v_footer');
    }

    public function simpan()
    {
        // Handle upload gambar
        $gambar_name = null;
        if (!empty($_FILES['gambar']['name'])) {
            $config['upload_path'] = './public/assets/upload/';
            $config['allowed_types'] = 'jpg|jpeg|png|gif|webp';
            $config['max_size'] = 2048; // 2MB
            $config['encrypt_name'] = TRUE;
            
            $this->load->library('upload', $config);
            
            if ($this->upload->do_upload('gambar')) {
                $upload_data = $this->upload->data();
                $gambar_name = $upload_data['file_name'];
            } else {
                $this->session->set_flashdata('error', $this->upload->display_errors());
                redirect('produk/tambah');
                return;
            }
        }

        $data = [
            'nama_produk' => $this->input->post('nama_produk'),
            'id_kategori' => $this->input->post('id_kategori'),
            'harga' => $this->input->post('harga'),
            'stok' => $this->input->post('stok'),
            'stok_s' => $this->input->post('stok_s'),
            'stok_m' => $this->input->post('stok_m'),
            'stok_l' => $this->input->post('stok_l'),
            'stok_xl' => $this->input->post('stok_xl'),
            'stok_xxl' => $this->input->post('stok_xxl'),
            'gambar' => $gambar_name
        ];

        $this->M_produk->insert($data);
        $this->session->set_flashdata('success', 'Produk berhasil ditambahkan');
        redirect('produk');
    }

    public function detail($id)
    {
        $data['produk'] = $this->M_produk->get_by_id($id);
        if (!$data['produk']) {
            show_404();
        }
        
        $all_produk = $this->M_produk->get_all();
        $data['latest_produk'] = array_slice($all_produk, 0, 5);
        
        $this->load->view('dashboard/v_header');
        $this->load->view('dashboard/v_navbar');
        $this->load->view('dashboard/v_detail_produk', $data);
        $this->load->view('dashboard/v_footer');
    }

    public function edit($id)
    {
        $data['produk'] = $this->M_produk->get_by_id($id);
        if (!$data['produk']) {
            show_404();
        }
        
        $this->load->model('M_kategori');
        $data['kategori'] = $this->M_kategori->get_all();
        
        $all_produk = $this->M_produk->get_all();
        $data['latest_produk'] = array_slice($all_produk, 0, 5);
        
        $this->load->view('dashboard/v_header');
        $this->load->view('dashboard/v_navbar');
        $this->load->view('dashboard/v_edit_produk', $data);
        $this->load->view('dashboard/v_footer');
    }

    public function update($id)
    {
        $produk = $this->M_produk->get_by_id($id);
        if (!$produk) {
            show_404();
        }

        $data = [
            'nama_produk' => $this->input->post('nama_produk'),
            'id_kategori' => $this->input->post('id_kategori'),
            'harga' => $this->input->post('harga'),
            'stok' => $this->input->post('stok'),
            'stok_s' => $this->input->post('stok_s'),
            'stok_m' => $this->input->post('stok_m'),
            'stok_l' => $this->input->post('stok_l'),
            'stok_xl' => $this->input->post('stok_xl'),
            'stok_xxl' => $this->input->post('stok_xxl')
        ];

        // Handle upload gambar baru
        if (!empty($_FILES['gambar']['name'])) {
            $config['upload_path'] = './public/assets/upload/';
            $config['allowed_types'] = 'jpg|jpeg|png|gif|webp';
            $config['max_size'] = 2048; // 2MB
            $config['encrypt_name'] = TRUE;
            
            $this->load->library('upload', $config);
            
            if ($this->upload->do_upload('gambar')) {
                $upload_data = $this->upload->data();
                
                // Hapus gambar lama jika ada
                if (!empty($produk->gambar) && file_exists('./public/assets/upload/' . $produk->gambar)) {
                    unlink('./public/assets/upload/' . $produk->gambar);
                }
                
                $data['gambar'] = $upload_data['file_name'];
            }
        }

        $this->M_produk->update($id, $data);
        $this->session->set_flashdata('success', 'Produk berhasil diperbarui');
        redirect('produk');
    }

    public function hapus($id)
    {
        $produk = $this->M_produk->get_by_id($id);
        if (!$produk) {
            show_404();
        }

        // Hapus gambar jika ada
        if (!empty($produk->gambar) && file_exists('./public/assets/upload/' . $produk->gambar)) {
            unlink('./public/assets/upload/' . $produk->gambar);
        }

        $this->M_produk->delete($id);
        $this->session->set_flashdata('success', 'Produk berhasil dihapus');
        redirect('produk');
    }
}
