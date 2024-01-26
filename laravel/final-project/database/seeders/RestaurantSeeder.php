<?php

namespace Database\Seeders;

use App\Models\Dish;
use App\Models\Restaurant;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RestaurantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $restaurants = Restaurant::factory()->count(10)->create();
        foreach ($restaurants as $restaurant) {
            Dish::factory()->count(10)->create(['restaurant_id' => $restaurant->id]);
        }
    }
}
