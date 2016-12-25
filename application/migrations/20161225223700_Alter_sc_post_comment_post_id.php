<?php
/**
 * Created by PhpStorm.
 * User: lenovo
 * Date: 19/08/2016
 * Time: 12.18
 */
defined ('BASEPATH') OR exit('NO DIRECT ACCESS SCRIPT ALLOWED');

class Migration_Alter_sc_post_comment_post_id extends CI_Migration{
    public function __construct()
    {
        $this->load->dbforge();
        parent::__construct();
    }

    public function up(){
        $this->db->query("ALTER TABLE `sc_post_comment` CHANGE `post_id` `user_post_id` INT(11) NOT NULL;");
    }

    public function down(){
    }
}

