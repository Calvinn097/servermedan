<?php
/**
 * Created by PhpStorm.
 * User: lenovo
 * Date: 02/08/2016
 * Time: 16.37
 */
class Image_m extends CI_Model{
    function m_upload_pic($filepath,$id,$id_name,$column,$table){
        $this->load->library('upload');
        $file_name=$id.'_'.$this->upload->generate_name_token();

        $upload_config=array(
            'upload_path' =>storage_path($filepath),
            'allowed_types' => 'jpg|png|jpeg|gif',
            'max_size'=> '10000',
            'file_name'=>$file_name
        );
        $this->upload->initialize($upload_config);

        //delete folder

        if($this->upload->do_upload("userfile")){
            $upload_data = $this->upload->data();

            $this->config->load('image_size');
            $this->load->library('image_lib');
            $size = config_item($column."_size");
            $this->image_lib->resize_and_watermark([
                'source_image'=>$upload_data['full_path'],
                'sizes'=> $size,
//                'resize_backend'=>true,
                'delete_source'=>true,
                'do_watermark' => false,
            ]);

//                vd("assd",$upload_data);
            $resize_data=$this->image_lib->resize_and_watermark_data();
            if(isset($resize_data["delete_image"])){//untuk hapus image source (image original yang diupload)
                $path= $resize_data["delete_image"];
                if(file_exists($path))  unlink($path);
            }
            // vd("resize_data",$resize_data);
            $result['path']=$resize_data['first_size'];
            $image_saved_path =  str_replace(storage_path(),'',$result['path']);
            $data=array(
                $column=>$image_saved_path
            );
            // vd("data",$data,true);
            $this->db->where($id_name,$id);
            $this->db->update($table,$data);    
        }
    }
}
//asdn