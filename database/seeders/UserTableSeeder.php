<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $a = new User();
        $a->name = "Aditya";
        $a->email = "9123@gmail.com";
        $a->password = "test1234";
        $a->type = "admin";
        $a->save();

        $b = new User();
        $b->name = "jack";
        $b->email = "jack1@gmail.com";
        $b->password = "jack1234";
        $b->save();
        User::factory()->count(3)->create();
    }
}
