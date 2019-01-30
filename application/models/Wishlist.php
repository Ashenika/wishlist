<?php
/**
 * Created by PhpStorm.
 * User: ACER
 * Date: 1/20/2019
 * Time: 6:38 PM
 */

class Wishlist  extends CI_Model {

    public function __construct(){
        parent::__construct();
        $this->load->database();
    }

    public function create($userId,$product_title,$quantity,$price,$product_id,$wishlistName,$wishlistDesc){

        $aa = "";
        $bb = 0;
        $cc = 0;

        $wishlistId =0;
        $wishlist = $this->wishlist->getUserWishlist($userId);
            foreach ($wishlist as $row) {
                $wishlistId = $row->id;
            }


        $wishlist = array(
            'user_id'               => $userId,
            'wishlist_id'           => $wishlistId,
            'created_wishlist_name' => $wishlistName,
            'wishlist_desc'         => $wishlistDesc,
            'created_at'            => date("YmdHis")
        );
        $user = $this->db->insert('created_wishlists', $wishlist);

        $product =array(
            'product_id' => $product_id,
        );

//        foreach ($product_title as $val){
//            $aa = $val;
//        }
//
        foreach ($quantity as $val){
            $bb = $val;
        }
//        foreach ($price as $val){
//            $cc = $val;
//        }

        $prd = array();

        foreach ($product['product_id'] as $val) {
          //  print_r($products); foreach ($products['product_id'] as $val)
            //print_r($product[$i]);
            $products = array(
                'product_id'         => $val,
                'user_id'            => $userId,
                'product_title'      => null,
                'price'              => null,
                'quantity'           => $bb,
                'created_wishlist_id'=> $this->db->insert_id(),
                'created_at'         => date("YmdHis")
            );
            $prd[] = $products;

        }
        $this->db->insert_batch('added_products',$prd);





        return $this->db->insert_id();

    }

    public function getUserWishlist($id){
        return $this->db->select('*')
            ->from('wishlist')
            ->join('user as u', 'u.id = wishlist.user_id','left')
            ->where('wishlist.user_id',$id)
            ->get()
            ->result();

    }

    public function getCreatedWishlistID($id){
        return $this->db->select('created_wishlists.id')
            ->from('created_wishlists')
            ->join('wishlist as wish', 'wish.id = created_wishlists.wishlist_id','left')
            ->join('user as u', 'u.id = wish.user_id','left')
            ->where('wish.user_id',$id)
            ->get()
            ->result();
    }

    public function getAllUserWishlistProducts($id){
        return $this->db->select('*')
            ->from('products as p')
            ->join ('added_products as ap','p.id = ap.product_id','right')
            ->join('created_wishlists as cw', 'cw.id = ap.created_wishlist_id','right')
            ->join('wishlist as w', 'w.id = cw.wishlist_id','right')
            ->join('product_image as pig', 'ap.product_id = pig.product_id','right')
            ->where('w.user_id',$id)
            ->group_by('p.id')
            ->order_by('ap.created_at')
            ->get()
            ->result();
    }

    public function getAllUserWishlist($id){
        return $this->db->select('created_wishlists.id as created_id,created_wishlists.created_wishlist_name,created_wishlists.wishlist_desc,wish.id')
            ->from('created_wishlists')
            ->join('wishlist as wish', 'wish.id = created_wishlists.wishlist_id','left')
            ->join('user as u', 'u.id = wish.user_id','left')
            ->where('wish.user_id',$id)
            ->get()
            ->result();
    }

    public function getWishlist($id,$wishlist_id){

        $data['wishlist'] = $this->db->select('created_wishlists.id as created_id,created_wishlists.created_wishlist_name,created_wishlists.wishlist_desc,wish.id')
            ->from('created_wishlists')
            ->join('wishlist as wish', 'wish.id = created_wishlists.wishlist_id','left')
            ->join('user as u', 'u.id = wish.user_id','left')
            ->where('wish.user_id',$id)
            ->where('created_wishlists.id',$wishlist_id)
            ->get()
            ->result();

        $data['details'] = $this->db->select('*')
            ->from('added_products')
            ->join('created_wishlists', 'created_wishlists.id = added_products.created_wishlist_id','left')
            ->join('wishlist', 'wishlist.id  = created_wishlists.wishlist_id','left')
            ->join('product_image', 'added_products.product_id  = product_image.product_id','left')
            ->where('wishlist.user_id',$id)
            ->where('created_wishlists.id',$wishlist_id)
            ->get()
            ->result();

        return $data;
    }

    public function getUserEmail($id){
        return $this->db->select('email')
            ->from('user')
            ->where('id',$id)
            ->get()
            ->result();
    }

    public function saveWishlist($userId,$product_title,$quantity,$price,$product_id,$total){
        $bb = 0;
        $product =array(
            'product_id' => $product_id,
        );
        foreach ($quantity as $val){
            $bb = $val;
        }
        $prd = array();

        foreach ($product['product_id'] as $val) {
            $products = array(
                'product_id'         => $val,
                'user_id'            => $userId,
                'quantity'           => $bb,
                'total'              => $total,
                'created_wishlist_id'=> $userId,
                'created_at'         => date("YmdHis")
            );
            $prd[] = $products;

        }
        $this->db->insert_batch('added_products',$prd);
        return $this->db->insert_id();

    }

    public function updateWishlist($userId,$wishlistName,$quantity,$price,$product_id,$total){

        $this->db->where('user_id', $userId)->where('product_id',$product_id);

        $added_products = array(
            'quantity'  => 3,
            'sub_total' => $total
        );

        $this->db->update('added_products', $added_products);

        $this->db->where('user_id', $userId);

        $wishlist = array(
            'wishlist_name' => $wishlistName
        );
        $this->db->update('wishlist', $wishlist);

        return 'success';

    }

    public function remove($added_id){
        return $this->db->where('id', $added_id)->delete('added_products');
    }


}//