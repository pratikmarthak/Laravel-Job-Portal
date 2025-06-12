<?php

namespace Database\Seeders;

use App\Models\TeamSize;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TeamSizeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        TeamSize::insert([
            [
                'name' => 'Only Me',
                'slug' => 'Only-me'
            ],
            [
                'name' => '0-5 Members',
                'slug' => '0-5-members'
            ],
            [
                'name' => '5-10 Members',
                'slug' => '5-10-members'
            ],
            [
                'name' => '10-20 Members',
                'slug' => '10-20-members'
            ],
            [
                'name' => '20-50 Members',
                'slug' => '20-50-members'
            ],
            [
                'name' => '50-100 Members',
                'slug' => '50-100-members'
            ],
            [
                'name' => '100-200 Members',
                'slug' => '100-200-members'
            ],
            [
                'name' => '200-500 Members',
                'slug' => '200-500-members'
            ],
            [
                'name' => '500-1000 Members',
                'slug' => '500-1000-members'
            ],
        ]);
    }
}
