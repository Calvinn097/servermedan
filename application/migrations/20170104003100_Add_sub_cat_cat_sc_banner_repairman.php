<?php
/**
 * Created by PhpStorm.
 * User: lenovo
 * Date: 19/08/2016
 * Time: 12.18
 */
defined ('BASEPATH') OR exit('NO DIRECT ACCESS SCRIPT ALLOWED');

class Migration_Add_sub_cat_cat_sc_banner_repairman extends CI_Migration{
    public function __construct()
    {
        $this->load->dbforge();
        parent::__construct();
    }

    public function up(){
        $fields = array(
                'category_id' => array(
                    'type' => 'int',
                    "constraint"=>11
                ),
                'sub_category_id'=>array(
                    "type"=>'int',
                    "constraint"=>11
                )
            );
        $this->dbforge->add_column('sc_banner_repairman', $fields);

    }

    public function down(){
    }
}