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

    function m_category_count(){
        return $this->db->count_all_results('sc_category');
    }

    function m_get_category($limit=null,$offset=null){
        if($limit!==null && $offset !== null){
            $this->db->limit($limit,$offset);
        }
        return $this->db->get('sc_category')->result_array();
    }

    function m_get_category_by_id($category_id){
        return $this->db->where('category_id',$category_id)
        ->get('sc_category')->row_array();
    }

    function m_insert_sub_category($data){
        $this->db->insert('sc_sub_category',$data);
    }

    function m_get_sub_category($sub_category_id=null){
        if($sub_category_id!==null){
            $this->db->where('sub_category_id',$sub_category_id);
        }
        $this->db->select('sc_sub_category.sub_category_id,sc_sub_category.category_id,sub_category_name,service,reparation,jasa,category_name')
        ->from('sc_sub_category')
        ->join('sc_category',"sc_sub_category.category_id=sc_category.category_id");
        if($sub_category_id!==null){
            return $this->db->get()->row_array();
        }else{
            $data=$this->db->get()->result_array();
            foreach($data as $key=>$row){
                $array[$row['category_name']][]=$row;
            }
            return $array;
        }
    }

    function m_update_sub_category(){
        $sub_category_id = $this->input->post("sub_category_id",true);
        $category_id = $this->input->post('category_id',true);
        $sub_category_name = $this->input->post("sub_category_name",true);
        $type = $this->input->post('type',true);
        $service=false;$reparation=false;$jasa=false;
        foreach($type as $key=>$row){
            if($row=='service'){
                $service=true;
            }
            if($row=='reparation'){
                $reparation=true;
            }
            if($row=='jasa'){
                $jasa=true;
            }
        }
        $update = array(
            'category_id'=>$category_id,
            'sub_category_name'=>$sub_category_name,
            'service'=>intval($service),
            'reparation'=>intval($reparation),'
            jasa'=>intval($jasa)
        );
        $this->db->where('sub_category_id',$sub_category_id);
        $this->db->update("sc_sub_category",$update);

    }

    function m_delete_sub_category($sub_category_id){
        $this->db->where('sub_category_id',$sub_category_id)
        ->delete('sc_sub_category');
    }

    function m_update_category(){
        vd("post",$_POST);
        $category_id = $this->input->post('category_id',true);
        $category_name = $this->input->post("category_name",true);
        $data = array(
            "category_name"=>$category_name
            );
        $this->db->where('category_id',$category_id);
        $this->db->update("sc_category",$data);
    }

    function m_delete_category($category_id){
        $this->db->where('category_id',$category_id)
        ->delete('sc_category');
    }
}
//asdn