
<?php

defined('BASEPATH') OR exit('No direct script access allowed');

// This can be removed if you use __autoload() in config.php OR use Modular Extensions
require_once APPPATH.'libraries/REST_Controller.php';
/**
 * This is an example of a few basic user interaction methods you could use
 * all done with a hardcoded array
 *
 * @package         CodeIgniter
 * @subpackage      Rest Server
 * @category        Controller
 * @author          Phil Sturgeon, Chris Kacerguis
 * @license         MIT
 * @link            https://github.com/chriskacerguis/codeigniter-restserver
 */
class User extends REST_Controller {

    function __construct()
    {
        // Construct the parent class
        parent::__construct();

        // Configure limits on our controller methods
        // Ensure you have created the 'limits' table and enabled 'limits' within application/config/rest.php
        $this->methods['user_get']['limit'] = 500; // 500 requests per hour per user/key
        $this->methods['user_post']['limit'] = 100; // 100 requests per hour per user/key
        $this->methods['user_delete']['limit'] = 50; // 50 requests per hour per user/key
        $this->load->model('Main/User_m');
    }

    public function index_get(){
        $email = $this->get("email");
        $user = $this->User_m->m_get_user_by_email($email);
        if($user==null){
            $this->response(["status"=>false,"data"=>$user], REST_Controller::HTTP_OK);    
        }
        else{
            $this->response(["status"=>true,"data"=>$user], REST_Controller::HTTP_OK);    
        }
        
    }



    public function login_post()
    {
        // $email = $this->post('email');
        // $password = $this->post('password');
        $data=$this->User_m->m_login_user();
        if($data==false){
            $this->response(["status"=>false,"data"=>"Email atau password salah"], REST_Controller::HTTP_OK);
        }else{
            $this->response(["status"=>true,"data"=>$data], REST_Controller::HTTP_OK);
        
        }
    }

    public function register_post(){
        $data=$this->User_m->m_insert_user('api');
        if(!$data["status"]){
            $this->response(["status"=>false,"data"=>$data["data"]],REST_Controller::HTTP_OK);
        }else{
            $this->response(["status"=>false,"data"=>$data["data"]], REST_Controller::HTTP_OK);
        }
    }
}
