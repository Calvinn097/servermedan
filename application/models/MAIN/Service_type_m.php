<?php
/**
 * Created by PhpStorm.
 * User: lenovo
 * Date: 02/08/2016
 * Time: 16.37
 */
class Service_type_m extends CI_Model{
    function m_get_service_type(){
        return $this->db->get("sc_service_type")->result_array();
    }
}
//asdn