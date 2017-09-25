<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $role_player = Role::where('name', 'player')->first();
      $role_admin  = Role::where('name', 'admin')->first();

      //Create admin
      $admin = new User();
      $admin->firstname = 'Randy';
      $admin->lastname = 'Dijkstra';
      $admin->email = 'randydijkstra92@gmail.com';
      $admin->password = bcrypt('admin1234');
      $admin->save();
      $admin->roles()->attach($role_admin);

      //Create users
      $player = new User();
      $player->firstname = 'Jan';
      $player->lastname = 'Jansen';
      $player->email = 'email'.str_random(5).'@email.com';
      $player->password = bcrypt('pass');
      $player->save();
      $player->roles()->attach($role_player);

      $player = new User();
      $player->firstname = 'Hendrik';
      $player->lastname = 'Hendriksen';
      $player->email = 'email'.str_random(5).'@email.com';
      $player->password = bcrypt('pass');
      $player->save();
      $player->roles()->attach($role_player);

      $player = new User();
      $player->firstname = 'Pieter';
      $player->lastname = 'Pietersen';
      $player->email = 'email'.str_random(5).'@email.com';
      $player->password = bcrypt('pass');
      $player->save();
      $player->roles()->attach($role_player);

    }
}
