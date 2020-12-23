<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'image_service',
        'monthly_price',
        'months_change',
        'unique_price',
        'description',
        'subscription',
        'type',
        'servicec_id'
    ];

    public function service_c() {
        return $this->belongsTo(ServiceC::Class, 'servicec_id');
    }
}
