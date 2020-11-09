<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;
use Illuminate\Foundation\Auth\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        $role1 = Role::create(['name' => 'admin']);
        $role2 = Role::create(['name' => 'employer']);
        $role3 = Role::create(['name' => 'jobseeker']);

        $user = Factory(App\User::class)->create([
            'id' => 1,
            'name' => 'Administrator',
            'username' => 'administrator',
            'email' => 'admin@admin.com',
            'password' => bcrypt('admin123')
        ]);
        $user->assignRole($role1);

        $user = Factory(App\User::class)->create([
            'id' => 2,
            'name' => 'PT Toko ABC',
            'username' => 'tokoabc',
            'email' => 'tokoabc@gmail.com',
            'password' => bcrypt('tokoabc123')
        ]);
        $user->assignRole($role2);

        $user = Factory(App\User::class)->create([
            'id' => 3,
            'name' => 'Aditia Saputra',
            'username' => 'aditiasaputra',
            'email' => 'aditiasaputra@gmail.com',
            'password' => bcrypt('aditiasaputra')
        ]);
        $user->assignRole($role3);
        // $users = [
        //     ['id' => 1, 'name' => 'Administrator', 'username' => 'administrator', 'email' => 'admin@admin.com', 'password' => bcrypt('admin123')],
        //     ['id' => 2, 'name' => 'PT Toko ABC', 'username' => 'tokoabc', 'email' => 'tokoabc@gmail.com', 'password' => bcrypt('tokoabc123')],
        //     ['id' => 3, 'name' => 'Aditia Saputra', 'username' => 'aditiasaputra', 'email' => 'aditiasaputra@gmail.com', 'password' => bcrypt('aditiasaputra')],
        // ];

        // foreach ($users as $user) {
        //     User::create($user);
        // }
        // DB::table('users')->insert($users);
    }
}
