<?php

use ATS\Docente;
use ATS\User;
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
        factory(User::class)->create([
            'lastname' => 'Puello Gonzalez',
            'name' => 'Victor',
            'email' => 'victor.puello@gmail.com',
            'username' => 'victor.puello',
            'path'=> null,
            'type' => 'admin'
        ]);
        // crear docentes
        for ($i =0; $i > 40; $i++){
            $user = factory(User::class)->create();
            Docente::create([
                'typeid' => "CC",
                'name' => $user->full_name,
                'user_id' => $user->id
            ]);
        }
    }
}
