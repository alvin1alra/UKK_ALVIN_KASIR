<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DummyUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $UserData = [
            [
                'name'=>'mba admin',
                'email'=>'admin@gmail.com',
                'role'=>'admin',
                'password'=>bcrypt('123456')
            ],
            [
                'name'=>'abang petugas',
                'email'=>'petugas@gmail.com',
                'role'=>'petugas',
                'password'=>bcrypt('123456')
            ],
        ];

        foreach ($UserData as $key => $val){
            User::create($val);
        }
    }
}
