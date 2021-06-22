<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class AuthGroupsSeed extends Seeder
{
	public function run()
	{
		$data = [
				[
					'name' => 'Admin',			
					'description' => 'Administradores'
				],
				[
					'name' => 'Membros',			
					'description' => 'Membros'
				],
		];
		// Using Query Builder
		$this->db->table('auth_groups')->insertBatch($data);
	}
}
