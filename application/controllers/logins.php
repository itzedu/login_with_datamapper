<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Logins extends CI_Controller {

    public function login()
    {
        $user = new User();
        $user->email = $this->input->post('email');
        $user->password = $this->input->post('password');

        if ($user->login())
        {   
            $user_id = $this->session->userdata('id');

            $record = new Record();
            $record->check_in = date('Y-m-d H:i:s');
            $record->user_id = $user_id;
            $record->save();
            redirect('/users/all_users');
        }
        else
        {   
            $this->session->set_flashdata('error', array("Invalid Email or Password"));
            redirect('/users/new_user');
        }
    }
    public function logout()
    {

    }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
