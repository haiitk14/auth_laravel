<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

/**
 * @property bigint $id
 * @property string $name
 * @property string $address
 * @property string $phone
 * @property boolean $is_delete
 * @property boolean $is_using
 * @property datetime $create_at
 * @property int $create_by
 * @property datetime $update_at
 * @property int $update_by
 */

class Manufature extends Model
{
    protected $table='manufature';
    /**
     * @var array
     */
    protected $fillable = ['name', 'address', 'phone', 'is_delete', 'is_using', 'create_at', 'create_by', 'update_at', 'update_by'];

}
