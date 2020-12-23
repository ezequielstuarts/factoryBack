<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id','name','surname','adress','floor','phone1','phone2','email','dni','cuit','city_id','gender','ranking','created_by','created_by','modified_by','modified_by'
    ];
}