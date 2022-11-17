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
                'name'=>'Fahrul',
               'email'=>'fahrul@it.lecturer.pens.ac.id',
               'type'=> 2,
               'password'=> bcrypt('dekan'),
            ],
            [
                //
                'name'=>'Rengga',
                'email'=>'rengga@it.lecturer.pens.ac.id',
                'type'=> 3,
                'password'=> bcrypt('ktu'),
            ],
            [
                //
                 'name'=>'Yanuar',
                'email'=>'yanuar@it.lecturer.pens.ac.id',
                'type'=> 4,
                'password'=> bcrypt('kaur'),
            ],
            [
               'name'=>'Alan',
               'email'=>'alanhidayat@it.student.pens.ac.id',
               'type'=>0,
               'password'=> bcrypt('maha'),
            ],
        ];
    
        foreach ($users as $key => $user) {
            User::create($user);
        }
    }
}
