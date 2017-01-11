<?php
/**
 * Created by PhpStorm.
 * User: lenovo
 * Date: 19/08/2016
 * Time: 12.18
 */
defined ('BASEPATH') OR exit('NO DIRECT ACCESS SCRIPT ALLOWED');

class Migration_Add_user_id_sc_post_rejected extends CI_Migration{
    public function __construct()
    {
        $this->load->dbforge();
        parent::__construct();
    }

    public function up(){
        $fields = array(
                'user_id' => array(
                    'type' => 'int',
                    'constraint'=>11
                )
            );
        $this->dbforge->add_column('sc_post_rejected', $fields);

    }

    public function down(){
    }
}