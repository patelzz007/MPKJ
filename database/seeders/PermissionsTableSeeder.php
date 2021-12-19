<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            [
                'id'    => 1,
                'title' => 'auth_profile_edit',
            ],
            [
                'id'    => 2,
                'title' => 'user_management_access',
            ],
            [
                'id'    => 3,
                'title' => 'permission_create',
            ],
            [
                'id'    => 4,
                'title' => 'permission_edit',
            ],
            [
                'id'    => 5,
                'title' => 'permission_show',
            ],
            [
                'id'    => 6,
                'title' => 'permission_delete',
            ],
            [
                'id'    => 7,
                'title' => 'permission_access',
            ],
            [
                'id'    => 8,
                'title' => 'role_create',
            ],
            [
                'id'    => 9,
                'title' => 'role_edit',
            ],
            [
                'id'    => 10,
                'title' => 'role_show',
            ],
            [
                'id'    => 11,
                'title' => 'role_delete',
            ],
            [
                'id'    => 12,
                'title' => 'role_access',
            ],
            [
                'id'    => 13,
                'title' => 'user_create',
            ],
            [
                'id'    => 14,
                'title' => 'user_edit',
            ],
            [
                'id'    => 15,
                'title' => 'user_show',
            ],
            [
                'id'    => 16,
                'title' => 'user_delete',
            ],
            [
                'id'    => 17,
                'title' => 'user_access',
            ],
            [
                'id'    => 18,
                'title' => 'appointment_create',
            ],
            [
                'id'    => 19,
                'title' => 'appointment_edit',
            ],
            [
                'id'    => 20,
                'title' => 'appointment_show',
            ],
            [
                'id'    => 21,
                'title' => 'appointment_delete',
            ],
            [
                'id'    => 22,
                'title' => 'appointment_access',
            ],
            [
                'id'    => 23,
                'title' => 'bahagian_create',
            ],
            [
                'id'    => 24,
                'title' => 'bahagian_edit',
            ],
            [
                'id'    => 25,
                'title' => 'bahagian_show',
            ],
            [
                'id'    => 26,
                'title' => 'bahagian_delete',
            ],
            [
                'id'    => 27,
                'title' => 'bahagian_access',
            ],
            [
                'id'    => 28,
                'title' => 'system_calendar_access',
            ],
            [
                'id'    => 29,
                'title' => 'masa_temu_janji_create',
            ],
            [
                'id'    => 30,
                'title' => 'masa_temu_janji_edit',
            ],
            [
                'id'    => 31,
                'title' => 'masa_temu_janji_show',
            ],
            [
                'id'    => 32,
                'title' => 'masa_temu_janji_delete',
            ],
            [
                'id'    => 33,
                'title' => 'masa_temu_janji_access',
            ],
            [
                'id'    => 34,
                'title' => 'perkhidmatan_create',
            ],
            [
                'id'    => 35,
                'title' => 'perkhidmatan_edit',
            ],
            [
                'id'    => 36,
                'title' => 'perkhidmatan_show',
            ],
            [
                'id'    => 37,
                'title' => 'perkhidmatan_delete',
            ],
            [
                'id'    => 38,
                'title' => 'perkhidmatan_access',
            ],
            [
                'id'    => 39,
                'title' => 'configuration_access',
            ],
        ];

        Permission::insert($permissions);
    }
}
