<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Logins extends CI_Controller {
    
	public function login()
	{

        $data = $this->input->post();
        
        $user = new User();
        $user->email = $data['email'];
        $user->password = $data['password'];

        if ($user->login())
        {
            redirect('/users/all_users');
        }
        else
        {
            redirect('/users/new_user');
        }

	}
    public function logout()
    {

    }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */