<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            'name' => 'Computación',
            'slug' => 'computacion'
        ]);
        DB::table('categories')->insert([
            'name' => 'Digital',
            'slug' => 'digital'
        ]);
        DB::table('categories')->insert([
            'name' => 'Extras',
            'slug' => 'extras'
        ]);
        DB::table('categories')->insert([
            'name' => 'Hogar',
            'slug' => 'hogar'
        ]);
        DB::table('categories')->insert([
            'name' => 'Juguetes',
            'slug' => 'juguetes'
        ]);
        DB::table('categories')->insert([
            'name' => 'Oficina',
            'slug' => 'oficina'
        ]);
        DB::table('categories')->insert([
            'name' => 'Tecnología',
            'slug' => 'tecnologia'
        ]);

        DB::table('categories')->insert([
            'name' => 'Videojuegos',
            'slug' => 'videojuegos'
        ]);

        Category::factory(4)->create();
    }
}
