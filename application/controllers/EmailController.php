<?php
/**
 * Created by PhpStorm.
 * User: ACER
 * Date: 1/25/2019
 * Time: 11:42 AM
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class EmailController extends CI_Controller {


    /**
     * EmailController constructor.
     */
    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->library('pagination');
        $this->load->library('encrypt');
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->model('product');
        $this->load->model('auth_user');
        $this->load->model('wishlist');
        $this->load->helper(array('form', 'url'));

    }

    public function sendMail($userId,$wishId)
    {
        $config = Array(
            'protocol' => 'smtp',
            'smtp_host' => 'smtp.elasticemail.com',
            'smtp_port' => 465,
            'smtp_user' => 'ash7perera@gmail.com', // change it to yours
            'smtp_pass' => '720485e5-0c1c-4478-bea9-ba9bbdf11805', // change it to yours
            'mailtype' => 'html',
            'charset' => 'iso-8859-1',
            'wordwrap' => TRUE
        );

        $data['userId'] = $userId;
        $data['wishId'] = $wishId;
        $data['details'] = $this->product->getAddedProducts($userId,$wishId);
       // echo json_encode($data);

        $message = $this->load->view('email_view',$data,true);
        $email = $this->input->post('email');

        $userEmail = $this->wishlist->getUserEmail($userId);


        $this->load->library('email');
        $this->email->initialize($config);
        $this->email->set_newline("\r\n");
        $this->email->from('ash7perera@gmail.com'); // change it to yours
        $this->email->to($email);// change it to yours
        $this->email->subject('Wishlist');
        $this->email->message($message);
        if ($this->email->send()) {
            echo 'Email sent.';
             redirect('/ItemListController/viewAddedProducts');

        } else {
            show_error($this->email->print_debugger());
        }
    }

//    public function email($userId,$wishId){
//
//        $data['userId'] = $userId;
//        $data['wishId'] = $wishId;
//
//        // echo json_encode($data);
//        $this->load->view('email_view',$data);
//    }

    public function viewShared($userId,$wishId){

        $data['wishlist'] = $this->wishlist->getUserWishlist($userId);
        $data['added_products'] = $this->product->getAddedProducts($userId);
       // echo json_encode($data);
        $this->load->view('shared_wishlist_view',$data);
    }

}