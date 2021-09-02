<?php

namespace App\Validation;

use App\Models\UserModel;
use Exception;

class GroupUpdateRules
{
    public function update_name(string $name, string $id, array $data): bool
    {
        try {
            $model = model(GroupModel::class);
            $group = $model->where([            
                'name'=> $name,
                ])->first();
            if (is_null($group) || $group->id == $id) {
                return true;
            } 
            return false;
        } catch (Exception $e) {
            return false;
        }        
    }
}