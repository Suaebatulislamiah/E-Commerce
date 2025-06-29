<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // buat permission
        $permissions = [
            'manage-kategori',
            'manage-produk',
            'manage-pelanggan',
            'manage-pesanan',
            'manage-users',
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }

        // buat role
        $adminRole = Role::firstOrCreate(['name' => 'admin']);
        $gudangRole = Role::firstOrCreate(['name' => 'gudang']);
        $pelangganRole = Role::firstOrCreate(['name' => 'pelanggan']);

        // berikan permission ke role
        $adminRole->givePermissionTo([
            'manage-kategori',
            'manage-produk',
            'manage-pelanggan',
            'manage-pesanan',
            'manage-users',
        ]);

        $gudangRole->givePermissionTo([
            'manage-kategori',
            'manage-produk',
        ]);

        $pelangganRole->givePermissionTo([
            'manage-pesanan',
        ]);

        // buat user admin
        $admin = User::firstOrCreate(
            [
                'name' => 'admin',
                'email' => 'admin@toko.com',
            ],
            [
                'password' => bcrypt('password'),
            ]
        );
        $admin->assignRole($adminRole);

        // buat user gudang
        $gudang = User::firstOrCreate(
            [
                'name' => 'gudang',
                'email' => 'gudang@toko.com',
            ],
            [
                'password' => bcrypt('password'),
            ]
        );
        $gudang->assignRole($gudangRole);

        // buat user pelanggan
        $pelanggan = User::firstOrCreate(
            [
                'name' => 'pelanggan',
                'email' => 'pelanggan@toko.com',
            ],
            [
                'password' => bcrypt('password'),
            ]
        );
        $pelanggan->assignRole($pelangganRole);
    }
}