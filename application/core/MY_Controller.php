<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Base_Controller extends CI_Controller {
 
    function __construct()
    {
        parent::__construct();
 
        //do whatever you want to do when object instantiate
    }
}
 
class Secure_Controller extends CI_Controller {
 
    function __construct()
    {
        parent::__construct();
    }

    function authForAdmin($data)
    {
        if(isset($data['username'])){
            if($data['role_id']!=1)
            {
                $this->session->set_flashdata('auth', 'Anda Tidak Memiliki Akses Kehalaman Tersebut!!!');
                redirect('auth/login');
            }else{
                return true;
            }
        }else{
            $this->session->set_flashdata('auth', 'Anda Harus Login Terlebih Dahulu!!!');
            redirect('auth/login');
        }
    }
}
