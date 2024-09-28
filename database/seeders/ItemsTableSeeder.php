<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ItemsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('items')->insert([
            ['name' => 'Pencil', 'price' => '12.00'],
            ['name' => 'Book', 'price' => '15.00'],
            ['name' => 'Ruler', 'price' => '2.00']
        ]);
    }
}
