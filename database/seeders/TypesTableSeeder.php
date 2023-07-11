<?php

namespace Database\Seeders;

use App\Models\Type;
use Faker\Generator as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $types = [
            [
                'project_type' => 'front-end', 
                'description' => $faker->paragraphs(rand(2, 10), true),
                
            ],

            [
                'project_type' => 'back-end', 
                'description' => $faker->paragraphs(rand(2, 10), true),
                
            ],

            [
                'project_type' => 'full-stack', 
                'description' => $faker->paragraphs(rand(2, 6), true),
                
            ],
        ];

        foreach($types as $type){
            Type::create($type);
        }
    }
}
