<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

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
                'value' => $status["user_id"],
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

            set_global_noti("Hi ".$status["fname"].", $period","Success");
		}else{
			set_global_noti("Email/Password salah!","Warning");
		}
		redirect();

	}

	public function logout(){
		unset($_SESSION);
		unset($_COOKIE["sm_login"]);
        setcookie('sm_login', '', time() - 3600, '/');
        $this->load->library('user_agent');
        set_global_noti("Anda berhasil melakukan logout","Success");
        redirect($this->agent->referrer(),"refresh");
	}
    
    public function userlogincust(){
        $this->load->view("MAIN/homelogin");   
    }
    public function userloginrepair(){
        $this->load->view("MAIN/homeloginrepair");   
    }
    public function maps(){
        $this->load->view("MAIN/maps");
    }
    public function detailpost(){
        $this->load->view("MAIN/detailpost");
    }
    public function chat(){
        $this->load->view("Main/chatting");   
    }
}
