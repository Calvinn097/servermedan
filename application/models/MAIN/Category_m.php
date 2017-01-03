<?php
/**
 * Created by PhpStorm.
 * User: lenovo
 * Date: 02/08/2016
 * Time: 16.37
 */
class Category_m extends CI_Model{
    function m_get_category($api=false){
        return $this->db->get("sc_category")->result_array();
    }
    function m_get_sub_category_list(){
        return $this->db->get("sc_sub_category")->result_array();
    }
    function m_get_sub_category_by_category_id($category_id){
        return $this->db->where("category_id",$category_id)
        ->from("sc_sub_category")
        ->get()->result_array();
    }
    function m_insert_user($api=false)
    {
        $fname=strtolower($this->input->post("fname",true));
        $lname=strtolower($this->input->post("lname",true));
        $email = strtolower($this->input->post("email",true));
        $password = strtolower($this->input->post("password",true));
        $rpassword = strtolower($this->input->post("rpassword",true));

        if($password!=$password){

        }
        if($this->form_validation->run("signup")==false){

            if(!$api){
                $this->session->set_flashdata("signup_err",$this->form_validation->error_array());
                //vd("asd",$this->form_validation->error_array());
                //die('asd');
                $populate = array(
                    "fname"=>$fname,
                    "lname"=>$lname,
                    "email"=>$email,
                );
                $this->session->set_flashdata("signup_form_populate",$populate);
                redirect();
            }else{
                $response=array(
                    'status'=>false,
                    'data'=>$this->form_validation->error_array()
                );
                return $response;
            }
        }else{
            $password = md5($this->input->post("password",true));
            $data=array("fname"=>$fname,"lname"=>$lname,"email"=>$email,"password"=>$password);
            $this->db->insert("sc_user",$data);
            //$this->session->set_flashdata("global_notification",array("message"=>,"type"=>"Info"));
            if(!$api){
                set_global_noti("Hi $fname, Terima kasih sudah bergabung di Servermedan!","Info");
                redirect();
            }else{
                $data=$this->db->where("email",$email)
                    ->get("sc_user")->row_array();
                unset($data["password"]);
                $response=array(
                    'status'=>true,
                    'data'=>$data
                );
                return $response;
            }
        }
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

    // function m_get_sub_category_by_category_id($category_id){
    //     return $this->db->select('sc_sub_category.sub_category_id,sc_sub_category.category_id,sub_category_name,service,reparation,jasa,category_name')
    //     ->from('sc_sub_category')
    //     ->join('sc_category',"sc_sub_category.category_id=sc_category.category_id")
    //     ->where("sc_category.category_id",$category_id)->get()->result_array();
    // }
}
//asdn