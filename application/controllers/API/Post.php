
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
class Post extends REST_Controller {

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
        $this->load->model('Main/Repairman_m');
    }

    public function repairman_get(){
        $user_id = $this->get("user_id");
        $repairman_id = $this->Repairman_m->m_get_repairman_id_by_user_id($user_id);
        if($repairman_id==null){
            $this->response(["status"=>false,"data"=>"bukan repairman"]);
            return;
        }
        $data["timeline"]=$this->Repairman_m->m_get_user_posting_by_repairman_id($repairman_id);
        $this->response(["status"=>true,"data"=>$data]);
    }

    public function user_get(){
        $user_id=$this->get("user_id");
        $data["timeline"]=$this->User_m->m_get_user_posting_by_user_id($user_id);
        if(count($data["timeline"])==0){
            $this->response(["status"=>false,"data"=>$data]);
            return;
        }
        $this->response(["status"=>true,"data"=>$data]);
    }
}
