<?php
/**
 * Created by PhpStorm.
 * User: lenovo
 * Date: 19/08/2016
 * Time: 12.18
 */
defined ('BASEPATH') OR exit('NO DIRECT ACCESS SCRIPT ALLOWED');

class Migration_Add_user_post_title_sc_user_post extends CI_Migration{
    public function __construct()
    {
        $this->load->dbforge();
        parent::__construct();
    }

    public function up(){
        $fields = array(
                'post_title' => array(
                    'type' => 'VARCHAR',
                    'constraint' => '100',
                    'after'=>"user_id"
                )
            );
            $this->dbforge->add_column('sc_user_post', $fields);
    }

    public function down(){
    }
}