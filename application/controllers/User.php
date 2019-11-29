<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    //===========================================================================================================================
    public function index()
    {
        $data['name'] = 'Sign In';
        if($this->session->userdata('email')){
            redirect('Home');
        }
        
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        if($this->form_validation->run()==false)
        {
            $this->load->view('include/header_view', $data);
            $this->load->view('include/navigation_view', $data);
            $this->load->view('user_view', $data);
            $this->load->view('include/footer_view', $data);
        }else{
            $this->signIn();
        }
    }
    //===========================================================================================================================
    public function signIn()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');
        
        $user = $this->db->get_where('user', ['email'=>$email])->row_array();
        if($user){
            if($user['active']==1){
                if(password_verify($password, $user['password'])){
                    $data = [
                        'id' => $user['id'],
                        'email' => $user['email'],
                        'role_id' => $user['role_id'],
                    ];
                    $this->session->set_userdata($data);
                    redirect('Profile');
                }else{
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password Wrong!</div>');
                    redirect('User');
                }
            }else{
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">User not active !</div>');
                redirect('User');    
            }
        }else{
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Email not registred!</div>');
            redirect('User');
        }
    }
    //===========================================================================================================================
    public function signOut()
    {
        $this->session->sess_destroy();
        redirect('Home');
    }
}
