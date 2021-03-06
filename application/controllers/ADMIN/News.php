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
        $this->load->model('MAIN/Image_m');
        $this->load->model('ADMIN/Category_m');
        $this->load->model('ADMIN/News_m');
    }
	public function index()
    {   
        // vd('data',$data,true);

        $this->check_admin_login();
        $config = array();
        $config["base_url"] = base_url("/ADMIN/News/index");
        $config["total_rows"] = $this->News_m->m_news_count();
        $config["per_page"] = 5;
        $config["uri_segment"] = 4;

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

        $data["news"] = $this->News_m->m_get_news($config["per_page"], $page);
        $data["news_category"]=$this->News_m->m_get_news_category();
        $data["links"] = $this->pagination->create_links();
        
        // vd('data',$data,true);
     	$this->load->view('/ADMIN/News',$data);
    }

    public function add_news(){
    	$this->check_admin_login();
    	// vd("se",$_COOKIE);
     //    vd("file",$_FILES,true);
    	// vd("post",$_POST,true);
    	$data=array(
    		"news_category_id"=>$this->input->post("news_category_id",true),
    		"content"=>$this->input->post("content",true),
    		"author"=>$this->get_admin_name(),
    		"date_created"=>date("Y-m-d H:i:s"),
    		"date_edited"=>date("Y-m-d H:i:s"),
    		"edited_by"=>$this->get_admin_name(),
            "news_title"=>$this->input->post("news_title",true)
    		);
    	$news_id=$this->News_m->m_save_news($data);
        $path = "/asset/images/news/$news_id/header_image";
        $this->Image_m->m_upload_pic($path,$news_id,"news_id","header_image","sc_news");
    	redirect(base_url("/ADMIN/News"));
    }

    public function edit_news($news_id){
        $data["news"]=$this->News_m->m_get_news_by_id($news_id);
        $data["news_category"]=$this->News_m->m_get_news_category();

        $this->load->view("/ADMIN/edit_news",$data);
    }

    function delete_news($news_id){
        $this->check_admin_login();
        $this->News_m->m_delete_news($news_id);
        redirect(base_url("/ADMIN/News"));
    }

    function change_news($news_id){
        $data["content"]=$this->input->post("content",true);
        $data["edited_by"]=$this->get_admin_name();
        $data["date_edited"]=date("Y-m-d H:i:s");
        $data["news_category_id"]=$this->input->post("news_category_id",true);
        $datap["title"]=$this->input->post("news_title",true);
        $this->News_m->m_edit_news($news_id,$data);

        $image_path = $this->News_m->m_get_news_header_image($news_id);
        $image_path = storage_path(get_image_folder_path(get_image_folder_path($image_path)));
        if($_FILES['userfile']['name']!=''){
            if(file_exists($image_path)){
                delete_folder($image_path);
            }
            $path = "/asset/images/news/$news_id/header_image";
            $this->Image_m->m_upload_pic($path,$news_id,"news_id","header_image","sc_news");
        }
        redirect("ADMIN/News");
    }

    function insert_news_category(){
//        vd("psot",$_POST,true);
        $news_category=$this->input->post("news_category",true);
        $data=array(
            "news_category"=>$news_category
        );
        $this->News_m->m_insert_news_category($data);
        redirect(base_url("ADMIN/news"));
    }

    function edit_news_category_modal(){
        $news_category_id = $this->input->post("news_category_id",true);
        $data["news_category"]=$this->News_m->m_get_news_category_by_id($news_category_id);
        $this->load->view("ADMIN/edit_news_category_modal",$data);
    }

    function edit_news_category()
    {
        $news_category_id=$this->input->post("news_category_id",true);
        $news_category=$this->input->post("news_category", true);
        $data = array(
            "news_category"=>$news_category
        );
        $this->News_m->m_edit_news_category($news_category_id,$data);
        redirect(base_url("ADMIN/news"));
    }
    
    function delete_news_category($news_category_id){
        $this->News_m->m_delete_news_category($news_category_id);
        redirect(base_url("ADMIN/news"));
    }
}
