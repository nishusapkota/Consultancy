<?php

namespace Database\Seeders;

use App\Models\Footer;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class FooterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Footer::create([
            'description'=>'Footer Descriptons',
            'address'=>'Kathmandu,Nepal',
            'email'=>'abc@abc.com',
            'phone'=>'9800000000'
        ]);
    }
}
