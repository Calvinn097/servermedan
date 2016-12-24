<?php
/**
 * Created by PhpStorm.
 * User: lenovo
 * Date: 19/08/2016
 * Time: 12.18
 */
defined ('BASEPATH') OR exit('NO DIRECT ACCESS SCRIPT ALLOWED');

class Migration_Create_sc_user_post extends CI_Migration{
    public function __construct()
    {
        $this->load->dbforge();
        parent::__construct();
    }

    public function up(){
        $fields = array(
            'user_post_id'=>array(
                'type'=>'INT',
                'constraint'=>11,
                'auto_increment' => TRUE
            ),
            'user_id'=>array(
                'type'=>'int',
                'constraint'=>11
            ),
            'content' => array(
                'type' => 'VARCHAR',
                'constraint' => '100'
            ),
            'service_type_id'=>array(
                'type'=>'int',
                'constraint'=>11
            ),
            'category_id'=>array(
                'type'=>'int',
                'constraint'=>11
            ),
            'sub_category_id'=>array(
                'type'=>'int',
                'constraint'=>11,
                'default'=>null
            ),
            'location_lat'=>array(
                'type'=>'double',
                'default'=>null
            ),
            'location_lng'=>array(
                'type'=>'double',
                'default'=>null
            ),
            'date_posted'=>array(
                "type"=>"datetime"
            )

        );
        $this->dbforge->add_field($fields);
        $this->dbforge->add_key('user_post_id',TRUE);
        $this->dbforge->create_table('sc_user_post',TRUE);

        $fields = array(
            'post_comment_id'=>array(
                'type'=>'INT',
                'constraint'=>11,
                'auto_increment' => TRUE
            ),
            'post_id'=>array(
                'type'=>'int',
                'constraint'=>11
            ),
            'user_id'=>array(
                'type'=>'int',
                'constraint'=>11
            ),
            'comment' => array(
                'type' => 'tinytext'
            ),
            'date'=>array(
                'type'=>'datetime'
            )

        );
        $this->dbforge->add_field($fields);
        $this->dbforge->add_key('post_comment_id',TRUE);
        $this->dbforge->create_table('sc_post_comment',TRUE);

    }

    public function down(){
    }
}