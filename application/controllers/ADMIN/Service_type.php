<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH.'libraries/ADMIN_Controller.php';

class Service_type extends ADMIN_Controller {

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
        $this->load->model('ADMIN/Service_type_m');
    }

    function index(){
        $data['service_type'] = $this->Service_type_m->m_get_service_type();
        $this->load->view('ADMIN/Service_type',$data);
    }

    function add_service_type(){
    	$this->form_validation->set_rules("service_type","Service Type","required");

    	if(!$this->form_validation->run()){
    		$this->session->set_flashdata("add_service_type_err",$this->form_validation->error_array());
    	}else{
    		$data["service_type"]=$this->input->post("service_type",true);
    		$this->Service_type_m->m_insert_service_type($data);
    	}
    	redirect("ADMIN/service_type");
    }

    function edit_service_type(){
        $service_type_id = $this->input->post("service_type_id",true);
        $data["service_type"]=$this->Service_type_m->m_get_service_type_by_id($service_type_id);
        $this->load->view("ADMIN/edit_service_type_modal",$data);
    }

    function update_service_type(){
        $service_type_id = $this->input->post("service_type_id",true);
        $service_type = $this->input->post("service_type",true);
        $data = array(
            "service_type"=>$service_type
            );
        $this->Service_type_m->m_update_service_type($data,$service_type_id);
        redirect("ADMIN/Service_type");
    }

    function delete_service_type($service_type_id){
        $this->Service_type_m->m_delete_service_type($service_type_id);
        redirect("ADMIN/Service_type");
    }
}
