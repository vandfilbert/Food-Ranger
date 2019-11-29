<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tenant extends CI_Controller
{
    //===========================================================================================================================
    public function index()
    {
        $data['name'] = 'Tenant';
        if ($this->session->userdata('email')) {
            redirect('Home');
        }
        $this->load->view('include/header_view', $data);
        $this->load->view('include/navigation_view', $data);
        $this->load->view('regis_tenant_view', $data);
        $this->load->view('include/footer_view', $data);
    }
    //===========================================================================================================================
    public function registenant()
    {
        $this->form_validation->set_rules('username', 'Username', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]', [
            'is_unique' => 'This email is already register !'
        ]);
        $this->form_validation->set_rules('fullname', 'Full Name', 'required|trim');
        $this->form_validation->set_rules('city', 'City', 'required|trim');
        $this->form_validation->set_rules('address', 'Address', 'required|trim');
        $this->form_validation->set_rules('role', 'Role', 'required|trim');
        $this->form_validation->set_rules('password', 'Personal Password', 'required|trim|min_length[6]|matches[copassword]', [
            'matches' => 'Please enter the correct password!',
            'min_length' => 'Password is to short!'
        ]);
        $this->form_validation->set_rules('copassword', 'Confirm Password', 'required|trim|min_length[6]|matches[password]', [
            'matches' => 'Please enter the correct password!',
            'min_length' => 'Password is to short!'
        ]);
        $this->form_validation->set_rules('type', 'Type', 'required|trim');

        if ($this->form_validation->run() == false) {
            $data['name'] = 'Tenant';
            $this->load->view('include/header_view', $data);
            $this->load->view('include/navigation_view', $data);
            $this->load->view('regis_tenant_view', $data);
            $this->load->view('include/footer_view', $data);
        } else {
            $data = [
                'username' => htmlspecialchars($this->input->post('username')),
                'fullname' => htmlspecialchars($this->input->post('fullname')),
                'city' => htmlspecialchars($this->input->post('city')),
                'address' => htmlspecialchars($this->input->post('address')),
                'email' => htmlspecialchars($this->input->post('email')),
                'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                'role_id' => htmlspecialchars($this->input->post('role')),
                'type_id' => htmlspecialchars($this->input->post('type')),
                'active' => 1,
                'description' => '',
                'picture' => 'defaultProf.png'
            ];

            $this->db->insert('user', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">You have succesfully registre !</div>');
            redirect('Tenant');
        }
    }
}
