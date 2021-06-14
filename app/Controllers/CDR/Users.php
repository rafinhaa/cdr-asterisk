<?php

namespace App\Controllers\CDR;
use App\Controllers\BaseController;

use CodeIgniter\Session\Session;
use Myth\Auth\Entities\User;
use Myth\Auth\Models\UserModel;

class Users extends BaseController
{

	protected $auth;
	protected $config;
	protected $session;

	public function __construct()
	{
		// Most services in this controller require
		// the session to be started - so fire it up!
		$this->session = service('session');
		$this->config = config('Auth');
		$this->auth = service('authentication');
	}
	public function add()
	{	
		$data = [
			'menuActive' => [
				'col' => 'users',
				'active' => 'add',
			],
		];
        return view('users/add',$data);
	}
	public function store()
	{	
		$rules = [
			'email' => [
				'rules' => 'required|valid_email|is_unique[users.email]',				
				'errors' => [
					'required' => 'O e-mail é necessário',
					'valid_email' => 'Você deve inserir um email válido',
					'is_unique' => 'Esse e-mail já está cadastrado',
				],
			],
			'username' => [
				'rules' => 'required|alpha_numeric_space|min_length[3]|max_length[30]|is_unique[users.username]',				
				'errors' => [
					'required' => 'Nome de usuário é necessário',
					'alpha_numeric_space' => 'Não pode conter caracteres não alfanuméricos',
					'min_length' => 'O usuário deve conter pelo menos 3 caracteres',
					'max_length' => 'O usuário não pode ultrapassar 30 caracteres',
					'is_unique' => 'Nome de usuário já cadastrado',
				],
			],
			'name' => [
				'rules' => 'required|min_length[2]',
				'errors' => [
					'required' => 'Seu nome é necessário',
					'min_length' => 'Seu nome deve ter pelo menos 2 caracteres',
				],
			],
			'lastname' => [
				'rules' => 'required|min_length[2]',
				'errors' => [
					'required' => 'Seu sobrenome é necessário',
					'min_length' => 'Seu sobrenome deve ter pelo menos 2 caracteres',
				],
			],
			'password' => [
				'rules' => 'required|strong_password',
				'errors' => [
					'required' => 'A senha é necessário',
					'strong_password' => 'Essa senha está facil demais',
				],                
			],			
			'cpassword' => [
				'rules' => 'required|matches[password]',
				'errors' => [
					'required' => 'Você não digitou a confirmação da senha',
					'matches' => 'As senhas não são iguais',
				],                
			],
		];

		if (! $this->validate($rules))
		{
			return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
		}

		// Save the user
		$allowedPostFields = array_merge(['password'], $this->config->validFields, $this->config->personalFields);
		$user = new User($this->request->getPost($allowedPostFields));

		$this->config->requireActivation === null ? $user->activate : $user->generateActivateHash();

		$users = model(UserModel::class);
		// Ensure default group gets assigned if set
        if (! empty($this->config->defaultUserGroup)) {
            $users = $users->withGroup($this->config->defaultUserGroup);
        }

		if (! $users->save($user))
		{
			return redirect()->back()->withInput()->with('errors', $users->errors());
		}

		if ($this->config->requireActivation !== null)
		{
			$activator = service('activator');
			$sent = $activator->send($user);

			if (! $sent)
			{
				return redirect()->back()->withInput()->with('error', $activator->error() ?? lang('Auth.unknownError'));
			}

			// Success!
			return redirect()->to('/list')->with('message', lang('Auth.activationSuccess'));
		}
		// Success!
		return redirect()->to('/list')->with('message', lang('Auth.registerSuccess'));
	}
	public function list(){
		$data = [
			'menuActive' => [
				'col' => 'users',
				'active' => 'list',
			],
			'scripts' => [
				'DataTables' => 'assets/plugins/data-tables/jquery.datatables.min.js',
				'Bootstrap4-DT' => 'assets/plugins/data-tables/datatables.bootstrap4.min.js',
				'DataTables Default' => 'assets/plugins/data-tables/default-datatable.js',				
			],
			'css' => [
				'DataTables' => 'assets/plugins/data-tables/datatables.bootstrap4.min.css',				
			],
		];
        return view('users/list',$data);
	}
}