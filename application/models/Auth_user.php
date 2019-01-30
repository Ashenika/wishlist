<?php


/**
 * Created by PhpStorm.
 * User: asheni
 * Date: 1/17/19
 * Time: 2:29 PM
 */

class Auth_user extends CI_Model {

    function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->library('session');
    }


    function login($username,$pwd)
    {
        if(!isset($_SESSION['logged'])){
            $_SESSION['logged'] = session_id();
            // print_r(session_id());
        }

        $this->db->where(array('username' => $username,'password' => $pwd));
        $res = $this->db->get('auth_user',array('user'));

        // $data = $res->result_array();
        if ($res->num_rows() != 1) { // should be only ONE matching row!!
            return false;
        }

        return $res->row_array();

    }

    public function auth($username,$password){

        $this->db->where(array('username' => $username,'password' => $password));
        $query = $this->db->get('auth_user',array('user'));

        if($query->num_rows()>0){
            foreach ($query->result() as $row)
            {
                $data[] = $row;
            }
            return $query->result();
        } else{
            return "empty";
        }
    }

    public function createUser($name,$username,$email,$password,$wish_name,$wish_desc) {
        $data = array(
            'name' => $name,
            'email' => $email,
            'created_at'  => date("YmdHis")
        );
        $user = $this->db->insert('user', $data);

        $auth = array(
            'username' => $username,
            'password' => md5($password),
            'user_id'  => $this->db->insert_id(),
            'created_at'  => date("YmdHis")
        );
        $this->db->insert('auth_user',$auth);

        $wishlistData = array(
            'user_id' => $this->db->insert_id(),
            'wishlist_name'    => $wish_name,
            'description' => $wish_desc,
            'created_at'  => date("YmdHis"),
            'session_id' =>  session_id()
        );
        $this->db->insert('wishlist',$wishlistData);

        return $this->db->insert_id();
    }

}