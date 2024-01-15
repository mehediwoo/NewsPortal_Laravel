<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\footer;

class FooterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        footer::create([
            'website_title' => 'D-Nagorikkonthobd',
            'website_logo' => 'logo.png',
            'address_en' => 'Gulshan Street, Dhaka, Dhaka Bangladesh',
            'address_bn' => 'গুলসান, ঢাকা, বাংলাদেশ',
            'phone' => '+880 17 43534543',
            'telephone' => '+880 988 765',
            'email' => 'dnagorik@email.com'
        ]);
    }
}
