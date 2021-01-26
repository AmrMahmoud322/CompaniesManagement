<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\Company;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
    	foreach (range(1,31) as $index) {
            $company = new Company();
            
            $company->name = $faker->name;
            $company->email = $faker->email;
            $company->website = $faker->name;
            $company->logo = $faker->name;
            $company->save();

        }
    }
}
