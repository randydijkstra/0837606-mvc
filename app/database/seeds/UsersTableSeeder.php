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
      //Create admin
      DB::table('users')->insert([
        'firstname' => 'Randy',
        'lastname' => 'Dijkstra',
        'email' => 'randydijkstra92@gmail.com',
        'password' => 'admin1234',
        'role_id' => 1
      ]);

      //Create users
      DB::table('users')->insert([
        'firstname' => 'Jan',
        'lastname' => 'Jansen',
        'email' => 'email'.str_random(5).'@email.com',
        'password' => 'test1234'
        'role_id' => 0
      ]);
      DB::table('users')->insert([
        'firstname' => 'Hendrik',
        'lastname' => 'Hendriksen',
        'email' => 'email'.str_random(5).'@email.com',
        'password' => 'test1234',
        'role_id' => 0

      ]);
      DB::table('users')->insert([
        'firstname' => 'Piet',
        'lastname' => 'Pietersen',
        'email' => 'email'.str_random(5).'@email.com',
        'password' => 'test1234',
        'role_id' => 0
      ]);
    }
}
