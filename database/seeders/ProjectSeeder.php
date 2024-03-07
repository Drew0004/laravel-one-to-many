<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

// Helpers
use Illuminate\Support\Str;

//Models
use App\Models\Project;


class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Project::truncate();

        for ($i = 0; $i < 10; $i++) {
            $project = new Project();
            $title = fake()->sentence();
            $slug = Str::slug($title);
            $project->title = $title;
            $project->description = fake()->paragraph();
            $project->slug = $slug;
            $project->client = fake()->name();
            $project->save();
        }
    }
}
