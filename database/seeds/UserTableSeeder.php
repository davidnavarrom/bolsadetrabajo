<?php

use Illuminate\Database\Seeder;
use App\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $user = new User();
        $user->name = 'David';
        $user->surname = 'Navarro Muerza';
        $user->phone = '670652278';
        $user->status=1;
        $user->email='david@dnservices.es';
        $user->cvpath='';
        $user->password = Hash::make('david123');
        $user->roles()->attach(1,['user_id' => 1]);
        $user->save();


        $user2 = new User();
        $user2->name = 'Miguel';
        $user2->surname = 'Navarro Muerza';
        $user2->phone = '678787854';
        $user2->status=1;
        $user2->cvpath='';
        $user2->email='miguel@dnservices.es';
        $user->roles()->attach(2,['user_id' => 2]);
        $user2->password = Hash::make('miguel123');
        $user2->save();


    }
}