<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AlterTableUsers extends Migration
{
	public function up()
	{
		$fields = [
			'name' => [
				'type' => 'TEXT',
				'constraint' => 30,
				'null' => false,
			],
			'lastname' => [
				'type' => 'TEXT',
				'constraint' => 30,
				'null' => false,
			]			
		];
		$this->forge->addColumn('users', $fields);
	}

	public function down()
	{
		$this->forge->dropColumn('users', 'name');
		$this->forge->dropColumn('users', 'lastname');
	}
}
