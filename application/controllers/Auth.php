<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('User_model');
        $this->load->library('session');
        $this->load->helper(array('form', 'url'));
    }

    public function register() {
        if ($this->input->post()) {
            $data = array(
                'username' => $this->input->post('username'),
                'password' => password_hash($this->input->post('password'), PASSWORD_BCRYPT),
            );
            $this->User_model->insert_user($data);
            redirect('login');
        } else {
            $this->load->view('register');
        }
    }

    public function login() {
    //    $users =   $this->User_model->get_Users();
    //    print_r($users);
      
        if ($this->input->post()) {
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            $user = $this->User_model->get_user($username);

            if ($user && password_verify($password, $user->password)) {
                $this->session->set_userdata('user_id', $user->id);
                redirect('posts');
            } else {
                $this->session->set_flashdata('error', 'Invalid credentials');
                redirect('login');
            }
        } else {
            $this->load->view('login');
        }
    }

    public function logout() {
        $this->session->unset_userdata('user_id');
        $this->session->sess_destroy(); // Optional: Completely destroy the session

        // Set a flash message
        $this->session->set_flashdata('success', 'You have successfully logged out.');
        redirect('login');
    }
}
