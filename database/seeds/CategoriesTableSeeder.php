<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
           ['cat_name' => 'Cyborg/Exo'],
            ['cat_name' => 'Mecha'],
            ['cat_name' => 'Medieval'],
            ['cat_name' => 'Dark']
        ]);
    }
}
