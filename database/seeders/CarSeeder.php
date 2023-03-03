<?php

namespace Database\Seeders;

use App\Models\Person;
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
        for ($index = 0; $index < 150; $index++) {
            $carBrands = ['Toyota', 'Honda', 'Ford', 'Chevrolet', 'Nissan', 'BMW', 'Mercedes-Benz', 'Audi', 'Hyundai', 'Kia'];
            DB::table('cars')->insert([
                'model' => $faker->unique()->regexify('[A-Z]{1,3}\d{1,3}'),
                'color' => $faker->colorName,
                'brand' => $faker->randomElement($carBrands),
                'person_cnic' => Person::all()->random()->cnic,
            ]);
        }
    }
}
