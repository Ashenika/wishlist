<?php
/**
 * Created by PhpStorm.
 * User: ACER
 * Date: 12/17/2018
 * Time: 12:23 PM
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class WishlistController extends CI_Controller {

    /**
     * ItemListController constructor.
     */
    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->library('pagination');
        $this->load->library('cart');
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->model('product');
        $this->load->model('wishlist');
        $this->load->helper(array('form', 'url'));
    }


    function add()
    {
        // Set array for send data.
        $ss = $this->wishlist->getProductForWishlist($this->input->post('id'));

        $insert_data = array(
            'id'    => $this->input->post('id'),
            'qty'   => 1,
            'products' => $ss
        );
        // This function add items into cart.
        $this->cart->insert($insert_data);
        echo $fefe = count($this->cart->contents());
       // echo json_encode($insert_data);
        // This will show insert data in cart.
    }

    public function openWishlist()
    {
        $data['wishlist']  = $this->cart->contents();
        $this->load->view("wishlist_view", $data);
    }

    public function createWishlist(){
        $this->load->library('form_validation');

            // post values
            $wishlistName  = $this->input->post('wishlistName');
            $wishlistDesc  = $this->input->post('wishlistDesc');
            $userId        = $this->input->post('userId');

            $product_title  = $this->input->post('title');
            $quantity       = $this->input->post('quantity');
            $price          = $this->input->post('price');
            $product_id     = $this->input->post('product_id');

            $this->wishlist->create($userId,$product_title,$quantity,$price,$product_id,$wishlistName,$wishlistDesc);



            redirect('ItemListController/index');
    }

    //************
    public function saveToWishlist(){
        $this->load->library('form_validation');

        $userId        = $this->input->post('userId');

        $product_title  = $this->input->post('title');
        $quantity       = $this->input->post('quantity');
        $price          = $this->input->post('price');
        $product_id     = $this->input->post('product_id');
        $total          = $this->input->post('tot');


        $this->wishlist->saveWishlist($userId,$product_title,$quantity,$price,$product_id,$total);

        redirect('ItemListController/viewAddedProducts');
    }

    public function editWishlist(){
        $data['wishlist'] = $this->wishlist->getUserWishlist($_SESSION['userid']);
        $data['added_products'] = $this->product->getAddedProducts($_SESSION['userid']);

        $this->load->view('edit_wishlist_view',$data);
    }

    public function edit(){

        $userId        = $this->input->post('uid');

        $wishlistName   = $this->input->post('wishlist_name');
        $quantity       = $this->input->post('qty');
        $price          = $this->input->post('price');
        $total          = $this->input->post('tot');
        $product_id     = $this->input->post('product_id');

        $this->wishlist->updateWishlist($userId,$wishlistName,$quantity,$price,$product_id,$total);

        redirect('ItemListController/viewAddedProducts');

    }

    public function removeItem($added_id){
        $this->wishlist->remove($added_id);

        redirect('WishlistController/editWishlist');
    }



}