<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Hash;
use App\Models\AdminAuth;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        AdminAuth::create([
            'name' => 'Jibon Ahmmed',
            'email' => 'jibon@gmail.com',
            'password' => Hash::make('jibon@2345')
        ]);
    }
}
