<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name',
        'size',
        'price',
        'weight'
    ];

    public function getPrice()
    {
        return '$ ' . number_format(($this->price / 100),2);
    }

    public function getWeight()
    {
        return number_format(($this->weight / 100),2) . ' kg';
    }

    public function deliveries()
    {
        return $this->hasMany(Delivery::class, 'size', 'size');
    }
}
