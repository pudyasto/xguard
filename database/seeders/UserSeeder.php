<?php

namespace Database\Seeders;

use App\Models\Factory;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        $superadminRole = Role::create(['name' => 'Administrator']);
        // gets all permissions via Gate::before rule

        $factiory = Factory::where('kode_ref', '1')->first();
        $user = User::create([
            'nik'           => '131005357',
            'name'          => 'SUPER ADMIN',
            'username'      => '131005357',

            'gender'        => 'Laki',
            'department'    => 'ICT',
            'factory_uuid'  => $factiory->uuid,
            'status'        => 'Aktif',

            'email'         => 'mr.pudyasto@gmail.com',
            'password'      => bcrypt('131005357'),

            'photo'         => null,
        ]);
        $user->assignRole($superadminRole);
    }
}
