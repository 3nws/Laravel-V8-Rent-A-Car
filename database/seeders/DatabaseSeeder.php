<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table("categories")->insert(
            ["parent_id" => "0"],
            ["title" => "Main"],
            ['image' => ''],
            ['keywords' => 'category'],
            ["description" => "Main category"],
            ['status' => "True"]
        );

        DB::table('cars')->insert(
            ['title' => 'Mazda MX5'],
            ['keywords' => 'mazda, mx, 5'],
            ['image' => ''],
            ['category_id' => 1],
            ['price' => 100.0],
            ['seats' => 2],
            ['large_bags' => 0],
            ['small_bags' => 2],
            ['detail' => 'mazda, mx, 5'],
            ['user_id' => '1'],
            ["status" => 'True'],
        );

        DB::table("settings")->insert([
            "title" => "Rent A Car",
        ]);
    }
}
