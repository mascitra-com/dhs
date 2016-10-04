<?php
/**
 * Rizki Herdatullah
 * Web Developer, Front-End Designer, and Project Manager
 */

/**
 * Rizki Herdatullah
 * Web Developer, Front-End Designer, and Project Manager
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model(array('user_model', 'ion_auth_model'));
        $this->lang->load('auth');
    }

    public function logout()
    {
        $this->ion_auth->logout();
        redirect('users/login');
    }

    /**
     *  Login a user and redirect him to questions
     */
    public function login()
    {
        // redirect if already logged in
        if ($this->ion_auth->logged_in() == TRUE){
            redirect('katalog');
        }

        // Validate the form
        $this->form_validation->set_rules($this->user_model->validation);
        if ($this->form_validation->run() == TRUE) {
            // Try to login
            if ($this->ion_auth_model->login($this->input->post('identity'), $this->input->post('password'), $this->input->post('remember'))){
                redirect('katalog');
            } else {
                $this->data['message'] = 'We could not log you in';
            }
        }

        // Tampilan Login
        $this->data['title'] = 'Login';
        $this->data['content'] = 'auth/login';
        $this->data['message'] = '';
        $this->init();
    }

    public function register()
    {

    }
}
