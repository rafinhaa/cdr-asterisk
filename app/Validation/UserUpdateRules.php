<?php

namespace App\Validation;

use App\Models\UserModel;
use Exception;

class UserUpdateRules
{
    public function update_email(string $email, string $id, array $data): bool
    {
        try {
            $model = new UserModel();
            $user = $model->where([            
                'email'=> $email,
                ])->first();
            if (is_null($user) || $user->id == $id) {
                return true;
            } 
            return false;
        } catch (Exception $e) {
            return false;
        }        
    }
}