<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use \CodeIgniter\I18n\Time;

class UserSeed extends Seeder
{
	public function run()
	{
		$data = [
			'email'=> 'admin@admin.com',
			'username' => 'admin',			
			'password_hash'=> '$2y$10$yt74e0jyR8rpETtih.aQaus.hZmxyO6O0fsrC0TIxaAfWpclSWw62',
			'active'=> '1',
			'created_at'=> Time::now(),
			'updated_at'=> Time::now(),
			'name'=> 'Admin',
			'lastname'=> 'Instrator',
		];
		// Using Query Builder
		$this->db->table('users')->insert($data);
	}
}
