<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'eliezer tamba',
            'email' => 'eliezermasiala2000@gmail.com',
            'password' => bcrypt('0820083703Mt')
        ]);
    }
}
