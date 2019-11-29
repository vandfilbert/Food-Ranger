<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Register extends CI_Controller
{
    //===========================================================================================================================
    public function index()
    {
        $data['name'] = 'Volunteer';
        $this->load->view('include/header_view', $data);
        $this->load->view('include/navigation_view', $data);
        $this->load->view('voulenter_view', $data);
        $this->load->view('include/footer_view', $data);
    }
    //===========================================================================================================================
    public function addVolunteer()
    {
        $data['name'] = 'Volunteer';
        $this->form_validation->set_rules('fullname', 'Full Name', 'required|trim');
        $this->form_validation->set_rules('mail', 'Email', 'required|trim|valid_email|is_unique[volunteer.email]', [
            'is_unique' => 'This email is already register !'
        ]);

        $this->form_validation->set_rules('motivation', 'Motivation', 'required|trim|min_length[5]|max_length[250]');
        $this->form_validation->set_rules('gender', 'Gender', 'required|trim');
        $this->form_validation->set_rules('city', 'City', 'required|trim');
        $this->form_validation->set_rules('phone', 'Phone', 'required|trim');
        $this->form_validation->set_rules('address', 'Address', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('include/header_view', $data);
            $this->load->view('include/navigation_view', $data);
            $this->load->view('voulenter_view', $data);
            $this->load->view('include/footer_view', $data);
        } else {
            $data = [
                'name' => htmlspecialchars($this->input->post('fullname')),
                'gender' => htmlspecialchars($this->input->post('gender')),
                'city' => htmlspecialchars($this->input->post('city')),
                'address' => htmlspecialchars($this->input->post('address')),
                'phone' => htmlspecialchars($this->input->post('phone')),
                'email' => htmlspecialchars($this->input->post('mail')),
                'motivation' => htmlspecialchars($this->input->post('motivation'))
            ];

            $this->db->insert('volunteer', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">You have succesfully registre !</div>');
            redirect('Register');
        }
    }
    //===========================================================================================================================
}
    