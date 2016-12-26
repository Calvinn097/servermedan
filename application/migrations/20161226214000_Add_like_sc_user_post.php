<?php
/**
 * Created by PhpStorm.
 * User: lenovo
 * Date: 19/08/2016
 * Time: 12.18
 */
defined ('BASEPATH') OR exit('NO DIRECT ACCESS SCRIPT ALLOWED');

class Migration_Add_like_sc_user_post extends CI_Migration{
    public function __construct()
    {
        $this->load->dbforge();
        parent::__construct();
    }

    public function up(){
        $fields = array(
                'user_post_like_id' => array(
                    'type' => 'int',
                    'constraint' => '11',
                    'auto_increment'=>true
                ),
                'user_id'=>array(
                    "type"=>'int',
                    'constraint'=>11
                ),
                'user_post_id'=>array(
                    'type'=>'int',
                    'constraint'=>11
                ),
                'date_liked'=>array(
                    'type'=>'datetime'
                )
            );

            $this->dbforge->add_field($fields);
            $this->dbforge->add_key('user_post_like_id',TRUE);
            $this->dbforge->create_table('sc_user_post_like',TRUE);

    }

    public function down(){
    }
}