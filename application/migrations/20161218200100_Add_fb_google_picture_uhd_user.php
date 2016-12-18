<?php
/**
 * Created by PhpStorm.
 * User: lenovo
 * Date: 19/08/2016
 * Time: 12.18
 */
defined ('BASEPATH') OR exit('NO DIRECT ACCESS SCRIPT ALLOWED');

class Migration_Add_fb_google_picture_uhd_user extends CI_Migration{
    public function __construct()
    {
        $this->load->dbforge();
        parent::__construct();
    }

    public function up(){
        $fields = array(
                'fb_id' => array(
                    'type' => 'VARCHAR',
                    'constraint' => '100'
                ),
                'google_id'=>array(
                    'type'=>'varchar',
                    'constraint'=>'100'
                )
            );
            $this->dbforge->add_column('sc_user', $fields);
    }

    public function down(){
    }
}