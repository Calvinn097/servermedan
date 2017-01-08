
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
class Repairman extends REST_Controller {

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

    public function index_get(){
        $email = $this->get("email");
        $repairman_id = $this->get("repairman_id");
        $repairman = $this->Repairman_m->m_get_repairman($email);
        if($email==null){
            $repairman = $this->Repairman_m->m_get_repairman_by_repairman_id($repairman_id)
        }
        if($repairman==null){
            $this->response(["status"=>false,"data"=>$repairman], REST_Controller::HTTP_OK);    
        }
        else{
            $this->response(["status"=>true,"data"=>$repairman], REST_Controller::HTTP_OK);
        }
        
    }

    public function banner_get(){
        $repairman_id = $this->get("repairman_id");
        if($repairman_id!=null){
            $data=$this->Repairman_m->m_get_request_banner_by_repairman_id($repairman_id);
            if(count($data)==0 && !is_array($data)){
                $this->response(["status"=>false,"data"=>$data],REST_Controller::HTTP_OK);
            }else{
                $this->response(["status"=>true,"data"=>$data],REST_Controller::HTTP_OK);
            }
        }else{
            $data=$this->Repairman_m->m_get_request_banner();
            if(count($data)==0 && !is_array($data)){
                $this->response(["status"=>false,"data"=>$data],REST_Controller::HTTP_OK);
            }else{
                $this->response(["status"=>true,"data"=>$data],REST_Controller::HTTP_OK);
            }
        }
    }

    public function banner_delete_post(){
        $repairman_banner_id = $this->post("repairman_id");
        $this->Repairman_m->m_delete_request_banner($repairman_banner_id);
        $this->response(["status"=>true,"data"=>"success delete"]);
    }

    public function banner_insert_post(){
        //$this->post("")
    }
}
