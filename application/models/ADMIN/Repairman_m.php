<?php
/**
 * Created by PhpStorm.
 * User: lenovo
 * Date: 02/08/2016
 * Time: 16.37
 */
class Repairman_m extends CI_Model{
    function m_get_request_banner(){
        $this->db->select("t1.repairman_banner_id,t1.repairman_id,t1.path,t1.date,t1.approved,t1.category_id,t1.sub_category_id,
t2.category_name,t3.sub_category_name,t3.service,t3.reparation,t3.jasa");
        $this->db->from("sc_banner_repairman t1")
        ->join("sc_category t2","t2.category_id=t1.category_id")
        ->join("sc_sub_category t3","t3.sub_category_id=t1.sub_category_id");
        $res= $this->db->get()->result_array();
        foreach($res as $key=>$row){
            $res[$key]["path"]=base_url($row["path"]);
        }
        
        foreach($res as $key=>$row){
            $res[$key]["repairman_info"]=$this->m_get_repairman_by_repairman_id($row["repairman_id"]);
        }
        return $res;
    }

    function m_get_repairman_info($repairman_id){
        // $this->db->select("")
    }
    function m_get_repairman_by_email($email){
        return $this->db->where("email",$email)
        ->from("sc_user")
        ->join("sc_repairman","sc_user.user_level=sc_repairman.repairman_id")
        ->get()->row_array();
    }

    function m_get_repairman_by_repairman_id($repairman_id){
        return $this->db->where("sc_repairman.repairman_id",$repairman_id)
        ->from("sc_user")
        ->join("sc_repairman","sc_user.user_level=sc_repairman.repairman_id")
        ->get()->row_array();
    }

    function m_delete_repairman_banner($repairman_banner_id){
        $repairman_image = $this->m_get_repairman_banner_image_by_repairman_banner_id($repairman_banner_id);
        // vd("repairman_image",$repairman_image,true);
        $header_image = get_image_folder_path($repairman_image);
        $header_image = storage_path($header_image);
        if(file_exists($header_image)){
            delete_folder($header_image);
        }
        $this->db->where("repairman_banner_id",$repairman_banner_id)
        ->delete("sc_banner_repairman");
    }

    function m_approve_repairman_banner($repairman_banner_id){
        $data=array(
            "approved"=>1
        );
        $this->db->where("repairman_banner_id",$repairman_banner_id)
        ->update("sc_banner_repairman",$data);
    }
    function m_disapprove_repairman_banner($repairman_banner_id){
        $data=array(
            "approved"=>0
        );
        $this->db->where("repairman_banner_id",$repairman_banner_id)
        ->update("sc_banner_repairman",$data);
    }

    function m_get_repairman_banner_image_by_repairman_banner_id($repairman_banner_id){
        return $this->db->where("repairman_banner_id",$repairman_banner_id)
        ->select("path")
        ->get("sc_banner_repairman")->row_array()["path"];
    }

}
//asdn