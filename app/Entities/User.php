<?php namespace App\Entities;

use Myth\Auth\Entities\User as MythUser;

class User extends MythUser
{
    /**
     * Default attributes.
     * @var array
     */
    protected $attributes = [
    	'name' => 'Guest',
    	'lastname'  => 'User',
    ];

	/**
	 * Returns a full name: "first last"
	 *
	 * @return string
	 */
	public function getFullName()
	{
		return trim(trim($this->attributes['name']) . ' ' . trim($this->attributes['lastname']));
	}

	 /**
	 * returns TRUE or FALSE if the user is in the group 
	 *
	 * @return bool
	 */
	public function inGroup($group_id,$user_id)
	{
		$authorize = $auth = service('authorization');
		return $authorize->inGroup($group_id, $user_id);		
	}
}