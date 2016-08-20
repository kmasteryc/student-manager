<?php

use Illuminate\Database\Seeder;
use Faker\Factory;
class SeedUser extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();

        for ($i=1; $i<=50; $i++)
        {
            $user = new \App\User;
            $user->name = $faker->name;
            $user->email = $faker->email;
            $user->birthday = $faker->date('Y-m-d');
            $user->role_id = 1;
            $user->info = $faker->text(100);
            $user->password = bcrypt($faker->password(6));
            $user->save();
        }

    }
}
