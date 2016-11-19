<?php
/**
 * Created by PhpStorm.
 * User: lenovo
 * Date: 02/08/2016
 * Time: 16.37
 */
class User_m extends CI_Model{
    function m_insert_user($data)
    {
        $this->db->insert("sc_user",$data);
    }

    function m_login_user(){
    	$email = $this->input->post("email",true);
    	$password = $this->input->post("password",true);
    	$user = $this->db->select("password,user_id,fname,lname")
    	->where("email",$email)
    	->get("sc_user")->row_array();
    	if(count($user)==0){
    		return false;
    	}else{
    		if($user["password"]==md5($password)){
    			return array("user_id"=>$user["user_id"],"fname"=>$user["fname"]);
    		}else{
    			return false;
    		}
    	}
    }
}
//asd