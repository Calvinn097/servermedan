<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category extends MY_Controller {

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
		$this->load->model("MAIN/Category_m");
//		vd("asd",$this->page);
//		echo $this->meta_key;
	}
	public function index()
	{

	}

	public function sub_category_list(){
		$category_id = $this->input->post("category_id");
		$sub_category=$this->Category_m->m_get_sub_category_by_category_id($category_id);
		foreach($sub_category as $key=>$row){
			echo "<option value='".$row['sub_category_id']."'>".$row['sub_category_name']."</option>";
		}
	}
}
