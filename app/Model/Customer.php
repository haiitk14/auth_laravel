<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

/**
 * @property bigint $id
 * @property string $code
 * @property string $full_name
 * @property string $phone
 * @property string $address
 * @property boolean $is_delete
 * @property boolean $is_using
 * @property timestamps $create_at
 * @property int $create_by
 * @property timestamps $update_at
 * @property int $update_by
 */

class Customer extends Model
{
    protected $table='customer';

    /**
     * @var array
     */
    protected $fillable = ['code', 'full_name', 'phone', 'address', 'is_delete', 'is_using', 'create_at', 'create_by', 'update_at', 'update_by'];

}
