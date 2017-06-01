<?php

use Illuminate\Database\Seeder;

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
                'name'          => 'user',
                'password'      => bcrypt('1234'),
                'email'         => 'admin12@gmail.com',
                'role'          => 'admin',
                'username'      => 'farzana',
                'contact'       => '013242',
                'additional_no' => '4656',
                'address'       => 'dffddf',
            ],
        ];

        DB::table('users')->insert($users);
    }
}
