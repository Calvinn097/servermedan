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
        $email="calvinwangxz@gmail.com";
        $password="calvin123";
        // $email="repairman@gmail.com";
        // $password="calvin123";
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
        ->get("sc_user")->row_array()["user_id"];
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
    function m_check_email_exist_2($email){
        $res=$this->db->where("email",$email)->count_all_results("sc_user");
        if($res>0){
            return true;
        }
        return false;
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

    function m_get_user_image($user_id){
        return $this->db->select("user_image")
        ->where("user_id",$user_id)
        ->get("sc_user")->row_array()["user_image"];
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

    function m_get_user_name_by_email($email){
        $res=$this->db->where("email",$email)
        ->select("fname,lname")
        ->get("sc_user")->row_array();
        return $res;
    }
    function m_forgot_password($email,$code){
        $data = array(
            "pass_recovery"=>$code
        );
        $this->db->where("email",$email);
        $this->db->update("sc_user",$data);
    }
    function m_forgot_password_validation($email,$code){
        if($code==null){
            return false;
        }
        $res=$this->db->where("email",$email)
        ->where("pass_recovery",$code)
        ->count_all_results("sc_user");
        if($res>0){
            return true;
        }else{
            return false;
        }
    }
    function m_change_password_via_recovery($user_id){
        $password=$this->input->post("password",true);
        $rpassword=$this->input->post("rpassword",true);
        $code=$this->input->post("code",true);
        // vd("user_id",$user_id);
        // vd("poast",$_POST,true);
        if($code==null){
            return 0;
        }
        $data=array(
            "password"=>md5($password),
            "pass_recovery"=>null
        );
        $this->db->where("pass_recovery",$code);
        $this->db->where("user_id",$user_id);
        $this->db->update("sc_user",$data);
        $affected_rows=$this->db->affected_rows();
        return $affected_rows;
    }
    function m_get_user_by_email($email){
        return $this->db->where("email",$email)
        ->from("sc_user")
        ->get()->row_array();
    }

    function m_get_user_by_user_id($user_id){
        return $this->db->where("user_id",$user_id)
        ->from("sc_user")
        ->get()->row_array();
    }
    function m_edit_user_profile($user_id){
        $user = $this->input->post("user",true);
        $this->db->where("user_id",$user_id)
        ->update("sc_user",$user);
    }

    function m_insert_user_posting(){
       // vd("post",$_POST,true);
        $array=array(
            "content"=>$this->input->post("content",true),
            "service_type_id"=>$this->input->post("service_type_id",true),
            "category_id"=>$this->input->post("category_id",true),
            "sub_category_id"=>$this->input->post("sub_category_id",true),
            "location_lat"=>$this->input->post("location_lat",true),
            "location_lng"=>$this->input->post("location_lng",true),
            "date_posted"=>date("Y-m-d H:i:s"),
            "user_id"=>user_login_info()["user_id"],
            "post_title"=>$this->input->post("post_title",true),
            "user_lat"=>$this->input->post("user_lat",true),
            "user_lng"=>$this->input->post("user_lng",true),
            "address"=>$this->input->post("address",true)
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
        u.email,u.fname,u.lname,u.user_level,u.phone_number,u.state,u.address,u.postal,u.lat,u.lng,u.status,u.fb_id,u.google_id,u.gender,sc_sub_category.sub_category_name"

        )
        ->where("up.user_id",$user_id)
        ->from("sc_user_post up")
        ->join("sc_user u","u.user_id=up.user_id")
        ->join("sc_category c","up.category_id=c.category_id")
        ->join("sc_sub_category","sc_sub_category.category_id=c.category_id")
        ->join("sc_service_type st","st.service_type_id = up.service_type_id")
        ->order_by("date_posted","desc")
        ->get()->result_array();
        // sc.sub_category_name,sc.service,sc.reparation,sc.jasa,
        foreach($user_post as $key=>$row){
            $user_post[$key]["comment"]=$this->m_get_post_comment_by_post_id($row["user_post_id"]);
            $user_post[$key]["progress"]=$this->m_post_is_dealed($row["user_post_id"]);

            
            if($user_post[$key]["progress"]==""){
                $user_post[$key]["progress"]=$this->m_post_is_accepted($row["user_post_id"]);
            }
            if($user_post[$key]["progress"]==""){
                $user_post[$key]["progress"]=$this->m_post_is_rejected($row["user_post_id"]);
            }
            $user_post[$key]["progress"]=$this->m_post_is_finished($row["user_post_id"]);
            if($user_post[$key]["progress"]==""){
                $user_post[$key]["progress"]="open";
            }
            // $user_post[$key]["like_count"]=$this->m_get_user_post_like_count($row["user_post_id"]);
            // $user_post[$key]["like_by_me"]=$this->m_get_user_post_liked_by_me($row["user_post_id"],$user_id);
        }
        return $user_post;
    }
    function m_post_is_finished($user_post_id){
        $res = $this->db->where("user_post_id",$user_post_id)
        ->count_all_results("sc_post_finished");
        if($res>0){
            return "Finished";
        }
        return "";
    }
    function m_post_is_accepted($user_post_id){
        $res= $this->db->where("user_post_id",$user_post_id)
        ->count_all_results("sc_post_accepted");
        if($res>0){
            return "Accepted";
        }
        return "";
    }
    function m_post_is_dealed($user_post_id){
        if( $this->db->where("user_post_id",$user_post_id)
        ->where("user_dealed>",0)
        ->count_all_results("sc_post_accepted")>0){
            return "Dealed";
        }
        return "";
    }

    function m_post_is_rejected($user_post_id){
        $res = $this->db->where("user_post_id",$user_post_id)
        ->count_all_results("sc_post_rejected");
        if($res>0){
            return "rejected";
        }
        return "";
    }

    function m_get_accepted_post($user_post_id){
        return $this->db->select("pa.post_accepted_id,pa.repairman_id,pa.user_post_id,pa.date_accept,pa.date_dealed,pa.user_dealed,pa.price,pa.estimated_time,
            r.user_id,r.score,r.number_job,r.keahlian
            ")
        ->from("sc_post_accepted pa")
        ->join("sc_repairman r","r.repairman_id=pa.repairman_id")
        ->join("sc_user u","u.user_level=r.repairman_id")
        ->where("user_post_id",$user_post_id)
        ->get()->result_array();
    }

    function m_get_post_accepted_by_repairman_id_post_id($user_post_id,$repairman_id){
        return $this->db->select("pa.post_accepted_id,pa.repairman_id,pa.user_post_id,pa.date_accept,pa.date_dealed,pa.user_dealed,pa.price,pa.estimated_time,
            r.user_id,r.score,r.number_job,r.keahlian
            ")
        ->where("pa.user_post_id",$user_post_id)
        ->where("pa.repairman_id",$repairman_id)
        ->from("sc_post_accepted pa")
        ->join("sc_repairman r","r.repairman_id=pa.repairman_id")
        ->join("sc_user u","u.user_level=r.repairman_id")
        ->where("user_post_id",$user_post_id)
        ->get()->row_array();
    }

    function m_user_get_user_posting_by_user_post_id($user_post_id,$user_id){
        $user_post= $this->db
        ->select("u.user_id,up.content,up.user_post_id,up.service_type_id,up.category_id,up.sub_category_id,up.post_title,up.location_lat,up.location_lng,up.date_posted,up.image,up.user_lat,up.user_lng,up.address as post_address,
        c.category_name,
        st.service_type,st.called,
        u.email,u.fname,u.lname,u.user_level,u.phone_number,u.state,u.address,u.postal,u.lat,u.lng,u.status,u.fb_id,u.google_id,u.gender,sc_sub_category.sub_category_name"
        )
        ->where("up.user_post_id",$user_post_id)
        ->where("up.user_id",$user_id)
        ->from("sc_user_post up")
        ->join("sc_user u","u.user_id=up.user_id")
        ->join("sc_category c","up.category_id=c.category_id")
        ->join("sc_sub_category","sc_sub_category.category_id=c.category_id")
        ->join("sc_service_type st","st.service_type_id = up.service_type_id")
        ->order_by("date_posted","desc")
        ->get()->row_array();
        // sc.sub_category_name,sc.service,sc.reparation,sc.jasa,
        if($user_post==null){
            return null;
        }
        $user_post["comment"]=$this->m_get_post_comment_by_post_id($user_post["user_post_id"]);
        return $user_post;   
    }

    function m_repairman_get_user_posting_by_user_post_id($user_post_id,$repairman_id){
        $user_post= $this->db
        ->select("u.user_id,up.content,up.user_post_id,up.service_type_id,up.category_id,up.sub_category_id,up.post_title,up.location_lat,up.location_lng,up.date_posted,up.image,up.user_lat,up.user_lng,up.address as post_address,
        c.category_name,
        st.service_type,st.called,
        u.email,u.fname,u.lname,u.user_level,u.phone_number,u.state,u.address,u.postal,u.lat,u.lng,u.status,u.fb_id,u.google_id,u.gender,sc_sub_category.sub_category_name"
        )
        ->where("up.user_post_id",$user_post_id)
        ->from("sc_user_post up")
        ->join("sc_user u","u.user_id=up.user_id")
        ->join("sc_category c","up.category_id=c.category_id")
        ->join("sc_sub_category","sc_sub_category.category_id=c.category_id")
        ->join("sc_service_type st","st.service_type_id = up.service_type_id")
        ->order_by("date_posted","desc")
        ->get()->row_array();
        if($user_post==null){
            return null;
        }
        // sc.sub_category_name,sc.service,sc.reparation,sc.jasa,
        $user_post["comment"]=$this->m_get_post_comment_by_post_id($user_post["user_post_id"]);
        return $user_post;   
    }

    function m_repairman_check_post_accepted($user_post_id,$repairman_id){
        return $this->db->where("user_post_id",$user_post_id)
        ->where("repairman_id",$repairman_id)
        ->count_all_results("sc_post_accepted");
    }

    function m_get_post_comment_by_post_id($post_id){
        $res = $this->db
            ->select("u.email,u.fname,u.lname,u.user_level,u.phone_number,u.state,u.address,u.postal,u.lat,u.lng,u.status,u.fb_id,u.google_id,u.gender,u.user_id,
            pc.post_comment_id,pc.user_post_id,pc.comment,pc.date")
            ->where("user_post_id",$post_id)
            ->from("sc_post_comment pc")
            ->join("sc_user u","pc.user_id=u.user_id")
            ->order_by("pc.date","asc")
            ->get()->result_array();
        if(count($res)==0){
            return array();
        }else{
            return $res;
        }
    }

    function m_get_post_accepted_comment_by_post_id($post_accepted_id){
        $res = $this->db
            ->select("u.email,u.fname,u.lname,u.user_level,u.phone_number,u.state,u.address,u.postal,u.lat,u.lng,u.status,u.fb_id,u.google_id,u.gender,u.user_id,
            pc.post_accepted_comment_id,pc.post_accepted_id,pc.comment,pc.date")
            ->where("p_acc.post_accepted_id",$post_accepted_id)
            ->from("sc_post_accepted_comment pc")
            ->join("sc_post_accepted p_acc","p_acc.post_accepted_id=pc.post_accepted_id")
            ->join("sc_user u","pc.user_id=u.user_id")
            ->order_by("pc.date","asc")
            ->get()->result_array();
        if(count($res)==0){
            return array();
        }else{
            return $res;
        }   
    }

    function m_get_post_accepted_comment_by_post_id_repairman_id($post_accepted_id,$repairman_id){
        $res = $this->db
            ->select("u.email,u.fname,u.lname,u.user_level,u.phone_number,u.state,u.address,u.postal,u.lat,u.lng,u.status,u.fb_id,u.google_id,u.gender,u.user_id,
            pc.post_accepted_comment_id,pc.post_accepted_id,pc.comment,pc.date")
            ->where("p_acc.post_accepted_id",$post_accepted_id)
            ->where("p_acc.repairman_id",$repairman_id)
            ->from("sc_post_accepted_comment pc")
            ->join("sc_post_accepted p_acc","p_acc.post_accepted_id=pc.post_accepted_id")
            ->join("sc_user u","pc.user_id=u.user_id")
            ->order_by("pc.date","asc")
            ->get()->result_array();
        if(count($res)==0){
            return array();
        }else{
            return $res;
        }      
    }

    function m_get_user_post_like_count($user_post_id){
        return $this->db->where("user_post_id",$user_post_id)
        ->count_all_results("sc_user_post_like");
    }

    function m_get_user_post_liked_by_me($user_post_id,$user_id){
        $res = $this->db->where("user_post_id",$user_post_id)
        ->where("user_id",$user_id)
        ->count_all_results("sc_user_post_like");
        if($res>0)
            return true;
        return false;
    }

    function m_user_comment($user_id){
        $post_id = $this->input->post("user_post_id",true);
        $comment = $this->input->post("comment",true);
        $data = array(
            "user_post_id"=>$post_id,
            "comment"=>$comment,
            "user_id"=>$user_id,
            "date"=>date("Y-m-d H:i:s")
        );
        $this->db->insert("sc_post_comment",$data);
    }

    function m_user_post_like_action($user_post_id,$user_id){
        $liked_by_user = $this->m_check_user_post_liked_by_user_id($user_post_id,$user_id);
        if(!$liked_by_user){
            $data = array(
            "user_post_id"=>$user_post_id,
            "user_id"=>$user_id,
            "date_liked"=>date("Y-m-d H:i:s")
            );
            $this->db->insert("sc_user_post_like",$data);
            return true;
        }else{
            $this->db->where("user_id",$user_id)
            ->where("user_post_id",$user_post_id)
            ->delete("sc_user_post_like");
            return false;
        }
    }

    function m_check_user_post_liked_by_user_id($user_post_id,$user_id){
        $res = $this->db->where("user_post_id",$user_post_id)
        ->where("user_id",$user_id)
        ->count_all_results("sc_user_post_like");
        if($res>0)
            return true;
        return false;
    }

    function m_become_repairman($user_id){
        if($this->m_check_repairman_exist_by_user_id($user_id)>0){

        }else{
            $data=array(
                "user_id"=>$user_id
            );
            $this->db->insert("sc_repairman",$data);
            $insert_id = $this->db->insert_id();
            $data=array(
                "user_level"=>$insert_id
            );
            $this->db->where("user_id",$user_id)
            ->update("sc_user",$data);
        }
    }
    function m_check_repairman_exist_by_user_id($user_id){
        return $this->db->where("user_id",$user_id)->count_all_results("sc_repairman");
    }
    function m_get_rank(){
        return $this->db
        ->select("t2.user_id,t2.email,t2.fname,t2.lname,t2.password,t2.user_level,t2.phone_number,t2.state,t2.address,t2.postal,t2.lat,t2.lng,t2.fb_id,t2.google_id,t2.gender,
            t1.repairman_id,t1.user_id,t1.score,t1.number_job,t1.keahlian,(t1.score+t1.keahlian) as point
            ")
        ->order_by("point","DESC")
        ->from("sc_repairman t1")
        ->join("sc_user t2","t2.user_level=t1.repairman_id")
        ->get()->result_array();
    }
    function m_get_user_notification_by_user_id($user_id){
        $user_post= $this->db
        ->select("u.user_id,up.content,up.user_post_id,up.service_type_id,up.category_id,up.sub_category_id,up.post_title,up.location_lat,up.location_lng,up.date_posted,up.image,
        c.category_name,
        st.service_type,st.called,
        u.email,u.fname,u.lname,u.user_level,u.phone_number,u.state,u.address,u.postal,u.lat,u.lng,u.status,u.fb_id,u.google_id,u.gender,sc_sub_category.sub_category_name,
        p_acc.date_accept,p_acc.date_dealed,p_acc.user_dealed,p_acc.price,p_acc.estimated_time,p_acc.notif_user,p_acc.repairman_id as repairman_accepter_id"

        )
        ->where("up.user_id",$user_id)
        ->from("sc_user_post up")
        ->join("sc_user u","u.user_id=up.user_id")
        ->join("sc_category c","up.category_id=c.category_id")
        ->join("sc_sub_category","sc_sub_category.category_id=c.category_id")
        ->join("sc_service_type st","st.service_type_id = up.service_type_id")
        ->join("sc_post_accepted p_acc","p_acc.user_post_id=up.user_post_id")
        ->where("notif_user!=","")
        ->order_by("date_posted","desc")
        ->get()->result_array();
        // sc.sub_category_name,sc.service,sc.reparation,sc.jasa,
        if(is_array($user_post) && count($user_post)==0){
            return array();
        }
        foreach($user_post as $key=>$row){
            $user_post[$key]["comment"]=$this->m_get_post_comment_by_post_id($row["user_post_id"]);
            // $user_post[$key]["like_count"]=$this->m_get_user_post_like_count($row["user_post_id"]);
            // $user_post[$key]["like_by_me"]=$this->m_get_user_post_liked_by_me($row["user_post_id"],$user_id);
            $user_post[$key]["repairman_accepter_name"]=$this->m_get_repairman_name_by_repairman_id($user_post[$key]["repairman_accepter_id"]);
        }
        return $user_post;
    }
    function m_get_all_repairman_that_accept_list_by_user_post_id($user_post_id,$user_id){
        $user_post= $this->db
        ->select("u.user_id,up.content,up.user_post_id,up.service_type_id,up.category_id,up.sub_category_id,up.post_title,up.location_lat,up.location_lng,up.date_posted,up.image,
        c.category_name,
        st.service_type,st.called,
        u.email,u.fname,u.lname,u.user_level,u.phone_number,u.state,u.address,u.postal,u.lat,u.lng,u.status,u.fb_id,u.google_id,u.gender,sc_sub_category.sub_category_name,
        p_acc.date_accept,p_acc.date_dealed,p_acc.user_dealed,p_acc.price,p_acc.estimated_time,p_acc.notif_user,p_acc.repairman_id as repairman_accepter_id,p_acc.post_accepted_id"

        )
        ->from("sc_user_post up")
        ->join("sc_user u","u.user_id=up.user_id")
        ->join("sc_category c","up.category_id=c.category_id")
        ->join("sc_sub_category","sc_sub_category.category_id=c.category_id")
        ->join("sc_service_type st","st.service_type_id = up.service_type_id")
        ->join("sc_post_accepted p_acc","p_acc.user_post_id=up.user_post_id")
        ->where("p_acc.user_post_id",$user_post_id)
        ->where("up.user_id",$user_id)
        ->order_by("date_posted","desc")
        ->get()->result_array();
        // sc.sub_category_name,sc.service,sc.reparation,sc.jasa,
        if(is_array($user_post) && count($user_post)==0){
            return array();
        }
        foreach($user_post as $key=>$row){
            $user_post[$key]["comment"]=$this->m_get_post_accepted_comment_by_post_id($row["post_accepted_id"]);
            // $user_post[$key]["like_count"]=$this->m_get_user_post_like_count($row["user_post_id"]);
            // $user_post[$key]["like_by_me"]=$this->m_get_user_post_liked_by_me($row["user_post_id"],$user_id);
            $user_post[$key]["repairman_accepter_name"]=$this->m_get_repairman_name_by_repairman_id($user_post[$key]["repairman_accepter_id"]);
        }
        return $user_post;
    }
    function m_get_repairman_name_by_repairman_id($repairman_id){
        $this->db->where("repairman_id",$repairman_id)
        ->select("fname,lname");
        $res=$this->db->from("sc_repairman")
        ->join("sc_user","sc_user.user_id=sc_repairman.user_id")
        ->get()->row_array();
        return $res["fname"]." ".$res["lname"];
        
    }
    function m_get_repairman_id_by_user_id($user_id){
        return $this->db->select("repairman_id")
        ->where("rp.user_id",$user_id)
        ->from("sc_repairman rp")
        ->join("sc_user u","u.user_id=rp.user_id")
        ->get()->row_array()["repairman_id"];
    }
    function m_comment_post_accepted($data){
        $post_accepted_id = $data["post_accepted_id"];
        $user_id = $data["user_id"];
        $repairman_id = $this->m_get_repairman_id_by_user_id($user_id);
        if($repairman_id!=null){
            $repairman_accepter_id = $this->db->where("post_accepted_id",$post_accepted_id)
            ->where("repairman_id",$repairman_id)
            ->select("repairman_id")
            ->get("sc_post_accepted")->row_array()["repairman_id"];
            if($repairman_id!=$repairman_accepter_id){
                redirect(base_url());
                set_global_noti("you cant comment on other user post");
            }    
            else{
                $this->db->insert("sc_post_accepted_comment",$data);
            }
        }else if($user_id!=null){
            $user_id_that_posted = $this->db->where("post_accepted_id",$post_accepted_id)
            ->from("sc_post_accepted")
            ->join("sc_user_post","sc_user_post.user_post_id=sc_post_accepted.user_post_id")
            ->select("sc_user_post.user_id")
            ->get()->row_array()["user_id"];
            if($user_id_that_posted!=$user_id){
                redirect(base_url());
                set_global_noti("you cant comment on other user post");
            }else{
                $this->db->insert("sc_post_accepted_comment",$data);
            }
        }
        

    }
    function m_get_post_id_by_post_accepted_id($post_accepted_id){
        return $this->db->where("post_accepted_id",$post_accepted_id)
        ->select("sc_post_accepted.user_post_id")
        ->from("sc_post_accepted")
        ->join("sc_user_post","sc_user_post.user_post_id=sc_post_accepted.user_post_id")
        ->get()->row_array()["user_post_id"];
    }
    function m_clear_notification($user_post_id,$user_id){
        if($user_post_id!=null && $user_id !=null){
            $is_author=$this->m_is_author_of_post($user_id,$user_post_id);
            $res = $this->db->where("p_acc.user_post_id",$user_post_id)
            ->where("up.user_id",$user_id)
            ->from("sc_post_accepted p_acc")
            ->join("sc_user_post up","up.user_post_id=p_acc.user_post_id")
            ->count_all_results();
            if($res>0){
                if(!$is_author){
                    $data=array(
                        "notif_repairman"=>""
                    );
                }else{
                    $data=array(
                        "notif_user"=>""
                    );
                }
                
                $this->db->where("user_post_id",$user_post_id)
                ->update("sc_post_accepted",$data);
            }
        }
    }

    function m_is_author_of_post($user_id,$user_post_id){
        $res=$this->db->where("user_id",$user_id)   
        ->where("user_post_id",$user_post_id)
        ->count_all_results("sc_user_post");
        if($res>0){
            return true;
        }
        return false;
    }
    function m_deal_accepted_post_by_post_id($post_accepted_id,$user_post_id,$user_id){
        $data=array(
            "user_dealed"=>$user_id,
            "date_dealed"=>date("Y-m-d H:i:s"),
            "notif_repairman"=>"Dealed"
        );
        $this->db->where("user_post_id",$user_post_id)
        ->where("post_accepted_id",$post_accepted_id)
        ->update("sc_post_accepted",$data);
        $rejected=$this->db->where("user_post_id",$user_post_id)
        ->where("user_dealed",0)
        ->get("sc_post_accepted")->result_array();
        foreach($rejected as $key=>$row){
            $data=array(
                "user_post_id"=>$row["user_post_id"],
                "user_id"=>$user_id
            );
            $this->m_reject_accepted_post($data);
        }
        $this->db->where("user_post_id",$user_post_id)
        ->where("user_dealed",0)
        ->delete("sc_post_accepted");

    }

    function m_reject_accepted_post($data){
        $this->db->insert("sc_post_rejected",$data);
    }

    function m_reject_accepted_post_by_post_id($post_accepted_id,$user_post_id,$user_id){
        $rejected=$this->db->where("post_accepted_id",$post_accepted_id)
        ->get("sc_post_accepted")->row_array();
        $data=array(
            "repairman_id"=>$rejected["repairman_id"],
            "user_post_id"=>$rejected["user_post_id"],
            "user_id"=>$user_id
        );
        $this->db->where("post_accepted_id",$post_accepted_id)
        ->where("user_dealed",0);
        $this->db->delete("sc_post_accepted");
    }
    function m_finish_post($post_accepted_id,$user_post_id,$user_id,$review,$rate){
        $finished=$this->db->where("post_accepted_id",$post_accepted_id)
        ->where("user_dealed>",0)
        ->get("sc_post_accepted")->row_array();
        $finished["review"]=$review;
        $finished["rate"]=$rate;
        $finished["date_finished"]=date("Y-m-d H:i:s");
        $repairman_id = $finished["repairman_id"];
        $score=$this->m_get_repairman_score($repairman_id);
        $score+=$finished["rate"];
        $this->m_set_repairman_score($score,$repairman_id);
        
        unset($finished["post_accepted_id"]);
        $this->db->insert("sc_post_finished",$finished);
        $this->m_update_number_job($repairman_id);
        $this->db->where("post_accepted_id",$post_accepted_id)
        ->where("user_dealed>",0)
        ->delete("sc_post_accepted");
    }
    function m_get_repairman_score($repairman_id){
        return $this->db->select("score")
        ->where("repairman_id",$repairman_id)
        ->get("sc_repairman")->row_array()["score"];
    }
    function m_set_repairman_score($score,$repairman_id){
        $data=array(
            "score"=>$score);
        $this->db->where("repairman_id",$repairman_id)
        ->update("sc_repairman",$data);
    }
    function m_update_number_job($repairman_id){
        $res=$this->db->where("repairman_id",$repairman_id)
        ->count_all_results("sc_post_finished");
        $data=array(
            "number_job"=>$res);
        $this->db->where("repairman_id",$repairman_id)
        ->update("sc_repairman",$data);
    }
    function m_get_finished($user_post_id){
        return $this->db->where("user_post_id",$user_post_id)
        ->get("sc_post_finished")->row_array();
    }
    function m_is_finisher($post_finished_id,$repairman_id){
        $res = $this->db->where("repairman_id",$repairman_id)
        ->where("post_finished_id",$post_finished_id)
        ->count_all_results("sc_post_finished");
        if($res>0){
            return true;
        }
        return false;
    }
    function m_mark_lunas($post_finished_id){
        $data=array(
            "lunas"=>1
        );
        $this->db->where("post_finished_id",$post_finished_id)
        ->update("sc_post_finished",$data);
    }
}
//asdn
