<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;

    protected $primaryKey = 'Car_ID';
    protected $keyType = 'integer';
    protected $table = 'cars';
    protected $fillable = [
        'fuel_type', 
        'trunk_space'
    ];

    public function vehicle()
    {
        return $this->hasOne(Vehicle::class, 'Car_ID', 'id');
    }
}
