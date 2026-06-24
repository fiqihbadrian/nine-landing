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
        // Validasi input required
        if (!$this->input->post('nama_produk') || !$this->input->post('harga')) {
            $this->session->set_flashdata('error', 'Nama produk dan harga harus diisi');
            redirect('produk/tambah');
            return;
        }

        // Handle upload gambar
        $gambar_name = null;
        if (!empty($_FILES['gambar']['name'])) {
            $upload_path = FCPATH . 'public/assets/upload/';
            
            // Cek apakah folder exists dan writable
            if (!is_dir($upload_path)) {
                mkdir($upload_path, 0777, true);
            }
            
            $config['upload_path'] = $upload_path;
            $config['allowed_types'] = 'jpg|jpeg|png|gif|webp';
            $config['max_size'] = 10240; // 10MB
            $config['encrypt_name'] = TRUE;
            
            $this->load->library('upload', $config);
            
            if ($this->upload->do_upload('gambar')) {
                $upload_data = $this->upload->data();
                $gambar_name = $upload_data['file_name'];
            } else {
                $error = strip_tags($this->upload->display_errors());
                $this->session->set_flashdata('error', 'Upload gagal: ' . $error);
                redirect('produk/tambah');
                return;
            }
        }

        $stok_s = $this->input->post('stok_s') ? (int)$this->input->post('stok_s') : 0;
        $stok_m = $this->input->post('stok_m') ? (int)$this->input->post('stok_m') : 0;
        $stok_l = $this->input->post('stok_l') ? (int)$this->input->post('stok_l') : 0;
        $stok_xl = $this->input->post('stok_xl') ? (int)$this->input->post('stok_xl') : 0;
        $stok_xxl = $this->input->post('stok_xxl') ? (int)$this->input->post('stok_xxl') : 0;
        $stok_total = $this->input->post('stok') ? (int)$this->input->post('stok') : ($stok_s + $stok_m + $stok_l + $stok_xl + $stok_xxl);

        $data = [
            'nama_produk' => $this->input->post('nama_produk'),
            'id_kategori' => $this->input->post('id_kategori') ?: null,
            'harga' => $this->input->post('harga'),
            'stok' => $stok_total,
            'stok_s' => $stok_s,
            'stok_m' => $stok_m,
            'stok_l' => $stok_l,
            'stok_xl' => $stok_xl,
            'stok_xxl' => $stok_xxl,
            'gambar' => $gambar_name
        ];

        if ($this->M_produk->insert($data)) {
            $this->session->set_flashdata('success', 'Produk berhasil ditambahkan');
            redirect('produk');
        } else {
            $db_error = $this->db->error();
            $this->session->set_flashdata('error', 'Gagal menyimpan produk: ' . $db_error['message']);
            redirect('produk/tambah');
        }
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

        // Validasi input required
        if (!$this->input->post('nama_produk') || !$this->input->post('harga')) {
            $this->session->set_flashdata('error', 'Nama produk dan harga harus diisi');
            redirect('produk/edit/' . $id);
            return;
        }

        $stok_s = $this->input->post('stok_s') ? (int)$this->input->post('stok_s') : 0;
        $stok_m = $this->input->post('stok_m') ? (int)$this->input->post('stok_m') : 0;
        $stok_l = $this->input->post('stok_l') ? (int)$this->input->post('stok_l') : 0;
        $stok_xl = $this->input->post('stok_xl') ? (int)$this->input->post('stok_xl') : 0;
        $stok_xxl = $this->input->post('stok_xxl') ? (int)$this->input->post('stok_xxl') : 0;
        $stok_total = $this->input->post('stok') ? (int)$this->input->post('stok') : ($stok_s + $stok_m + $stok_l + $stok_xl + $stok_xxl);

        $data = [
            'nama_produk' => $this->input->post('nama_produk'),
            'id_kategori' => $this->input->post('id_kategori') ?: null,
            'harga' => $this->input->post('harga'),
            'stok' => $stok_total,
            'stok_s' => $stok_s,
            'stok_m' => $stok_m,
            'stok_l' => $stok_l,
            'stok_xl' => $stok_xl,
            'stok_xxl' => $stok_xxl
        ];

        // Handle upload gambar baru
        if (!empty($_FILES['gambar']['name'])) {
            $upload_path = FCPATH . 'public/assets/upload/';
            
            // Cek apakah folder exists dan writable
            if (!is_dir($upload_path)) {
                mkdir($upload_path, 0777, true);
            }
            
            $config['upload_path'] = $upload_path;
            $config['allowed_types'] = 'jpg|jpeg|png|gif|webp';
            $config['max_size'] = 10240; // 10MB
            $config['encrypt_name'] = TRUE;
            
            $this->load->library('upload', $config);
            
            if ($this->upload->do_upload('gambar')) {
                $upload_data = $this->upload->data();
                
                // Hapus gambar lama jika ada
                if (!empty($produk->gambar) && file_exists($upload_path . $produk->gambar)) {
                    unlink($upload_path . $produk->gambar);
                }
                
                $data['gambar'] = $upload_data['file_name'];
            } else {
                $error = strip_tags($this->upload->display_errors());
                $this->session->set_flashdata('error', 'Upload gagal: ' . $error);
                redirect('produk/edit/' . $id);
                return;
            }
        }

        if ($this->M_produk->update($id, $data)) {
            $this->session->set_flashdata('success', 'Produk berhasil diperbarui');
            redirect('produk');
        } else {
            $this->session->set_flashdata('error', 'Gagal memperbarui produk: ' . $this->db->error()['message']);
            redirect('produk/edit/' . $id);
        }
    }

    public function test_insert()
    {
        $data = [
            'nama_produk' => 'Test dari Code',
            'id_kategori' => 1,
            'harga' => 99999,
            'stok' => 99,
            'stok_s' => 20,
            'stok_m' => 20,
            'stok_l' => 20,
            'stok_xl' => 20,
            'stok_xxl' => 19,
            'gambar' => null
        ];
        
        $result = $this->M_produk->insert($data);
        
        if ($result) {
            echo "SUCCESS: Insert berhasil! ID: " . $this->db->insert_id();
        } else {
            echo "ERROR: " . print_r($this->db->error(), true);
        }
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
