<?php
/**
 * Created by PhpStorm.
 * User: lenovo
 * Date: 19/08/2016
 * Time: 12.18
 */
defined ('BASEPATH') OR exit('NO DIRECT ACCESS SCRIPT ALLOWED');

class Migration_Add_sc_post_image extends CI_Migration{
    public function __construct()
    {
        $this->load->dbforge();
        parent::__construct();
    }

    public function up(){
        $fields = array(
                'image' => array(
                    'type' => 'VARCHAR',
                    'constraint' => '125',
                    'default'=>null
                )
            );
            $this->dbforge->add_column('sc_user_post', $fields);
    }

    public function down(){
    }
}