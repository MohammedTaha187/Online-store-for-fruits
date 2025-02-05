<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        static $i = 0;
        $i++;
        User::create([
            'name' => 'muhammad ali',
            'email' => 'muhammadali@gmail.com',
            'password' => Hash::make('12345678'),
            'role_id' => '1',
            'image' => "user/$i"  . ".jpg", 
        ]);
        User::create([
            'name' => 'ahmed ali',
            'email' => 'ahmedali@gmail.com',
            'password' => Hash::make('12345678'),
                'role_id' => '2',
                'image' => "user/$i"  . ".jpg", 
        ]);
        User::create([
            'name' => 'mohamed ali',
            'email' => 'mohamedali@gmail.com',
            'password' => Hash::make('12345678'),
                'role_id' => '3',
                'image' => "user/$i"  . ".jpg", 
        ]);
    }
}
