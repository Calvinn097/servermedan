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
        ->from("sc_user")->get()->result_array();
    }

}
//asdn