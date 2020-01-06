<?php

use Illuminate\Database\Seeder;

class FiguresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('figures')->insert([
           [
               'fig_name' => 'Atlas',
               'fig_desc'=> 'Atlas figure from the game series Portal.',
               'cat_id'=>2,
               'fig_price'=>1800000,
               'fig_stock'=>6,
               'fig_pic' => 'PORTAL.jpg'
           ],
            [
                'fig_name' => 'Excalibur',
                'fig_desc'=> 'Excalibur action figure from the game Warframe.',
                'cat_id'=>1,
                'fig_price'=>2900000,
                'fig_stock'=>7,
                'fig_pic' => 'WARFRAME.png'
            ],
            [
                'fig_name' => 'Iron-man',
                'fig_desc'=> 'Iron-man action figure from the Iron-man series.',
                'cat_id'=>1,
                'fig_price'=>2500000,
               'fig_stock'=>8,
               'fig_pic' => 'IRON MAN.jpg'
           ],
            [
                'fig_name' => 'Artorias',
                'fig_desc'=> 'Artorias figure from Dark Souls.',
                'cat_id'=>4,
                'fig_price'=> 2000000,
               'fig_stock'=> 5,
               'fig_pic' => 'ARTORIAS.JPG'
           ],
            [
                'fig_name' => 'Hunter',
                'fig_desc'=> 'Hunter figure from Bloodborne.',
                'cat_id'=>4,
                'fig_price'=>190000,
               'fig_stock'=>3,
               'fig_pic' => 'BLOODBORNE.jpg'
           ],
            [
                'fig_name' => 'Hunter',
                'fig_desc'=> 'Hunter action figure from the game series, Halo.',
                'cat_id'=>1,
                'fig_price'=>1300000,
               'fig_stock'=>3,
               'fig_pic' => 'HUNTER.jpg'
           ],
            [
                'fig_name' => 'Locke',
                'fig_desc'=> 'Locke figure from the game Halo.',
                'cat_id'=>1,
                'fig_price'=>3000000,
               'fig_stock'=>2,
               'fig_pic' => 'LOCKE.jpg'
           ],
            [
                'fig_name' => 'Luden',
                'fig_desc'=> 'Luden figure modeled from the Kojima Production mascot.',
                'cat_id'=>1,
                'fig_price'=>2400000,
               'fig_stock'=> 4,
               'fig_pic' => 'LUDENS.jpg'
           ],
            [
                'fig_name' => 'Maria',
                'fig_desc'=> 'Maria figure from the game Bloodborne.',
                'cat_id'=>4,
                'fig_price'=>2750000,
               'fig_stock'=>5,
               'fig_pic' => 'MARIA.png'
           ],
            [
                'fig_name' => 'Samus',
                'fig_desc'=> 'Samus action figure from the game Metroid.',
                'cat_id'=>1,
                'fig_price'=>2850000,
               'fig_stock'=>2,
               'fig_pic' => 'METROID.jpg'
           ],
            [
                'fig_name' => 'Big Daddy',
                'fig_desc'=> 'Big Daddy action figure from the game Bioshock.',
                'cat_id'=>1,
                'fig_price'=>1850000,
               'fig_stock'=>3,
               'fig_pic' => 'BIG DADDY.jpg'
           ],
            [
                'fig_name' => 'Boba Fett',
                'fig_desc'=> 'Boba Fett figure from the series Star Wars.',
                'cat_id'=>1,
                'fig_price'=>1750000,
               'fig_stock'=>4,
               'fig_pic' => 'Boba Fett.jpg'
           ],
            [
                'fig_name' => 'REX',
                'fig_desc'=> 'REX figure from the series Metal Gear.',
                'cat_id'=>2,
                'fig_price'=>3100000,
               'fig_stock'=>5,
               'fig_pic' => 'REX.jpg'
           ],
            [
                'fig_name' => 'RAY',
                'fig_desc'=> 'Ray figure from the series Metal Gear.',
                'cat_id'=>2,
                'fig_price'=>2300000,
               'fig_stock'=>4,
               'fig_pic' => 'RAY.jpg'
           ],
            [
                'fig_name' => 'Abyss Walker',
                'fig_desc'=> 'Abyss Walker figure from the game Dark souls.',
                'cat_id'=>4,
                'fig_price'=>1650000,
               'fig_stock'=>4,
               'fig_pic' => 'ABYSS WALKER.jpg'
           ],
            [
                'fig_name' => 'Rhodey',
                'fig_desc'=> 'Rhodey figure from the series Iron-man',
                'cat_id'=>1,
                'fig_price'=>2000000,
               'fig_stock'=>6,
               'fig_pic' => 'RHODEY.jpg'
           ],
        ]);
    }
}
