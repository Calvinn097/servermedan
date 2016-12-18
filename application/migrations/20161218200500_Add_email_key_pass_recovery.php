<?php
/**
 * Created by PhpStorm.
 * User: lenovo
 * Date: 19/08/2016
 * Time: 12.18
 */
defined ('BASEPATH') OR exit('NO DIRECT ACCESS SCRIPT ALLOWED');

class Migration_Add_email_key_pass_recovery extends CI_Migration{
    public function __construct()
    {
        $this->load->dbforge();
        parent::__construct();
    }

    public function up(){
        $fields = array(
                'email_key' => array(
                    'type' => 'VARCHAR',
                    'constraint' => '100'
                ),
                'pass_recovery'=>array(
                    'type'=>'varchar',
                    'constraint'=>'100'
                )
            );
            $this->dbforge->add_column('sc_user', $fields);
    }

    public function down(){
    }
}