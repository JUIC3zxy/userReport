<?php

namespace Database\Seeders;

use App\Models\NewUser;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;


class NewUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        NewUser::factory()->count(100)->create();
    }
}
