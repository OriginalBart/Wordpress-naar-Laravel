<?php

use Illuminate\Database\Seeder;

class BandsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('bands')->insert([
            [
                'name' => 'amsterdam live event',
                'location' => 'Amsterdam',
                'price' => '1',
                'content' => 'content voor festival',
                'stage_id' => '2',
                'filename'=> 'hero.jpg'

            ],
            [
                'name' => 'Rotterdam live event',
                'location' => 'Rotterdam',
                'price' => '0',
                'content' => 'content voor festival',
                'stage_id' => '1',
                'filename'=> 'hero.jpg'


            ],

        ]);
    }
}
