<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $userAdmin = factory(\App\User::class)->create([
            'email' => 'test@actualsales.com',
            'password' => bcrypt('12344321'),
            'name' => 'Test Actual Sales',
        ]);
    }
}
