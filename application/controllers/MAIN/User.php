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
		$password = $this->input->post("password",true);
		$rpassword = $this->input->post("rpassword",true);
		if($password!=$password){

		}
		if($this->form_validation->run("signup")==false){
			$this->session->set_flashdata("signup_err",$this->form_validation->error_array());
			$populate = array(
				"fname"=>$fname,
				"lname"=>$lname,
				"email"=>$email,
			);
			$this->session->set_flashdata("signup_form_populate",$populate);
			redirect();
		}else{

		}
		$password = md5($this->input->post("password",true));
		$data=array("fname"=>$fname,"lname"=>$lname,"email"=>$email,"password"=>$password);
		$this->User_m->m_insert_user($data);
		redirect();
	}
}
