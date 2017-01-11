<?php
/**
 * Created by PhpStorm.
 * User: lenovo
 * Date: 19/08/2016
 * Time: 12.18
 */
defined ('BASEPATH') OR exit('NO DIRECT ACCESS SCRIPT ALLOWED');

class Migration_Create_sc_post_accepted_comment extends CI_Migration{
    public function __construct()
    {
        $this->load->dbforge();
        parent::__construct();
    }

    public function up(){
        $fields = array(
            'post_accepted_comment_id' => array(
                'type' => 'INT',
                'constraint' => 11,
                'auto_increment' => TRUE
            ),
            'user_post_id' => array(
                'type' => 'int',
                'constraint' => 11
            ),
            'user_id' => array(
                'type' => 'int',
                'default'=>11
            ),
            'comment'=>array(
            	'type'=>'tinytext'
            ),
            'date'=>array(
                'type'=>'datetime'
            )
        );
        $this->dbforge->add_field($fields);
        $this->dbforge->add_key('post_accepted_comment_id',TRUE);
        $this->dbforge->create_table('sc_post_accepted_comment',TRUE);
    }

    public function down(){
    }
}