<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH.'libraries/ADMIN_Controller.php';

class News extends ADMIN_Controller {

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
        $this->load->model('ADMIN/News_m');
    }
	public function index()
    {
     	$this->check_admin_login();
     	
        
        // vd('data',$data,true);
        $data["news"]=$this->News_m->m_get_news();
        $data["news_category"]=$this->News_m->m_get_news_category();
     	$this->load->view('/ADMIN/News',$data);
    }

    public function add_news(){
    	$this->check_admin_login();
    	// vd("se",$_COOKIE);
    	// vd("post",$_POST);
    	$data=array(
    		"news_category_id"=>$this->input->post("news_category_id",true),
    		"content"=>$this->input->post("content",true),
    		"author"=>$this->get_admin_name(),
    		"date_created"=>date("Y-m-d H:i:s"),
    		"date_edited"=>date("Y-m-d H:i:s"),
    		"edited_by"=>$this->get_admin_name()
    		);
    	$this->News_m->m_save_news($data);
    	redirect(base_url("/ADMIN/News"));
    }
}
