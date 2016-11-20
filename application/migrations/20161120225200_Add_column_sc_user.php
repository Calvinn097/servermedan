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
                'user_level' => array(
                    'type' => 'INT',
                    'constraint' => '11'
                ),
                'phone_number'=>array(
                    'type'=>'VARCHAR',
                    'constraint'=>'25'
                ),
                'state'=>array(
                    'type'=>'VARCHAR',
                    'constraint'=>'50'
                    ),
                'address'=>array(
                    'type'=>'VARCHAR',
                    'constraint'=>'100'
                    ),
                'postal'=>array(
                    'type'=>'VARCHAR',
                    'constraint'=>'15'),
                'lat'=>array(
                    'type'=>'double'),
                'lng'=>array(
                    'type'=>'double')
            );
            $this->dbforge->add_column('sc_user', $fields);
    }

    public function down(){
    }
}