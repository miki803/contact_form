<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    public function run()
    {
        DB::table('categories')->insert([
            ['name' => '商品について'],
            ['name' => '配送について'],
            ['name' => '支払いについて'],
            ['name' => '返品について'],
            ['name' => 'その他'],
        ]);
    }
}