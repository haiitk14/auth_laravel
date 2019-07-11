<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

/**
 * @property bigint $id
 * @property string $name
 * @property boolean $is_active
 * @property boolean $is_delete
 */

class Role extends Model
{
    protected $table='role';
     /**
     * @var array
     */
    protected $fillable = ['name', 'is_active', 'is_delete', 'create_at', 'update_at'];

    /**
     * The users that belong to the role.
     */
    public function users()
    {
        return $this->hasMany('App\User','role_id', 'id');
    }
}
