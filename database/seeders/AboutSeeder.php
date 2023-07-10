<?php

namespace Database\Seeders;

use App\Models\About;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AboutSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        About::create([
            'title' => 'Why study in India?',
            'description' =>'The Indian education system began with ancient scriptures thousands of years ago. It has now transformed into modern-day education imparted in the finest institutions. The network of 42,000+ colleges and 1000+ universities has aided India to become an attractive education hub for international students. The same richness of Indian higher education needed due focus and led to the birth of the idea of the Study in India program.'
        ]);
    }
}
