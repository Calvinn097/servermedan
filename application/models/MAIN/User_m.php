<?php
/**
 * Created by PhpStorm.
 * User: lenovo
 * Date: 02/08/2016
 * Time: 16.37
 */
class User_m extends CI_Model{
    function m_insert_user($api=false)
    {
        $fname=strtolower($this->input->post("fname",true));
        $lname=strtolower($this->input->post("lname",true));
        $email = strtolower($this->input->post("email",true));
        $password = strtolower($this->input->post("password",true));
        $rpassword = strtolower($this->input->post("rpassword",true));

        if($password!=$password){

        }
        if($this->form_validation->run("signup")==false){

            if(!$api){
                $this->session->set_flashdata("signup_err",$this->form_validation->error_array());
                //vd("asd",$this->form_validation->error_array());
                //die('asd');
                $populate = array(
                    "fname"=>$fname,
                    "lname"=>$lname,
                    "email"=>$email,
                );
                $this->session->set_flashdata("signup_form_populate",$populate);
                redirect();
            }else{
                $response=array(
                    'status'=>false,
                    'data'=>$this->form_validation->error_array()
                );
                return $response;
            }
        }else{
            $password = md5($this->input->post("password",true));
            $data=array("fname"=>$fname,"lname"=>$lname,"email"=>$email,"password"=>$password);
            $this->db->insert("sc_user",$data);
            //$this->session->set_flashdata("global_notification",array("message"=>,"type"=>"Info"));
            if(!$api){
                set_global_noti("Hi $fname, Terima kasih sudah bergabung di Servermedan!","Info");
                redirect();
            }else{
                $data=$this->db->where("email",$email)
                    ->get("sc_user")->row_array();
                unset($data["password"]);
                $response=array(
                    'status'=>true,
                    'data'=>$data
                );
                return $response;
            }
        }
    }

    function m_login_user(){
    	$email = $this->input->post("email",true);
    	$password = $this->input->post("password",true);
    	$user = $this->db
    	->where("email",$email)
    	->get("sc_user")->row_array();
    	if(count($user)==0){
    		return false;
    	}else{
    		if($user["password"]==md5($password)){
                unset($user['password']);
    			return $user;
    		}else{
    			return false;
    		}
    	}
    }

    function m_check_email_exist($email){
        $res=$this->db->where("email",$email)
        ->select("user_id,fb_id,google_id")
        ->get("sc_user")->row_array();
        if(count($res)!=0){
            if($res["fb_id"]!=null){
                return "FB";
            }else if($res["google_id"]!=null){
                return "GP";
            }else{
                return "SM";
            }
        }else{
            return "CLEAR";
        }
    }

    function m_check_fb_exist($fb_id){
        $res = $this->db->where("fb_id",$fb_id)
        ->select("user_id")
        ->get("sc_user")->row_array();
        if(count($res)==0){
            return false;
        }
        return true;
    }

    function m_insert_fb_user($data){
        $fb_exist = $this->m_check_fb_exist($data['fb_id']);
        if(!$fb_exist){
            $status = $this->m_check_email_exist($data["email"]);
            if($status=="CLEAR"){
                $this->db->insert('sc_user',$data);
            }else{
                if($status=="FB"){
                    $response = array(
                        'status'=>false,
                        'data'=>"Email ini sudah ter registrasi dengan facebook."
                    );
                    set_global_noti("Email ini sudah ter registrasi dengan Facebook.","danger");
                }else if($status="GP"){
                    $response = array(
                        'status'=>false,
                        'data'=>"Email ini sudah ter registrasi dengan google."
                    );
                    set_global_noti("Email ini sudah ter registrasi dengan goggle.","danger");
                }
            }    
        }else{
            set_global_noti("User ID sudah terdaftar","danger");
        }
        
    }
}
//asdn