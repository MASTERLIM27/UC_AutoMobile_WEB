<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Motorcycle extends Model
{

    use HasFactory;

    protected $primaryKey = 'Motorcycle_ID';
    protected $keyType = 'integer';
    protected $table = 'motorcycles';
    protected $fillable = [
        'cargo_size', 
        'fuel_capacity'
    ];

    public function motorcycle()
    {
        return $this->hasOne(Motorcycle::class, 'Motorcycle_ID', 'id');
    }
}
