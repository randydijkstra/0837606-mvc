<?php
use Illuminate\Database\Seeder;
use App\Role;

class RoleTableSeeder extends Seeder
{
  public function run()
  {
    $role_player = new Role();
    $role_player->name = 'player';
    $role_player->description = 'A default User role';
    $role_player->save();
    $role_admin = new Role();
    $role_admin->name = 'admin';
    $role_admin->description = 'A admin User';
    $role_admin->save();
  }
}
