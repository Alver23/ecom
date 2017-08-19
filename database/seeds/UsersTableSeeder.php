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
        factory(\Ecom\Models\User::class)->create([
            'name' => 'Alver Grisales',
            'email' => 'alver.grisales@hotmail.com',
            'password' => bcrypt('123456'),
        ]);
    }
}
