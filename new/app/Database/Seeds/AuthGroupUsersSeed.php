<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class AuthGroupUsersSeed extends Seeder
{
	public function run()
	{
		$data = [
			'group_id' => 1,
			'user_id' => 1,
		];
		// Using Query Builder
		$this->db->table('auth_groups_users')->insert($data);
	}
}
