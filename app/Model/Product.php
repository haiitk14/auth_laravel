<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

/**
 * @property bigint $id
 * @property string $name
 * @property string $code
 * @property boolean $is_delete
 * @property boolean $is_using
 * @property datetime $create_at
 * @property int $create_by
 * @property datetime $update_at
 * @property int $update_by
 */

class Product extends Model
{
    protected $table='product';
    /**
     * @var array
     */
    protected $fillable = ['name', 'code', 'is_delete', 'is_using', 'create_at', 'create_by', 'update_at', 'update_by'];

}
