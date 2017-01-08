<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once APPPATH.'libraries/ADMIN_Controller.php';
class Input extends ADMIN_Controller {

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
    function __construct(){
        parent::__construct();
        $this->load->model("ADMIN/Repairman_m");
    }

	public function index()
    {
        echo"hello";
    }

    public function repairman_banner(){
        $this->check_admin_login();
        $data["repairman_banner"]=$this->Repairman_m->m_get_request_banner();
        // vd("data",$data);
        $this->load->view("ADMIN/repairman_banner",$data);
    }

    public function approve_repairman_banner($repairman_banner_id){
        $this->check_admin_login();
        $this->Repairman_m->m_approve_repairman_banner($repairman_banner_id);
        redirect(base_url("/ADMIN/input/repairman_banner"));
    }

    public function disapprove_repairman_banner($repairman_banner_id){
        $this->check_admin_login();
        $this->Repairman_m->m_disapprove_repairman_banner($repairman_banner_id);
        redirect(base_url("/ADMIN/input/repairman_banner"));
    }
    public function delete_repairman_banner($repairman_banner_id){
        $this->check_admin_login();
        $this->Repairman_m->m_delete_repairman_banner($repairman_banner_id);
        redirect(base_url("/ADMIN/input/repairman_banner"));
    }
}