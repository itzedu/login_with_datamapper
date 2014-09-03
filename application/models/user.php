<?php
class User extends DataMapper
{
    var $has_many = array('record');
    var $validation = array(
        'first_name' => array(
            'label' => 'First Name',
            'rules' => array('required', 'trim', 'alpha')
            ),
        'last_name' => array(
            'label' => 'Last Name',
            'rules' => array('required', 'trim', 'alpha')
            ),
        'password' => array(
            'label' => 'Password',
            'rules' => array('required','min_length' => 6, 'encrypt')
            ),
        'confirm_password' => array(
            'label' => 'Confirm Password',
            'rules' => array('required', 'encrypt', 'matches' => 'password')
            ),
        'email' => array(
            'label' => 'Email',
            'rules' => array('required','trim', 'unique','valid_email')
            )
        );

    function _encrypt($field)
    {
        if (!empty($this->{$field}))
        {
            if (empty($this->salt))
            {
                $this->salt = md5(uniqid(rand(), true));
            }
            $this->{$field} = sha1($this->salt . $this->{$field});
        }
    }

    function login()
    {
        $u = new User();
        $u->where('email', $this->email)->get();
        $this->salt = $u->salt;
        $this->validate()->get();
        if (empty($this->id))
        {
            return FALSE;
        }
        else
        {
            return TRUE;
        }
    }
}
