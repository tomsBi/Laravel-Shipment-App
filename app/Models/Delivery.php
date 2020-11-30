<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Delivery extends Model
{
    protected $fillable = [
        'size',
        'price',
        'company_name',
    ];

    public function getPrice()
    {
        return '$ ' . number_format(($this->price / 100), 2);
    }

    public function getName()
    {
        return $this->company_name;
    }
}
