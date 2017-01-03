<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Repairman extends MY_Controller {

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
//		$this->load->model('MAIN/'.country_code.'/Main_home_m');
		$this->load->model("MAIN/User_m");
        $this->load->model("MAIN/Service_type_m");
        $this->load->model("MAIN/Repairman_m");
        $this->load->model("MAIN/Image_m");
        $this->load->model("MAIN/Category_m");
//		vd("asd",$this->page);
//		echo $this->meta_key;
	}
    public function pasang_banner_form(){
    	$data["category"]=$this->Category_m->m_get_category();
        $this->load->view("MAIN/pasang_banner_form",$data);
    }
	public function pasang_banner(){
		// vd("file",$_FILES);
  //       vd("post",$_POST,true);
        $user_id=user_login_info()["user_id"];
        $dat=array("user_id"=>$user_id);
        $banner_id = $this->Repairman_m->m_insert_request_banner($dat);
        if($banner_id!==false){
        	$path = "/asset/images/banner/repairman/$user_id/$banner_id";
        	$this->Image_m->m_upload_pic($path,$banner_id,"repairman_banner_id","path","sc_banner_repairman");
        	set_global_noti("Berhasil dikirim, jika sudah diapprove akan ditampilkan selama 7 hari.");
        }
        redirect(base_url("user/user_login_repair"));
    }
}
