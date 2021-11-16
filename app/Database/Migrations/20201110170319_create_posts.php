<?php 
namespace App\Database\Migrations; 
use CodeIgniter\Database\Migration; 



class CreatePosts extends Migration {
	public function up()
	{
		$this->forge->addField(array(
			'id' => array(
				'type' => 'INT',
				'constraint' => 11,
				'unsigned' => TRUE,
				'auto_increment' => TRUE
			),
			'title' => array(
				'type' => 'VARCHAR',
				'constraint' => '255',
			),
			'body' => array(
				'type' => 'TEXT',
			),
			'created_at' => array(
				'type' => 'timestamp',
				'current_timestamp' => true
			)
		));
		$this->forge->addKey('id', TRUE);
		$this->forge->createTable('posts');

	}

	public function down()
	{
		$this->forge->dropTable('posts');
	}
}
