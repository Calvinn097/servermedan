
<?php
/**
 * Created by PhpStorm.
 * User: lenovo
 * Date: 02/08/2016
 * Time: 16.37
 */
class Repairman_m extends CI_Model{
    function m_get_repairman($email){
        return $this->db->where("email",$email)
        ->from("sc_user")
        ->join("sc_repairman","sc_user.user_level=sc_repairman.repairman_id")
        ->get()->result_array();
    }
    function m_get_repairman_id_by_user_id($user_id){
    	return $this->db->where("user_id",$user_id)
    	->select("repairman_id")
    	->from("sc_repairman")
    	->get()->row_array()["repairman_id"];
    }
    function m_get_repairman_by_repairman_id($repairman_id){
        return $this->db->where("sc_repairman.repairman_id",$repairman_id)
        ->from("sc_user")
        ->join("sc_repairman","sc_user.user_level=sc_repairman.repairman_id")
        ->get()->row_array();
    }
    function m_get_user_id_by_repairman_id($repairman_id){
    	return $this->db->where("repairman_id",$repairman_id)
    	->select("user_id")
    	->from("sc_repairman")->get()->row_array()["user_id"];
    }

    function m_get_user_posting_by_repairman_id($repairman_id){// duplicated from user.php difference is that this dont where user_id so this show all post form user :D
    	$user_id=$this->m_get_user_id_by_repairman_id($repairman_id);
    	$user_post= $this->db
        ->select("u.user_id,up.content,up.user_post_id,up.service_type_id,up.category_id,up.sub_category_id,up.post_title,up.location_lat,up.location_lng,up.date_posted,up.image,
        c.category_name,
        st.service_type,st.called,
        u.email,u.fname,u.lname,u.user_level,u.phone_number,u.state,u.address,u.postal,u.lat,u.lng,u.status,u.fb_id,u.google_id,u.gender,
        sub_cat.sub_category_name,sub_cat.service,sub_cat.reparation,sub_cat.jasa"
        )
        // ->where("up.user_id",$user_id)
        ->from("sc_user_post up")
        ->join("sc_user u","u.user_id=up.user_id")
        ->join("sc_category c","up.category_id=c.category_id")
        ->join("sc_service_type st","st.service_type_id = up.service_type_id")
        ->join("sc_sub_category sub_cat","sub_cat.category_id=c.category_id")
        ->order_by("date_posted","desc")
        ->get()->result_array();
        // sc.sub_category_name,sc.service,sc.reparation,sc.jasa,
        foreach($user_post as $key=>$row){
            $user_post[$key]["comment"]=$this->m_get_post_comment_by_post_id($row["user_post_id"]);
            $user_post[$key]["like_count"]=$this->m_get_user_post_like_count($row["user_post_id"]);
            // $user_post[$key]["like_by_me"]=$this->m_get_user_post_liked_by_me($row["user_post_id"],$user_id);
            $user_post[$key]["accepted_by_me"]=$this->m_get_post_accepted_status($row["user_post_id"],$repairman_id);
            $user_post[$key]["accepted_by_repairman"]=$this->m_post_is_accepted($row["user_post_id"]);
        }
        return $user_post;
    }

    function m_post_is_accepted($user_post_id){
        return $this->db->where("user_post_id",$user_post_id)
        ->count_all_results("sc_post_accepted");
    }

    function m_get_post_accepted_status($user_post_id,$repairman_id){
        return  $this->db->where("repairman_id",$repairman_id)
        ->where("user_post_id",$user_post_id)
        ->get("sc_post_accepted")->row_array();
    }

    function m_get_post_comment_by_post_id($post_id){ // duplicated from user.php
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

    function m_get_user_post_like_count($user_post_id){// duplicated from user.php
        return $this->db->where("user_post_id",$user_post_id)
        ->count_all_results("sc_user_post_like");
    }

    function m_get_user_post_liked_by_me($user_post_id,$user_id){// duplicated from user.php
        $res = $this->db->where("user_post_id",$user_post_id)
        ->where("user_id",$user_id)
        ->count_all_results("sc_user_post_like");
        if($res>0)
            return true;
        return false;
    }

    function m_insert_request_banner($dat=array(),$api=false){
        $user_id = $dat["user_id"];
        $repairman_id=$this->m_get_repairman_id_by_user_id($user_id);
        if($repairman_id==null){
            if($api){
                return "Harus jadi repairman dulu!";
            }
            else{
                set_global_noti("Harus jadi repairman dulu!","Warning");
                return false;
            }
        }
        $data=array(
            "repairman_id"=>$repairman_id,
            "category_id"=>$this->input->post("category_id",true),
            "sub_category_id"=>$this->input->post("sub_category_id",true),
            "date"=>date("Y-m-d H:i:s")
        );
        $this->db->insert("sc_banner_repairman",$data);
        $insert_id = $this->db->insert_id();
        return $insert_id;
    }

    function m_get_request_banner(){
        $res= $this->db->get("sc_banner_repairman")->result_array();
        foreach($res as $key=>$row){
            $res[$key]["path"]=base_url($row["path"]);
        }
        return $res;

    }

    function m_get_request_banner_by_repairman_id($repairman_id){
        $this->db->select("t1.repairman_banner_id,t1.repairman_id,t1.path,t1.date,t1.approved,t1.category_id,t1.sub_category_id,
t2.category_name,t3.sub_category_name,t3.service,t3.reparation,t3.jasa");
        $this->db->from("sc_banner_repairman t1")
        ->join("sc_category t2","t2.category_id=t1.category_id")
        ->join("sc_sub_category t3","t3.sub_category_id=t1.sub_category_id")
        ->where("t1.repairman_id",$repairman_id);
        $res= $this->db->get()->result_array();
        foreach($res as $key=>$row){
            $res[$key]["path"]=base_url($row["path"]);
        }
        
        foreach($res as $key=>$row){
            $res[$key]["repairman_info"]=$this->m_get_repairman_by_repairman_id($row["repairman_id"]);
        }
        return $res;
    }
    function m_get_request_banner_approved(){
        $this->db->select("t1.repairman_banner_id,t1.repairman_id,t1.path,t1.date,t1.approved,t1.category_id,t1.sub_category_id,
t2.category_name,t3.sub_category_name,t3.service,t3.reparation,t3.jasa");
        $this->db->from("sc_banner_repairman t1")
        ->join("sc_category t2","t2.category_id=t1.category_id")
        ->join("sc_sub_category t3","t3.sub_category_id=t1.sub_category_id")
        ->where("t1.approved",1);
        $res= $this->db->get()->result_array();
        foreach($res as $key=>$row){
            $res[$key]["path"]=base_url($row["path"]);
        }
        
        foreach($res as $key=>$row){
            $res[$key]["repairman_info"]=$this->m_get_repairman_by_repairman_id($row["repairman_id"]);
        }
        return $res;
    }

    function m_get_repairman_banner_image_by_repairman_banner_id($repairman_banner_id){
        return $this->db->where("repairman_banner_id",$repairman_banner_id)
        ->select("path")
        ->get("sc_banner_repairman")->row_array()["path"];
    }

    function m_delete_request_banner($repairman_banner_id){
        $repairman_image = $this->m_get_repairman_banner_image_by_repairman_banner_id($repairman_banner_id);
        // vd("repairman_image",$repairman_image,true);
        $header_image = get_image_folder_path($repairman_image);
        $header_image = storage_path($header_image);
        if(file_exists($header_image)){
            delete_folder($header_image);
        }
        $this->db->where("repairman_banner_id",$repairman_banner_id)
        ->delete("sc_banner_repairman");
        $aff=$this->db->affected_rows();
    }
    function m_edit_profile_repairman($user_id){
        $repairman_id = $this->m_get_repairman_id_by_user_id($user_id);
        $user=$this->input->post("user",true);
        $repairman=$this->input->post("repairman",true);
        $this->db->where("user_id",$user_id)
        ->update("sc_user",$user);
        $this->db->where("repairman_id",$repairman_id)
        ->update("sc_repairman",$repairman);
    }
    function m_get_repairman_name_by_repairman_id($repairman_id){
        return $this->db->select("fname")
        ->where("repairman_id",$repairman_id)
        ->from("sc_user")
        ->join("sc_repairman","sc_user.user_level=sc_repairman.repairman_id")->get()->row_array()["fname"];
    }
    function m_accept_user_post($repairman_id,$post_id,$harga,$estimasi_waktu){
        $my_user_id = $this->m_get_user_id_by_repairman_id($repairman_id);
        $res = $this->db->where("user_post_id",$post_id)
        ->where("user_id",$my_user_id)
        ->count_all_results("sc_user_post");
        if($res==0){
            $array=array(
                "repairman_id"=>$repairman_id,
                "user_post_id"=>$post_id,
                "date_accept"=>date("Y-m-d H:i:s"),
                "price"=>$harga,
                "estimated_time"=>$estimasi_waktu,
                "notif_user"=>"Accepted by ".$this->m_get_repairman_name_by_repairman_id($repairman_id)
            );
            $this->db->insert("sc_post_accepted",$array);
            $post_accepted_id = $this->db->insert_id();    
        }
        
    }
    function m_edit_user_post($repairman_id,$post_id,$harga,$estimasi_waktu){
        $array=array(
            "repairman_id"=>$repairman_id,
            "user_post_id"=>$post_id,
            "price"=>$harga,
            "estimated_time"=>$estimasi_waktu,
            "notif_user"=>"Edited"
        );
        $this->db->where("repairman_id",$repairman_id);
        $this->db->where("user_post_id",$post_id);
        $this->db->update("sc_post_accepted",$array);
        $post_accepted_id = $this->db->insert_id();
    }
    function m_reject_user_post($post_id,$repairman_id){
        $array=array(
            "repairman_id"=>$repairman_id,
            "user_post_id"=>$post_id,
            "date_reject"=>date("Y-m-d H:i:s")
        );
        $this->db->insert("sc_post_rejected",$array);
        $post_accepted_id = $this->db->insert_id();
        $this->db->where("user_post_id",$post_id)
        ->where("repairman_id",$repairman_id)
        ->delete("sc_post_accepted");
    }
    function m_get_accepted_post_by_repairman_id($repairman_id){
        $user_id=$this->m_get_user_id_by_repairman_id($repairman_id);
        $user_post= $this->db
        ->select("u.user_id,up.content,up.user_post_id,up.service_type_id,up.category_id,up.sub_category_id,up.post_title,up.location_lat,up.location_lng,up.date_posted,up.image,
        c.category_name,
        st.service_type,st.called,
        u.email,u.fname,u.lname,u.user_level,u.phone_number,u.state,u.address,u.postal,u.lat,u.lng,u.status,u.fb_id,u.google_id,u.gender,
        post_acc.post_accepted_id,post_acc.date_accept,post_acc.date_dealed,post_acc.user_dealed,post_acc.price,post_acc.estimated_time,post_acc.notif_user,post_acc.notif_repairman,post_acc.repairman_id"
        )
        ->where("post_acc.repairman_id",$repairman_id)
        // ->where("up.user_id",$user_id)
        ->from("sc_user_post up")
        ->join("sc_user u","u.user_id=up.user_id")
        ->join("sc_category c","up.category_id=c.category_id")
        ->join("sc_service_type st","st.service_type_id = up.service_type_id")
        ->join("sc_post_accepted post_acc","post_acc.user_post_id=up.user_post_id")
        ->order_by("date_posted","desc")
        ->get()->result_array();
        // sc.sub_category_name,sc.service,sc.reparation,sc.jasa,
        foreach($user_post as $key=>$row){
            $user_post[$key]["comment"]=$this->m_get_post_comment_by_post_id($row["user_post_id"]);
            // $user_post[$key]["like_count"]=$this->m_get_user_post_like_count($row["user_post_id"]);
        }
        return $user_post;
    }
}
//asdn