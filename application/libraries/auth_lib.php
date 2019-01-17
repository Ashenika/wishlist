<?php

/**
 * Created by PhpStorm.
 * User: asheni
 * Date: 1/17/19
 * Time: 2:28 PM
 */

class auth_lib {

    function __construct()
    {
        // get a reference to the CI super-object, so we can
        // access models etc. (because we don't extend a core
        // CI class)
        $this->ci = &get_instance();

        $this->ci->load->model('auth_user');

    }

//    public function register($name,$user,$pwd,$conf_pwd)
//    {
//        if ($name == '' || $user == '' || $pwd == '' || $conf_pwd == '') {
//            return 'Missing field';
//        }
//        if ($pwd != $conf_pwd) {
//            return "Passwords do not match";
//        }
//        return $this->ci->Admin->register($name,$user,$pwd);
//    }

    public function login($user,$pwd)
    {
        if ($user == '' || $pwd == '') {
            return false;
        }
        return $this->ci->auth_user->login($user,$pwd);
    }

}