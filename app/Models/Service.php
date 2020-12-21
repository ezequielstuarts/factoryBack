<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    public function service_c() {
        return $this->belongsTo(ServiceC::Class, 'servicec_id');
    }
}
