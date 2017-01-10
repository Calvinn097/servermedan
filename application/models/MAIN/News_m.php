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
    function m_get_news_by_id($news_id){
    	return $this->db->where("news_id",$news_id)
    	->get("sc_news")->row_array();	
    }
}
//asdn