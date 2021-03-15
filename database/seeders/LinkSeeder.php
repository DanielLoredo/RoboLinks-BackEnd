<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Seeder;

class LinkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("links")->insert([
            [
                "url" => "https://github.com/DanielLoredo/RoboLinks-BackEnd/projects/1",
                "short_url" => "https://robo.io/Db9MD9e",
                "title" => "Proyecto Github",
                "private" => true,
                "image" => null,
                "contador" => 2,
                "created_at" => date("Y-m-d H:i:s"),
            ],
            [
                "url" => "https://github.com/",
                "short_url" => "https://robo.io/3XbiK9e",
                "title" => "Landing Github",
                "private" => false,
                "image" => null,
                "contador" => 2,
                "created_at" => date("Y-m-d H:i:s"),
            ],
        ]);
    }
}
