<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Erorpage extends CI_Controller
{
    //===========================================================================================================================
    public function index()
    {
        $data['name'] = 'Page Not Found';
        $this->load->view('include/header_view', $data);
        $this->load->view('include/navigation_view', $data);
        $this->load->view('erorpage_view', $data);
        $this->load->view('include/footer_view', $data);
    }
    //===========================================================================================================================
}
