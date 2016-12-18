<?php
/**
 * Created by PhpStorm.
 * User: lenovo
 * Date: 19/08/2016
 * Time: 12.18
 */
defined ('BASEPATH') OR exit('NO DIRECT ACCESS SCRIPT ALLOWED');

class Migration_Add_gender_sc_user extends CI_Migration{
    public function __construct()
    {
        $this->load->dbforge();
        parent::__construct();
    }

    public function up(){
        $fields = array(
                'gender' => array(
                    'type' => 'VARCHAR',
                    'constraint' => '10'
                )
            );
            $this->dbforge->add_column('sc_user', $fields);
    }

    public function down(){
    }
}