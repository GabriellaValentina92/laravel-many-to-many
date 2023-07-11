<?php

namespace Database\Seeders;

use App\Models\Type;
use App\Models\Project;
use App\Models\Technology;
use Faker\Generator as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $types = Type::all();
        $technologies = Technology::all()->pluck('id');
        for ($i = 0; $i < 20; $i++) {
            $project = Project::create([
                'type_id' => $faker->randomElement($types)->id,
                'title' => $faker->words(rand(2, 10), true),
                'url_github' => 'https://github.com/GabriellaValentina92?tab=repositories',
                'project_description' => $faker->paragraphs(rand(2, 10), true),
                'project_image' => 'https://picsum.photos/id/' . rand(1, 200) . '/300/400',
          
            ]);

            $project->technologies()->sync($faker->randomElements($technologies, null));
        }
    }
}
