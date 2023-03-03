<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class PersonSeeder extends Seeder
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
            DB::table('people')->insert([
                'cnic' => $cnic,
                'name' => $faker->name,
                'city' => $faker->city,
            ]);
        }
    }
}
