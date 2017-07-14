<?php

use Illuminate\Database\Seeder;
use App\User;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(User::class)->create([
            'name' => 'Alver Grisales',
            'email' => 'viga.23@hotmail.com',
            'password' => bcrypt('123456'),
        ]);
    }
}
