<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_users extends CI_Migration {

  public function up()
  {

    $this->dbforge->add_field(array(
      'id' => array(
        'type' => 'INT',
        'constraint' => 5,
        'unsigned' => TRUE,
        'auto_increment' => TRUE
      ),
      'fuid' => array( //External Identifier of Facebook UID
        'type' => 'VARCHAR',
        'constraint' => '24',
      ),
      'username' => array(
        'type' => 'VARCHAR',
        'constraint' => '250'
      ),

    ));
    $this->dbforge->add_key('id', TRUE);
    $this->dbforge->add_key('fuid');
    $this->dbforge->create_table('users');

  }

  public function down()
  {
    $this->dbforge->drop_table('users');
  }
}