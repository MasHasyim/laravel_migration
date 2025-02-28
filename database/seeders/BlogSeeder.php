<?php

namespace Database\Seeders;

use App\Models\Blog;
use App\Models\User;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        DB::table('blogs')->truncate();

        Blog::factory()->count(10)->create(); //buat bikin data dummy

        DB::table('blogs')->insert([
            'title' => 'Nadia',
            'description' => 'Cantik nyoooo'
        ]);

        DB::table('blogs')->insert([
            'title' => 'Fikri',
            'description' => 'Ganteng nyoooo'
        ]);

        DB::table('blogs')->insert([
            'title' => 'Haashim',
            'description' => 'Ganteng nyoooo'
        ]);
    }
}
