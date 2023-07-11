<?php

namespace Database\Seeders;

use App\Models\Technology;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TechnologiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $technologies = [
            [
                'name' => 'php',
            ],

            [
                'name' => 'javascript',
            ],

            [
                'name' => 'vue js',
            ],

            [
                'name' => 'laravel',
            ],

            [
                'name' => 'html',
            ],

            [
                'name' => 'sass',
            ],

            [
                'name' => 'css',
            ],

            [
                'name' => 'bootstrap',
            ],

            [
                'name' => 'mySQL',
            ],
        ];

        foreach($technologies as $technology){
            Technology::create($technology);
        }
    }
}
