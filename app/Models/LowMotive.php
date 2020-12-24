<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LowMotive extends Model
{
    use HasFactory;
    
    private $table = 'low_motives';

    protected $fillable = [
        'name'
    ];
}
