<?php

use Illuminate\Database\Seeder;
use App\Typology;
use App\User;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
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
                'name' => 'Mario',
                'surname' => 'Rossi',
                'email' => 'mariorossi@gmail.com',
                'password' => 'prova1234',
                'avatar' => Null,
                'date_of_birth' => '1970-10-10'
            ],
            [
                'name' => 'Elisa',
                'surname' => 'Bianchi',
                'email' => 'elisabianchi@gmail.com',
                'password' => 'prova1234',
                'avatar' => Null,
                'date_of_birth' => '1980-05-20'
            ],
            [
                'name' => 'Giorgio',
                'surname' => 'Neri',
                'email' => 'giorgioneri@gmail.com',
                'password' => 'prova1234',
                'avatar' => Null,
                'date_of_birth' => '1985-10-15'
            ],
        ];

        foreach($users as $user){
            $newUser = new User();
            $newUser->name = $user['name'];
            $newUser->surname = $user['surname'];
            $newUser->email = $user['email'];
            $newUser->password = Hash::make($user['password']);
            $newUser->date_of_birth = $user['date_of_birth'];
            $newUser->save();
        };
    }
}
