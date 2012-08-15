<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_videos extends CI_Migration {

  public function up()
  {

    $this->dbforge->add_field(array(
      'id' => array(
        'type' => 'INT',
        'constraint' => 5,
        'unsigned' => TRUE,
        'auto_increment' => TRUE
      ),
      'videoid' => array( //External Identifier of Youtube Platform
        'type' => 'VARCHAR',
        'constraint' => '20',
      ),
      'title' => array(
        'type' => 'VARCHAR',
        'constraint' => '250'
      ),
      'img' => array(
        'type' => 'VARCHAR',
        'constraint' => '250'
      ),
      'tweet' => array(
        'type' => 'VARCHAR',
        'constraint' => '250'
      ),
      'user_id' => array(
        'type' => 'INT',
        'constraint' => '5'
      ),
      'created_at' => array(
        'type' => 'TIMESTAMP DEFAULT CURRENT_TIMESTAMP'
      )



    ));
    $this->dbforge->add_key('id', TRUE);
    $this->dbforge->add_key('user_id');
    $this->dbforge->create_table('videos');

  }

  public function down()
  {
    $this->dbforge->drop_table('videos');
  }
}