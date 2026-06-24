<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
    public function index()
    {
        // Load produk untuk form preorder
        $this->load->model('M_produk');
        $data['produk_list'] = $this->M_produk->get_all();
        
        // Load landing page views
        $this->load->view('v_header');
        $this->load->view('v_navbar');
        $this->load->view('v_hero');
        $this->load->view('v_about');
        $this->load->view('v_product');
        $this->load->view('v_form', $data);
        $this->load->view('v_footer');
    }

    public function submit_preorder()
    {
        $this->load->model('M_preorder');
        $this->load->model('M_produk');

        $id_produk = $this->input->post('id_produk');
        $jumlah = $this->input->post('jumlah');
        $ukuran = $this->input->post('ukuran');

        // Validasi produk
        $produk = $this->M_produk->get_by_id($id_produk);
        if (!$produk) {
            $this->session->set_flashdata('error', 'Produk tidak ditemukan.');
            redirect('/');
            return;
        }

        // Validasi stok sesuai ukuran
        $stok_ukuran = 0;
        $field_stok = '';
        switch(strtolower($ukuran)) {
            case 's':
                $stok_ukuran = $produk->stok_s;
                $field_stok = 'stok_s';
                break;
            case 'm':
                $stok_ukuran = $produk->stok_m;
                $field_stok = 'stok_m';
                break;
            case 'l':
                $stok_ukuran = $produk->stok_l;
                $field_stok = 'stok_l';
                break;
            case 'xl':
                $stok_ukuran = $produk->stok_xl;
                $field_stok = 'stok_xl';
                break;
            case 'xxl':
                $stok_ukuran = $produk->stok_xxl;
                $field_stok = 'stok_xxl';
                break;
        }

        if ($stok_ukuran < $jumlah) {
            $this->session->set_flashdata('error', 'Stok ukuran ' . strtoupper($ukuran) . ' tidak mencukupi! Stok tersedia: ' . $stok_ukuran . ' pcs');
            redirect('/');
            return;
        }

        // Data preorder
        $data = [
            'nama' => $this->input->post('nama'),
            'whatsapp' => $this->input->post('whatsapp'),
            'email' => $this->input->post('email'),
            'produk' => $produk->nama_produk,
            'id_produk' => $id_produk,
            'jumlah' => $jumlah,
            'ukuran' => $ukuran,
            'alamat' => $this->input->post('alamat'),
            'catatan' => $this->input->post('catatan'),
            'status' => 'pending'
        ];

        // Simpan preorder
        if ($this->M_preorder->insert($data)) {
            // Kurangi stok produk sesuai ukuran
            $stok_baru_ukuran = $stok_ukuran - $jumlah;
            $stok_total_baru = $produk->stok - $jumlah;
            
            $update_data = [
                $field_stok => $stok_baru_ukuran,
                'stok' => $stok_total_baru
            ];
            
            $this->M_produk->update($id_produk, $update_data);
            
            $this->session->set_flashdata('success', 'Pre-order berhasil dikirim! Kami akan segera menghubungi Anda.');
        } else {
            $this->session->set_flashdata('error', 'Gagal mengirim pre-order. Silakan coba lagi.');
        }

        redirect('/');
    }
}
