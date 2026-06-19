<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{

    public function index()
    {
        $this->load->view('v_header');
        $this->load->view('v_navbar');
        $this->load->view('v_home');
        $this->load->view('v_footer');
    }
}
