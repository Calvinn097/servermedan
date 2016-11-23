<?php
/**
 * Created by PhpStorm.
 * User: lenovo
 * Date: 02/08/2016
 * Time: 16.37
 */
class Account_m extends CI_Model{
    function m_admin_login(){
        $admin_name = $this->input->post('admin_name',true);
        $password = $this->input->post('password',true);
        $admin=$this->db->where('admin_name',$admin_name)
        ->get('sc_admin')->row_array();

        if(md5($password)!=$admin['password']){
            $this->session->set_flashdata('login_err','Username/password salah');
        }else{
            $co_sign_up= array(
                'name' => 'admin',
                'value' => $admin["admin_id"],
                'expire' =>  3600,
                'path'=>'/',
                'prefix' => 'sm_'
            );
            $this->input->set_cookie($co_sign_up);
            
        }
    }
}
//asdn