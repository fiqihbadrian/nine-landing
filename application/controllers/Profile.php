<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profile extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        
        // Cek login
        if (!$this->session->userdata('logged_in')) {
            redirect('auth/login');
        }
    }

    public function index()
    {
        $id_user = $this->session->userdata('id_user');
        
        // Ambil data user dari database
        $data['user'] = $this->db
            ->where('id_user', $id_user)
            ->get('tb_user')
            ->row();

        $this->load->view('dashboard/v_header');
        $this->load->view('dashboard/v_navbar');
        $this->load->view('dashboard/v_profile', $data);
        $this->load->view('dashboard/v_footer');
    }

    public function update()
    {
        $id_user = $this->session->userdata('id_user');
        $password = $this->input->post('password');
        $konfirmasi = $this->input->post('konfirmasi_password');

        // Data yang akan diupdate
        $data = [
            'nama' => $this->input->post('nama'),
            'username' => $this->input->post('username')
        ];

        // Cek apakah password diubah
        $password_diubah = false;
        if (!empty($password)) {
            if ($password != $konfirmasi) {
                $this->session->set_flashdata('error', 'Konfirmasi password tidak sesuai!');
                redirect('profile');
                return;
            }
            $data['password'] = password_hash($password, PASSWORD_DEFAULT);
            $password_diubah = true;
        }

        // Update data user
        $this->db->where('id_user', $id_user);
        $this->db->update('tb_user', $data);

        // Jika password diubah, logout dan minta login ulang
        if ($password_diubah) {
            $this->session->sess_destroy();
            $this->session->set_flashdata('success', 'Password berhasil diubah, silakan login kembali.');
            redirect('auth/login');
            return;
        }

        // Update session jika nama diubah
        $this->session->set_userdata('nama', $data['nama']);

        $this->session->set_flashdata('success', 'Profil berhasil diperbarui.');
        redirect('profile');
    }
}
