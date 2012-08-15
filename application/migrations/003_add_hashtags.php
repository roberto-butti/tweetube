<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_hashtags extends CI_Migration {

  public function up()
  {

    $this->dbforge->add_field(array(
      'id' => array(
        'type' => 'INT',
        'constraint' => 5,
        'unsigned' => TRUE,
        'auto_increment' => TRUE
      ),
      'hashtag' => array( //
        'type' => 'VARCHAR',
        'constraint' => '32',
      ),

      'user_id' => array(
        'type' => 'INT',
        'constraint' => '5'
      ),
      'video_id' => array(
        'type' => 'INT',
        'constraint' => '5'
      ),


    ));
    $this->dbforge->add_key('id', TRUE);
    $this->dbforge->add_key('user_id');
    $this->dbforge->add_key('video_id');
    $this->dbforge->add_key('hashtag');
    $this->dbforge->create_table('hashtags');

  }

  public function down()
  {
    $this->dbforge->drop_table('hashtags');
  }
}