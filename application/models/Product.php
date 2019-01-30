<?php
/**
 * Created by PhpStorm.
 * User: ACER
 * Date: 1/20/2019
 * Time: 1:22 PM
 */

class Product extends CI_Model {

    public function __construct(){
        parent::__construct();
        $this->load->database();
    }

    public function allProducts()
    {
        return $this->db->select('*')
            ->from('products')
            ->join('category as cat', 'cat.id = products.category_id','left')
            ->join('product_image as image', 'products.id = image.product_id','left')
            ->get()
            ->result();
    }

    public function getAddedProducts($uid)
    {
        return $this->db->select('prd.title as product_title, prd.description as product_desc,prd.price as product_price,prd.priority,prd.created_at as product_created_at,
ap.id as added_id,ap.product_id as added_product_id,ap.created_wishlist_id,ap.user_id as added_product_user_id,ap.quantity as added_product_qty,ap.created_at as added_product_created_at,
wish.user_id as wish_userId,wish.wishlist_name as wish_name,wish.description as wish_desc,wish.created_at as wish_created_at,
img.file_path')
            ->from('added_products as ap')
            ->join('products as prd', 'prd.id = ap.product_id', 'left')
            ->join('wishlist as wish', 'wish.id = ap.created_wishlist_id', 'left')
            ->join('product_image as img', 'prd.id = img.product_id', 'left')
            ->where('ap.user_id', $uid)
            ->order_by('ap.created_at','desc')
            ->order_by('prd.priority','desc')
            ->get()
            ->result();
    }
}