<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Truck extends Model
{
    use HasFactory;

    protected $primaryKey = 'Truck_ID';
    protected $keyType = 'integer';
    protected $table = 'trucks';
    protected $fillable = [
        'number_of_wheels', 
        'cargo_area_size'
    ];

    public function truck()
    {
        return $this->hasOne(Truck::class, 'Truck_ID', 'id');
    }
}
