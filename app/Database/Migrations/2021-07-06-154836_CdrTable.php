<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CdrTable extends Migration
{
	public function up()
	{
		$this->forge->addField(
			[
			'calldate' => [
				'type' => 'datetime',
				'null' => false,
				'default' => '0000-00-00 00:00:00',
			],
			'clid' => [
				'type'       => 'VARCHAR',
				'constraint' => '80',
				'null' => false,
				'default' => '',
			],
			'src' => [
				'type'       => 'VARCHAR',
				'constraint' => '80',
				'null' => false,
				'default' => '',
			],
			'dst' => [
				'type'       => 'VARCHAR',
				'constraint' => '80',
				'null' => false,
				'default' => '',
			],
			'dcontext' => [
				'type'       => 'VARCHAR',
				'constraint' => '80',
				'null' => false,
				'default' => '',
			],
			'channel' => [
				'type'       => 'VARCHAR',
				'constraint' => '80',
				'null' => false,
				'default' => '',
			],
			'dstchannel' => [
				'type'       => 'VARCHAR',
				'constraint' => '80',
				'null' => false,
				'default' => '',
			],
			'lastapp' => [
				'type'       => 'VARCHAR',
				'constraint' => '80',
				'null' => false,
				'default' => '',
			],
			'lastdata' => [
				'type'       => 'VARCHAR',
				'constraint' => '80',
				'null' => false,
				'default' => '',
			],
			'duration' => [
				'type'       => 'INT',
				'constraint' => '11',
				'null' => false,
				'default' => 0,
			],
			'billsec' => [
				'type'       => 'INT',
				'constraint' => '11',
				'null' => false,
				'default' => '0',
			],
			'disposition' => [
				'type'       => 'VARCHAR',
				'constraint' => '45',
				'null' => false,
				'default' => '',
			],
			'amaflags' => [
				'type'       => 'INT',
				'constraint' => '11',
				'null' => false,
				'default' => '0',
			],
			'accountcode' => [
				'type'       => 'VARCHAR',
				'constraint' => '20',
				'null' => false,
				'default' => '',
			],
			'uniqueid' => [
				'type'       => 'VARCHAR',
				'constraint' => '32',
				'null' => false,
				'default' => '',
			],
			'userfield' => [
				'type'       => 'VARCHAR',
				'constraint' => '255',
				'null' => false,
				'default' => '',
			],
			'peeraccount' => [
				'type'       => 'VARCHAR',
				'constraint' => '20',
				'null' => false,
				'default' => '',
			],
			'linkedid' => [
				'type'       => 'VARCHAR',
				'constraint' => '32',
				'null' => false,
				'default' => '',
			],
			'sequence' => [
				'type'       => 'INT',
				'constraint' => '11',
				'null' => false,
				'default' => '0',
			],
		]);
		$this->forge->createTable('ast_cdr',true);
	}

	public function down()
	{
		$this->forge->dropTable('ast_cdr');
	}
}
