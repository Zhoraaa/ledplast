<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ProductMedia;

class ProductMediaTableSeeder extends Seeder
{
    public function run()
    {
        ProductMedia::factory(50)->create();
    }
}
