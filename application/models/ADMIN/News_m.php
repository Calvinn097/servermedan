<?php
/**
 * Created by PhpStorm.
 * User: lenovo
 * Date: 02/08/2016
 * Time: 16.37
 */
class News_m extends CI_Model{

    function m_get_news_category(){
        return $this->db->get("sc_news_category")->result_array();
    }

    function m_save_news($data){
        $this->db->insert("sc_news",$data);
        $insertid = $this->db->insert_id();
        return $insertid;
    }

    function m_get_news($limit=null,$offset=null){
        if($limit!==null && $offset !== null){
            $this->db->limit($limit,$offset);
        }
        return $this->db->order_by("date_created","desc")->get("sc_news")
        ->result_array();
    }

    function m_get_news_by_id($news_id){
        return $this->db->where("news_id",$news_id)
        ->get("sc_news")->row_array();
    }

    function m_news_count(){
        return $this->db->count_all_results("sc_news");
    }

    function m_edit_news($news_id,$data){
        $this->db->where("news_id",$news_id)
        ->update("sc_news",$data);
    }

    function m_delete_news($news_id){
        $header_image = $this->m_get_news_header_image($news_id);
        if($header_image!=null){
            $header_image = get_image_folder_path(get_image_folder_path($header_image));
            $header_image = storage_path($header_image);
            if(file_exists($header_image)){
                delete_folder($header_image);
            }
        }
        $this->db->where("news_id",$news_id)
        ->delete("sc_news");
    }

    function m_get_news_header_image($news_id){
        return $this->db->select("header_image")
        ->where("news_id",$news_id)
        ->get("sc_news")->row_array()["header_image"];
    }
}
//asdn