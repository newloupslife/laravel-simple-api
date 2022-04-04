<?php

namespace Database\Seeders;

use App\Models\User;
use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

/**
 * Class UserTableSeeder
 *
 * @package Database\Seeders
 */
class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::query()->truncate();

        $faker = Factory::create();
        $password = Hash::make('toptal');

        User::query()->create([
            'name' => 'Administrator',
            'email' => 'admin@test.com',
            'password' => $password
        ]);

        for ($i = 0; $i < 10; $i++) {
            User::query()->create(
                [
                    'name' => $faker->name,
                    'email' => $faker->email,
                    'password' => $password
                ]
            );
        }
    }
}
