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
		print_r($_POST);
		$fname=$this->input->post("fname",true);
		$lname=$this->input->post("lname",true);
		$email = $this->input->post("email",true);
		$password = md5($this->input->post("password",true));
		$data=array("fname"=>$fname,"lname"=>$lname,"email"=>$email,"password"=>$password);
		$this->User_m->m_insert_user($data);
		redirect();
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
    public function Rank(){
        $this->load->view("Main/ranking");   
    }
    public function detailrepair(){
        $this->load->view("Main/detailrepair");   
    }
    public function accept(){
        $this->load->view("Main/accept");   
    }
}
