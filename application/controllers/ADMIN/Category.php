<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH.'libraries/ADMIN_Controller.php';

class Category extends ADMIN_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	function __construct()
    {
        parent::__construct();
        $this->load->model('ADMIN/Account_m');
        $this->load->model('ADMIN/Category_m');
    }
	public function index()
    {
     	$this->check_admin_login();
     	$this->load->view('/ADMIN/Category_info');
    }

   	public function add_category(){
   		$category_name = $this->input->post('category_name',true);
   		if($this->form_validation->run("add_category")==false){
            $this->session->set_flashdata("add_category_err",$this->form_validation->error_array());
            redirect(base_url('/ADMIN/category'));
        }else{
        	$data=array('category_name'=>$category_name);
        	$this->Category_m->m_insert_category($data);
        	redirect(base_url('/ADMIN/category'));
        }
   	}
}
