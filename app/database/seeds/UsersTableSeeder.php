<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;
use App\UserProfile;
use App\Post;

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

      //--- Create admin user ---
      $admin = new User();
      $admin->firstname = 'Randy';
      $admin->lastname = 'Dijkstra';
      $admin->email = 'randydijkstra92@gmail.com';
      $admin->password = bcrypt('admin1234');
      $admin->save();
      $admin->roles()->attach($role_admin);
      $player_profile = new UserProfile();
      $player_profile->location = 'Rotterdam';
      $player_profile->home_field = 'RSL';
      $admin->profile()->save($player_profile);
      $new_post = new Post();
      $new_post->title = str_random(10);
      $new_post->message = str_random(200);
      $admin->posts()->save($new_post);
      $new_post = new Post();
      $new_post->title = str_random(10);
      $new_post->message = str_random(200);
      $admin->posts()->save($new_post);

      //--- Create users ---
      $player = new User();
      $player->firstname = 'Jan';
      $player->lastname = 'Jansen';
      $player->email = 'test@email.com';
      $player->password = bcrypt('pass');
      $player->save();
      $player->roles()->attach($role_player);
      $player_profile = new UserProfile();
      $player_profile->location = 'Den Haag';
      $player_profile->home_field = 'Running The Target';
      $player->profile()->save($player_profile);
      $new_post = new Post();
      $new_post->title = str_random(10);
      $new_post->message = str_random(200);
      $player->posts()->save($new_post);


      $player = new User();
      $player->firstname = 'Hendrik';
      $player->lastname = 'Hendriksen';
      $player->email = 'email'.str_random(5).'@email.com';
      $player->password = bcrypt('pass');
      $player->save();
      $player->roles()->attach($role_player);
      $player_profile = new UserProfile();
      $player_profile->location = 'Almere';
      $player_profile->home_field = 'Balls & Arrows';
      $player->profile()->save($player_profile);
      $new_post = new Post();
      $new_post->title = str_random(10);
      $new_post->message = str_random(200);
      $player->posts()->save($new_post);

      $player = new User();
      $player->firstname = 'Pieter';
      $player->lastname = 'Pietersen';
      $player->email = 'email'.str_random(5).'@email.com';
      $player->password = bcrypt('pass');
      $player->save();
      $player->roles()->attach($role_player);
      $player_profile = new UserProfile();
      $player_profile->location = 'Amsterdam';
      $player_profile->home_field = 'RSL';
      $player->profile()->save($player_profile);
      $new_post = new Post();
      $new_post->title = str_random(10);
      $new_post->message = str_random(200);
      $player->posts()->save($new_post);
    }
}
