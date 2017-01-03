<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Curltest extends CI_Controller {

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     *      http://example.com/index.php/welcome
     *  - or -
     *      http://example.com/index.php/welcome/index
     *  - or -
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
//      $this->load->model('MAIN/'.country_code.'/Main_home_m');
        // $this->load->model("MAIN/User_m");
//      vd("asd",$this->page);
//      echo $this->meta_key;
    }
    public function index()
    {
        // $url = base_url("API/User/register");
        // $field = array(
        //     'fname'=>"Aeris",
        //     "lname"=>"Gainsborough",
        //     "email"=>'aerithgainsborough@gmail.com',
        //     "password"=>'aeris123',
        //     'rpassword'=>'aeris123'
        // );
        // $field_string = http_build_query($field);
        // $ch = curl_init();
        // curl_setopt($ch,CURLOPT_URL,$url);
        // curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        // // curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
        // curl_setopt($ch,CURLOPT_POST,count($field));
        // curl_setopt($ch,CURLOPT_POSTFIELDS,$field_string);
        // $res=curl_exec($ch);
        // echo $res;
        // curl_close($ch);

        // $url = base_url("API/Repairman?email=calvinwangxz@gmail.com"); //get repairman info
        // $url = base_url("API/Category"); //getcategorylist
        // $url = base_url("API/Category/sub_category?category_id=2"); //get subcategory by categoryid
        $url = base_url("API/Repairman/banner"); //get subcategory by categoryid
        
        $ch = curl_init();
        curl_setopt($ch,CURLOPT_URL,$url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $res=curl_exec($ch);
        echo $res;
        curl_close($ch);

    }
}
