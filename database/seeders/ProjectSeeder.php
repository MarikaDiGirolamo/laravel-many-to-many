<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Project;
use App\Models\Type;
use Faker\Generator as Faker;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        // $types = Type::all();

        for ($i = 0; $i < 10; $i++) {
            $newProject = new Project;
            $newProject->title = $faker->words(5, true);
            $newProject->content = $faker->paragraph(5, false);
            $newProject->image = $faker->imageUrl(360, 360, 'animals', true, 'cats', true, 'jpg');
            $newProject->link = $faker->url();
            // $newProject->type_id = rand(1, count($types));
            $newProject->save();
        }
    }
}
