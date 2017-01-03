<?php
/**
 * Created by PhpStorm.
 * User: lenovo
 * Date: 19/08/2016
 * Time: 12.18
 */
defined ('BASEPATH') OR exit('NO DIRECT ACCESS SCRIPT ALLOWED');

class Migration_Create_sc_banner_repairman extends CI_Migration{
    public function __construct()
    {
        $this->load->dbforge();
        parent::__construct();
    }

    public function up(){
        $fields = array(
            'repairman_banner_id' => array(
                'type' => 'INT',
                'constraint' => 11,
                'auto_increment' => TRUE
            ),
            'repairman_id' => array(
                'type' => 'int',
                'constraint' => 11
            ),
            'path' => array(
                'type' => 'varchar',
                'constraint'=>125
            ),
            'approved'=>array(
            	'type'=>'int',
            	'constraint' => 2,
                'default'=>0
            )
        );
        $this->dbforge->add_field($fields);
        $this->dbforge->add_key('repairman_banner_id',TRUE);
        $this->dbforge->create_table('sc_banner_repairman',TRUE);
    }

    public function down(){
        $this->dbforge->drop_table('sc_repairman',TRUE);
    }
}