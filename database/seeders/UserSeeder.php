<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("users")->insert([
            [
                "email" => "admin1@gmail.com",
                "type" => "admin",
            ],
            [
                "email" => "roborrego1@gmail.com",
                "type" => "user",
            ],
        ]);
    }
}
