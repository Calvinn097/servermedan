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

    function m_get_user_id_by_fb_id($fb_id){
        return $this->db->where("fb_id",$fb_id)
        ->get()->row_array()["fb_id"];
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

    function m_insert_user_posting(){

        $array=array(
            "content"=>$this->input->post("content",true),
            "service_type_id"=>$this->input->post("service_type_id",true),
            "category_id"=>$this->input->post("category_id",true),
            "sub_category_id"=>$this->input->post("sub_category_id",true),
            "location_lat"=>$this->input->post("location_lat",true),
            "location_lng"=>$this->input->post("location_lng",true),
            "date_posted"=>date("Y-m-d H:i:s"),
            "user_id"=>user_login_info()["user_id"],
            "post_title"=>$this->input->post("post_title",true)
        );
        // vd("user_file",$_FILES);
        $post_id=$this->m_insert_post($array);
        $path = "/asset/images/post/$post_id";
        $this->load->model("MAIN/Image_m");
        $this->Image_m->m_upload_pic($path,$post_id,"user_post_id","image","sc_user_post");
        // vd("array",$array,true);


    }

    function m_insert_post($data){
        $this->db->insert("sc_user_post",$data);
        $insert_id=$this->db->insert_id();
        return $insert_id;
    }

    function m_get_user_posting_by_user_id($user_id=null,$api=false){
        $user_post= $this->db
        ->select("u.user_id,up.content,up.user_post_id,up.service_type_id,up.category_id,up.sub_category_id,up.post_title,up.location_lat,up.location_lng,up.date_posted,up.image,
        c.category_name,
        st.service_type,st.called,
        u.email,u.fname,u.lname,u.user_level,u.phone_number,u.state,u.address,u.postal,u.lat,u.lng,u.status,u.fb_id,u.google_id,u.gender"
        )
        ->where("up.user_id",$user_id)
        ->from("sc_user_post up")
        ->join("sc_user u","u.user_id=up.user_id")
        ->join("sc_category c","up.category_id=c.category_id")
        ->join("sc_service_type st","st.service_type_id = up.service_type_id")
        ->order_by("date_posted","desc")
        ->get()->result_array();
        // sc.sub_category_name,sc.service,sc.reparation,sc.jasa,
        foreach($user_post as $key=>$row){
            $user_post[$key]["comment"]=$this->m_get_post_comment_by_post_id($row["user_post_id"]);
        }
        return $user_post;
    }

    function m_get_post_comment_by_post_id($post_id){
        $res = $this->db
            ->select("u.email,u.fname,u.lname,u.user_level,u.phone_number,u.state,u.address,u.postal,u.lat,u.lng,u.status,u.fb_id,u.google_id,u.gender,u.user_id,
            pc.post_comment_id,pc.user_post_id,pc.comment,pc.date")
            ->where("user_post_id",$post_id)
            ->from("sc_post_comment pc")
            ->join("sc_user u","pc.user_id=u.user_id")
            ->order_by("pc.date","desc")
            ->get()->result_array();
        if(count($res)==0){
            return array();
        }else{
            return $res;
        }
    }
}
//asdn