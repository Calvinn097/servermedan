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
        $user_id=user_login_info()["user_id"];
        $repairman_id = $this->Repairman_m->m_get_repairman_id_by_user_id($user_id);
        // die($this->uri->segment(2));
        $whitelist=array("profile");
        if(!in_array($this->uri->segment(2), $whitelist)){
            if($repairman_id==null){
                set_global_noti("Kamu harus menjadi repairman untuk mengaksesnya","warning");
                redirect();
            }
        }
        
//		vd("asd",$this->page);
//		echo $this->meta_key;
	}
	private function get_repairman_id($user_id){
		$user_id=user_login_info()["user_id"];
        $repairman_id = $this->Repairman_m->m_get_repairman_id_by_user_id($user_id);
        return $repairman_id;
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
    public function lihat_banner(){
    	$user_id = user_login_info()["user_id"];
    	$repairman_id = $this->get_repairman_id($user_id);
    	$data["repairman_banner"]=$this->Repairman_m->m_get_request_banner_by_repairman_id($repairman_id);
        // vd("data",$data);
        $this->load->view("MAIN/lihat_banner",$data);
    }
    public function delete_repairman_banner($repairman_banner_id){

        $this->Repairman_m->m_delete_request_banner($repairman_banner_id);
        redirect(base_url("/Repairman/lihat_banner"));
    }
    public function profile($repairman_id=null){
        if($repairman_id ==null){
            $user_id = user_login_info()["user_id"];
            $repairman_id = $this->get_repairman_id($user_id);
        }
        $user_id = user_login_info()["user_id"];
        $data["my_repairman_id"]=$this->get_repairman_id($user_id);
    	$data["accepted_post"]=$this->Repairman_m->m_get_accepted_post_by_repairman_id($repairman_id);
        $data["finished_post"]=$this->Repairman_m->m_get_finished_post_by_repairman_id($repairman_id);
        $data["open_post"]=$this->Repairman_m->m_get_open_by_repairman_id($repairman_id);
        $data["rejected_post"]=$this->Repairman_m->m_get_rejected_by_repairman_id($repairman_id);
    	$data["repairman"]=$this->Repairman_m->m_get_repairman_by_repairman_id($repairman_id);
    	$this->load->view("MAIN/repairman_profile",$data);
    }
    
    public function edit_profile_form(){
    	$user_id = user_login_info()["user_id"];
    	$repairman_id = $this->get_repairman_id($user_id);
    	$data["repairman"]=$this->Repairman_m->m_get_repairman_by_repairman_id($repairman_id);
    	$this->load->view("MAIN/repairman_profile_form",$data);
    }
    public function edit_profile(){
    	vd("sasd",$_POST);
    	$user_id = user_login_info()["user_id"];
    	//die();
    	$this->Repairman_m->m_edit_profile_repairman($user_id);
        $image_path = $this->User_m->m_get_user_image($user_id);
        $image_path = storage_path(get_image_folder_path($image_path));
        if($_FILES['userfile']['name']!=''){
            if(file_exists($image_path)){
                delete_folder($image_path);
            }
            $path = "/asset/images/profile/$user_id";
            $this->Image_m->m_upload_pic($path,$user_id,"user_id","user_image","sc_user");
        }
    	redirect(base_url("/repairman/profile"));
    }
    public function accept_post($post_id){
        $user_id = user_login_info()["user_id"];
        $repairman_id = $this->get_repairman_id($user_id);
        $harga = $this->input->post("harga",true);
        $estimasi_waktu=$this->input->post("estimasi_waktu",true);
        // vd("post",$_POST,true);
        $this->Repairman_m->m_accept_user_post($repairman_id,$post_id,$harga,$estimasi_waktu);
        redirect(base_url("/user/detail_post/$post_id"));
    }
    public function edit_post($post_id){
        $user_id = user_login_info()["user_id"];
        $repairman_id = $this->get_repairman_id($user_id);
        $harga = $this->input->post("harga",true);
        $estimasi_waktu=$this->input->post("estimasi_waktu",true);
        // vd("post",$_POST,true);
        $this->Repairman_m->m_edit_user_post($repairman_id,$post_id,$harga,$estimasi_waktu);
        redirect(base_url("/user/detail_post/$post_id"));   
    }
    public function reject_post($user_post_id){
        $user_id = user_login_info()["user_id"];
        $repairman_id = $this->get_repairman_id($user_id);
        $this->Repairman_m->m_reject_user_post($user_post_id,$repairman_id);
        redirect(base_url("/user/detail_post/$user_post_id"));
    }
    public function job_repository(){
        
        $user_id = user_login_info()["user_id"];
        $repairman_id = $this->get_repairman_id($user_id);
        
        $data["my_repairman_id"]=$repairman_id;
        switch($_GET["id"])
        {
            case "1":
                $data["data"] = $this->Repairman_m->m_get_finished_post_by_repairman_id($repairman_id);
            break;
            case "2":
                $data["data"] = $this->Repairman_m->m_get_open_by_repairman_id($repairman_id);
            break;
            case "3":
                $data["data"] = $this->Repairman_m->m_get_rejected_by_repairman_id($repairman_id);
            break;
            default:
                $data["data"] = $this->Repairman_m->m_get_accepted_post_by_repairman_id($repairman_id);
            break;
        }
        // $data["accepted_post"]=$this->Repairman_m->m_get_accepted_post_by_repairman_id($repairman_id);
        // $data["finished_post"]=$this->Repairman_m->m_get_finished_post_by_repairman_id($repairman_id);
        // $data["open_post"]=$this->Repairman_m->m_get_open_by_repairman_id($repairman_id);
        // $data["rejected_post"]=$this->Repairman_m->m_get_rejected_by_repairman_id($repairman_id);
        // vd("daata",$data);
        $this->load->view("MAIN/job_repository",$data);
    }
}
