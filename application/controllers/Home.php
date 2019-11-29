<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller
{
	//===========================================================================================================================
	public function index()
	{
		$data['name'] = 'Home';
		$this->load->view('include/header_view', $data);
		$this->load->view('include/navigation_view', $data);
		$this->load->view('home_view', $data);
		$this->load->view('include/footer_view', $data);
	}
	//===========================================================================================================================
}