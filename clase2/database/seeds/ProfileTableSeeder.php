<?php

use Illuminate\Database\Seeder;
use App\Models\Profile;

class ProfileTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*Profile::create([
            'name' => 'Admin',
        ]);
        */
        factory(Profile::class, 50)->create();
    }
}
