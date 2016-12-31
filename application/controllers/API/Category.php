
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
class Category extends REST_Controller {

    function __construct()
    {
        // Construct the parent class
        parent::__construct();

        // Configure limits on our controller methods
        // Ensure you have created the 'limits' table and enabled 'limits' within application/config/rest.php
        $this->methods['user_get']['limit'] = 500; // 500 requests per hour per user/key
        $this->methods['user_post']['limit'] = 100; // 100 requests per hour per user/key
        $this->methods['user_delete']['limit'] = 50; // 50 requests per hour per user/key
        $this->load->model('Main/Category_m');
    }


    public function index_get()
    {
        die($id);
        $data = $this->Category_m->m_get_category();
        if($data==false){
            $this->response(["status"=>false,"data"=>"No data"], REST_Controller::HTTP_OK);
        }else{
            $this->response(["status"=>true,"data"=>$data], REST_Controller::HTTP_OK);
        }
    }

    public function sub_category_get(){
        $category_id=$this->get("category_id");
        $data=$this->Category_m->m_get_sub_category_by_category_id($category_id);
        if($data==false){
            $this->response(["status"=>false,"data"=>"No data"], REST_Controller::HTTP_OK);
        }else{
            $this->response(["status"=>true,"data"=>$data], REST_Controller::HTTP_OK);
        }
    }   
}
