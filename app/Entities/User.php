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
	public function getName()
	{
		return trim(trim($this->attributes['name']) . ' ' . trim($this->attributes['lastname']));
	}
}