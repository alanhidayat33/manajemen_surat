<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class CreateUsersSeeder extends Seeder
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
               'name'=>'Admin',
               'email'=>'admin@it.admin.pens.ac.id',
               'type'=>1,
               'password'=> bcrypt('admin'),
            ],
            [
               //
                'name'=>'dekan',
               'email'=>'dekan@it.lecturer.pens.ac.id',
               'type'=> 2,
               'password'=> bcrypt('dekan'),
            ],
            [
                //
                'name'=>'ktu',
                'email'=>'ktu@it.lecturer.pens.ac.id',
                'type'=> 3,
                'password'=> bcrypt('ktu'),
            ],
            [
                //
                 'name'=>'kaur',
                'email'=>'kaur@it.lecturer.pens.ac.id',
                'type'=> 4,
                'password'=> bcrypt('123456'),
            ],
            [
               'name'=>'maha',
               'email'=>'maha@it.student.pens.ac.id',
               'type'=>0,
               'password'=> bcrypt('maha'),
            ],
        ];
    
        foreach ($users as $key => $user) {
            User::create($user);
        }
    }
}
