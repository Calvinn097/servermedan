<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main_home extends MY_Controller {

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
	public function index()
	{
		// vd("session",$_SESSION);
		// vd("cookie",$_COOKIE);
		// vd("bla",$this->category_list);
		$this->load->model("MAIN/Repairman_m");
		$data["home_banner"]=$this->Repairman_m->m_get_request_banner_approved();
		// vd("data",$data);
		$this->load->view('MAIN/home',$data);
        
	}
    
    
}
