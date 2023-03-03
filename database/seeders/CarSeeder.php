<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;


class CarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        for ($index = 0; $index < 100; $index++) {
            $cnic = '';
            for ($i = 0; $i < 13; $i += 3) {
                $cnic .= str_pad($faker->randomNumber(3), 3, '0', STR_PAD_LEFT);
            }
            DB::table('cars')->insert([
                'model' => $faker->name,
                'color' => $faker->colorName,
                'brand' => $faker->company,
            ]);
        }
    }
}
