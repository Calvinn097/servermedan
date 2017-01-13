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
        $this->load->model("MAIN/Image_m");
//		vd("asd",$this->page);
//		echo $this->meta_key;
	}
	public function index()
	{
		$this->load->view('MAIN/home');

	}
    /*HANYA UNTUK PENGETESAN PENAMPILAN*/

    public function viewregister(){
        $this->load->view("Main/register");   
    }
    
    public function ViewLogin(){
        $this->load->view("Main/login.php");  
    }

    public function viewhome(){
        $this->load->view("Main/homelogin");
    }

    /*NOTE : HUUNGKAN KE CONTROLLER ASLI*/
    
	public function register(){
		// print_r($_POST);
		//vd("post",$_POST,true);
		$this->User_m->m_insert_user();
	}

	public function login(){
		// print_r($_POST);
		$status=$this->User_m->m_login_user();
        // vd("S",$status,true);
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
        redirect("user/user_login_customer");

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
             $birthday= $user->getProperty('birthday');
            $name = $user->getProperty('name');
            $explode_name = explode(' ',$name);
            $first_name = $explode_name[0];
            $last_name = $explode_name[1];
            $gender = $user->getProperty('gender');
            $email = $user->getProperty('email');
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

            // vd("asd",$data,true);

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
		redirect(base_url(),"refresh");
	}
    
    
    public function user_login_customer(){
        if(!isset($_COOKIE["sm_login"])){
            redirect(base_url());
        }
        $user_id=user_login_info()["user_id"];
        $data["service_type"]=$this->Service_type_m->m_get_service_type();
        $data["user_posting"]=$this->User_m->m_get_user_posting_by_user_id($user_id);
        $data["user_notification"]=$this->User_m->m_get_user_notification_by_user_id($user_id);
        $data["home_banner"]=$this->Repairman_m->m_get_request_banner_approved();
        // vd("data",$data["user_notification"],true); //param 3 true to make program stop, dont include param 3 to show data without stopping program
        //vd("Data",$data["home_banner"]);
        $this->load->view("MAIN/homelogin",$data);
    }
    public function user_login_repair(){
        $user_id=user_login_info()["user_id"];
        $repairman_id = $this->Repairman_m->m_get_repairman_id_by_user_id($user_id);
        if($repairman_id==null){
            set_global_noti("Kamu harus menjadi repairman untuk mengaksesnya","warning");
            redirect(base_url("user/viewhome"));
        }
        $data["repairman_id"]=$repairman_id;
        $data["user_id"]=$user_id;
        $data["timeline"]=$this->Repairman_m->m_get_user_posting_by_repairman_id($repairman_id);

        $data["service_type"]=$this->Service_type_m->m_get_service_type();

        //vd("Data",$data);
        $this->load->view("MAIN/homeloginrepair",$data);
    }
    private function get_repairman_id($user_id=null){
        if($user_id==null){
            $user_id=user_login_info()["user_id"];    
        }
        
        $repairman_id = $this->Repairman_m->m_get_repairman_id_by_user_id($user_id);

        return $repairman_id;
    }
    
    public function detail_post($user_post_id){
        $user_id = user_login_info()["user_id"];
        $repairman_id = $this->get_repairman_id($user_id);
        if($repairman_id==null && $user_id!=null){
            $data["detail_post"]=$this->User_m->m_user_get_user_posting_by_user_post_id($user_post_id,$user_id);
            if($data["detail_post"]==null){
                set_global_noti("Not found","warning");
                redirect(base_url());    
            }
            
            $data["accepted_repairman_list"]=$this->User_m->m_get_all_repairman_that_accept_list_by_user_post_id($user_post_id,$user_id);
            $data["finished"]=$this->User_m->m_get_finished($user_post_id);
            $data["repairman"]=false;
            // vd("data",$data,true);
        }else if($repairman_id!=null){
            $data["detail_post"]=$this->User_m->m_repairman_get_user_posting_by_user_post_id($user_post_id,$repairman_id);
            $data["accepted"]=$this->User_m->m_get_post_accepted_by_repairman_id_post_id($user_post_id,$repairman_id);
            $data["repairman"]=true;
            $data["finished"]=$this->User_m->m_get_finished($user_post_id);
            $data["accepted_repairman_list"]=$this->User_m->m_get_all_repairman_that_accept_list_by_user_post_id($user_post_id,$user_id);

            if($data["detail_post"]==null){
                set_global_noti("Not found","warning");
                redirect(base_url());    
            }
            
            $data["i_accept_comment"]=$this->User_m->m_get_post_accepted_comment_by_post_id_repairman_id($data["accepted"]["post_accepted_id"],$repairman_id);
            // vd("data",$data,true);
        }else{
            redirect(base_url());
        }
        $this->User_m->m_clear_notification($user_post_id,$user_id);
        //vd("data",$data);
        $this->load->view("MAIN/detailpost",$data);
    }
    public function profile_user_id($user_id=null){
        if($user_id ==null){
            $user_id = user_login_info()["user_id"];
            
        }
        $repairman_id = $this->get_repairman_id($user_id);
        $data["my_repairman_id"]=$this->get_repairman_id(user_login_info()["user_id"]);
        $data["my_repairman_id"]=$repairman_id;
        $data["accepted_post"]=$this->Repairman_m->m_get_accepted_post_by_repairman_id($repairman_id);
        $data["finished_post"]=$this->Repairman_m->m_get_finished_post_by_repairman_id($repairman_id);
        $data["open_post"]=$this->Repairman_m->m_get_open_by_repairman_id($repairman_id);
        $data["rejected_post"]=$this->Repairman_m->m_get_rejected_by_repairman_id($repairman_id);
        
        $data["repairman"]=$this->Repairman_m->m_get_repairman_by_repairman_id($repairman_id);
        $this->load->view("MAIN/repairman_profile",$data);
    }
    
    public function rank(){
        $data["rank"]=$this->User_m->m_get_rank();
        $this->load->view("Main/ranking", $data);   
    }
    public function detail_repair($user_post_id){
        $data["detail_repair"]=$this->User_m->m_get_user_posting_by_user_post_id($user_post_id);
        vd("data",$data);
        $this->load->view("Main/detailrepair",$data);   
    } 
     
    
    public function user_posting(){
        $this->User_m->m_insert_user_posting();
        redirect(base_url("user/user_login_customer"));
    }

    public function user_comment(){
        $user_id = user_login_info()["user_id"];
        $this->load->library('user_agent');
        $link = $this->agent->referrer();
        $this->User_m->m_user_comment($user_id);

        redirect($link);
    }

    public function comment_post_accepted(){
        $post_accepted_id = $this->input->post("post_accepted_id",true);
        $post_id=$this->User_m->m_get_post_id_by_post_accepted_id($post_accepted_id);
        $comment = $this->input->post("comment",true);
        $date = date("Y-m-d H:i:s");
        $array = array(
            "post_accepted_id"=>$post_accepted_id,
            "comment"=>$comment,
            "date"=>$date,
            "user_id"=>user_login_info()["user_id"]
        );
        $this->User_m->m_comment_post_accepted($array);
        redirect(base_url("user/detail_post/".$post_id));

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
        redirect("user/logout");
        redirect(base_url("user/user_login_repair"));
    }

    public function profile($user_id=null){
        if($user_id==null){
            $user_id = user_login_info()["user_id"];
            if($user_id==null){
                redirect(base_url());
            }
        }
        // die($user_id);
        $data["my_user_id"]= user_login_info()["user_id"];
        $data["is_repairman"]=$this->User_m->m_check_repairman_exist_by_user_id($data["my_user_id"]);
        $data["user"]=$this->User_m->m_get_user_by_user_id($user_id);
        $this->load->view("MAIN/user_profile",$data);
    }
    public function profile_hybrid($user_id=null){
        if($user_id==null){
            $user_id = user_login_info()["user_id"];
            if($user_id==null){
                redirect(base_url());
            }
        }
        // die($user_id);
        $data["my_user_id"]= user_login_info()["user_id"];
        $data["is_repairman"]=$this->User_m->m_check_repairman_exist_by_user_id($data["my_user_id"]);
        if($data["is_repairman"]){
            $data["my_repairman_id"]=$this->Repairman_m->m_get_repairman_id_by_user_id($user_id);
            $data["repairman"]=$this->Repairman_m->m_get_repairman_by_repairman_id($repairman_id);
            $data["my_repairman_id"]=$repairman_id;
            $data["accepted_post"]=$this->Repairman_m->m_get_accepted_post_by_repairman_id($repairman_id);
            $data["finished_post"]=$this->Repairman_m->m_get_finished_post_by_repairman_id($repairman_id);
            $data["open_post"]=$this->Repairman_m->m_get_open_by_repairman_id($repairman_id);
            $data["rejected_post"]=$this->Repairman_m->m_get_rejected_by_repairman_id($repairman_id);
            $this->load->view("MAIN/repairman_profile",$data);
            
        }else{
            $data["user"]=$this->User_m->m_get_user_by_user_id($user_id);

            $this->load->view("MAIN/user_profile",$data);    
        }

        
        
    }

    public function edit_profile_form(){
        $user_id = user_login_info()["user_id"];
        $data["user"]=$this->User_m->m_get_user_by_user_id($user_id);
        
        
    }

    public function edit_profile(){
        $user_id = user_login_info()["user_id"];
        $this->User_m->m_edit_user_profile($user_id);
        $path = "/asset/images/user/$user_id";
        
        $image_path = $this->User_m->m_get_user_image($user_id);
        $image_path = storage_path((get_image_folder_path($image_path)));
        if($_FILES['userfile']['name']!=''){
            if(file_exists($image_path)){
                delete_folder($image_path);
            }
            $path = "/asset/images/profile/$user_id";
            $this->Image_m->m_upload_pic($path,$user_id,"user_id","user_image","sc_user");
        }
        redirect(base_url("user/profile"));
    }

    public function forgot_password(){
        $this->load->view("MAIN/forgot_password");
    }

    function check_user_email(){
        //============= forget password ======================

        // kirim email ke alamat email untuk pemulihan akun
        $email = $this->input->post("email",true);
        $nama=$this->User_m->m_get_user_name_by_email($email);
        if(!$this->User_m->m_check_email_exist_2($email)){
            set_global_noti("Email not exist","warning");
            redirect(base_url("user/forgot_password"));
        }
        $first_name = $nama["fname"];
        $last_name = $nama["lname"];
        $activation_code = substr(str_shuffle("abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890"),0,30);
        $activation_code= md5($activation_code);
        $message="
        <h1>Activation Link</h1>
        <p>Hello $first_name, $last_name,</p>
        <p>Please click <a href='".base_url('/user/password_recovery?q='.$activation_code.'&e='.$email)."'>this</a> to set your new password</p>
        ";
        $this->User_m->m_forgot_password($email,$activation_code);
        send_email(WEBNAME,$email,"Recover Your Password from ServerMedan",$message);
        set_global_noti("Recovery Link has been sent to your email","warning");

        $this->load->library('user_agent');
        redirect($this->agent->referrer());

    }

    function password_recovery()
    {
        $code = $this->input->get("q",true);
        $email = $this->input->get("e",true);
        $data["email"]=$email;
        $data["code"]=$code;
        $valid = $this->User_m->m_forgot_password_validation($email,$code);
        if($valid){
//            $this->load->view('/MAIN/'.country_code.'/recover_password',$data);
            $this->load->view('/MAIN/recover_password',$data);
        }
        else{
//            $this->load->view('/MAIN/'.country_code.'/page_error');
            set_global_noti("Invalid Access","warning");
            redirect();
        }
    }
    function change_password_recovery(){
        $user_id = user_login_info()["user_id"];
        $result  =$this->User_m->m_change_password_via_recovery($user_id);
        if($result>0){
            set_global_noti("Password changed","warning");
        }
        else{
            set_global_noti("Password fail to change","warning");   
        }
        redirect(base_url());
    }

    function deal_post($user_post_id,$post_accepted_id){
        $user_id = user_login_info()["user_id"];
        $is_author_of_post = $this->User_m->m_is_author_of_post($user_id,$user_post_id);
        // vd("is",$is_author_of_post);
        if($is_author_of_post){
            $this->User_m->m_deal_accepted_post_by_post_id($post_accepted_id,$user_post_id,$user_id);
            redirect(base_url("user/detail_post/".$user_post_id));
        }else{
            set_global_noti("unauthorized action");
            redirect(base_url());
        }
    }

    function user_reject_repairman($user_post_id,$post_accepted_id){
        $user_id = user_login_info()["user_id"];
        $is_author_of_post = $this->User_m->m_is_author_of_post($user_id,$user_post_id);
        // vd("is",$is_author_of_post);
        if($is_author_of_post){
            $this->User_m->m_reject_accepted_post_by_post_id($post_accepted_id,$user_post_id,$user_id);
            redirect(base_url("user/detail_post/".$user_post_id));
        }else{
            set_global_noti("unauthorized action");
            redirect(base_url());
        }
    }

    function user_finished($user_post_id,$post_accepted_id){
        $user_id = user_login_info()["user_id"];
        $is_author_of_post = $this->User_m->m_is_author_of_post($user_id,$user_post_id);
        if($is_author_of_post){
            $review = $this->input->post("review",true);
            $rate = $this->input->post("rate",true);
            $this->User_m->m_finish_post($post_accepted_id,$user_post_id,$user_id,$review,$rate);
            redirect(base_url("user/detail_post/".$user_post_id));
        }else{
            set_global_noti("unauthorized action");
            redirect(base_url());
        }
    }

    function lunas($post_finished_id){
        $user_id = user_login_info()["user_id"];
        $repairman_id=$this->Repairman_m->m_get_repairman_id_by_user_id($user_id);

        if($repairman_id==null){
            redirect(base_url());
            set_global_noti("unauthorized access","warning");
        }
        $is_finished = $this->User_m->m_is_finisher($post_finished_id,$repairman_id);
        // vd("is_fin",$is_finished);
        if($is_finished){
            // die("we");
            $this->User_m->m_mark_lunas($post_finished_id);
            // die("asd");
            $link = $this->agent->referrer();
            redirect($link);
            // redirect(base_url("user/detail_post/".$user_post_id));
        }else{
            // die("yolo");
            set_global_noti("unauthorized action");
            redirect(base_url());
        }
    }
}