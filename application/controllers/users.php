<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users extends CI_Controller {

	public function index()
	{
        $this->new_user();
	}
    public function all_users()
    {
        $user_model = new User();
        $users = $user_model->get()->all_to_array();
        $this->load->view('all_users', array('users' => $users));
    }
    public function new_user()
    {
        $this->load->view('new_user');
    }
    public function create_user()
    {
        $data = $this->input->post();
        //once register button is clicked
        
        $user = new User();
        $user->first_name = $data['first_name'];
        $user->last_name = $data['last_name'];
        $user->email= $data['email'];
        $user->password = $data['password'];
        $user->confirm_password = $data['confirm_password'];
        if ($user->save())
        {   
            $this->session->set_flashdata('success', "User successfully created");
            redirect('/users/all_users');
        }
        else
        {
            $user->error->first_name;
            $user->error->last_name;
            $user->error->email_name;
            $user->error->password;
            $user->error->confirm_password;

            $this->session->set_flashdata('error', $user->error->all);
            redirect('/users/new_user');
        }
    }
    public function destroy_user($id)
    {
        $this_user = new User($id);
        $this_user->delete();
        redirect('/users/all_users');
    }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */