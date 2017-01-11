<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class News extends MY_Controller {

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
		$this->load->model("MAIN/News_m");
//		vd("asd",$this->page);
//		echo $this->meta_key;
	}
	public function index()
	{
        $data['news'] = $this->News_m->m_get_news();
		$data['category'] = $this->News_m->m_get_category();
		$this->load->view('MAIN/news',$data);
	}

	public function getDetail($news_id)
	{
		$data['news'] = $this->News_m->m_get_detail($news_id);
		$this->load->view('MAIN/newsdetail',$data);
	}
	public function complete_news($news_id){
		$data["news"]=$this->News_m->m_get_news_by_id($news_id);
		$this->load->view("MAIN/complete_news",$data);
	}
}
