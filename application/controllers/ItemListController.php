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
        $this->load->library('session');
        $this->load->library('pagination');
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->model('product');
        $this->load->model('auth_user');
        $this->load->model('wishlist');
        $this->load->helper(array('form', 'url'));
    }

    //Added Products (WISHLIST VIEW)
    public function viewAddedProducts(){
        $data['wishlist'] = $this->wishlist->getUserWishlist($_SESSION['userid']);
        $data['added_products'] = $this->product->getAddedProducts($_SESSION['userid']);
        $this->load->view('added_products_view',$data);
    }

    //ADD ITEMS TO WISHLIST (Cart)
    public function testWishlist(){
        $data['wishlist'] = $this->wishlist->getUserWishlist($_SESSION['userid']);
        $this->load->view('testWish',$data);
    }

//    public function viewWishlist($wishlist_id){
//        $data = $this->wishlist->getWishlist($_SESSION['userid'],$wishlist_id);
//      //echo json_encode($data['wishlist']);
//        $this->load->view('wishlist_view',$data);
//    }

//    public function index(){
//
//        $data['wishlist'] = $this->wishlist->getUserWishlist($_SESSION['userid']);
//        $data['products'] = $this->wishlist->getAllUserWishlistProducts($_SESSION['userid']);
//        $data['wishlists'] = $this->wishlist->getAllUserWishlist($_SESSION['userid']);
//        $data['wishlist_id'] =$this->wishlist->getCreatedWishlistID($_SESSION['userid']);
//        //print_r(json_encode($data['products'])) ;
//        // echo json_encode($data['wishlists']);
//        $this->load->view('item_list_view',$data);
//    }

    //Return JSON
    public function viewItemList(){
        $method = $_SERVER['REQUEST_METHOD'];
        $response['status'] = 200;
        if($method != 'GET'){
            json_output(400,array('status' => 400,'message' => 'Bad request.'));
        } else {
            $data = $this->product->allProducts();
            json_output($response['status'],$data);
        }
        // $this->load->view('item_list_view');
    }
}