<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends MY_Controller {

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
//		vd("asd",$this->page);
//		echo $this->meta_key;
	}
	public function index()
	{
		$this->load->view('MAIN/home');

	}

	public function register(){
		// print_r($_POST);
		//vd("post",$_POST,true);
		$this->User_m->m_insert_user();
	}

	public function login(){
		// print_r($_POST);
		$status=$this->User_m->m_login_user();
		if($status!=false){
			$this->load->library('user_agent');
            $link = $this->agent->referrer();
            $co_sign_up= array(
                'name' => 'login',
                'value' => json_encode(array('user_id'=>$status["user_id"],'user_level'=>$status["user_level"])),
                'expire' =>  3600,
                'path'=>'/',
                'prefix' => 'sm_'
            );
            $this->input->set_cookie($co_sign_up);
            $now = (new DateTime())->format("H:i:s");
            $period="";
            if($now>"05:00:00" && $now<"12:00:00")
            	$period="Selamat pagi";
            else if($now>"12:00:00" && $now<"05:00:00")
            	$period="Selamat siang";
            else
            	$period="Selamat malam";

            set_global_noti("Hi ".$status["fname"].", $period","warning");
		}else{
			set_global_noti("Email/Password salah!","Warning");
		}
		redirect();

	}

    public function fb_login(){
        $fb_data = $this->input->post("data",true);
        $authResponse = $fb_data['authResponse'];
        $accessToken   = $authResponse['accessToken'];
        $userID = $authResponse['userID'];

        $fb=new Facebook\Facebook([
            'app_id'=>fb_i,
            'app_secret'=>fb_s,
            'default_graph_version'=>'v2.8'
        ]);
        $response = $fb->get('/me?fields=id,name,gender,birthday,email',$accessToken);
        $user = $response->getGraphUser();
        $fb_id = $user->getProperty('id');

        $fb_exist = $this->User_m->m_check_fb_exist($fb_id);
        if($fb_exist){
            
        }else{
            $birthday= $user->getProperty('birthday');
            $name = $user->getProperty('name');
            $explode_name = explode(' ',$name);
            $first_name = $explode_name[0];
            $last_name = $explode_name[1];
            $gender = $user->getProperty('gender');
            $email = $user->getProperty('email');
            
            $data=array(
                "email"=>$email,"fname"=>$first_name,
                "lname"=>$last_name,
                "fb_id"=>$fb_id,"gender"=>$gender
            );

            $this->User_m->m_insert_fb_user($data);
        }
        $this->load->library('user_agent');
        $link = $this->agent->referrer();
        $user_id=$this->User_m->m_get_user_id_by_fb_id($fb_id);
        $co_sign_up= array(
            'name' => 'login',
            'value' => json_encode(array('user_id'=>$user_id,'id'=>$fb_id,'fb_access_token'=>$accessToken)),
            'expire' =>  3600,
            'path'=>'/',
            'prefix' => 'sm_'
        );
        $this->input->set_cookie($co_sign_up);
        $now = (new DateTime())->format("H:i:s");
        $period="";
        if($now>"05:00:00" && $now<"12:00:00")
            $period="Selamat pagi";
        else if($now>"12:00:00" && $now<"05:00:00")
            $period="Selamat siang";
        else
            $period="Selamat malam";

        set_global_noti("Hi ".$first_name.", $period","warning");
        

    }

	public function logout(){
		unset($_SESSION);
		unset($_COOKIE["sm_login"]);
        setcookie('sm_login', '', time() - 3600, '/');
        $this->load->library('user_agent');
        set_global_noti("Anda berhasil melakukan logout","warning");
        redirect($this->agent->referrer(),"refresh");
	}
    
    public function user_login_customer(){
        if(!isset($_COOKIE["sm_login"])){
            redirect(base_url());
        }
        $user_id=user_login_info()["user_id"];
        $data["service_type"]=$this->Service_type_m->m_get_service_type();
        $data["user_posting"]=$this->User_m->m_get_user_posting_by_user_id($user_id);
        // vd("data",$data);
        $this->load->view("MAIN/homelogin",$data);
    }
    public function user_login_repair(){
        $user_id=user_login_info()["user_id"];
        $repairman_id = $this->Repairman_m->m_get_repairman_id_by_user_id($user_id);
        if($repairman_id==null){
            set_global_noti("Kamu harus menjadi repairman untuk mengaksesnya","warning");
            redirect();
        }
        $data["repairman_id"]=$repairman_id;
        $data["user_id"]=$user_id;
        $data["timeline"]=$this->Repairman_m->m_get_user_posting_by_repairman_id($repairman_id);
        $data["service_type"]=$this->Service_type_m->m_get_service_type();
        //vd("Data",$data);
        $this->load->view("MAIN/homeloginrepair",$data);
    }
    public function maps(){
        $this->load->view("MAIN/maps");
    }
    public function detail_post(){
        $this->load->view("MAIN/detailpost");
    }
    public function chat(){
        $this->load->view("Main/chatting");   
    }
    public function rank(){
        $this->load->view("Main/ranking");   
    }
    public function detail_repair(){
        $this->load->view("Main/detailrepair");   
    } 
    public function accept(){
        $this->load->view("Main/accept");   
    }
    public function user_posting(){
        $this->User_m->m_insert_user_posting();
        redirect(base_url("user/user_login_customer"));
    }

    public function user_comment(){
        $user_id = user_login_info()["user_id"];
        $this->User_m->m_user_comment($user_id);
        redirect(base_url("user/user_login_customer"));
    }

    public function user_post_like_action(){
        $user_post_id = $this->input->post("user_post_id",true);
        $user_id = user_login_info()["user_id"];
        $result = $this->User_m->m_user_post_like_action($user_post_id,$user_id);
        //$result == false means unliked if result==true means liked
        if($result){
            echo json_encode(array("like"=>true));
        }else{
            echo json_encode(array("like"=>false));
        }
    }

    public function become_repairman(){
        $user_id = user_login_info()["user_id"];
        $this->User_m->m_become_repairman($user_id);
        set_global_noti("Success Become Repairman","warning");
        redirect(base_url("user/user_login_repair"));
    }
}
