<?php

namespace Core\Api\Seeds;

use Core\Api\Models\Customer;
use Illuminate\Database\Seeder;

class CustomerProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     * @throws \Exception
     */
    public function run()
    {
        $this->command->info('Customer table seeded!');
        $faker = \Faker\Factory::create();
        $statuses = ["new", "pending", "in review", "approved", "inactive", "deleted"];
        for ($i = 0; $i < random_int(3, 8); $i++) {
            $customer = Customer::create([
                'firstName' => $faker->firstName,
                'lastName' => $faker->lastName,
                'dateOfBirth' => $faker->date($format = 'Y-m-d', $max = 'now'),
            ]);
            for ($i = 0; $i < random_int(1, 5); $i++) {
                $customer->products()->create([
                    'status' => $statuses[array_rand($statuses)],
                    'name' => $faker->name,
                    'issn' => rand(100000, 999999),
                ]);
            }
        }
    }
}
