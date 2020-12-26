<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UnsubscribeMotive extends Model
{
    use HasFactory;
    
    protected $table = 'unsubscribe_motives';

    protected $fillable = [
        'name'
    ];
}
