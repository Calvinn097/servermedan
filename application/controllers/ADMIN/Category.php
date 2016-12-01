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
     	$config = array();
        $config["base_url"] = base_url("/ADMIN/category/index");
        $config["total_rows"] = $this->Category_m->m_category_count();
        $config["per_page"] = 5;
        $config["uri_segment"] = 5;

        //config for bootstrap pagination class integration
        $config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul>';
        $config['first_link'] = false;
        $config['last_link'] = false;
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['prev_link'] = '&laquo';
        $config['prev_tag_open'] = '<li class="prev">';
        $config['prev_tag_close'] = '</li>';
        $config['next_link'] = '&raquo';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><a href="#">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';

        $this->pagination->initialize($config);
        $page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;

        $data["results"] = $this->Category_m->m_get_category($config["per_page"], $page);
        $data["links"] = $this->pagination->create_links();
        $data['category_list'] = $this->Category_m->m_get_category();
        $data['sub_category_list'] = $this->Category_m->m_get_sub_category();
        
        // vd('data',$data,true);
     	$this->load->view('/ADMIN/Category_info',$data);
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

   	public function add_sub_category(){
   		$sub_category_name = $this->input->post('sub_category_name',true);
   		$category_id = $this->input->post('category_id',true);
   		if($this->form_validation->run("add_sub_category")==false){
            $this->session->set_flashdata("add_sub_category_err",$this->form_validation->error_array());
            redirect(base_url('/ADMIN/category'));
        }else{
        	$type = $this->input->post('type',true);
        	$service=false;$reparation=false;$jasa=false;
        	foreach($type as $key=>$row){
        		if($row=='service'){
        			$service=true;
        		}
        		if($row=='reparation'){
        			$reparation=true;
        		}
        		if($row=='jasa'){
        			$jasa=true;
        		}
        	}
        	$data=array('sub_category_name'=>$sub_category_name,'category_id'=>$category_id,'service'=>intval($service),'reparation'=>intval($reparation),'jasa'=>intval($jasa));
        	$this->Category_m->m_insert_sub_category($data);
        	redirect(base_url('/ADMIN/category'));
        }
   	}

    public function edit_subcat(){
        $this->check_admin_login();
        $sub_cat_id = $this->input->post('sub_cat_id',true);
        $sub_cat_info = $this->Category_m->m_get_sub_category($sub_cat_id);
        $data["sub_cat_info"]=$sub_cat_info;
        $data['category_list'] = $this->Category_m->m_get_category();
        $this->load->view('ADMIN/edit_sub_category_modal',$data);
    }

    public function update_sub_category(){
        $this->Category_m->m_update_sub_category();
        redirect(base_url('/ADMIN/category'));
    }
}
