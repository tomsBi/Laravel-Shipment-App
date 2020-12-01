<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{

    protected $model = Product::class;
    private array $sizes = ['S', 'M', 'L', 'XL'];

    public function definition()
    {
        return [
            'name' => 'Tank',
            'size' => array_rand($this->sizes),
            'price' => rand(100,100000),
            'weight' => rand(100,1000000)
        ];
    }
}
