<?php
/**
 * Created by PhpStorm.
 * User: lenovo
 * Date: 19/08/2016
 * Time: 12.18
 */
defined ('BASEPATH') OR exit('NO DIRECT ACCESS SCRIPT ALLOWED');

class Migration_Add_user_lat_user_lng_sc_post extends CI_Migration{
    public function __construct()
    {
        $this->load->dbforge();
        parent::__construct();
    }

    public function up(){
        $fields = array(
                'user_lat' => array(
                    'type' => 'double'
                ),
                'user_lng'=>array(
                    "type"=>'double'
                ),
                'address'=>array(
                    "type"=>"text"
                )
            );
        $this->dbforge->add_column('sc_user_post', $fields);

    }

    public function down(){
    }
}