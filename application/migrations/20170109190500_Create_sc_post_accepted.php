<?php
/**
 * Created by PhpStorm.
 * User: lenovo
 * Date: 19/08/2016
 * Time: 12.18
 */
defined ('BASEPATH') OR exit('NO DIRECT ACCESS SCRIPT ALLOWED');

class Migration_Create_sc_post_accepted extends CI_Migration{
    public function __construct()
    {
        $this->load->dbforge();
        parent::__construct();
    }

    public function up(){
        $fields = array(
            'post_accepted_id' => array(
                'type' => 'INT',
                'constraint' => 11,
                'auto_increment' => TRUE
            ),
            'repairman_id' => array(
                'type' => 'int',
                'constraint' => 11
            ),
            'user_post_id' => array(
                'type' => 'int',
                'default'=>11
            ),
            'date_accept'=>array(
            	'type'=>'datetime'
            ),
            'date_dealed'=>array(
                'type'=>'datetime',
                'default'=>null
            ),
            'user_dealed'=>array(
                'type'=>'int',
                'constraint'=>11,
                'comment'=>'if -1 then user reject'
            )
        );
        $this->dbforge->add_field($fields);
        $this->dbforge->add_key('post_accepted_id',TRUE);
        $this->dbforge->create_table('sc_post_accepted',TRUE);
    }

    public function down(){
        $this->dbforge->drop_table('sc_post_accepted',TRUE);
    }
}