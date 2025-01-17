<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Admin;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Admin::create([
            'name' => 'p4-hashiguchi',
            'email' => '8491yuki@gmail.com',
            'password' => bcrypt('8491yuki'),
        ]);
    }
}
