<?php
/**
 * Created by PhpStorm.
 * User: lenovo
 * Date: 19/08/2016
 * Time: 12.18
 */
defined ('BASEPATH') OR exit('NO DIRECT ACCESS SCRIPT ALLOWED');

class Migration_Add_column_sc_user extends CI_Migration{
    public function __construct()
    {
        $this->load->dbforge();
        parent::__construct();
    }

    public function up(){
        $fields = array(
                'fullname' => array(
                    'type' => 'VARCHAR',
                    'constraint' => '100'
                )
            );
            $this->dbforge->add_column('sc_admin', $fields);
    }

    public function down(){
    }
}