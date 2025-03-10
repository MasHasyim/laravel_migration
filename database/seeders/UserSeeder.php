<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->truncate();

        DB::table('users')->insert([
            'name' => 'Asmara',
            'email' => 'Cantik@nyoooo',
            'password' => '1234'
        ]);

        DB::table('users')->insert([
            'name' => 'Fikri',
            'email' => 'Ganteng@nyoooo',
            'password' => '123'
        ]);

        DB::table('users')->insert([
            'name' => 'Haashim',
            'email' => 'Ganteng@nyoo',
            'password' => '12'
        ]);
        User::factory()->count(17)->create(); //buat bikin data dummy
    }
}
