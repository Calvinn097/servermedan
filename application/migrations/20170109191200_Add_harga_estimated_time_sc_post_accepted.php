<?php
/**
 * Created by PhpStorm.
 * User: lenovo
 * Date: 19/08/2016
 * Time: 12.18
 */
defined ('BASEPATH') OR exit('NO DIRECT ACCESS SCRIPT ALLOWED');

class Migration_Add_harga_estimated_time_sc_post_accepted extends CI_Migration{
    public function __construct()
    {
        $this->load->dbforge();
        parent::__construct();
    }

    public function up(){
        $fields = array(
                'price' => array(
                    'type' => 'double'
                ),
                'estimated_time'=>array(
                    'type'=>'int',
                    'constraint'=>'11'
                )
            );
            $this->dbforge->add_column('sc_post_accepted', $fields);
    }

    public function down(){
    }
}