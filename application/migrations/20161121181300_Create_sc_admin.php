<?php
/**
 * Created by PhpStorm.
 * User: lenovo
 * Date: 19/08/2016
 * Time: 12.18
 */
defined ('BASEPATH') OR exit('NO DIRECT ACCESS SCRIPT ALLOWED');

class Migration_Create_sc_admin extends CI_Migration{
    public function __construct()
    {
        $this->load->dbforge();
        parent::__construct();
    }

    public function up(){
        $fields = array(
            'admin_id' => array(
                'type' => 'INT',
                'constraint' => 11,
                'auto_increment' => TRUE
            ),
            'admin_name' => array(
                'type' => 'VARCHAR',
                'constraint' => 50
            ),
            'email' => array(
                'type' => 'VARCHAR',
                'constraint' => 50
            ),
            'password' => array(
                'type' => 'VARCHAR',
                'constraint' => 125
            ),
            'tel' => array(
                'type' => 'VARCHAR',
                'constraint' => 25
            ),
            'address' => array(
                'type' => 'VARCHAR',
                'constraint' => 25
            ),
            'join_date'=>array(
                'type'=>'date',
            ),
            'level'=>array(
                'type'=>'int',
                'constraint'=>2
            ),
            'status'=>array(
                'type'=>'int',
                'constraint'=>2
            )
        );
        $this->dbforge->add_field($fields);
        $this->dbforge->add_key('admin_id',TRUE);
        $this->dbforge->create_table('sc_admin',TRUE);

        $fields = array(
                'status' => array(
                    'type' => 'INT',
                    'constraint' => 2
                )
            );
        $this->dbforge->add_column('sc_user', $fields);
    }

    public function down(){
        $this->dbforge->drop_table('sc_admin',TRUE);
    }
}