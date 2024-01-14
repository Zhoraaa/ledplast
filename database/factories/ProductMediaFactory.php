<?php


namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductMediaFactory extends Factory
{
    protected $model = Product::class;

    public function definition()
    {
        $products = Product::get();
        return [
            'product_id' => $this->faker->randomElement($products)->id,
            'image' => time().'.png',
        ];
    }
}
