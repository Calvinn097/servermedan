<?php
/**
 * Created by PhpStorm.
 * User: lenovo
 * Date: 19/08/2016
 * Time: 12.18
 */
defined ('BASEPATH') OR exit('NO DIRECT ACCESS SCRIPT ALLOWED');

class Migration_Create_news extends CI_Migration{
    public function __construct()
    {
        $this->load->dbforge();
        parent::__construct();
    }

    public function up(){
        $fields = array(
            'news_id' => array(
                'type' => 'INT',
                'constraint' => 11,
                'auto_increment' => TRUE
            ),
            'author' => array(
                'type' => 'VARCHAR',
                'constraint' => 50
            ),
            'date_created' => array(
                'type' => 'datetime'
            ),
            'date_edited' => array(
                'type' => 'datetime'
            ),
            'content' => array(
                'type' => 'longtext'
            ),
            'edited_by'=>array(
                'type'=>'varchar',
                'constraint'=>50
            ),
            'news_category_id'=>array(
                'type'=>'int',
                'constraint'=>11
            ),
            'status'=>array(
                'type'=>'int',
                'constraint'=>1,
                'comment'=>'1=visible,0=invisible',
                'default'=>0
            )
        );
        $this->dbforge->add_field($fields);
        $this->dbforge->add_key('news_id',TRUE);
        $this->dbforge->create_table('sc_news',TRUE);

        $fields = array(
            'news_category_id' => array(
                'type' => 'INT',
                'constraint' => 11,
                'auto_increment' => TRUE
            ),
            'news_category' => array(
                'type' => 'VARCHAR',
                'constraint' => 50
            )
        );
        $this->dbforge->add_field($fields);
        $this->dbforge->add_key('news_category_id',TRUE);
        $this->dbforge->create_table('sc_news_category',TRUE);

    }

    public function down(){
        $this->dbforge->drop_table('sc_news',TRUE);
        $this->dbforge->drop_table('sc_news_category',TRUE);
    }
}