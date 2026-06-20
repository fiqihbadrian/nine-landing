<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Preorder extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        
        // Cek login
        if (!$this->session->userdata('logged_in')) {
            redirect('auth/login');
        }
        
        $this->load->model('M_preorder');
        $this->load->library('session');
    }

    public function index()
    {
        $data['preorder'] = $this->M_preorder->get_all();
        $data['latest_produk'] = []; // Dummy untuk sidebar
        
        $this->load->view('dashboard/v_header');
        $this->load->view('dashboard/v_navbar');
        $this->load->view('dashboard/v_preorder', $data);
        $this->load->view('dashboard/v_footer');
    }

    public function detail($id)
    {
        $data['preorder'] = $this->M_preorder->get_by_id($id);
        if (!$data['preorder']) {
            show_404();
        }
        
        $data['latest_produk'] = [];
        
        $this->load->view('dashboard/v_header');
        $this->load->view('dashboard/v_navbar');
        $this->load->view('dashboard/v_detail_preorder', $data);
        $this->load->view('dashboard/v_footer');
    }

    public function update_status($id)
    {
        $preorder = $this->M_preorder->get_by_id($id);
        if (!$preorder) {
            show_404();
        }

        $data = [
            'status' => $this->input->post('status')
        ];

        $this->M_preorder->update($id, $data);
        $this->session->set_flashdata('success', 'Status preorder berhasil diperbarui');
        redirect('preorder');
    }

    public function hapus($id)
    {
        $preorder = $this->M_preorder->get_by_id($id);
        if (!$preorder) {
            show_404();
        }

        $this->M_preorder->delete($id);
        $this->session->set_flashdata('success', 'Preorder berhasil dihapus');
        redirect('preorder');
    }
}
