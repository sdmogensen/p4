<?php

use Illuminate\Database\Seeder;
use Gifter\User;

class UsersTableSeeder extends Seeder
{
    /**
    * Run the database seeds.
    *
    * @return void
    */
    public function run()
    {

        # Define the users you want to add
        $users = [
            ['jill@harvard.edu','Jill','helloworld'],
            ['jamal@harvard.edu','Jamal','helloworld'],
            ['sdmogensen@gmail.com','Steve','helloworld']
        ];

        # Get existing users to prevent duplicates
        $existingUsers = User::all()->keyBy('email')->toArray();

        foreach($users as $user) {

            # If the user does not already exist, add them
            if(!array_key_exists($user[0],$existingUsers)) {
                $user = User::create([
                    'email' => $user[0],
                    'username' => $user[1],
                    'password' => Hash::make($user[2]),
                ]);
            }
        }
    }
}
