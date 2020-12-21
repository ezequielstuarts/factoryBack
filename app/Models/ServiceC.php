<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceC extends Model
{
    use HasFactory;
    public $table = "services_c";

    public function services() {
        return $this->hasMany(Service::Class, 'id');
    }
}
