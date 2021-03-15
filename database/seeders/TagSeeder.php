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
                "GitHub" => true,
                "Social" => false,
                "@Home" => false,
                "VSSS" => false,
                "Sponsors" => false,
                "Documentation" => true,
                "Facebook" => false,
                "YouTube" => false,
                "ML" => false,
                "AI" => false,
                "Robotics" => true,
                "Mechanics" => true,
                "Candidates" => false,
            ],
            [
                "link_id"=>2,
                "GitHub" => false,
                "Social" => false,
                "@Home" => true,
                "VSSS" => false,
                "Sponsors" => true,
                "Documentation" => true,
                "Facebook" => false,
                "YouTube" => false,
                "ML" => false,
                "AI" => false,
                "Robotics" => true,
                "Mechanics" => true,
                "Candidates" => false,
            ],
        ]);
    }
}
