<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static findOrFail($id)
 * @method static create(array $newClient)
 */
class Client extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
        'surname',
        'adress',
        'floor',
        'phone1',
        'phone2',
        'email',
        'dni',
        'cuit',
        'city_id',
        'gender',
        'ranking',
        'created_by',
        'modified_by'
    ];
}
