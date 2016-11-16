<?php
/**
 * Created by PhpStorm.
 * User: lenovo
 * Date: 02/08/2016
 * Time: 16.37
 */
class User_m extends CI_Model{
    function m_insert_user($data)
    {
        $this->db->insert("sc_user",$data);
    }
}