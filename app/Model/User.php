<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

/**
 * @property bigint $id
 * @property string $username
 * @property string $password
 * @property string $email
 * @property string $name
 * @property string $remember_token
 * @property boolean $role_id
 * @property boolean $is_delete
 */
class User extends Model
{
    /**
     * @var array
     */
    protected $fillable = [
        'username', 'password', 'email', 'name', 'role_id', 'is_delete', 
        'remember_token', 'create_at', 'update_at'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = ['password'];

    /**
     * The roles that belong to the user.
     */
    public function roles()
    {
        return $this->belongsto('App\Model\Role');
    }
}
