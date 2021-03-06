<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * CodeIgniter Rest Controller
 * A fully RESTful server implementation for CodeIgniter using one library, one config file and one controller.
 *
 * @package         CodeIgniter
 * @subpackage      Libraries
 * @category        Libraries
 * @author          Phil Sturgeon, Chris Kacerguis
 * @license         MIT
 * @link            https://github.com/chriskacerguis/codeigniter-restserver
 * @version         3.0.0
 */
abstract class ADMIN_Controller extends CI_Controller {
	function __construct()
    {
        parent::__construct();
        $this->load->model('/ADMIN/Account_m');

    }

    protected function check_admin_login(){
    	$admin_login = isset($_COOKIE['sm_admin']);
    	if(!$admin_login){
    		redirect(base_url('/ADMIN'));
    	}else{
    		
    	}
    }

    protected function get_admin_name(){
        return $this->Account_m->m_get_admin_name_by_id($_COOKIE["sm_admin"]);
    }

    protected function test(){
        echo"asd";
    }
}