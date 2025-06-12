<?php

namespace Database\Seeders;

use App\Models\IndustryType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


class IndustryTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $IndustryTypes = [
            'Manufacturing',
            'Technology',
            'Healthcare',
            'Financial Services',
            'Energy',
            'Retail',
            'Telecommunications',
            'Agriculture',
            'Transportation and Logistics',
            'Entertainment and Media',
            'Construction',
            'Automotive',
            'Tourism and Hospitality',
            'Education',
            'Real Estate',
            'Pharmaceutical',
            'Consumer Goods',
            'Environmental',
            'Defense and Aerospace',
            'Legal and Professional Services',
        ];

        foreach ($IndustryTypes as $type) {
            $IndustryTypes = new IndustryType();
            $IndustryTypes->name = $type;
            $IndustryTypes->save();
        } 

    }
}
