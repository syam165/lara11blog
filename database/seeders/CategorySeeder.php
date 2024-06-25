<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Category::factory(5)->create();

        Category::create([
            'name' => 'Artificial Intelligence',
            'slug' => 'artificial-intelligence',
            'color' => 'red'
        ]);
        Category::create([
            'name' => 'Machine Learning',
            'slug' => 'machine-learning',
            'color' => 'blue'
        ]);
        Category::create([
            'name' => 'Cloud Computing',
            'slug' => 'cloud-computing',
            'color' => 'green'
        ]);
        Category::create([
            'name' => 'Data Analytics',
            'slug' => 'data-analytics',
            'color' => 'yellow'
        ]);
        Category::create([
            'name' => 'Blockchain Technology:',
            'slug' => 'blockchain-technology:',
            'color' => 'orange'
        ]);

    }
}
