<?php
/**
 * Created by PhpStorm.
 * User: lenovo
 * Date: 19/08/2016
 * Time: 12.18
 */
defined ('BASEPATH') OR exit('NO DIRECT ACCESS SCRIPT ALLOWED');

class Migration_Add_keahlian_sc_repairman extends CI_Migration{
    public function __construct()
    {
        $this->load->dbforge();
        parent::__construct();
    }

    public function up(){
        $fields = array(
                'keahlian' => array(
                    'type' => 'text'
                )
            );
        $this->dbforge->add_column('sc_repairman', $fields);

    }

    public function down(){
    }
}