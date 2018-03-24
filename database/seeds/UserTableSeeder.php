<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;
class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_user = Role::where('name', 'User')->first();
        $role_author = Role::where('name', 'Author')->first();
        $role_admin = Role::where('name', 'Admin')->first();
        $user = new User();
        $user->name = 'Hồng Quân';
        $user->email = 'hongquan200696@gmail.com';
        $user->password = bcrypt('123456');
        $user->save();
        $user->roles()->attach($role_user);
        $admin = new User();
        $admin->name = 'Minh Quý';
        $admin->email = 'minhquy.it.sl@gmail.com';
        $admin->password = bcrypt('Anhquy12');
        $admin->save();
        $admin->roles()->attach($role_admin);
        $author = new User();
        $author->name = 'Dương Toản';
        $author->email = '36.edu.vn@gmail.com';
        $author->password = bcrypt('author');
        $author->save();
        $author->roles()->attach($role_author);
    }
}
