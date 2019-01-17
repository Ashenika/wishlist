<?php
/**
 * Created by PhpStorm.
 * User: ACER
 * Date: 12/17/2018
 * Time: 12:23 PM
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class ItemListController extends CI_Controller {


    /**
     * ItemListController constructor.
     */
    public function __construct() {
        parent::__construct();
    }


    public function loginView(){
        $this->load->view('login_view');
    }

    public function registerView(){
        $this->load->view('register_view');
    }

    public function viewItemList(){

        $this->load->view('item_list_view');
    }

    public function viewWishlist(){
        $this->load->view('wishlist_view');
    }

}