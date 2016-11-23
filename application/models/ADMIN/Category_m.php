<?php
/**
 * Created by PhpStorm.
 * User: lenovo
 * Date: 02/08/2016
 * Time: 16.37
 */
class Category_m extends CI_Model{
    function m_insert_category($data){
        $this->db->insert('sc_category',$data);
    }
}
//asdn