<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LinksSeeder extends Seeder
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
            "author" => "Daniel",
            "title" => "titulo 1",
            "link" => "ww.perritos.com",
            "shortLink" => "robo.io/perritos",
            "public" => true
        ],
        [
            "author" => "Esteban",
            "title" => "titulo 2",
            "link" => "ww.gatitos.com",
            "shortLink" => "robo.io/gatitos",
            "public" => true
        ],
        ]);
    }
}
