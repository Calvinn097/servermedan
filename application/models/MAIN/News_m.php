<?php
/**
 * Created by PhpStorm.
 * User: lenovo
 * Date: 02/08/2016
 * Time: 16.37
 */
class News_m extends CI_Model{
    function m_get_news($limit=null,$offset=null){
        if($limit!==null && $offset !== null){
            $this->db->limit($limit,$offset);
        }
        return $this->db->order_by("date_created","desc")->get("sc_news")
        ->result_array();
    }

    function m_get_detail($id)
    {
        return $this->db->where("news_id", $id)
        ->from("sc_news")
        ->join("sc_news_category", "sc_news.news_category_id = sc_news_category.news_category_id")
        ->get()->row_array();
    }

    function m_get_category()
    {
        return $this->db->get("sc_news_category")->result_array();
    }
}
//asdn