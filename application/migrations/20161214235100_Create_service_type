<?php
/**
 * Created by PhpStorm.
 * User: lenovo
 * Date: 19/08/2016
 * Time: 12.18
 */
defined ('BASEPATH') OR exit('NO DIRECT ACCESS SCRIPT ALLOWED');

class Migration_Create_service_type extends CI_Migration{
    public function __construct()
    {
        $this->load->dbforge();
        parent::__construct();
    }

    public function up(){
        $fields = array(
            'service_type_id' => array(
                'type' => 'INT',
                'constraint' => 11,
                'auto_increment' => TRUE
            ),
            'service_type' => array(
                'type' => 'VARCHAR',
                'constraint' => 50
            ),
            'called'=>array(
                'type'=> 'int',
                'constraint' =>11
            )
        );
        $this->dbforge->add_field($fields);
        $this->dbforge->add_key('service_type_id',TRUE);
        $this->dbforge->create_table('sc_service_type',TRUE);

    }

    public function down(){
        $this->dbforge->drop_table('sc_service_type',TRUE);
    }
}