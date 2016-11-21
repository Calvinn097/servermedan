<?php
/**
 * Created by PhpStorm.
 * User: lenovo
 * Date: 19/08/2016
 * Time: 12.18
 */
defined ('BASEPATH') OR exit('NO DIRECT ACCESS SCRIPT ALLOWED');

class Migration_Create_sc_sub_category extends CI_Migration{
    public function __construct()
    {
        $this->load->dbforge();
        parent::__construct();
    }

    public function up(){
        $fields = array(
            'sub_category_id' => array(
                'type' => 'INT',
                'constraint' => 11,
                'auto_increment' => TRUE
            ),
            'category_id'=>array(
                'type'=>'INT',
                'constraint'=>11,
            ),
            'sub_category_name' => array(
                'type' => 'VARCHAR',
                'constraint' => 50
            ),
            'service'=>array(
                'type'=>'int',
                'constraint'=>2
            ),
            'reparation'=>array(
                'type'=>'int',
                'constraint'=>2
            ),
            'jasa'=>array(
                'type'=>'int',
                'constraint'=>2
            )
        );
        $this->dbforge->add_field($fields);
        $this->dbforge->add_key('sub_category_id',TRUE);
        $this->dbforge->create_table('sc_sub_category',TRUE);
    }

    public function down(){
        $this->dbforge->drop_table('sc_sub_category',TRUE);
    }
}