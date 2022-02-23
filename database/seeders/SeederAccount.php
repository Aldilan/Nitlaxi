<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class SeederAccount extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'name' => 'admin',
                'email' => 'admin@gmail.com',
                'username' => 'admin',
                'password' => bcrypt('admin123456'),
                'nomor' => '0895330019905',
                'role' => 'admin'
            ],
            [
                'name' => 'resepsionis',
                'email' => 'resepsionis@gmail.com',
                'username' => 'resepsionis',
                'password' => bcrypt('resepsionis123456'),
                'nomor' => '0895330019906',
                'role' => 'resepsionis'
            ],
            [
                'name' => 'customer',
                'email' => 'customer@gmail.com',
                'username' => 'customer',
                'password' => bcrypt('customer123456'),
                'nomor' => '0895330019907',
                'role' => 'customer'
            ]
            ];
        foreach ($users as $user) {
            User::create($user);
        }
    }
}
