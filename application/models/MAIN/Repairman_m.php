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
        u.email,u.fname,u.lname,u.user_level,u.phone_number,u.state,u.address,u.postal,u.lat,u.lng,u.status,u.fb_id,u.google_id,u.gender"
        )
        // ->where("up.user_id",$user_id)
        ->from("sc_user_post up")
        ->join("sc_user u","u.user_id=up.user_id")
        ->join("sc_category c","up.category_id=c.category_id")
        ->join("sc_service_type st","st.service_type_id = up.service_type_id")
        ->order_by("date_posted","desc")
        ->get()->result_array();
        // sc.sub_category_name,sc.service,sc.reparation,sc.jasa,
        foreach($user_post as $key=>$row){
            $user_post[$key]["comment"]=$this->m_get_post_comment_by_post_id($row["user_post_id"]);
            $user_post[$key]["like_count"]=$this->m_get_user_post_like_count($row["user_post_id"]);
            $user_post[$key]["like_by_me"]=$this->m_get_user_post_liked_by_me($row["user_post_id"],$user_id);
        }
        return $user_post;
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
        $res= $this->db->where("repairman_id",$repairman_id)
        ->get("sc_banner_repairman")->result_array();
        foreach($res as $key=>$row){
            $res[$key]["path"]=base_url($row["path"]);
        }
        return $res;
    }

    function m_delete_request_banner($banner_id){
        return $this->db->where("repairman_banner_id",$banner_id)
        ->delete("sc_banner_repairman");
    }



}
//asdn