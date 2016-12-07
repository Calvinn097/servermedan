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
    }

    function m_get_news(){
        return $this->db->get("sc_news")
        ->result_array();
    }
}
//asdn