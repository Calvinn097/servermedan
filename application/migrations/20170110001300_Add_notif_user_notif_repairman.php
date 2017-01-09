<?php
/**
 * Created by PhpStorm.
 * User: lenovo
 * Date: 19/08/2016
 * Time: 12.18
 */
defined ('BASEPATH') OR exit('NO DIRECT ACCESS SCRIPT ALLOWED');

class Migration_Add_notif_user_notif_repairman extends CI_Migration{
    public function __construct()
    {
        $this->load->dbforge();
        parent::__construct();
    }

    public function up(){
        $fields = array(
                'notif_user' => array(
                    'type' => 'tinytext'
                ),
                'notif_repairman' => array(
                    'type' => 'tinytext'
                )
            );
            $this->dbforge->add_column('sc_post_accepted', $fields);
    }

    public function down(){
    }
}