<?php

use App\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $listUser = ['admin', 'staff'];
        $role = 1;

        foreach ($listUser as $user) {
            User::create([
                'name' => $user,
                'email' => $user,
                'password' => bcrypt($user),
                'role' => $role++
            ]);
        }
    }
}
