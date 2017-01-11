<?php
/**
 * Created by PhpStorm.
 * User: lenovo
 * Date: 19/08/2016
 * Time: 12.18
 */
defined ('BASEPATH') OR exit('NO DIRECT ACCESS SCRIPT ALLOWED');

class Migration_Create_sc_finished_post extends CI_Migration{
    public function __construct()
    {
        $this->load->dbforge();
        parent::__construct();
    }

    public function up(){
        $fields = array(
            'post_finished_id' => array(
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
            "date_dealed"=>array(
                "type"=>"datetime"
            ),
            "user_dealed"=>array(
                "type"=>"datetime"
            ),
            "price"=>array(
                "type"=>"double"
            ),
            "estimated_time"=>array(
                "type"=>"int",
                "constraint"=>11
            ),
            "notif_user"=>array(
                "type"=>"tinytext"
            ),
            "notif_repairman"=>array(
                "type"=>"tinytext"
            ),
            "review"=>array(
                "type"=>"tinytext"
            ),
            "rate"=>array(
                "type"=>"int",
                "constraint"=>"5"
            ),
            "lunas"=>array(
                "type"=>"int",
                "constraint"=>"2",
                "default"=>0),
            "date_finished"=>array(
                "type"=>"datetime")
        );
        $this->dbforge->add_field($fields);
        $this->dbforge->add_key('post_finished_id',TRUE);
        $this->dbforge->create_table('sc_post_finished',TRUE);
    }

    public function down(){
        // $this->dbforge->drop_table('sc_post_rejected',TRUE);
    }
}