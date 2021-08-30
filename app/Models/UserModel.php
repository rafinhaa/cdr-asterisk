<?php namespace App\Models;
 
use Myth\Auth\Models\UserModel as MythModel;
use App\Entities\User;
 
class UserModel extends MythModel
{
    protected $returnType = User::class;
 
    protected $allowedFields = [
        'email', 'password_hash', 'reset_hash', 'reset_at', 'reset_expires', 'activate_hash',
        'status', 'status_message', 'active', 'force_pass_reset', 'permissions', 'deleted_at',
        'name', 'lastname',
    ];

    protected $validationRules = [
        'email'         => 'required|valid_email|is_unique[users.email,id,{id}]',
        'password_hash' => 'required',
    ];
 
}