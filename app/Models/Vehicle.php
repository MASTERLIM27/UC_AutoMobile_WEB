<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    use HasFactory;

    protected $fillable = [
        'model',
        'year',
        'passengerCapacity',
        'manufacturer',
        'price',
        'type'
    ];

    public function motorcycle()
    {
        return $this->belongsTo(Motorcycle::class, 'id', 'Motorcycle_ID');
    }
    public function car()
    {
        return $this->belongsTo(Car::class, 'id', 'Car_ID');
    }

    public function truck()
    {
        return $this->belongsTo(Truck::class, 'id', 'Truck_ID');
    }

    public function order(){
        return $this->hasMany(Order::class, 'id', 'Order_ID');
    }
}
