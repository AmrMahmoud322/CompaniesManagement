<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\Employee;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
    	foreach (range(1,150) as $index) {
            $employee = new Employee();
        
            $employee->first_name = $faker->name;
            $employee->last_name = $faker->name;
            $employee->email = $faker->email;
            $employee->phone = $faker->numberBetween(1,100000);
            $employee->company_id = $faker->numberBetween(1,30);
            $employee->save();
	        
	    }
    }
}
