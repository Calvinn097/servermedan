<?php
/**
 * Created by PhpStorm.
 * User: lenovo
 * Date: 19/08/2016
 * Time: 12.18
 */
defined ('BASEPATH') OR exit('NO DIRECT ACCESS SCRIPT ALLOWED');

class Migration_Create_table_sc_user extends CI_Migration{
    public function __construct()
    {
        $this->load->dbforge();
        parent::__construct();
    }

    public function up(){
        $fields = array(
            'user_id' => array(
                'type' => 'INT',
                'constraint' => 11,
                'auto_increment' => TRUE
            ),
            'email' => array(
                'type' => 'VARCHAR',
                'constraint' => 50
            ),
            'fname' => array(
                'type' => 'VARCHAR',
                'constraint' => 30
            ),
            'lname'=>array(
            	'type'=>'VARCHAR',
            	'constraint' => 30
            ),
            'password'=>array(
            	'type'=>'VARCHAR',
            	'constraint'=>75
            )
        );
        $this->dbforge->add_field($fields);
        $this->dbforge->add_key('user_id',TRUE);
    }

    public function down(){
        $this->dbforge->drop_table('sc_user',TRUE);
    }
}