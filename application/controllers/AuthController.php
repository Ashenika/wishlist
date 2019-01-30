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

    public function loginView()
    {
        $this->load->view('login_view');
    }

    public function register(){
        $this->load->view('register_view');
    }

    public function login(){

        $username = $this->input->post('email');
        $password = $this->input->post('password');

        $password = md5($password);

        $result = $this->auth_user->auth($username,$password);
       // print_r(json_encode($result));
        if($result=='empty'){
            echo 'Not a registered User';
        } else{
            $_SESSION['userid']=$result['0']->id;
            $_SESSION['username']=$result['0']->username;

            redirect('/ItemListController/viewAddedProducts');
        }
    }



//    public function authenticate()
//    {
//        $username = $this->input->post('username');
//        $password = $this->input->post('password');
//        //$user = $this->auth_lib->login($username,$password);
//        // $this->session->set_userdata('user_id', $user);
//        $message = null;
//
//        if ($username == '' || $password == '') {
//            $data['errmsg'] = 'Unable to login - please try again';
//            $this->load->view('login_view',$data);
//            $message = "Invalid";
//        } else {
//            $this->auth_user->login($username,$password);
//            print_r("fibvnf");
//            $message = "Success";
//            redirect('/ItemListController/viewItemList');
//        }
//        return $message;
//    }

    public function registerUser(){
        $this->load->library('form_validation');
        // field name, error message, validation rules
        $this->form_validation->set_rules('name', 'Your Name', 'trim|required');
        $this->form_validation->set_rules('username', 'User Name', 'trim|required|min_length[4]');
        $this->form_validation->set_rules('email', 'Your Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('wishlistName', 'Wishlist Name', 'trim|required');
        $this->form_validation->set_rules('wishlistDesc', 'Wishlist Description', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[4]|max_length[32]');
        $this->form_validation->set_rules('cpassword', 'Password Confirmation', 'trim|required|matches[password]');

        //If validation is FALSE
        if($this->form_validation->run() == FALSE) {
            $this->load->view('register_view');
        } else {
            // post values
            $name = $this->input->post('name');
            $username = $this->input->post('username');
            $email = $this->input->post('email');
            $wish_name = $this->input->post('wishlistName');
            $wish_desc = $this->input->post('wishlistDesc');
            $password = $this->input->post('password');

            // insert values in database
            $this->auth_user->createUser($name,$username,$email,$password,$wish_name,$wish_desc);

            //$this->load->view('login_view');
           redirect('AuthController/loginView');
        }

    }

    function logout()
    {
        $user_data = $this->session->all_userdata();
        foreach ($user_data as $key => $value) {
            if ($key != 'session_id' && $key != 'ip_address' && $key != 'user_agent' && $key != 'last_activity') {
                $this->session->unset_userdata($key);
            }
        }
        $this->session->sess_destroy();
        redirect('AuthController/loginView');
    }

}