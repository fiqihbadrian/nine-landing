<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_auth');
    }

    public function login()
    {
        // Jika sudah login, redirect ke dashboard
        if ($this->session->userdata('logged_in')) {
            redirect('dashboard');
        }

        $this->load->view('auth/v_login');
    }

    public function register()
    {
        // Jika sudah login, redirect ke dashboard
        if ($this->session->userdata('logged_in')) {
            redirect('dashboard');
        }

        $this->load->view('auth/v_register');
    }

    public function simpan_register()
    {
        $nama = $this->input->post('nama');
        $username = $this->input->post('username');
        $password = password_hash($this->input->post('password'), PASSWORD_DEFAULT);

        $data = [
            'nama' => $nama,
            'username' => $username,
            'password' => $password,
            'role' => 'admin' // Default role admin
        ];

        $this->M_auth->insert_user($data);

        $this->session->set_flashdata('success', 'Registrasi berhasil! Silakan login.');
        redirect('auth/login');
    }

    public function cek_login()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $user = $this->M_auth->cek_login($username);

        if ($user) {
            // Verifikasi password
            if (password_verify($password, $user->password)) {
                $data_session = [
                    'id_user' => $user->id_user,
                    'nama' => $user->nama,
                    'username' => $user->username,
                    'role' => $user->role,
                    'logged_in' => TRUE
                ];
                
                $this->session->set_userdata($data_session);
                redirect('dashboard');
            } else {
                $this->session->set_flashdata('error', 'Password salah!');
                redirect('auth/login');
            }
        } else {
            $this->session->set_flashdata('error', 'Username tidak ditemukan!');
            redirect('auth/login');
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('auth/login');
    }
}
