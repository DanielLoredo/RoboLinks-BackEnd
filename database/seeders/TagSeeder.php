<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Seeder;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("tags")->insert([
            [
                "link_id" =>1,
                "@home"=> true,
                "candidates"=>false,
                "contests"=>false,
                "covid"=>true,
                "docs"=>true,
                "drones"=>false,
                "electronics"=>false,
                "github"=>false,
                "larcOpen"=>false,
                "mechanics"=>false,
                "presentation"=>false,
                "programming"=>false,
                "robocup"=>false,
                "sideProjects"=>false,
                "social"=>true,
                "sponsors"=>false,
                "vsss"=>false,
                "youtube"=>false,
                "workshop"=>false
            ],
            [
                "link_id"=>2,
                "@home"=> false,
                "candidates"=>false,
                "contests"=>false,
                "covid"=>false,
                "docs"=>true,
                "drones"=>false,
                "electronics"=>false,
                "github"=>false,
                "larcOpen"=>true,
                "mechanics"=>false,
                "presentation"=>true,
                "programming"=>false,
                "robocup"=>false,
                "sideProjects"=>false,
                "social"=>false,
                "sponsors"=>false,
                "vsss"=>false,
                "youtube"=>true,
                "workshop"=>false
            ],
        ]);
    }
}
