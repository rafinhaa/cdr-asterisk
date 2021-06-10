<?php

namespace App\Controllers\CDR;
use App\Controllers\BaseController;

class Users extends BaseController
{
	public function add()
	{	
        return view('users/add');
	}
}