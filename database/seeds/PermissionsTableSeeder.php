<?php

use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Permission::create([
            "name" => "prueba",
            "display_name" => "prueba",
            "description" => "prueba",
        ]);
    }
}
