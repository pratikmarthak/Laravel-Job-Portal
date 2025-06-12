<?php

namespace Database\Seeders;

use App\Models\Organization;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrganizationTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $OrganizationType = [
            'Government',
            'Semi Government',
            'Public',
            'Private',
            'NGO',
            'International Agencies',
        ];

        foreach ($OrganizationType as $type) {
            $OrganizationType = new Organization();
            $OrganizationType->name = $type;
            $OrganizationType->save();
        }
    }
}
