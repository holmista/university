<?php

namespace Database\Seeders;

use App\Models\Courier;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()->count(10)->create();

        $couriers = User::factory()->count(10)->create(['is_courier' => true]);
        foreach ($couriers as $courier) {
            Courier::factory()->create(['user_id' => $courier->id]);
        }
    }
}
