<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users extends CI_Controller {

    public function index()
    {
        $this->new_user();
    }

    public function all_users()
    {
        $user_model = new User(16);
        $users = $user_model->get()->all_to_array();
        $this->load->view('all_users', array('users' => $users));
    }

    public function new_user()
    {
        $this->load->view('new_user');
    }

    public function create_user()
    {
        $user = new User();
        $user->first_name = $this->input->post('first_name');
        $user->last_name = $this->input->post('last_name');
        $user->email= $this->input->post('email');
        $user->password = $this->input->post('password');
        $user->confirm_password = $this->input->post('confirm_password');

        if ($user->save())
        {
            $this->session->set_flashdata('success', "User successfully created");
            redirect('/users/all_users');
        }
        else
        {
            $this->session->set_flashdata('error', $user->error->all);
            redirect('/users/new_user');
        }
    }
    public function destroy_user($id)
    {
        $user = new User($id);
        $user->delete();
        redirect('/users/all_users');
    }
}
