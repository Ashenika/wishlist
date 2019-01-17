<?php

/**
 * Created by PhpStorm.
 * User: asheni
 * Date: 1/17/19
 * Time: 2:22 PM
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class AuthController extends CI_Controller{

    public function __construct(){
        parent::__construct();
       
        $this->load->library('session');
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->model('auth_user');

        $this->load->helper(array('form', 'url'));
    }

    public function login()
    {
        $this->load->view('login_view');
    }

    public function register(){
        $this->load->view('register_view');
    }



    public function authenticate()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        //$user = $this->auth_lib->login($username,$password);
        // $this->session->set_userdata('user_id', $user);

        if ($username == '' || $password == '') {
            $data['errmsg'] = 'Unable to login - please try again';
            $this->load->view('login_view',$data);
        } else {
            $this->ci->auth_user->login($username,$password);
            $this->load->view('item_list_view');
        }

    }

    public function registerUser(){
        $this->load->library('form_validation');
        // field name, error message, validation rules
        $this->form_validation->set_rules('name', 'Your Name', 'trim|required');
        $this->form_validation->set_rules('username', 'User Name', 'trim|required|min_length[4]');
        $this->form_validation->set_rules('email', 'Your Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[4]|max_length[32]');
        $this->form_validation->set_rules('cpassword', 'Password Confirmation', 'trim|required|matches[password]');

        if($this->form_validation->run() == FALSE) {
            $this->register();
        } else {
            // post values
            $name = $this->input->post('name');
            $username = $this->input->post('username');
            $email = $this->input->post('email');
            $password = $this->input->post('password');

            // insert values in database
            $this->user->createUser($name,$username,$email,$password);
            redirect('users/index');
        }

    }

}