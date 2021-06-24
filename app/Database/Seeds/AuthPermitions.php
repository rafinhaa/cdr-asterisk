<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class AuthPermitions extends Seeder
{
	public function run()
	{
		$data = [
				[
					'name' => 'users-add',			
					'description' => 'Adicionar usuários'
				],
				[
					'name' => 'users-edit',			
					'description' => 'Editar usuários'
				],
				[
					'name' => 'users-list',			
					'description' => 'Listar usuários'
				],
				[
					'name' => 'users-remove',			
					'description' => 'Remover usuários'
				],
				[
					'name' => 'users-status',			
					'description' => 'Mudar status do usuário'
				],
		];
		// Using Query Builder
		$this->db->table('auth_permissions')->insertBatch($data);
	}
}
