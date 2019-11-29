<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profile extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        check();
    }
    //===========================================================================================================================
    public function index()
    {
        $data['name'] = 'Profile';
        $this->load->model('Manage_model');
        $data['tenant'] = $this->Manage_model->getUserbyid($this->session->userdata('id'));
        $this->load->view('include/header_view', $data);
        $this->load->view('include/navigation_view', $data);
        $this->load->view('profile_view', $data);
        $this->load->view('include/footer_view', $data);
    }
    //===========================================================================================================================
    public function editProfile()
    {
        $data['name'] = 'Profile';
        $this->load->model('Manage_model');
        $data['tenant'] = $this->Manage_model->getUserbyid($this->session->userdata('id'));
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->form_validation->set_rules('name', 'Fullname', 'required|trim');
        $this->form_validation->set_rules('city', 'City', 'required|trim');
        $this->form_validation->set_rules('address', 'Address', 'required|trim');
        $this->form_validation->set_rules('motto', 'Motto', 'required|trim');

        if($this->form_validation->run()==false){
            $this->load->view('include/header_view', $data);
            $this->load->view('include/navigation_view', $data);
            $this->load->view('profile_view', $data);
            $this->load->view('include/footer_view', $data);
        }else{
            $email = $this->input->post('email');
            $name = $this->input->post('name');
            $city = $this->input->post('city');
            $address = $this->input->post('address');
            $motto = $this->input->post('motto');
            
            $upload_image = $_FILES['image']['name'];

            if($upload_image){
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['max_size']     = '3072';
                $config['upload_path'] = './public/profile/';

                $this->load->library('upload',$config);

                if($this->upload->do_upload('image')){
                    $old_image = $data['user']['image'];
                    if($old_image != 'defaultProf.png'){
                        unlink('FCPATH', 'public/profile/'.$old_image);
                    }

                    $new_image = $this->upload->data('file_name');
                    $this->db->set('picture', $new_image);
                }else{
                    echo $this->upload->display_errors();
                }
            }

            $this->db->set('fullname', $name);
            $this->db->set('city', $city);
            $this->db->set('address', $address);
            $this->db->set('motto', $motto);
            $this->db->where('email', $email);
            $this->db->update('user');

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Profile Updated</div>');
            redirect('Profile');
        }
    }
    //===========================================================================================================================
    public function addEvent()
    {
        $data['name'] = 'Add Event';
        $this->load->model('Manage_model');
        $data['tenant'] = $this->Manage_model->getUserbyid($this->session->userdata('id'));
        $this->form_validation->set_rules('event', 'Event Name', 'required|trim');
        $this->form_validation->set_rules('description', 'Description', 'required|trim|min_length[5]|max_length[250]');
        $this->form_validation->set_rules('startdate', 'Start Event', 'required|trim');
        $this->form_validation->set_rules('enddate', 'End Date', 'required|trim');
        $this->form_validation->set_rules('openregis', 'Open Regis', 'required|trim');
        $this->form_validation->set_rules('closeregis', 'Close Regis', 'required|trim');
        $this->form_validation->set_rules('timestart', 'Time Start', 'required|trim');
        $this->form_validation->set_rules('timeend', 'Time End', 'required|trim');
        $this->form_validation->set_rules('picname', 'PIC Name', 'required|trim');
        $this->form_validation->set_rules('picnumber', 'PIC Number', 'required|trim');
        
        $startdate = date('Y-m-d', strtotime($this->input->post('startdate')));
        $enddate = date('Y-m-d', strtotime($this->input->post('enddate')));
        $openregis = date('Y-m-d', strtotime($this->input->post('openregis')));
        $closeregis = date('Y-m-d', strtotime($this->input->post('closeregis')));
        $timestart = date('H:i:s', strtotime($this->input->post('timestart')));
        $timeend = date('H:i:s', strtotime($this->input->post('timeend')));
        $user_id = $this->input->post('userid');

        if ($this->form_validation->run() == false) {
            $this->load->view('include/header_view', $data);
            $this->load->view('include/navigation_view', $data);
            $this->load->view('Profile_view', $data);
            $this->load->view('include/footer_view', $data);
        } else {
            $data = [
                'name_event' => htmlspecialchars($this->input->post('event')),
                'description_event' => htmlspecialchars($this->input->post('description')),
                'open_start' => htmlspecialchars($openregis),
                'open_end' => htmlspecialchars($closeregis),
                'date_event' => htmlspecialchars($startdate),
                'end_event' => htmlspecialchars($enddate),
                'time_start' => htmlspecialchars($timestart),
                'time_end' => htmlspecialchars($timeend),
                'pic' => htmlspecialchars($this->input->post('picname')),
                'user_id' => htmlspecialchars($user_id),
                'phone' => htmlspecialchars($this->input->post('picnumber')),
            ];

            $this->db->insert('event', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">You have succesfully add event !</div>');
            redirect('Profile');
        }
    }
    //===========================================================================================================================
    public function editView()
    {
        $id_event = $this->uri->segment(3);
        $data['name'] = 'Edit Event';
        $this->load->model('Manage_model');
        $data['event'] = $this->Manage_model->getAllEvent($this->session->userdata('id'), $id_event);
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('include/header_view', $data);
        $this->load->view('include/navigation_view', $data);
        $this->load->view('editEvent_view', $data);
        $this->load->view('include/footer_view', $data);
    }
    //===========================================================================================================================
    public function editEvent()
    {
        $data['name'] = 'Edit Event';
        $id_event = $this->input->post('idevent');
        $this->load->model('Manage_model');
        $data['event'] = $this->Manage_model->getAllEvent($this->session->userdata('id'), $id_event);
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('editevent', 'Event Name', 'required|trim');
        $this->form_validation->set_rules('editdescription', 'Description', 'required|trim|min_length[5]|max_length[250]');
        $this->form_validation->set_rules('editstartdate', 'Start Event', 'required|trim');
        $this->form_validation->set_rules('editenddate', 'End Date', 'required|trim');
        $this->form_validation->set_rules('editopenregis', 'Open Regis', 'required|trim');
        $this->form_validation->set_rules('editcloseregis', 'Close Regis', 'required|trim');
        $this->form_validation->set_rules('edittimestart', 'Time Start', 'required|trim');
        $this->form_validation->set_rules('edittimeend', 'Time End', 'required|trim');
        $this->form_validation->set_rules('editpicname', 'PIC Name', 'required|trim');
        $this->form_validation->set_rules('editpicnumber', 'PIC Number', 'required|trim');

        $startdate = date('Y-m-d', strtotime($this->input->post('editstartdate')));
        $enddate = date('Y-m-d', strtotime($this->input->post('editenddate')));
        $openregis = date('Y-m-d', strtotime($this->input->post('editopenregis')));
        $closeregis = date('Y-m-d', strtotime($this->input->post('editcloseregis')));
        $timestart = date('H:i:s', strtotime($this->input->post('edittimestart')));
        $timeend = date('H:i:s', strtotime($this->input->post('edittimeend')));

        $name_event = $this->input->post('editevent');
        $description_event = $this->input->post('editdescription');
        $pic = $this->input->post('editpicname');
        $phone = $this->input->post('editpicnumber');
        
        if($this->form_validation->run()==false){
            $this->load->view('include/header_view', $data);
            $this->load->view('include/navigation_view', $data);
            $this->load->view('editEvent_view', $data);
            $this->load->view('include/footer_view', $data);
        }else{
            $this->db->set('name_event', $name_event);
            $this->db->set('description_event', $description_event);
            $this->db->set('open_start', $openregis);
            $this->db->set('open_end', $closeregis);
            $this->db->set('date_event', $startdate);
            $this->db->set('end_event', $enddate);
            $this->db->set('time_start', $timestart);
            $this->db->set('time_end', $timeend);
            $this->db->set('pic', $pic);
            $this->db->set('phone', $phone);
            $this->db->where('event_id', $id_event);
            $this->db->update('event');

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Event Updated!</div>');
            redirect('Profile');
        }
    }
    //===========================================================================================================================
    public function deleteEvent($id){
        $this->load->model('Manage_model');
        if(!($this->Manage_model->deleteUser($id))){
            $this->session->set_flashdata('message', '<div class="alert alert-warning" role="alert">You have delete your event !</div>');
        }else{
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Delete Faild !</div>');
        }
        redirect('Profile');      
    }
    //===========================================================================================================================
}
