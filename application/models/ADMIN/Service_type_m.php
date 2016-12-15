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

    function m_insert_service_type($data){
    	$this->db->insert("sc_service_type",$data);
    }

    function m_get_service_type_by_id($service_type_id){
    	return $this->db->where("service_type_id",$service_type_id)
    	->get("sc_service_type")->row_array();
    }

    function m_update_service_type($data,$service_type_id){
    	$this->db->where("service_type_id",$service_type_id)
    	->update("sc_service_type",$data);
    }

    function m_delete_service_type($service_type_id){
    	$this->db->where("service_type_id",$service_type_id)
    	->delete("sc_service_type");
    }
}
//asdn